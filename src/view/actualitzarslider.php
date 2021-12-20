<!DOCTYPE html>
<html lang="ca">

<head>
  <!-- Incluguem el fitxer head que contindrà totes  -->
  <?php require '../src/includes/head.php'; ?>
  <title>Actualitzar Slaider | GCN Consell Comarcal</title>
</head>

<body class="bg-black font-sans leading-normal tracking-normal">
  <?php
    require '../src/includes/preloader.php';
    ?>
  <?php
    require '../src/includes/nav_admin.php';
    ?>
  <div class="container w-full mx-auto pt-20">
    <div class="w-full px-4 md:px-0 md-8 mt-20 mb-16 text-gray-800 leading-normal">
      <h1 class="font-bold text-3xl text-gray-50 text-center m-10">Canviar Imatge</h1>
      <div class="grid grid-cols-6 gap-4">
        <div class="col-start-2 col-span-4">
        <?php if ((!empty($message))) { ?>
          <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
  <strong class="font-bold">Hi ha hagut un error!</strong>
  <span class="block sm:inline"><?php echo $message; ?></span>
  <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
    <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
  </span>
    </div>
        <?php } ?>
          <div class="text-center mb-3 mt-6 pt-0">
            <div class="text-center">
              <img src="<?php echo $dadesSlider["imatge"];?>" alt="<?php echo $dadesSlider["imatge"];?>" class="w-screen h-min m-auto block rounded">
            </div>
            <form action="index.php?r=doactualitzarslider" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $dadesSlider["id"];?>"> 
              <div id="dropzone" class="text-center bg-red-500 hover:bg-red-300 text-white font-bold py-2 px-4 rounded inline-flex items-center mt-5">
                <label class="block">
                  <span>Afageix una imatge</span>
                  <input type="file" name="imatgeslider" class="block w-full text-sm text-gray-100 mr-4 border-0 font-semibold">
                </label>
              </div>
              <br>
              <div>
              <button id="guardar" class="bg-red-500 hover:bg-red-300 text-white font-bold py-2 px-4 rounded inline-flex items-center mt-5">
                <i class="fa fa-save" aria-hidden="true"></i>
                <span class="ml-1">Guardar Canvis</span>
              </button>       
              </div>
            </div>
          </div>
          </form>
    </div>
  </div>
          <?php require '../src/includes/scripts.php'; ?>
          <?php require '../src/includes/tinyMCE.php'; ?>
</body>

</html>