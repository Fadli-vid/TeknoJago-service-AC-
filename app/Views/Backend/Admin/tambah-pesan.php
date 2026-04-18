<!-- Main Content -->
<div class="main-content p-4 w-100" style="background: #f8fafc; min-height: 100vh;">
  <div class="navbar d-flex justify-content-between align-items-center mb-4"
    style="background: #fff; border-radius: 12px; box-shadow: 0 2px 8px rgba(0,0,0,0.04); padding: 20px;">
    <h2 class="mb-0" style="font-weight: 700; color: #2d3748;">
      ✏️ Tambah Pemesanan
    </h2>
    <a href="/admin/pemesanan" class="btn btn-secondary btn-lg shadow-sm">
      <i class="bi bi-arrow-left"></i> Kembali
    </a>
  </div>

  <div class="row justify-content-center">
    <div class="col-lg-8">
      <div class="card shadow-sm border-0" style="border-radius: 16px;">
        <div class="card-body p-4">
          <h4 class="card-title mb-4" style="color: #2563eb; font-weight: 600;">Formulir Pemesanan Servis</h4>
          <form action="/admin/simpan-pesan" method="post">
            <div class="row mb-3">
              <div class="col-md-6 mb-3 mb-md-0">
                <label class="form-label fw-semibold">Layanan</label>
                <input type="text" class="form-control" name="layanan" required placeholder="Contoh: Servis AC">
              </div>
              <div class="col-md-6">
                <label class="form-label fw-semibold">Nama Lengkap</label>
                <select class="form-select" name="nama" id="userSelect" required>
                  <option value="" disabled selected>Pilih Nama User</option>
                  <?php foreach ($users as $user): ?>
                    <option 
                      value="<?= htmlspecialchars($user['nama_user']) ?>"
                      data-no_hp="<?= htmlspecialchars($user['no_telp']) ?>"
                      data-alamat="<?= htmlspecialchars($user['alamat']) ?>"
                    >
                      <?= htmlspecialchars($user['nama_user']) ?>
                    </option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-md-6 mb-3 mb-md-0">
                <label class="form-label fw-semibold">No. HP</label>
                <input type="text" class="form-control" name="no_hp" id="noHpInput" required placeholder="08xxxxxxxxxx">
              </div>
              <div class="col-md-6">
                <label class="form-label fw-semibold">Nama Barang</label>
                <input type="text" class="form-control" name="nama_barang" required placeholder="Contoh: Kulkas">
              </div>
            </div>
            <div class="mb-3">
              <label class="form-label fw-semibold">Alamat</label>
              <textarea class="form-control" name="alamat" id="alamatInput" rows="3" required placeholder="Alamat lengkap pelanggan"></textarea>
            </div>
            <div class="mb-4">
              <label class="form-label fw-semibold">Deskripsi Kerusakan</label>
              <textarea class="form-control" name="deskripsi_kerusakan" rows="4" required placeholder="Jelaskan kerusakan barang"></textarea>
            </div>
            <div class="mb-4">
              <label class="form-label fw-semibold">Harga (Rp)</label>
              <input type="text" class="form-control" name="harga" id="harga" required placeholder="Masukkan estimasi harga">
            </div>
            <div class="d-flex gap-2">
              <button type="submit" class="btn btn-primary btn-lg">
                <i class="bi bi-save"></i> Simpan
              </button>
              <a href="/admin/pemesanan" class="btn btn-outline-secondary btn-lg">
                <i class="bi bi-x-circle"></i> Batal
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
  const userSelect = document.getElementById('userSelect');
  const noHpInput = document.getElementById('noHpInput');
  const alamatInput = document.getElementById('alamatInput');
  userSelect.addEventListener('change', function() {
    const selected = userSelect.options[userSelect.selectedIndex];
    noHpInput.value = selected.getAttribute('data-no_hp') || '';
    alamatInput.value = selected.getAttribute('data-alamat') || '';
  });

  // Format angka dengan titik ribuan saat mengetik di input harga
  const hargaInput = document.getElementById('harga');
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
});
</script>

