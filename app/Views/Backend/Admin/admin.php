<!-- Main content -->
<div class="main-content p-4 w-100" style="background: #f8fafc; min-height: 100vh;">
  <div class="navbar d-flex justify-content-between align-items-center mb-4"
    style="background: #fff; border-radius: 12px; box-shadow: 0 2px 8px rgba(0,0,0,0.04); padding: 20px;">
    <div>
      <h2 class="mb-0" style="font-weight: 700; color: #2d3748;">
        👋 Welcome, <?= session()->get('namaadmin') ?>
      </h2>
    </div>
    <div>
      <a href="<?= base_url('loginadmin/logout') ?>" class="btn btn-danger btn-lg shadow-sm">
        <i class="bi bi-box-arrow-right"></i> Logout
      </a>
    </div>
  </div>

  <div class="row mb-4">
    <div class="col-12">
      <div class="card shadow-sm border-0" style="border-radius: 16px;">
        <div class="card-body">
          <h3 class="card-title mb-3" style="color: #2563eb;">Admin Dashboard</h3>
          <p class="card-text" style="font-size: 1.1rem;">
            <strong>Selamat datang di Panel Admin Tekno Jago!</strong>
            <br>Kelola data teknisi, pemesanan, dan pantau riwayat servis dengan mudah dan efisien.
            <br><span class="text-muted">Pastikan layanan terbaik untuk pelanggan Tekno Jago.</span>
          </p>
        </div>
      </div>
    </div>
  </div>

  <div class="row g-4">
    <div class="col-md-3">
      <div class="card h-100 shadow-sm border-0" style="border-radius: 16px;">
        <div class="card-body text-center">
          <div class="mb-3" style="font-size: 2.5rem; color: #0ea5e9;">
            <i class="bi bi-people"></i>
          </div>
          <h5 class="card-title">Jumlah Pelanggan</h5>
          <p class="card-text fs-4"><?= $jumlahPelanggan ?></p>
          <div class="text-muted" style="font-size: 0.98rem;">Total pelanggan terdaftar</div>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card h-100 shadow-sm border-0" style="border-radius: 16px;">
        <div class="card-body text-center">
          <div class="mb-3" style="font-size: 2.5rem; color: #6366f1;">
            <i class="bi bi-person-gear"></i>
          </div>
          <h5 class="card-title">Jumlah Teknisi</h5>
          <p class="card-text fs-4"><?= $jumlahTeknisi ?></p>
          <div class="text-muted" style="font-size: 0.98rem;">Total teknisi terdaftar</div>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card h-100 shadow-sm border-0" style="border-radius: 16px;">
        <div class="card-body text-center">
          <div class="mb-3" style="font-size: 2.5rem; color: #38bdf8;">
            <i class="bi bi-clipboard2-check"></i>
          </div>
          <h5 class="card-title">Total Pemesanan</h5>
          <p class="card-text fs-4"><?= $pemesananHariIni ?></p>
          <div class="text-muted" style="font-size: 0.98rem;">Pemesanan servis masuk hari ini</div>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card h-100 shadow-sm border-0" style="border-radius: 16px;">
        <div class="card-body text-center">
          <div class="mb-3" style="font-size: 2.5rem; color: #22c55e;">
            <i class="bi bi-check-circle"></i>
          </div>
          <h5 class="card-title">Riwayat Selesai</h5>
          <p class="card-text fs-4"><?= $riwayatSelesai ?></p>
          <div class="text-muted" style="font-size: 0.98rem;">Total servis selesai</div>
        </div>
      </div>
    </div>
  </div>

  <div class="row mt-5">
    <div class="col-12 text-center">
      <div class="alert alert-primary shadow-sm" style="border-radius: 12px;">
        <strong>Tekno Jago Admin:</strong> Siap Melayani & Mengelola Data dengan Profesional!
        <br>
        <span class="text-muted">Jaga kualitas layanan dan kepuasan pelanggan bersama Tekno Jago.</span>
      </div>
    </div>
  </div>
</div>

<!-- Bootstrap Icons CDN (if not already included) -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
