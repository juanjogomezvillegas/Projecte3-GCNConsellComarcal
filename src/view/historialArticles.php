<!DOCTYPE html>
<html lang="ca">
<head>
    <!-- Incluguem el fitxer head que contindrà totes  -->
   <?php require '../src/includes/head.php';?>
    <title>Historial d'Articles | GCN Consell Comarcal</title>
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
                                Títol
                            </th>
                            <th scope="col" class="text-xs font-medium text-gray-700 px-6 py-3 text-left uppercase tracking-wider dark:text-gray-400">
                                Imatge
                            </th>
                            <th scope="col" class="text-xs font-medium text-gray-700 px-6 py-3 text-left uppercase tracking-wider dark:text-gray-400">
                                Editor
                            </th>
                            <th scope="col" class="text-xs font-medium text-gray-700 px-6 py-3 text-left uppercase tracking-wider dark:text-gray-400">
                                Data d'Edició
                            </th>
                            <th scope="col" class="text-xs font-medium text-gray-700 px-6 py-3 text-left uppercase tracking-wider dark:text-gray-400">
                                Accions
                            </th>
                        </tr>
                    </thead>
    <?php foreach ($historialComplet as $actual) { ?>
                         <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-600">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white">
                                 <?php echo $actual['titol'];?>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white">
                                 <img class="w-10 md:w-16 lg:w-18" src="<?php echo $actual['imatge'];?>" alt="<?php echo $actual['imatge'];?>">
                            </td>
                            <td class="text-sm text-gray-500 px-6 py-4 whitespace-nowrap dark:text-gray-400">
                                 <?php echo $actual['creador'];?>
                            </td>
                            <td class="text-sm text-gray-500 px-6 py-4 whitespace-nowrap dark:text-gray-400">
                                 <?php echo $actual['data_edicio'];?>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <form action="index.php?r=doactualitzararticle&id=<?php echo $actual['id_article'];?>" method="POST" enctype="multipart/form-data">
                                    <input type="hidden" name="contingut" value="<?php echo strip_tags($actual['contingut']);?>">
                                    <input type="hidden" name="titol" value="<?php echo $actual['titol'];?>">
                                    <input type="hidden" name="publicat" value="<?php echo $actual["publicat"];?>">
                                    <input type="hidden" name="categoria" value="<?php echo $actual["id_categoria"];?>">
                                    <input type="hidden" name="imatgearticle" value="<?php echo $actual["imatge"];?>">
                                    <button type="submit"><span class="text-pink-600 hover:text-pink-900 dark:text-pink-500 dark:hover:underline"><i class="fas fa-exchange-alt"></i></span></button>
                                </form>
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
</body>
<?php require '../src/includes/scripts.php';?>
</html>