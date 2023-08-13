
<div class="left-side-menu">
   <a href="{{ url('admin/dashboard') }}" class="logo text-center logo-light">
   <span class="logo-lg">
   <img src="{{ asset('public/assets/images/logo.png') }}" alt="" height="16">
   </span>
   <span class="logo-sm">
   <img src="{{ asset('public/assets/images/logo_sm.png') }}" alt="" height="16">
   </span>
   </a>
   <a href="{{ url('admin/dashboard') }}" class="logo text-center logo-dark">
   <span class="logo-lg">
   <img src="{{ asset('public/assets/images/logo-dark.png') }}" alt="" height="16">
   </span>
   <span class="logo-sm">
   <img src="{{ asset('public/assets/images/logo_sm_dark.png') }}" alt="" height="16">
   </span>
   </a>
   <div class="h-100" id="left-side-menu-container" data-simplebar>
      <ul class="metismenu side-nav">
         <li class="side-nav-title side-nav-item">Navigation</li>
         <li class="side-nav-item">
            <a href="{{ url('admin/dashboard') }}" class="side-nav-link" onclick="sessionStorage.setItem('title','')">
            <i class="uil-home-alt"></i>
            <span> Dashboards </span>
            </a>
         </li>
         <li class="side-nav-item">
            <a href="javascript: void(0);" class="side-nav-link">
            <i class="uil uil-list-ul"></i>
            <span> Categories  </span>
            <span class="menu-arrow"></span>
            </a>
            <ul class="side-nav-second-level" aria-expanded="false">
               <li>
                  <a href="{{ url('admin/addcategory') }}">Add Category</a>
               </li>
               <li>
                  <a href="{{ url('admin/allcategories') }}">All Categories</a>
               </li>
            </ul>
         </li>
         <li class="side-nav-item">
            <a href="javascript: void(0);" class="side-nav-link">
            <i class="mdi mdi-city"></i>
            <span> Cities </span>
            <span class="menu-arrow"></span>
            </a>
            <ul class="side-nav-second-level" aria-expanded="false">
               <li>
                  <a href="{{ url('admin/addcity') }}">Add City</a>
               </li>
               <li>
                  <a href="{{ url('admin/allcities') }}">All Cities</a>
               </li>
            </ul>
         </li>
         <li class="side-nav-item">
            <a href="javascript: void(0);" class="side-nav-link">
            <i class="mdi mdi-city"></i>
            <span> Lawyers </span>
            <span class="menu-arrow"></span>
            </a>
            <ul class="side-nav-second-level" aria-expanded="false">
               <li>
                  <a href="{{ url('admin/addlawyer') }}">Add Lawyer</a>
               </li>
               <li>
                  <a href="{{ url('admin/alllawyers') }}">All Lawyers</a>
               </li>
               <li>
                  <a href="{{ url('admin/requestLawyers') }}">Sign up Requests @if(DB::table('unapprovedlawyers')->whereNull('lawyerApprovedid')->count()>0)<span class="badge badge-info badge-pill float-right"><?php echo DB::table('unapprovedlawyers')->whereNull('lawyerApprovedid')->count(); ?></span>@endif</a>
               </li>
               <li>
                  <a href="{{ url('admin/editrequestLawyers') }}">Edit Requests @if(DB::table('unapprovedlawyers')->whereNotNull('lawyerApprovedid')->where('registeredBy','lawyer')->count()>0)<span class="badge badge-info badge-pill float-right"><?php echo DB::table('unapprovedlawyers')->whereNotNull('lawyerApprovedid')->where('registeredBy','lawyer')->count(); ?></span>@endif</a>
               </li>
               
            </ul>
         </li>
         <li class="side-nav-item">
            <a href="{{ url('admin/reviews') }}" class="side-nav-link">
            <i class="mdi mdi-city"></i>
            <span>Reviews <span class="badge badge-info badge-pill float-right"><?php echo DB::table('lawyerreviews')->count(); ?></span>
            </a>
         </li>
         <li class="side-nav-item">
            <a href="{{ url('admin/emails') }}" class="side-nav-link">
            <i class="mdi mdi-city"></i>
            <span>Emails
            </a>
         </li>
         <li class="side-nav-item">
            <a href="{{ url('admin/sitesettings') }}" class="side-nav-link">
            <i class="mdi mdi-cog"></i>
            <span>Site Settings</span>
            </a>
         </li>
         <li class="side-nav-item">
            <a href="{{ url('admin/contactmessage') }}" class="side-nav-link">
            <i class="mdi mdi-phone"></i>
            <span>Contact Us Messages</span>
            </a>
         </li>
         <li class="side-nav-item">
            <a href="javascript: void(0);" class="side-nav-link">
            <i class="mdi mdi-city"></i>
            <span> Blogs </span>
            <span class="menu-arrow"></span>
            </a>
            <ul class="side-nav-second-level" aria-expanded="false">
               <li>
                  <a href="{{ url('admin/addblog') }}">Add Blog</a>
               </li>
               <li>
                  <a href="{{ url('admin/allblogs') }}">All Bloggs</a>
               </li>
            </ul>
         </li>
         
           <li class="side-nav-item">
            <a href="javascript: void(0);" class="side-nav-link">
            <i class="uil uil-list-ul"></i>
            <span> Subscription Plan  </span>
            <span class="menu-arrow"></span>
            </a>
            <ul class="side-nav-second-level" aria-expanded="false">
               <li>
                  <a href="{{ url('admin/addplan') }}">Add Plan</a>
               </li>
               <li>
                  <a href="{{ url('admin/allplan') }}">All Plan</a>
               </li>
            </ul>
         </li>
         <li class="side-nav-item">
            <a href="javascript: void(0);" class="side-nav-link">
            <i class="mdi mdi-city"></i>
            <span> Nominations <span class="badge badge-info badge-pill "><?php echo DB::table('nominations')->where('status' , 0)->count(); ?></span> 
            <span class="menu-arrow"></span>
            </a>
            <ul class="side-nav-second-level" aria-expanded="false">
               <li>
                  <a href="{{ url('admin/allnominations') }}">All requests</a>
               </li>
               <li>
                  <a href="{{ url('admin/approvednomination') }}">Approved</a>
               </li>
            </ul>
         </li>
      </ul>
      <div class="clearfix"></div>
   </div>
</div>
<script>
   document.title=sessionStorage.getItem('title') || 'Dashboard';
   $('a').on('click',function(){
      sessionStorage.setItem('title',$(this).text());
      
   })
</script>