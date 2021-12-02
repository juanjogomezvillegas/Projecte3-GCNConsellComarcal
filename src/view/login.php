<!DOCTYPE html>
<html lang="es">
<head>
    <?php include '../src/includes/head.php'; ?>
    <title>Login | GCN Consell Comarcal</title>
</head>
<body class="bg-red-500">
<?php
    include '../src/includes/preloader.php';
?>
<div class="bg-grey-lighter min-h-screen flex flex-col">
            <div class="container max-w-sm mx-auto flex-1 flex flex-col items-center justify-center px-2">
                <form action="index.php?r=dologin" method="post">
                    <div class="bg-white px-6 py-8 rounded shadow-md text-black w-full">
                        <a href="index.php?r=">
                            <img src="../img/LogoConsellComarcalAmbLletra.jpg" alt="Logo" class="h-100 w-100 block m-auto">
                        </a>
                        <input 
                        type="text"
                        class="block border border-grey-light w-full p-3 rounded mb-4"
                        name="inputusuari"
                        placeholder="Nom d'usuari" />
                        <input 
                        type="password"
                        class="block border border-grey-light w-full p-3 rounded mb-4"
                        name="inputpassword"
                        placeholder="Contrasenya" />

                        <button type="submit" class="w-full text-center py-3 rounded bg-red-500 text-white hover:bg-green-dark focus:outline-none my-1">Inicia Sessió</button>
                    
                        <div class="text-center text-sm text-grey-dark mt-4">
                    No tens una compte? 
                    <a class="no-underline border-b border-blue text-blue" href="index.php?r=registre">
                        Registrat!
                    </a>.
                </div>

                    </div>
                </form>
            </div>
        </div>
    <?php include '../src/includes/scripts.php';?>
</body>
</html>