<?php

namespace Animal\Middlewares;

use Tecgdcs\Contracts\Middleware;
use Tecgdcs\Response;

class Csrf implements Middleware
{

    public function handle(): void
    {
        if (empty($_REQUEST['_csrf'])) {
            Response::abort(Response::BAD_REQUEST);
        }

        if ($_REQUEST['_csrf'] !== $_SESSION['csrf_token']) {
            Response::abort(Response::BAD_REQUEST);
        }
    }
}