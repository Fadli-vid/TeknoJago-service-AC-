<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Register</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
	<style>
		body {
			background: rgb(56,189,248);
			min-height: 100vh;
			display: flex;
			align-items: center;
			justify-content: center;
			font-family: 'Arial', sans-serif;
		}

		.register-card {
			background: #fff;
			border: none;
			border-radius: 18px;
			box-shadow: 0 4px 24px rgba(56, 189, 248, 0.10), 0 1.5px 6px rgba(44, 62, 80, 0.07);
			padding: 40px 32px 32px 32px;
			max-width: 420px;
			margin: auto;
		}

		.register-icon {
			font-size: 3.5rem;
			color: #38bdf8;
			margin-bottom: 10px;
		}

		.form-label {
			margin-bottom: 8px;
			font-weight: 600;
			color: #2563eb;
		}

		.form-control:focus {
			box-shadow: 0 0 0 2px #38bdf833;
			border-color: #38bdf8;
		}

		.btn-primary {
			background-color: #2563eb;
			border: none;
			font-weight: 600;
			border-radius: 8px;
		}

		.btn-primary:hover {
			background-color: #174ea6;
		}

		.text-center a {
			color: #2563eb;
			text-decoration: none;
			font-weight: 500;
		}

		.text-center a:hover {
			text-decoration: underline;
		}

		.register-title {
			font-weight: 700;
			color: #2d3748;
			letter-spacing: 1px;
		}
	</style>
</head>

<body>
	<div class="container">
		<div class="row justify-content-center align-items-center" style="min-height: 100vh;">
			<div class="col-12">
				<div class="register-card">
					<div class="text-center">
						<span class="register-icon"><i class="bi bi-person-plus"></i></span>
						<h3 class="register-title mb-2">Daftar Akun Baru</h3>
						<div class="mb-3 text-muted" style="font-size: 1.05rem;">Bergabung dengan Tekno Jago</div>
					</div>
					<form action="<?= base_url('/login/simpan') ?>" method="post">
						<div class="mb-3">
							<label for="nama_user" class="form-label">Nama Lengkap</label>
							<div class="input-group">
								<span class="input-group-text bg-white border-end-0"><i class="bi bi-person"></i></span>
								<input type="text" id="nama_user" name="nama_user" class="form-control border-start-0" placeholder="Nama Lengkap" required>
							</div>
						</div>
						<div class="mb-3">
							<label for="username" class="form-label">Username</label>
							<div class="input-group">
								<span class="input-group-text bg-white border-end-0"><i class="bi bi-person-badge"></i></span>
								<input type="text" id="username" name="username" class="form-control border-start-0" placeholder="Username" required>
							</div>
						</div>
						<div class="mb-3">
							<label for="alamat" class="form-label">Alamat</label>
							<div class="input-group">
								<span class="input-group-text bg-white border-end-0"><i class="bi bi-geo-alt"></i></span>
								<input type="text" id="alamat" name="alamat" class="form-control border-start-0" placeholder="Alamat" required>
							</div>
						</div>
						<div class="mb-3">
							<label for="no_telp" class="form-label">No HP</label>
							<div class="input-group">
								<span class="input-group-text bg-white border-end-0"><i class="bi bi-telephone"></i></span>
								<input type="text" id="no_telp" name="no_telp" class="form-control border-start-0" placeholder="08xxxxxxxxxx" required>
							</div>
						</div>
						<div class="mb-3">
							<label for="password" class="form-label">Password</label>
							<div class="input-group">
								<span class="input-group-text bg-white border-end-0"><i class="bi bi-lock"></i></span>
								<input type="password" id="password" name="password" class="form-control border-start-0" placeholder="Password" required>
							</div>
						</div>
						<button class="btn btn-primary w-100 mt-2" type="submit">
							<i class="bi bi-person-plus"></i> Daftar
						</button>
					</form>
					<p class="text-center mt-4 mb-0">
						Sudah punya akun? <a href="/login">Login disini</a>
					</p>
				</div>
			</div>
		</div>
	</div>
</body>

</html>
