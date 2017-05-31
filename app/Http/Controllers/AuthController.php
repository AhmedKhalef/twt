<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Auth;
use App\User;
use App\Provider;
// use App\SocialAccountService;
// use Socialite;
use Laravel\Socialite\Contracts\User as ProviderUser;
use Laravel\Socialite\Facades\Socialite;
use Google_Client;
use Google_Service_People;

class AuthController extends Controller
{
//==========================================================//
    public function redirectToProvider($provider)
    	{
    	    return Socialite::driver($provider)->redirect();
        // return Socialite::driver($provider)
        // ->scopes(['openid', 'profile', 'email', Google_Service_People::CONTACTS_READONLY])
        // ->redirect();
    	}
//===========================================================//
    public function handleProviderCallback($provider)
    {
    	$user = Socialite::driver($provider)->user();
        
            // dd($user);
        $account = $this->createOrGetUser($user, $provider);

      Auth::login($account, true);
      return redirect()->to('/');  

    }
//===========================================================//
    public function createOrGetUser($ProviderUser,$provider)
    {
        $account = Provider::whereProvider($provider)
            ->whereprovider_id($ProviderUser->getId())
            ->first();
        if ($account) {
            return $account->user;
        } else {
            $account = new Provider([
                'provider_id'   => $ProviderUser->getId(),
                'provider'      => $provider
            ]);
            $user = User::whereEmail($ProviderUser->getEmail())->first();
            if (!$user) {
                $user = User::create([
                    'email'     => $ProviderUser->getEmail(),
                    'name'      => $ProviderUser->getName(),
                    'avater'    => $ProviderUser->getAvatar()
                ]);
            }
            $account->user()->associate($user);
            $account->save();
            return $user;
        }
    }
    
    
}
