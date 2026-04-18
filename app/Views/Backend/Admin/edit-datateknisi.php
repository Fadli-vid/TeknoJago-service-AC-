<div class="main-content p-4 w-100" style="background: #f8fafc; min-height: 100vh;">
  <div class="row justify-content-center">
    <div class="col-md-8 col-lg-6">
      <div class="card shadow-sm border-0" style="border-radius: 16px;">
        <div class="card-body p-4">
          <h3 class="card-title mb-4" style="color: #2563eb; font-weight:700;">
            <i class="bi bi-pencil-square"></i> Edit Teknisi
          </h3>
          <form action="<?= base_url('admin/update-teknisi/' . $teknisi['id']) ?>" method="post">
            <!-- Nama masih error -->
            <div class="mb-3">
              <label class="form-label fw-semibold">Nama</label>
              <input type="text" name="nama_teknisi" class="form-control form-control-lg rounded-3" value="<?= $teknisi['nama_teknisi'] ?>" required readonly>
            </div>
            <div class="mb-3">
              <label class="form-label fw-semibold">No HP</label>
              <input type="text" name="no_hp" class="form-control form-control-lg rounded-3" value="<?= $teknisi['no_hp'] ?>" required>
            </div>
            <div class="mb-3">
              <label class="form-label fw-semibold">Alamat</label>
              <textarea name="alamat" class="form-control form-control-lg rounded-3" required><?= $teknisi['alamat'] ?></textarea>
            </div>
            <div class="mb-3">
              <label class="form-label fw-semibold">Keahlian</label>
              <input type="text" name="keahlian" class="form-control form-control-lg rounded-3" value="<?= $teknisi['keahlian'] ?>" required>
            </div>
            <div class="d-flex gap-2 mt-3">
              <button type="submit" class="btn btn-primary btn-lg shadow-sm" style="border-radius: 8px;">
                <i class="bi bi-save"></i> Update
              </button>
              <a href="<?= site_url('admin/teknisi') ?>" class="btn btn-secondary btn-lg" style="border-radius: 8px;">
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
