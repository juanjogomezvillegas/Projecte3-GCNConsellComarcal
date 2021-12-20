<!DOCTYPE html>
<html lang="ca">

<head>

    <!-- Incluguem el fitxer head que contindrà totes  -->
    <?php require '../src/includes/head.php'; ?>
    <title><?php echo $informacioArticle["titol"] ?> | GCN Consell Comarcal</title>
</head>

<body>
    <?php
    require '../src/includes/preloader.php';
    ?>
    <?php
    require '../src/includes/nav.php';
    ?>
    <?php
    require '../src/includes/recaptcha.php';
    ?>
    <!--Container-->
    <div class="container w-full md:max-w-3xl mx-auto pt-20">

        <div class="w-full px-4 md:px-6 text-xl text-gray-800 leading-normal" style="font-family:Georgia,serif;">

    <!--Title-->
    <div class="font-sans">
        <p class="text-base md:text-sm text-green-500 font-bold">&lt; <a href="index.php" class="text-base md:text-sm text-red-500 font-bold no-underline hover:underline">Tornar a la portada</a></p>
                <h1 class="font-bold font-sans break-normal text-gray-900 pt-6 pb-2 text-3xl md:text-4xl"><?php echo $informacioArticle['titol'];?></h1>
                <p class="text-sm md:text-base font-normal text-gray-600 mb-5">Ultima Edició el <?php echo $informacioArticle['dataEdicio'];?></p>
    </div>          


            <!--Post Content-->

            <?php echo $informacioArticle['contingut']; ?>
 
            <!--/ Post Content-->

            <br>
            <ul role="list" class="border border-gray-300 rounded-md divide-y divide-gray-200">
                <?php foreach ($documentsArticle as $actual) { ?>
                    <a href="img/documents/<?php echo $actual["enllac"]; ?>" target="__blank">
                        <li class="documentPdf border border-gray-300 bg-gray-100 pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                            <div class="w-0 flex-1 flex items-center">
                                <span class="flex-shrink-0 h-5 w-5 text-red-700 text-2xl"><i class="fas fa-file-pdf"></i></span>
                                <span class="ml-2 flex-1 w-0 truncate">
                                    <?php echo $actual["enllac"]; ?>
                                </span>
                            </div>
                        </li>
                    </a>
                <?php } ?>
            </ul>

<!--Categoria -->
<div class="text-base md:text-sm text-gray-500 px-4 py-6">
    Categoria: <?php echo $informacioArticle["categoria"]; ?>
</div>

<br>
<h1 class="font-bold font-sans break-normal text-gray-900 pt-6 pb-2 text-3xl md:text-4xl">Comentaris</h1>
<?php if ($logat) { ?>
    <form class="flex mb-3" action="index.php?r=docomentari" method="POST">
        <input type="hidden" name="idarticle" value="<?php echo $informacioArticle["id"]; ?>">
        <textarea name="missatge" class="flex-1 text-center documentPdf resize-none ntPdf border border-gray-300 bg-gray-100 pl-3 pr-4 py-3 flex items-center justify-between text-sm" placeholder="Escriu Aquí el teu Comentari"></textarea>
        <button type='submit' class="bg-blue-700 hover:bg-blue-800 text-white font-bold py-3 px-4 rounded text-2xl">
            Comentar <span class="text-2xl"><i class="fas fa-comments"></i></span>
        </button>
        <input type="hidden" name="recaptcha_response" id="recaptchaResponse">
    </form>
<?php } ?>
<ul role="list" class="border border-gray-300 rounded-md divide-y divide-gray-200">
    <?php if (count($llistatComentarisArticle) > 0) { ?>
        <?php foreach ($llistatComentarisArticle as $actual) { ?>
            <li class="documentPdf border border-gray-300 bg-gray-100 pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                <div class="w-0 flex-1 flex items-center">
                    <span class="ml-2 flex-1 w-0 truncate">
                        <?php echo $actual["missatge"]; ?>
                    </span>
                    <div class="w-1/4 text-wrap text-center flex flex-col text-white text-bold rounded-md bg-red-500 justify-center items-center mr-10 p-2">
                        <?php echo $actual["nomUsuari"]; ?>
                        <br>
                        <?php echo $actual["data_enviament"]; ?>
                    </div>
                    <?php if ($logat && ($dadesUsuariLogat["rol"] === "Administrador" || $$dadesUsuariLogat["rol"] === "Gestor")) { ?>
                    <a href="index.php?r=doeliminarcomentari&id=<?php echo $actual["id"]; ?>&idArticle=<?php echo $informacioArticle["id"]; ?>"><span class="text-red-600 hover:text-red-900 dark:text-red-500 dark:hover:underline">
                        <i class="fas fa-trash-alt"></i>
                    </span></a>
                    <?php } ?>
                </div>
            </li>
        <?php } ?>
    <?php } else { ?>
        <div class="bg-red-100 border-red-500 text-red-700 p-4" role="alert">
            <p class="text-xl text-center"><i class="fas fa-info-circle"></i> En Aquest Moment no hi han Comentaris.</p>
        </div>
    <?php } ?>
</ul>

<hr>

<!--Veure articles-->
<div class="font-sans flex justify-between content-center px-4 pb-12">
            <div class="text-left">
            <?php if (isset($idanteriorArticle)) { ?>
                <a href="index.php?r=article&id=<?php echo $idanteriorArticle?>" class="text-xs md:text-sm font-normal text-red-600">&lt; Anterior Article<br>
                <p><?php echo $nomanteriorArticle?></p></a>
            <?php } ?>
            </div>
            
            <div class="text-right">
            <?php if (isset($idseguentArticle)) { ?>
                <a href="index.php?r=article&id=<?php echo $idseguentArticle?>" class="text-xs md:text-sm font-normal text-red-600">Seguent article &gt;<br>
                <p><?php echo $nomseguentArticle?> </p></a>
            <?php } ?>
            </div>
        </div>

        </div>
        <!--/Veure articles-->

    </div>
    <!--/container-->
    <footer>
        <?php require '../src/includes/footer.php'; ?>
    </footer>
    <?php require '../src/includes/scripts.php'; ?>

</body>

</html>