<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
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
                    'profile_image_url' => $this->saveAndGetAvatarPath($user->getAvatar(), $email),
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

    public function logout(): \Illuminate\Foundation\Application|\Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse|\Illuminate\Contracts\Foundation\Application {
        Auth::logout();
        return redirect('/');
    }

    protected function findUser(string $gid, string $email): User {
        return User::where('google_id', $gid)
            ->orWhere('email', $email)
            ->where('email_verified_at', '!=', null)
            ->first() ?: new User();
    }

    protected function saveAndGetAvatarPath(string $externalUrl, string $email = ''): string {
        $content = file_get_contents($externalUrl);
        $path = 'avatars/' . uniqid() . '-' . md5($email . $externalUrl). '.png';
        Storage::put('/public/' . $path, $content);
        return asset('/storage/' . $path);
    }

}
