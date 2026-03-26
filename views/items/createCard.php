<?php

$title = 'Créer une carte';

$pageCss = '
<link rel="stylesheet" href="/public/css/createCard.css">';

$pageJs = '
<script src="/public/js/createCard.js" type="module"></script>
';

require_once __DIR__ . '/../header.php';
?>

<div class="page-create-card">
    
    <section class="title-section">
        <h1>Ajouter une carte</h1>
        <p class="text-inter-gray">Remplissez les informations ci-dessous pour ajouter un nouvel objet de collection cosmique.</p>
    </section>

    <form class="info-section" method="POST" action="/create-item" enctype="multipart/form-data">
        
        <div class="form">
            <?php if (isset($_SESSION['createItemError'])): ?>
                <span class="error"><?= htmlspecialchars($_SESSION['createItemError']) ?></span>
                <?php unset($_SESSION['createItemError']);?>
            <?php endif; ?>

            <div class="input-section">
                <div class="input-component">
                    <p class="text-inter">Nom</p>
                    <input
                        id="name"
                        type="text"
                        name="name"
                        placeholder="Entrer le nom de votre carte"
                        class="input"
                        required
                    > 
                </div>

                <div class="input-component">
                    <p class="text-inter">Catégorie</p>

                    <div class="categorie-row">
                        <select id="baseCategorieSelect" name="idCategorie" class="input">
                            <option value="" selected>Aucune catégorie</option>
                            <?php foreach ($_SESSION['categoriesCreate'] as $categorieCreate): ?>
                                <option value=<?= $categorieCreate->getIdCategorie() ?> selected><?= $categorieCreate->getName() ?></option>
                            <?php endforeach; ?>
                        </select>

                        <span class="color-dot-preview" id="baseColorDot" ></span>
                    </div>

                    <button type="button" class="upload-btn" id="openCategoryModal">
                        configurer une catégorie
                    </button>


                    <input type="hidden" name="categoryColor" id="categoryColor">

                </div>

                <div class="input-component">
                    <p class="text-inter">Description</p>
                    <textarea
                        id="description"
                        name="description"
                        class="textarea-editor"
                        placeholder="Entrez la description de votre carte..."
                        required
                    ></textarea> 
                </div>

            </div>

            <div class="image-section">

                <img id="previewImage" class="image-preview" />

                <div class="upload-placeholder" id="uploadPlaceholder">
                    <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="#ffffff" viewBox="0 0 256 256">
                        <path d="M114,145.34a12,12,0,0,0-20,0L79,167.82,72.3,157.73a12,12,0,0,0-20.07.17L13.91,217.51A12,12,0,0,0,24,236H152a12,12,0,0,0,10-18.66Z"></path>
                    </svg>
                    <div>
                        <p class="text-file">Télécharger l'image de la carte</p>
                        <p class="text-inter-gray">
                            Glissez-déposez une image ici ou cliquez pour parcourir
                        </p>
                    </div>
                </div>

                <button type="button" class="upload-btn" id="uploadBtn">
                    Parcourir les fichiers
                </button>

                <input
                    type="file"
                    name="image"
                    id="fileInput"
                    accept="image/*"
                    hidden
                    required
                >

            </div>
 
        </div>
        
        <div class="button-section">
            <button onclick="resetForm" type="submit">Créer</button>
        </div>

    </form>
</div>

<div class="simple-modal-overlay" id="simpleModal">
  <div class="simple-modal">

    <h2>Configurer une catégorie</h2>
    
    <form action="/create-categorie" method="POST" class="form-modal">
        <div class="input-modal">
            <p class="text-inter-gray">Choisir une catégorie</p>
            <select id="modalCategorieSelect" class="input" name="idCategorie">
                <option value="" selected>Choisir...</option>
                <?php foreach ($_SESSION['categories'] as $categorieCreate): ?>
                    <option value=<?= $categorieCreate->getIdCategorie() ?> selected><?= $categorieCreate->getName() ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    
        <div class="input-modal">
            <p class="text-inter-gray">Choisir une couleur</p>
            <div class="color-picker-row">
                <input type="color" id="modalColorInput" name="color" value="#6C63FF" class="modal-color">  
            </div>
        </div>

        <?php if (isset($_SESSION['createCategorieError'])): ?>
            <span class="error"><?= htmlspecialchars($_SESSION['createCategorieError']) ?></span>
            <?php unset($_SESSION['createCategorieError']);?>
        <?php endif; ?>
    
        <button type="submit" id="validateCategory">Valider la catégorie</button>
    </form>
  </div>
</div>


<?php
require_once __DIR__ . '/../footer.php';
?>