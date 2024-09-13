<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RedirectController extends Controller
{
    public function store(Request $request)
    {
        // Store the redirect URL in the session
        $request->session()->put('redirectAfterAuth', $request->input('redirectTo'));

        // Return a response indicating success
        return response()->json(['success' => true]);
    }
}
