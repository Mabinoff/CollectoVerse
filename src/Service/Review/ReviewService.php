<?php

namespace App\Service\Review;

use App\Repository\Review\IReviewRepository;
use App\Model\Review\Review;

class ReviewService implements IReviewService
{
    private int $COMMENT_MAX_LENGTH = 1024;

    public function __construct(
        private readonly IReviewRepository $reviewRepository
    ) {}

    public function createReview(int $idUser, string $comment, int $stars)
    {
        if (strlen($comment) > $this->COMMENT_MAX_LENGTH) {
            throw new \Exception("Le commentaire de l'avis ne peut pas dépasser " . $this->COMMENT_MAX_LENGTH . " caractères");
        }
        
        $this->reviewRepository->createReview($idUser, $comment, $stars);
    }

    public function deleteReview(int $idReview)
    {
        $this->reviewRepository->deleteReview($idReview);
    }

    public function getReviews(): array
    {
        $reviewsSql = $this->reviewRepository->getReviews();
        return array_map(
            fn($review) => new Review(
                $review->id_review,
                $review->id_user,
                $review->stars,
                $review->comment,
                $review->username,
                $review->created_at
            ),
            $reviewsSql
        );
    }
}

?>