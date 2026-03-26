<?php

$title = 'Login-Admin';

$pageCss = '<link rel="stylesheet" href="/public/css/loginAdmin.css">';

include 'adminHeader.php';
?>
	<div class="body-section">
		<div class="formulary-sexion">
			<div>
				<h1>Connexion d'Admin</h1>
			</div>
			<div>
				<form action="/admin-login-form" method="POST">
					<?php if (isset($_SESSION['adminLoginError'])): ?>
						<span class="error"><?= htmlspecialchars($_SESSION['adminLoginError']) ?></span>
						<?php unset($_SESSION['adminLoginError']);?>
					<?php endif; ?>

					<input type="text" name="login" placeholder="Email" required>
					<input type="password" name="password" placeholder="Mot de passe" required> 
					<button type="submit" value="login">Connexion</button>
				</form>
			</div>
		</div>
	</div>
</body>
</html>

