<?php

$title = 'Créer un compte';

$pageCss = '
<link rel="stylesheet" href="/public/css/register.css">';

require_once __DIR__ . '/../header.php';
?>

    <div class="body-section">
        <div class="formulary-section">
            <div>
                <h1>S'inscrire</h1>
            </div>
            <div>
                <form action="/user-register" method="POST">
                    <?php if (isset($_SESSION['registerError'])): ?>
                        <span class="error"><?= htmlspecialchars($_SESSION['registerError']) ?></span>
                        <?php unset($_SESSION['registerError']);?>
                    <?php endif; ?>
                    
                    <input type="text" name="username" placeholder="Nom d’utilisateur" required>
                    <input type="text" name="email" placeholder="Email" required>
                    <input type="password" name="password" placeholder="Mot de passe" required>
                    <input type="password" name="confirmPassword" placeholder="Confirmer le mot de passe" required>
                    <p class="para-register">
                        Vous avez déjà un compte ? 
                        <a href="/login">Connectez-vous.</a>
                    </p>
                    <button type="submit" value="register">S'inscrire</button>
                </form>
            </div>
        </div>
        <div class="login-style">
            <img src="../../public/assets/collectoverseRegister.webp" alt="image-register" class="logofond" >
        </div>
    </div>
<?php
require_once __DIR__ . '/../footer.php';
?>
</body>
</html>