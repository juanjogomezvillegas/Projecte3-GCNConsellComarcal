 <!-- Footer section -->

 <div class="bg-cover bg-center" style="background-image: url('img/the-background-292729_960_720.png');">
    <div style="background-color: rgba(0, 0, 0, 0.6);">
        <div class="container mx-auto px-6 lg:px-20 py-12 text-center">
            <div class="lg:flex">
                <div class="w-full lg:w-2/3">
                    <div class="lg:flex">
                        <div class="w-full mb-12 lg:mb-0 lg:w-1/2">
                            <a href="index.php"><img src="../img/logoNavbar-blanc.png" alt="Logo" class="logofooter h-25 w-20 block m-auto"></a>
                            <div class="flex mt-6 justify-center">
                                <a href="https://ca-es.facebook.com/ccaltemporda/"><i style="background-color: #3B5998;"
                                    class="socialNetwork flex items-center justify-center h-12 w-12 mr-1 rounded-full fab fill-current text-white text-xl fa-facebook"></i></a>
                                <a href="mailto:consell@altemporda.cat"><i style="background-color:#dd4b39"
                                    class="socialNetwork flex items-center justify-center h-12 w-12 mx-1 rounded-full fas fill-current text-white text-xl fa-envelope"></i></a>
                                <a href="https://twitter.com/ccaltemporda"><i style="background-color:#55ACEE;"
                                    class="socialNetwork flex items-center justify-center h-12 w-12 mx-1 rounded-full fab fill-current text-white text-xl fa-twitter"></i></a>
                            </div>
                        </div>
                        <?php if ($logat) { ?>
                            <div class="ml-52 mr-10 w-full inline-flex justify-center">
                                <div class="w-full mb-6 lg:mb-0 lg:w-1/2">
                                    <h2 class="font-bold text-gray-100 mb-4">
                                        Articles Favorits</h2>
                                    <ul id="favoritsFooter" class="text-gray-300 mb-8">
                                    </ul>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="w-full lg:w-1/3">
                    <h2 class=" font-bold text-gray-100 mb-4">
                        Dades de contacte
                    </h2>
                    <div class="text-gray-300 mb-8">
                <a class="text-white" href="https://www.google.es/maps/place/Carrer+Nou,+48,+17600+Figueres,+Girona/@42.2647985,2.9635546,20.79z/data=!4m5!3m4!1s0x12ba8dc48bbfbff3:0x999e044eb2d67645!8m2!3d42.2648447!4d2.9635791">
                    C/ Nou 48, 17600 Figueres</a>
                <p>Tel. <a class="text-white" href="tel:972 503 088">972 503 088</a> </p>
                <p>Fax. <a class="text-white" href="tel:972 505 681">972 505 681</a></p>
                <a class="text-red-200" href="mailto:consell@altemporda.cat"><p>consell@altemporda.cat</p></a>
                </div>
                    
                </div>
            </div>
        </div>
    </div>
    <!-- Footer bottom -->
    <div style="background-color: rgba(0, 0, 0, 0.7);">
        <div class="container mx-auto px-6 lg:px-20 py-6">
            <div class="flex justify-center text-gray-300 mb-1">
                 <span class="font-bold">Consell Comarcal de l'Alt Empordà © 2021</span>
            </div>
            <div class="flex font-light justify-center text-gray-500 text-sm">
                <p>Dissenyat per <span class="font-bold">2DAW</span></p>
            </div>
        </div>
    </div>
</div>