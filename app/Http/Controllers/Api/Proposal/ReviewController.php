<?php

namespace App\Http\Controllers\Api\Proposal;

use App\Http\Controllers\Controller;
use App\Http\Requests\Proposal\StoreReviewRequest;
use App\Http\Requests\Proposal\UpdateReviewRequest;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function index()
    {
        return Review::with(['proposal', 'reviewer'])
            ->latest()
            ->get();
    }

    public function store(StoreReviewRequest $request)
    {
        $review = Review::create([
            ...$request->validated(),
            'reviewer_id' => Auth::id(),
        ]);

        return response()->json([
            'message' => 'Review berhasil ditambahkan.',
            'data' => $review
        ], 201);
    }

    public function show(Review $review)
    {
        return $review->load(['proposal', 'reviewer']);
    }

    public function update(UpdateReviewRequest $request, Review $review)
    {
        $review->update($request->validated());

        return response()->json([
            'message' => 'Review berhasil diperbarui.',
            'data' => $review
        ]);
    }

    public function destroy(Review $review)
    {
        $review->delete();

        return response()->json([
            'message' => 'Review berhasil dihapus.'
        ]);
    }
}