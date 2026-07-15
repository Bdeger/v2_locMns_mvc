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


    <!-- css du Dashboard -->
    <?php if(isset($dashboard)&& $dashboard): ?>
        <script src="/js/script.js" defer></script>
        <link rel="stylesheet" href="/css/dashboard.css">
        <link rel="stylesheet" href="/css/sidebar.css">

    <?php endif; ?>

     <?php if(isset($materiel)&&$materiel): ?>
        <script src="/js/script.js" defer></script>
        <link rel="stylesheet" href="/css/sidebar.css">
        <link rel="stylesheet" href="/css/materiel.css"> 

    <?php endif; ?>
    
</head>
<body>
    <?php echo $content; ?>
</body>
</html>