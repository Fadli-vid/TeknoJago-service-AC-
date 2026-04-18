<div class="main-content p-4 w-100" style="background: #f8fafc; min-height: 100vh;">
  <div class="row justify-content-center">
    <div class="col-md-8 col-lg-6">
      <div class="card shadow-sm border-0" style="border-radius: 16px;">
        <div class="card-body p-4">
          <h3 class="card-title mb-4" style="color: #2563eb; font-weight:700;">
            <i class="bi bi-person-plus"></i> Tambah Teknisi
          </h3>
          <form action="<?= base_url('admin/simpan-teknisi') ?>" method="post" autocomplete="off">
            <div class="mb-3">
              <label for="nama" class="form-label fw-semibold">Nama Teknisi</label>
              <input type="text" name="nama" id="nama" class="form-control form-control-lg rounded-3" required>
            </div>
            <div class="mb-3">
              <label for="no_hp" class="form-label fw-semibold">No HP</label>
              <input type="text" name="no_hp" id="no_hp" class="form-control form-control-lg rounded-3" required pattern="[0-9]{10,15}">
            </div>
            <div class="mb-3">
              <label for="alamat" class="form-label fw-semibold">Alamat</label>
              <textarea name="alamat" id="alamat" class="form-control form-control-lg rounded-3" required rows="2"></textarea>
            </div>
            <div class="mb-3">
              <label for="keahlian" class="form-label fw-semibold">Keahlian</label>
              <input type="text" name="keahlian" id="keahlian" class="form-control form-control-lg rounded-3" required>
            </div>
            <div class="mb-3">
              <label for="username" class="form-label fw-semibold">Username</label>
              <input type="text" name="username" id="username" class="form-control form-control-lg rounded-3" required>
            </div>
            <div class="mb-3">
              <label for="password" class="form-label fw-semibold">Password</label>
              <input type="password" name="password" id="password" class="form-control form-control-lg rounded-3" required minlength="4">
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
