<script>
	var marker;
      function initialize() {
          
        // Variabel untuk menyimpan informasi (desc)
        var infoWindow = new google.maps.InfoWindow;
        
        //  Variabel untuk menyimpan peta Roadmap
        var mapOptions = {
          mapTypeId: google.maps.MapTypeId.ROADMAP,
        } 
        // Pembuatan petanya
        var map = new google.maps.Map(document.getElementById('map-tentor'), mapOptions);
              
        // Variabel untuk menyimpan batas kordinat
        var bounds = new google.maps.LatLngBounds();

        // Pengambilan data dari database
        <?php
            if (isset($_POST['cari_tentor'])) {
                $nama    = $_POST['nama'];
                $alamat  = $_POST['alamat'];
                $jenjang = $_POST['jenjang'];
                if (empty($nama) && empty($alamat) && empty($jenjang)) {
                    $query_maps = mysqli_query($koneksi,"select     * from view_pilih_tentor where (level='tentor_lbb' || level='tentor_luar') && status_keahlian !='tolak' GROUP BY uname");
                    while ($data = mysqli_fetch_array($query_maps))
                    {
                        $nama = ucfirst($data['uname']);
                        $lat  = $data['lattitude'];
                        $lon  = $data['longtitude'];
                        $id_user = base64_encode($data['id_user']);
                        $alamat = ucfirst($data['alamat']);
                        echo ("addMarker($lat, $lon, '<b>$nama<br>$alamat <br> <a href=\'profil&kode&$id_user\'>Lihat Detail</a></b>');\n");                        
                    }
                }else{
                    $query_maps = mysqli_query($koneksi,"select * from view_pilih_tentor where (level='tentor_lbb' || level='tentor_luar') && (status_keahlian='belum' || status_keahlian ='verified') && uname LIKE '%".$nama."%' && alamat LIKE '%".$alamat."%' && jenjang='$jenjang' GROUP BY uname");
                    if (mysqli_num_rows($query_maps)>0) {
                        while ($data = mysqli_fetch_array($query_maps))
                        {
                            $id_user = base64_encode($data['id_user']);
                            $nama = ucfirst($data['uname']);
                            $lat  = $data['lattitude'];
                            $lon  = $data['longtitude'];
                            // $nama_lengkap = $data['nama_lengkap'];
                            $alamat = ucfirst($data['alamat']);
                            echo ("addMarker($lat, $lon, '<b>$nama<br>$alamat<br> <a href=\'profil&kode&$id_user\'>Lihat Detail</a></b>');\n");                        
                        }                    
                    }else{
                        echo ("addMarker(-7.546839499999997, 112.22647940000002,'Tentor Tidak Tersedia')");
                    }
                }
            }else{
                $query_maps = mysqli_query($koneksi,"select * from view_pilih_tentor where (level='tentor_lbb' || level='tentor_luar') && status_keahlian !='tolak' GROUP BY uname");
                while ($data = mysqli_fetch_array($query_maps))
                {
    				$nama = ucfirst($data['uname']);
    				$lat  = $data['lattitude'];
    				$lon  = $data['longtitude'];
                    $id_user = base64_encode($data['id_user']);
                    $alamat = ucfirst($data['alamat']);
                    echo ("addMarker($lat, $lon, '<b>$nama<br>$alamat <br> <a href=\'profil&kode&$id_user\'>Lihat Detail</a></b>');\n");                        
                }                
            }
          ?>
          
        // Proses membuat marker 
        function addMarker(lat, lng, info) {
            var lokasi = new google.maps.LatLng(lat, lng);
            bounds.extend(lokasi);
            var marker = new google.maps.Marker({
                map: map,
                position: lokasi,
				animation:google.maps.Animation.BOUNCE,
				<?php
                if (mysqli_num_rows($query_maps)>0) {
                    echo "icon:'assets/img/marker1.png'";
                }else{
                    echo "icon:'assets/img/market_gagal.png'";
                }
                ?>
            });       
            // map.setZoom(map.getZoom() + 2);
            map.fitBounds(bounds);
            bindInfoWindow(marker, map, infoWindow, info);
         }
        
        // Menampilkan informasi pada masing-masing marker yang diklik
        function bindInfoWindow(marker, map, infoWindow, html) {
          google.maps.event.addListener(marker, 'click', function() {
            infoWindow.setContent(html);
            infoWindow.open(map, marker);
          });
        }
 	
        }
      google.maps.event.addDomListener(window, 'load', initialize);
    
</script>