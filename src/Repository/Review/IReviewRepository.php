<?php

namespace App\Repository\Review;

interface IReviewRepository
{
    /**
     * @return ReviewSql[]
     */
    public function getReviews(): array;

    public function createReview(int $idUser, string $comment, int $stars);

    public function deleteReview(int $idReview);
}

?>