<?php

namespace App\Controller;

use App\Service\Review\IReviewService;

class ReviewController
{
    public function __construct(
        private readonly IReviewService $reviewService
    ) {}

    private function setReviewError(string $error)
    {
        $_SESSION['reviewError'] = $error;
    }

    public function createReview()
    {
        if (!isset($_POST['comment']) || !isset($_POST['stars'])) {
            $this->setReviewError('Les champs sont incomplets');
            header('Location: /reviews');
            exit;
        }

        $idUser = $_SESSION['idUser'];
        $comment = $_POST['comment'];
        $stars = $_POST['stars'];

        $this->reviewService->createReview($idUser, $comment, $stars);
        header('Location: /reviews');
    }

    public function deleteReview(int $idReview)
    {
        if (!$idReview) {
            $this->setReviewError('Les champs sont incomplets');
            exit;
        }

        $idUser = $_SESSION['idUser'];
        $idReview = $_POST['idReview'];

        $this->reviewService->deleteReview($idReview, $idUser);
        exit;
    }
}

?>