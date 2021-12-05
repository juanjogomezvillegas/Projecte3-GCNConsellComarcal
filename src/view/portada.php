<!DOCTYPE html>
<html lang="es">
<head>

    <!-- Incluguem el fitxer head que contindrà totes  -->
    <?php include '../src/includes/head.php'; ?>
    <title>GCN Consell Comarcal</title>
</head>
<body>
    <?php
    include '../src/includes/preloader.php';
    ?>
    <?php
    include '../src/includes/nav.php';
    ?>
    <h1 class="text-5xl text-red-900 text-center">Articles</h1>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-6 gap-4">
    <?php foreach ($articlesPortada as $actual) { ?>
        <div class="max-w-sm rounded overflow-hidden shadow-lg bg-gray-200">
            <img class="w-full" src="img/logo1.png" alt="Sunset in the mountains">
            <div class="px-6 py-4">
                <div class="font-bold text-xl mb-2"><?=$actual["titol"];?></div>
                <p class="text-gray-700 text-base">
                <?=$actual["contingut"];?>
                </p>
            </div>
            <div class="px-6 pt-4 pb-2">
                <span class="inline-block bg-gray-400 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2"><?=$actual["dataEdicio"];?></span>
            </div>
        </div>
    <?php } ?>
    </div>
<footer>
<?php include '../src/includes/footer.php';?>
</footer>
<?php include '../src/includes/scripts.php';?>

</body>
</html>
