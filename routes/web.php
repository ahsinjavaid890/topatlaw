<?php

use Illuminate\Support\Facades\Route;


Auth::routes();

// Website Routs
Route::get('/', function () {
    return view('welcome');
});


Route::get('sitemap', [App\Http\Controllers\SiteController::class,'categorysitemap']);
Route::get('cities', [App\Http\Controllers\SiteController::class,'sitemap']);

Route::get('/', [App\Http\Controllers\SiteController::class, 'indexview']);
Route::get('/{id}', [App\Http\Controllers\SiteController::class, 'checkurl']);
Route::POST('addlawyerreview', [App\Http\Controllers\SiteController::class, 'addlawyerreview']);
Route::get('blog/{id}', [App\Http\Controllers\SiteController::class, 'blogdetails']);
Route::get('contactus', [App\Http\Controllers\SiteController::class, 'contactus']);
Route::get('aboutus', [App\Http\Controllers\SiteController::class, 'aboutus']);
Route::get('searchcity/{id}/{serviceid}', [App\Http\Controllers\SiteController::class, 'searchcity']);
Route::get('/lawyers/{id}/{two}', [App\Http\Controllers\SiteController::class, 'attorneryes']);
Route::get('lawyer/{id}', [App\Http\Controllers\SiteController::class, 'lawyer']);
Route::get('lawyers/{id}', [App\Http\Controllers\SiteController::class, 'cities']);
Route::get('register', [App\Http\Controllers\SiteController::class, 'signup']);
Route::get('signin/lawyer', [App\Http\Controllers\SiteController::class, 'lawyerLogin']);
Route::post('addLawyerByUser', [App\Http\Controllers\SiteController::class, 'addLawyerByUser']);
Route::post('loginLawyerByUser', [App\Http\Controllers\SiteController::class, 'loginLawyerByUser']);
Route::POST('/updatelawyerimageByLawyer', [App\Http\Controllers\SiteController::class, 'updatelawyerimageByLawyer']);
Route::POST('/updatePasswordByLawyer', [App\Http\Controllers\SiteController::class, 'updatePasswordByLawyer']);
Route::get('/getcitiesForLawyers/{id}', [App\Http\Controllers\SiteController::class, 'getcitiesForLawyers']);
Route::get('logout/lawyer', [App\Http\Controllers\SiteController::class, 'logout']);
Route::get('verify/email/{email}', [App\Http\Controllers\SiteController::class, 'verify_email']);
Route::get('forget/password/', [App\Http\Controllers\SiteController::class, 'fogetPassword']);
Route::post('forget/password/1', [App\Http\Controllers\SiteController::class, 'sendcodeforpasswordforget']);
Route::get('password/reset/a/b/{code}', [App\Http\Controllers\SiteController::class, 'password_reset']);
Route::get('verify/email/1/{code}', [App\Http\Controllers\SiteController::class, 'verify_email_end']);
Route::post('verify/password/1', [App\Http\Controllers\SiteController::class, 'verify_password_end']);
Route::POST('createnominations', [App\Http\Controllers\SiteController::class, 'createnominations']);
Route::POST('createcontactrequest', [App\Http\Controllers\SiteController::class, 'submitcontactus']);
Route::POST('updateUnapprovedLawyer', [App\Http\Controllers\SiteController::class, 'updateUnapprovedLawyer']);
Route::POST('claim-profile', [App\Http\Controllers\SiteController::class, 'claim_profile']);
Route::get('nominatedlawyer/{id}', [App\Http\Controllers\SiteController::class, 'nominatedlawyer']);
Route::get('profile/lawyer', [App\Http\Controllers\SiteController::class, 'myprofile'])->middleware('is_user');
Route::get('profile/myprofile', [App\Http\Controllers\SiteController::class,'profile']);
Route::get('profile/review', [App\Http\Controllers\SiteController::class,'Review']);



Route::get('profile/dashboard', [App\Http\Controllers\SiteController::class,'dashboard']);

Route::get('profile/boost', [App\Http\Controllers\SiteController::class,'BoostPlan'])->middleware('is_user');

Route::get('profile/badge', [App\Http\Controllers\SiteController::class,'Badge'])->middleware('is_user');

Route::post('savelawyerplan', [App\Http\Controllers\SiteController::class,'SavelawyerBoostPlan'])->middleware('is_user');
Route::post('savelawyerplancustom', [App\Http\Controllers\SiteController::class,'SaveCustomtPlan'])->middleware('is_user');

