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
    <div class="w-full px-4 md:px-0 md-8 mt-28 mb-16 text-gray-800 leading-normal">
      <h1 class="font-bold text-3xl text-gray-50 text-center m-10">Crear article</h1>
      <div class="grid grid-cols-6 gap-4">
        <div class="col-start-2 col-span-4">
        <?php if((!empty($message))){ ?>
          <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
  <strong class="font-bold">Hi ha hagut un error!</strong>
  <span class="block sm:inline"><?= $message; ?></span>
  <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
    <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
  </span>
    </div>
          <?php } ?>
          <div class="mb-3 mt-6 pt-0">
            <form action="index.php?r=docreararticle" method="post">
          <input type="text" name="titol" value="Titol Exemple Article" placeholder="Titol de la pagina" class="px-3 py-3 placeholder-grey-300 text-grey-600 relative bg-white bg-white rounded text-sm border-0 shadow outline-none focus:outline-none focus:ring w-full"/>
          </div>
          <div class="col-start-2 col-span-4">
            <textarea id="editor-article" name="contingut">
            <h1>Exemple de titol</h1>
            <br>
            <p>contingut de la pagina</p>
            <br>
            <ul>
                <li>priemra part</li>
                <li>segona part</li>
                <li>tercera part</li>
            </ul>
            </textarea>
          </div>
          <button type="submit" id="crear" class="bg-red-500 hover:bg-red-300 text-white font-bold py-2 px-4 rounded inline-flex items-center mt-5">
            <i class="fas fa-file-medical" aria-hidden="true"></i>
            <span class="ml-1">Crear Article</span>
          </button>
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
         <?php foreach($dadescategoria as $actual) { ?>
            <option value="<?= $actual["id"]; ?>"><?= $actual['nom'];?></option>
             <?php } ?>
            </select>
          </label>
          </form>
              </div>
            </div>
          </div>
    </div>

  </div>
          <?php include '../src/includes/scripts.php'; ?>
          <?php //include '../src/includes/tinyMCE.php'; ?>
</body>

</html>