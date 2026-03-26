<?php

$title = 'Avis';

$pageCss = '<link rel="stylesheet" href="/public/css/reviews.css">';

require_once __DIR__ . '/header.php';
?>
<div class="review-body">

  <h1>Avis</h1>

  <div class="page-container">

    <div class="review-list">
    
      <?php foreach ($_SESSION['reviews'] as $review): ?>

        <div class="review-section">

          <div class="review-header">

            <div class="user-info">

                  <p class="text-inter"><?= htmlspecialchars($review->getUsername()) ?></p>

            </div>

            <div class="stars">
              <?php for ($i = 0; $i < $review->getStars(); $i++): ?>
                  <img src="/public/assets/Star.png" alt="étoile">
              <?php endfor; ?>
            </div>

          </div>
            <p class="text-inter-gray"><?= htmlspecialchars($review->getComment()) ?></p>
        </div>

      <?php endforeach; ?>

    </div>

    <div class="add-review">

      <h2>Écrire un avis</h2>
      <form method="POST" action="/create-review">
        <textarea 
            name="comment" 
            class="textarea-editor" 
            placeholder="Ajouter un avis..." 
            required>
        </textarea>

        <div class="rate">
          <?php for ($i = 1; $i <= 5; $i++): ?>
              <label>
                  <input type="radio" name="stars" value="<?= $i ?>" required>
                  <?= $i ?> <img src="/public/assets/Star.png" alt="étoile">
              </label>
          <?php endfor; ?>
        </div>

        <button type="submit">Ajouter un avis</button>
      </form>

</div>
  </div>


</div>

<?php
require_once __DIR__ . '/footer.php';
?>