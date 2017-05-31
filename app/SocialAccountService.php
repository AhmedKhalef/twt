
<?php
namespace App;

use Laravel\Socialite\src\Contracts\User as ProviderUser;

class SocialAccountService
{
    public function createOrGetUser(ProviderUser $providerUser)
    {
        $account = Provider::whereProvider($provider)
            ->whereuser_id($providerUser->getId())
            ->first();
        if ($account) {
            return $account->user;
        } else {
            $account = new Provider([
                'user_id' => $providerUser->getId(),
                'provider' => $provider
            ]);
            $user = User::whereEmail($providerUser->getEmail())->first();
            if (!$user) {
                $user = User::create([
                    'email' => $providerUser->getEmail(),
                    'name' => $providerUser->getName(),
                ]);
            }
            $account->user()->associate($user);
            $account->save();
            return $user;
        }
    }
}

