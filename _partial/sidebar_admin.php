
<div class="admin-navigation">
        <div class="admin-navigation-inner">                
            <nav>
                <ul class="menu">
                    <li class="avatar">
                        <a href="#">
                            <!-- <img src="assets/img/tmp/agents/female.jpg" alt=""> -->
                            <span class="avatar-content">
                                <span class="avatar-title"><?= ucwords($r['nama_lengkap']) ?></span>
                                <span class="avatar-subtitle"><?= base64_decode($_SESSION['level']) ?></span>
                            </span><!-- /.avatar-content -->
                        </a>
                    </li>

                    <li class="">
                        <a href="admin"><strong><i class="fa fa-dashboard"></i></strong> <span>Dashboard</span></a>
                    </li>

                    <li class="">
                        <a href="pengguna"><strong><i class="fa fa-users"></i></strong> <span>Pengguna</span></a>
                    </li>

                    <li class="">
                        <a href="aktifitas"><strong><i class="fa fa-briefcase"></i></strong> <span>Aktifitas User</span></a>
                    </li>

                    <li class="">
                        <a href="validasi"><strong><i class="fa fa-file"></i></strong> <span>Validasi Dokumen</span></a>
                    </li>
                    
                    <li class="">
                        <a href="lowongan"><strong><i class="fa fa-pencil"></i></strong> <span>Lowongan</span></a>
                    </li>

                    <!-- <li class="">
                        <a href="#!"><strong><i class="fa fa-building"></i></strong> <span>Properties</span></a>
                    </li>
                    
                    <li class="">
                        <a href="#!"><strong><i class="fa fa-th-list"></i></strong> <span>Property Browser</span></a>
                    </li>
                    
                    <li class="">
                        <a href="#!"><strong><i class="fa fa-globe"></i></strong> <span>Google Map</span></a>
                    </li> -->

                    <li>
                        <a href="keluar"><strong><i class="fa fa-sign-out"></i></strong> <span>Keluar</span></a>
                    </li>
                </ul>
            </nav>

            <div class="projects">
                <h2>Quotes</h2>
                <h2><b><i>"Sifat orang yang berlilmu tinggi adalah merendahkan hati kepada manusia dan takut kepada Tuhan."</i></b></h2>                    
            </div><!-- /.projects -->
            <div class="layer"></div>
        </div><!-- /.admin-navigation-inner -->
    </div><!-- /.admin-navigation -->