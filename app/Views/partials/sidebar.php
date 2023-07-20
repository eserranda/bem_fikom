<!-- ========== App Menu ========== -->
<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="/" class="logo logo-dark">
            <span class="logo-sm">
                <img src="<?= base_url(); ?>/assets/images/logo-sm.png" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="<?= base_url(); ?>/assets/images/logo-dark.png" alt="" height="17">
            </span>
        </a>
        <!-- Light Logo-->
        <a href="/" class="logo logo-light">
            <span class="logo-sm">
                <img src="<?= base_url(); ?>/assets/images/logo-sm.png" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="<?= base_url(); ?>/assets/images/logo-light.png" alt="" height="17">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
            id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">

            </div>

            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title"><span data-key="t-menu">Menu</span></li>


                <li class="nav-item">
                    <a class="nav-link menu-link" href="#">
                        <i data-feather="home" class="icon-dual"></i> <span data-key="t-dashboards">Dashboards</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="<?= base_url(); ?>/admin/users">
                        <i data-feather="users" class="icon-dual-danger"></i><span>User List</span>

                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="<?= base_url(); ?>/pengurus">
                        <i data-feather="user" class="icon-dual"></i> <span>Pengurus</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="<?= base_url(); ?>/admin/angkatan">
                        <i data-feather="aperture" class="icon-dual-danger"></i> <span>Nama Angkatan</span>
                    </a>
                </li>

                <!-- <li class="nav-item">
                    <a class="nav-link menu-link" href="<?= base_url(); ?>/admin/bendahara">
                        <i data-feather="money" class="icon-dual-danger"></i> <span>Bendahara</span>
                    </a>
                </li> -->



                <li class="menu-title"><i class="ri-more-fill"></i> <span>Keuangan</span></li>

                <!-- <li class="nav-item">
                    <a class="nav-link menu-link collapsed active" href="#sidebarKeuangan" data-bs-toggle="collapse"
                        role="button" aria-expanded="false" aria-controls="sidebarKeuangan">

                        <i class="ri-money-dollar-circle-line"></i> <span>Data Keuangan</span>

                    </a>

                    <div class="collapse menu-dropdown show" id="sidebarKeuangan">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item ">
                                <a href="<?= base_url('/pemasukan_keuangan') ?>" class="nav-link active">Pemasukan
                                    Dana</a>
                            </li>

                            <li class="nav-item">
                                <a href="<?= base_url('keuangan/basar_bulanan') ?>" class="nav-link">Basar Bulanan</a>
                            </li>

                            <li class="nav-item">
                                <a href="<?= base_url('kerohanian/kegiatan') ?>" class="nav-link">Iuran Pengrus</a>
                            </li>

                            <li class="nav-item">
                                <a href="<?= base_url('kerohanian/diakonia') ?>" class="nav-link">Basar
                                    Kreatif</a>
                            </li>

                        </ul>
                    </div>
                </li> -->

                <li class="menu-title"><i class="ri-more-fill"></i> <span>Kesekretariatan</span></li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarKesekretariatan" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarKesekretariatan">
                        <i data-feather="grid" class="icon-dual"></i> <span>Data Kesekretariatan</span>
                    </a>

                    <div class="collapse menu-dropdown" id="sidebarKesekretariatan">
                        <ul class="nav nav-sm flex-column">

                            <li class="nav-item">
                                <a href="<?= base_url('kesekretariatan/inventaris') ?>" class="nav-link">Inventaris
                                    Barang BEM</a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url('arsip/') ?>" class="nav-link">Arsip BEM</a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url('kesekretariatan/pengadaan') ?>" class="nav-link">Pengadaan</a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url('kesekretariatan/peminjaman') ?>" class="nav-link">Peminjaman
                                    Barang</a>
                            </li>


                        </ul>
                    </div>
                </li>


                <li class="menu-title"><i class="ri-more-fill"></i> <span>Humas</span></li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarHumas" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarHumas">
                        <i data-feather="grid" class="icon-dual"></i> <span>Data Humas</span>
                    </a>

                    <div class="collapse menu-dropdown" id="sidebarHumas">
                        <ul class="nav nav-sm flex-column">

                            <li class="nav-item">
                                <a href="<?= base_url('kegiatanhumas/') ?>" class="nav-link">Kegiatan </a>
                            </li>

                        </ul>
                    </div>
                </li>

                <li class="menu-title"><i class="ri-more-fill"></i> <span>Kaderisasi</span></li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarKaderisasi" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarKaderisasi">
                        <i data-feather="grid" class="icon-dual"></i> <span>Data Kaderisasi</span>
                    </a>

                    <div class="collapse menu-dropdown" id="sidebarKaderisasi">
                        <ul class="nav nav-sm flex-column">


                            <li class="nav-item">
                                <a href="<?= base_url('maba/') ?>" class="nav-link">Data Mahasiswa Baru</a>
                            </li>

                            <li class="nav-item">
                                <a href="<?= base_url('kaderisasi/anggota') ?>" class="nav-link">Data Anggota </a>
                            </li>

                            <li class="nav-item">
                                <a href="<?= base_url('alumni/') ?>" class="nav-link">Data Alumni </a>
                            </li>

                            <li class="nav-item">
                                <a href="<?= base_url('kegiatankaderisasi/') ?>" class="nav-link">Kegiatan </a>
                            </li>

                        </ul>
                    </div>
                </li>

                <li class="menu-title"><i class="ri-more-fill"></i> <span>Keilmuan</span></li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarKeilmuan" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarKeilmuan">
                        <i data-feather="grid" class="icon-dual"></i> <span>Data Keilmuan</span>
                    </a>

                    <div class="collapse menu-dropdown" id="sidebarKeilmuan">
                        <ul class="nav nav-sm flex-column">

                            <li class="nav-item">
                                <a href="<?= base_url('keilmuan/inventaris') ?>" class="nav-link">Inventaris
                                    Workshop</a>
                            </li>

                            <li class="nav-item">
                                <a href="<?= base_url('keilmuan/arsip_keilmuan/') ?>" class="nav-link">Arsip
                                    Workshop</a>
                            </li>

                            <li class="nav-item">
                                <a href="<?= base_url('keilmuan/kegiatan') ?>" class="nav-link">Kegiatan</a>
                            </li>

                            <li class="nav-item">
                                <a href="<?= base_url('keilmuan/dana_kreatif') ?>" class="nav-link">Dana Kreatif</a>
                            </li>

                        </ul>
                    </div>
                </li>

                <li class="menu-title"><i class="ri-more-fill"></i> <span>Kerohanian</span></li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarKerohanian" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarKerohanian">
                        <i data-feather="grid" class="icon-dual"></i> <span>Data Kerohanian</span>
                    </a>

                    <div class="collapse menu-dropdown" id="sidebarKerohanian">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="<?= base_url('ibadahbulanan/') ?>" class="nav-link">Rekap Ibadah Bulanan</a>
                            </li>

                            <li class="nav-item">
                                <a href="<?= base_url('kerohanian/diakonia') ?>" class="nav-link">Diakonia</a>
                            </li>

                            <li class="nav-item">
                                <a href="<?= base_url('kerohanian/kegiatan') ?>" class="nav-link">Kegiatan</a>
                            </li>

                        </ul>
                    </div>
                </li>



            </ul>
        </div>
        <!-- Sidebar -->
    </div>

    <div class="sidebar-background"></div>
</div>
<!-- Left Sidebar End -->
<!-- Vertical Overlay-->
<div class="vertical-overlay"></div>