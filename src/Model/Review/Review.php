<?php

namespace App\Model\Review;

class Review
{
    private int $idReview;
    private int $idUser;
    private int $stars;
    private string $comment;
    private string $username;
    private \DateTime $createdAt;

    public function __construct(
        int $idReview,
        int $idUser,
        int $stars,
        string $comment,
        string $username,
        \DateTime $createdAt
    ) {
        $this->idReview = $idReview;
        $this->idUser = $idUser;
        $this->stars = $stars;
        $this->comment = $comment;
        $this->username = $username;
        $this->createdAt = $createdAt;
    }

    public function getIdReview(): int
    {
        return $this->idReview;
    }

    public function getIdUser(): int
    {
        return $this->idUser;
    }

    public function getStars(): int
    {
        return $this->stars;
    }

    public function setStars(int $stars)
    {
        $this->stars = $stars;
    }

    public function getComment(): string
    {
        return $this->comment;
    }

    public function setComment(string $comment)
    {
        $this->comment = $comment;
    }

    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }

    public function getUsername(): string
    {
        return $this->username;
    }
}

?>