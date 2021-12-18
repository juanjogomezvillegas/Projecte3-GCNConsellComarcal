<!DOCTYPE html>
<html lang="ca">
<head>
    <!-- Incluguem el fitxer head que contindrà totes  -->
   <?php include '../src/includes/head.php';?>
    <title>Gestió de Missatges | GCN Consell Comarcal</title>
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
                                Missatge
                            </th>
                            <th scope="col" class="text-xs font-medium text-gray-700 px-6 py-3 text-left uppercase tracking-wider dark:text-gray-400">
                                Autor
                            </th>
                            <th scope="col" class="text-xs font-medium text-gray-700 px-6 py-3 text-left uppercase tracking-wider dark:text-gray-400">
                                Data d'Enviament
                            </th>
                            <th scope="col" class="text-xs font-medium text-gray-700 px-6 py-3 text-left uppercase tracking-wider dark:text-gray-400">
                                Accions
                            </th>
                        </tr>
                    </thead>
    <?php foreach($dadescontacte as $actual) { ?>
                         <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-600">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white">
                                 <?= $actual['id'];?>
                            </td>
                            <td class="text-sm text-gray-500 px-6 py-4 whitespace-nowrap dark:text-gray-400">
                                 <?= substr($actual['missatge'], 0, 5); ?> ...
                            </td>
                            <td class="text-sm text-gray-500 px-6 py-4 whitespace-nowrap dark:text-gray-400">
                                 <?= $actual['creador'];?>
                            </td>
                            <td class="text-sm text-gray-500 px-6 py-4 whitespace-nowrap dark:text-gray-400">
                                 <?= $actual['data_enviament'];?>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <span class="contentMsg text-blue-600 hover:text-blue-900 dark:text-blue-500 dark:hover:underline">
                              <input type="hidden" name="id" value="<?= $actual["id"]; ?>">
                              <input type="hidden" name="contingut" value="<?= $actual["missatge"]; ?>">
                              <i class="fas fa-info-circle"></i>
                            </span>
                            <a href="index.php?r=esborrarmissatge&id=<?= $actual['id'];?>" class="text-red-600 hover:text-red-900 dark:text-red-500 dark:hover:underline"><i class="fas fa-trash-alt"></i></a>
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

<!-- Modal del Contingut del missatge -->
<div id="modalMissatge" class="hidden flex items-center justify-center fixed left-0 bottom-0 fixed z-10 inset-0 overflow-y-auto bg-gray-500 bg-opacity-75 transition-opacity" aria-labelledby="modal-title" role="dialog" aria-modal="true">
  <div class="bg-white rounded-lg w-1/2">
    <div class="flex flex-col items-start p-4">
      <div class="flex items-center w-full">
        <div class="text-gray-900 font-medium text-lg">Contingut del Misstage</div>
        <span id="tancaModal" class="ml-auto fill-current text-gray-700 w-6 h-6 cursor-pointer"><i class="fas fa-times"></i></span>
      </div>
      <hr>
      <div class="">
        <p id="contentMessage" class="text-sm text-gray-500">
      </div>
      <hr>
      <div class="ml-auto">
        <button id="esborrarMissatgeModal" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
          <i class="fas fa-trash-alt"></i> Esborrar el Missatge
        </button>
      </div>
    </div>
  </div>
</div>
<?php include '../src/includes/scripts.php';?>
<script src="script/contingutMissatge.js"></script>
</html>