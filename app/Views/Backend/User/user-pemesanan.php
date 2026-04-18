<!-- Main Content -->
<div class="main-content p-4 w-100" style="background: #f8fafc; min-height: 100vh;">
  <div class="navbar d-flex justify-content-between align-items-center mb-4"
    style="background: #fff; border-radius: 12px; box-shadow: 0 2px 8px rgba(0,0,0,0.04); padding: 20px;">
    <div>
      <h2 class="mb-0" style="font-weight: 700; color: #2d3748;">
        <i class="bi bi-cart-check"></i> Pemesanan Servis
      </h2>
    </div>
    <div>
      <a href="<?= base_url('user/tambah-pemesanan') ?>"
        class="btn btn-success btn-lg shadow-sm d-inline-flex align-items-center gap-2" style="border-radius: 8px;">
        <i class="bi bi-plus-circle"></i>
        Tambah Pemesanan
      </a>
    </div>
  </div>
  <div class="row justify-content-center">
    <div class="col-12">
      <div class="card shadow-sm border-0" style="border-radius: 16px;">
        <div class="card-body">
          <h3 class="card-title mb-3" style="color: #2563eb;">Daftar Pemesanan Anda</h3>
          <div class="table-responsive">
            <table class="table align-middle table-bordered table-hover"
              style="background: #fff; border-radius: 12px; overflow: hidden;">
              <thead class="table-success" style="border-radius: 12px;">
                <tr style="font-size: 1rem;">
                  <th>ID</th>
                  <th>Layanan</th>
                  <th>Nama</th>
                  <th>No HP</th>
                  <th>Alamat</th>
                  <th>Nama Barang</th>
                  <th>Deskripsi Kerusakan</th>
                  <th>Status</th>
                  <th>Opsi</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($pemesanan as $item): ?>
                  <?php if (strtolower($item['status']) === 'selesai') continue; ?>
                  <tr>
                    <td><?= $item['id'] ?></td>
                    <td><?= $item['layanan'] ?></td>
                    <td><?= $item['nama'] ?></td>
                    <td><?= $item['no_hp'] ?></td>
                    <td><?= $item['alamat'] ?></td>
                    <td><?= $item['nama_barang'] ?></td>
                    <td><?= $item['deskripsi_kerusakan'] ?></td>
                    <td>
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
                          if (session()->get('role') === 'admin') {
                              echo ' <a href="' . base_url('admin/terima-pemesanan/' . $item['id']) . '" class="btn btn-warning btn-sm ms-2">Proses</a>';
                          }
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
                    </td>
                    <td>
                      <a href="<?= base_url('user/invoice/' . $item['id']) ?>" class="btn btn-info btn-sm">
                        <i class="bi bi-file-earmark-text"></i> Invoice
                      </a>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
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
