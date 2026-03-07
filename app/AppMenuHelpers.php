<?php

namespace App;

use Illuminate\Http\Request;

class AppMenuHelpers
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        public Request $request
    ) {
        //
    }
    public function render()
    {
        return [
            'login' => [
                'name' => "Login",
                'icon' => 'login'
            ]
        ];
    }
}
