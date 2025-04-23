<?php

namespace Animal\Middlewares;

use Tecgdcs\Contracts\Middleware;
use Tecgdcs\Response;

class RequestRequiresId implements Middleware
{

    public function handle(): void
    {
        if (empty($_GET['id']) || !is_numeric($_GET['id'])) {
            Response::abort(Response::BAD_REQUEST);
        }
    }
}