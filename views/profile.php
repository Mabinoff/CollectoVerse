<?php

$title = 'Profil';

$pageCss = '<link rel="stylesheet" href="/public/css/profil.css">';

require_once __DIR__ . '/header.php';
?>
    <div class="body-section">
        <div class="information-section">
            <div>
                <img  class="profil-image" src="/public/assets/profilsDefault.svg" alt="profils-defaults">
            </div>
                <div class="name-section">
                    <div class="user-info">
                        <div class="name-info">
                            <div class="username">
                                <?= htmlspecialchars($_SESSION['username']) ?>
                            </div>
                            <div class="email">
                                <?= htmlspecialchars($_SESSION['email']) ?>
                            </div>
                        </div>
                        <div class="button-section">
                            <button class="modify">Modifier le Profil</button>
                            <a class="disconnect-button" href="/user-logout">Se Déconnecter</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="info-stats">
                <div class="progress-section">
                    <h1>Stats</h1>
                </div>  
                <div class="stats-section">
                    <div class="card-stats">
                        <h2><?= count($_SESSION['items']) ?></h2>
                        <h3 class="text-color">Cartes</h3>
                    </div>
                    <div class="categories-stats">
                        <h2><?= count($_SESSION['categoriesCreate']) ?></h2>
                        <h3 class="text-color">catégorie</h3>
                    </div>
                </div>
            </div> 
        </div>
    </div>
<?php include 'footer.php'; ?>
