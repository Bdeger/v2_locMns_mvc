<!-- Views/templates/auth/login.php -->
<!-- page de connexion -->

<section class="section-login">
    <div class="login-container">
        <h1>LocMns</h1>
        <h2>Connectez-vous à votre compte</h2>

        <!-- formulaire de connexion -->
        <form action="/auth/processLogin" method="post" id="form-login">
                 <?php  if(isset($error)): ?>
                <div class="error-message">
                    <?php echo htmlspecialchars($error); ?>
                </div>
            <?php endif ;?>
            <p class="form-note">* Champs Obligatoires</p>

            <div class="form-group">
                <label for="email">Email *</label>
                <input type="email" name="email" id="email" 
                       placeholder="stagiaireMns@gmail.com" required>
            </div>

            <div class="form-group">
                <label for="pwd">Mot de passe *</label>
                <input type="password" name="pwd" id="pwd" placeholder="••••••••" required>
            </div>
            <button type="submit" class="btn-submit">Se connecter</button>

        </form>

    </div>
</section>