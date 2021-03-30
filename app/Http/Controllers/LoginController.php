<?php 

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use Exception;
use App\Models\User;

class LoginController extends Controller
{

    /**
     *  Redirect user to Google Auth Page.
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from Google.
     */
    public function handleGoogleCallback()
    {
        $this->registerOrLoginUser(Socialite::driver('google')->user(), 'google');
        return redirect('/dashboard');
    }

    /**
     * Redirect user to Facebook Auth Page.
     */
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }


    /**
     * Obtain the user information from Facebook.
     */
    public function handleFacebookCallback()
    {
       $this->registerOrLoginUser(Socialite::driver('facebook')->user(), 'facebook');
       return redirect('/dashboard');
    }


    /**
     * Check if first time logging in using Facebook/Google
     *  User is found to Database? Proceed login.
     *  else, Register user to database
     */
    protected function registerOrLoginUser($user, $driver=null)
    {
        if(!is_null($driver)){
            $whereColumn = null;
            if($driver == 'facebook'){
                $whereColumn = "facebook_id";
            }
            if($driver == 'google'){
                $whereColumn = "google_id";
            }

            try{
                $findUser = User::where($whereColumn, $user->id)->first();
                if($findUser){
                    Auth::login($findUser);
                } else{
                    $newUser = new User();
                    $newUser->name = $user->name;
                    $newUser->email = $user->email;
                    $newUser->password = encrypt('');
                    $newUser->$whereColumn = $user->id;
                    $newUser->save();
                    Auth::login($newUser);
                }
            } catch (Exception $e){
                dd($e->getMessage());
            }

        }

        return false;
    }

}