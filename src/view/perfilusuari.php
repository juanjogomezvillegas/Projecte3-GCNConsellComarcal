<!DOCTYPE html>
<html lang="ca">
<head>

    <!-- Incluguem el fitxer head que contindrà totes  -->
    <?php require '../src/includes/head.php'; ?>
    <title>El Meu Perfil | GCN Consell Comarcal</title>
</head>
<body class="bg-gray-300">
    <?php
    require '../src/includes/preloader.php';
    ?>
    <?php
    require '../src/includes/nav.php';
    ?>
<!-- Profile Card -->
<div>
        <div>
                <div class="flex w-full h-full relative mt-10">
                    <img src="<?php echo $dadesUsuari["imatge"];?>" class="w-44 h-44 m-auto rounded-3xl" alt="">
                </div>
        </div>
        <div class="text-center">
            <form action="index.php?r=docanviarimatge" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $dadesUsuari["id"];?>">
            <div id="dropzone" class="bg-red-500 hover:bg-red-300 text-white font-bold py-2 px-4 rounded inline-flex items-center mt-5">
                <label class="block">
                  <span>Afageix una imatge</span>
                  <input type="file" name="imatgeusuari" class="block w-full text-sm text-gray-100 mr-4 border-0 font-semibold">
                </label>
            </div>
            <div>
                <button type="submit" class="bg-red-600 hover:bg-red-300 text-white font-bold py-2 px-4 rounded inline-flex items-center mt-5">
                    <i class="fas fa-camera" aria-hidden="true"></i>
                    <span class="ml-1">Canviar Imatge</span>
                </button>
                </div>
            </form>
        <div class="md:col-span-3 h-48 p-4 space-y-2 p-3">
                <div class="flex ">
                    <span
                        class="text-sm border bg-red-500 font-bold text-white uppercase border-2 rounded-l px-4 py-2 bg-gray-50 whitespace-no-wrap w-2/6">Nom i Cognom:</span>
                    <input 
                        class="px-4 border-l-0 cursor-default border-gray-300 focus:outline-none  rounded-md rounded-l-none shadow-sm -ml-1 w-4/6"
                        type="text" value="<?php echo $dadesUsuari["nom"];?> <?php echo $dadesUsuari["cognom"];?>"  readonly/>
                </div>
                <div class="flex ">
                    <span
                        class="text-sm border bg-red-500 font-bold text-white uppercase border-2 rounded-l px-4 py-2 bg-gray-50 whitespace-no-wrap w-2/6">Nom d'Usuari (Username):</span>
                    <input 
                        class="px-4 border-l-0 cursor-default border-gray-300 focus:outline-none  rounded-md rounded-l-none shadow-sm -ml-1 w-4/6"
                        type="text" value="<?php echo $dadesUsuari["username"];?>"  readonly/>
                </div>
                 <div class="flex ">
                    <span
                        class="text-sm border bg-red-500 font-bold text-white uppercase border-2 rounded-l px-4 py-2 bg-gray-50 whitespace-no-wrap w-2/6"> Correu Electrónic:</span>
                    <input 
                        class="px-4 border-l-0 cursor-default border-gray-300 focus:outline-none  rounded-md rounded-l-none shadow-sm -ml-1 w-4/6"
                        type="text" value="<?php echo $dadesUsuari["email"];?>"  readonly/>
                </div>
                <div class="flex ">
                    <span
                        class="text-sm border bg-red-500 font-bold text-white uppercase border-2 rounded-l px-4 py-2 bg-gray-50 whitespace-no-wrap w-2/6"> Teléfon:</span>
                    <input 
                        class="px-4 border-l-0 cursor-default border-gray-300 focus:outline-none  rounded-md rounded-l-none shadow-sm -ml-1 w-4/6"
                        type="text" value="<?php echo $dadesUsuari["telefon"];?>"  readonly/>
                </div>
                <div class="text-center">
                    <a href="index.php?r=canviarcontrasenya">
                        <button class="bg-red-600 hover:bg-red-300 text-white font-bold py-2 px-4 rounded inline-flex items-center mt-5">
                            <i class="fas fa-unlock-alt" aria-hidden="true"></i>
                            <span class="ml-1">Canviar Contrasenya</span>
                        </button>
                    </a>
                </div>
        </div>
</div>
<br>
<footer>
<?php require '../src/includes/footer.php';?>
</footer>
<?php require '../src/includes/scripts.php';?>
<script src="script/favorits.js"></script>
</body>
</html>