Route::get('profile/boost/checkout/{id}', [App\Http\Controllers\SiteController::class,'BoostCheckout'])->middleware('is_user');
Route::get('profile/client_token', [App\Http\Controllers\SiteController::class,'generateClientToken']);
Route::get('boost/private-process-payment', [App\Http\Controllers\SiteController::class,'processPayment']);


Route::get('auth/google', [App\Http\Controllers\GoogleController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [App\Http\Controllers\GoogleController::class, 'handleGoogleCallback']);

Route::get('auth/facebook', [App\Http\Controllers\GoogleController::class, 'redirectToFacebook']);
Route::get('auth/facebook/callback', [App\Http\Controllers\GoogleController::class, 'handleFacebookCallback']);

Route::get('getCourse/{id}', function ($id) {
    $course = App\Models\cities::where('serviceid',$id)->get();
    return response()->json($course);
});
// Admin Routes

Route::get('admin/dashboard', [App\Http\Controllers\HomeController::class, 'adminHome'])->name('admin.dashboard')->middleware('is_admin');



// Categories

Route::get('admin/addcategory', [App\Http\Controllers\AdminController::class, 'addcategory']);
Route::get('admin/allcategories', [App\Http\Controllers\AdminController::class, 'allcategory']);
Route::get('admin/editcategory/{id}', [App\Http\Controllers\AdminController::class, 'editcategory']);
Route::POST('/createcategory', [App\Http\Controllers\AdminController::class, 'createcategory']);
Route::POST('/updatecategory', [App\Http\Controllers\AdminController::class, 'updatecategory']);
Route::POST('/updatecategorythumbnail', [App\Http\Controllers\AdminController::class, 'updatecategorythumbnail']);
Route::POST('/updatecategorybackgroundimage',[App\Http\Controllers\AdminController::class,'updatecategorybackgroundimage']);
Route::get('admin/deletecategory/{id}',[App\Http\Controllers\AdminController::class,'deletecategory']);

// Cities

Route::get('admin/addcity', [App\Http\Controllers\AdminController::class, 'addcity']);
Route::get('admin/allcities', [App\Http\Controllers\AdminController::class, 'allcities']);
Route::get('admin/editcity/{id}', [App\Http\Controllers\AdminController::class, 'editcity']);
Route::POST('/createcity', [App\Http\Controllers\AdminController::class, 'createcity']);
Route::POST('/updatecity', [App\Http\Controllers\AdminController::class, 'updatecity']);
Route::POST('/updatecitythumbnail', [App\Http\Controllers\AdminController::class, 'updatecitythumbnail']);
Route::POST('/updatecitybackgroundimage',[App\Http\Controllers\AdminController::class,'updatecitybackgroundimage']);
Route::get('admin/deletecity/{id}',[App\Http\Controllers\AdminController::class,'deletecity']);



Route::get('admin/addplan', [App\Http\Controllers\AdminController::class, 'addplan']);
Route::POST('/createplan', [App\Http\Controllers\AdminController::class, 'createplan']);
Route::get('admin/allplan', [App\Http\Controllers\AdminController::class, 'allplan']);
Route::get('admin/editplan/{id}', [App\Http\Controllers\AdminController::class, 'editplan']);
Route::POST('/updateplan', [App\Http\Controllers\AdminController::class, 'updateplan']);

// Lawyers

Route::get('admin/addlawyer', [App\Http\Controllers\AdminController::class, 'addlawyer']);
//------------
Route::get('admin/requestLawyers', [App\Http\Controllers\AdminController::class, 'requestLawyers']);
Route::get('admin/editrequestLawyers', [App\Http\Controllers\AdminController::class, 'editrequestLawyers']);
Route::get('admin/approveLawyers/{id}/{val}', [App\Http\Controllers\AdminController::class, 'approveLawyers']);
//------------
Route::get('admin/alllawyers', [App\Http\Controllers\AdminController::class, 'alllawyers']);
Route::get('admin/editlawyer/{id}/{unapproved?}', [App\Http\Controllers\AdminController::class, 'editlawyer']);
Route::POST('/createlawyer', [App\Http\Controllers\AdminController::class, 'createlawyer']);
Route::POST('/updatelawyer', [App\Http\Controllers\AdminController::class, 'updatelawyer']);
Route::get('admin/deletelawyer/{id}',[App\Http\Controllers\AdminController::class,'deletelawyer']);
Route::POST('/updatelawyerimage', [App\Http\Controllers\AdminController::class, 'updatelawyerimage']);
//---------- profile claims

Route::get('admin/profile-claims',[App\Http\Controllers\AdminController::class,'profile_claims']);
Route::get('admin/profile_claimed_delete/{id}',[App\Http\Controllers\AdminController::class,'profile_claims_delete']);
Route::get('admin/profile_claimed_approve/{email}/{id}/{cid}',[App\Http\Controllers\AdminController::class,'profile_claimed_approve']);


// Reviews

Route::get('admin/reviews', [App\Http\Controllers\AdminController::class, 'allreviews']);
Route::get('editreview/{id}', [App\Http\Controllers\AdminController::class, 'editreview']);
Route::POST('/updatereview', [App\Http\Controllers\AdminController::class, 'updatereview']);
Route::get('admin/deletereview/{id}',[App\Http\Controllers\AdminController::class,'deletereview']);

//emails
Route::get('admin/emails/{email?}', [App\Http\Controllers\AdminController::class, 'emails']);
Route::post('admin/save-email-templates', [App\Http\Controllers\AdminController::class, 'save_email_templates']);
Route::post('admin/send-emails', [App\Http\Controllers\AdminController::class, 'send_emails']);
Route::post('admin/delete-emails', [App\Http\Controllers\AdminController::class, 'delete_emails']);
Route::get('admin/get-saved-email-templates', [App\Http\Controllers\AdminController::class, 'get_saved_email_templates']);

// Blogs

Route::get('admin/addblog', [App\Http\Controllers\AdminController::class, 'addblog']);
Route::POST('createblog', [App\Http\Controllers\AdminController::class, 'createblog']);
Route::get('admin/allblogs', [App\Http\Controllers\AdminController::class, 'allblogs']);
Route::get('admin/editblog/{id}', [App\Http\Controllers\AdminController::class, 'editblog']);
Route::POST('/updateblog', [App\Http\Controllers\AdminController::class, 'updateblog']);
Route::POST('/updateblogimage', [App\Http\Controllers\AdminController::class, 'updateblogimage']);
Route::get('/admin/deleteblog/{id}',[App\Http\Controllers\AdminController::class,'deleteblog']);

// Get Cities

Route::get('/getcities/{id}', [App\Http\Controllers\AdminController::class, 'getcities']);
Route::get('/changetofeatured/{id}/{second}', [App\Http\Controllers\AdminController::class, 'changetofeatured']);
Route::get('/toplawyers/{id}/{second}', [App\Http\Controllers\AdminController::class, 'toplawyers']);


// Nominations

Route::get('admin/allnominations', [App\Http\Controllers\AdminController::class, 'nominations']);
Route::get('admin/editnominations/{id}', [App\Http\Controllers\AdminController::class, 'editnomination']);
Route::get('admin/approvednomination', [App\Http\Controllers\AdminController::class, 'approvednomination']);
Route::get('changenominationstatus/{one}/{two}', [App\Http\Controllers\AdminController::class, 'changenominationstatus']);
Route::POST('/updatenominationimage', [App\Http\Controllers\AdminController::class, 'updatenominationimage']);
Route::POST('/updatenomination', [App\Http\Controllers\AdminController::class, 'updatenomination']);
Route::get('/admin/deletenomination/{id}',[App\Http\Controllers\AdminController::class,'deletenomination']);
Route::get('/nominationvote/{id}',[App\Http\Controllers\SiteController::class,'nominationvote']);

// Sitesettings

Route::get('admin/sitesettings', [App\Http\Controllers\AdminController::class, 'sitesettings']);
Route::POST('updatewebsitetittle', [App\Http\Controllers\AdminController::class, 'updatewebsitetittle']);
Route::POST('updatecontactdetails', [App\Http\Controllers\AdminController::class, 'updatecontactdetails']);
Route::POST('updatesocialmedialinks', [App\Http\Controllers\AdminController::class, 'updatesocialmedialinks']);
Route::POST('/updatefootertext', [App\Http\Controllers\AdminController::class, 'updatefootertext']);
Route::POST('/updatewebsitelogo', [App\Http\Controllers\AdminController::class, 'updatewebsitelogo']);
Route::POST('/updateenable', [App\Http\Controllers\AdminController::class, 'updateenable']);

// ContactMessages

Route::get('admin/profile', [App\Http\Controllers\AdminController::class, 'profile']);
Route::POST('/updateprofile', [App\Http\Controllers\AdminController::class, 'updateprofile']);
Route::POST('/updatepassword', [App\Http\Controllers\AdminController::class, 'updatepassword']);
Route::get('admin/viewcontactrequests/{id}', [App\Http\Controllers\AdminController::class, 'viewcontactrequests']);
Route::get('admin/contactmessage', [App\Http\Controllers\AdminController::class, 'contactmessage']);


