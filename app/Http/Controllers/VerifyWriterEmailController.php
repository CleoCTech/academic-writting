<?php

namespace App\Http\Controllers;

use App\Models\Writer;
use Exception;
use Illuminate\Http\Request;

class VerifyWriterEmailController extends Controller
{

    public function verifyMail($mail)
    {
        //check-token

        try {
            $user = Writer::where('email', $mail)->first();
            if ($user !=null) {
                //update email_verified_at;
                Writer::where(['email' => $mail])->update(['email_verified_at' => now()]);
                session()->put('AuthWriter', $user->id);
            }
            return redirect()->route('writer-settings');
        } catch (Exception $e) {
            $e->getMessage();
        }

    }

}