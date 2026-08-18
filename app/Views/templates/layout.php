<!-- Views/templates/layout.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=menu" />

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined">

    <title><?php echo $title ?? 'LOC MNS'; ?> </title>

    <link rel="stylesheet" href="/css/style.css">

    <script src="/js/script.js" defer></script>



    <!-- css du Dashboard -->
    <?php if(isset($dashboard)&& $dashboard): ?>
        <link rel="stylesheet" href="/css/admin/dashboard.css">
        <link rel="stylesheet" href="/css/admin/sidebar.css">

    <?php endif; ?>

     <?php if(isset($materielPage)&&$materielPage): ?>
        <link rel="stylesheet" href="/css/admin/sidebar.css">
        <link rel="stylesheet" href="/css/admin/materiel.css"> 
    <?php endif; ?>

    <?php if(isset($membrePage)&& $membrePage): ?>
        <link rel="stylesheet" href="/css/admin/materiel.css">
        <link rel="stylesheet" href="/css/admin/membre.css">
    <?php endif; ?>

    <!-- COTE EMPRUNTEUR -->
    <?php if(isset($accueil) && $accueil): ?>
        <link rel="stylesheet" href="/css/user/navbar.css">
        <link rel="stylesheet" href="/css/user/accueil.css">
    <?php endif; ?>

    
    <?php if(isset($categorie) && $categorie): ?>
        <link rel="stylesheet" href="/css/user/navbar.css">
        <link rel="stylesheet" href="/css/user/categorie.css">
    <?php endif; ?>

    <!-- DEMANDE  -->
    <?php if(isset($demande) && $demande): ?>
        <link rel="stylesheet" href="/css/user/navbar.css">
        <link rel="stylesheet" href="/css/user/demander.css">
    <?php endif; ?>

</head>
<body>
    <?php echo $content; ?>
</body>
</html>