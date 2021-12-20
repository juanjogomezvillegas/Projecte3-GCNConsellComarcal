<!DOCTYPE html>
<html lang="es">

<head>
    <!-- Incluguem el fitxer head que contindrà totes  -->
    <?php require '../src/includes/head.php'; ?>
    <title>Document</title>
</head>

<body class="bg-black font-sans leading-normal tracking-normal">
    <?php
    require '../src/includes/preloader.php';
    ?>
    <?php
    require '../src/includes/nav_admin.php';
    ?>
    <div class="container w-full mx-auto pt-20">
        <div class="w-full px-4 md:px-0 md-8 mt-20 mb-16 text-gray-800 leading-normal text-center">
            <div class="flex flex-col">
                <div>
                    <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="overflow-hidden sm:rounded-lg shadow-md">
                            <table class="mr-auto ml-auto mt-5">
                                <thead class="bg-gray-100 dark:bg-gray-700">
                                    <tr>
                                        <th scope="col" class="text-xs font-medium text-gray-700 px-6 py-3 text-left uppercase tracking-wider dark:text-gray-400">
                                            #
                                        </th>
                                        <th scope="col" class="text-xs font-medium text-gray-700 px-6 py-3 text-left uppercase tracking-wider dark:text-gray-400">
                                            Nom
                                        </th>
                                        <?php if ($dadesUsuariLogat["rol"] === "Administrador") { ?>
                                            <th scope="col" class="text-xs font-medium text-gray-700 px-6 py-3 text-left uppercase tracking-wider dark:text-gray-400">
                                                Ruta imatge
                                            </th>
                                        <?php } ?>
                                        <th scope="col" class="text-xs font-medium text-gray-700 px-6 py-3 text-left uppercase tracking-wider dark:text-gray-400">
                                            Posició
                                        </th>
                                        <th scope="col" class="text-xs font-medium text-gray-700 px-6 py-3 text-left uppercase tracking-wider dark:text-gray-400">
                                            Pujar imatge nova
                                        </th>
                                        <th scope="col" class="text-xs font-medium text-gray-700 px-6 py-3 text-left uppercase tracking-wider dark:text-gray-400">
                                        </th>
                                    </tr>
                                </thead>
                                <?php foreach ($dadesliders as $actual) { ?>
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-600">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white">
                                            <?php echo $actual['id']; ?>
                                        </td>
                                        <td class="text-sm text-gray-500 px-6 py-4 whitespace-nowrap dark:text-gray-400">
                                            <?php echo $actual['nom']; ?>
                                        </td>
                                        <?php if ($dadesUsuariLogat["rol"] === "Administrador") { ?>
                                            <td class="text-sm text-gray-500 px-6 py-4 whitespace-nowrap dark:text-gray-400">
                                                <?php echo $actual['imatge']; ?>
                                            </td>
                                        <?php } ?>
                                        <td class="text-sm text-gray-500 px-6 py-4 whitespace-nowrap dark:text-gray-400">
                                            
                                            <input value="<?php echo $actual['posicio']; ?>" class="text-center h-8 px-1 text-sm text-gray-700 placeholder-gray-600 border rounded-lg focus:shadow-outline w-10" type="text" placeholder="Small input"/>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <input type="file" name="imatgearticle" class="block w-full text-sm text-gray-600 mr-4 border-0 font-semibold">
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <a href="index.php?r=esborrarslider&id=<?php echo $actual['id']; ?>" class="text-red-600 hover:text-red-900 dark:text-red-500 dark:hover:underline"><i class="fas fa-trash-alt"></i></a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </table>
                            <a href="">
                                <button class="bg-red-500 hover:bg-red-300 text-white font-bold py-2 px-4 rounded inline-flex items-center mt-5">
                                    <i class="fas fa-save"></i>
                                    <span class="ml-1">Guardar canvis</span>
                                </button>
                            </a>
                            <a href="index.php?r=crearslider">
                                <button class="bg-red-500 hover:bg-red-300 text-white font-bold py-2 px-4 rounded inline-flex items-center mt-5">
                                    <i class="fas fa-plus"></i>
                                    <span class="ml-1">Crear slider</span>
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php require '../src/includes/scripts.php'; ?>
    <script type="text/javascript" src="script/esborrarMissatgeConfirmacio.js"></script>

</html>