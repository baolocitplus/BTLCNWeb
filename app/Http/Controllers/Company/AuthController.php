<?php
namespace App\Http\Controllers\Company;
use Illuminate\Support\MessageBag;
use App\Company;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

//Class needed for login and Logout logic
use Illuminate\Foundation\Auth\AuthenticatesUsers;

//Auth facade
use Auth;
class AuthController extends Controller
{
/*
|--------------------------------------------------------------------------
| Registration & Login Controller
|--------------------------------------------------------------------------
|
| This controller handles the registration of new users, as well as the
| authentication of existing users. By default, this controller uses
| a simple trait to add these behaviors. Why don't you explore it?
|
*/
use AuthenticatesUsers;
/**
* Where to redirect users after login / registration.
*
* @var string
*/
protected $redirectTo = '/';
/**
* Create a new authentication controller instance.
*
* @return void
*/
public function __construct()
{
$this->middleware('guest', ['except' => 'logout']);
}
public function getLogin () {
    return view('dashboard.login');
}
public function postLogin(Request $request)
{

$rules = [
'email' =>'required|email',
'password' => 'required|min:6'
];
$messages = [
'email.required' => 'Email là trường bắt buộc',
'email.email' => 'Email không đúng định dạng',
'password.required' => 'Mật khẩu là trường bắt buộc',
'password.min' => 'Mật khẩu phải chứa ít nhất 8 ký tự',
];
$validator = Validator::make($request->all(), $rules, $messages);
if ($validator->fails()) {
return redirect()->back()->withErrors($validator)->withInput();
} else {
// Attempt login
if ( Auth::guard('company')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
return redirect()->intended(route('indexDash'));
} else {
//Else redirect to form login
$errors = new MessageBag(['errorlogin' => 'Email hoặc mật khẩu không đúng']);
return redirect()->back()->withInput()->withErrors($errors);
}


}
}
    public function getRegister() {
    return view('dashboard.register');
}
public function postRegister(Request $request)
    {
    $validator = $this->validator($request->all());
    if ($validator->fails()) {
    $this->throwValidationException(
    $request, $validator
    );
    }
    Auth::guard('company')->login($this->create($request->all()));
    return redirect()->route('indexDash');
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
'phone' => 'required|max:11',
'email' => 'required|email|max:255|unique:users',
'password' => 'required|min:6|confirmed',
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
return Company::create([
'name' => $data['name'],
'email' => $data['email'],
'password' => bcrypt($data['password']),
'phone' => $data['phone'],
'address' => $data['phone'],
]);
}
}