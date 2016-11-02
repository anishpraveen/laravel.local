<?php
namespace App\Http\Controllers\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
//use App\Traits\ActivationTrait;
use App\Social;
use App\User;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;

class SocialController extends Controller
{
   // use ActivationTrait;
    public function getSocialRedirect( $provider )
    {
        $providerKey = Config::get('services.' . $provider);
        if (empty($providerKey)) {
            return view('pages.status')
                ->with('error','No such provider');
        } //$this->getSocialHandle($provider);
        return Socialite::driver( $provider )->redirect();
    }
    public function getSocialHandle( $provider )
    {
        if (Input::get('denied') != '') {
            return redirect()->to('login')
                ->with('status', 'danger')
                ->with('message', 'You did not share your profile data with our social app.');
        }
        $user = Socialite::driver( $provider )->user();
        $socialUser = null;
        //dd($user);
        //Check if this email present
        $userCheck = User::where('email', '=', $user->email)->first();
        $email = $user->email;
        if (!$user->email) {
            $email = 'missing' . str_random(10);
        }
        if (!empty($userCheck)) {
            $socialUser = $userCheck;
        }
        else {
            $sameSocialId = Social::where('social_id', '=', $user->id)
                ->where('provider', '=', $provider )
                ->first();
            if (empty($sameSocialId)) {
                //There is no combination of this social id and provider, so create new one
                $newSocialUser = new User;
                $newSocialUser->email              = $email;
                $name = explode(' ', $user->name);
                if (count($name) >= 1) {
                    $newSocialUser->username = $name[0];
                }
                if (count($name) >= 2) {
                    //$newSocialUser->last_name = $name[1];
                }
                $newSocialUser->password = bcrypt(str_random(16));
                $newSocialUser->remember_token = str_random(64);
                //$newSocialUser->activated = !config('settings.activation');
                //dd($newSocialUser);
                $newSocialUser->save();
                $socialData = new Social;
                $socialData->social_id = $user->id;
                $socialData->user_id = $newSocialUser->id;
                $socialData->provider= $provider;
                //dd($socialData);
                $socialData->save();
                //$newSocialUser->social()->save($socialData);
                // Add role
                /*$role = Role::whereName('user')->first();
                $newSocialUser->assignRole($role);
                $this->initiateEmailActivation($newSocialUser);*/
                $socialUser = $newSocialUser;
            }
            else {
                //Load this existing social user
                $socialUser = $sameSocialId->user;
                
            }
        }//dd($socialUser);
        auth()->login($socialUser);return redirect()->route('login');
        /*if ( auth()->user()->hasRole('user')) {
            return redirect()->route('user.home');
        }
        if ( auth()->user()->hasRole('administrator')) {
            return redirect()->route('admin.home');
        }
        return abort(500, 'User has no Role assigned, role is obligatory! You did not seed the database with the roles.');*/
    }
}