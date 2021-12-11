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
                <p class="text-sm md:text-base font-normal text-gray-600 mb-5">Creat el <?= $informacioArticle['data_creacio'];?></p>
    </div>


    <!--Post Content-->
    
    <?= $informacioArticle['contingut'];?>

    <!--/ Post Content-->

</div>

<!--Categoria -->
<div class="text-base md:text-sm text-gray-500 px-4 py-6">
    Categoria: <a href="#" class="text-base md:text-sm text-red-500 no-underline hover:underline">Link</a>
</div>

<!--Divisor-->
<hr class="border-b-2 border-gray-400 mb-8 mx-4">



<!--Autor-->
<div class="flex w-full items-center font-sans px-4 py-12">
    <img class="w-10 h-10 rounded-full mr-4" src="http://i.pravatar.cc/300" alt="Avatar of Author">
    <div class="flex-1 px-2">
        <p class="text-base font-bold text-base md:text-xl leading-none mb-2">Autor que ha creat el article</p>
        <p class="text-gray-600 text-xs md:text-base">    <?= $informacioArticle['creador'];?>  </p>
    </div>
    <div class="justify-end">
        <button class="bg-transparent border border-gray-500 hover:border-red-500 text-xs text-gray-500 hover:text-red-500 font-bold py-2 px-4 rounded-full">Contacte</button>
    </div>
</div>
<!--/Autor-->

<!--Divisor-->
<hr class="border-b-2 border-gray-400 mb-8 mx-4">

<!--Veure articles-->
<div class="font-sans flex justify-between content-center px-4 pb-12">
    <div class="text-left">
        <span class="text-xs md:text-sm font-normal text-gray-600">&lt; Article anterior</span><br>
        <p><a href="#" class="break-normal text-base md:text-sm text-red-500 font-bold no-underline hover:underline">Article titol</a></p>
    </div>
    <div class="text-right">
        <span class="text-xs md:text-sm font-normal text-gray-600">Article següent &gt;</span><br>
        <p><a href="#" class="break-normal text-base md:text-sm text-red-500 font-bold no-underline hover:underline">Article titol</a></p>
    </div>
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

