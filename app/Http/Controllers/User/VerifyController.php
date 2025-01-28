<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tzsk\Sms\Facades\Sms;

class VerifyController extends Controller
{
    public function getMobile()
    {
        return inertia('MobileVerify',
            ['mobile' => Auth::user()->mobile]);
    }

    public function sendVerificationCode(Request $request)
    {
        $user = Auth::user();
//      Check if the user has a time limit for requesting the code
        if (session()->has('cantVerify')) {
            $cantVerify = session()->get('cantVerify');
//          Calculation of the amount of time that has passed since the moment of user limitation
            $diffInMinutes = now()->diffInMinutes($cantVerify);
//          If 2 hours have passed since the moment of restriction, the restriction will be removed
            if ($diffInMinutes >= 120) {
                session()->forget('cantVerify');
                return redirect()->back();
            } else {
                return redirect()->back()->with('message', "به علت درخواست زیاد ، $diffInMinutes دقیقه دیگر دوباره امتحان کنید");
            }
        }
//      Check if attempts to enter the Verification code is lower than 4
        if ($user->Otp->attempt_count < 3 ) {
//          Add 1 attempt to the number of user attempts to enter the Verification code
            $user->Otp->update([
                'attempt_count' => $user->Otp->attempt_count + 1,
            ]);

            $mobile = $request->input('mobile');
            $verificationCode = rand(10000, 99999);

//          Make sessions for Verification Code & Verification Timeout
            session([
                'verification_code' => $verificationCode,
                'verifyTimeout' => now()
            ]);

            Sms::via('farazsmspattern')->send($verificationCode)->to($mobile)->dispatch();

            return redirect()->back()->with('verifyTimeout', session('verifyTimeout'));

        } else {
            session()->put('cantVerify', now());
            return redirect()->back()->with('message', 'به علت درخواست زیاد ، 2 ساعت دیگر دوباره امتحان کنید');
        }
    }

    public function verifyCode(Request $request)
    {
        $inputCode = $request->input('code');
        $sessionCode = session('verification_code');

        if ($inputCode == $sessionCode) {
            session()->forget('cantVerify');
            session()->forget('verifyTimeout');

            return to_route('dashboard')->with('verifyMessage', 'احراز هویت با موفقیت انجام شد');

        } else {
            return redirect()->back()->with('message', 'کد وارد شده با کد ارسالی تطابق ندارد');
        }
    }
}
