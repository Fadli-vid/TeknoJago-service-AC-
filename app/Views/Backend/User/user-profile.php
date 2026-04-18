<!-- Main Content -->
<div class="main-content p-4 w-100" style="background: #f8fafc; min-height: 100vh;">
  <div class="navbar d-flex align-items-center mb-4"
    style="background: #fff; border-radius: 12px; box-shadow: 0 2px 8px rgba(0,0,0,0.04); padding: 20px;">
    <h2 class="mb-0" style="font-weight: 700; color: #2d3748;">
      <i class="bi bi-person-badge"></i> Profil Akun
    </h2>
  </div>
  <div class="row justify-content-center">
    <div class="col-md-7 col-lg-6">
      <div class="card shadow-sm border-0" style="border-radius: 16px;">
        <div class="card-body p-4">
          <div class="d-flex align-items-center mb-4">
            <div class="me-3" style="font-size: 2.5rem; color: #6366f1;">
              <i class="bi bi-person-circle"></i>
            </div>
            <div>
              <h4 class="mb-0" style="font-weight: 600; color: #2563eb;">
                <?= session()->get('nama_user') ?>
              </h4>
              <div class="text-muted" style="font-size: 1rem;">
                <i class="bi bi-person"></i> <?= session()->get('username') ?>
              </div>
            </div>
          </div>
          <hr>
          <h5 class="mb-3" style="color: #2d3748;">Edit Profil</h5>
          <form action="<?= site_url('user/update-profile') ?>" method="post" autocomplete="off">
            <div class="mb-3">
              <label class="form-label fw-semibold">Alamat</label>
              <input type="text" name="alamat" class="form-control form-control-lg rounded-3" placeholder="Alamat" required
                value="<?= esc(session()->get('alamat')) ?>">
            </div>
            <div class="mb-3">
              <label class="form-label fw-semibold">No Telepon</label>
              <input type="text" name="no_telp" class="form-control form-control-lg rounded-3" placeholder="08xxxxxxxxxx" required
                value="<?= esc(session()->get('no_telp')) ?>">
            </div>
            <div class="d-flex gap-2 mt-3">
              <button type="submit" class="btn btn-primary btn-lg shadow-sm" style="border-radius: 8px;">
                <i class="bi bi-save"></i> Simpan Profil
              </button>
            </div>
          </form>
          <hr>
          <h5 class="mb-3" style="color: #2d3748;">Ubah Password</h5>
          <form action="<?= site_url('user/update-password') ?>" method="post" autocomplete="off">
            <div class="mb-3">
              <label class="form-label fw-semibold">Password Baru</label>
              <input type="password" name="password_baru" class="form-control form-control-lg rounded-3" placeholder="Masukkan password baru" required>
            </div>
            <div class="mb-3">
              <label class="form-label fw-semibold">Konfirmasi Password</label>
              <input type="password" name="konfirmasi_password" class="form-control form-control-lg rounded-3" placeholder="Ulangi password baru" required>
            </div>
            <div class="d-flex gap-2 mt-3">
              <button type="submit" class="btn btn-primary btn-lg shadow-sm" style="border-radius: 8px;">
                <i class="bi bi-save"></i> Simpan Perubahan
              </button>
              <a href="<?= site_url('user') ?>" class="btn btn-secondary btn-lg" style="border-radius: 8px;">
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