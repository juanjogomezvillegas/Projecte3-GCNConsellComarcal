<!DOCTYPE html>
<html lang="es">
<head>
    <!-- Incluguem el fitxer head que contindrà totes  -->
   <?php include '../src/includes/head.php';?>
    <title>Document</title>
</head>
<body class="bg-black font-sans leading-normal tracking-normal">
    <?php
    include '../src/includes/preloader.php';
    ?>
    <?php
    include '../src/includes/nav_admin.php';
    ?>
<div class="container w-full mx-auto pt-20">
<div class="w-full px-4 md:px-0 md-8 mt-20 mb-16 text-gray-800 leading-normal">
<div class="flex flex-row">
    <div class="flex flex-row mr-10 p-3">
        <label for="tempsRefresc" class="mr-5 text-2xl text-gray-300"><i class="fas fa-sync"></i></label>
        <div class="mt-1 relative rounded-md shadow-sm">
            <input type="text" name="tempsRefresc" id="tempsRefresc" value="10" class="focus:ring-indigo-500 focus:border-indigo-500 bg-gray-900 block w-20 pl-5 pr-5 text-2xl text-gray-300 border-gray-300 rounded-md">
        </div>
    </div>
    <div class="w-full md:w-1/2 xl:w-1/3 p-3">
        <a href="" class="text-2xl text-gray-300"><i class="fas fa-history"></i> Historial</a>
    </div>
</div>
<div class="flex flex-wrap">
                <div class="w-full md:w-1/2 xl:w-1/3 p-3">
                    <!--Etiqueta usuaris-->
                    <div class="itemsAdminUsuaris itemsAdmin bg-gray-900 border border-gray-800 rounded shadow p-2">
                        <div class="flex flex-row items-center">
                            <div class="flex-shrink pr-4">
                                <div class="rounded p-3 bg-red-600"><i class="fa fa-users fa-2x fa-fw fa-inverse"></i></div>
                            </div>
                            <div id="countUsuaris" class="flex-1 text-right md:text-center">
                                <h5 class="font-bold uppercase text-gray-100">Usuaris</h5>
                                <h3 class="font-bold text-3xl text-gray-300"><?= $totalusers["total"]; ?> <span class="text-pink-600"><i class="fas fa-equals"></i></span></h3>
                            </div>
                        </div>
                    </div>
                    <!--/Etiqueta usuaris-->
                </div>
                <div class="w-full md:w-1/2 xl:w-1/3 p-3">
                    <!--Etiqueta article-->
                    <div class="itemsAdminArticles itemsAdmin bg-gray-900 border border-gray-800 rounded shadow p-2">
                        <div class="flex flex-row items-center">
                            <div class="flex-shrink pr-4">
                                <div class="rounded p-3 bg-red-600"><i class="fas fa-newspaper fa-2x fa-fw fa-inverse"></i></div>
                            </div>
                            <div id="countArticles" class="flex-1 text-right md:text-center">
                                <h5 class="font-bold uppercase text-gray-100">Articles</h5>
                                <h3 class="font-bold text-3xl text-gray-300"><?= $totalarticle["total"]; ?> <span class="text-pink-600"><i class="fas fa-equals"></i></span></h3>
                            </div>
                        </div>
                    </div>
                    <!--/Etiqueta article-->
                </div>
                <div class="w-full md:w-1/2 xl:w-1/3 p-3">
                    <!--Etiqueta categories-->
                    <div class="itemsAdminCategories itemsAdmin bg-gray-900 border border-gray-800 rounded shadow p-2">
                        <div class="flex flex-row items-center">
                            <div class="flex-shrink pr-4">
                                <div class="rounded p-3 bg-red-600"><i class="fas fa-archive fa-2x fa-fw fa-inverse"></i></div>
                            </div>
                            <div id="countCategories" class="flex-1 text-right md:text-center">
                                <h5 class="font-bold uppercase text-gray-100">Categories</h5>
                                <h3 class="font-bold text-3xl text-gray-300"><?= $totalcategories["total"]; ?> <span class="text-pink-600"><i class="fas fa-equals"></i></span></h3>
                            </div>
                        </div>
                    </div>
                    <!--/Etiqueta categories-->
                </div>
            </div>
</div>
</div>
</body>
<?php include '../src/includes/scripts.php';?>
<script src="script/admin.js"></script>

</html>
