<div class="container">
    <h1 class="mt-2">Pelanggan</h1>
    <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#formModal">
        Tambah Data Pelanggan
    </button> -->
    <br> <br>
    <div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php foreach ($data['pelanggan'] as $pelanggan) : ?>
                <tr>
                    <th scope="row"><?= $no++; ?></th>
                    <td><?= htmlspecialchars($pelanggan['nama_pelanggan']); ?></td>
                    <td><?= htmlspecialchars($pelanggan['alamat']); ?></td>
                    <td>
                        <a href="<?= BASEURL; ?>/pelanggan/detail/<?= $pelanggan['id_pelanggan']; ?>" class="btn btn-info btn-sm">Detail</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
