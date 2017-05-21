    <div class="admin-content-footer">
                <div class="admin-content-footer-inner">
                    <div class="container-fluid">
                        <div class="admin-content-footer-left">
                            &copy; 2017 Aplikasi Tentor
                        </div><!-- /.admin-content-footer-left -->

                        <div class="admin-content-footer-right">
                            <a href="http://www.codingae.blogspot.com">Dibuat dengan <span class="fa fa-heart text-danger"></span> oleh skripsi_cxdne</a>
                        </div><!-- /.admin-content-footer-right -->
                    </div><!-- /.container-fluid -->
                </div><!-- /.admin-content-footer-inner -->
            </div><!-- /.admin-content-footer -->
        </div><!-- /.admin-content-inner -->
    </div><!-- /.admin-content -->
    <?php 
        if (isset($_SESSION['id_user'])) {
            
        }else{
        ?>
            <div class="admin-sidebar-secondary">
                <div class="admin-sidebar-secondary-inner">
                    <div class="admin-sidebar-secondary-inner-top">
                        <h1>Admin Aplikasi Tentor</h1>
                        <div class="form-group">
                            <input type="text" class="form-control" name="uname" id="uname" placeholder="Username">
                        </div><!-- /.form-group -->
                        <div class="form-group">
                            <input type="password" class="form-control" name="pass" id="pass" placeholder="Password">
                        </div><!-- /.form-group -->
                        <button type="submit" name="btnlogin" id="btnlogin" class="btn btn-xl pull-right" onclick="check_login()">Masuk</button>
                    </div><!-- /.admin-sidebar-secondary-inner-top -->
                    <div class="admin-sidebar-secondary-inner-bottom">
                        <div class="admin-sidebar-footer">
                            <div class="admin-sidebar-info">
                                <strong>Fitur Tambahan</strong>

                                <ul>
                                    <li><a href="#!">Daftar</a></li>
                                    <li><a href="#!">Lupa Password</a></li>
                                    <li><a href="#!">Bantuan</a></li>
                                </ul>
                            </div><!-- /.admin-landing -->

                            <p>
                                &copy; 2017 Aplikasi Tentor <br><a href="http://www.codingae.blogspot.com">Dibuat dengan <span class="fa fa-heart text-danger"></span> oleh skripsi_cxdne</a>
                            </p>
                        </div><!-- /.admin-landing-content-footer -->
                    </div><!-- /.admin-sidebar-secondary-inner-bottom -->
                </div><!-- /.admin-sidebar-secondary-inner -->
            </div><!-- /.admin-sidebar-secondary -->
        <?php            
        }
    ?>

