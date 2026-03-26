<?php

namespace App\Model\Review;

final readonly class ReviewSql
{
    public int $id_review;
    public string $id_user;
    public int $stars;
    public string $comment;
    public string $username;
    public \DateTime $created_at;

    public function __construct(array $data) {
        $this->id_review = (int) $data['id_review'];
        $this->id_user = (int) $data['id_user'];
        $this->stars = (int) $data['stars'];
        $this->comment = $data['comment'];
        $this->username = $data['username'];
        $this->created_at = new \DateTime($data['created_at']);
    }
}

?>