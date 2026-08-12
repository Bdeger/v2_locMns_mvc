<h1>Bonjour <?php echo htmlspecialchars($_SESSION['user']['prenom']); ?></h1>
<pre><?php print_r($_SESSION['user']); ?></pre>

<pre><?php print_r($listMateriel); ?></pre>