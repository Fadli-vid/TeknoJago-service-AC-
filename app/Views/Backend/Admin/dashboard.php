<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Tekno Jago</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: white;
      color: #333;
    }

    /* Navbar */
    .navbar {
      background-color: #1e57d8;
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 15px 40px;
    }

    .logo {
      color: #fff;
      font-size: 28px;
      font-weight: bold;
    }

    .nav-buttons {
      display: flex;
      gap: 15px;
    }

    .login-btn {
      padding: 10px 20px;
      background-color: #ffffff;
      color: #1e57d8;
      border: none;
      border-radius: 6px;
      font-weight: bold;
      cursor: pointer;
      transition: all 0.3s ease;
    }

    .login-btn:hover {
      background-color: #d1e0ff;
      transform: scale(1.05);
    }

    /* Hero Section */
    .hero {
      padding: 60px 40px;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .hero-content {
      display: flex;
      align-items: center;
      gap: 50px;
      flex-wrap: wrap;
      max-width: 1200px;
    }

    .hero-content img {
      max-width: 420px;
      height: auto;
    }

    .hero-text h5 {
      color: #1e57d8;
      font-size: 16px;
      text-transform: uppercase;
      margin-bottom: 10px;
    }

    .hero-text h2 {
      font-size: 36px;
      font-weight: bold;
      margin-bottom: 20px;
    }

    .hero-text p {
      font-size: 18px;
      line-height: 1.6;
      max-width: 500px;
      margin-bottom: 30px;
    }

    /* Beautified Login Button */
    .hero-login-btn {
      background: linear-gradient(to right, #4e8cff, #3a6fe0);
      color: white;
      padding: 12px 28px;
      border: none;
      border-radius: 30px;
      font-size: 16px;
      font-weight: 600;
      cursor: pointer;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
      transition: all 0.3s ease-in-out;
    }

    .hero-login-btn:hover {
      transform: translateY(-2px) scale(1.05);
      box-shadow: 0 6px 16px rgba(0, 0, 0, 0.2);
    }

    /* Jenis Jasa */
    .jenis-jasa {
      padding: 60px 20px;
      text-align: center;
      font-size: 26px;
      font-weight: bold;
    }
    .dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: white;
 
  box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
  z-index: 1000;
  border-radius: 6px;
  overflow: hidden;
}

.dropdown-content a {
  color: #1e57d8;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  font-weight: 500;
  transition: background-color 0.3s;
}

.dropdown-content a:hover {
  background-color: #f1f1f1;
}

.dropdown.show .dropdown-content {
  display: block;
}

  </style>
</head>

<body>
  <header>
    <nav class="navbar">
      <div class="logo">Tekno Jago</div>
      <div class="nav-buttons">
        <div class="dropdown">
          <button class="login-btn" onclick="toggleDropdown()">Login</button>
          <div class="dropdown-content" id="loginDropdown">
            <a href="/loginadmin">Admin</a>
            <a href="/teknisi/login">Teknisi</a>
          </div>
        </div>
      </div>
      
    </nav>
  </header>

  <section class="hero">
    <div class="hero-content">
      <img src="<?= base_url('Assets/css/Service.jpg'); ?>" alt="Servis Ilustrasi" />
      <div class="hero-text">
        <h5>SERVICE? TINGGAL ORDER AJA!</h5>
        <h2>Langsung di Tekno Jago</h2>
        <p>
          Punya barang elektronik yang sedang rusak atau sudah tidak terpakai dan ingin memakainya lagi?
          Bingung ingin memperbaikinya namun tidak mempunyai informasi terkait penyedia? Kita ada solusinya.
        </p>
        <button class="hero-login-btn" onclick="location.href='/login'">Login Sekarang</button>
      </div>
    </div>
  </section>

  <script>
    function toggleDropdown() {
      document.querySelector(".dropdown").classList.toggle("show");
    }
  
    // Menutup dropdown jika diklik di luar
    window.onclick = function(event) {
      if (!event.target.matches('.login-btn')) {
        let dropdowns = document.getElementsByClassName("dropdown");
        for (let i = 0; i < dropdowns.length; i++) {
          let openDropdown = dropdowns[i];
          if (openDropdown.classList.contains('show')) {
            openDropdown.classList.remove('show');
          }
        }
      }
    }
  </script>
  
</body>

</html>
