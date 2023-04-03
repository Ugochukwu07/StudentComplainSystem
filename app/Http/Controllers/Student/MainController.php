<?php

namespace App\Http\Controllers\Student;

use stdClass;
use App\Models\User;
use App\Models\Office;
use App\Models\Faculty;
use App\Models\Profile;
use App\Models\Complain;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service\Student\MainService;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Student\ProfileUpdateRequest;

class MainController extends Controller
{
    /**
     * student account overview
     *
     * @return Factory
     */
    public function overview()
    {
        $data = new stdClass;

        $data->complain_count = Complain::where('student_id', auth()->user()->id)->count();
        $data->complain_completed_count = Complain::where('student_id', auth()->user()->id)->where('status', 1)->count();
        $data->complain_pending_count = Complain::where('student_id', auth()->user()->id)->where('status', 0)->count();

        $complains = Complain::where('student_id', auth()->user()->id)->get();
        $offices = Office::all();

        return view('student.overview', compact('data', 'complains', 'offices'));
    }


    /**
     * update student profile
     *
     * @return Factory
     */
    public function profile($type)
    {
        $profile = Profile::where('user_id', auth()->user()->id)->first();
        $faculties = Faculty::all();
        $departments = Department::all();
        $levels = [100, 200, 300, 400, 500, 600, 700, 800, 900];

        $data = new stdClass;
        $data->complain_count = Complain::where('student_id', auth()->user()->id)->count();
        if($type == 1){
            $settings = true; $account = false;
        }else{
            $settings = false; $account = true;
        }
        return view('student.profile', compact('profile', 'data', 'faculties', 'departments', 'levels', 'settings', 'account'));
    }


    /**
     * Save Student profile to database
     *
     * @param  mixed $id
     * @param  ProfileUpdateRequest $request
     * @return RedirectResponse
     */
    public function profileSave($id, ProfileUpdateRequest $request): RedirectResponse
    {
        $profile = (new MainService())->updateProfile($request, auth()->user()->id, $id);

        if($profile)
            return redirect()->route('student.overview')->with('success', 'Profile Updated Successfully');

        return back()->with('error', 'Sorry, something went wrong');
    }


    /**
     * update authentication account details
     *
     * @return View
     */
    public function account()
    {
        return view('student.profile',);
    }



    /**
     * save updated authentication student details to database
     *
     * @param  mixed $id
     * @param  Request $request
     * @return RedirectResponse
     */
    public function accountSave($id, Request $request): RedirectResponse
    {
        $request->validate([
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|string|confirmed',
            'password_confirmation' => 'required_with:password|string',
        ]);

        $user = User::where('id', $id)->update([
            'email' => $request->email,
            'password' => isset($request->password) ? Hash::make($request->password) : User::find($id)->password,
        ]);

        if($user)
            return redirect()->route('student.overview')->with('success', 'Account Updated Successfully');

        return back()->with('error', 'Sorry, something went wrong');
    }
}
