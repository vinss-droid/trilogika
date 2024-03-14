<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\SocialAccount;
use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    public function redirectToProvider($provider){
        return Socialite::driver($provider)->redirect();
    }
    public function handleProvideCallback($provider){
            try {
                $user = Socialite::driver($provider)->stateless()->user();
            }catch(\Exception $e){
                return redirect()->back()->with("error", $e->getMessage());
        }
        $authUser = $this->findOrCreateUser($provider, $user);

        Auth()->login($authUser);

        return redirect()->route('dashboard');
    }

    public function findOrCreateUser($provider , $socialUser){
        // dd($socialUser); 
        $socialAccount = SocialAccount::where('provider_id', $socialUser->getId())->where('provider_name', $provider)->first();

        if($socialAccount){
            return $socialAccount->user;
        }else{
            $user = User::where('email',$socialUser->getEmail())->first();

            if(!$user){
                $user = User::create([
                    'name'=> $socialUser->getName(),
                    'email'=> $socialUser->getEmail(),
                ]);
            }

            $user->socialAccounts()->create([
                'provider_id'=> $socialUser->getId(),
                'provider_name'=> $provider,
            ]);

            return $user;
        }
    }
}
