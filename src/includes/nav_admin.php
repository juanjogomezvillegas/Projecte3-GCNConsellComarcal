<nav id="header" class="bg-red-500 fixed w-full z-10 top-0 shadow">
		<div class="w-full container mx-auto flex flex-wrap items-center mt-0 pt-3 pb-3 md:pb-0">
				
			<div class="flex w-1/2 pl-2 md:pl-0">
      <a href="index.php?r=admin" class="flex items-center py-4 px-2">
								<img src="../img/logoNavbar-blanc.png" alt="Logo" class="h-16 w-12">
                <a class="mt-10 text-gray-100 text-base xl:text-xl no-underline hover:no-underline font-bold"  href="index.php?r=admin">Panell d'administració</a>
         </div>
			<div class="w-1/2 pr-0">
				<div class="flex relative inline-block float-right">
				
				  <div class="relative text-sm text-gray-100">
					  <button id="userButton" class="flex items-center focus:outline-none mr-3">
						<img class="w-8 h-8 rounded-full mr-4" src="http://i.pravatar.cc/300" alt="Avatar of User"> <span class="hidden md:inline-block text-gray-100">Admin/Gestor</span>
						<svg class="pl-2 h-2 fill-current text-gray-100" version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 129 129" xmlns:xlink="http://www.w3.org/1999/xlink" enable-background="new 0 0 129 129"><g><path d="m121.3,34.6c-1.6-1.6-4.2-1.6-5.8,0l-51,51.1-51.1-51.1c-1.6-1.6-4.2-1.6-5.8,0-1.6,1.6-1.6,4.2 0,5.8l53.9,53.9c0.8,0.8 1.8,1.2 2.9,1.2 1,0 2.1-0.4 2.9-1.2l53.9-53.9c1.7-1.6 1.7-4.2 0.1-5.8z"/></g></svg>
					  </button>
					  <div id="userMenu" class="bg-red-500 rounded shadow-md mt-2 absolute mt-12 top-0 right-0 min-w-full overflow-auto z-30 invisible">
						  <ul class="list-reset">
							<li><a href="#" class="px-4 py-2 block text-gray-100 hover:bg-gray-800 no-underline hover:no-underline">Perfil</a></li>
							<li><a href="#" class="px-4 py-2 block text-gray-100 hover:bg-gray-800 no-underline hover:no-underline">Configuració</a></li>
							<li><hr class="border-t mx-2 border-gray-400"></li>
							<li><a href="#" class="px-4 py-2 block text-gray-100 hover:bg-gray-800 no-underline hover:no-underline">Surt de la sessió</a></li>
						  </ul>
					  </div>
				  </div>


					<div class="block lg:hidden pr-4">
					<button id="nav-toggle" class="flex items-center px-3 py-2 border rounded text-gray-500 border-gray-600 hover:text-gray-100 hover:border-teal-500 appearance-none focus:outline-none">
						<svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Menu</title><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/></svg>
					</button>
				</div>
				</div>

			</div>


			<div class="w-full flex-grow lg:flex lg:items-center lg:w-auto hidden lg:block mt-2 lg:mt-0 bg-red-500 z-20" id="nav-content">
				<ul class="list-reset lg:flex flex-1 items-center px-4 md:px-0">
					<li class="mr-6 my-2 md:my-0">
                        <a href="index.php?r=admin" class="block py-1 md:py-3 pl-1 align-middle text-gray-50 no-underline hover:text-gray-100 border-gray-50 hover:border-blue-200">
                            <i class="fas fa-home fa-fw mr-3 "></i><span class="pb-1 md:pb-0 text-sm">Inici Panell</span>
                        </a>
                    </li>
					<li class="mr-6 my-2 md:my-0">
                        <a href="index.php?r=llistarusuari" class="block py-1 md:py-3 pl-1 align-middle text-gray-50 no-underline hover:text-gray-100  border-gray-50  hover:border-pink-200">
                            <i class="fas fa-user fa-fw mr-3"></i><span class="pb-1 md:pb-0 text-sm">Usuari</span>
                        </a>
                    </li>
                    <li class="mr-6 my-2 md:my-0">
                        <a href="index.php?r=llistararticle" class="block py-1 md:py-3 pl-1 align-middle text-gray-50 no-underline hover:text-gray-100 border-gray-50  hover:text-purple-400 hover:scale-105">
                            <i class="fa fa-tasks fa-fw mr-3"></i><span class="pb-1 md:pb-0 text-sm">Articles</span>
                        </a>
                    </li>
                    <li class="mr-6 my-2 md:my-0">
                        <a href="index.php?r=llistarcategoria" class="block py-1 md:py-3 pl-1 align-middle text-gray-50 no-underline hover:text-gray-100  border-gray-50  hover:border-green-200">
                            <i class="fas fa-wallet fa-fw mr-3"></i><span class="pb-1 md:pb-0 text-sm">Categories</span>
                        </a>
                    </li>
				</ul>
				
			
			
		</div>
	</nav>