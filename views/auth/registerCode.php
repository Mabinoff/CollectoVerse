
<?php

$title = 'Validation mail';

$pageCss = '<link rel="stylesheet" href="/public/css/registerCode.css">';

require_once __DIR__ . '/../header.php';
?>    
    <div class="body-section">
        <h1>Valider votre adresse e-mail</h1>
        <p>Saisissez le code de validation que  nous avons envoyé à <?= $_SESSION['registerEmail'] ?>.
           Si vous ne trouvez pas le message, vérifiez dans vos dossiers de spam.</p>
        <form method="POST" action="/user-register-code" class="code-section">
            <?php if (isset($_SESSION['registerCodeError'])): ?>
                <span class="error"><?= htmlspecialchars($_SESSION['registerCodeError']) ?></span>
                <?php unset($_SESSION['registerCodeError']);?>
            <?php endif; ?>

            <input name="code" type="text" placeholder="Saisir le code">
            <div class="button">
                <button type="submit" class="valider">valider</button>
                <button class="retour">Retour</button>
            </div>
        </form>
    </div>
<?php include __DIR__ . '/../footer.php'; ?>
