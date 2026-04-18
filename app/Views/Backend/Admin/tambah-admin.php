<div class="main-content p-4 w-100" style="background: #f8fafc; min-height: 100vh;">
  <div class="row justify-content-center">
    <div class="col-md-8 col-lg-6">
      <div class="card shadow-sm border-0" style="border-radius: 16px;">
        <div class="card-body p-4">
          <h3 class="card-title mb-4" style="color: #2563eb; font-weight:700;">
            <i class="bi bi-person-plus"></i> Tambah Admin
          </h3>
          <form action="<?= base_url('admin/simpan-admin') ?>" method="post" autocomplete="off">
            <div class="mb-3">
              <label for="nama_admin" class="form-label fw-semibold">Nama Admin</label>
              <input type="text" name="nama_admin" id="nama_admin" class="form-control form-control-lg rounded-3" required>
            </div>
            <div class="mb-3">
              <label for="username_admin" class="form-label fw-semibold">Username</label>
              <input type="text" name="username_admin" id="username_admin" class="form-control form-control-lg rounded-3" required>
            </div>
            <div class="mb-3">
              <label for="password" class="form-label fw-semibold">Password</label>
              <input type="password" name="password" id="password" class="form-control form-control-lg rounded-3" required minlength="4">
            </div>
            <div class="mb-3">
              <label for="no_hp_admin" class="form-label fw-semibold">No HP</label>
              <input type="text" name="no_hp_admin" id="no_hp_admin" class="form-control form-control-lg rounded-3" required pattern="[0-9]{10,15}">
            </div>
            <div class="mb-3">
              <label for="role" class="form-label fw-semibold">Role</label>
              <select name="role" id="role" class="form-select form-select-lg rounded-3" required>
                <option value="admin">Admin</option>
                <!-- Tambahkan role lain jika diperlukan -->
              </select>
            </div>
            <button type="submit" class="btn btn-primary btn-lg w-100 mt-2" style="border-radius: 8px;">
              <i class="bi bi-save"></i> Simpan
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
