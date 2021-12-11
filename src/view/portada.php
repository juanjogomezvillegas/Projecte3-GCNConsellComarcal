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
    <?php if (count($articlesPortada) > 0) { ?>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-6 gap-4">
            <?php foreach ($articlesPortada as $actual) { ?>
                <a href="index.php?r=article&id=<?=$actual["id"];?>">
                <div class="articlesPortada max-w-sm rounded overflow-hidden shadow-lg bg-gray-200">
                    <img class="w-full" src="<?=$actual["imatge"];?>" alt="">
                    <div class="px-6 py-4">
                        <div class="flex justify-end">
                            <span class="text-2xl font-semibold text-yellow-600"><i class="fas fa-folder-open"></i></span>
                            <span class="text-2xl font-semibold text-yellow-400 ml-5"><i class="fas fa-star"></i></span>
                        </div>
                        <div class="font-bold text-xl mb-2"><?=$actual["titol"];?></div>
                        <p class="text-gray-700 text-base">
                        <?=$actual["contingut"];?>
                        </p>
                    </div>
                    <div class="px-6 pt-4 pb-2">
                        <span class="bg-gray-400 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2"><?=$actual["categoria"];?></span>
                    </div>
                    <div class="px-6 pt-4 pb-2">
                        <span class="bg-gray-400 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2"><?=$actual["dataEdicio"];?></span>
                    </div>
                </div>
            <?php } ?>
        </div>
        </a>
    <?php } else { ?>
        <h1 class="text-3xl text-red-900 text-center">En Aquest moment no hi han articles disponibles.</h1>
    <?php } ?>
    <br>
<footer>
<?php include '../src/includes/footer.php';?>
</footer>
<?php include '../src/includes/scripts.php';?>

</body>
</html>
