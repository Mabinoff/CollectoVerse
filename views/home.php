<?php

$title = 'Acceuil';

$pageCss = '<link rel="stylesheet" href="/public/css/home.css">';

$pageJs = '<script src="/public/js/homeCaroussel.js" defer></script>';

require_once __DIR__ . '/header.php';
?>

<section class="home-section">

    <div class="title-section">

        <h1>Votre collection, Votre univers</h1>
        <p class="text-inter">Rejoignez CollectoVerse et ajoutez toutes vos collections de cartes, qu'elles appartiennent à des catégories existantes ou créez votre propre univers en créant vos propres catégories.</p>

    </div>

    <img src="/public/assets/LogoMinVarCarte.png" class="planet">

</section>

<section class='body-section'>

    <div class="categorie-section">

        <div class="categorie-asset">
            <a class="categorie-font">Cinéma</a>
        </div>
        <div class="categorie-asset">
            <a class="categorie-font">Musique</a>
        </div>
        <div class="categorie-asset">
            <a class="categorie-font">Carte à collectionner</a>
        </div>
        <div class="categorie-asset">
            <a class="categorie-font">Jeux Vidéo</a>
        </div>
        <div class="categorie-asset">
            <a class="categorie-font">Bandes déssinées</a>
        </div>
        <div class="categorie-asset">
            <a class="categorie-font">Souvenir</a>
        </div>
        <div class="categorie-asset">
            <a class="categorie-font">Design</a>
        </div>

    </div>

    <div class="card-section">

        <div class="arrow" id="g" role="button" tabindex="0" aria-label="Précédent">
            <svg xmlns="http://www.w3.org/2000/svg" class="arrow-svg" fill="#ffffff" viewBox="0 0 256 256"><path d="M168.49,199.51a12,12,0,0,1-17,17l-80-80a12,12,0,0,1,0-17l80-80a12,12,0,0,1,17,17L97,128Z"></path></svg>
        </div>


        <div class="carousel-viewport">
            <div class="card-group" id="track">
                <div class="card-design">
                    <div class="card">
                        <img src="/public/assets/leclerc.jpg" alt="image-exemple-home-1">
                    </div>

                    <div class="card-text">
                        <p class="card-title">Charles LECLERC</p>

                        <div class="categorie-card">
                            <div class="categorie-color" id="c1">
                            </div>
                            <p class="text-nunito-gray">
                                Carte à collectionner
                            </p>
                        </div>
                    </div>
                </div>
                <div class="card-design">
                    <div class="card">
                        <img src="/public/assets/presse.webp" alt="image-exemple-home-2">
                    </div>

                    <div class="card-text">
                        <p class="card-title">Presse Agrume</p>

                        <div class="categorie-card">
                            <div class="categorie-color" id="c2">
                            </div>
                            <p class="text-nunito-gray">
                                Design
                            </p>
                        </div>
                    </div>
                </div>
                <div class="card-design">
                    <div class="card">
                        <img src="/public/assets/london.webp" alt="image-exemple-home-3">
                    </div>

                    <div class="card-text">
                        <p class="card-title">Londres</p>

                        <div class="categorie-card">
                            <div class="categorie-color" id="c3">
                            </div>
                            <p class="text-nunito-gray">
                                Souvenir
                            </p>
                        </div>
                    </div>
                </div>
                <div class="card-design">
                    <div class="card">
                        <img src="/public/assets/frigiel.webp" alt="image-exemple-home-4">
                    </div>

                    <div class="card-text">
                        <p class="card-title">Frigiel et Fluffy T1</p>

                        <div class="categorie-card">
                            <div class="categorie-color" id="c4">
                            </div>
                            <p class="text-nunito-gray">
                                Bandes Déssinées
                            </p>
                        </div>
                    </div>
                </div>
                <div class="card-design">
                    <div class="card">
                        <img src="/public/assets/mariomovie.webp" alt="image-exemple-home-5">
                    </div>

                    <div class="card-text">
                        <p class="card-title">Super Mario bros</p>

                        <div class="categorie-card">
                            <div class="categorie-color" id="c5">
                            </div>
                            <p class="text-nunito-gray">
                                Cinéma
                            </p>
                        </div>
                    </div>
                </div>
                <div class="card-design">
                    <div class="card">
                        <img src="/public/assets/kirby.webp" alt="image-exemple-home-6">
                    </div>

                    <div class="card-text">
                        <p class="card-title">Kirby Gameboy</p>

                        <div class="categorie-card">
                            <div class="categorie-color" id="c6">
                            </div>
                            <p class="text-nunito-gray">
                                Jeux Vidéo
                            </p>
                        </div>
                    </div>
                </div>
                <div class="card-design">
                    <div class="card">
                        <img src="/public/assets/coldplay.webp" alt="image-exemple-home-7">
                    </div>

                    <div class="card-text">
                        <p class="card-title">Viva la Vida</p>

                        <div class="categorie-card">
                            <div class="categorie-color" id="c7">
                            </div>
                            <p class="text-nunito-gray">
                                Musique
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="arrow" id="d" role="button" tabindex="0" aria-label="Suivant">
            <svg xmlns="http://www.w3.org/2000/svg" class="arrow-svg" fill="#ffffff" viewBox="0 0 256 256"><path d="M184.49,136.49l-80,80a12,12,0,0,1-17-17L159,128,87.51,56.49a12,12,0,1,1,17-17l80,80A12,12,0,0,1,184.49,136.49Z"></path></svg>
        </div>

    </div>
    <div class="button-section">
        <?php if (!isset($_SESSION['idUser'])): ?>
            <a href="/login"><button>Commencer ma collection</button></a>
        <?php else: ?>
            <a href="/collection"><button>Accéder à ma collection</button></a>
        <?php endif; ?>
        
    </div>


</section>

<?php
require_once __DIR__ . '/footer.php';
?>
    
</body>
</html>
