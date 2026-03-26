<?php

$title = 'Ma collection';

$pageCss = '<link rel="stylesheet" href="/public/css/forgotPasswordNew.css">';

require_once __DIR__ . '/../header.php';
?>

<div class="body-section">
    <div class="reset-section">
        <div>
            <h1>Réinitialiser votre mot de passe</h1>
            <p>Entrer votre nouveau mot de passe</p>
        </div>

        <?php if (isset($_SESSION['forgotPasswordNewError'])): ?>
            <span class="error"><?= htmlspecialchars($_SESSION['forgotPasswordNewError']) ?></span>
            <?php unset($_SESSION['forgotPasswordNewError']);?>
        <?php endif; ?>

        <form action="/forgot-password-new-action" method="POST">
            <input type="password" name="password" placeholder="Nouveau mot de passe" required>
            <input type="password" name="confirmPassword" placeholder="Confirmer votre nouveau mot de passe" required>
            <button type="submit" value="resetPassword">Confirmer</button>
        </form>
    </div>        
    <div class="login-style">
        <img src="../../public/assets/collectoverseResetPassword.webp" alt="image-ResetPassword" class="logofond" >
    </div>    
</div>

<?php
require_once __DIR__ . '/../footer.php';
?>
    
</body>
</html>