<?php

namespace Animal\Controllers;

use Animal\Models\Country;
use Animal\Models\PetType;
use Tecgdcs\Response;
use Tecgdcs\Validator;

class LossDeclarationController
{
    public function create()
    {
        $countries = Country::all();
        $pet_types = PetType::all();

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
