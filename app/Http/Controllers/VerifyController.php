<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

class VerifyController extends Controller
{
    public function notice(){
        return view('pages.verify-email');
    }

    public function verify(EmailVerificationRequest $request){
        $request->fulfill();
        return redirect('/profile');
    }

    public function resend(Request $request){
        $request->user()->sendEmailVerificationNotification();
        return back()->with('status', 'verification-link-sent');
    }
}

