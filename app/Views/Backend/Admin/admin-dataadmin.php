<!-- Main Content -->
<div class="main-content p-4 w-100" style="background: #f8fafc; min-height: 100vh;">
  <div class="navbar d-flex justify-content-between align-items-center mb-4"
    style="background: #fff; border-radius: 12px; box-shadow: 0 2px 8px rgba(0,0,0,0.04); padding: 20px;">
    <h2 class="mb-0" style="font-weight: 700; color: #2d3748;">
      <i class="bi bi-person-badge"></i> Data Admin
    </h2>
    <a href="<?= base_url('admin/tambah-admin') ?>"
      class="btn btn-success btn-lg shadow-sm d-inline-flex align-items-center gap-2" style="border-radius: 8px;">
      <i class="bi bi-plus-circle"></i>
      Tambah Admin
    </a>
  </div>
  <div class="row justify-content-center">
    <div class="col-12">
      <div class="card shadow-sm border-0" style="border-radius: 16px;">
        <div class="card-body">
          <h3 class="card-title mb-3" style="color: #2563eb;">Daftar Admin</h3>
          <div class="table-responsive">
            <table class="table align-middle table-bordered table-hover"
              style="background: #fff; border-radius: 12px; overflow: hidden;">
              <thead class="table-success" style="border-radius: 12px;">
                <tr style="font-size: 1rem;">
                  <th>No</th>
                  <th>Nama</th>
                  <th>Username</th>
                  <th>No HP</th>
                  <th>Role</th>
                  <th>Opsi</th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1; foreach ($admin as $a): ?>
                <tr>
                  <td><?= $no++ ?></td>
                  <td><?= $a['nama_admin'] ?></td>
                  <td><?= $a['username_admin'] ?></td>
                  <td><?= $a['no_hp_admin'] ?></td>
                  <td><?= $a['role'] ?></td>
                  <td>
                    <a href="<?= base_url('admin/edit-admin/' . $a['id_admin']) ?>" class="btn btn-warning btn-sm">
                      <i class="bi bi-pencil-square"></i> Edit
                    </a>
                    <!-- Tombol hapus memunculkan modal -->
                    <button type="button"
                      class="btn btn-danger btn-sm"
                      data-bs-toggle="modal"
                      data-bs-target="#modalHapusAdmin<?= $a['id_admin'] ?>">
                      <i class="bi bi-trash"></i> Hapus
                    </button>

                    <!-- Modal Konfirmasi Hapus -->
                    <div class="modal fade" id="modalHapusAdmin<?= $a['id_admin'] ?>" tabindex="-1" aria-labelledby="modalLabelAdmin<?= $a['id_admin'] ?>" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content" style="border-radius:16px;">
                          <div class="modal-header" style="border-bottom: none; background: #f8fafc;">
                            <h5 class="modal-title" id="modalLabelAdmin<?= $a['id_admin'] ?>">
                              <i class="bi bi-exclamation-triangle text-danger"></i> Konfirmasi Hapus Admin
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body text-center" style="background: #fff;">
                            <div class="card shadow-sm border-0 mx-auto" style="max-width:350px; border-radius: 12px;">
                              <div class="card-body">
                                <p class="mb-3" style="font-size:1.1rem;">
                                  Apakah Anda yakin ingin menghapus admin <strong><?= esc($a['nama_admin']) ?></strong>?
                                </p>
                                <div class="d-flex justify-content-center gap-2">
                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                  <a href="<?= base_url('admin/hapus-admin/' . $a['id_admin']) ?>" class="btn btn-danger">
                                    <i class="bi bi-trash"></i> Hapus
                                  </a>
                                </div>
                              </div>
                            </div>
                          </div>
                          <!-- Tidak perlu modal-footer -->
                        </div>
                      </div>
                    </div>
                    <!-- End Modal -->
                  </td>
                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
          <?php if (empty($admin)): ?>
          <div class="alert alert-info text-center mt-4" style="border-radius: 10px;">
            <i class="bi bi-info-circle"></i> Belum ada data admin.
          </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Bootstrap Icons CDN (if not already included) -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
<!-- Bootstrap 5 Modal JS (pastikan sudah ada di layout utama, jika belum tambahkan di bawah ini) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
