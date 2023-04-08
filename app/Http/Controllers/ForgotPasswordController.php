<?php
namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\Auth\ForgetPasswordRequestMail;
use App\Service\SMSService;

class ForgotPasswordController extends Controller
{
      /**
       * Write code on Method
       *
       * @return response()
       */
      public function password()
      {
         return view('auth.forget.password');
      }

      /**
       * Write code on Method
       *
       * @return response()
       */
      public function passwordSave(Request $request)
      {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        $token = Str::random(64);

        $exist = DB::table('password_resets')->where('email', $request->email)->first();
        if ($exist) {
            DB::table('password_resets')->where('email', $request->email)->update([
                'token' => $token,
                'created_at' => Carbon::now()
            ]);
        } else {
            DB::table('password_resets')->insert([
                'email' => $request->email,
                'token' => $token,
                'created_at' => Carbon::now()
            ]);
        }
        $user = User::where('email', $request->email)->first();

        Mail::to($user)->send(new ForgetPasswordRequestMail($token, $user));
        (new SMSService())->sendSMSTermil($user->profile->phone_number, 'Follow this link to reset your password: ' . route('forget.password.reset', ['token' => $token]));

        return back()->with('success', 'We have e-mailed your password reset link!');
      }

      /**
       * Write code on Method
       *
       * @return response()
       */
      public function reset($token) {
         return view('auth.forget.reset', ['token' => $token]);
      }

      /**
       * Write code on Method
       *
       * @return response()
       */
      public function resetSave(Request $request)
      {
          $request->validate([
            //   'email' => 'required|email|exists:users,email',
              'password' => 'required|string|min:6|confirmed',
              'password_confirmation' => 'required'
          ]);

          $updatePassword = DB::table('password_resets')->where(['token' => $request->token])->first();

          if(!$updatePassword){
              return back()->with('error', 'Invalid token!');
          }

          $user = User::where('email', $updatePassword->email)->update(['password' => Hash::make($request->password)]);

          $this->deletePasswordResetToken($request->token);
          return redirect('/login')->with('success', 'Your password has been changed!');
      }

      protected function deletePasswordResetToken($token){
        DB::table('password_resets')->where([
            'token' => $token
          ])->delete();
      }
}
