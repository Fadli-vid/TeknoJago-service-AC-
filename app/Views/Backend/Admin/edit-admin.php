<div class="main-content p-4 w-100" style="background: #f8fafc; min-height: 100vh;">
  <div class="row justify-content-center">
    <div class="col-md-8 col-lg-6">
      <div class="card shadow-sm border-0" style="border-radius: 16px;">
        <div class="card-body p-4">
          <h3 class="card-title mb-4" style="color: #2563eb; font-weight:700;">
            <i class="bi bi-pencil-square"></i> Edit Admin
          </h3>
          <form action="<?= base_url('admin/update-admin/' . $admin['id_admin']) ?>" method="post">
            <div class="mb-3">
              <label class="form-label fw-semibold">Nama Admin</label>
              <input type="text" name="nama_admin" class="form-control form-control-lg rounded-3" value="<?= $admin['nama_admin'] ?>" required>
            </div>
            <div class="mb-3">
              <label class="form-label fw-semibold">Username</label>
              <input type="text" name="username_admin" class="form-control form-control-lg rounded-3" value="<?= $admin['username_admin'] ?>" required readonly>
            </div>
            <div class="mb-3">
              <label class="form-label fw-semibold">No HP</label>
              <input type="text" name="no_hp_admin" class="form-control form-control-lg rounded-3" value="<?= $admin['no_hp_admin'] ?>" required>
            </div>
            <div class="mb-3">
              <label class="form-label fw-semibold">Role</label>
              <input type="text" name="role" class="form-control form-control-lg rounded-3" value="<?= $admin['role'] ?>" required readonly>
            </div>
            <div class="mb-3">
              <label class="form-label fw-semibold">Password (Kosongkan jika tidak ingin mengubah)</label>
              <input type="password" name="password" class="form-control form-control-lg rounded-3" placeholder="Password baru">
            </div>
            <div class="d-flex gap-2 mt-3">
              <button type="submit" class="btn btn-primary btn-lg shadow-sm" style="border-radius: 8px;">
                <i class="bi bi-save"></i> Update
              </button>
              <a href="<?= site_url('admin/data-admin') ?>" class="btn btn-secondary btn-lg" style="border-radius: 8px;">
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
