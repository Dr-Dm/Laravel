<?php


namespace App\Services;


use App\Models\User;
use App\Services\Contracts\Social;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Laravel\Socialite\Contracts\User as SocialUser;

class SocialService implements Social
{

    public function loginAndGetRedirectUrl(SocialUser $socialUser): string
    {
        $user = User::query()->where('email', '=', $socialUser->getEmail())->first();

        if ($user == null) {
            //register

            return route('auth.register');
        }

        $user->name = $socialUser->getName();
        $user->avatar = $socialUser->getAvatar();

        if ($user->save()) {
            Auth::loginUsingID($user->id);

            return route('account');
        }
        throw new \Exception('Did not save user');
    }
}
