<!DOCTYPE html>
<html lang="ca">
<head>
<?php include '../src/includes/head.php'; ?>
<title>Crear Categoria | GCN Consell Comarcal</title>
</head>
<body class="bg-black font-sans leading-normal tracking-normal">
<?php
include '../src/includes/nav_admin.php';
?>
<div class="min-w-screen min-h-screen flex items-center justify-center px-5 py-5 mt-20">
    <div class="bg-gray-100 text-gray-500 rounded-3xl shadow-xl w-full overflow-hidden" style="max-width:1000px">
        <div class="md:flex w-full">
            <div class="w-full py-10 px-5 md:px-10">
                <div class="text-center mb-10">
                    <h1 class="font-bold text-3xl text-gray-900">CREAR CATEGORIA</h1>
                </div>
                <div>
                    <form action="index.php?r=docrearcategoria" method="post">
                    <div class="flex -mx-3">
                        <div class="w-full px-3 mb-5">
                            <div class="flex">
                                <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-lock-outline text-gray-400 text-lg"></i></div>
                                <input type="text" name="nom" class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-red-500" placeholder="Nom Categoria">
                            </div>
                        </div>
                    </div>
                    <div class="flex -mx-3">
                        <div class="w-full px-3 mb-5">
                            <button type="submit" class="block w-full max-w-xs mx-auto bg-red-500 hover:bg-red-300 focus:bg-red text-white rounded-lg px-3 py-3 font-semibold">CREA CATEGORIA</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>