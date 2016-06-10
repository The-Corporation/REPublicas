<?php

namespace Republicas\Http\Controllers\Auth;

use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use Republicas\Models\User;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Routing\Controller;
use Illuminate\Foundation\Validation\ValidatesRequests;

class AuthController extends Controller
{
    use AuthenticatesAndRegistersUsers, ThrottlesLogins, ValidatesRequests;

    protected $redirectPath = '/';

    public function __construct()
    {
        $this->redirectPath = route('home');
        $this->middleware('guest', ['except' => ['logout', 'getLogout']]);
    }

    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return Response
     */
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
    public function handleProviderCallback($provider)
    {
        $user = Socialite::driver($provider)->user();
        //dd($user);
        // storing data to our user table and logging them in
        $data = [
            'name' => $user->getName(),
            'email' => $user->getEmail()
        ];

        $aux = User::firstOrCreate($data);

        if($aux->photo == "") {
            $aux->setDefaultPhoto();
            $aux->save();
        }

        Auth::login($aux);

        //after login redirecting to home page
        return redirect($this->redirectPath());
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'email' => $data['email'],
            'name' => $data['name'],
            'password' => bcrypt($data['password']),
        ]);
    }
}
