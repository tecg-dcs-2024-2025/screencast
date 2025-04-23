<?php

use Animal\Middlewares\{Auth, Csrf, Guest, RequestRequiresId};

return [
    [
        'uri' => '/',
        'verb' => 'GET',
        'action' => [Animal\Controllers\PageController::class, 'welcome'],
    ],
    [
        'uri' => '/loss-declaration/create',
        'verb' => 'GET',
        'action' => [Animal\Controllers\LossDeclarationController::class, 'create'],
    ],
    [
        'uri' => '/loss-declaration',
        'verb' => 'POST',
        'action' => [Animal\Controllers\LossDeclarationController::class, 'store'],
        'middlewares' => [Csrf::class]

    ],
    [
        'uri' => '/loss-declaration',
        'verb' => 'GET',
        'action' => [Animal\Controllers\LossDeclarationController::class, 'index'],
        'middlewares' => [Auth::class]
    ],
    [
        'uri' => '/loss-declaration/show',
        'verb' => 'GET',
        'action' => [Animal\Controllers\LossDeclarationController::class, 'show'],
        'middlewares' => [Auth::class, RequestRequiresId::class]
    ],
    [
        'uri' => '/login',
        'verb' => 'GET',
        'action' => [Animal\Controllers\AuthenticatedSessionController::class, 'create'],
        'middlewares' => [Guest::class]
    ],
    [
        'uri' => '/login',
        'verb' => 'POST',
        'action' => [Animal\Controllers\AuthenticatedSessionController::class, 'store'],
        'middlewares' => [Guest::class, Csrf::class]
    ],
    [
        'uri' => '/dashboard',
        'verb' => 'GET',
        'action' => [Animal\Controllers\DashboardController::class, 'index'],
        'middlewares' => [Auth::class]
    ],
];
