<!DOCTYPE html>
<html lang="ca">

<head>
    <!-- Incluguem el fitxer head que contindrà totes  -->
    <?php require '../src/includes/head.php'; ?>
    <title>Panell d'Administració | GCN Consell Comarcal</title>
</head>

<body class="bg-black font-sans leading-normal tracking-normal">
    <?php
    require '../src/includes/preloader.php';
    ?>
    <?php
    require '../src/includes/nav_admin.php';
    ?>
<div class="container w-full mx-auto pt-20">
<div class="w-full px-4 md:px-0 md-8 mt-20 mb-16 text-gray-800 leading-normal">
<div class="flex flex-row">
    <div class="flex flex-row mr-10 p-3">
        <label for="tempsRefresc" class="mr-5 text-2xl text-gray-300"><i class="fas fa-sync"></i></label>
        <div class="mt-1 relative rounded-md shadow-sm">
            <input type="text" name="tempsRefresc" id="tempsRefresc" value="<?php echo $tempsresfresc;?>" class="focus:ring-indigo-500 focus:border-indigo-500 bg-gray-900 block w-20 pl-5 pr-5 text-2xl text-gray-300 border-gray-300 rounded-md">
        </div>
    </div>
</div>
<div class="flex flex-wrap">
                <div class="w-full md:w-1/2 xl:w-1/4 p-3">
                    <!--Etiqueta usuaris-->
                    <?php if ($dadesUsuariLogat["rol"] === "Administrador") { ?>
                        <div class="itemsAdminUsuaris itemsAdmin bg-gray-900 border border-gray-800 rounded shadow p-2">
                            <div class="flex flex-row items-center">
                                <div class="flex-shrink pr-4">
                                    <div class="rounded p-3 bg-red-600"><i class="fa fa-users fa-2x fa-fw fa-inverse"></i></div>
                                </div>
                                <div id="countUsuaris" class="flex-1 text-right md:text-center">
                                    <h5 class="font-bold uppercase text-gray-100">Usuaris</h5>
                                    <h3 class="font-bold text-3xl text-gray-300"><?php echo $totalusers["total"]; ?> <span class="text-pink-600"><i class="fas fa-equals"></i></span></h3>
                                </div>
                            </div>
                        </div>
                    <?php } elseif ($dadesUsuariLogat["rol"] === "Gestor") { ?>
                        <div class="itemsAdmin bg-gray-900 border border-gray-800 rounded shadow p-2">
                            <div class="flex flex-row items-center">
                                <div class="flex-shrink pr-4">
                                    <div class="rounded p-3 bg-red-600"><i class="fa fa-users fa-2x fa-fw fa-inverse"></i></div>
                                </div>
                                <div id="countUsuaris" class="flex-1 text-right md:text-center">
                                    <h5 class="font-bold uppercase text-gray-100">Usuaris</h5>
                                    <h3 class="font-bold text-3xl text-gray-300"><?php echo $totalusers["total"]; ?> <span class="text-pink-600"><i class="fas fa-equals"></i></span></h3>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    <!--/Etiqueta usuaris-->
                </div>
                <div class="w-full md:w-1/2 xl:w-1/4 p-3">
                    <!--Etiqueta article-->
                    <div class="itemsAdminArticles itemsAdmin bg-gray-900 border border-gray-800 rounded shadow p-2">
                        <div class="flex flex-row items-center">
                            <div class="flex-shrink pr-4">
                                <div class="rounded p-3 bg-red-600"><i class="fas fa-newspaper fa-2x fa-fw fa-inverse"></i></div>
                            </div>
                            <div id="countArticles" class="flex-1 text-right md:text-center">
                                <h5 class="font-bold uppercase text-gray-100">Articles</h5>
                                <h3 class="font-bold text-3xl text-gray-300"><?php echo $totalarticle["total"]; ?> <span class="text-pink-600"><i class="fas fa-equals"></i></span></h3>
                            </div>
                        </div>
                    </div>
                    <!--/Etiqueta article-->
                </div>
                <div class="w-full md:w-1/2 xl:w-1/4 p-3">
                    <!--Etiqueta categories-->
                    <div class="itemsAdminCategories itemsAdmin bg-gray-900 border border-gray-800 rounded shadow p-2">
                        <div class="flex flex-row items-center">
                            <div class="flex-shrink pr-4">
                                <div class="rounded p-3 bg-red-600"><i class="fas fa-archive fa-2x fa-fw fa-inverse"></i></div>
                            </div>
                            <div id="countCategories" class="flex-1 text-right md:text-center">
                                <h5 class="font-bold uppercase text-gray-100">Categories</h5>
                                <h3 class="font-bold text-3xl text-gray-300"><?php echo $totalcategories["total"]; ?> <span class="text-pink-600"><i class="fas fa-equals"></i></span></h3>
                            </div>
                        </div>
                    </div>
                    <!--/Etiqueta categories-->
                </div>
                <div class="w-full md:w-1/2 xl:w-1/4 p-3">
                    <!--Etiqueta contacte-->
                    <div class="itemsAdminMissatges itemsAdmin bg-gray-900 border border-gray-800 rounded shadow p-2">
                        <div class="flex flex-row items-center">
                            <div class="flex-shrink pr-4">
                                <div class="rounded p-3 bg-red-600"><i class="fas fa-envelope fa-2x fa-fw fa-inverse"></i></div>
                            </div>
                            <div id="countMissatges" class="flex-1 text-right md:text-center">
                                <h5 class="font-bold uppercase text-gray-100">Missatges</h5>
                                <h3 class="font-bold text-3xl text-gray-300"><?php echo $totalcontactes["total"]; ?> <span class="text-pink-600"><i class="fas fa-equals"></i></span></h3>
                            </div>
                        </div>
                    </div>
                    <!--/Etiqueta contacte-->
                </div>
            </div>
        </div>
    </div>
</body>
<?php require '../src/includes/scripts.php'; ?>
<script src="script/admin.js"></script>

</html>