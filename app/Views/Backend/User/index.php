<!-- Main content -->
<div class="main-content p-4 w-100" style="background: #f8fafc; min-height: 100vh;">
  <div class="navbar d-flex justify-content-between align-items-center mb-4" style="background: #fff; border-radius: 12px; box-shadow: 0 2px 8px rgba(0,0,0,0.04); padding: 20px;">
    <div>
      <h2 class="mb-0" style="font-weight: 700; color: #2d3748;">
        👋 Welcome, <?= session()->get('nama_user') ?>
      </h2>
    </div>
    <div>
      <a href="<?= base_url('/loginuser/logout') ?>" class="btn btn-danger btn-lg shadow-sm">
        <i class="bi bi-box-arrow-right"></i> Logout
      </a>
    </div>
  </div>

  <div class="row mb-4">
    <div class="col-12">
      <div class="card shadow-sm border-0" style="border-radius: 16px;">
        <div class="card-body">
          <h3 class="card-title mb-3" style="color: #2563eb;">User Dashboard</h3>
          <p class="card-text" style="font-size: 1.1rem;">
            <strong>Selamat datang di Dashboard Tekno Jago, <?= session()->get('nama_user') ?>!</strong>
            <br>Solusi Cepat dan Terpercaya untuk Servis Elektronik Anda!
            <br><span class="text-muted">Rasakan Kemudahan Mengelola Kebutuhan Servis Elektronik Rumah Anda Langsung dari Ujung Jari!</span>
          </p>
        </div>
      </div>
    </div>
  </div>

  <!-- Fitur Unggulan -->
  <div class="row g-4">
    <div class="col-md-4">
      <div class="card h-100 shadow-sm border-0" style="border-radius: 16px;">
        <div class="card-body text-center">
          <div class="mb-3" style="font-size: 2.5rem; color: #38bdf8;">
            <i class="bi bi-cart-check"></i>
          </div>
          <h5 class="card-title">Pemesanan Jasa Intuitif</h5>
          <p class="card-text">Pesan layanan servis untuk berbagai perangkat elektronik Anda hanya dalam beberapa klik. Pilih perangkat, jelaskan kendala, dan tentukan jadwal kunjungan teknisi.</p>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card h-100 shadow-sm border-0" style="border-radius: 16px;">
        <div class="card-body text-center">
          <div class="mb-3" style="font-size: 2.5rem; color: #f59e42;">
            <i class="bi bi-clock-history"></i>
          </div>
          <h5 class="card-title">Pantau Status Servis Real-Time</h5>
          <p class="card-text">Lacak status pemesanan Anda secara real-time, mulai dari konfirmasi, penugasan teknisi, perjalanan, pengerjaan, hingga selesai. Dapatkan notifikasi di setiap tahap.</p>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card h-100 shadow-sm border-0" style="border-radius: 16px;">
        <div class="card-body text-center">
          <div class="mb-3" style="font-size: 2.5rem; color: #22c55e;">
            <i class="bi bi-journal-text"></i>
          </div>
          <h5 class="card-title">Riwayat Servis Lengkap</h5>
          <p class="card-text">Akses riwayat lengkap semua servis yang pernah Anda pesan. Informasi detail perangkat, kerusakan, perbaikan, dan biaya tersimpan rapi untuk referensi Anda.</p>
        </div>
      </div>
    </div>
  </div>

  <div class="row g-4 mt-2">
    <div class="col-md-4">
      <div class="card h-100 shadow-sm border-0" style="border-radius: 16px;">
        <div class="card-body text-center">
          <div class="mb-3" style="font-size: 2.5rem; color: #6366f1;">
            <i class="bi bi-person-badge"></i>
          </div>
          <h5 class="card-title">Profil Teknisi Terverifikasi</h5>
          <p class="card-text">Kenali teknisi ahli yang akan menangani perangkat Anda.</p>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card h-100 shadow-sm border-0" style="border-radius: 16px;">
        <div class="card-body text-center">
          <div class="mb-3" style="font-size: 2.5rem; color: #f43f5e;">
            <i class="bi bi-person-gear"></i>
          </div>
          <h5 class="card-title">Manajemen Akun Mudah</h5>
          <p class="card-text">Perbarui informasi pribadi, alamat, dan preferensi Anda dengan mudah melalui pengaturan akun yang user-friendly.</p>
        </div>
      </div>
    </div>
  </div>

  <div class="row mt-5">
    <div class="col-12 text-center">
      <div class="alert alert-primary shadow-sm" style="border-radius: 12px;">
        <strong>Tekno Jago:</strong> Jagonya Urusan Elektronik Anda!<br>
        <span class="text-muted">Nikmati kemudahan dan keandalan layanan servis elektronik bersama Tekno Jago.</span>
      </div>
    </div>
  </div>
</div>

<!-- Bootstrap Icons CDN (if not already included) -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
