<?php

namespace App\Service\Review;

interface IReviewService
{
    /**
     * @return Review[]
     */
    public function getReviews(): array;

    public function createReview(int $idUser, string $comment, int $stars);

    public function deleteReview(int $idReview);
}

?>