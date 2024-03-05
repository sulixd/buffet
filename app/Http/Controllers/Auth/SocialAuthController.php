<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Laravel\Socialite\Facades\Socialite;
use Mockery\Exception;

class SocialAuthController extends Controller {
    public function redirect(): \Symfony\Component\HttpFoundation\Response {
        return Inertia::location(
            Socialite::driver('google')->redirect()->getTargetUrl()
        );
    }

    public function callback() {
        try {
            $user = Socialite::driver('google')->user();
            $gid = $user->getId();
            $email = $user->getEmail();
            if(!str_ends_with($email, '@bottyan.eu')) abort(403, 'Csak a bottyan.eu által kibocsátott email címek használhatóak.');
            $foundUser = $this->findUser($gid, $email);
            if($foundUser->exists) {
                if(is_null($foundUser->google_id)) {
                    $foundUser->google_id = $gid;
                    $foundUser->update();
                }
                Auth::login($foundUser);
                return redirect('/');
            } else {
                $newUser = User::create([
                    'name' => $user->getName(),
                    'email' => $email,
                    'password' => encrypt(''),
                    'google_id'=> $gid,
                ]);
                $newUser->markEmailAsVerified();
                Auth::login($newUser);

                return redirect('/');
            }
        } catch(Exception $e) {
            if(env('APP_DEBUG')) throw $e;
        }
        abort(401, 'Jogosultsági hiba!');
    }
    protected function findUser(string $gid, string $email): User {
        return User::where('google_id', $gid)
            ->orWhere('email', $email)
            ->where('email_verified_at', '!=', null)
            ->first();
    }
}
