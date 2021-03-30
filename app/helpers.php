<?php 

use Illuminate\Http\File;
use Illuminate\Support\Env;
use Illuminate\Support\Facades\Storage;


/**
 * Checks if Environment variables for Google was set.
 * if not this won't display Google Login Button
 */
if(!function_exists('checkGoogleEnv')){
    function checkGoogleEnv()
    {
        if( !empty(env('GOOGLE_CLIENT_ID')) && 
            !empty(env('GOOGLE_CLIENT_SECRET')) &&
            !empty(env('GOOGLE_CALLBACK_URL')) 
        ) 
        {  
            return true;
        }
        
        return false;
    }
}

/**
 * It won't show the Facebook Login button if 
 * environment variables aren't properly set.
 */
if(!function_exists('checkFacebookEnv')){
    function checkFacebookEnv()
    {
        if( !empty(env('FACEBOOK_CLIENT_ID')) && 
            !empty(env('FACEBOOK_CLIENT_SECRET')) &&
            !empty(env('FACEBOOK_CALLBACK_URL')) 
        ) 
        {
            return true;
        }

        return false;
    }
}