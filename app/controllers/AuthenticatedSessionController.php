<?php

namespace Animal\Controllers;

use Tecgdcs\View;

class AuthenticatedSessionController
{
    public function create()
    {
        View::make('auth.login');
    }
}