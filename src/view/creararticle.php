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
    <div class="w-full px-4 md:px-0 md-8 mt-20 mb-16 text-gray-800 leading-normal">
      <h1 class="font-bold text-3xl text-gray-50 text-center m-10">Crear article</h1>
      <div class="grid grid-cols-6 gap-4">
        <div class="col-start-2 col-span-4">
          <div class="mb-3 mt-6 pt-0">
            <form action="index.php?r=docreararticle" method="POST">
              <input type="text" name="titol" placeholder="Titol de la pagina" class="px-3 py-3 placeholder-grey-300 text-grey-600 relative bg-white bg-white rounded text-sm border-0 shadow outline-none focus:outline-none focus:ring w-full" />
          </div>
          <div class="col-start-2 col-span-4">

            <textarea id="editor-article" name="contingut"></textarea>
          </div>
          <button id="guardar" class="bg-red-500 hover:bg-red-300 text-white font-bold py-2 px-4 rounded inline-flex items-center mt-5">
            <i class="fa fa-save" aria-hidden="true"></i>
            <span class="ml-1">Guardar Canvis</span>
          </button>
          <input type="hidden" name="idarticle" value="<?= $article['id']; ?>" >
          <input type="hidden" name="idusuari" value="<?= $article['id_usuari']; ?>" >
          <div class="bg-red-500 text-white font-bold py-2 px-4 rounded inline-block items-center mt-5">
            <div class="relative inline-block w-10 mr-2 align-middle select-none transition duration-200 ease-in">
              <input type="checkbox" name="publicat" id="toggle" class="toggle-checkbox absolute block w-6 h-6 rounded-full bg-white border-4 appearance-none cursor-pointer" <?= $article['publicat']==1 ? 'checked' : '';?> />
              <label for="toggle" class="toggle-label block overflow-hidden h-6 rounded-full bg-gray-300 cursor-pointer"></label>
            </div>
            <label for="toggle" class="text-s mt-2 text-gray-50">Publicar</label>
        </div>
              <div class="bg-red-500 hover:bg-red-300 text-white font-bold py-2 px-4 rounded inline-flex items-center mt-5 ">
              <label class="block text-center">
         <span class="text-gray-50">Categoria</span>
         <select name="categoria" class="form-select block w-full mt-1 text-gray-900">
         <?php foreach($llistatcategoria as $actual) { ?>
            <option value="<?= $actual["id"]; ?>"><?= $actual['nom'];?></option>
             <?php } ?>
            </select>
          </label>
              </div>
            </div>
          </div>
          </form>
    </div>

  </div>
          <?php include '../src/includes/scripts.php'; ?>
          <?php include '../src/includes/tinyMCE.php'; ?>
</body>

</html>