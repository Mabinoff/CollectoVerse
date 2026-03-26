<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/x-icon" href="/public/assets/logo/favicon.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= $title ?? 'Collecto Verse' ?></title>
    <link rel="stylesheet" href="/public/css/index.css">
    <link rel="stylesheet" href="/public/css/layout.css">
    <script src="/public/js/burger.js" defer></script>
    <script src="/public/js/theme.js" defer></script>

    <?= $pageCss ?? '' ?>

</head>
<body>
<header class="site-header">
  <a href="/"><img src="/public/assets/logo/logo.svg" class="logo" alt="Collecto Verse"></a>
  
  <div class="logo-section">
    
    <div class="burger" id="burger" role="button" tabindex="0" aria-label="Ouvrir le menu" aria-expanded="false">
      <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="#ffffff" viewBox="0 0 256 256"><path d="M222,128a6,6,0,0,1-6,6H40a6,6,0,0,1,0-12H216A6,6,0,0,1,222,128ZM40,70H216a6,6,0,0,0,0-12H40a6,6,0,0,0,0,12ZM216,186H40a6,6,0,0,0,0,12H216a6,6,0,0,0,0-12Z"></path></svg>
    </div>

    <nav class="nav" id="nav">
      <ul class="nav-list">
        <?php if (!isset($_SESSION['idUser'])): ?>
            <li class="layout-font"><a href="/">Accueil</a></li>
            <li class="layout-font"><a href="/contact">Contact</a></li>
            <li class="layout-font">
                <a class="nav-cta" href="/login">Connexion</a>
            </li>
        <?php else: ?>
            <li class="layout-font"><a href="/collection">Ma collection</a></li>
            <li class="layout-font"><a href="/contact">Contact</a></li>
            <div class="connection-section">
              <a class="nav-cta" href="/create-card">Ajouter une carte</a>
              <a class="nav-profils" href="/profile"><img src="/public/assets/profilsDefault.svg" class="profil" alt="Profiles"></a>
            </div>
        <?php endif; ?>
      </ul>
    </nav>

    <button class="theme-toggle" id="theme-toggle" type="button" aria-label="Activer le mode clair/sombre" aria-pressed="false">
        <svg class="theme-icon" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 256 256"><path d="M116,36V20a12,12,0,0,1,24,0V36a12,12,0,0,1-24,0Zm80,92a68,68,0,1,1-68-68A68.07,68.07,0,0,1,196,128Zm-24,0a44,44,0,1,0-44,44A44.05,44.05,0,0,0,172,128ZM51.51,68.49a12,12,0,1,0,17-17l-12-12a12,12,0,0,0-17,17Zm0,119-12,12a12,12,0,0,0,17,17l12-12a12,12,0,1,0-17-17ZM196,72a12,12,0,0,0,8.49-3.51l12-12a12,12,0,0,0-17-17l-12,12A12,12,0,0,0,196,72Zm8.49,115.51a12,12,0,0,0-17,17l12,12a12,12,0,0,0,17-17ZM48,128a12,12,0,0,0-12-12H20a12,12,0,0,0,0,24H36A12,12,0,0,0,48,128Zm80,80a12,12,0,0,0-12,12v16a12,12,0,0,0,24,0V220A12,12,0,0,0,128,208Zm108-92H220a12,12,0,0,0,0,24h16a12,12,0,0,0,0-24Z"></path></svg>
    </button>

  </div>

</header>
