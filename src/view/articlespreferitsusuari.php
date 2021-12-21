<!DOCTYPE html>
<html lang="ca">
<head>

    <!-- Incluguem el fitxer head que contindrà totes  -->
    <?php require '../src/includes/head.php'; ?>
    <title>Els Meus Articles | GCN Consell Comarcal</title>
</head>
<body class="bg-gray-300">
    <?php
    require '../src/includes/preloader.php';
    ?>
    <?php
    require '../src/includes/nav.php';
    ?>
    <h1 class="mt-7 mb-7 text-5xl text-red-900 text-center">Articles Favorits</h1>
    <?php if (count($articlesFavorits) > 0) { ?>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-7 ml-7 mr-7">
            <?php foreach ($articlesFavorits as $actual) { ?>
                <div class="articlesPortada mb-5 flex items-stretch flex-row md:sp-acex-5 space-y-3 md:space-y-0 rounded-xl shadow-lg p-3 max-w-xs md:max-w-3xl mx-auto border border-white bg-gray-200">
                    <div class="w-full md:w-1/3 grid place-items-center">
                        <a href="index.php?r=article&id=<?php echo $actual["id"];?>">
                            <img src="<?php echo $actual["imatge"];?>" alt="logo" class="rounded-xl" />
                        </a>
                    </div>
                    <div class="w-full md:w-2/3 space-y-2 p-3">
                        <a href="index.php?r=article&id=<?php echo $actual["id"];?>">
                            <h3 class="text-gray-900 md:text-3xl text-xl"><?php echo $actual["titol"]; ?></h3>
                            <p class="md:text-lg text-gray-700">
                                <?php $contingut = strip_tags($actual["contingut"]); ?>
                                <?php echo substr($contingut, 0, 100);?> ...
                            </p>
                            <br>
                            <p class="text-sm text-gray-500">
                            Categoria <span class="font-normal text-gray-600 text-base"><?php echo $actual["categoria"]; ?></span>
                            </p>
                            <p class="text-sm text-gray-500">
                            Ultima Edició el <span class="font-normal text-gray-600 text-base"><?php echo $actual["dataEdicio"]; ?></span>
                            </p>
                        </a>
                    </div>
                </div>
            <?php } ?>
        </div>
    <?php } else { ?>
        <div class="bg-red-100 border-red-500 text-red-700 p-4" role="alert">
            <p class="text-xl text-center"><i class="fas fa-info-circle"></i> En Aquest moment no tens articles favorits.</p>
        </div>
    <?php } ?>
    <br>
<footer>
<?php require '../src/includes/footer.php';?>
</footer>
<?php require '../src/includes/scripts.php';?>
<script src="script/favorits.js"></script>
</body>
</html>
