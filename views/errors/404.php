<?php

$title = 'Error 404 - Page not found';

$pageCss = '
<link rel="stylesheet" href="/public/css/404.css">';


require_once __DIR__ . '/../header.php';
?>
<section class="main-404">
    <div class="body-section">
        <a href="/"><img class="body-section-img" src="/public/assets/Frame404.png" alt="Erreur 404"></a>
    </div>    
</section>
<?php include './views/footer.php'; ?>