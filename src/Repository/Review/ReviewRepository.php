<?php

namespace App\Repository\Review;

use App\Core\Database;
use App\Model\Review\ReviewSql;

class ReviewRepository implements IReviewRepository
{
    public function __construct(
        private readonly Database $databasePdo
    ) {}

    public function getReviews(): array
    {
        $query = 'SELECT r.*, u.username FROM Review r JOIN User u ON u.id_user = r.id_user';
        $rows = $this->databasePdo->getRows($query);
        return array_map(fn($row) => new ReviewSql($row), $rows);
    }

    public function createReview(int $idUser, string $comment, int $stars)
    {
        $query = 'INSERT INTO Review (id_user, comment, stars) VALUES (?, ?, ?)';
        $params = [$idUser, $comment, $stars];
        $this->databasePdo->exec($query, $params);
    }

    public function deleteReview(int $idReview)
    {
        $query = 'DELETE FROM Review WHERE id_review = ?';
        $params = [$idReview];
        $this->databasePdo->exec($query, $params);
    }
}
?>