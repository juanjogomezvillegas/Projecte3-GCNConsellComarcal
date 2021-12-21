<!DOCTYPE html>
<html lang="ca">
<head>
    <!-- Incluguem el fitxer head que contindrà totes  -->
   <?php require '../src/includes/head.php';?>
    <title>Canviar la Contrasenya | GCN Consell Comarcal</title>
</head>
<body class="bg-gray-300 font-sans leading-normal tracking-normal">
    <?php
    require '../src/includes/preloader.php';
    ?>
    <?php
    require '../src/includes/nav.php';
    ?>
<div class="flex items-center justify-center px-5 py-5 mt-5">
    <div class="bg-white text-gray-500 rounded-3xl shadow-xl w-full overflow-hidden" style="max-width:1000px">
        <div class="md:flex w-full">
            <div class="w-full py-10 px-5 md:px-10">
                <div class="text-center mb-10">
                    <h1 class="font-bold text-3xl text-gray-900">CANVIAR LA CONTRASENYA</h1>
                </div>
                <div>
                    <form action="index.php?r=docanvicontrasenya" method="post">
                    <input type="hidden" name="username" value="<?php echo $dadesUsuari["username"];?>">
                    <input type="hidden" name="id" value="<?php echo $dadesUsuari["id"];?>">
                    <div class="flex -mx-3">
                        <div class="w-full px-3 mb-5">
                            <div class="flex">
                                <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-lock-outline text-gray-400 text-lg"></i></div>
                                <input type="password" name="passantic" class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-red-500" placeholder="Contrasenya actual">
                            </div>
                        </div>
                    </div>
                    <div class="flex -mx-3">
                        <div class="w-full px-3 mb-5">
                            <div class="flex">
                                <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-lock-outline text-gray-400 text-lg"></i></div>
                                <input type="password" name="passnou" class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-red-500" placeholder="Contrasenya nova">
                            </div>
                        </div>
                    </div>
                    <div class="flex -mx-3">
                        <div class="w-full px-3 mb-5">
                            <div class="flex">
                                <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-lock-outline text-gray-400 text-lg"></i></div>
                                <input type="password" name="passrepetit" class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-red-500" placeholder="Torna a posar la contrasenya nova">
                            </div>
                        </div>
                    </div>
                    <div class="flex -mx-3">
                        <div class="w-full px-3 mb-5">
                            <button type="submit" class="block w-full max-w-xs mx-auto bg-red-500 hover:bg-red-300 focus:bg-red text-white rounded-lg px-3 py-3 font-semibold">CANVIA LA CONTRASENYA</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<footer>
    <?php require '../src/includes/footer.php';?>
</footer>
</body>
<?php require '../src/includes/scripts.php';?>
</html>