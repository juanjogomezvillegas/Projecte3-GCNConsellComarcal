<!DOCTYPE html>
<html lang="ca">

<head>

    <!-- Incluguem el fitxer head que contindrà totes  -->
    <?php require '../src/includes/head.php'; ?>
    <title>Error 404 | GCN Consell Comarcal</title>
</head>

<body>
<?php
    require '../src/includes/nav.php';
?>
    
    <div class="bg-red-800">
    <div class="w-9/12 m-auto py-16 min-h-screen flex items-center justify-center">
    <div class="dadesContacte aparicioMagica p-0 md:p-10 bg-gray-300 shadow overflow-hidden sm:rounded-lg pb-8">
    <div class="border-t border-gray-200 text-center pt-8">
    <h1 class="text-9xl font-bold text-red-400">Error: 404</h1>
    <h1 class="text-3xl font-medium py-8 text-red-700">Oops! La Pàgina no Funciona !!!</h1>
    <p class="text-1xl pb-8 px-12 font-medium text-red-700">És Redireccionara en 10 segons.</p>
    </div>
    </div>
    </div>
    </div>

    <?php require '../src/includes/scripts.php';?>

</body>

</html>