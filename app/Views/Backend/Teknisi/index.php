<!-- Main content -->
<div class="main-content p-4 w-100" style="background: #f8fafc; min-height: 100vh;">
  <div class="navbar d-flex justify-content-between align-items-center mb-4"
    style="background: #fff; border-radius: 12px; box-shadow: 0 2px 8px rgba(0,0,0,0.04); padding: 20px;">
    <div>
      <h2 class="mb-0" style="font-weight: 700; color: #2d3748;">
        👋 Welcome, <?= session()->get('nama') ?> 
      </h2>
    </div>
    <div>
      <a href="<?= base_url('teknisi/logout') ?>" class="btn btn-danger btn-lg shadow-sm">
        <i class="bi bi-box-arrow-right"></i> Logout
      </a>
    </div>
  </div>

  <div class="row mb-4">
    <div class="col-12">
      <div class="card shadow-sm border-0" style="border-radius: 16px;">
        <div class="card-body">
          <h3 class="card-title mb-3" style="color: #2563eb;">Teknisi Dashboard</h3>
          <p class="card-text" style="font-size: 1.1rem;">
            <strong>Selamat datang di Panel Teknisi Tekno Jago!</strong>
            <br>Kelola pemesanan servis dan pantau riwayat pekerjaan Anda dengan mudah dan efisien.
            <br><span class="text-muted">Fokus pada pelayanan terbaik untuk pelanggan Tekno Jago.</span>
          </p>
        </div>
      </div>
    </div>
  </div>

  <div class="row g-4">
    <div class="col-md-4">
      <div class="card h-100 shadow-sm border-0" style="border-radius: 16px;">
        <div class="card-body text-center">
          <div class="mb-3" style="font-size: 2.5rem; color: #38bdf8;">
            <i class="bi bi-clipboard2-check"></i>
          </div>
          <h5 class="card-title">Pemesan Hari Ini</h5>
          <p class="card-text fs-4"><?= $pemesananHariIni ?></p>
          <div class="text-muted" style="font-size: 0.98rem;">Total pemesanan servis yang masuk hari ini</div>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card h-100 shadow-sm border-0" style="border-radius: 16px;">
        <div class="card-body text-center">
          <div class="mb-3" style="font-size: 2.5rem; color: #22c55e;">
            <i class="bi bi-check-circle"></i>
          </div>
          <h5 class="card-title">Riwayat Selesai</h5>
          <p class="card-text fs-4"><?= $riwayatSelesai ?></p>
          <div class="text-muted" style="font-size: 0.98rem;">Total servis yang telah Anda selesaikan</div>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card h-100 shadow-sm border-0" style="border-radius: 16px;">
        <div class="card-body text-center">
          <div class="mb-3" style="font-size: 2.5rem; color: #f59e42;">
            <i class="bi bi-clock-history"></i>
          </div>
          <h5 class="card-title">Pantau Riwayat</h5>
          <p class="card-text">Lihat riwayat lengkap pekerjaan servis Anda dan pantau progres setiap tugas.</p>
        </div>
      </div>
    </div>
  </div>

  <div class="row mt-5">
    <div class="col-12 text-center">
      <div class="alert alert-primary shadow-sm" style="border-radius: 12px;">
        <strong>Tekno Jago Teknisi:</strong> Profesional, Terpercaya, dan Siap Membantu Anda!
        <br>
        <span class="text-muted">Jaga kualitas layanan dan kepuasan pelanggan bersama Tekno Jago.</span>
      </div>
    </div>
  </div>
</div>

<!-- Bootstrap Icons CDN (if not already included) -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
