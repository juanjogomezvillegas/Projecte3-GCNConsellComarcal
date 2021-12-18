<!DOCTYPE html>
<html lang="ca">
<head>

    <!-- Incluguem el fitxer head que contindrà totes  -->
    <?php include '../src/includes/head.php'; ?>
    <title>Contacte | GCN Consell Comarcal</title>
    <?php
    include '../src/includes/recaptcha.php';
    ?>
</head>
<body class="bg-red-800">
    <?php
    include '../src/includes/preloader.php';
    ?>
    <?php
    include '../src/includes/nav.php';
    ?>
         
 <div id="containerContacte" class="flex justify-center h-screen mx-auto text-center">
    <form id=contacte class="w-full md:w-3/4 lg:w-3/6 p-4">
      <div class="p-3">
      <h1 class="text-center text-white text-4xl mb-10">Contacte</h1>
      <div class="bg-green-100 border border-green-300 text-green-700 px-4 py-3 rounded relative mb-4 success-missatge hidden" role="alert">
  <?php if ($logat) { ?>
    <strong class="font-bold">El seu missatge s'ha enviat correctament:</strong>
    <span class="block sm:inline">Rebrás una resposta el més ràpid possible a l'adreça <?= $dadesUsuari["email"] ?></span>
  <?php } else { ?>
    <strong class="font-bold">El seu missatge s'ha enviat correctament:</strong>
    <span class="block sm:inline">Rebrás una resposta el més ràpid possible a l'adreça de Correu Indicada</span>
  <?php } ?>
  <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
  </span>
  <?php if (!$logat) { ?>
      </div>
        <input name="nom" class="text-center block appearance-none placeholder-gray-500 placeholder-opacity-100 border border-light-blue-400 rounded-md w-full py-3 px-4 text-gray-700 leading-5 focus:outline-none focus:ring-2 focus:ring-light-blue-300" type="text" placeholder="Nom i Cognom" required>
      </div>
      <div class="p-3">
        <input name="email" class="text-center block appearance-none placeholder-gray-500 placeholder-opacity-100 border border-light-blue-400 rounded-md w-full py-3 px-4 text-gray-700 leading-5 focus:outline-none focus:ring-2 focus:ring-light-blue-300" type="email" placeholder="Correu Electrònic" required>
      </div>
      <div class="p-3">
        <input name="telefon" class="text-center block appearance-none placeholder-gray-500 placeholder-opacity-100 border border-light-blue-400 rounded-md w-full py-3 px-4 text-gray-700 leading-5 focus:outline-none focus:ring-2 focus:ring-light-blue-300" type="text" placeholder="Numero de Telèfon" required>
      </div>
      <?php } else { ?>
      </div>
      <div class="dadesContacte rounded overflow-hidden shadow-lg bg-gray-200">
                    <div class="px-6 py-4">
                            <p class="text-gray-700 text-base">
                            <span class="negreta">Nom i Cognom:</span><br> <?= $dadesUsuari["nom"] ?> <?= $dadesUsuari["cognom"] ?>
                            </p>
                            <br>
                            <p class="text-gray-700 text-base">
                            <span class="negreta">Correu Electrònic:</span><br> <?= $dadesUsuari["email"] ?>
                            </p>
                            <br>
                            <p class="text-gray-700 text-base">
                            <span class="negreta">Numero de Telèfon:</span><br> <?= $dadesUsuari["telefon"] ?>
                            </p>
                    </div>
          </div>
        <input name="nom" type="hidden" placeholder="Nom" value="<?= $dadesUsuari["nom"] ?> <?= $dadesUsuari["cognom"] ?>">
        <input name="email" type="hidden" placeholder="Correu electronic" value="<?= $dadesUsuari["email"] ?>">
        <input name="telefon" type="hidden" placeholder="Numero de telefon" value="<?= $dadesUsuari["telefon"] ?>">
      <?php } ?>
      <div class="p-3">
        <textarea name="missatge" class="dadesContacte text-center bg-gray-200 resize-none border rounded-md block appearance-none placeholder-gray-500 placeholder-opacity-100 border border-light-blue-400 rounded-md w-full py-3 px-4 text-gray-700 leading-5 focus:outline-none focus:ring-2 focus:ring-light-blue-300 h-56" placeholder="Missatge (Motiu per que contactes)" required></textarea>
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
  <br>
  <br>
<footer>
<?php include '../src/includes/footer.php';?>
</footer>
<?php include '../src/includes/scripts.php';?>

</body>
</html>
