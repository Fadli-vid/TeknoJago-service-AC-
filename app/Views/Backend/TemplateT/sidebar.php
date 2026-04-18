<!-- Sidebar untuk Teknisi -->
<div class="sidebar p-3" style="min-width: 220px; background: #22223b; color: #fff; min-height: 100vh; border-radius: 0 18px 18px 0; box-shadow: 2px 0 12px rgba(44,62,80,0.07);">
    <div class="mb-4 d-flex align-items-center gap-2">
        <span style="font-size: 2rem; color: #38bdf8;"><i class="bi bi-tools"></i></span>
        <span style="font-size: 1.35rem; font-weight: 700; letter-spacing: 1px;">Tekno Jago</span>
    </div>
    <hr style="border-color: #374151;">

    <a href="<?= base_url('teknisi') ?>" class="d-flex align-items-center mb-2 sidebar-link text-decoration-none px-3 py-2 rounded <?= (uri_string() == 'teknisi') ? 'active' : '' ?>">
        <i class="bi bi-speedometer2 me-2"></i>
        <span>Dashboard</span>
    </a>
    <a href="<?= base_url('teknisi/pemesanan') ?>" class="d-flex align-items-center mb-2 sidebar-link text-decoration-none px-3 py-2 rounded <?= (uri_string() == 'teknisi/pemesanan') ? 'active' : '' ?>">
        <i class="bi bi-clipboard2-check me-2"></i>
        <span>Pemesanan</span>
    </a>
    <a href="#" data-bs-toggle="modal" data-bs-target="#modalBukanAdmin" class="d-flex align-items-center mb-2 sidebar-link text-decoration-none px-3 py-2 rounded">
        <i class="bi bi-tools me-2"></i>
        <span>Data Teknisi</span>
    </a>
    <a href="#" data-bs-toggle="modal" data-bs-target="#modalBukanAdmin" class="d-flex align-items-center mb-2 sidebar-link text-decoration-none px-3 py-2 rounded">
        <i class="bi bi-tools me-2"></i>
        <span>Data Customer</span>
    </a>
    <a href="<?= base_url('teknisi/riwayat') ?>" class="d-flex align-items-center mb-2 sidebar-link text-decoration-none px-3 py-2 rounded <?= (uri_string() == 'teknisi/riwayat') ? 'active' : '' ?>">
        <i class="bi bi-clock-history me-2"></i>
        <span>Riwayat</span>
    </a>
    <a href="<?= base_url('teknisi/logout') ?>" class="d-flex align-items-center mt-4 sidebar-link text-decoration-none px-3 py-2 rounded text-danger" style="background:rgba(244,63,94,0.08);">
        <i class="bi bi-box-arrow-right me-2"></i>
        <span>Keluar</span>
    </a>
</div>

<style>
  .sidebar-link {
    color: #e5e7eb;
    transition: background 0.15s, color 0.15s;
    font-size: 1.08rem;
    font-weight: 500;
  }
  .sidebar-link:hover, .sidebar-link.active {
    background: #38bdf8 !important;
    color: #fff !important;
    box-shadow: 0 2px 8px rgba(56,189,248,0.08);
  }
  .sidebar-link i {
    font-size: 1.2rem;
    transition: color 0.15s;
  }
  .sidebar-link.active i, .sidebar-link:hover i {
    color: #fff !important;
  }
</style>

<!-- Bootstrap Icons CDN (if not already included) -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

<!-- Modal Peringatan Bukan Admin -->
<div class="modal fade" id="modalBukanAdmin" tabindex="-1" aria-labelledby="modalBukanAdminLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content" style="border-radius:16px;">
      <div class="modal-header" style="border-bottom: none; background: #f8fafc;">
        <h5 class="modal-title" id="modalBukanAdminLabel">
          <i class="bi bi-exclamation-triangle text-danger"></i> Peringatan
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
      </div>
      <div class="modal-body text-center" style="background: #fff;">
        <div class="card shadow-sm border-0 mx-auto" style="max-width:350px; border-radius: 12px;">
          <div class="card-body">
            <p class="mb-3" style="font-size:1.1rem;">
              <strong>Anda bukan admin!</strong><br>
              Hanya admin yang dapat mengakses menu ini.
            </p>
            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">OK</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- End Modal -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>