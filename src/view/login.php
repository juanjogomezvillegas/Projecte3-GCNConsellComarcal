<!DOCTYPE html>
<html lang="es">
<head>
    <?php include '../src/includes/head.php'; ?>
    <title>Login | GCN Consell Comarcal</title>
</head>
<body class="bg-red-50">
    <div id="containerLogin" class="-h-full flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div id="divLogin" class="max-w-md w-full space-y-8">
            <a href="index.php"><img src="../img/logo2.png" alt="Logo"></a>
            <form class="mt-8 space-y-6" action="index.php?r=dologin" method="POST">
                <div class="rounded-md shadow-sm -space-y-px">
                    <div>
                        <label for="nomusuari" class="sr-only">Nom d'Usuari</label>
                        <input id="nomusuari" name="inputusuari" type="text" value="<?=$usuarilogat;?>" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Nom d'Usuari">
                    </div>
                    <br>
                    <div>
                        <label for="password" class="sr-only">Contrasenya</label>
                        <input id="password" name="inputpassword" type="password" autocomplete="current-password" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Contrasenya">
                    </div>
                    <br>
                    <div>
                        <button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                            Inicia Sessió</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <?php include '../src/includes/scripts.php';?>
</body>
</html>