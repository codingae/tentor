<script src="http://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyCL76rVshr5mzm9bOgZEtBVtIHhAsd1R6A&mode=driving"></script>
<script type="text/javascript" src="assets/js/jquery.js"></script>
<link rel="stylesheet" type="text/css" href="assets/libraries/bootstrap-select/dist/css/bootstrap-select.min.css">
<?php 
    include_once "_partial/pilih_tentor.php";
?>
<div class="map-wrapper" onload="initialize()">
    <div id="map-tentor" class="map" data-transparent-marker-image="assets/img/transparent-marker-image.png">
    </div><!-- /.map -->

    <div class="map-filter-horizontal">
        <div class="container">
            <form method="post" action="">
                <div class="row">
                    <div class="form-group col-sm-3">
                        <input type="text" class="form-control" name="nama" placeholder="Cari Berdasarkan Nama">
                    </div><!-- /.form-group -->

                    <div class="form-group col-sm-3">
                        <select name="jenjang">
                            <option value="">Pilih Jenjang</option>
                            <option value="sd">SD</option>
                            <option value="smp">SMP</option>
                            <option value="sma">SMA</option>
                        </select>
                    </div><!-- /.form-group -->

                    <div class="form-group col-sm-3">
                        <select name="alamat">
                            <option value="">Pilih Wilayah</option>
                            <option value="Bandar Kedungmulyo">Bandar Kedungmulyo</option>
                            <option value="Bareng">Bareng</option>
                            <option value="Diwek">Diwek</option>
                            <option value="Gudo">Gudo</option>
                            <option value="Jogoroto">Jogoroto</option>
                            <option value="Jombang">Jombang</option>
                            <option value="Kabuh">Kabuh</option>
                            <option value="Kesamben">Kesamben</option>
                            <option value="Kudu">Kudu</option>
                            <option value="Megaluh">Megaluh</option>
                            <option value="Mojoagung">Mojoagung</option>
                            <option value="Mojowarno">Mojowarno</option>
                            <option value="Ngoro">Ngoro</option>
                            <option value="Ngusikan">Ngusikan</option>
                            <option value="Perak">Perak</option>
                            <option value="Peterongan">Peterongan</option>
                            <option value="Plandaan">Plandaan</option>
                            <option value="Ploso">Ploso</option>
                            <option value="Sumobito">Sumobito</option>
                            <option value="Tembelang">Tembelang</option>
                            <option value="Wonosalam">Wonosalam</option>
                        </select>
                    </div><!-- /.form-group -->

                    <div class="form-group col-sm-3">
                        <button type="submit" class="btn form-control" style="width: 100%;height: 100%;color: white" name="cari_tentor">Cari</button>
                    </div><!-- /.form-group -->
                </div><!-- /.row -->
            </form>
        </div><!-- /.container -->
    </div><!-- /.map-filter-horizontal -->
</div><!-- /.map-wrapper -->
<div class="fullwidth background-grey background-map block center mb0">
    <div class="container">
        <h1>Biaya Hemat Prestasi Dahsyat</h1>

        <div class="circle-colors">
            <div class="circle-color circle-color-red"></div>
            <div class="circle-color circle-color-pink"></div>
            <div class="circle-color circle-color-deep-purple"></div>
            <div class="circle-color circle-color-indigo"></div>
            <div class="circle-color circle-color-blue"></div>
            <div class="circle-color circle-color-light-blue"></div>
            <div class="circle-color circle-color-cyan"></div>
            <div class="circle-color circle-color-teal"></div>
            <div class="circle-color circle-color-green"></div>
            <div class="circle-color circle-color-light-green"></div>
            <div class="circle-color circle-color-lime"></div>
            <div class="circle-color circle-color-yellow"></div>
            <div class="circle-color circle-color-amber"></div>
            <div class="circle-color circle-color-orange"></div>
            <div class="circle-color circle-color-deep-orange"></div>
            <div class="circle-color circle-color-deep-orange"></div>
            <div class="circle-color circle-color-brown"></div>
            <div class="circle-color circle-color-blue-grey"></div>
        </div><!-- /.circle-colors -->
    </div><!-- /.container -->
</div>