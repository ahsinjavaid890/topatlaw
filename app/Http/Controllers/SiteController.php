<?php
namespace App\Http\Controllers;
use RealRashid\SweetAlert\Facades\Alert; 
use Illuminate\Http\Request;
use Session;
use Auth;
use App\Models\User;
use App\Mail\Offers;
use App\Models\lawyerreviews;
use App\Models\adminnotifications;
use App\Models\nominations;
use App\Models\nominationvotes;
use App\Models\contacts;
use App\Models\cities;
use App\Models\blogs;
use App\Models\categories;
use App\Models\lawyers;
use App\Models\unapprovedlawyers;
use DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Braintree\Gateway;


class SiteController extends Controller
{
    function getUserIpAddr(){
        if(!empty($_SERVER['HTTP_CLIENT_IP'])){
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }else{
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }

    public function slugify($text)
    {
        $text = preg_replace('~[^\pL\d]+~u', '-', $text);
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
        $text = preg_replace('~[^-\w]+~', '', $text);
        $text = trim($text, '-');
        $text = preg_replace('~-+~', '-', $text);
        $text = strtolower($text);
        if (empty($text)) {
          return 'n-a';
        }
        return $text;
    }
   public function checkurl($id)
    {
      $url = DB::table('siteurls')->where('url', $id)->first();
      if(!empty($url))
      {
        $modalname = $url->modalname;
        if($modalname == "services")
        {
          $data = DB::table('categories')->where('status' , 1)->get();
          return view('pages.services.index')->with(array('data'=>$data));
        }
        elseif ($modalname == "lawyers") {
          $data = DB::table('categories')->where('status' , 1)->get();
          return view('pages.services.all')->with(array('data'=>$data));
        }
        elseif ($modalname == "aboutus") {
          $data = DB::table('cms')->where('pagename' , 'aboutus')->get()->first();
          return view('pages.aboutus.index')->with(array('metatags'=>$data , 'data'=>$data));
        }
        elseif ($modalname == "contactus") {
          $data = DB::table('cms')->where('pagename' , 'contactus')->get()->first();
          return view('pages.contactus.index')->with(array('metatags'=>$data , 'data'=>$data));
        }
        elseif ($modalname == "privacypolicy") {
          return view('pages.privacypolicy.index');

        }
        elseif ($modalname == "terms") {
          return view('pages.Terms.index');

        }
        elseif ($modalname == "home") {
          return redirect('admin/dashboard');
        }
      }
      else
      {
        return view('errors.404');  
      }
    }
    public function indexview()
    {
      $homepageservices = categories::where('status', 1)->get();
      $homepageblogs = blogs::all();
      return view('welcome')->with(array('homepageservices'=>$homepageservices , 'homepageblogs'=>$homepageblogs));
    }
    public function lawyer($id)
    {
    	  $data = lawyers::where('status' , 1)->where('url' , $id)->get()->first();
        $service = categories::where('id' , $data->categoryid)->get()->first();
        $city = cities::where('id' , $data->citiyid)->get()->first();
        $lawyerreviews = lawyerreviews::where('lawyers_id' , $data->id)->get();
        return view('pages.lawyers.single')->with(array('lawyerreviews'=>$lawyerreviews,'metatags'=>$data,'data'=>$data,'service'=>$service,'city'=>$city,'url'=>$id));
    }
    public function addlawyerreview(Request $request)
    {
        $review = new lawyerreviews;
        $review->name = $request->name;
        $review->email = $request->email;
        $review->review = $request->review;
        $review->rattings = $request->ratingstar;
        $review->status = 0;
        if(!empty($request->id)){
          $review->lawyers_id = $request->id;
        }
        if(!empty($request->nominatedid))
        {
          $review->nominatedlawyer = $request->nominatedid;
        }
        $review->save();
        echo "success";
    }
    public function adminnotification($url , $notification , $type)
    {
      $notifye = new adminnotifications;
      $notifye->url = $url;
      $notifye->notification = $notification;
      $notifye->readstatus = 0;
      $notifye->type = $type;
      $notifye->save();
    }
    public function blogdetails($id)
    {
        $data = DB::table('blogs')->where('url' , $id)->get()->first();
        $recentblogs = blogs::limit(3);
        return view('pages.blogs.single')->with(array('recentblogs'=>$recentblogs ,'metatags'=>$data , 'data'=>$data));
    }
    public function cities($id)
    {
        $servicedata = DB::table('categories')->where('status' , 1)->where('url' , $id)->get()->first();
        $serviceid = $servicedata->id;
        $data = DB::table('cities')->where('status' , 1)->where('serviceid' , $serviceid)->orderBy('tittle','ASC')->get();

        return view('pages.cities.index')->with(array('metatags'=>$servicedata,'data'=>$data,'servicename'=>$servicedata));
    }
    public function searchcity($id ,$serviceid)
    {
        $data = DB::table('cities')->where('serviceid' , $serviceid)->where('tittle', 'like', '%' . $id . '%')->get();
        if(!empty($data)){
        foreach ($data as $r) {
            $image = url('/public/images/').'/'.$r->thumbnail;
          echo  "<div class='col-sm-3 mb-2'>
                <!--div class='service-card shadow-mine'-->
                     <!--a href=''>
                         <img src=' " .$image. " ' alt='Image'>
                     </a-->
                    <!--div class='service-text'-->
                        <h6><a href=''>".$r->tittle."</a></h6>
                    <!--/div-->
                <!--/div-->
            </div>";
        }
    }
    else{
        echo "noresult";
    }
    }
    

    public function attorneryes($serviceurl= null , $cityurl= null)
    {
        $service = categories::where('status', 1)->where('url' , $serviceurl)->first();
        $city = cities::where('status', 1)->where('serviceid' , $service->id)->where('url' , $cityurl)->first();
        $featuredcount = lawyers::where('status', 1)->where('categoryid' ,$service->id)->where('citiyid' ,$city->id)->where('featured', 1)->count();
        $featuredlawyers = lawyers::where('status', 1)->where('categoryid' ,$service->id)->where('citiyid' ,$city->id)->where('featured', 1)->get();
        $toplawyerscount = lawyers::where('status', 1)->where('categoryid' ,$service->id)->where('citiyid' ,$city->id)->where('toplawyers', 1)->count();
        $toplawyers = lawyers::where('status', 1)->where('categoryid' ,$service->id)->where('citiyid' ,$city->id)->where('toplawyers', 1)->get();
        $nominations = nominations::where('status', 1)->where('serviceid' ,$service->id)->where('cityid' ,$city->id)->orderBy('votes','DESC')->get();
      // print_r($featuredlawer);    
  return view('pages.lawyers.all')->with(array('nominations'=>$nominations,'metatags'=>$city,'service'=>$service,'city'=>$city ,'featuredcount'=>$featuredcount,'featuredlawyers'=>$featuredlawyers,'toplawyerscount'=>$toplawyerscount,'toplawyers'=>$toplawyers));
    }
    
    public function createnominations(Request $request) {
        if(!empty($request->file('image'))){
        $image = $request->file('image');
        $nominateimage = rand().'.'.$image->getClientOriginalExtension();
        $image->move(public_path('images'), $nominateimage);
        }else{
            $nominateimage = "noimage";
        }
        $nominations = new nominations;
        $nominations->name = $request->name;
        $nominations->bio = $request->bio;
        $nominations->image = $nominateimage;
        $nominations->phonenumber = $request->phone;
        $nominations->website = $request->website;
        $nominations->emailaddress = $request->email;
        $nominations->status = 0;
        $nominations->votes = 0;
        $nominations->serviceid = $request->serviceid;
        $nominations->cityid = $request->cityid;
        $nominations->url = $this->slugify($request->name);
        $nominations->save();
        $url = 'admin/allnominations';
        $type = 'dripicons-bell';
        $notification = $request->name." Send a Nomination Request";
        $this->adminnotification($url,$notification,$type);
        echo "success";
    }
    public function nominationvote($id)
    {
        $data = DB::table('nominations')->where('id' , $id)->get()->first();
        $votecount = $data->votes;
        $ip_address =  $this->getUserIpAddr();
        $test =  DB::table('nominationvotes')->where('ipaddress', $ip_address)->where('nominations', $id)->first();
        if(empty($test)){
            $data = array('votes'=>$votecount+1);
            nominations::where('id', $id)->update($data);
            $vote = new nominationvotes;
            $vote->nominations = $id;
            $vote->ipaddress = $ip_address;
            $vote->save();
            echo $votecount+1;
        }else{
            echo "you Vote Already";
        }

    }
    public function submitcontactus(Request $request)
    {
       $name  = $request->name;
       $email = $request->email;
       $phone = $request->phone;
       $subject = $request->subject;
       $message = $request->message;
       $requestmessage = new contacts;
       $requestmessage->name =  $name;
       $requestmessage->email = $email;
       $requestmessage->phonenumber = $phone;
       $requestmessage->subject = $subject;
       $requestmessage->message = $message;
       $requestmessage->save();
       echo "success";
   }
   public function nominatedlawyer($id)
   {
      $data = nominations::where('url' , $id)->get()->first();
      $service = categories::where('id' , $data->serviceid)->get()->first();
      $city = cities::where('id' , $data->cityid)->get()->first();
      $lawyerreviews = lawyerreviews::where('nominatedlawyer' , $data->id)->where('status' , 1)->get();
      return view('pages.nominated.index')->with(array('lawyerreviews'=>$lawyerreviews,'metatags'=>$data,'data'=>$data,'service'=>$service,'city'=>$city));
   }

   //------------------
   public function signup(){
     $cities=cities::where('status', 1)->get();
     $categories=categories::where('status',1)->get();
    return view('pages.lawyerAuth.sign-up')->with(array('cities'=>$cities,'categories'=>$categories));
   }
   public function sendimagetodirectory($imagename)
   {
       $file = $imagename;
       $filename = rand() . '.' . $file->getClientOriginalExtension();
       $path = 'images/';
       $file->move(public_path($path), $filename);
       return $filename;
   }

   public function addLawyerByUser(Request $request){
  //   dd($request->file('image'));
    if(isset($request->image)){
      $lawyerimage= $this->sendimagetodirectory($request->image);
        }else{
            $lawyerimage = 'imagplaceholder.jpg';
        }
    if(!unapprovedlawyers::where('emailaddress', $request->email)->exists() && !lawyers::where('emailaddress', $request->email)->exists()){
      $var=new AdminController();
      $lawyer = new lawyers;
        $lawyer->name = $request->name;
        $lawyer->url = $var->uniqueUsername($request->name);
        $lawyer->categoryid = $request->serviceid;
        $lawyer->citiyid = $request->cityid;
        //$lawyer->bio = $request->bio;
        $lawyer->image = $lawyerimage;
        $lawyer->officeaddress = $request->officeaddress;
        $lawyer->phonenumber = $request->phoneno;
        $lawyer->emailaddress = $request->email;
        $lawyer->website = $request->websitelink;
        $lawyer->facebook = $request->facebook;
        $lawyer->twitter = $request->twitter;
        //$lawyer->fax = $request->fax;
       // $lawyer->featured = 0;
        $lawyer->linkdlin = $request->linkdlin;
      //  $lawyer->r_experience = $request->ratting_experience;
       // $lawyer->r_personal = $request->ratting_assesments;
       //// $lawyer->r_online_reviews = $request->ratting_reviews;
        //$lawyer->r_online_profiles = $request->ratting_profiles;
        $lawyer->education = $request->education;
       // $lawyer->tagline = $request->tagline;
        // if($request->featuredortop == 1)
        // {
            $lawyer->featured = 0;
        ////}else{
            $lawyer->toplawyers = 0;
       // }
        // $lawyer->field1 = $request->field1;
        // $lawyer->field2 = $request->field2;
        // $lawyer->field3 = $request->field3;
        // $lawyer->field4 = $request->field4;
        // $lawyer->link1 = $request->link1;
        // $lawyer->link2 = $request->link2;
        // $lawyer->link3 = $request->link3;
        // $lawyer->link4 = $request->link4;        
        $lawyer->status = 0;
        $lawyer->mettatittle = $request->name;
      //  $lawyer->metadescription = $request->bio;
      //  $lawyer->og_image = $lawyerimage;
          $lawyer->registeredBy='admin';
          $lawyer->password= Hash::make($request->password);
          //password_hash($request->password, PASSWORD_DEFAULT);
           $lawyer->last_name = $request->last_name;
        $lawyer->email_verified = 'false';
        $lawyer->save();
        
        $email = $request->email;
        
          $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
          $code=substr(str_shuffle($permitted_chars), 0, 60);
          $name=lawyers::where('emailaddress',$request->email)->pluck('name')->first();
          DB::table('emailverify')->updateOrInsert(['email'=>$request->email],['code'=>$code]);
           
           $data= [
          'name'=>$name,
          'code'=>$code,
          'type'=>'email'
        ];
     
        Mail::send('pages.lawyerAuth.emailverification', $data, function($message) use ($email) {
          $message->to($email, env('MAIL_FROM_NAME'))->subject('Email Verification!');
          $message->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));
          });
          
        // return redirect()->back()->with('message', 'Verification Email Sent Successfully!');

      //  $this->verify_email($request->email);
        // return redirect()->back()->with('message', 'Your request for signup has been received we will evaluate and inform you once approved. Your Patience is highly appreciated');
            return redirect()->to('https://topatlaw.com/signin/lawyer')->with('message', 'Account Registered successfully Verification Email Sent to your account!');

        }
        else 
        return redirect()->back()->with('error', 'Email already Exists!')->withInput();

      }

        public function lawyerLogin(){
          return view('pages.lawyerAuth.sign-in');

        }

        public function loginLawyerByUser(Request $request){
          
            if(lawyers::where('emailaddress',$request->email)->exists()){
              if(lawyers::where('emailaddress',$request->email)->exists()){
              
                    $password=lawyers::where('emailaddress',$request->email)->first();
                    if($password->email_verified=='true'){
                    //  dd($request->password);
                        $pass = lawyers::where('emailaddress',$request->email)->get()->first();
                    if (Hash::check($request->password, $pass->password))  {
                   //   if (password_verify($request->password, $password->password)) {
                    //  return redirect()->back()->with('success', 'Login successfully');

                    $data = lawyers::where('emailaddress',$request->email)->get()->first();
                    session()->put('user', $data->id);
                   // echo session()->get('user');
                   return redirect('profile/dashboard');
                    //return view('pages.lawyerAuth.profile')->with(array('data'=>$data));
                    }
                    else {
                      return redirect()->back()->with('error', 'Password is wrong!');
                    }
                  }
                  else 
                  return redirect()->back()->with(['email_error'=>'Please verify your email first!','href'=>url('verify/email').'/'.$request->email]);

            }
            else 
            return redirect()->back()->with('message', 'Your profile is under-review!');


          }
            else 
            return redirect()->back()->with('message', 'Your email address does not exists ');

        }

        function updatelawyerimageByLawyer(Request $request){
        //   $thumbnail = $request->file('image');
        //   $thumbnailimage = rand().'.'.$thumbnail->getClientOriginalExtension();
        //   $thumbnail->move(public_path('images'), $thumbnailimage);
          
      if(isset($request->image)){
      $thumbnailimage = $this->sendimagetodirectory($request->image);
        }else{
            
           $thumbnailimage =  $request->old_image;
        }
          $id = $request->id;
          $var=new AdminController();
          $data = array('image'=>$thumbnailimage,'og_image'=>$thumbnailimage,'name' => $request->name,'service' => $request->service,'city' => $request->city,'phonenumber'=>$request->phoneno,'website' => $request->websitelink,'education'=>$request->education,'url' => $var->uniqueUsername($request->name));
          
    
        
          lawyers::where('id', $id)->update($data);
          $data = DB::table('lawyers')->where('id', $id)->get()->first();
        //  return view('pages.lawyerAuth.editProfile')->with(array('data'=>$data));
          return redirect()->back()->with('message', 'Profile Updated Successfully');
        }
       public function getcitiesForLawyers($id)
        {
            $data = DB::table('cities')->where('status' , 1)->where('serviceid' , $id)->get();
            foreach ($data as $r) {
                echo "<option value='".$r->id."'>".$r->tittle."</option>";
            }
            
        }

        public function myprofile(){
         
          $data = DB::table('lawyers')->where('id', session()->get('user'))->get()->first();
          $reviews=lawyerreviews::where('lawyers_id', session()->get('user'))->get();
          $fileList = glob(public_path( 'embededLogo/*'));
          foreach($fileList as $filename){
            if(is_file($filename)){
                $file=explode('/',$filename);
               // $extensionless=explode('.',end($file));
                $pics[]=end($file);
              // $html[]= array('filename'=> $extensionless[0],'path'=> $emailurl.'/resources/views/admin/savedemails/'.end($file)); 
            }   
        }
        return view('pages.lawyerAuth.profile',compact('data','reviews','pics'));
        //  echo session()->get('user');
        }

        public function updateUnapprovedLawyer(Request $request){
        //    dd($request);
          $name = $request->name;
          $bio = $request->bio;
          $officeaddress = $request->officeaddress;
          $phonenumber = $request->phoneno;
          $emailaddress = $request->email;
          $website = $request->websitelink;
          $facebook = $request->facebook;
          $twitter = $request->twitter;
          $fax = $request->fax;
          $linkdlin = $request->linkdlin;
          // $r_experience = $request->ratting_experience;
          // $r_personal = $request->ratting_assesments;
          // $r_online_reviews = $request->ratting_reviews;
          // $r_online_profiles = $request->ratting_profiles;
          $tagline = $request->tagline;
          $education = $request->education;
          $categoryid = $request->categoryid;
          $cityid = $request->cityid;
  
          $field1 = $request->field1;
          $field2 = $request->field2;
          $field3 = $request->field3;
          $field4 = $request->field4;
          $link1 = $request->link1;
          $link2 = $request->link2;
          $link3 = $request->link3;
          $link4 = $request->link4;
          
          $professional = $request->professional;
          $youtube = $request->youtube;
         // $status=0;
          $id = $request->id;
         // dd($id);
               $var=new AdminController();
             $url = $var->uniqueUsername($request->name);


            $email=lawyers::where('id',$id)->first();
            if($email->approve_profile == 0)
            {
            $data = array('categoryid'=>$categoryid ,'lawyerApprovedid' => $id ,'image' =>$email->image, 'password' =>$email->password,'url'=>$url ,'status'=>0,'field1'=>$field1,'field2'=>$field2,'field3'=>$field3,'field4'=>$field4,'link1'=>$link1,'link2'=>$link2,'link3'=>$link3,'link4'=>$link4,'mettatittle'=>$name,'metadescription'=>$bio,'citiyid'=>$cityid,'name'=>$name,'bio'=>$bio,'officeaddress'=>$officeaddress,'phonenumber'=>$phonenumber,'emailaddress'=>$emailaddress,'website'=>$website,'facebook'=>$facebook,'twitter'=>$twitter,'fax'=>$fax,'linkdlin'=>$linkdlin,'education'=>$education,'tagline'=>$tagline,'registeredBy'=>'admin','youtube' => $youtube,'professional' => $professional);
            unapprovedlawyers::insert($data);
             return redirect()->back()->with('message', 'Your request is submitted.We will review your update and notify you shortly.');

            }else
            {
            $data = array('categoryid'=>$categoryid ,'url'=>$url ,'status'=>1,'field1'=>$field1,'field2'=>$field2,'field3'=>$field3,'field4'=>$field4,'link1'=>$link1,'link2'=>$link2,'link3'=>$link3,'link4'=>$link4,'mettatittle'=>$name,'metadescription'=>$bio,'citiyid'=>$cityid,'name'=>$name,'bio'=>$bio,'officeaddress'=>$officeaddress,'phonenumber'=>$phonenumber,'emailaddress'=>$emailaddress,'website'=>$website,'facebook'=>$facebook,'twitter'=>$twitter,'fax'=>$fax,'linkdlin'=>$linkdlin,'education'=>$education,'tagline'=>$tagline,'registeredBy'=>'lawyer','youtube' => $youtube,'professional' => $professional);
            lawyers::where('id', $id)->update($data);
            
            if($request->has('moreprofile'))

        {
            foreach($request['moreprofile']  as $key => $value)
            {
                
                DB::table('lawyer_more_profile')->insert([
                    'lawyer_id' => $id,
                    'profile' => $request['moreprofile'][$key]
                    
                    ]);
                }

        }
        
           if($request->has('updatemoreprofile'))

        {
            foreach($request['updatemoreprofile']  as $key => $value)
            {
             DB::table('lawyer_more_profile')
             ->where('id',$request->profie_id[$key])
             ->update([
              'profile' => $request['updatemoreprofile'][$key]
                    
                    ]);
            }

        }
        return redirect()->back()->with('message', 'Profile Updated Successfully');

            }

        }

        function updatePasswordByLawyer(Request $r){
            if(lawyers::where('id',$r->id)->exists()){
              $getpassword=lawyers::where('id',$r->id)->pluck('password')->first();
             // if (password_verify($r->oldpass, $getpassword)) {
              if ($r->oldpass== $getpassword) {
                lawyers::where('id',$r->id)->update([
                  'password'=>$r->newpass//password_hash($r->newpass, PASSWORD_DEFAULT)
                ]);
                return redirect()->back()->with('message', 'Password Updated!');

            }
            else 
            return redirect()->back()->with('message', 'old password is wrong!');
            

        }
        return redirect()->back()->with('message', 'Something went wrong');
      }

      function logout(){
        session()->forget('user');
        return redirect('signin/lawyer');
      }
      public function verify_email($email){
       
        if(lawyers::where('emailaddress',$email)->exists()){
          $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
          $code=substr(str_shuffle($permitted_chars), 0, 60);
          $name=lawyers::where('emailaddress',$email)->pluck('name')->first();
          DB::table('emailverify')->updateOrInsert(['email'=>$email],['code'=>$code]);
           
           $data= [
          'name'=>$name,
          'code'=>$code,
          'type'=>'email'
        ];
     
        Mail::send('pages.lawyerAuth.emailverification', $data, function($message) use ($email) {
          $message->to($email, env('MAIL_FROM_NAME'))->subject('Email Verification!');
          $message->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));
          });
          
        return redirect()->back()->with('message', 'Verification Email Sent Successfully!');
        }
        else 
        return redirect()->back()->with('message', 'Email does not exists!');
      }

      public function verify_email_end($code){
      //  $code=$_GET['code'];
        //if(DB::table('user')->where('email',$email)->exists()){
            if(DB::table('emailverify')->where('code',$code)->exists()){
                $email= DB::table('emailverify')->where('code',$code)->pluck('email')->first();
                DB::table('lawyers')->where('emailaddress',$email)->update(['email_verified'=>'true']);
               //  if(isset($_SESSION['userLogined'])){
               //  $_SESSION['userLogined'] = DB::table('user')->where('email', $email)->first();
               //  return redirect()->route('playlists');
               //  }
               //  else   return redirect()->route('/');

                     return redirect('signin/lawyer');
            }
            else echo "Link Expired";
      }
      public function fogetPassword(){
        return view('pages.lawyerAuth.forgetPassword');
      }
      public function sendcodeforpasswordforget(Request $r){
        $email=$r->email;
        if(lawyers::where('emailaddress',$email)->exists()){
          $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
          $code=substr(str_shuffle($permitted_chars), 0, 60);
          $name=lawyers::where('emailaddress',$email)->pluck('name')->first();
          DB::table('emailverify')->updateOrInsert(['email'=>$email],['code'=>$code]);
         
        $data=['name'=>$name,'code'=>$code,'type'=>'password'];
        Mail::send('pages.lawyerAuth.emailverification', $data, function($message) use ($email)
        {    
            $message->to($email)->subject('Password Reset');    
        });
        return redirect()->back()->with('message', 'A password reset link send to your email account.');
        }
        else 
        return redirect()->back()->with('message', 'Email does not exists!');
      }

      public function password_reset($code){
          return view('pages.lawyerAuth.resetPassword',compact('code'));
      }
      public function verify_password_end(Request $r){
        $code =$r->code;
        if(DB::table('emailverify')->where('code',$code)->exists()){
          $email= DB::table('emailverify')->where('code',$code)->pluck('email')->first();
          $id=lawyers::where('emailaddress',$email)->pluck('id')->first();
          if(lawyers::where('id',$id)->exists()){
            $getpassword=lawyers::where('id',$id)->pluck('password')->first();
            if ($r->password==$r->c_password) {
              lawyers::where('id',$id)->update([
                'password'=>$r->password //password_hash($r->password, PASSWORD_DEFAULT)
              ]);
              return redirect('signin/lawyer')->with('message', 'Password Updated! you can sign in know');
          }
          else 
          return redirect()->back()->with('message', ' password does not match!');
          

          //return redirect('signin/lawyer');
      }
      else echo "Link Expired";
      }
    }

    //---------------claim profile module ---------------------

    public function claim_profile(Request $r){
      //dd($r);
      DB::table('claim_profile')->insert([
        'name'=>$r->name,
        'email'=>$r->email,
        'phone'=>$r->phone,
        'description'=>$r->description,
        'claimed_username'=>$r->username,
        'claimed_at'=>date('Y-m-d'),
        'claimed_user'=>$r->userid
      ]);
      return redirect()->back()->with('message','Your request to claim this profile is submitted. Admin will review and let you know Thanks!’
      ');
      
    }
    
     public function categorysitemap()
  {

            $xmlContent = '<?xml version="1.0" encoding="UTF-8"?>' . PHP_EOL;
            $xmlContent .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . PHP_EOL;
        
        // Add items to the sitemap using a foreach loop
        $data = DB::table('categories')->where('status', 1)->get();
        
        foreach ($data as $category) {
            
            $updated_at = Carbon::parse($category->updated_at);
            $lastmod = $updated_at->format('Y-m-d\TH:i:sP');
  
            $xmlContent .= '<url>';
            $xmlContent .= '<loc>' . URL::to('lawyers/' . $category->url) . '</loc>';
            $xmlContent .= '<lastmod>' . $lastmod . '</lastmod>';
            $xmlContent .= '<priority>1.0</priority>';
            $xmlContent .= '<changefreq>daily</changefreq>';
            $xmlContent .= '</url>' . PHP_EOL;
        }
        
        $xmlContent .= '</urlset>';
        
        $file = 'sitemaps.xml';
        file_put_contents($file, $xmlContent);
        
        return response($xmlContent)->header('Content-Type', 'text/xml');
  }
  
   public function sitemap()
    {

      $xmlContent = '<?xml version="1.0" encoding="UTF-8"?>' . PHP_EOL;
      $xmlContent .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . PHP_EOL;
      
      
        $city = DB::table('categories')->select('cities.url AS c_url','categories.url AS url','cities.updated_at AS updated')->Join('cities','cities.serviceid','=','categories.id')->get();
 
            foreach ($city as $url) {
            
            
         $updated_at = Carbon::parse($url->updated);
         $lastmod = $updated_at->format('Y-m-d\TH:i:sP');
  
              $xmlContent .= '<url>';
              $xmlContent .= '<loc>' . URL::to('lawyers/' . $url->url.'/'.$url->c_url) . '</loc>';
              $xmlContent .= '<lastmod>' . $lastmod . '</lastmod>';
              $xmlContent .= '<priority>1.0</priority>';
              $xmlContent .= '<changefreq>daily</changefreq>';
              $xmlContent .= '</url>' . PHP_EOL;
          }
  
          $xmlContent .= '</urlset>';
        
          $file =  'cities.xml';
          file_put_contents($file, $xmlContent);
          return response($xmlContent)->header('Content-Type', 'text/xml');

  }
  
     public function profile(){
         
          $data = DB::table('lawyers')->where('id', session()->get('user'))->get()->first();
           return view('pages.lawyerAuth.myprofile',compact('data'));
        //  echo session()->get('user');
        }
          public function dashboard(){
         
          $data = DB::table('lawyers')->where('id', session()->get('user'))->get()->first();
          $review = DB::table('lawyerreviews')->where('lawyers_id', session()->get('user'))->orderby('id','DESC')->limit(4)->get();
           return view('pages.lawyerAuth.dashboard',compact('data','review'));
        
        }
    public function Review()
            {
         
          $data = DB::table('lawyers')->where('id', session()->get('user'))->get()->first();
          $review = DB::table('lawyerreviews')->where('lawyers_id', session()->get('user'))->get();
          
           return view('pages.lawyerAuth.review',compact('data','review'));
        //  echo session()->get('user');
        }
        
         public function BoostPlan()
            {
         
          $data = DB::table('lawyers')->where('id', session()->get('user'))->get()->first();
          $plan = DB::table('boostplan')->orderby('id','ASC')->get();
          $checkplan = DB::table('boostplan')->orderby('id','ASC')->first();
          $lawyerplan = DB::table('lawyerplan')->where('user_id', session()->get('user'))->where('status',1)->get();
          return view('pages.lawyerAuth.boostplan',compact('data','plan','checkplan','lawyerplan'));
        //  echo session()->get('user');
        }
        
            public function SavelawyerBoostPlan(Request $request)
            {
              
        $price = $request->planprice;
        $dicount = 0;
        if(count($request->categoryid) > 1)
        {
         $price = round($request->planprice -(15*100/100),0);
         $dicount = '15%';
        }
        DB::table('lawyerplan')->insert([
        'plan_id'=> $request->plan_id,
        'user_id'=> session()->get('user'),
        'category'=>implode(',', $request->categoryid),
        'area'=>implode(',', $request->cityid),
        'totalprice' => $price,
        'dicount' => $dicount
      ]);
      
        $lawyerplan = DB::table('lawyerplan')->where('user_id', session()->get('user'))->where('status',0)->orderby('id','DESC')->first();

      
        foreach($request['categoryid']  as $key => $value)
            {
                
                DB::table('lawyerboost')->insert([
                    'lawyerplan_id' => $lawyerplan->id,
                    'user_id' => session()->get('user'),
                    'service' => $request['categoryid'][$key],
                    'city' => $request['cityid'][$key],
                    
                    ]);
                }

        $Id= Crypt::encrypt($request->plan_id);

        return redirect('profile/boost/checkout/'.$Id);

            }
            
          public function BoostCheckout($id)
            {
            $Id =  Crypt::decrypt($id);
         $data = DB::table('lawyers')->where('id', session()->get('user'))->get()->first();
         $lawyerplan = DB::table('lawyerplan')->where('user_id', session()->get('user'))->where('status',0)->first();
          $plan = DB::table('boostplan')->where('id',$lawyerplan->plan_id)->first();

          return view('pages.lawyerAuth.boostplancheckout',compact('data','lawyerplan','plan'));
        }
        
         public function generateClientToken()
    {
        $gateway = new \Braintree\Gateway([
            'environment' => env('BRAINTREE_ENV'),
            'merchantId' => env("BRAINTREE_MERCHANT_ID"),
            'publicKey' => env("BRAINTREE_PUBLIC_KEY"),
            'privateKey' => env("BRAINTREE_PRIVATE_KEY")
        ]);

        $clientToken = $gateway->clientToken()->generate();

        return response()->json(['clientToken' => $clientToken]);
    }
    
     public function processPayment(Request $request)
    {
        $gateway = new \Braintree\Gateway([
            'environment' => env('BRAINTREE_ENV'),
            'merchantId' => env("BRAINTREE_MERCHANT_ID"),
            'publicKey' => env("BRAINTREE_PUBLIC_KEY"),
            'privateKey' => env("BRAINTREE_PRIVATE_KEY")
        ]);
        
        $value = $request['value'];


        $result = $gateway->transaction()->sale([
            'amount' => $value,
            'paymentMethodNonce' => $request->input('nonce'),
            'options' => [
                'submitForSettlement' => true
            ]
        ]);
        
     
     
           $plan = DB::table('boostplan')->where('id',$request->plan_id)->first();
           $newDateTime = Carbon::now()->addDays($plan->plan_type);

            DB::table('lawyerplan')
            ->where('user_id',session()->get('user'))
            ->where('id',$request->planid)
            ->where('status',0)
            ->update([
                'status' => 1,
                'plan_expiry' => $newDateTime,
                'plan_feature' => 1
                
            ]);
            
            $booking = DB::table('lawyerplan')
            ->where('user_id',session()->get('user'))
            ->where('id',$request->planid)
            ->where('status',1)
            ->orderby('id','DESC')->first();

       
           DB::table('payment_details')->insert([
               'user_id' => session()->get('user'),
               'purchase_id' => $booking->id,
               'amount' => $value,
               'status' => 1,
                'card_no' =>$result->transaction->id,
           ]);



        if ($result->success) {
       
            return response()->json(['success' => true, 'message' => 'Your Plan is Complete']);
        } else {
            // Payment failed
            return response()->json(['success' => false, 'message' => $result->message]);
        }
    }
    
         public function SaveCustomtPlan(Request $request)
            {
                
        DB::table('customplan')->insert([
        'lawyer_id'=>  session()->get('user'),
        'name'=> $request->name,
        'contact' =>$request->contact,
        'detail' =>$request->description,
      ]);

      return redirect()->back()->with('message','Your request  is submitted.!');


            }
            
        public function Badge(){
         
          $data = DB::table('lawyers')->where('id', session()->get('user'))->get()->first();

          $fileList = glob(public_path( 'embededLogo/*'));
          foreach($fileList as $filename){
            if(is_file($filename)){
                $file=explode('/',$filename);
               // $extensionless=explode('.',end($file));
                $pics[]=end($file);
              // $html[]= array('filename'=> $extensionless[0],'path'=> $emailurl.'/resources/views/admin/savedemails/'.end($file)); 
            }   
        }
        return view('pages.lawyerAuth.badge',compact('data','pics'));
        //  echo session()->get('user');
        }
            
            public function Boostupdate()
            {
             $lawyerplan = DB::table('lawyerplan')->where('plan_feature',1)->where('status',1)->where('plan_expiry','<=',Carbon::now())->update(['plan_feature' => 0]);

        }
        
}