<div class="container">
    <h1 class="mt-2">Transaksi</h1>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#formModal">
        Tambah Data Transaksi
    </button>
    <br> <br>
    <div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Nomor Transaksi</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Nama Pembeli</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Total Harga</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data['transaksi'] as $transaksi) : ?>
                <tr>
                    <td><?= htmlspecialchars($transaksi['id_transaksi']); ?></td>
                    <td><?= htmlspecialchars($transaksi['nama_barang']); ?></td>
                    <td><?= htmlspecialchars($transaksi['nama_pelanggan']); ?></td>
                    <td><?= htmlspecialchars($transaksi['tanggal']); ?></td>
                    <td><?= htmlspecialchars($transaksi['total_harga']); ?></td>
                    <td>
                        <a href="<?= BASEURL; ?>/transaksi/detail/<?= $transaksi['id_transaksi']; ?>" class="btn btn-info btn-sm">Detail</a>
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
        <h1 class="modal-title fs-5" id="judulModal">Form Transaksi</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="<?= BASEURL; ?>/transaksi/Tambah" method="post" enctype="multipart/form-data">
          
          <div class="mb-3">
              <label for="id_pelanggan" class="form-label">ID Pelanggan</label>
              <input type="text" class="form-control" id="id_pelanggan" name="id_pelanggan" placeholder="ID Pelanggan" required>
          </div>
          <div class="mb-3">
              <label for="nama_pelanggan" class="form-label">Nama Pelanggan</label>
              <input type="text" class="form-control" id="nama_pelanggan" name="nama_pelanggan" placeholder="Nama Pelanggan">
          </div>
          <div class="mb-3">
              <label for="alamat" class="form-label">Alamat</label>
              <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat">
          </div>
          <div class="mb-3">
              <label for="kode_barang" class="form-label">kode Barang</label>
              <input type="text" class="form-control" id="kode_barang" name="kode_barang" placeholder="Kode Barang" required>
          </div>
          <div class="mb-3">
              <label for="jumlah" class="form-label">Jumlah Barang</label> 
              <input type="text" class="form-control" id="jumlah" name="jumlah" placeholder="Jumlah Barang" required>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Tambah</button>
          
          </div>
        </form>
    </div>
  </div>
</div>