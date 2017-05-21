<div class="sidebar col-sm-4 col-md-3">
    <div class="widget">
        <div class="widget-title">
            <h2>Tentor Terbaik</h2>
        </div><!--/.widget-title -->
        <?php 
            $query_tentor_terbaik = mysqli_query($koneksi,"select * from view_user where level='tentor_lbb' || level = 'tentor_luar' limit 3");
            while ($row_tentor_tebaik = mysqli_fetch_array($query_tentor_terbaik)) {            
        ?>
        <div class="widget-content">
            <div class="agent-small">
                <div class="agent-small-inner">
                    <div class="agent-small-image">
                        <a href="#" class="agent-small-image-inner">
                            <img src="<?= $row_tentor_tebaik['foto'] ?>" alt="">
                        </a><!-- /.agent-small-image-inner -->
                    </div><!-- /.agent-small-image -->

                    <div class="agent-small-content">
                        <h3 class="agent-small-title">
                            <a href="#"><?= $row_tentor_tebaik['nama_lengkap'] ?></a>
                        </h3>

                        <div class="agent-small-email">
                            <i class="fa fa-at"></i> <a href="#"><?= $row_tentor_tebaik['email'] ?></a>
                        </div><!-- /.agent-small-email -->

                        <div class="agent-small-phone">
                            <i class="fa fa-phone"></i> <?= substr($row_tentor_tebaik['no_telp'], 0,8).str_replace(substr($row_tentor_tebaik['no_telp'], 9,16), "*****", substr($row_tentor_tebaik['no_telp'], 9,16)) ?>
                        </div><!-- /.agent-small-phone -->
                    </div><!-- /.agent-small-content -->
                </div><!-- /.agent-small-inner -->
            </div><!-- /.agent-small -->
        </div><!-- /.widget-content -->
        <?php } ?>
    </div><!-- /.widget -->

    <div class="widget">
        <div class="widget-title">
            <h2>Cari Tentor</h2>
        </div><!-- /.widget-title -->

        <div class="widget-content">
            <form method="post" action="#!">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Keyword">
                </div><!-- /.form-group -->

                <div class="form-group">
                    <select name="property">
                        <option>Property Type</option>
                        <option>Apartment</option>
                        <option>Condo</option>
                        <option>House</option>
                        <option>Villa</option>
                    </select>
                </div><!-- /.form-group -->

                <div class="form-group">
                    <select name="contract">
                        <option>Contract</option>
                        <option>Rent</option>
                        <option>Sale</option>
                    </select>
                </div><!-- /.form-group -->

                <div class="form-group">
                    <select name="location">
                        <option>Location</option>
                        <option>Kensal</option>
                        <option>Braymer</option>
                        <option>Horton Bay</option>
                        <option>Laurel Run</option>
                        <option>Estherville</option>
                        <option>Millhousen</option>
                        <option>Allegan</option>
                        <option>Florala</option>
                        <option>Dundarrach</option>
                        <option>Neligh</option>
                        <option>Roseboro</option>
                        <option>Mount Pleasant</option>
                        <option>Moro</option>
                        <option>Strathmoor Village</option>
                        <option>Mabton</option>
                        <option>Loup City</option>
                        <option>Wolverine</option>
                        <option>San Leandro</option>
                        <option>Dunwoody</option>
                        <option>Battle Ground</option>
                        <option>Hanson</option>
                        <option>Reedley</option>
                        <option>Bayshore</option>
                        <option>Tupelo</option>
                        <option>Lone Pine</option>
                    </select>
                </div><!-- /.form-group -->

                <button class="btn btn-lg btn-block">Search</button>
            </form>
        </div><!-- /.widget-content -->
    </div><!-- /.widget -->
</div><!-- /.sidebar -->