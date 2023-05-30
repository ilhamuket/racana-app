<header>
    <!-- Header Start -->
   <div class="header-area">
        <div class="main-header ">
            <div class="header-mid d-none d-md-block">
               <div class="container">
                    <div class="row d-flex align-items-center">
                        <!-- Logo -->
                        <div class="col-xl-3 col-lg-3 col-md-3">
                            <div class="logo">
                                <a href="/"><img src="build/img/trending/logo.png" alt=""></a>
                            </div>
                        </div>
                        <div class="col-xl-9 col-lg-9 col-md-9">
                            <div class="header-banner f-right ">
                               <a href="{{ route('join') }}"> <img  src="assets/img/trending/join.png" alt=""></a>
                            </div>
                        </div>
                       
                    </div>
               </div>
            </div>
           <div class="header-bottom header-sticky">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-12 col-lg-12 col-md-12 header-flex">
                            <!-- sticky -->
                                <div class="sticky-logo">
                                    <a href="index.html"><img src="build/img/trending/logo.png" alt=""></a>
                                </div>
                            <!-- Main-menu -->
                            <div class="main-menu d-none d-md-block">
                                <nav>                  
                                    <ul id="navigation">    
                                        <li><a href="/">BERANDA</a></li>
                                        <li><a href="{{ route('profil') }}">PROFIL AMBACANA</a>
                                            <ul class="submenu">
                                                <li><a href="{{ route('tekpram') }}">LOGO AMBACANA</a></li>
                                                <li><a href="{{ route('kir') }}">PRAMUKA ARS</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="{{ route('mars') }}">SANDI AMBACANA</a></li>
                                        <li><a href="{{ route('logo') }}">ADMINISTRASI PRAMUKA ARS</a>
                                            <ul class="submenu">
                                                <li><a href="{{ route('bidang') }}">AD & ART</a></li>
                                                <li><a href="{{ route('kir') }}">PRAMUKA ARS</a></li>
                                                <li><a href="{{ route('tekpram') }}">DATA POTENSI</a></li>
                                                <li><a href="{{ route('lokasi') }}">STRUKTUR KEPENGURUSAN</a>
                                                    <ul class="submenu">
                                                        <li><a href="{{ route('bidang') }}">GUGUS DEPAN</a></li>
                                                        <li><a href="{{ route('kir') }}">DEWAN AMBALAN</a></li>
                                                        <li><a href="{{ route('kir') }}">DEWAN RACANA</a></li>
                                                    </ul>
                                                </li>
                                            </ul></li>
                                            <li><a href="{{ route('mars') }}">UNIT PENGEMBANGAN</a>
                                                <ul class="submenu">
                                                    <li><a href="{{ route('bidang') }}">UNIT PROTOKOLER</a></li>
                                                    <li><a href="{{ route('kir') }}">UNIT SEARCH AND RESCUE</a></li>
                                                    <li><a href="{{ route('kir') }}">UNIT MEDIA PERS DAN KOMINFO</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="{{ route('mars') }}">PROGRAM KERJA</a></li>
                                            <li><a href="{{ route('mars') }}">PRESTASI</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>             
                        <!-- Mobile Menu -->
                        <div class="col-12">
                            <div class="mobile_menu d-block d-md-none"></div>
                        </div>
                    </div>
                </div>
           </div>
        </div>
   </div>
    <!-- Header End -->
</header>