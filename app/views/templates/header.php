<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman <?= $data['judul'] ?> </title>
    <link rel="stylesheet" href="<?= BASEURL; ?>css/bootstrap.css"/">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
      
      html, body {
      height: 100%;
    }

    
    .wrapper {
      min-height: 100%;
      display: flex;
      flex-direction: column;
    }

    
    .content {
      flex: 1;
    }

    
    footer {
      background: #333;
      color: white;
      padding: 20px 0;
      text-align: center;
    }

    
    body {
      background-color: #f0f0f0;
    }

    .navbar {
      background: linear-gradient(45deg, #6a11cb, #2575fc);
    }
    
    .nav-link {
      color: white !important;
      transition: color 0.3s ease-in-out;
    }

    .nav-link:hover {
      color: #f0f0f0 !important;
      text-shadow: 0px 0px 5px rgba(255,255,255,0.5);
    }

    .navbar-brand {
      color: white !important;
      font-weight: bold;
      font-size: 1.5rem;
      transition: color 0.3s ease-in-out;
    }

    .navbar-brand:hover {
      color: #dfe6e9 !important;
      text-shadow: 0px 0px 5px rgba(255,255,255,0.7);
    }

    .navbar-text {
      color: white;
      font-weight: bold;
    }

    .navbar-text:hover {
      color: #f0f0f0;
    }

    .navbar-toggler-icon {
      background-image: url('data:image/svg+xml;charset=utf8,%3Csvg viewBox="0 0 30 30" xmlns="http://www.w3.org/2000/svg"%3E%3Cpath stroke="rgba%28255,255,255,0.7%29" stroke-width="2" stroke-linecap="round" stroke-miterlimit="10" d="M4 7h22M4 15h22M4 23h22"/%3E%3C/svg%3E');
    }
  </style>

</head>
<body>
<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
      <a class="navbar-brand" href="<?= BASEURL; ?>">FAHMI YUSUF</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="<?= BASEURL; ?>">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= BASEURL; ?>/About">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= BASEURL;?>/Produk">Produk</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= BASEURL;?>/Transaksi">Transaksi</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= BASEURL;?>/Pelanggan">Pelanggan</a>
          </li>
        </ul>
        <span class="navbar-text">
          Muhammad Fahmi Yusuf Muzhaffar
        </span>
      </div>
    </div>
  </nav>