<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="shortcut icon" type="image/png" href="<?= BASEURL; ?>/img/logdom.png" />
  <title><?= $data['judul']; ?></title>
  <?= $data['kepala']; ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" />
  <link rel="stylesheet" href="<?= BASEURL; ?>/css/templatemo-style.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="<?= BASEURL; ?>/js/jquery3.6.js"></script>
  <?= $data['kepala2']; ?>
  

  <style>
    .list-group-item {
      background-color: #233b53 !important;

    }

    .bg-primary {
      background-color: #233b53 !important;
    }

    .list-group-item-action:hover {
      background-color: #6C9FB6 !important;
    }

    .text-white:hover {
      color: black;
    }

    .nav-link {
      text-align: center;
      justify-content: center;
    }

    .text-light {
      font-size: 0.8rem;
    }

    .btn-outline-warning {
      background-color: #233b53;
      color: cornsilk;
    }
    
    ::-webkit-scrollbar {
        width:6px;
    }
    ::-webkit-scrollbar-track{
        background: #A9C7D1;
    }
    ::-webkit-scrollbar-thumb{
        background: #265364;
    }
    ::-webkit-scrollbar-thumb:hover{
        background: #233453;
    }
  </style>
</head>

<body>
  <!-- Navbar  -->
  <div class="row-md-4">
      <nav class="navbar fixed-top navbar-expand-lg navbar-dark">
        <div class="container">
          <a class="navbar-brand" href="<?= BASEURL; ?>"><img src="<?= BASEURL; ?>/img/baraka_bek.svg" alt="logo" width="200"></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <div class="mx-auto"></div>
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link text-white" href="<?= BASEURL; ?>">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white" href="<?= BASEURL; ?>/cektarif">Cek Tarif</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white" href="<?= BASEURL; ?>/tracking">Tracking</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white" href="<?= BASEURL; ?>/tentang">Tentang Kami</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white" href="<?= BASEURL; ?>/cabang">Lokasi</a>
              </li>
              <!--<li class="nav-item">-->
              <!--  <a class="nav-link text-white" href="#">News Center</a>-->
              <!--</li>-->
              <!--<li class="nav-item">-->
              <!--  <a class="nav-link text-white" href="#">Karir</a>-->
              <!--</li>-->
              <li class="nav-item">
                <a class="nav-link text-white" href="<?= BASEURL; ?>/kontak">Hubungi kami</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
  </div>