<?php


namespace App\Http\Controllers;


use App\Helpers\Constant;
use App\Helpers\Helper;
use App\Helpers\ResponseTrait;
use App\Http\Requests\ResetPasswordRequest;
use App\Jobs\SendMail;
use App\Mail\ResetPasswordMail;
use App\Models\ResetPassword;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ForgotPasswordController extends Controller
{
    use ResponseTrait;

    public function showFormEmail()
    {
        return view('auth.forgot_password');
    }

    public function postEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
        ]);

        $token = Str::random(64);

        $reset = ResetPassword::query()
            ->create([
                'email' => $request->email,
                'token' => $token,
                'created_at' => Carbon::now()
            ]);
        if ($reset) {
            dispatch(new SendMail([$request->email], new ResetPasswordMail($token, $request->email)));
        }

        return redirect()->back();
    }

    public function checkResetPasswordToken($token)
    {
        $updatePassword = ResetPassword::query()
            ->where('token', $token)
            ->where('created_at', '>', Carbon::now()->subHours(Constant::TIME_EXPIRED_TOKEN))
            ->first();

        if (!$updatePassword) {
            return redirect()->route('login')->with('error', 'Invalid token!');
        }

        return view('auth.reset_password', ['token' => $token]);
    }

    public function resetPassword(ResetPasswordRequest $request, $token)
    {
        $updatePassword = ResetPassword::query()
            ->where('token', $token)
            ->where('created_at', '>', Carbon::now()->subHours(Constant::TIME_EXPIRED_TOKEN))
            ->first();

        if (!$updatePassword) {
            return redirect()->route('login')->with('error', 'Invalid token!');
        }

        $user = User::query()
            ->where('email', $updatePassword->email)
            ->update([
                'password' => Hash::make($request->password)
            ]);

        ResetPassword::query()
            ->where('email', $request->email)
            ->delete();

        if (!empty($user)) {
            return redirect()->route('auth.login')->with('success', 'Forgot password success.');
        }

        return redirect('auth.login')->with('errors', 'Your password has been changed!');
    }
}
