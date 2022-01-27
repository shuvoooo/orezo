<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\User;
use App\Notifications\GeneralNotification;
use App\Providers\RouteServiceProvider;
use App\Rules\Recaptcha;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default, this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'fname' => ['required', 'string', 'max:255'],
            'lname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'phone' => ['required', 'string', 'max:255'],
            'country' => ['required', 'string'],
            'state' => ['required', 'string'],
            'home_no' => ['required', 'string'],
            'referrer' => ['nullable', 'string'],
            'g-recaptcha-response' => [new Recaptcha()],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['fname'] . ' ' . $data['lname'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        Address::create([
            'user_id' => $user->id,
            'fname' => $data['fname'],
            'lname' => $data['lname'],
            'country' => $data['country'],
            'state' => $data['state'],
            'mobile' => $data['phone'],
            'home_no' => $data['home_no'],
        ]);

        $admins = User::where('role', 'admin')->where('role', 'staff')->get();


        Notification::send($admins, new GeneralNotification('New Member', 'New member has registered.'));

        return $user;
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        $this->guard()->login($user);

        if ($response = $this->registered($request, $user)) {
            return $response;
        }

        return $request->wantsJson()
            ? new JsonResponse(['redirect' => route('verification.notice')], 200)
            : redirect($this->redirectPath());
    }
}
