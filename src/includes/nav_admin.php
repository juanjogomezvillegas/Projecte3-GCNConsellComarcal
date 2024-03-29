<nav id="header" class="bg-red-600 fixed w-full z-10 top-0 shadow">
        <div class="w-full container mx-auto flex flex-wrap items-center mt-0 pt-3 pb-3 md:pb-0">
                
            <div class="flex w-1/2 pl-2 md:pl-0">
      <a href="index.php?r=admin" class="flex items-center py-4 px-2">
                                <img src="../img/logoNavbar-blanc.png" alt="Logo" class="logonavbar h-16 w-12 ml-2">
                <a class="mt-10 text-gray-100 text-base xl:text-xl no-underline hover:no-underline font-bold"  href="index.php?r=admin">Panell d'administració</a>
         </div>
            <div class="w-1/2 pr-0">
                <div class="flex relative inline-block float-right">
                    <div class="relative text-sm text-gray-100">
                        <?php if ($logat) { ?>
                            <div class="hidden md:flex items-center space-x-3 mr-8">
                                <div class="relative text-sm text-gray-100">
                                    <button id="userButton" class="flex items-center focus:outline-none mr-3">
                                    <img src="<?php echo $dadesUsuariLogat["imatge"]?>" class="w-10 rounded-3xl" alt="user">
                                    </button>
                                    <div id="userMenu" class="bg-red-600 rounded shadow-md mt-2 w-60 absolute mt-12 top-0 right-0 min-w-full overflow-auto z-30 invisible">
                                        <ul class="list-reset">
                                            <li><p class="px-4 py-2 block text-gray-100 hover:bg-gray-800 no-underline hover:no-underline">Has Iniciat Sessió amb l'usuari <?php echo $usuarilogat;?></p></li>
                                            <li><a href="index.php?r=perfilusuari" class="px-4 py-2 block text-gray-100 hover:bg-gray-800 no-underline hover:no-underline">El Meu Perfil</a></li>
                                            <li><a href="index.php?r=articlespreferitsusuari" class="px-4 py-2 block text-gray-100 hover:bg-gray-800 no-underline hover:no-underline">Els Meus Articles</a></li>
                                            <li><hr class="border-t mx-2 border-gray-400"></li>
                                            <li><a href="index.php?r=logout" class="px-4 py-2 block text-gray-100 hover:bg-gray-800 no-underline hover:no-underline">Surt de la sessió</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        <?php } else { ?>
                            <div class="hidden md:flex items-center space-x-3 mr-8">
                                <a href="index.php?r=login" class="py-2 px-2 font-medium text-white rounded hover:bg-red-600 hover:text-white transition duration-300">Inicia Sessió</a>
                                <a href="index.php?r=registre" class="py-2 px-2 font-medium text-red-800 bg-white rounded hover:bg-red-600 transition duration-300">Registrat</a>
                            </div>
                        <?php } ?>
                    </div>


                    <div class="block lg:hidden pr-4">
                    <button id="nav-toggle" class="flex items-center px-3 py-2 border rounded text-gray-500 border-gray-600 hover:text-gray-100 hover:border-teal-500 appearance-none focus:outline-none">
                        <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Menu</title><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/></svg>
                    </button>
                </div>
                </div>

            </div>


            <div class="w-full flex-grow lg:flex lg:items-center lg:w-auto hidden lg:block mt-2 lg:mt-0 bg-red-600 z-20 ml-3" id="nav-content">
                <ul class="list-reset lg:flex flex-1 items-center px-4 md:px-0">
                    <li class="mr-6 my-2 md:my-0">
                        <a href="index.php" class="block py-1 md:py-3 pl-1 align-middle text-gray-50 no-underline hover:text-gray-200 border-gray-50 hover:border-blue-200">
                            <i class="fas fa-globe fa-fw mr-3 "></i><span class="pb-1 md:pb-0 text-sm">Web</span>
                        </a>
                    </li>
                    <li class="mr-6 my-2 md:my-0">
                        <a href="index.php?r=admin" class="block py-1 md:py-3 pl-1 align-middle text-gray-50 no-underline hover:text-gray-200 border-gray-50 hover:border-blue-200">
                            <i class="fas fa-home fa-fw mr-3 "></i><span class="pb-1 md:pb-0 text-sm">Inici Panell</span>
                        </a>
                    </li>
                    <?php if ($dadesUsuariLogat["rol"] === "Administrador") { ?>
                        <li class="mr-6 my-2 md:my-0">
                            <a href="index.php?r=llistarusuari" class="block py-1 md:py-3 pl-1 align-middle text-gray-50 no-underline hover:text-gray-200  border-gray-50  hover:border-blue-200">
                                <i class="fas fa-user fa-fw mr-3"></i><span class="pb-1 md:pb-0 text-sm">Usuari</span>
                            </a>
                        </li>
                    <?php } ?>
                    <li class="mr-6 my-2 md:my-0">
                        <a href="index.php?r=llistararticle" class="block py-1 md:py-3 pl-1 align-middle text-gray-50 no-underline hover:text-gray-200 border-gray-50  hover:border-blue-200">
                            <i class="fa fa-tasks fa-fw mr-3"></i><span class="pb-1 md:pb-0 text-sm">Articles</span>
                        </a>
                    </li>
                    <li class="mr-6 my-2 md:my-0">
                        <a href="index.php?r=llistarcategoria" class="block py-1 md:py-3 pl-1 align-middle text-gray-50 no-underline hover:text-gray-200  border-gray-50  hover:border-blue-200">
                            <i class="fas fa-wallet fa-fw mr-3"></i><span class="pb-1 md:pb-0 text-sm">Categories</span>
                        </a>
                    </li>
                    <li class="mr-6 my-2 md:my-0">
                        <a href="index.php?r=llistarmissatges" class="block py-1 md:py-3 pl-1 align-middle text-gray-50 no-underline hover:text-gray-200  border-gray-50  hover:border-blue-200">
                            <i class="fas fa-envelope fa-fw mr-3"></i><span class="pb-1 md:pb-0 text-sm">Missatges</span>
                        </a>
                    </li>
                    <li class="mr-6 my-2 md:my-0">
                        <a href="index.php?r=sliders" class="block py-1 md:py-3 pl-1 align-middle text-gray-50 no-underline hover:text-gray-200  border-gray-50  hover:border-blue-200">
                            <i class="fas fa-sliders-h fa-fw mr-3"></i><span class="pb-1 md:pb-0 text-sm">Slider</span>
                        </a>
                    </li>
                </ul>
                <div id="google_translate_element"></div>
                
            
            <script src="script/traductor.js"></script>
        </div>
    </nav>