</div><!-- /.admin-landing-wrapper -->

    
    <script type="text/javascript" src="assets/libraries/jquery-transit/jquery.transit.js"></script>

    <script type="text/javascript" src="assets/libraries/bootstrap/assets/javascripts/bootstrap/transition.js"></script>
    <script type="text/javascript" src="assets/libraries/bootstrap/assets/javascripts/bootstrap/dropdown.js"></script>
    <script type="text/javascript" src="assets/libraries/bootstrap/assets/javascripts/bootstrap/collapse.js"></script>
    <script type="text/javascript" src="assets/libraries/bootstrap-select/dist/js/bootstrap-select.min.js"></script>

    <script src="assets/libraries/fileinput/js/plugins/canvas-to-blob.min.js" type="text/javascript"></script>
    <script src="assets/libraries/fileinput/js/fileinput.js" type="text/javascript"></script>

    <script type="text/javascript" src="assets/libraries/autosize/jquery.autosize.js"></script>
    <script type="text/javascript" src="assets/libraries/isotope/dist/isotope.pkgd.min.js"></script>
    <script type="text/javascript" src="assets/libraries/OwlCarousel/owl-carousel/owl.carousel.min.js"></script>
    <script type="text/javascript" src="assets/libraries/jquery.scrollTo/jquery.scrollTo.min.js"></script>
    <?php 
        if ($tentor=="pengguna") {
            
        }else{
            ?>
                <script src="http://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyCL76rVshr5mzm9bOgZEtBVtIHhAsd1R6A"></script>
            <?php
        }
    ?>
    <script type="text/javascript" src="assets/libraries/jquery-google-map/infobox.js"></script>
    <script type="text/javascript" src="assets/libraries/jquery-google-map/markerclusterer.js"></script>
    <script type="text/javascript" src="assets/libraries/jquery-google-map/jquery-google-map.js"></script>

    <script type="text/javascript" src="assets/libraries/nvd3/lib/d3.v3.js"></script>
    <script type="text/javascript" src="assets/libraries/nvd3/nv.d3.min.js"></script>
    <script type="text/javascript" src="assets/libraries/nvd3/examples/stream_layers.js"></script>

    <script type="text/javascript" src="assets/js/realsite-admin.js"></script>
    <script type="text/javascript" src="assets/js/map.js"></script>
    
    <?php 
        if (isset($level_sess) && isset($row1['foto'])) {
            ?>
                <script>
                    $("#file").fileinput({
                        overwriteInitial: true,
                        maxFileSize: 1500,
                        showClose: false,
                        showCaption: false,
                        browseLabel: '',
                        removeLabel: '',
                        browseIcon: '<i class="glyphicon glyphicon-folder-open"></i>',
                        removeIcon: '<i class="glyphicon glyphicon-remove"></i>',
                        removeTitle: 'Hapus Foto',
                        elErrorContainer: '#kv-avatar-errors-1',
                        msgErrorClass: 'alert alert-block alert-danger',
                        defaultPreviewContent: '<img src="<?php echo $row1['foto']; ?>" alt="Avatar" style="width:160px">',
                        layoutTemplates: {main2: '{preview} ' +  ' {remove} {browse}'},
                        allowedFileExtensions: ["jpg", "png", "gif"]
                    });
                </script>
            <?php
        }
        else{
            ?>
                <script>
                    $("#file").fileinput({
                        overwriteInitial: true,
                        maxFileSize: 1500,
                        showClose: false,
                        showCaption: false,
                        browseLabel: '',
                        removeLabel: '',
                        browseIcon: '<i class="glyphicon glyphicon-folder-open"></i>',
                        removeIcon: '<i class="glyphicon glyphicon-remove"></i>',
                        removeTitle: 'Hapus Foto',
                        elErrorContainer: '#kv-avatar-errors-1',
                        msgErrorClass: 'alert alert-block alert-danger',
                        defaultPreviewContent: '<img src="assets/img/default_avatar.jpg" alt="Avatar" style="width:160px">',
                        layoutTemplates: {main2: '{preview} ' +  ' {remove} {browse}'},
                        allowedFileExtensions: ["jpg", "png", "gif"]
                    });
                </script>
            <?php
        }
    ?>

    <script>
    /*cek ketersediaan uname*/
    $(document).ready(function(){
        $('#uname').blur(function(){
            $('#cek_uname').html('<img style="margin-left:10px; width:10px" src="assets/img/loading.gif">');
            var uname = $(this).val();
            $.ajax({
                type    : 'POST',
                url     : 'view/proses.php',
                data    : 'uname='+uname,
                success : function(data){
                    $('#cek_uname').html(data);
                }
            })
        });
        $('#pass').blur(function(){
            $('#cek_pass').html('<img style="margin-left:10px; width:10px" src="assets/img/loading.gif">');
            var pass = $(this).val();
            $.ajax({
                type    : 'POST',
                url     : 'view/proses.php',
                data    : 'pass='+pass,
                success : function(data){
                    $('#cek_pass').html(data);
                }
            })
        });
    });
    </script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.15/js/dataTables.jqueryui.min.js"></script>    
    <script>
        $(document).ready(function() {
            $('#ss').DataTable( {
                "processing": true,
                "serverSide": true,
                "ajax": "http://localhost/tentor/view/admin/dt_pengguna.php"
            } );
        } );
    </script>
    <script>
        function check_login()
        {
            var username  = $('#uname').val();
            var password  = $('#pass').val();
            var url_login = 'cekadmin';
            document.getElementById('btnlogin').innerText= "Tunggu..";
            $.ajax({
                url     : url_login,
                data    : 'var_uname='+username+'&var_pass='+password, 
                type    : 'POST',
                dataType: "html",
                success : function(cek_isi){
                    if($.trim(cek_isi)=="ok"){
                        $('.admin-sidebar-secondary button').click(function(e) {
                            e.preventDefault();
                            $('body').addClass('open');
                            $('.admin-sidebar-secondary').animate({
                                'display': 'none'
                            }, 1250, function() {
                                $('.admin-sidebar-secondary').css('display', 'none');
                                createChart();
                            });
                        });
                        if ($('body').hasClass('hide-secondary-sidebar')) {
                            createChart();
                        }
                        setTimeout(function(){
                           window.location.reload(1);
                        }, 4000);
                    }else if($.trim(cek_isi)=="kosong"){
                        Lobibox.notify('error', {
                            continueDelayOnInactiveTab: true,
                            showClass: 'fadeInDown',
                            hideClass: 'fadeUpDown',
                            size: 'mini',
                            position: 'center top',
                            msg: "Username atau Password Anda Salah"
                        });
                        document.getElementById('btnlogin').innerText= "Coba Lagi?";
                    }else{

                    }
                },
            });      
        }
    </script>
