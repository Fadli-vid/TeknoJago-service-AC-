<!-- Sidebar -->
<div class="sidebar p-3" style="min-width: 220px; background: #22223b; color: #fff; min-height: 100vh; border-radius: 0 18px 18px 0; box-shadow: 2px 0 12px rgba(44,62,80,0.07);">
  <div class="mb-4 d-flex align-items-center gap-2">
    <span style="font-size: 2rem; color: #38bdf8;"><i class="bi bi-person-gear"></i></span>
    <span style="font-size: 1.35rem; font-weight: 700; letter-spacing: 1px;">Tekno Jago</span>
  </div>
  <hr style="border-color: #374151;">

  <!-- Dashboard -->
  <a href="<?= site_url('admin') ?>" class="d-flex align-items-center mb-2 sidebar-link text-decoration-none px-3 py-2 rounded <?= (uri_string() == 'admin') ? 'active' : '' ?>">
    <i class="bi bi-speedometer2 me-2"></i>
    <span>Dashboard</span>
  </a>

  <!-- Pemesanan -->
  <a href="<?= site_url('admin/pemesanan') ?>" class="d-flex align-items-center mb-2 sidebar-link text-decoration-none px-3 py-2 rounded <?= (uri_string() == 'admin/pemesanan') ? 'active' : '' ?>">
    <i class="bi bi-clipboard2-check me-2"></i>
    <span>Pemesanan</span>
  </a>

  <!-- Data Teknisi -->
  <a href="<?= site_url('admin/teknisi') ?>" class="d-flex align-items-center mb-2 sidebar-link text-decoration-none px-3 py-2 rounded <?= (uri_string() == 'admin/teknisi') ? 'active' : '' ?>">
    <i class="bi bi-tools me-2"></i>
    <span>Data Teknisi</span>
  </a>

  <!-- Data Admin -->
  <a href="<?= site_url('admin/data-admin') ?>" class="d-flex align-items-center mb-2 sidebar-link text-decoration-none px-3 py-2 rounded <?= (uri_string() == 'admin/data-admin') ? 'active' : '' ?>">
    <i class="bi bi-person-badge me-2"></i>
    <span>Data Admin</span>
  </a>

  <!-- Data User -->
  <a href="<?= site_url('admin/data-customer') ?>" class="d-flex align-items-center mb-2 sidebar-link text-decoration-none px-3 py-2 rounded <?= (uri_string() == 'admin/data-customer') ? 'active' : '' ?>">
    <i class="bi bi-people me-2"></i>
    <span>Data Customer</span>
  </a>

  <!-- Riwayat -->
  <a href="<?= site_url('admin/riwayat') ?>" class="d-flex align-items-center mb-2 sidebar-link text-decoration-none px-3 py-2 rounded <?= (uri_string() == 'admin/riwayat') ? 'active' : '' ?>">
    <i class="bi bi-clock-history me-2"></i>
    <span>Riwayat</span>
  </a>

  <!-- Logout -->
  <a href="<?= site_url('/loginadmin/logout') ?>" class="d-flex align-items-center mt-4 sidebar-link text-decoration-none px-3 py-2 rounded text-danger" style="background:rgba(244,63,94,0.08);">
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
