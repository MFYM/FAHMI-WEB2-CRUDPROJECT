<div class="container">
    <h1 class="mt-2">Produk</h1>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#formModal">
        Tambah Data Produk
    </button>
    <br> <br>
    <div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Stok</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php foreach ($data['produk'] as $produk) : ?>
                <tr>
                    <th scope="row"><?= $no++; ?></th>
                    <td><?= htmlspecialchars($produk['nama_barang']); ?></td>
                    <td><?= htmlspecialchars($produk['harga']); ?></td>
                    <td><?= htmlspecialchars($produk['stok']); ?></td>
                    <td>
                        <a href="<?= BASEURL; ?>/produk/detail/<?= $produk['kode_barang']; ?>" class="btn btn-info btn-sm">Detail</a>
                        <button class="btn btn-primary btn-sm">Edit</button>
                        <a href="<?= BASEURL; ?>/produk/delete/<?= $produk['kode_barang']; ?>" class="btn btn-primary btn-sm" onclick="return confirm('Yakin ingin menghapus produk ini?')">Delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="formModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="judulModal">Tambah Data Produk</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="<?= BASEURL; ?>/produk/Tambah" method="post" enctype="multipart/form-data">
          <div class="mb-3">
              <label for="foto_barang" class="form-label">Foto Produk</label>
              <input type="file" class="form-control" id="foto_barang" name="foto_barang" placeholder="foto_barang">
          </div>
          <div class="mb-3">
              <label for="kode_barang" class="form-label">Kode Produk</label>
              <input type="text" class="form-control" id="kode_barang" name="kode_barang" placeholder="kode_barang" required>
          </div>
          <div class="mb-3">
              <label for="nama_barang" class="form-label">Nama Produk</label>
              <input type="text" class="form-control" id="nama_barang" name="nama_barang" placeholder="nama_barang">
          </div>
          <div class="mb-3">
              <label for="harga" class="form-label">Harga</label>
              <input type="number" class="form-control" id="harga" name="harga" placeholder="Harga">
          </div>
          <div class="mb-3">
              <label for="stok" class="form-label">Stok</label>
              <input type="number" class="form-control" id="stok" name="stok" placeholder="Stok">
          </div>
          <div class="mb-3">
              <label for="deskripsi" class="form-label">Deskripsi Barang</label>
              <input type="text" class="form-control" id="deskripsi" name="deskripsi" placeholder="deskripsi">
          </div>
           
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Tambah</button>
          
          </div>
        </form>
    </div>
  </div>
</div>
