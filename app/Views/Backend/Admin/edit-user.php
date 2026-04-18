<!-- Main Content -->
<div class="main-content p-4 w-100" style="background: #f8fafc; min-height: 100vh;">
  <div class="navbar d-flex align-items-center mb-4"
    style="background: #fff; border-radius: 12px; box-shadow: 0 2px 8px rgba(0,0,0,0.04); padding: 20px;">
    <h2 class="mb-0" style="font-weight: 700; color: #2d3748;">
      <i class="bi bi-person-badge"></i> Edit Data User
    </h2>
  </div>
  <div class="row justify-content-center">
    <div class="col-md-7 col-lg-6">
      <div class="card shadow-sm border-0" style="border-radius: 16px;">
        <div class="card-body p-4">
          <h5 class="mb-3" style="color: #2d3748;">Edit Data User</h5>
          <form action="<?= site_url('admin/update-user/' . $user['id_user']) ?>" method="post" autocomplete="off">
            <div class="mb-3">
              <label class="form-label fw-semibold">Nama</label>
              <input type="text" name="nama_user" class="form-control form-control-lg rounded-3" required
                value="<?= esc($user['nama_user']) ?>">
            </div>
            <div class="mb-3">
              <label class="form-label fw-semibold">Username</label>
              <input type="text" name="username" class="form-control form-control-lg rounded-3" required
                value="<?= esc($user['username']) ?>">
            </div>
            <div class="mb-3">
              <label class="form-label fw-semibold">Password</label>
              <input type="password" name="password" class="form-control form-control-lg rounded-3"
                placeholder="Kosongkan jika tidak ingin mengubah password">
            </div>
            <div class="mb-3">
              <label class="form-label fw-semibold">Alamat</label>
              <input type="text" name="alamat" class="form-control form-control-lg rounded-3" required
                value="<?= esc($user['alamat']) ?>">
            </div>
            <div class="mb-3">
              <label class="form-label fw-semibold">No Telepon</label>
              <input type="text" name="no_telp" class="form-control form-control-lg rounded-3" required
                value="<?= esc($user['no_telp']) ?>">
            </div>
            <div class="d-flex gap-2 mt-3">
              <button type="submit" class="btn btn-primary btn-lg shadow-sm" style="border-radius: 8px;">
                <i class="bi bi-save"></i> Simpan Perubahan
              </button>
              <a href="<?= site_url('admin/data-customer') ?>" class="btn btn-secondary btn-lg" style="border-radius: 8px;">
                <i class="bi bi-arrow-left"></i> Kembali
              </a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
