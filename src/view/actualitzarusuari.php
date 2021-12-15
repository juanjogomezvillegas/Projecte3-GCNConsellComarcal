<!DOCTYPE html>
<html lang="es">

<head>
    <?php include '../src/includes/head.php'; ?>
    <title>Sing Up | GCN Consell Comarcal</title>
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
                        <h1 class="font-bold text-3xl text-gray-900">ACTUALITZAR LES DADES DEL USUARI</h1>
                    </div>
                    <div>
                        <form action="index.php?r=doactualitzarusuari" method="post">
                       <?php if(!empty($update)){?>
                        <div class="bg-green-100 border border-green-300 text-center text-green-700 px-4 py-3 rounded relative mb-4 success-missatge" role="alert">
                                    <strong class="font-bold"> S'han actualitzat les dades del usuari satisfactoriament </strong>
                                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                                    </span>
                                </div>
                                <?php } ?>
                            <div class="flex -mx-3">
                                <div class="w-1/2 px-3 mb-5">
                                    <div class="flex">
                                        <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-account-outline text-gray-400 text-lg"></i></div>
                                        <input type="text" name="username" value="<?= $dadesusuari['username']; ?>" class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-red-500" placeholder="Nom d'usuari">
                                    </div>
                                </div>
                                <div class="w-1/2 px-3 mb-5">
                                    <div class="flex">
                                        <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-account-outline text-gray-400 text-lg"></i></div>
                                        <select name="rol" class=" text-gray-400 appearance-none w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-red-500">
                                            <option class="mdi mdi-account-outline text-gray-400 text-lg"><?= $dadesusuari["rol"]; ?></option>´
                                            <option class="mdi mdi-account-outline text-gray-400 text-lg">Usuari</option>´
                                            <option class="mdi mdi-account-outline text-gray-400 text-lg">Administrador</option>
                                            <option class="mdi mdi-account-outline text-gray-400 text-lg">Gestor</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="flex -mx-3">
                                <div class="w-1/2 px-3 mb-5">
                                    <div class="flex">
                                        <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-account-outline text-gray-400 text-lg"></i></div>
                                        <input type="text" name="nom" value="<?= $dadesusuari['nom']; ?>" class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-red-500" placeholder="Nom">
                                    </div>
                                </div>
                                <div class="w-1/2 px-3 mb-5">
                                    <div class="flex">
                                        <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-account-outline text-gray-400 text-lg"></i></div>
                                        <input type="text" name="cognom" value="<?= $dadesusuari['cognom']; ?>" class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-red-500" placeholder="Cognom">
                                    </div>
                                </div>
                            </div>
                            <div class="flex -mx-3">
                                <div class="w-1/2 px-3 mb-5">
                                    <div class="flex">
                                        <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-account-outline text-gray-400 text-lg"></i></div>
                                        <input type="email" name="email" value="<?= $dadesusuari['email']; ?>" class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-red-500" placeholder="Email">
                                    </div>
                                </div>
                                <div class="w-1/2 px-3 mb-5">
                                    <div class="flex">
                                        <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-account-outline text-gray-400 text-lg"></i></div>
                                        <input type="text" name="telefon" value="<?= $dadesusuari['telefon']; ?>" class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-red-500" placeholder="Telefon">
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="id" value="<?= $dadesusuari['id']; ?>">
                            <div class="flex -mx-3">
                                <div class="w-full px-3 mb-5">
                                    <button type="submit" class="block w-full max-w-xs mx-auto bg-red-500 hover:bg-red-300 focus:bg-red text-white rounded-lg px-3 py-3 font-semibold">ACTUALITZAR</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>

</html>