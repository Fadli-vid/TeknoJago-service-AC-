<!-- Invoice Pemesanan (Teknisi) -->
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
                        <h3 class="mb-0"><i class="bi bi-file-earmark-text"></i> Invoice Pemesanan (Teknisi)</h3>
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
                                <?php if (isset($nama_teknisi)): ?>
                                <tr>
                                    <th>Nama Teknisi</th>
                                    <td><?= esc($nama_teknisi) ?></td>
                                </tr>
                                <?php endif; ?>
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
                                <?php if (isset($pemesanan['created_at'])): ?>
                                <tr>
                                    <th>Tanggal Pemesanan</th>
                                    <td><?= esc($pemesanan['created_at']) ?></td>
                                </tr>
                                <?php endif; ?>
                                <?php if (isset($tanggal_selesai)): ?>
                                <tr>
                                    <th>Tanggal Selesai</th>
                                    <td><?= esc($tanggal_selesai) ?></td>
                                </tr>
                                <?php endif; ?>
                            </table>
                        <?php else: ?>
                            <div class="alert alert-danger">Data pemesanan tidak ditemukan.</div>
                        <?php endif; ?>
                    </div>
                    <div class="card-footer text-end">
                        <a href="<?= base_url('teknisi/pemesanan') ?>" class="btn btn-secondary">
                            <i class="bi bi-arrow-left"></i> Kembali
                        </a>
                        <button onclick="window.print()" class="btn btn-success">
                            <i class="bi bi-printer"></i> Cetak Invoice
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
