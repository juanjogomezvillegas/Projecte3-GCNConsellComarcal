		<!-- Navbar goes here -->
		<nav class="bg-red-500 shadow-lg">
			<div class="max-w-6xl mx-auto px-4">
				<div class="flex justify-between">
					<div class="flex space-x-7">
						<div>
							<!-- Website Logo -->
							<a href="#" class="flex items-center py-4 px-2">
								<img src="../img/logoNavbar-blanc.png" alt="Logo" class="h-15 w-10 mr-2 ">
							</a>
						</div>
						<!-- Primary Navbar items -->
						<div class="hidden md:flex items-center space-x-1">
							<a href="" class="py-4 px-2 text-white hover:text-gray-400 transition duration-300 font-semibold ">Inici</a>
							<a href="" class="py-4 px-2 text-white font-semibold hover:text-gray-400 transition duration-300">Ambits</a>
							<a href="" class="py-4 px-2 text-white font-semibold hover:text-gray-400 transition duration-300">Salut</a>
							<a href="" class="py-4 px-2 text-white font-semibold hover:text-gray-400 transition duration-300">Ocupació i formació</a>
							<a href="" class="py-4 px-2 text-white font-semibold hover:text-gray-400 transition duration-300">Cites previes</a>
							<a href="" class="py-4 px-2 text-white font-semibold hover:text-gray-400 transition duration-300">Habitatge</a>
							<a href="" class="py-4 px-2 text-white font-semibold hover:text-gray-400 transition duration-300">Consell comarcal</a>


						</div>
					</div>
					<!-- Secondary Navbar items -->
					<div class="hidden md:flex items-center space-x-3 ">
						<a href="index.php?r=login" class="py-2 px-2 font-medium text-white rounded hover:bg-red-300 hover:text-white transition duration-300">Inicia Sessió</a>
						<a href="index.php?r=registre" class="py-2 px-2 font-medium text-red-800 bg-white rounded hover:bg-red-200 transition duration-300">Registrat</a>
					</div>
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
					<li class="active"><a href="#home" class="block text-sm px-2 py-4 text-white hover:bg-red-400 transition duration-500">Home</a></li>
					<li><a href="#services" class="block text-sm px-2 py-4 text-white hover:bg-red-400 transition duration-500">Services</a></li>
					<li><a href="#about" class="block text-sm px-2 py-4 text-white hover:bg-red-400 transition duration-500">About</a></li>
					<li><a href="#contact" class="block text-sm px-2 py-4 text-white hover:bg-red-400 transition duration-500">Contact Us</a></li>
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