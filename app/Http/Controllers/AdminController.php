<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\categories;
use App\Models\cities;
use App\Models\lawyers;
use App\Models\lawyerreviews;
use App\Models\adminnotifications;
use App\Models\blogs;
use App\Models\nominations;
use App\Models\sitesettings;
use App\Models\unapprovedlawyers;
use Auth;
use DB;
use App\Models\User;
//use Mail;
use Validator;
use Illuminate\Validation\Rule;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;


class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
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
    public function adminnotification($url , $notification , $type)
    {
      $notifye = new adminnotifications;
      $notifye->url = $url;
      $notifye->notification = $notification;
      $notifye->readstatus = 1;
      $notifye->type = $type;
      $notifye->save();
    }
    public function addcategory()
    {
        return view('admin.categories.add');
    }
    public function allcategory()
    {
        $data = categories::where('status', 1)->get();
        return view('admin.categories.all')->with(array('data'=>$data));
    }
    public function createcategory(Request $request)
    {
        $thumbnail = $request->file('thumbnailimage');
        $thumbnailimage = rand().'.'.$thumbnail->getClientOriginalExtension();
        $thumbnail->move(public_path('images'), $thumbnailimage);
        $tittle = $request->tittle;
        $shortdescription = $request->description;
        $category = new categories;
        $category->url = $this->slugify($request->tittle);
        $category->tittle = $tittle;
        $category->description = $shortdescription;
        $category->thumbnail = $thumbnailimage;
        $category->mettatittle = $tittle;
        $category->metadescription = $shortdescription;
        $category->og_image = $thumbnailimage;
        $category->status = 1;
        $category->save();
        return redirect()->back()->with('message', 'Category Successfully Inserted');
    }
    public function editcategory($id)
    {
        $data = DB::table('categories')->where('id' , $id)->get()->first();
        return view('admin.categories.edit')->with(array('data'=>$data));
    }
    public function updatecategory(Request $request)
    {
        $tittle = $request->tittle;
        $description = $request->description;
        $id = $request->id;
        $data = array('mettatittle'=>$tittle,'metadescription'=>$description,'tittle'=>$tittle,'description'=>$description);
        categories::where('id', $id)->update($data);
        return redirect()->back()->with('message', 'Category Content Updated Successfully');
    }
    public function updatecategorythumbnail(Request $request)
    {
        $thumbnail = $request->file('thumbnailimage');
        $thumbnailimage = rand().'.'.$thumbnail->getClientOriginalExtension();
        $thumbnail->move(public_path('images'), $thumbnailimage);
        $id = $request->id;
        $data = array('thumbnail'=>$thumbnailimage,'og_image'=>$thumbnailimage);
        categories::where('id', $id)->update($data);
        return redirect()->back()->with('message', 'Thumbnail Image Updated Successfully');
    }
    public function deletecategory($id)
    {
        $data = DB::table('lawyers')->where('categoryid' , $id)->get();
        if (!empty($data)) {
            foreach ($data as $r ) {
                $changestatuslawyers = array('status'=>0);
                lawyers::where('id', $r->id)->update($changestatuslawyers);
            }
        } 
        $data2 = DB::table('cities')->where('serviceid' , $id)->get();
        if (!empty($data2)) {
            foreach ($data2 as $r ) {
                $changestatuscities = array('status'=>0);
                cities::where('id', $r->id)->update($changestatuscities);
            }
        }
        $changestatuscategory = array('status'=>0);
        categories::where('id', $id)->update($changestatuscategory);
        return redirect()->back()->with('message', 'Delete Category Successfully');
    }
    public function addcity()
    {
        return view('admin.cities.add');
    }
    public function allcities()
    {
        $data = cities::where('status', 1)->get();
        return view('admin.cities.all')->with(array('data'=>$data));
    }
    public function createcity(Request $request)
    {
        $data = DB::table('categories')->where('id' , $request->serviceid)->get()->first();
        // $thumbnail = $request->file('thumbnailimage');
        // $thumbnailimage = rand().'.'.$thumbnail->getClientOriginalExtension();
        // $thumbnail->move(public_path('images'), $thumbnailimage);
        $tittle = $request->tittle;
        $shortdescription = $request->description;
        $category = new cities;
        $category->url = $this->slugify($request->tittle);
        $category->tittle = $tittle;
        $category->serviceid = $request->serviceid;
        $category->description = $shortdescription;
        // $category->thumbnail = $thumbnailimage;
        $category->mettatittle = "Best ".$data->tittle." Lawyers In " .$tittle;
        $category->metadescription = $shortdescription;
        // $category->og_image = $thumbnailimage;
        $category->status = 1;
        $category->save();
        return redirect()->back()->with('message', 'City Successfully Inserted');
    }
    public function editcity($id)
    {
        $data = DB::table('cities')->where('id' , $id)->get()->first();
        return view('admin.cities.edit')->with(array('data'=>$data));
    }
    public function updatecity(Request $request)
    {
        $tittle = $request->tittle;
        $description = $request->description;
        $id = $request->id;
        $data = array('mettatittle'=>$tittle,'metadescription'=>$description,'tittle'=>$tittle,'description'=>$description);
        cities::where('id', $id)->update($data);
        return redirect()->back()->with('message', 'Category Content Updated Successfully');
    }
    public function updatecitythumbnail(Request $request)
    {
        $thumbnail = $request->file('thumbnailimage');
        $thumbnailimage = rand().'.'.$thumbnail->getClientOriginalExtension();
        $thumbnail->move(public_path('images'), $thumbnailimage);
        $id = $request->id;
        $data = array('thumbnail'=>$thumbnailimage,'og_image'=>$thumbnailimage);
        cities::where('id', $id)->update($data);
        return redirect()->back()->with('message', 'Thumbnail Image Updated Successfully');
    }
    public function deletecity($id)
    {
        $data = DB::table('lawyers')->where('citiyid' , $id)->get();
        $data2 = DB::table('lawyers')->where('citiyid' , $id)->get();
        if (empty($data)) {
            $data = array('status'=>0);
            cities::where('id', $id)->update($data);
            return redirect()->back()->with('message', 'Delete City Successfully');
        }else{
            foreach ($data2 as $r) {
                $data2 = array('status'=>0);
                lawyers::where('id', $r->id)->update($data2);
            }
            $data3 = array('status'=>0);
            cities::where('id', $id)->update($data3);
            return redirect()->back()->with('message', 'Delete City Successfully');
        }        
    }
    public function addlawyer()
    {
        return view('admin.lawyers.add');
    }
    public function alllawyers()
    {
        $data = lawyers::where('status', 1)->orderby('id' , 'DESC')->get();
        return view('admin.lawyers.all')->with(array('data'=>$data));
    }
     function uniqueUsername($name){
        $url=$this->slugify($name);
        $countNames=lawyers::where('name',$name)->count();
        //$uniqueurl='';
       // $index=1;
       $url=$url.'-'.++$countNames;
        return $url;
    }
    public function createlawyer(Request $request)
    {

        if(!empty($request->file('image'))){
            $image = $request->file('image');
            $lawyerimage = rand().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('images'), $lawyerimage);
        }else{
            $lawyerimage = 'imagplaceholder.jpg';
        }
        $url=$this->uniqueUsername($request->name);
        $lawyer = new lawyers;
        $lawyer->name = $request->name;
        $lawyer->url = $url;
        $lawyer->categoryid = $request->serviceid;
        $lawyer->citiyid = $request->cityid;
        $lawyer->bio = $request->bio;
        $lawyer->image = $lawyerimage;
        $lawyer->officeaddress = $request->officeaddress;
        $lawyer->phonenumber = $request->phoneno;
        $lawyer->emailaddress = $request->email;
        $lawyer->website = $request->websitelink;
        $lawyer->facebook = $request->facebook;
        $lawyer->twitter = $request->twitter;
        $lawyer->fax = $request->fax;
        $lawyer->featured = 0;
        $lawyer->linkdlin = $request->linkdlin;
        $lawyer->r_experience = $request->ratting_experience;
        $lawyer->r_personal = $request->ratting_assesments;
        $lawyer->r_online_reviews = $request->ratting_reviews;
        $lawyer->r_online_profiles = $request->ratting_profiles;
        $lawyer->education = $request->education;
        $lawyer->tagline = $request->tagline;
        if($request->featuredortop == 1)
        {
            $lawyer->featured = 1;
        }else{
            $lawyer->toplawyers = 1;
        }
        $lawyer->field1 = $request->field1;
        $lawyer->field2 = $request->field2;
        $lawyer->field3 = $request->field3;
        $lawyer->field4 = $request->field4;
        $lawyer->link1 = $request->link1;
        $lawyer->link2 = $request->link2;
        $lawyer->link3 = $request->link3;
        $lawyer->link4 = $request->link4;        
        $lawyer->status = 1;
        $lawyer->mettatittle = $request->name;
        $lawyer->metadescription = $request->bio;
        $lawyer->og_image = $lawyerimage;

        $lawyer->save();
        return redirect()->back()->with('message', 'Lawyer Successfully Inserted');
    }
    public function editlawyer($id,$unapproved=null)
    {
        
    if($unapproved=='true'){
        $data =unapprovedlawyers::where('id',$id)->get()->first();
        if($data->lawyerApprovedid==null)
        $data->lawyerApprovedid=-1;
        else
        $original_data=lawyers::where('id',$data->lawyerApprovedid)->first();
        }
        else
        $data = DB::table('lawyers')->where('id' , $id)->get()->first();
        return view('admin.lawyers.edit')->with(array('data'=>$data,'od'=>isset($original_data)?$original_data:''));
     // dd($data);
    }
    public function updatelawyer(Request $request)
    {
   
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
        $r_experience = $request->ratting_experience;
        $r_personal = $request->ratting_assesments;
        $r_online_reviews = $request->ratting_reviews;
        $r_online_profiles = $request->ratting_profiles;
        $tagline = $request->tagline;
        $education = $request->education;
        $serviceid = $request->serviceid;
        $cityid = $request->cityid;

        $field1 = $request->field1;
        $field2 = $request->field2;
        $field3 = $request->field3;
        $field4 = $request->field5;
        $link1 = $request->link1;
        $link2 = $request->link2;
        $link3 = $request->link3;
        $link4 = $request->link4;

        $id = $request->id;
        $data = array('field1'=>$field1,'approve_profile' => '1','email_verified' =>'true','status' => 1,'field2'=>$field2,'field3'=>$field3,'field4'=>$field4,'link1'=>$link1,'link2'=>$link2,'link3'=>$link3,'link4'=>$link4,'mettatittle'=>$name,'metadescription'=>$bio,'categoryid'=>$serviceid,'citiyid'=>$cityid,'name'=>$name,'bio'=>$bio,'officeaddress'=>$officeaddress,'phonenumber'=>$phonenumber,'emailaddress'=>$emailaddress,'website'=>$website,'facebook'=>$facebook,'twitter'=>$twitter,'fax'=>$fax,'linkdlin'=>$linkdlin,'r_experience'=>$r_experience,'r_personal'=>$r_personal,'r_online_reviews'=>$r_online_reviews,'r_online_profiles'=>$r_online_profiles,'education'=>$education,'tagline'=>$tagline);
        lawyers::where('id', $id)->update($data);
        unapprovedlawyers::where('lawyerApprovedid', $id)->update($data);
        return redirect()->back()->with('message', 'Lawyer Data Updated Successfully');
    }
    public function updatelawyerimage(Request $request)
    {
        $thumbnail = '';
        if($request->has('image'))
        {
            $thumbnail = $request->file('image');

        
        
        $thumbnailimage = rand().'.'.$thumbnail->getClientOriginalExtension();
        $thumbnail->move(public_path('images'), $thumbnailimage);
        $id = $request->id;
        $data = array('image'=>$thumbnailimage,'og_image'=>$thumbnailimage);
        lawyers::where('id', $id)->update($data);
        }
        return redirect()->back()->with('message', 'Thumbnail Image Updated Successfully');
    }
    public function deletelawyer($id)
    {
        $data = array('status'=>0);
        lawyers::where('id', $id)->update($data);
        return redirect()->back()->with('message', 'Delete Lawyer Successfully');
    }
    public function allreviews()
    {
        $data = lawyerreviews::all();
        return view('admin.reviews.index')->with(array('data'=>$data));
    }
    public function editreview($id)
    {
       $reviews = DB::table('lawyerreviews')->where('id', $id)->first();
       $name = $reviews->name;
       $email = $reviews->email;
       $review = $reviews->review;
       $rattings = $reviews->rattings;
       $status = $reviews->status;
       $lawyers_id = $reviews->lawyers_id;
       $id = $reviews->id;
       return response()->json(['name' => $name,'email' => $email,'review' => $review,'rattings' => $rattings,'status' => $status,'lawyers_id' => $lawyers_id,'id' => $id]);
    }
    public function updatereview(Request $request)
    {
        $lawyerid = $request->lawyerid;
        $rattings = $request->rattings;
        $status = $request->status;
        $review = $request->review;
        $name = $request->name;
        $email = $request->email;
        $id = $request->id;
        $data = array('name'=>$name,'email'=>$email,'review'=>$review,'rattings'=>$rattings,'status'=>$status,'lawyers_id'=>$lawyerid);
        lawyerreviews::where('id', $id)->update($data);
        return redirect()->back()->with('message', 'Review Updated Successfully');
    }
    public function deletereview($id)
    {
        DB::table('lawyerreviews')->delete($id);
        return redirect()->back()->with('message', 'Delete Review Successfully');
    }
    
    public function addblog()
    {
        return view('admin.blogs.add');
    }
    public function allblogs()
    {
        $data = blogs::all();
        return view('admin.blogs.all')->with(array('data'=>$data));
    }
    public function createblog(Request $request)
    {
        $url = $this->slugify($request->tittle);
        $image = $request->file('image');
        $blogimage = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $blogimage);
        $saveblog = new blogs;
        $saveblog->image = $blogimage;
        $saveblog->url = $url;
        $saveblog->status = 1;
        $saveblog->tittle = $request->tittle;
        $saveblog->blogdate = $request->blogdate;
        $saveblog->description = $request->blog;
        $saveblog->shortdescription = $request->blogshortdescription;

        $saveblog->mettatittle = $request->tittle;
        $saveblog->metadescription = $request->blogshortdescription;
        $saveblog->og_image = $blogimage;

        $saveblog->save();
        return redirect()->back()->with('message', 'Blog Successfully Inserted');
    }
    public function updateblog(Request $request)
    {
        $url = $this->slugify($request->tittle);
        $tittle = $request->tittle;
        $blogdate = $request->blogdate;
        $blog = $request->blog;
        $id =  $request->id;
        $blogshortdescription = $request->blogshortdescription;
        $data = array('mettatittle'=>$tittle,'metadescription'=>$blogshortdescription,'shortdescription'=>$blogshortdescription,'url'=>$url,"tittle"=>$tittle,"blogdate"=>$blogdate,"description"=>$blog);
        blogs::where('id', $id)->update($data);
        return redirect()->back()->with('message', 'Updated Successfully');
    }
    public function updateblogimage(Request $request)
    {
        $id =  $request->id;
        $image = $request->file('image');
        $blogimage = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $blogimage);
        $data = array('image'=>$blogimage,'og_image'=>$blogimage);
        blogs::where('id', $id)->update($data);
        return redirect()->back()->with('message', 'Updated Successfully');
    }
    public function editblog($id)
    {
        $data = DB::table('blogs')->where('id' , $id)->get()->first();
        return view('admin.blogs.edit')->with(array('data'=>$data));
    }
    public function deleteblog($id)
    {
        DB::table('blogs')->delete($id);
        return redirect()->back()->with('message', 'Delete Blog Successfully');
    }
    public function getcities($id)
    {
        $data = DB::table('cities')->where('status' , 1)->where('serviceid' , $id)->get();
        foreach ($data as $r) {
            echo "<option value='".$r->id."'>".$r->tittle."</option>";
        }
        
    }
    public function changetofeatured($second , $id)
    {
        $data = DB::table('lawyers')->where('id' , $second)->get()->first();
        $checktoplawyers = $data->toplawyers;
        if($checktoplawyers == 0){
            if($id == 1)
            {
                $data = array('featured'=>0);
            }else{
                $data = array('featured'=>1);
            }
            lawyers::where('id', $second)->update($data);
        }else{
            echo "error";
        }
    }
    public function toplawyers($second , $id)
    {
        $data = DB::table('lawyers')->where('id' , $second)->get()->first();
        $checktoplawyers = $data->featured;
        if($checktoplawyers == 0){
            if($id == 1)
            {
                $data = array('toplawyers'=>0);
            }else{
                $data = array('toplawyers'=>1);
            }
            lawyers::where('id', $second)->update($data);
        }else{
            echo "error";
        }
    }
    public function nominations()
    {
        $data = DB::table('nominations')->where('status' , 0)->get();
        return view('admin.nominations.all')->with(array('data'=>$data));
    }
    public function approvednomination()
    {
        $data = DB::table('nominations')->where('status' , 1)->get();
        return view('admin.nominations.all')->with(array('data'=>$data));
    }
    public function editnomination($id)
    {
        $data = DB::table('nominations')->where('id' , $id)->get()->first();
        return view('admin.nominations.edit')->with(array('data'=>$data));
    }
    public function changenominationstatus($one , $two)
    {
        if($two == 1)
        {
            $data = array('status'=>0);
        }else{
            $data = array('status'=>1);
        }
        nominations::where('id', $one)->update($data);
    }
    public function updatenominationimage(Request $request)
    {
        $id =  $request->id;
        $image = $request->file('image');
        $blogimage = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $blogimage);
        $data = array('image'=>$blogimage);
        nominations::where('id', $id)->update($data);
        return redirect()->back()->with('message', 'Updated Successfully');
    }
    public function updatenomination(Request $request)
    {
        $id =  $request->id;
        $r_experience = $request->ratting_experience;
        $r_personal = $request->ratting_assesments;
        $r_online_reviews = $request->ratting_reviews;
        $r_online_profiles = $request->ratting_profiles;
        $data = array('r_experience'=>$r_experience,'r_personal'=>$r_personal,'r_online_reviews'=>$r_online_reviews,'r_online_profiles'=>$r_online_profiles,'name'=>$request->name , 'bio'=>$request->bio ,'phonenumber'=>$request->phonenumber ,'emailaddress'=>$request->emailaddress ,'website'=>$request->website ,'votes'=>$request->votes);
        nominations::where('id', $id)->update($data);
        return redirect()->back()->with('message', 'Updated Successfully');
    }
    public function deletenomination($id)
    {
        DB::table('nominations')->delete($id);
        return redirect()->back()->with('message', 'Delete Nomination Successfully');
    }
    public function sitesettings()
    {
        $data = DB::table('sitesettings')->get()->first();
        return view('admin.settings.index')->with(array('data'=>$data));
    }
    public function updatewebsitetittle(Request $request)
    {
        $id = 1;
        $data = array('websitetittle'=>$request->websitetittle);
        sitesettings::where('id', $id)->update($data);
        return redirect()->back()->with('message', 'Updated Successfully');
    }
    public function updatecontactdetails(Request $request)
    {
        $phonenumber = $request->phonenumber;
        $email = $request->email;
        $address = $request->address;
        $latitude = $request->latitude;
        $longitue = $request->longitue;
        $data = array('address'=>$address,"phoneno"=>$phonenumber,"email"=>$email,"longitue"=>$longitue,"latitude"=>$latitude);
        sitesettings::where('id', 1)->update($data);
        return redirect()->back()->with('message', 'Updated Successfully');
    }
    public function updatesocialmedialinks(Request $request)
    {
        $facebook = $request->facebook;
        $twitter = $request->twitter;
        $instagram = $request->instagram;
        $linkdlin = $request->linkdlin;
        $data = array('facebook'=>$facebook,"twitter"=>$twitter,"instagram"=>$instagram,"linkdlin"=>$linkdlin);
        sitesettings::where('id', 1)->update($data);
        return redirect()->back()->with('message', 'Updated Successfully');
    }
    public function updatefootertext(Request $request)
    {
        $english = $request->english;
        $data = array('footertext'=>$english);
        sitesettings::where('id', 1)->update($data);
        return redirect()->back()->with('message', 'Updated Successfully');
    }
    public function updatewebsitelogo(Request $request)
    {
        $validatedData = $request->validate([
            'image' => "dimensions:max_width=165,max_height=45|required", 
        ]);
        $thumbnail = $request->file('image');
        $thumbnailimage = rand().'.'.$thumbnail->getClientOriginalExtension();
        $thumbnail->move(public_path('images'), $thumbnailimage);
        $data = array('logo'=>$thumbnailimage);
        sitesettings::where('id', 1)->update($data);
        return redirect()->back()->with('message', 'Updated Successfully');
    }
    public function updateenable(Request $request)
    {
        $data = array('logoenable'=>$request->enabale);
        sitesettings::where('id', 1)->update($data);
        return redirect()->back()->with('message', 'Updated Successfully');
    }
    public function contactmessage()
    {
       return view('admin.requests.contactrequests');
    }
    public function viewcontactrequests()
    {
        $data = DB::table('contacts')->get()->first();
        return view('admin.requests.viewcontactrequest')->with(array('data'=>$data));
    }
    public function profile()
    {
        return view('admin.profile.index');
    }
    public function updateprofile(Request $request)
    {
      $name = $request->name;
      $email = $request->email;
      $country = $request->country;
      $phone = $request->phone;
      $id =  Auth::user()->id;
      $data = array('name'=>$name,"email"=>$email,"country"=>$country,"phonenumber"=>$phone);
        user::where('id', $id)
        ->update($data);
      return redirect()->back()->with('message', 'Updated Successfully');
   }
    public function updatepassword(Request $request)
    {
      $password = $request->password;
      $password = Hash::make($request->password);
      $id =  Auth::user()->id;
      $data = array('password'=>$password);
        user::where('id', $id)
        ->update($data);
      return redirect()->back()->with('message', 'Updated Successfully');
   }

   function requestLawyers(){
    $data = unapprovedlawyers::where('registeredBy','lawyer')->whereNull('lawyerApprovedid')->orderby('id' , 'DESC')->get();
    return view('admin.lawyers.all')->with(array('data'=>$data));
  // dd($data);
   }
   function editrequestLawyers(){
    $data = unapprovedlawyers::where('registeredBy','lawyer')->whereNotNull('lawyerApprovedid')->orderby('id' , 'DESC')->get();
    return view('admin.lawyers.all')->with(array('data'=>$data));
  // dd($data);
   }

   function approveLawyers($id,$val){
    
    $request=unapprovedlawyers::where('id',$id)->first();
    //dd($request);
        if($val=='0'){
        unapprovedlawyers::where('id',$id)->update(['status'=>$val,'registeredBy'=>'lawyer']);
    lawyers::where('id',$request->lawyerApprovedid)->update(['status'=>$val,'registeredBy'=>'lawyer']);
    }
    if($val=='1'){
        $url=$this->uniqueUsername($request->name);
     //   $request=unapprovedlawyers::where('id',$id)->first();
        unapprovedlawyers::where('id',$id)->update(['status'=>$val,'registeredBy'=>'admin']);
            $lawyer = lawyers::find($request->lawyerApprovedid) ?? new lawyers;
          
            $lawyer->name = $request->name ?? '';
            $lawyer->url = $url;
            $lawyer->categoryid = $request->categoryid;
            $lawyer->citiyid = $request->citiyid;
            $lawyer->bio = $request->bio ?? '';
            $lawyer->image = $request->image ?? '';
            $lawyer->officeaddress = $request->officeaddress ?? '';
            $lawyer->phonenumber = $request->phonenumber ?? '';
            $lawyer->emailaddress = $request->emailaddress ?? '';
            $lawyer->website = $request->website ?? '';
            $lawyer->facebook = $request->facebook ?? '';
            $lawyer->twitter = $request->twitter ?? '';
            $lawyer->fax = $request->fax ?? '';
            $lawyer->featured = 0 ?? '';
            $lawyer->linkdlin = $request->linkdlin ?? '';
            $lawyer->r_experience = $request->r_experience ?? '';
            $lawyer->r_personal = $request->r_personal ?? '';
            $lawyer->r_online_reviews = $request->r_online_reviews ?? '';
            $lawyer->r_online_profiles = $request->r_online_profiles ?? '';
            $lawyer->education = $request->education ?? '';
            $lawyer->tagline = $request->tagline ?? '';
            // if($request->featuredortop == 1)
            // {
            //     $lawyer->featured = 1;
            // }else{
                $lawyer->toplawyers = 1;
            // }
            $lawyer->field1 = $request->field1 ?? '';
            $lawyer->field2 = $request->field2 ?? '';
            $lawyer->field3 = $request->field3 ?? '';
            $lawyer->field4 = $request->field4 ?? '';
            $lawyer->link1 = $request->link1 ?? '';
            $lawyer->link2 = $request->link2 ?? '';
            $lawyer->link3 = $request->link3 ?? '';
            $lawyer->link4 = $request->link4 ?? '';        
            $lawyer->status = 1;
            $lawyer->password=$request->password;
            $lawyer->mettatittle = $request->mettatittle ?? '';
            $lawyer->metadescription = $request->metadescription ?? '';
            $lawyer->og_image = $request->og_image ?? '';
            $lawyer->registeredBy='admin';
            $lawyer->updated_at=date('d-m-Y H:i:s');

           // AdminController::createOrUpdate(array('id'=>$request->lawyerApprovedid ?? ''),$lawyer);
            $lawyer->save();
            //return redirect()->back()->with('message', 'Lawyer Successfully Inserted');
     //   ]);
     if($request->lawyerApprovedid==''){
         $redirects=$request->lawyerApprovedid;
     $ids=lawyers::latest('id')->first()->id;
     unapprovedlawyers::where('id',$id)->update(['lawyerApprovedid'=>$ids]);
     }
     else 
     unapprovedlawyers::where('id',$id)->update(['lawyerApprovedid'=>$request->lawyerApprovedid]);
    }
    
   // return redirect('admin/editlawyer/'. unapprovedlawyers::where('id',$id)->pluck('lawyerApprovedid')->first());
    return redirect()->back();
}
  //----------------------------------------------------emails-------------------------------
