<!-- Banner Image  -->
<?php
$dbh = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Check connection
if (!($dbh)) {
  echo "Failed to connect to MySQL: " . mysqli_error($dbh);
  exit();
}
?>
<style>
  .banner-image {
    background-image: url('<?= BASEURL; ?>/img/background1.jpeg');
    background-size: cover;
    /*filter: blur(8px);
      -webkit-filter: blur(8px);*/
  }

  h1 {
    text-shadow: 3px 3px 6px #000000;
  }
</style>
<div class="banner-image w-100 vh-100 d-flex justify-content-center align-items-center">
  <div class="content text-center">
    <h1>CARI CABANG, AGEN</h1>
    <h1>TERDEKAT DENGAN ANDA</h1>
  </div>
</div>

<!-- Main Content Area -->
<div class="container my-5 d-grid gap-5">
  <div class="p-5 border maping">
    <h4 class="font-weight-normal judulmap" style="text-align: center; color: #001c50;">
      Lokasi Baraka di Sekitar Anda
    </h4>
    <div id="mapin" class="maps">
      <script>
        var map = L.map('mapin').setView([-1.3889, 117.3141], 5);
        // var tileUrl = ;
        // var attribute = ;
        var tiles = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
          attribution: 'Map data &copy;<a href="https://www.openstreetmap.org">OpenStreetMap</a>,' + ' license Under<a href="https://www.openstreetmap.org/copyright"> ODbl.</a>'
        });
        tiles.addTo(map);

        //GEOJSON//
        var markers = L.markerClusterGroup();
        map.addLayer(markers);

        var controlSearch = new L.Control.Search({
          position: 'topright',
          layer: markers,
          initial: false,
          zoom: 19,
          marker: false
        });

        map.addControl(controlSearch);
        /////////////////////////
        var addressPoints =
          <?= json_encode($data['map_data']); ?>;

        for (var i = 0; i < addressPoints.length; i++) {
          var a = addressPoints[i];
          var title = '<a href="' + a['ext'] + '" target="blank">' + a['namcab'] + '</a>';
          if(a['lat'] != '-' || a['long'] != '-'){
              
          var marker = L.marker(new L.LatLng(a['lat'], a['long']), {
            title: title
          });
          marker.bindPopup(title);
          markers.addLayer(marker);
          }
        }
        //map.addLayer(markers);
      </script>
    </div>
    <br>
    <form action="" method="POST">
      <div class="input-group mb-3">
        <input type="text" class="form-control form-control-lg" placeholder="Cari cabang..." aria-label="Cari cabang" name="cabs" aria-describedby="button-addon2" required>
        <button class="btn bg-primary text-white" id="button-addon2" autofocus>Cari Cabang</button>
      </div>
      <?php
      if (isset($_POST['cabs'])) {

        $param = $_POST['cabs'];
        $result = mysqli_query($dbh, "SELECT * FROM `isi_cabang` WHERE `alamat` LIKE '%$param%' AND `nama_cabang` LIKE '%$param%' AND `status` LIKE 'aktiv'") or die(mysqli_error($dbh));
        if ($param == '') {
      ?>
          <br>
          <h4 class="d-flex display-6 justify-content-center align-items-center fw-semibold text-warning"> INPUT KOSONG</h4>
        <?php
        } else if (strlen($param) < 4) {
        ?>
          <br>
          <h4 class="d-flex display-6 justify-content-center align-items-center fw-semibold text-warning"> INPUT KURANG</h4>
        <?php
        } else if (mysqli_num_rows($result) == 0) {
          echo '<br>
          <h4 class="d-flex display-6 justify-content-center align-items-center fw-semibold text-warning"> ALAMAT/CABANG YANG YANG ANDA CARI TIDAK ADA</h4>';
        } else {
        ?>
          <br>
          <table class="table table-sm table-hover" id="searhc">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Cabang</th>
                <th>ALamat</th>
                <th>No.tlp</th>
                <th>Penerimaan</th>
                <th>Pengiriman</th>
                <th>map</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $n = 1;
              while ($hasil = mysqli_fetch_assoc($result)) { ?>
                <tr>
                  <td><?= $n++; ?>.</td>
                  <td><?= $hasil['nama_cabang']; ?></td>
                  <td><?= $hasil['alamat']; ?></td>
                  <td class="fw-bold"><?= $hasil['no_tlp']; ?></td>
                  <?php
                  if ($hasil['recieve'] == 'n') {
                    $isirec = '<i class="fas fa-times" style="color:#F46000;"></i>';
                  } else {
                    $isirec = '<i class="fas fa-check" style="color:#1FE100;"></i>';
                  }
                  if ($hasil['delivere'] == 'n') {
                    $isidel = '<i class="fas fa-times" style="color:#F46000;"></i>';
                  } else {
                    $isidel = '<i class="fas fa-check" style="color:#1FE100;"></i>';
                  }
                  ?>
                  <td><?= $isirec; ?></td>
                  <td><?= $isidel; ?></td>
                  <td>
                    <?php
                    if (empty($hasil['map']) || $hasil['map'] == "-") {
                      echo '<i class="fas fa-earth-asia" style="color:#878787 ;" disabled></i>';
                    } else {
                      echo '<a href="' . $hasil['map'] . '" target="blank" style="color:#01BF57 ;">
                            <i class="fas fa-earth-asia" disabled></i>
                            </a>';
                    }
                    ?>
                  </td>
                </tr>
              <?php
              }
              ?>
            </tbody>
          </table>
      <?php
        }
      }
      ?>
    </form>
  </div>
  <div class="container">
    <h2 class="d-flex justify-content-center align-items-center mb-2">LIST CABANG</h2>
    <div class="accordion" id="accordion">
      <?php
      $ids = 0;
      $tbl = 0;
      $area = mysqli_query($dbh, "SELECT * FROM `cab_area` WHERE `stat`='y' ORDER BY `id`") or die(mysqli_errno($dbh));
      while ($cabs = mysqli_fetch_array($area)) {
        $kode = $cabs['kode'];

      ?>
        <div class="accordion-item">
          <h2 class="accordion-header" id="collapse<?= $cabs['nama']; ?>">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#<?= $kode; ?>" aria-expanded="false" aria-controls="collapseOne">
              <p class="fw-bold"><?= $cabs['nama']; ?></p>
            </button>
          </h2>
          <div id="<?= $kode; ?>" class="accordion-collapse collapse " aria-labelledby="collapse<?= $cabs['nama']; ?>" data-bs-parent="#accordion">
            <div class="col-sm-3 mt-3">
              <input type="text" id="srch_<?= $ids++; ?>" class="form-control form-control-sm" placeholder="Cari Cabang..." style="margin-left: 1rem;">
            </div>
            <div class="accordion-body">
              <?php
              $isi = mysqli_query($dbh, "SELECT * FROM `isi_cabang` WHERE `kowil` = '$kode' AND `status` = 'aktiv'") or die(mysqli_error($dbh));
              $nom = 1;
              ?>
              <div class="col table-responsive" style="height: 400px;">
                <table class="table table-sm table-hover">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama Cabang</th>
                      <th>ALamat</th>
                      <th>No.tlp</th>
                      <th>Penerimaan</th>
                      <th>Pengiriman</th>
                      <th>map</th>
                    </tr>
                  </thead>
                  <tbody id="isi_<?= $tbl++; ?>">
                    <?php
                    while ($isicabang = mysqli_fetch_assoc($isi)) {
                    ?>
                      <tr>
                        <td><?= $nom++; ?>.</td>
                        <td><?= $isicabang['nama_cabang']; ?></td>
                        <td><?= $isicabang['alamat']; ?></td>
                        <td class="fw-bold"><?= $isicabang['no_tlp']; ?></td>
                        <?php
                        if ($isicabang['recieve'] == 'n') {
                          $isirec = '<i class="fas fa-times" style="color:#F46000;"></i>';
                        } else {
                          $isirec = '<i class="fas fa-check" style="color:#1FE100;"></i>';
                        }
                        if ($isicabang['delivere'] == 'n') {
                          $isidel = '<i class="fas fa-times" style="color:#F46000;"></i>';
                        } else {
                          $isidel = '<i class="fas fa-check" style="color:#1FE100;"></i>';
                        }
                        ?>
                        <td><?= $isirec; ?></td>
                        <td><?= $isidel; ?></td>
                        <td>
                          <?php
                          if (empty($isicabang['map']) || $isicabang['map'] == "-") {
                            echo '<i class="fas fa-earth-asia" style="color:#878787 ;" disabled></i>';
                          } else {
                            echo '<a href="' . $isicabang['map'] . '" target="blank" style="color:#01BF57 ;">
                            <i class="fas fa-earth-asia" disabled></i>
                            </a>';
                          }
                          ?>
                        </td>
                      </tr>
                    <?php
                    }  ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      <?php }
      $tt = mysqli_query($dbh, "SELECT COUNT(`nama`) AS `total` FROM `cab_area`  WHERE `stat` = 'y'") or die(mysqli_error($dbh));
      $jml = mysqli_fetch_assoc($tt) or die(mysqli_error($dbh));
      ?>
    </div>
    <input type="hidden" value="<?= $jml['total']; ?>" id="jml" readonly disabled>
  </div>
</div>