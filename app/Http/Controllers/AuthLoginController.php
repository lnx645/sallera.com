<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthLoginController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return inertia('login');
    }
    public function processing(Request $request){
        return to_route('home');
    }
}
