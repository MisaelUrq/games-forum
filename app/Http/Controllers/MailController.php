<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MailController extends Controller
{
    public function update(Request $request, $id) {
        $this->validate($request, [
            'user_email' => 'required',
            'user_id' => 'required',
            'user_name' => 'required'
        ]);

        $user_verify = User::find($request->input('user_id'));
        $user_verify->email_verified_at = date('y-m-d');
        $user->save();
        return redirect('games');
    }
}
