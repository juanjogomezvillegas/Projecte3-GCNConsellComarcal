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
    <h1 class="mt-7 mb-7 text-5xl text-red-900 text-center">Articles Preferits</h1>
    <?php if (count($articlesFavorits) > 0) { ?>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-6 gap-4">
            <?php foreach ($articlesFavorits as $actual) { ?>
                <div class="articlesPortada max-w-sm rounded overflow-hidden shadow-lg bg-gray-200">
                    <a href="index.php?r=article&id=<?=$actual["id"];?>"><img class="w-full" src="<?=$actual["imatge"];?>" alt=""></a>
                    <div class="px-6 py-4">
                        <a href="index.php?r=article&id=<?=$actual["id"];?>">
                            <div class="font-bold text-xl mb-2"><?=$actual["titol"];?></div>
                            <p class="text-gray-700 text-base">
                            <?php $contingut = strip_tags($actual["contingut"]); ?>
                            <?= substr($contingut, 0, 100);?>
                            </p>
                        </a>
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
    <?php } else { ?>
        <h1 class="text-3xl text-red-900 text-center">En Aquest moment no tens articles favorits.</h1>
    <?php } ?>
    <br>
<footer>
<?php include '../src/includes/footer.php';?>
</footer>
<?php include '../src/includes/scripts.php';?>
</body>
</html>
