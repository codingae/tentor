<div class="header header-standard">
  <div class="header-topbar">
    <div class="container">
      <div class="header-topbar-left">
        <ol class="breadcrumb">
          <li><a href="index.htm">Home</a></li>
          <li><a href="#">Tentor</a></li>
          <li class="active">Alamat</li>
        </ol>
      </div><!-- /.header-topbar-left -->
      <div class="header-topbar-right">
        <ul class="header-topbar-social ml30">
          <li><a href="#"><i class="fa fa-facebook"></i></a></li>
          <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
          <li><a href="#"><i class="fa fa-twitter"></i></a></li>
        </ul><!-- /.header-topbar-social -->
      </div><!-- /.header-topbar-right -->
    </div><!-- /.container -->
  </div><!-- /.header-topbar -->
  <div class="container">
    <div class="header-inner">
      <div class="header-main">
        <div class="header-title">
          <a href="./">
            <img src="assets/img/logo.png" alt="Realsite">
            <span>Aplikasi Tentor</span>
          </a>
        </div><!-- /.header-title -->

        <div class="header-navigation">
          <div class="nav-main-wrapper">
            <div class="nav-main-title visible-xs">
              <a href="./">
                <img src="assets/img/logo-blue.png" alt="Realsite">
                Aplikasi Tentor
              </a>
            </div><!-- /.nav-main-title -->

            <div class="nav-main-inner">
              <nav>
                <ul id="nav-main" class="nav nav-pills">
                  <li class="has-children ">
                    <a href="layanan">Layanan </a>
                  </li>

                  <li class="has-children ">
                    <a href="#">testimoni </a>
                  </li>
                  <li class="has-children ">
                    <a href="#">How It Work </a>
                  </li>
                  <li class="important">
                    <a href="login">Masuk</a>
                  </li>
                </ul><!-- /.nav -->
              </nav>
            </div><!-- /.nav-main-inner -->
          </div><!-- /.nav-main-wrapper -->
          
          <button type="button" class="navbar-toggle">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div><!-- /.header-navigation -->
      </div><!-- /.header-main -->
      <?php 
        $tentor = (!empty($_GET['tentor'])) ? $_GET['tentor'] : "kosong";
        if ($tentor=="kosong") {
          ?>
            <a class="header-action" href="daftar" title="Daftar">
              <i class="fa fa-plus"></i>
            </a><!-- /.header-action -->
          <?php
        }else{
          
        }
      ?>
    </div><!-- /.header-inner -->
  </div><!-- /.container -->
</div><!-- /.header-->