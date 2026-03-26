<?php

$title = 'Connexion';

$pageCss = '
<link rel="stylesheet" href="/public/css/login.css">';

require_once __DIR__ . '/../header.php';
?>
    <div class="body-section">
        <div class="formulary-section">
            <div>
                <h1>Connexion</h1>
                <p class="para-login">
                    Vous n'avez pas encore de compte ?
                    <a href="/register">Inscrivez-vous</a>
                </p>
            </div>
            <div>
                <form action="/user-login" method="POST">
                    <?php if (isset($_SESSION['loginError'])): ?>
                        <span class="error"><?= htmlspecialchars($_SESSION['loginError']) ?></span>
                        <?php unset($_SESSION['loginError']);?>
                    <?php endif; ?>

                    <input type="text" name="login" placeholder="Email" required>
                    <input type="password" name="password" placeholder="Mot de passe" required>
                    <p class="para-login">
                        Mot de passe oublié ? 
                        <a href="/forgot-password">Modifier votre mot de passe</a>
                    </p>
                    <button type="submit" value="login">Connexion</button>
                </form>
            </div>
        </div>
        <div class="login-style">
            <img src="../../public/assets/collectoverseLogin.webp" alt="image-login" class="logofond" >
        </div>
    </div>

<?php
require_once __DIR__ . '/../footer.php';
?>
