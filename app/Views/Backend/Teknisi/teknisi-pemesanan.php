<!-- Main Content -->
<div class="main-content p-4 w-100" style="background: #f8fafc; min-height: 100vh;">
  <div class="navbar d-flex align-items-center mb-4"
    style="background: #fff; border-radius: 12px; box-shadow: 0 2px 8px rgba(0,0,0,0.04); padding: 20px;">
    <h2 class="mb-0" style="font-weight: 700; color: #2d3748;">
      <i class="bi bi-clipboard2-check"></i> Daftar Pemesanan Servis
    </h2>
  </div>
  <div class="row justify-content-center">
    <div class="col-12">
      <div class="card shadow-sm border-0" style="border-radius: 16px;">
        <div class="card-body">
          <h3 class="card-title mb-3" style="color: #2563eb;">Pemesanan Masuk</h3>
          <div class="row g-4">
            <?php foreach ($pemesanan as $item): ?>
              <?php if (strtolower($item['status']) === 'selesai') continue; ?>
              <div class="col-md-6 col-lg-4">
                <div class="card h-100 shadow-sm border-0" style="border-radius: 14px;">
                  <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                      <span class="badge bg-primary" style="font-size: 1em;">#<?= $item['id'] ?></span>
                      <?php
                        $status = strtolower($item['status']);
                        if ($status === 'selesai') {
                            echo '<span class="badge rounded-pill"
                              style="background: #22c55e; color: #fff; font-size: 0.95em; padding: 8px 16px;">
                              <i class=\'bi bi-check-circle\'></i> Selesai
                            </span>';
                        } elseif ($status === 'proses') {
                            echo '<span class="badge rounded-pill"
                              style="background: #f59e42; color: #fff; font-size: 0.95em; padding: 8px 16px;">
                              <i class=\'bi bi-arrow-repeat\'></i> Diproses
                            </span>';
                        } elseif ($status === 'menunggu') {
                            echo '<span class="badge rounded-pill"
                              style="background: #64748b; color: #fff; font-size: 0.95em; padding: 8px 16px;">
                              <i class=\'bi bi-hourglass-split\'></i> Menunggu
                            </span>';
                        } elseif ($status === 'menunggu teknisi') {
                            echo '<span class="badge rounded-pill"
                              style="background: #0ea5e9; color: #fff; font-size: 0.95em; padding: 8px 16px;">
                              <i class=\'bi bi-person-gear\'></i> Menunggu Teknisi
                            </span>';
                        } elseif ($status === 'menunggu pembayaran') {
                            echo '<span class="badge rounded-pill"
                              style="background: #fbbf24; color: #fff; font-size: 0.95em; padding: 8px 16px;">
                              <i class=\'bi bi-cash-stack\'></i> Menunggu Pembayaran
                            </span>';
                        } else {
                            echo '<span class="badge rounded-pill bg-dark" style="font-size: 0.95em; padding: 8px 16px;">-</span>';
                        }
                      ?>
                    </div>
                    <ul class="list-group list-group-flush mb-3">
                      <li class="list-group-item px-0 py-1"><strong>Layanan:</strong> <?= $item['layanan'] ?></li>
                      <li class="list-group-item px-0 py-1"><strong>Nama:</strong> <?= $item['nama'] ?></li>
                      <li class="list-group-item px-0 py-1"><strong>No HP:</strong> <?= $item['no_hp'] ?></li>
                      <li class="list-group-item px-0 py-1"><strong>Alamat:</strong> <?= $item['alamat'] ?></li>
                      <li class="list-group-item px-0 py-1"><strong>Nama Barang:</strong> <?= $item['nama_barang'] ?></li>
                      <li class="list-group-item px-0 py-1"><strong>Deskripsi Kerusakan:</strong> <?= $item['deskripsi_kerusakan'] ?></li>
                      <li class="list-group-item px-0 py-1"><strong>Nama Teknisi:</strong>
                        <?= isset($teknisiMap[$item['teknisi_id']]) ? $teknisiMap[$item['teknisi_id']] : '-' ?>
                      </li>
                    </ul>
                    <div class="d-flex justify-content-end gap-2">
                      <a href="<?= base_url('teknisi/invoice/' . $item['id']) ?>" class="btn btn-info btn-sm">
                        <i class="bi bi-file-earmark-text"></i> Invoice
                      </a>
                      <?php if (strtolower($item['status']) === 'menunggu teknisi'): ?>
                        <form action="<?= base_url('teknisi/update-status/' . $item['id']) ?>" method="post" style="display:inline;">
                          <input type="hidden" name="status" value="Proses">
                          <button type="submit" class="btn btn-warning btn-sm">
                            <i class="bi bi-play-circle"></i> Kerjakan
                          </button>
                        </form>
                      <?php elseif (strtolower($item['status']) === 'proses'): ?>
                        <form action="<?= base_url('teknisi/update-status/' . $item['id']) ?>" method="post" style="display:inline;">
                          <input type="hidden" name="status" value="Menunggu Pembayaran">
                          <button type="submit" class="btn btn-success btn-sm">
                            <i class="bi bi-flag"></i> Selesai
                          </button>
                        </form>
                      <?php endif; ?>
                    </div>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
          <?php if (empty($pemesanan)): ?>
          <div class="alert alert-info text-center mt-4" style="border-radius: 10px;">
            <i class="bi bi-info-circle"></i> Belum ada pemesanan servis.
          </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Bootstrap Icons CDN (if not already included) -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">