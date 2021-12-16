<!DOCTYPE html>
<html lang="es">

<head>
    <!-- Incluguem el fitxer head que contindrà totes  -->
    <?php include '../src/includes/head.php'; ?>
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
        <div class="w-full px-4 md:px-0 md-8 mt-20 mb-16 text-gray-800 leading-normal text-center">
            <a href="index.php?r=creararticle">
                <button class="bg-red-500 hover:bg-red-300 text-white font-bold py-2 px-4 rounded inline-flex items-center mt-5">
                    <i class="fas fa-folder-plus"></i>
                    <span class="ml-1">Crear Article</span>
                </button>
            </a>
            <?php if ($dadesUsuariLogat["rol"] === "Administrador") { ?>
                <a href="index.php?r=historialArticles">
                    <button class="bg-red-500 hover:bg-red-300 text-white font-bold py-2 px-4 rounded inline-flex items-center mt-5">
                        <i class="fas fa-history"></i>
                        <span class="ml-1">Historial dels Articles</span>
                    </button>
                </a>
            <?php } ?>
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
                                            Títol
                                        </th>
                                        <th scope="col" class="text-xs font-medium text-gray-700 px-6 py-3 text-left uppercase tracking-wider dark:text-gray-400">
                                            Publicació
                                        </th>
                                        <th scope="col" class="text-xs font-medium text-gray-700 px-6 py-3 text-left uppercase tracking-wider dark:text-gray-400">
                                            Categoria
                                        </th>
                                        <?php if ($dadesUsuariLogat["rol"] === "Administrador") { ?>
                                            <th scope="col" class="text-xs font-medium text-gray-700 px-6 py-3 text-left uppercase tracking-wider dark:text-gray-400">
                                                Creador
                                            </th>
                                        <?php } ?>
                                        <th scope="col" class="text-xs font-medium text-gray-700 px-6 py-3 text-left uppercase tracking-wider dark:text-gray-400">
                                            Data de Creació
                                        </th>
                                        <th scope="col" class="text-xs font-medium text-gray-700 px-6 py-3 text-left uppercase tracking-wider dark:text-gray-400">
                                            Accions
                                        </th>
                                    </tr>
                                </thead>
                                <?php foreach ($dadesarticle as $actual) { ?>
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-600">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white">
                                            <?= $actual['id']; ?>
                                        </td>
                                        <td class="text-sm text-gray-500 px-6 py-4 whitespace-nowrap dark:text-gray-400">
                                            <?= $actual['titol']; ?>
                                        </td>
                                        <td class="text-sm text-gray-500 px-6 py-4 whitespace-nowrap dark:text-gray-400">
                                            <?php if ($actual['publicat'] == 1) { ?>
                                                <span class="text-green-500 font-semibold">Public</span>
                                            <?php } else { ?>
                                                <span class="text-red-500 font-semibold">Privat</span>
                                            <?php } ?>
                                        </td>
                                        <td class="text-sm text-gray-500 px-6 py-4 whitespace-nowrap dark:text-gray-400">
                                            <?= $actual['categoria']; ?>
                                        </td>
                                        <?php if ($dadesUsuariLogat["rol"] === "Administrador") { ?>
                                            <td class="text-sm text-gray-500 px-6 py-4 whitespace-nowrap dark:text-gray-400">
                                                <?= $actual['creador']; ?>
                                            </td>
                                        <?php } ?>
                                        <td class="text-sm text-gray-500 px-6 py-4 whitespace-nowrap dark:text-gray-400">
                                            <?= $actual['data_creacio']; ?>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <?php if ($dadesUsuariLogat["rol"] === "Administrador") { ?>
                                                <a href="index.php?r=historialArticleConcret&id=<?= $actual['id']; ?>" class="text-pink-600 hover:text-pink-900 dark:text-pink-500 dark:hover:underline"><i class="fas fa-history"></i></a>
                                            <?php } ?>
                                            <a href="index.php?r=actualitzararticle&id=<?= $actual['id']; ?>" class="text-blue-600 hover:text-blue-900 dark:text-blue-500 dark:hover:underline"><i class="fas fa-edit"></i></a>
                                            <span class="esborrarMissatge text-red-600 hover:text-red-900 dark:text-red-500 dark:hover:underline">
                                                <i class="fas fa-trash-alt"></i>
                                                <input hidden type="hidden" name="idEsborrar" value="<?= $actual['id']; ?>" />
                                            </span>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>
<!-- Modal del Contingut del missatge -->
<div id="modalConfirmacio" class="hidden flex items-center justify-center fixed left-0 bottom-0 fixed z-10 inset-0 overflow-y-auto bg-gray-500 bg-opacity-75 transition-opacity" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="bg-white rounded-lg w-1/2">
        <div class="text-center p-5 flex-auto justify-center">
            <h2 class="text-xl font-bold py-4 ">Estás segur que vols eliminar el article?</h3>
                <p class="text-sm text-gray-500 px-8">Si eliminas el usuari no el pots recuperar més?
                    Aquest procés es irreversible</p>
        </div>
        <!--footer-->
        <div class="p-3  mt-2 text-center space-x-4 md:block">
            <button class="cancelarEsborrar mb-2 md:mb-0 bg-white px-5 py-2 text-sm shadow-sm font-medium tracking-wider border text-gray-600 rounded-full hover:shadow-lg hover:bg-gray-100">
                Cancelar
            </button>
            <button class="confirmarEsborrarArticle mb-2 md:mb-0 bg-red-500 border border-red-500 px-5 py-2 text-sm shadow-sm font-medium tracking-wider text-white rounded-full hover:shadow-lg hover:bg-red-600"> <i class="fa fa-trash" aria-hidden="true"></i>
                Esborrar</button>
        </div>
    </div>
</div>
</div>
<?php include '../src/includes/scripts.php'; ?>
<script type="text/javascript" src="script/esborrarMissatgeConfirmacio.js"></script>

</html>