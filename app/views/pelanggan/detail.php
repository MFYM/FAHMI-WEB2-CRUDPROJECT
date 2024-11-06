<div class="container mt-2 pb-4">
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title"><?= $data['pelanggan']['nama_pelanggan']; ?></h5>
            <p class="card-text"><?= $data['pelanggan']['alamat']; ?></p>
            <p class="card-text">ID = <?= $data['pelanggan']['id_pelanggan']; ?></p>
            <a href="<?= BASEURL; ?>/pelanggan" class="btn btn-primary">Kembali</a>
        </div>
    </div>
</div>