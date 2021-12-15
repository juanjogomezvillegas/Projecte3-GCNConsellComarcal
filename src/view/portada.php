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
    <h1 class="mt-7 mb-7 text-5xl text-red-900 text-center">Articles</h1>
    <?php if (count($articlesPortada) > 0) { ?>
        <div class="p-10 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-3 gap-5">
            <?php foreach ($articlesPortada as $actual) { ?>
                <div class="articlesPortada max-w-sm rounded overflow-hidden shadow-lg bg-gray-200">
<<<<<<< HEAD
                    <a href="index.php?r=article&id=<?=$actual["id"];?>"><img class="w-full" src="<?=$actual["imatge"];?>" alt=""></a>
=======
                <a href="index.php?r=article&id=<?=$actual["id"];?>">
                    <img class="w-full" src="<?=$actual["imatge"];?>" alt="">
>>>>>>> feature-articlesPortadaBeta
                    <div class="px-6 py-4">
                        <?php if ($logat) { ?>
                            <div class="flex justify-end">
                                <input type="hidden" name="idArticle" value="<?=$actual["id"];?>">

                                <?php $actiu = false; ?>
                                <?php foreach ($articlesFavoritsTots as $actual2) { ?>
                                    <?php if ($actual2["id_article"] === $actual["id"] && $actual2["id_usuari"] === $dadesUsuari["id"]) { ?>
                                        <?php $actiu = true; ?>
                                    <?php } ?>
                                <?php } ?>
                                <?php if ($actiu) { ?>
                                    <span class="estrella text-2xl font-semibold text-yellow-400 ml-5"><i class="fas fa-star"></i></span>
                                <?php } else { ?>
                                    <span class="estrella text-2xl font-semibold text-gray-400 ml-5"><i class="fas fa-star"></i></span>
                                <?php } ?>
                            </div>
                        <?php } ?>
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
                </a>
            <?php } ?>
        </div>
    <?php } else { ?>
        <h1 class="text-3xl text-red-900 text-center">En Aquest moment no hi han articles disponibles.</h1>
    <?php } ?>
    <br>
<footer>
<?php include '../src/includes/footer.php';?>
</footer>
<?php include '../src/includes/scripts.php';?>
<script src="script/favorits.js"></script>
</body>
</html>
