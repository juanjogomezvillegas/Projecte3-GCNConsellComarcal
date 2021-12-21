<!DOCTYPE html>
<html lang="ca">

<head>

    <!-- Incluguem el fitxer head que contindrà totes  -->
    <?php require '../src/includes/head.php'; ?>
    <title><?php echo $informacioArticle["titol"] ?> | GCN Consell Comarcal</title>
</head>

<body>
<?php
    require '../src/includes/nav.php';
    ?>
    
    <div class="bg-gradient-to-r from-purple-300 to-blue-200">
    <div class="w-9/12 m-auto py-16 min-h-screen flex items-center justify-center">
    <div class="bg-white shadow overflow-hidden sm:rounded-lg pb-8">
    <div class="border-t border-gray-200 text-center pt-8">
    <h1 class="text-9xl font-bold text-purple-400">Error: 404</h1>
    <h1 class="text-6xl font-medium py-8">Oops! La Pàgina no Funciona !!!</h1>
    <p class="text-2xl pb-8 px-12 font-medium">És Redireccionara en 10 segons.</p>
    </div>
    </div>
    </div>
    </div>

</body>

</html>