public function emails($email=null){
   $emails=lawyers::get(['emailaddress']);
    if($email!=null){
        if (file_exists(resource_path( 'views/admin/savedemails/'.$email.'.html'))) {
            $fp= file_get_contents( resource_path( 'views/admin/savedemails/'.$email.'.html' ), 'r' );
            $filename=$email;
            return view('admin.emails.emails',compact('fp','filename','emails'));
        }
        else
        return redirect('admin/emails');

    }
    else
//$data=['name'=>'haris','data'=>'asdasd'];
// $user['to']='haris1192317043@gmail.com';
// Mail::send('admin.emails.emails',$data,function($message) use ($user){
//     $message->to($user['to']);
//     $message->subject('hello');
// });

    return view('admin.emails.emails',compact('emails'));
}

    
    public function save_email_templates(Request $r){
       // dd($r->email);
        if (file_exists(resource_path( 'views/admin/savedemails/'.$r->oldfilename.'.html'))) {
            rename(resource_path( 'views/admin/savedemails/'.$r->oldfilename.'.html'), resource_path( 'views/admin/savedemails/'.$this->slugify($r->filename).'.html' ));
            $fp= fopen( resource_path( 'views/admin/savedemails/'.$r->filename.'.html' ), 'w' );
            fwrite($fp, $r->email);
            fclose($fp);
        }
        else{
           $fp= fopen( resource_path( 'views/admin/savedemails/'.$this->slugify($r->filename).'.html' ), 'w' );
            fwrite($fp, $r->email);
            fclose($fp);
        }
    }
    public function get_saved_email_templates(){
        $html=[];
        $url=url()->current();
        $emailurl=trim($url,"admin/get-saved-email-templates");
        $fileList = glob(resource_path( 'views/admin/savedemails/*.html'));
        foreach($fileList as $filename){
            if(is_file($filename)){
                $file=explode('/',$filename);
                $extensionless=explode('.',end($file));
                
               $html[]= array('filename'=> $extensionless[0],'path'=> $emailurl.'/resources/views/admin/savedemails/'.end($file)); 
            }   
        }
        return $html;
    }
    public function send_emails(Request $r){
       // dd($r->to);
      if (file_exists(resource_path( 'views/admin/savedemails/'.$r->email.'.html'))){
        $emails = $r->to;
       $data=['name'=>'haris','data'=>'asdasd'];
  
        try{
        Mail::send('admin.savedemails.'.$r->email, $data, function($message) use ($emails)
        {    
            $message->bcc($emails)->subject('Top at Law');    
        });
    }
    catch(\Swift_RfcComplianceException $e){
        return response()->json('some email address does not exists on internet e.g. ('.$e->getMessage().')');
    }
        return response()->json('email sent');
      }
      else 
          return response()->json('something went wrong');
      
    }

    function delete_emails(Request $r){
        $name=$r->name;
        if(file_exists(resource_path( 'views/admin/savedemails/'.$name.'.html'))){
            unlink(resource_path( 'views/admin/savedemails/'.$name.'.html'));
        }
    }

