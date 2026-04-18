<!-- Main Content -->
<div class="main-content p-4 w-100" style="background: #f8fafc; min-height: 100vh;">
  <div class="navbar d-flex align-items-center mb-4"
    style="background: #fff; border-radius: 12px; box-shadow: 0 2px 8px rgba(0,0,0,0.04); padding: 20px;">
    <h2 class="mb-0" style="font-weight: 700; color: #2d3748;">
      <i class="bi bi-plus-circle"></i> Tambah Pemesanan
    </h2>
  </div>
  <div class="row justify-content-center">
    <div class="col-md-8 col-lg-7">
      <div class="card shadow-sm border-0" style="border-radius: 16px;">
        <div class="card-body p-4">
          <h3 class="card-title mb-3" style="color: #2563eb;">Formulir Pemesanan Servis</h3>
          <form action="/user/simpan-pemesanan" method="post" autocomplete="off">
            <div class="row mb-3">
              <div class="col-md-6 mb-3 mb-md-0">
                <label class="form-label fw-semibold">Layanan</label>
                <input type="text" class="form-control form-control-lg rounded-3" name="layanan" required placeholder="Contoh: Servis AC, TV, Kulkas">
              </div>
              <div class="col-md-6">
                <label class="form-label fw-semibold">Nama Lengkap</label>
                <input type="text" class="form-control form-control-lg rounded-3" name="nama" required value="<?= session()->get('nama_user') ?>" readonly>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-md-6 mb-3 mb-md-0">
                <label class="form-label fw-semibold">No. HP</label>
                <input type="text" class="form-control form-control-lg rounded-3" name="no_hp" required placeholder="08xxxxxxxxxx" value="<?= esc(session()->get('no_telp')) ?>">
              </div>
              <div class="col-md-6">
                <label class="form-label fw-semibold">Nama Barang</label>
                <input type="text" class="form-control form-control-lg rounded-3" name="nama_barang" required placeholder="Contoh: Kulkas LG, TV Samsung">
              </div>
            </div>
            <div class="mb-3">
              <label class="form-label fw-semibold">Alamat</label>
              <textarea class="form-control form-control-lg rounded-3" name="alamat" rows="3" required placeholder="Alamat lengkap lokasi servis"><?= esc(session()->get('alamat')) ?></textarea>
            </div>
            <div class="mb-3">
              <label class="form-label fw-semibold">Deskripsi Kerusakan</label>
              <textarea class="form-control form-control-lg rounded-3" name="deskripsi_kerusakan" rows="4" required placeholder="Jelaskan kerusakan atau kendala pada perangkat"></textarea>
            </div>
            <div class="mb-3">
              <label class="form-label fw-semibold">Harga (Rp)</label>
              <input type="text" class="form-control form-control-lg rounded-3" name="harga" id="harga" placeholder="Harga akan diisi oleh admin" readonly>
            </div>
            <div class="d-flex gap-2 mt-3">
              <button type="submit" class="btn btn-primary btn-lg shadow-sm" style="border-radius: 8px;">
                <i class="bi bi-save"></i> Simpan
              </button>
              <a href="/user/user-pemesanan" class="btn btn-secondary btn-lg" style="border-radius: 8px;">
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
  // Format angka dengan titik ribuan saat mengetik di input harga
  document.addEventListener('DOMContentLoaded', function() {
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

