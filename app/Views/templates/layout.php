<!-- Views/templates/layout.php -->

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css" rel="stylesheet">

    <title><?php echo $title ?? 'LOC MNS'; ?> </title>

    <link rel="stylesheet" href="/css/style.css">

    <!-- css du Dashboard -->
    <?php if(isset($dashboard)&& $dashboard): ?>
        <link rel="stylesheet" href="/css/dashboard.css">
    <?php endif; ?>
    
    
</head>
<body>
    <?php echo $content; ?>
</body>
</html>