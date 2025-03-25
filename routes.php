<?php

return [
    [
        'uri' => '/', 'verb' => 'GET',
        'action' => [Animal\controllers\PageController::class, 'welcome'],
    ],
    [
        'uri' => '/loss-declaration/create', 'verb' => 'GET',
        'action' => [Animal\controllers\LossDeclarationController::class, 'create'],
    ],
    [
        'uri' => '/loss-declaration', 'verb' => 'POST',
        'action' => [Animal\controllers\LossDeclarationController::class, 'store'],
    ],
    [
        'uri' => '/loss-declaration', 'verb' => 'GET',
        'action' => [Animal\controllers\LossDeclarationController::class, 'show'],
    ],
];
