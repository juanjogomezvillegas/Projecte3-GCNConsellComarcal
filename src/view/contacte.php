<!DOCTYPE html>
<html lang="es">
<head>

    <!-- Incluguem el fitxer head que contindrà totes  -->
    <?php include '../src/includes/head.php'; ?>
    <title>GCN Consell Comarcal</title>
    <?php
    include '../src/includes/recaptcha.php';
    ?>
</head>
<body>
    <?php
    include '../src/includes/preloader.php';
    ?>
    <?php
    include '../src/includes/nav.php';
    ?>
         
 <div class="flex justify-center h-screen mx-auto bg-red-400 text-center">
    <form id=contacte class="w-full md:w-3/4 lg:w-3/6 p-4">
      <div class="p-3">
      <h1 class="text-center text-white text-4xl mb-10">Contacte</h1>
      <div class="bg-green-100 border border-green-300 text-green-700 px-4 py-3 rounded relative mb-4 success-missatge hidden" role="alert">
  <strong class="font-bold">El seu missatge s'ha enviat correctament:</strong>
  <span class="block sm:inline">Rebrás una resposta el més ràpid possible</span>
  <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
  </span>
</div>
        <input name="nom" class="text-center block appearance-none placeholder-gray-500 placeholder-opacity-100 border border-light-blue-400 rounded-md w-full py-3 px-4 text-gray-700 leading-5 focus:outline-none focus:ring-2 focus:ring-light-blue-300" type="text" placeholder="Nom" required>
      </div>
      <div class="p-3">
        <input name="email" class="text-center block appearance-none placeholder-gray-500 placeholder-opacity-100 border border-light-blue-400 rounded-md w-full py-3 px-4 text-gray-700 leading-5 focus:outline-none focus:ring-2 focus:ring-light-blue-300" type="email" placeholder="Correu electronic" required>
      </div>
      <div class="p-3">
        <input name="telefon" class="text-center block appearance-none placeholder-gray-500 placeholder-opacity-100 border border-light-blue-400 rounded-md w-full py-3 px-4 text-gray-700 leading-5 focus:outline-none focus:ring-2 focus:ring-light-blue-300" type="number" placeholder="Numero de telefon" required>
      </div>
      <div class="p-3">
        <textarea name="missatge" class="text-center resize-none border rounded-md block appearance-none placeholder-gray-500 placeholder-opacity-100 border border-light-blue-400 rounded-md w-full py-3 px-4 text-gray-700 leading-5 focus:outline-none focus:ring-2 focus:ring-light-blue-300 h-56" placeholder="Missatge (Motiu per que contactes)" required></textarea>
      </div>
      <div class="p-3 pt-4">
      <?php if (!empty($error)) { ?>
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                            <strong class="font-bold">S'ha produit algun error</strong>
                            <span class="block">
                                <?php if($error == 1){?>
                                 Revisa que el password coincideixi amb la contrasenya
                                 <?php }?>
                                </span>
                                
                        </div>
                    <?php }  ?>
      </div>
      <div class="p-3 pt-4">
      <button  type='submit' class="w-full bg-gray-700 hover:bg-gray-900 text-white font-bold py-3 px-4 rounded text-2xl">
      Enviar
      </button>
      <input type="hidden" name="recaptcha_response" id="recaptchaResponse">
    </form>
    </div>
     </div>
  </div>
<footer>
<?php include '../src/includes/footer.php';?>
</footer>
<?php include '../src/includes/scripts.php';?>

</body>
</html>
