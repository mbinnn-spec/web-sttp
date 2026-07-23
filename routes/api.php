<?php

use Illuminate\Support\Facades\Route;

// Authentication
use App\Http\Controllers\Api\AuthController;

// Dashboard & Profile
use App\Http\Controllers\Api\DashboardController;
use App\Http\Controllers\Api\ProfileController;

// Admin
use App\Http\Controllers\Api\Admin\UserController;

// Proposal (User/Dosen)
use App\Http\Controllers\Api\Proposal\ProposalController as UserProposalController;
use App\Http\Controllers\Api\Proposal\ProposalMemberController;
use App\Http\Controllers\Api\Proposal\ProposalRabController;
use App\Http\Controllers\Api\Proposal\ProposalFileController;
use App\Http\Controllers\Api\Proposal\ResearchReportController;
use App\Http\Controllers\Api\Proposal\ReviewController;

// Ketua LPPM
use App\Http\Controllers\Api\Lppm\DashboardController as LppmDashboardController;
use App\Http\Controllers\Api\Lppm\ProposalController as LppmProposalController;

// Ketua STT
use App\Http\Controllers\Api\KetuaStt\DashboardController as KetuaSttDashboardController;
use App\Http\Controllers\Api\KetuaStt\ProposalController as KetuaSttProposalController;

Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {

    // Authentication
    Route::post('/logout', [AuthController::class, 'logout']);

    // Dashboard User/Dosen
    Route::get('/dashboard', [DashboardController::class, 'index']);

    // Profile
    Route::get('/profile', [ProfileController::class, 'index']);
    Route::put('/profile', [ProfileController::class, 'update']);
    Route::put('/profile/change-password', [ProfileController::class, 'changePassword']);

    // Proposal User/Dosen
    Route::apiResource('proposals', UserProposalController::class);
    Route::apiResource('proposal-members', ProposalMemberController::class);
    Route::apiResource('proposal-rabs', ProposalRabController::class);
    Route::apiResource('proposal-files', ProposalFileController::class);

    // Endpoint Download Proposal File
    Route::get(
        'proposal-files/{proposalFile}/download',
        [ProposalFileController::class, 'download']
    );

    Route::apiResource('research-reports', ResearchReportController::class);
    Route::apiResource('reviews', ReviewController::class);

    // Admin
    Route::middleware('role:admin')->prefix('admin')->group(function () {

        Route::apiResource('users', UserController::class);

        Route::patch(
            'users/{user}/reset-password',
            [UserController::class, 'resetPassword']
        );
    });

    // Ketua LPPM
    Route::middleware('role:ketua_lppm')->prefix('lppm')->group(function () {

        Route::get('/dashboard', [LppmDashboardController::class, 'index']);

        Route::get('/proposals', [LppmProposalController::class, 'index']);
        Route::get('/proposals/{proposal}', [LppmProposalController::class, 'show']);

        Route::patch('/proposals/{proposal}/approve', [LppmProposalController::class, 'approve']);
        Route::patch('/proposals/{proposal}/reject', [LppmProposalController::class, 'reject']);
        Route::patch('/proposals/{proposal}/revision', [LppmProposalController::class, 'revision']);
    });

    // Ketua STT
    Route::middleware('role:ketua_stt')->prefix('ketua-stt')->group(function () {

        Route::get('/dashboard', [KetuaSttDashboardController::class, 'index']);

        Route::get('/proposals', [KetuaSttProposalController::class, 'index']);
        Route::get('/proposals/{proposal}', [KetuaSttProposalController::class, 'show']);

        Route::patch('/proposals/{proposal}/approve', [KetuaSttProposalController::class, 'approve']);
        Route::patch('/proposals/{proposal}/reject', [KetuaSttProposalController::class, 'reject']);
    });
});