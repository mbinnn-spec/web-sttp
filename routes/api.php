<?php

use Illuminate\Support\Facades\Route;

// Authentication
use App\Http\Controllers\Api\AuthController;

// Dashboard & Profile
use App\Http\Controllers\Api\DashboardController;
use App\Http\Controllers\Api\ProfileController;

// Admin
use App\Http\Controllers\Api\Admin\UserController;

// Proposal
use App\Http\Controllers\Api\Proposal\ProposalController;
use App\Http\Controllers\Api\Proposal\ProposalMemberController;
use App\Http\Controllers\Api\Proposal\ProposalRabController;

Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {

    // Dashboard User/Dosen
    Route::get('/dashboard', [DashboardController::class, 'index']);

    // Profile
    Route::get('/profile', [ProfileController::class, 'index']);
    Route::put('/profile', [ProfileController::class, 'update']);
    Route::put('/profile/change-password', [ProfileController::class, 'changePassword']);

    // Proposal
    Route::apiResource('proposals', ProposalController::class);
    Route::apiResource('proposal-members', ProposalMemberController::class);
    Route::apiResource('proposal-rabs', ProposalRabController::class);

    // Admin
    Route::middleware('role:admin')->prefix('admin')->group(function () {

        Route::apiResource('users', UserController::class);

        Route::patch(
            'users/{user}/reset-password',
            [UserController::class, 'resetPassword']
        );

    });

});