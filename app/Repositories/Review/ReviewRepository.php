<?php
namespace App\Repositories\Review;

use App\Models\Review;

class ReviewRepository
{

    public function find($id)
    {
        return Review::find($id);
    }

    public function getReviewAvg($id)
    {
        $avgRating   = Review::where('reviewed_user_id', $id)->avg('rating') ?? 0;
        $ratingCount = Review::where('reviewed_user_id', $id)->count() ?? 0;
        return [
            'rating'       => $avgRating,
            'rating_count' => $ratingCount,
        ];
    }
    public function create(array $data)
    {
        return Review::create($data);
    }

    public function update(Review $model, array $data)
    {
        $model->update($data);
        return $model;
    }

}
