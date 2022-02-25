<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Rules\Recaptcha;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    //redirect page after login

    public function sendLoginResponse(Request $request)
    {
        $request->session()->regenerate();

        $this->clearLoginAttempts($request);

        if ($response = $this->authenticated($request, $this->guard()->user())) {
            return $response;
        }

        return $request->wantsJson()
            ? new JsonResponse([
                'message' => 'Login Successful',
                'role' => $this->guard()->user()->role,
                'redirect' => $this->redirectTo(),
            ], 200)
            : redirect()->intended($this->redirectPath());
    }

    public function redirectTo()
    {
        if (auth()->user()->role == 'user') {
            return route('dashboard');
        } else
            return route('admin.dashboard');

    }

    protected function validateLogin(Request $request)
    {


        $request->validate([
            $this->username() => 'required|string',
            'password' => 'required|string',
            //'g-recaptcha-response' => new Recaptcha(),
        ]);
    }
}
