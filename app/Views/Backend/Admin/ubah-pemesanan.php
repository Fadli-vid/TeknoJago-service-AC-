<div class="main-content p-4 w-100" style="background: #f8fafc; min-height: 100vh;">
  <div class="row justify-content-center">
    <div class="col-md-8 col-lg-6">
      <div class="card shadow-sm border-0" style="border-radius: 16px;">
        <div class="card-body p-4">
          <h3 class="card-title mb-4" style="color: #2563eb; font-weight:700;">
            <i class="bi bi-pencil-square"></i> Ubah Pemesanan
          </h3>
          <form action="<?= base_url('admin/update-pemesanan/' . $pemesanan['id']) ?>" method="post">
            <!-- ID Pemesanan (readonly) -->
            <div class="mb-3">
              <label class="form-label fw-semibold">ID Pemesanan</label>
              <input type="text" class="form-control form-control-lg rounded-3" value="<?= $pemesanan['id'] ?>"
                readonly>
            </div>
            <!-- Pilih Teknisi -->
            <div class="mb-3">
              <label class="form-label fw-semibold">Teknisi</label>
              <select name="teknisi_id" class="form-select form-select-lg rounded-3" required>
                <option value="">Pilih Teknisi</option>
                <?php foreach ($teknisi as $t): ?>
                <option value="<?= $t['id'] ?>"
                  <?= (isset($pemesanan['teknisi_id']) && $pemesanan['teknisi_id'] == $t['id']) ? 'selected' : '' ?>>
                  <?= $t['nama_teknisi'] . ' | ' . $t['keahlian'] ?>
                </option>
                <?php endforeach; ?>
              </select>
            </div>
            <!-- Status -->
            <div class="mb-3">
              <label class="form-label fw-semibold">Status</label>
              <select name="status" class="form-select form-select-lg rounded-3" required>
                <option value="Proses" <?= ($pemesanan['status'] === 'Proses') ? 'selected' : '' ?>>Proses</option>
                <option value="Menunggu Teknisi" <?= ($pemesanan['status'] === 'Menunggu Teknisi') ? 'selected' : '' ?>>
                  Menunggu Teknisi</option>
                <option value="Menunggu Pembayaran" <?= ($pemesanan['status'] === 'Menunggu Pembayaran') ? 'selected' : '' ?>>
                  Menunggu Pembayaran</option>
                <option value="Selesai" <?= ($pemesanan['status'] === 'Selesai') ? 'selected' : '' ?>>Selesai</option>
                <option value="Dibatalkan" <?= ($pemesanan['status'] === 'Dibatalkan') ? 'selected' : '' ?>>Dibatalkan
                </option>
              </select>
            </div>
            <!-- Waktu Keluar -->
            <div class="mb-3">
              <label class="form-label fw-semibold">Waktu Keluar</label>
              <input type="datetime-local" name="waktu_keluar"
                class="form-control form-control-lg rounded-3" required
                value="<?= isset($pemesanan['waktu_keluar']) && $pemesanan['waktu_keluar'] ? date('Y-m-d\TH:i', strtotime($pemesanan['waktu_keluar'])) : '' ?>">
            </div>
            <!-- Harga -->
            <div class="mb-3">
              <label class="form-label fw-semibold">Harga (Rp)</label>
              <input type="text" name="harga" id="harga" class="form-control form-control-lg rounded-3" required
                value="<?= isset($pemesanan['harga']) ? number_format($pemesanan['harga'], 0, ',', '.') : '' ?>" placeholder="Masukkan harga">
            </div>
            <div class="d-flex gap-2 mt-3">
              <button type="submit" class="btn btn-primary btn-lg shadow-sm" style="border-radius: 8px;">
                <i class="bi bi-save"></i> Simpan Perubahan
              </button>
              <a href="<?= site_url('admin/pemesanan') ?>" class="btn btn-secondary btn-lg"
                style="border-radius: 8px;">
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
<script>
document.addEventListener('DOMContentLoaded', function() {
  // Format angka dengan titik ribuan saat mengetik di input harga
  const hargaInput = document.getElementById('harga');
  if (hargaInput) {
    hargaInput.addEventListener('input', function(e) {
      let value = this.value.replace(/\D/g, '');
      if (value) {
        this.value = value.replace(/\B(?=(\d{3})+(?!\d))/g, '.');
      } else {
        this.value = '';
      }
    });
    // Saat submit, hapus titik agar yang dikirim hanya angka
    hargaInput.form.addEventListener('submit', function() {
      hargaInput.value = hargaInput.value.replace(/\./g, '');
    });
  }
});
</script>

