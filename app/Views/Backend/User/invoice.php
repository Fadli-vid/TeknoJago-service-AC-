<!-- Invoice Pemesanan -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Invoice Pemesanan #<?= $pemesanan['id'] ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body { background: #f8fafc; }
        .invoice-box { background: #fff; border-radius: 12px; box-shadow: 0 2px 8px rgba(0,0,0,0.04); padding: 32px; margin: 40px auto; max-width: 600px; }
        .invoice-title { color: #2563eb; font-weight: bold; }
        .table th, .table td { vertical-align: middle; }
    </style>
</head>
<body>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow" style="border-radius: 16px;">
                    <div class="card-header bg-primary text-white" style="border-radius: 16px 16px 0 0;">
                        <h3 class="mb-0"><i class="bi bi-file-earmark-text"></i> Invoice Pemesanan</h3>
                    </div>
                    <div class="card-body">
                        <?php if (isset($pemesanan)): ?>
                            <table class="table table-borderless">
                                <tr>
                                    <th>ID Pemesanan</th>
                                    <td><?= esc($pemesanan['id']) ?></td>
                                </tr>
                                <tr>
                                    <th>Nama</th>
                                    <td><?= esc($pemesanan['nama']) ?></td>
                                </tr>
                                <tr>
                                    <th>No HP</th>
                                    <td><?= esc($pemesanan['no_hp']) ?></td>
                                </tr>
                                <tr>
                                    <th>Alamat</th>
                                    <td><?= esc($pemesanan['alamat']) ?></td>
                                </tr>
                                <tr>
                                    <th>Layanan</th>
                                    <td><?= esc($pemesanan['layanan']) ?></td>
                                </tr>
                                <tr>
                                    <th>Nama Barang</th>
                                    <td><?= esc($pemesanan['nama_barang']) ?></td>
                                </tr>
                                <tr>
                                    <th>Deskripsi Kerusakan</th>
                                    <td><?= esc($pemesanan['deskripsi_kerusakan']) ?></td>
                                </tr>
                                <tr>
                                    <th>Nama Teknisi</th>
                                    <td><?= isset($nama_teknisi) ? esc($nama_teknisi) : '-' ?></td>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <td><?= esc($pemesanan['status']) ?></td>
                                </tr>
                                <tr>
                                    <th>Harga</th>
                                    <td>
                                        <?php
                                        if (isset($pemesanan['harga']) && $pemesanan['harga'] !== null) {
                                            echo 'Rp ' . number_format($pemesanan['harga'], 0, ',', '.');
                                        } else {
                                            echo '<span class="text-muted">Belum ditentukan</span>';
                                        }
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Tanggal Pemesanan</th>
                                    <td><?= isset($tanggal_pemesanan) ? esc($tanggal_pemesanan) : '-' ?></td>
                                </tr>
                                <tr>
                                    <th>Tanggal Selesai</th>
                                    <td><?= isset($tanggal_selesai) && $tanggal_selesai !== '' ? esc($tanggal_selesai) : '-' ?></td>
                                </tr>
                            </table>
                        <?php else: ?>
                            <div class="alert alert-danger">Data pemesanan tidak ditemukan.</div>
                        <?php endif; ?>
                    </div>
                    <div class="card-footer text-end">
                        <a href="<?= base_url('user/user-pemesanan') ?>" class="btn btn-secondary">
                            <i class="bi bi-arrow-left"></i> Kembali
                        </a>
                        <button onclick="window.print()" class="btn btn-success">
                            <i class="bi bi-printer"></i> Cetak Invoice
                        </button>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#qrisModal">
                            <i class="bi bi-credit-card"></i> Bayar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal QRIS -->
    <div class="modal fade" id="qrisModal" tabindex="-1" aria-labelledby="qrisModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="qrisModalLabel">Pembayaran QRIS</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
          </div>
          <div class="modal-body text-center">
            <img src="<?= base_url('Assets/css/qris.PNG') ?>" alt="QRIS" class="img-fluid mb-3" style="max-width:300px;">
            <h2><?php
                                        if (isset($pemesanan['harga']) && $pemesanan['harga'] !== null) {
                                            echo 'Rp ' . number_format($pemesanan['harga'], 0, ',', '.');
                                        } else {
                                            echo '<span class="text-muted">Belum ditentukan</span>';
                                        }
                                        ?>
            </h2>
            <p>Silakan scan QRIS di atas untuk melakukan pembayaran.</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
          </div>
        </div>
      </div>
    </div>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
