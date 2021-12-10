<!-- Navbar goes here -->
<nav class="bg-red-600 shadow-lg">
	<div class="max-w-6xl mx-auto px-4">
		<div class="flex justify-between">
			<div class="flex space-x-7">
				<div>
					<!-- Website Logo -->
					<a href="index.php" class="flex items-center py-4 px-2">
						<img src="../img/logoNavbar-blanc.png" alt="Logo" class="logonavbar h-15 w-10 mr-2 ">
					</a>
				</div>
				<!-- Primary Navbar items -->
				<div class="hidden md:flex items-center space-x-1">
					<a href="" class="py-4 px-2 text-white font-semibold hover:text-gray-400 transition duration-300">Articles</a>
					<a href="" class="py-4 px-2 text-white font-semibold hover:text-gray-400 transition duration-300">Tramits</a>
					<a href="" class="py-4 px-2 text-white font-semibold hover:text-gray-400 transition duration-300">Blog</a>
					<a href="" class="py-4 px-2 text-white font-semibold hover:text-gray-400 transition duration-300">Contacte</a>
					<?php if ($dadesUsuariLogat["rol"] === "Administrador" || $dadesUsuariLogat["rol"] === "Gestor") { ?>
						<a href="index.php?r=admin" class="py-4 px-2 text-white font-semibold hover:text-gray-400 transition duration-300">Administració del Lloc</a>
					<?php } ?>
					<a href="https://www.altemporda.org/portal/" class="py-4 px-2 text-white font-semibold hover:text-gray-400 transition duration-300">Consell comarcal</a>
				</div>
			</div>
			<!-- Secondary Navbar items -->
			<?php if ($logat) { ?>
				<div class="hidden md:flex items-center space-x-3">
					<div class="relative text-sm text-gray-100">
						<button id="userButton" class="flex items-center focus:outline-none mr-3">
						<img src="img/user.png" alt="user">
						</button>
						<div id="userMenu" class="bg-red-600 rounded shadow-md mt-2 w-60 absolute mt-12 top-0 right-0 min-w-full overflow-auto z-30 invisible">
							<ul class="list-reset">
								<li><p class="px-4 py-2 block text-gray-100 hover:bg-gray-800 no-underline hover:no-underline">Has Iniciat Sessió amb l'usuari <?=$usuarilogat;?></p></li>
								<li><a href="#" class="px-4 py-2 block text-gray-100 hover:bg-gray-800 no-underline hover:no-underline">El Meu Perfil</a></li>
								<li><hr class="border-t mx-2 border-gray-400"></li>
								<li><a href="index.php?r=logout" class="px-4 py-2 block text-gray-100 hover:bg-gray-800 no-underline hover:no-underline">Surt de la sessió</a></li>
							</ul>
						</div>
					</div>
				</div>
			<?php } else { ?>
				<div class="hidden md:flex items-center space-x-3 ">
					<a href="index.php?r=login" class="py-2 px-2 font-medium text-white rounded hover:bg-red-300 hover:text-white transition duration-300">Inicia Sessió</a>
					<a href="index.php?r=registre" class="py-2 px-2 font-medium text-red-800 bg-white rounded hover:bg-red-200 transition duration-300">Registrat</a>
				</div>
			<?php } ?>
			<!-- Mobile menu button -->
			<div class="md:hidden flex items-center">
				<button class="outline-none mobile-menu-button">
				<svg class=" w-6 h-6 text-white hover:text-white"
					x-show="!showMenu"
					fill="none"
					stroke-linecap="round"
					stroke-linejoin="round"
					stroke-width="2"
					viewBox="0 0 24 24"
					stroke="currentColor"
				>
					<path d="M4 6h16M4 12h16M4 18h16"></path>
				</svg>
			</button>
			</div>
		</div>
	</div>
	<!-- mobile menu -->
	<div class="hidden mobile-menu">
		<ul class="">
			<?php if ($logat) { ?>
				<li><p class="block text-sm px-2 py-4 text-white hover:bg-red-400 transition duration-500">Has Iniciat Sessió amb l'usuari <?=$usuarilogat;?></p></li>
				<li><a href="" class="block text-sm px-2 py-4 text-white hover:bg-red-400 transition duration-500">El Meu Perfil</a></li>
				<li><a href="index.php?r=logout" class="block text-sm px-2 py-4 text-white hover:bg-red-400 transition duration-500">Surt de la sessió</a></li>
			<?php } else { ?>
				<li><a href="index.php?r=login" class="block text-sm px-2 py-4 text-white hover:bg-red-400 transition duration-500">Inicia Sessió</a></li>
				<li><a href="index.php?r=registre" class="block text-sm px-2 py-4 text-white hover:bg-red-400 transition duration-500">Registrat</a></li>
			<?php } ?>
			<li><hr class="border-t mx-2 border-gray-400"></li>
			<li><a href="" class="block text-sm px-2 py-4 text-white hover:bg-red-400 transition duration-500">Articles</a></li>
			<li><a href="" class="block text-sm px-2 py-4 text-white hover:bg-red-400 transition duration-500">Tramits</a></li>
			<li><a href="" class="block text-sm px-2 py-4 text-white hover:bg-red-400 transition duration-500">Blog</a></li>
			<li><a href="" class="block text-sm px-2 py-4 text-white hover:bg-red-400 transition duration-500">Contacte</a></li>
			<li><a href="index.php?r=admin" class="block text-sm px-2 py-4 text-white hover:bg-red-400 transition duration-500">Administració del Lloc</a></li>
			<li><a href="https://www.altemporda.org/portal/" class="block text-sm px-2 py-4 text-white hover:bg-red-400 transition duration-500">Consell comarcal</a></li>
		</ul>
	</div>
	<script>
		/*Guarradas no porfavor alex :)*/
		const btn = document.querySelector("button.mobile-menu-button");
		const menu = document.querySelector(".mobile-menu");

		btn.addEventListener("click", () => {
			menu.classList.toggle("hidden");
		});
	</script>
</nav>