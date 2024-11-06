<div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    
    <div class="carousel-item active">
      <img src="<?= BASEURL; ?>/img/pwg.jpg" class="d-block w-100 carousel-image" alt="Slide 1">
      <div class="carousel-caption d-none d-md-block">
        <h5>Selamat Datang di Website</h5>
        <p>PHP CRUD dengan menggunakan konsep MVC (Model View Controller)</p>
      </div>
    </div>
    
    <div class="carousel-item">
      <img src="<?= BASEURL; ?>/img/fahmi.jpg" class="d-block w-100 carousel-image" alt="Slide 2">
    </div>
    
    <div class="carousel-item">
      <img src="<?= BASEURL; ?>/img/gunung.jpg" class="d-block w-100 carousel-image gunung" alt="Slide 3">
      <div class="carousel-caption d-none d-md-block">
        <a href="<?= BASEURL; ?>/about" class="btn btn-primary">Hubungi Kami</a>
      </div>
    </div>
  </div>

  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

<style>
  .carousel-image {
    width: 1200px;
    height: 500px;
    object-fit: cover;
  }

  .gunung{
    object-position: bottom;
  }
</style>
