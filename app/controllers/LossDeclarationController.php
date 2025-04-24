<?php

namespace Animal\Controllers;

use Animal\Models\Country;
use Animal\Models\Loss;
use Animal\Models\PetOwner;
use Animal\Models\PetType;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use JetBrains\PhpStorm\NoReturn;
use Tecgdcs\Response;
use Tecgdcs\Validator;
use Tecgdcs\View;

class LossDeclarationController
{
    public function index(): void
    {
        $title = 'Dashboard';
        $losses = Loss::all();

        View::make('lossdeclaration.index', compact('title', 'losses'));
    }

    public function create()
    {
        $countries = Country::all();
        $pet_types = PetType::all();
        $title = "J’ai perdu mon animal";
        View::make('lossdeclaration.create', compact('pet_types', 'countries', 'title'));
    }

    #[NoReturn]
    public function store(): void
    {
        $_SESSION['errors'] = null;
        $_SESSION['old'] = null;

        Validator::check([
            'email' => 'required|email',
            'vemail' => 'required|same:email',
            'phone' => 'phone',
            'country' => 'exists:countries,code',
        ]);

        PetOwner::upsert(
            [
                [
                    'email' => $_REQUEST['email'],
                    'phone' => $_REQUEST['phone'],
                ],
            ],
            uniqueBy: ['email'],
            update: ['phone']
        );


        Response::redirect('/loss-declaration/show?id='.$loss->id);
    }

    public function show(): void
    {
        $id = (int) trim($_REQUEST['id']);

        try {
            $pet_owner = PetOwner::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            Response::abort();
        }

        $title = 'Détails de la déclaration de perte';

        View::make('lossdeclaration.show', compact('title'));
    }
}
