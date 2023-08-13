<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Exception;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\lawyers;
use DB;
class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
        
    
  
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleGoogleCallback()

    {

    
        try {

            $user = Socialite::driver('google')->stateless()->user();

            $finduser = lawyers::where('emailaddress', $user->email)->first();


            if($finduser){

     
                    session()->put('user', $finduser->id);
                   return redirect('profile/lawyer');

     

            }else{
                
             

             DB::table('lawyers')->insert([

                    'name' => $user->name,

                    'emailaddress' => $user->email,
                    
                    'password' => encrypt('123456dummy'),
                      'status' => 1,
       
                   'registeredBy' => 'admin',
     
                    'email_verified' => 'true',
                   

                ]);

    
            $newUser = lawyers::where('emailaddress', $user->email)->first();

               session()->put('user', $newUser->id);
                return redirect('profile/lawyer');


            }

        } catch (Exception $e) {

            dd($e->getMessage());

        }

    

  

    }

    public function redirectToFacebook()

    {

        return Socialite::driver('facebook')->redirect();

    }

           

    /**

     * Create a new controller instance.

     *

     * @return void

     */

    public function handleFacebookCallback()

    {

        try {

        

            $user = Socialite::driver('facebook')->user();

         

            $finduser = lawyers::where('emailaddress', $user->email)->first();

         

            if($finduser){

         

               session()->put('user', $finduser->id);
                return redirect('profile/dashboard');


         

            }else{

               DB::table('lawyers')->insert([

                    'name' => $user->name,

                    'emailaddress' => $user->email,
                    
                    'password' => encrypt('123456dummy'),
                     'status' => 1,
       
                   'registeredBy' => 'admin',
     
                    'email_verified' => 'true',
                   

                ]);
                
            $newUser = lawyers::where('emailaddress', $user->email)->first();


    

               session()->put('user', $newUser->id);
                return redirect('profile/dashboard');
            }

       

        } catch (Exception $e) {

            dd($e->getMessage());

        }

    }
        
}
