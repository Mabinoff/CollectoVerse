<?php

$title = 'Mot de passe oublié';

$pageCss = '<link rel="stylesheet" href="/public/css/forgotPassword.css">';

require_once __DIR__ . '/../header.php';
?>

    <div class="body-section">
        <div class="formulary-section">
            <div class="mdp">
                <h1>Mot de passe oublié</h1>
                <h2>Entrer votre email pour réinitialiser votre mot de passe</h2>
            </div>

            <?php if (isset($_SESSION['forgotPasswordError'])): ?>
                <span class="error"><?= htmlspecialchars($_SESSION['forgotPasswordError']) ?></span>
                <?php unset($_SESSION['forgotPasswordError']);?>
            <?php endif; ?>

            <form action="/forgot-password-request" method="POST">
                <input type="text" name="email" placeholder="E-mail" required>
                <button type="submit" value="comfirm-email">Confirmer votre Email</button>
            </form>
        </div>
        <div class="login-style">
            <img src="../../public/assets/collectoverseLostPassword.webp" alt="image-forgotPassword" class="logofond" >
        </div>
    </div>
<?php
require_once __DIR__ . '/../footer.php';
?>