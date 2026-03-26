
<?php

$title = 'Validation mail';

$pageCss = '<link rel="stylesheet" href="/public/css/registerCode.css">';

require_once __DIR__ . '/../header.php';
?>    
    <div class="body-section">
        <h1>Confirmer  votre mail</h1>
        <p>Nous avons envoyé à <?= $_SESSION['forgotPasswordEmail'] ?> un code de validation.
           Si vous ne trouvez pas le message, vérifiez dans vos dossiers de spam.</p>

        <?php if (isset($_SESSION['forgotPasswordCodeError'])): ?>
            <span class="error"><?= htmlspecialchars($_SESSION['forgotPasswordCodeError']) ?></span>
            <?php unset($_SESSION['forgotPasswordCodeError']);?>
        <?php endif; ?>

        <form action="/forgot-password-code-action" method="POST" class="code-section">
            <input type="text" name="code" placeholder="Saisir le code">
            <div class="button">
                <button type="submit" class="valider">valider</button>
                <button class="retour">Retour</button>
            </div>
        </form>
    </div>
<?php include __DIR__ . '/../footer.php'; ?>
