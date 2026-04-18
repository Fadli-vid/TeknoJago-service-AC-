<div class="main-content p-4 w-100" style="background: #f8fafc; min-height: 100vh;">
  <div class="row justify-content-center">
    <div class="col-md-8 col-lg-6">
      <div class="card shadow-sm border-0" style="border-radius: 16px;">
        <div class="card-body p-4">
          <h3 class="card-title mb-4" style="color: #2563eb; font-weight:700;">
            <i class="bi bi-pencil-square"></i> Ubah Riwayat Pemesanan
          </h3>
          <form action="<?= base_url('admin/update-riwayat/' . $riwayat['id']) ?>" method="post">
            <!-- ID Pemesanan (readonly) -->
            <div class="mb-3">
              <label for="pemesanan_id" class="form-label fw-semibold">ID Pemesanan</label>
              <input type="text" name="pemesanan_id" value="<?= $riwayat['pemesanan_id'] ?>" class="form-control form-control-lg rounded-3" readonly>
            </div>
            <!-- Pilih Teknisi -->
            <div class="mb-3">
              <label for="teknisi_id" class="form-label fw-semibold">Pilih Teknisi</label>
              <select name="teknisi_id" class="form-select form-select-lg rounded-3" required>
                <option value="">-- Pilih Teknisi --</option>
                <?php foreach ($teknisi as $t): ?>
                  <option value="<?= $t['id'] ?>" <?= ($riwayat['teknisi_id'] == $t['id']) ? 'selected' : '' ?>>
                    <?= $t['nama_teknisi'] . ' | ' . $t['keahlian'] ?>
                  </option>
                <?php endforeach; ?>
              </select>
            </div>
            <!-- Status -->
            <div class="mb-3">
              <label for="status" class="form-label fw-semibold">Status</label>
              <select name="status" class="form-select form-select-lg rounded-3" required>
                <option value="Proses" <?= ($riwayat['status'] === 'Proses') ? 'selected' : '' ?>>Proses</option>
                <option value="Menunggu Teknisi" <?= ($riwayat['status'] === 'Menunggu Teknisi') ? 'selected' : '' ?>>Menunggu Teknisi</option>
                <option value="Menunggu Pembayaran" <?= ($riwayat['status'] === 'Menunggu Pembayaran') ? 'selected' : '' ?>>Menunggu Pembayaran</option>
                <option value="Selesai" <?= ($riwayat['status'] === 'Selesai') ? 'selected' : '' ?>>Selesai</option>
              </select>
            </div>
            <!-- Waktu Masuk -->
            <div class="mb-3">
              <label for="waktu_masuk" class="form-label fw-semibold">Waktu Masuk</label>
              <input type="datetime-local" name="waktu_masuk" value="<?= date('Y-m-d\TH:i', strtotime($riwayat['waktu_masuk'])) ?>" class="form-control form-control-lg rounded-3" required>
            </div>
            <!-- Waktu Selesai -->
            <div class="mb-3">
              <label for="waktu_selesai" class="form-label fw-semibold">Waktu Selesai</label>
              <input type="datetime-local" name="waktu_selesai" value="<?= $riwayat['waktu_selesai'] ? date('Y-m-d\TH:i', strtotime($riwayat['waktu_selesai'])) : '' ?>" class="form-control form-control-lg rounded-3">
            </div>
            <div class="d-flex gap-2 mt-3">
              <button type="submit" class="btn btn-warning btn-lg shadow-sm" style="border-radius: 8px;">
                <i class="bi bi-save"></i> Update
              </button>
              <a href="<?= site_url('admin/riwayat') ?>" class="btn btn-secondary btn-lg" style="border-radius: 8px;">
                <i class="bi bi-arrow-left"></i> Kembali
              </a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Bootstrap Icons CDN (if not already included) -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
