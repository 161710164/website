<aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="#">
                    <img src="/assets/admin/images/icon/logo.png" alt="Cool Admin" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li class="active has-sub">
                            <a class="js-arrow" href="#">
                            <i class="fas fa-copy"></i>Artikel</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="{{ route('artikel.index') }}">Artikel</a>
                                </li>
                                <li>
                                    <a href="{{ route('kategori.index') }}">Kategori Artikel</a>
                                </li>
                                </ul>
                        </li>
                        <li class="active has-sub">
                            <a class="js-arrow" href="#">
                            <i class="fas fa-archive"></i>Fasilitas</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="{{ route('fasilitas.index') }}">Fasilitas</a>
                                </li>
                                <li>
                                    <a href="{{ route('kategorif.index') }}">Kategori Fasilitas</a>
                                </li>
                                </ul>
                        </li>
                        <li class="active has-sub">
                            <a class="js-arrow" href="#">
                            <i class="fas fa-image"></i>Galeri</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                    <li>
                                        <a href="{{ route('galeri.index') }}">Galeri</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('kategorig.index') }}">Kategori Galeri</a>
                                    </li>
                                </ul>
                        </li>
                        <li>
                            <a href="{{ route('staf.index') }}">
                                <i class="fas fa-address-book"></i>Staf</a>
                        </li>
                        
                        
                        <li>
                            <a href="{{ route('ekskul.index') }}">
                                <i class="fas fa-futbol"></i>Ekstrakulikuler</a>
                        </li>

                        <li>
                            <a href="{{ route('prestasi.index') }}">
                                <i class="fas fa-chess-rook"></i>Prestasi</a>
                        </li>
                        
                        <li>
                            <a href="{{ route('guru.index') }}">
                                <i class="fas fa-user"></i>Guru</a>
                        </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>