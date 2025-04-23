<?php

namespace Animal\Controllers;

use Animal\Models\Loss;
use Tecgdcs\Response;
use Tecgdcs\View;

class DashboardController
{
    public function index(): void
    {
        if (!isset($_SESSION['user'])) {
            Response::abort(Response::UNAUTHORIZED);
        }

        $title = 'Dashboard';
        $losses = Loss::all();

        View::make('dashboard.index', compact('title', 'losses'));
    }
}