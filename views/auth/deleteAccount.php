
<?php

$title = 'Validation mail';

$pageCss = '<link rel="stylesheet" href="/public/css/registerCode.css">';

require_once __DIR__ . '/../header.php';
?>    
    <div class="body-section">
        <h1>Êtes-vous sur de vouloir supprimer votre compte ?</h1>
        <h2>Veuillez noter que ceci est permanent et ne peut être annulé.</h2>

        <?php if (isset($_SESSION['deleteAccountError'])): ?>
            <span class="error"><?= htmlspecialchars($_SESSION['deleteAccountError']) ?></span>
            <?php unset($_SESSION['deleteAccountError']);?>
        <?php endif; ?>

        <form method="POST" action="/user-delete-account" class="code-section">
            <p>Confirmer le avec votre mot de passe</p>
            <input type="text" name="password" placeholder="Mot de passe">
            <div class="button">
                <button class="valider">Non</button>
                <button class="retour">Oui</button>
            </div>
        </form>
    </div>
<?php include __DIR__ . '/../footer.php'; ?>
