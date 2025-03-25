<?php

namespace Animal\Controllers;

use Tecgdcs\Response;
use Tecgdcs\Validator;

class LossDeclarationController
{
    private array $countries;

    private array $pet_types;

    public function __construct()
    {
        $this->countries = require CONFIG_DIR.'/countries.php';
        $this->pet_types = require CONFIG_DIR.'/pet_types.php';
    }

    public function create()
    {
        $countries = $this->countries;
        $pet_types = $this->pet_types;

        require VIEW_DIR.'/lossdeclaration/create.php';
    }

    public function store()
    {
        check_csrf_token();

        $_SESSION['errors'] = null;
        $_SESSION['old'] = null;

        Validator::check([
            'email' => 'required|email',
            'vemail' => 'required|same:email',
            'phone' => 'phone',
            'country' => 'in_collection:countries',
        ]);

        //Écrire dans la base de données

        Response::redirect('/loss-declaration');
    }

    public function show()
    {
        // Analyser la query string pour savoir quelle déclaration afficher

        $email = 'toto';
        require VIEW_DIR.'/lossdeclaration/show.php';
    }
}
