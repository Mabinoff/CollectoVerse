<?php

$title = 'Ma collection';

$pageCss = '
<link rel="stylesheet" href="/public/css/collection.css">';


require_once __DIR__ . '/../header.php';

$activeCategorieId = $_GET['idCategorie'] ?? null;

?>
<script src="/public/js/filter.js" defer></script>

<div class="page-collection">
    <section class="categorie-section">
        <a href="/collection" class="collection-button <?= $activeCategorieId === null ? 'is-selected' : '' ?>">
            <svg class="card-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#ffffff" viewBox="0 0 256 256"><path d="M180,72H36A20,20,0,0,0,16,92V204a20,20,0,0,0,20,20H180a20,20,0,0,0,20-20V92A20,20,0,0,0,180,72Zm-4,128H40V96H176ZM240,52V176a12,12,0,0,1-24,0V56H64a12,12,0,0,1,0-24H220A20,20,0,0,1,240,52Z"></path></svg>
            <p class="text-inter">Toutes les cartes</p>    
        </a>

        <?php foreach ($_SESSION['categoriesCreate'] as $categorieCreate): ?>
            <?php $id = $categorieCreate->getIdCategorie(); ?>

            <a href="<?= '/collection?idCategorie=' . $id; ?>"
                class="collection-button <?= ((string)$activeCategorieId === (string)$id) ? 'is-selected' : '' ?>">

                <div class="categorie-color"
                    style="background-color: <?= $categorieCreate->getColor() ?>;">
                </div>

                <p class="text-inter">
                    <?= htmlspecialchars($categorieCreate->getName()) ?>
                </p>

            </a>
        <?php endforeach; ?>
    </section>
    
    <section class="collection-section">
        
        <h1>Ma collection</h1>
        
        <?php $search = $_GET['search'] ?? '';?>

        <form class="search-bar" action="/collection" method="GET" role="search">
            <?php if (!empty($activeCategorieId)): ?>
                <input type="hidden" name="idCategorie" value="<?= htmlspecialchars($activeCategorieId) ?>">
            <?php endif; ?>

            <input type="search" name="search" value="<?= htmlspecialchars($search) ?>" placeholder="Fast & Furious, Air Force 1, Guitare ..." aria-label="Rechercher dans ma collection" autocomplete="off">

            <button type="submit" class="search-submit" aria-label="Rechercher">
                <svg class="search-icon" xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="var(--gray)" viewBox="0 0 256 256"><path d="M232.49,215.51,185,168a92.12,92.12,0,1,0-17,17l47.53,47.54a12,12,0,0,0,17-17ZM44,112a68,68,0,1,1,68,68A68.07,68.07,0,0,1,44,112Z"></path>
                </svg>
            </button>
        </form>

        <div class="filter" id="filter" role="button" tabindex="0" aria-label="Ouvrir le menu" aria-expanded="false">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#ffffff" viewBox="0 0 256 256"><path d="M180,72H36A20,20,0,0,0,16,92V204a20,20,0,0,0,20,20H180a20,20,0,0,0,20-20V92A20,20,0,0,0,180,72Zm-4,128H40V96H176ZM240,52V176a12,12,0,0,1-24,0V56H64a12,12,0,0,1,0-24H220A20,20,0,0,1,240,52Z"></path></svg>
            <p class="text-filter">Filtres</p> 
        </div>

        <div class="card-section">
            <?php foreach ($_SESSION['items'] as $item): ?>
                <a href="<?= '/view-card/' . $item->getIdItem(); ?>">
                    <div class="card-design">
                        <div class="card">
                            <img src="<?= '/get-image/' . $item->getPath(); ?>" alt="image-item">
                        </div>

                        <div class="card-text">
                            <p class="card-title">
                                <?= htmlspecialchars($item->getName()); ?>
                            </p>
                            <?php if ($item->getNameCategorie() && $item->getColorCategorie()): ?>
                                <div class="categorie-card">
                                    <div class="categorie-color"
                                        style="background-color: <?= htmlspecialchars($item->getColorCategorie()); ?>;">
                                    </div>
                                    <p class="text-nunito-gray">
                                        <?= htmlspecialchars($item->getNameCategorie()); ?>
                                    </p>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
        
    </section>
</div>

<?php
require_once __DIR__ . '/../footer.php';
?> 
  
</body>
</html>