<!DOCTYPE html>
<html lang="es">
<head>

    <!-- Incluguem el fitxer head que contindrà totes  -->
    <?php include '../src/includes/head.php'; ?>
    <title>GCN Consell Comarcal</title>
</head>
<body class="bg-gray-300">
    <?php
    include '../src/includes/preloader.php';
    ?>
    <?php
    include '../src/includes/nav.php';
    ?>
<!-- Profile Card -->
<div>
        <div>
                <div class="flex w-full h-full relative mt-10">
                    <img src="../img/userporfile.png" class="w-44 h-44 m-auto" alt="">

                </div>
        </div>
        <div class="text-center">
                    <a href="index.php?r=">
                        <button class="bg-red-500 hover:bg-red-300 text-white font-bold py-2 px-4 rounded inline-flex items-center mt-5">
                            <i class="fas fa-camera" aria-hidden="true"></i>
                            <span class="ml-1">Canviar Imatge</span>
                        </button>
                    </a>
                </div>
        <div class="md:col-span-3 h-48 p-4 space-y-2 p-3">
                <div class="flex ">
                    <span
                        class="text-sm border bg-red-500 font-bold text-white uppercase border-2 rounded-l px-4 py-2 bg-gray-50 whitespace-no-wrap w-2/6">Name:</span>
                    <input 
                        class="px-4 border-l-0 cursor-default border-gray-300 focus:outline-none  rounded-md rounded-l-none shadow-sm -ml-1 w-4/6"
                        type="text" value="<?=$dadesUsuari["nom"];?> <?=$dadesUsuari["cognom"];?>"  readonly/>
                </div>
                <div class="flex ">
                    <span
                        class="text-sm border bg-red-500 font-bold text-white uppercase border-2 rounded-l px-4 py-2 bg-gray-50 whitespace-no-wrap w-2/6">Username:</span>
                    <input 
                        class="px-4 border-l-0 cursor-default border-gray-300 focus:outline-none  rounded-md rounded-l-none shadow-sm -ml-1 w-4/6"
                        type="text" value="<?=$dadesUsuari["username"];?>"  readonly/>
                </div>
                 <div class="flex ">
                    <span
                        class="text-sm border bg-red-500 font-bold text-white uppercase border-2 rounded-l px-4 py-2 bg-gray-50 whitespace-no-wrap w-2/6"> Email:</span>
                    <input 
                        class="px-4 border-l-0 cursor-default border-gray-300 focus:outline-none  rounded-md rounded-l-none shadow-sm -ml-1 w-4/6"
                        type="text" value="<?=$dadesUsuari["email"];?>"  readonly/>
                </div>
                <div class="flex ">
                    <span
                        class="text-sm border bg-red-500 font-bold text-white uppercase border-2 rounded-l px-4 py-2 bg-gray-50 whitespace-no-wrap w-2/6"> Telefon:</span>
                    <input 
                        class="px-4 border-l-0 cursor-default border-gray-300 focus:outline-none  rounded-md rounded-l-none shadow-sm -ml-1 w-4/6"
                        type="text" value="<?=$dadesUsuari["telefon"];?>"  readonly/>
                </div>
                <div class="text-center">
                    <a href="index.php?r=">
                        <button class="bg-red-500 hover:bg-red-300 text-white font-bold py-2 px-4 rounded inline-flex items-center mt-5">
                            <i class="fas fa-unlock-alt" aria-hidden="true"></i>
                            <span class="ml-1">Canviar Contrasenya</span>
                        </button>
                    </a>
                </div>
        </div>
</div>
<footer>
<?php include '../src/includes/footer.php';?>
</footer>
<?php include '../src/includes/scripts.php';?>
<script src="script/favorits.js"></script>
</body>
</html>