//---------------------------------------------------end emails----------------------------
    function profile_claims(){
        $getProfiles=DB::table('claim_profile')->get();
        return view('admin.lawyers.claim_profile',compact('getProfiles'));
    }
    function profile_claims_delete($id){
        DB::table('claim_profile')->where('id',$id)->delete();
        return redirect()->back();
    }
    function profile_claimed_approve($email,$id,$cid){
        lawyers::where('id',$id)->update(['emailaddress'=>$email]);
        DB::table('claim_profile')->where('id',$cid)->delete();
        return redirect()->back();
    }
    public function addplan()
    {
        return view('admin.bootplan.addplan');
    }
    
       public function createplan(Request $request)
    {
  
        DB::table('boostplan')
        ->insert([
            'plan_title' => $request->tittle,
            'plan_price' =>$request->price,
            'plan_type' =>$request->plan_days,
            'plan_detail' => $request->description,
             'planfeature' => $request->plan_feature,
             'planfeature_1' => $request->planfeature_1,
             'planfeature_2' => $request->planfeature_2,
             'planfeature_3' => $request->planfeature_3,
            ]);
        return redirect()->back()->with('message', 'Plan Successfully Inserted');
    }
    
      public function allplan()
    {
        $data = DB::table('boostplan')->get();
        return view('admin.bootplan.allplan')->with(array('data'=>$data));
    }
    
       public function editplan($id)
    {
        $data = DB::table('boostplan')->where('id',$id)->first();
        return view('admin.bootplan.editplan')->with(array('data'=>$data));
    }
        public function updateplan(Request $request)
    {
        DB::table('boostplan')
        ->where('id',$request->id)
        ->update([
            'plan_title' => $request->tittle,
            'plan_price' =>$request->price,
            'plan_type' =>$request->plan_days,
            'plan_detail' => $request->description,
             'planfeature' => $request->plan_feature,
             'planfeature_1' => $request->planfeature_1,
             'planfeature_2' => $request->planfeature_2,
             'planfeature_3' => $request->planfeature_3,
            ]);
        return redirect()->back()->with('message', 'Boost Plan Updated Successfully');
    }
}