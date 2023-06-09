<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http;
use App\Models\Faculty;
use App\Models\Profile;
use App\Models\Session;
use Illuminate\View\View;
use App\Models\Department;
use App\Mail\NewStudentMail;
use App\Service\AuthService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\Student\RegisterRequest;

class AuthController extends Controller
{
    /**
     * register
     *
     * @return Factory
     */
    public function register(): View
    {
        // $sessions = Session::all();
        $faculties = Faculty::all();
        $departments = Department::all();
        $levels = [100, 200, 300, 400, 500, 600, 700, 800, 900];

        return view('auth.register', compact('faculties', 'departments', 'levels'));
    }


    /**
     * register and Save Students to database
     *
     * @param  RegisterRequest $request
     * @return Http\RedirectResponse
     */
    public function registerSave(RegisterRequest $request)
    {
        $user = (new AuthService())->storeStudent($request);

        if ($user == NULL){
            return back()->with('error', 'Sorry, something went wrung while registering student');
        }

        $profile = (new AuthService())->storeProfile($request, $user->id);
        if ($profile == NULL)
            return redirect()->route('student.profile')->with('error', 'Sorry, something went wrung while creating profile');
        Auth::login($user);
        $user->profile = $profile;
        Mail::to($user)->send(new NewStudentMail($user));

        //when everything went right
        return redirect()->route('student.overview')->with('success', 'Account Created Successfully');
    }


    /**
     * login student
     *
     * @return View
     */
    public function login(): View
    {
        return view('auth.login');
    }


    /**
     * authenticate and login User In
     *
     * @param  Request $request
     * @return void
     */
    public function loginSave(Request $request)
    {
        $request->validate([
            'email_reg' => 'required|string',
            'password' => 'required|string'
        ]);

        if (User::where('email', $request->email_reg)->exists()) {
            $email = $request->email_reg;
        } else if (Profile::where('reg_number', $request->email_reg)->exists()) {
            $profile = Profile::where('reg_number', $request->email_reg)->first();
            $email = $profile->user->email;
        } else {
            return back()->with('error', 'Invalid Email Address or Reg Number');
        }

        if (Auth::attempt(['email' => $email, 'password' => $request->password], true)) {

            if(empty(auth()->user()->image)){
                $user = User::find(auth()->user()->id);
                $user->image = 'images/user3-128x128.jpg';
                $user->save();
            }
            //when everything went right
            return auth()->user()->admin ?
                    redirect()->route('admin.main.overview')->with('success', 'Logged In Successfully')
                    :
                    redirect()->route('student.overview')->with('success', 'Logged In Successfully');
        }

        return back()->with('error', 'Login details do not match');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login')->with('success', 'Logged Out Successfully');
    }
}
