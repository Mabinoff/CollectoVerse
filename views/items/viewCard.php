<?php

$title = 'Ma carte';

$pageCss = '
<link rel="stylesheet" href="/public/css/viewCard.css">';

$pageJs = '<script src="/public/js/viewCard.js" defer></script>';

require_once __DIR__ . '/../header.php';

?>
<?php if (!empty($_SESSION['flash_success'])): ?>
    <div class="toast toast-success" id="toast">
        <?= htmlspecialchars($_SESSION['flash_success'], ENT_QUOTES) ?>
    </div>
<?php unset($_SESSION['flash_success']); ?>
<?php endif; ?>

<div class="page-view-card" id="viewCard">

   
    <form class="card-form" method="POST" action="/update-item">

        <input type="hidden" name="idItem" value="<?= $_SESSION["item"]->getIdItem(); ?>">

        <input type="hidden" name="idCategorie"value="<?= $_SESSION["item"]->getIdCategorie(); ?>">

        <img class="view-image" src="<?= '/get-image/' . $_SESSION["item"]->getPath(); ?>">

        <section class="informations-section">

            <div class="header">

                
                <div class="title-wrap">
                    <h1 class="view-only"><?= $_SESSION["item"]->getName(); ?></h1>

                    <input class="edit-only title-input" type="text" name="name" value="<?= htmlspecialchars($_SESSION["item"]->getName(), ENT_QUOTES) ?>">
                </div>

                <div class="button-section">

                    <button type="button" class="edit-button view-only" id="editBtn">
                        Modifier
                    </button>

                    <a href="<?= '/delete-item/' . $_SESSION["item"]->getIdItem() ?>" class="red-button view-only">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#ffffff" viewBox="0 0 256 256">
                            <path d="M216,48H176V40a24,24,0,0,0-24-24H104A24,24,0,0,0,80,40v8H40a8,8,0,0,0,0,16h8V208a16,16,0,0,0,16,16H192a16,16,0,0,0,16-16V64h8a8,8,0,0,0,0-16ZM96,40a8,8,0,0,1,8-8h48a8,8,0,0,1,8,8v8H96Zm96,168H64V64H192ZM112,104v64a8,8,0,0,1-16,0V104a8,8,0,0,1,16,0Zm48,0v64a8,8,0,0,1-16,0V104a8,8,0,0,1,16,0Z"></path>
                        </svg>
                    </a>

                    <button type="submit" class="save-button edit-only">
                        Enregistrer
                    </button>

                    <button type="button" class="edit-button edit-only" id="cancelBtn">
                        Annuler
                    </button>

                </div>

            </div>

            <div class="categorie-wrap">

                <div class="categorie view-only">
                    <p class="button"><?= $_SESSION["item"]->getNameCategorie() ?? 'Aucune catégorie'; ?></p>
                </div>

                
                <div class="edit-only">
                    <select class="categorie-select" name="idCategorie">
                    <option value="">Aucune catégorie</option>

                    <?php $cats = $_SESSION['categoriesCreate'] ?? $_SESSION['categories'] ?? [];?>

                    <?php foreach ($cats as $cat): ?>
                        <option value="<?= $cat->getIdCategorie(); ?>"
                        <?= ($cat->getIdCategorie() === $_SESSION["item"]->getIdCategorie()) ? 'selected' : '' ?>>
                        <?= htmlspecialchars($cat->getName() ?? $cat->getNameCategorie(), ENT_QUOTES) ?>
                        </option>
                    <?php endforeach; ?>
                    </select>
                </div>

            </div>

            <div class="separator"></div>

            <div class="description-section">
                <h2>Description</h2>

                <p class="text-inter-gray view-only"><?= $_SESSION["item"]->getDescription(); ?></p>

                <textarea class="edit-only desc-input" name="description" rows="6"><?= htmlspecialchars($_SESSION["item"]->getDescription(), ENT_QUOTES) ?></textarea>
            </div>

        </section>

    </form>
</div>


<?php
require_once __DIR__ . '/../footer.php';
?>