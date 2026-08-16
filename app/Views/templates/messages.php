<?php if(!empty($_SESSION['erreur'])): ?>
    <div class="message message-erreur">
        <i class="ti ti-alert-circle"></i>
        <p><?php echo htmlspecialchars($_SESSION['erreur']); ?></p>
    </div>
    <?php unset($_SESSION['erreur']); ?>
<?php endif; ?>

<?php if(!empty($_SESSION['succes'])): ?>
    <div class="message message-succes">
        <i class="ti ti-circle-check"></i>
        <p><?php echo htmlspecialchars($_SESSION['succes']); ?></p>
    </div>
    <?php unset($_SESSION['succes']); ?>
<?php endif; ?>