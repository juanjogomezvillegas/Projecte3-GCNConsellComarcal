<!DOCTYPE html>
<html lang="ca">
<head>

    <!-- Incluguem el fitxer head que contindrà totes  -->
    <?php require '../src/includes/head.php'; ?>
    <title>GCN Consell Comarcal</title>
</head>
<body class="bg-gray-300">
    <?php
    require '../src/includes/preloader.php';
    ?>
    <?php
    require '../src/includes/nav.php';
    ?>
    <div class="swiper-container">
   <!-- Additional required wrapper -->
   <div class="swiper-wrapper">
   <!-- Slider -->
      <!-- Slide1 -->
      <?php foreach ($imatgeCarpeta as $actual) { ?>
        
      <div class="swiper-slide" style="background-image: url(<?= $actual ?>)">
         <div class="slide-text aparicioMagica">
            <h1>Consell Comarcal de l'Alt Empordà</h1>
            <p>Totes les Gestions en un Click.</p>
            <a class="btn" href="index.php?r=contacte">Contacte</a>
         </div>
      </div>
      <?php }?>

   </div>
   <!-- If we need pagination -->
   <div class="swiper-pagination"></div>

   <!-- If we need navigation buttons -->
   <div class="swiper-button-prev"><span></span></div>
   <div class="swiper-button-next"><span></span></div>

</div>
    <h1 class="mt-7 mb-7 text-5xl text-red-900 text-center">Articles</h1>
    <?php if (count($articlesPortada) > 0) { ?>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-7 ml-7 mr-7">
            <?php foreach ($articlesPortada as $actual) { ?>
                <div class="articlesPortada mb-5 flex items-stretch flex-row md:sp-acex-5 space-y-3 md:space-y-0 rounded-xl shadow-lg p-3 max-w-xs md:max-w-3xl mx-auto border border-white bg-gray-200">
                    <div class="w-full md:w-1/3 grid place-items-center">
                        <a href="index.php?r=article&id=<?php echo $actual["id"];?>">
                            <img src="<?php echo $actual["imatge"];?>" alt="logo" class="rounded-xl" />
                        </a>
                    </div>
                    <div class="w-full md:w-2/3 space-y-2 p-3">
                    <?php if ($logat) { ?>
                        <div class="flex justify-end">
                            <div class="flex justify-end">
                            <input type="hidden" name="idArticle" value="<?php echo $actual["id"];?>">

                            <?php $actiu = false; ?>
                            <?php foreach ($articlesFavoritsTots as $actual2) { ?>
                                <?php if ($actual2["id_article"] === $actual["id"] && $actual2["id_usuari"] === $dadesUsuari["id"]) { ?>
                                    <?php $actiu = true; ?>
                                <?php } ?>
                            <?php } ?>
                            <?php if ($actiu) { ?>
                                <span class="estrella text-2xl font-semibold text-yellow-400 ml-5"><i class="fas fa-star"></i></span>
                            <?php } else { ?>
                                <span class="estrella text-2xl font-semibold text-gray-400 ml-5"><i class="fas fa-star"></i></span>
                            <?php } ?>
                            </div>
                        </div>
                    <?php } ?>
                        <a href="index.php?r=article&id=<?php echo $actual["id"];?>">
                            <h3 class="text-gray-900 md:text-3xl text-xl"><?php echo $actual["titol"]; ?></h3>
                            <p class="md:text-lg text-gray-700">
                                <?php $contingut = strip_tags($actual["contingut"]); ?>
                                <?php echo substr($contingut, 0, 100);?> ...
                            </p>
                            <br>
                            <p class="text-sm text-gray-500">
                            Categoria <span class="font-normal text-gray-600 text-base"><?php echo $actual["categoria"]; ?></span>
                            </p>
                            <p class="text-sm text-gray-500">
                            Ultima Edició el <span class="font-normal text-gray-600 text-base"><?php echo $actual["dataEdicio"]; ?></span>
                            </p>
                        </a>
                    </div>
                </div>
            <?php } ?>
        </div>
    <?php } else { ?>
        <div class="bg-red-100 border-red-500 text-red-700 p-4" role="alert">
            <p class="text-xl text-center"><i class="fas fa-info-circle"></i> En Aquest Moment no hi han Articles Disponibles.</p>
        </div>
    <?php } ?>
    <br>
    <h1 class="mt-7 mb-7 text-5xl text-red-900 text-center">Tramits</h1>
    <?php if (count($articlesPortadaTramits) > 0) { ?>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-7 ml-7 mr-7">
            <?php foreach ($articlesPortadaTramits as $actual) { ?>
                <div class="articlesPortada mb-5 flex flex-row items-stretch md:sp-acex-5 space-y-3 md:space-y-0 rounded-xl shadow-lg p-3 max-w-xs md:max-w-3xl mx-auto border border-white bg-gray-200">
                    <div class="w-full md:w-1/3 grid place-items-center">
                        <a href="index.php?r=article&id=<?php echo $actual["id"];?>">
                            <img src="<?php echo $actual["imatge"];?>" alt="logo" class="rounded-xl" />
                        </a>
                    </div>
                    <div class="w-full md:w-2/3 space-y-2 p-3">
                    <?php if ($logat) { ?>
                        <div class="flex justify-end">
                            <div class="flex justify-end">
                            <input type="hidden" name="idArticle" value="<?php echo $actual["id"];?>">

                            <?php $actiu = false; ?>
                            <?php foreach ($articlesFavoritsTots as $actual2) { ?>
                                <?php if ($actual2["id_article"] === $actual["id"] && $actual2["id_usuari"] === $dadesUsuari["id"]) { ?>
                                    <?php $actiu = true; ?>
                                <?php } ?>
                            <?php } ?>
                            <?php if ($actiu) { ?>
                                <span class="estrella text-2xl font-semibold text-yellow-400 ml-5"><i class="fas fa-star"></i></span>
                            <?php } else { ?>
                                <span class="estrella text-2xl font-semibold text-gray-400 ml-5"><i class="fas fa-star"></i></span>
                            <?php } ?>
                            </div>
                        </div>
                    <?php } ?>
                        <a href="index.php?r=article&id=<?php echo $actual["id"];?>">
                            <h3 class="text-gray-900 md:text-3xl text-xl"><?php echo $actual["titol"]; ?></h3>
                            <p class="md:text-lg text-gray-700">
                                <?php $contingut = strip_tags($actual["contingut"]); ?>
                                <?php echo substr($contingut, 0, 100);?> ...
                            </p>
                            <br>
                            <p class="text-sm text-gray-500">
                            Ultima Edició el <span class="font-normal text-gray-600 text-base"><?php echo $actual["dataEdicio"]; ?></span>
                            </p>
                        </a>
                    </div>
                </div>
            <?php } ?>
        </div>
    <?php } else { ?>
        <div class="bg-red-100 border-red-500 text-red-700 p-4" role="alert">
            <p class="text-xl text-center"><i class="fas fa-info-circle"></i> En Aquest Moment no hi han Tramits Disponibles.</p>
        </div>
    <?php } ?>
    <br>
<footer>
<?php require '../src/includes/footer.php';?>
</footer>
<?php require '../src/includes/scripts.php';?>
<script src="script/favorits.js"></script>
</body>
</html>