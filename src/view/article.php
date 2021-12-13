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
    <!--Container-->
<div class="container w-full md:max-w-3xl mx-auto pt-20">

<div class="w-full px-4 md:px-6 text-xl text-gray-800 leading-normal" style="font-family:Georgia,serif;">

    <!--Title-->
    <div class="font-sans">
        <p class="text-base md:text-sm text-green-500 font-bold">&lt; <a href="index.php" class="text-base md:text-sm text-red-500 font-bold no-underline hover:underline">Tornar a la portada</a></p>
                <h1 class="font-bold font-sans break-normal text-gray-900 pt-6 pb-2 text-3xl md:text-4xl"><?= $informacioArticle['titol'];?></h1>
                <p class="text-sm md:text-base font-normal text-gray-600 mb-5">Ultima Edició el <?= $informacioArticle['dataEdicio'];?></p>
    </div>


    <!--Post Content-->
    
    <?= $informacioArticle['contingut'];?>

    <!--/ Post Content-->

</div>

<!--Categoria -->
<div class="text-base md:text-sm text-gray-500 px-4 py-6">
    Categoria: <?= $informacioArticle["categoria"]; ?>
</div>

<!--Divisor-->
<hr class="border-b-2 border-gray-400 mb-8 mx-4">

<!--Veure articles-->
<div class="font-sans flex justify-between content-center px-4 pb-12">
    <?php if ($informacioArticle["id"] > 1) { ?>
    <div class="text-left">
        <p><a href="index.php?r=article&id=<?=$idAnterior;?>" class="break-normal text-base md:text-sm text-red-500 font-bold no-underline hover:underline">&lt; Article Anterior</a></p>
    </div>
    <?php } ?>
    <?php if ($informacioArticle["id"] < $count["total"]) { ?>
    <div class="text-right">
        <p><a href="index.php?r=article&id=<?=$idSeguent;?>" class="break-normal text-base md:text-sm text-red-500 font-bold no-underline hover:underline">Article Següent &gt;</a></p>
    </div>
    <?php } ?>
</div>


<!--/Veure articles-->

</div>
<!--/container-->
<footer>
<?php include '../src/includes/footer.php';?>
</footer>
<?php include '../src/includes/scripts.php';?>

</body>
</html>

