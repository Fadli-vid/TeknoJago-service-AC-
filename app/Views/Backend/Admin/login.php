<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
        body {
            background: rgb(56, 189, 248);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Arial', sans-serif;
        }

        .main-content {
            background: #f8fafc;
            min-height: 100vh;
        }

        .login-card {
            background: #fff;
            border: none;
            border-radius: 18px;
            box-shadow: 0 4px 24px rgba(56, 189, 248, 0.10), 0 1.5px 6px rgba(44, 62, 80, 0.07);
            padding: 40px 32px 32px 32px;
            max-width: 420px;
            margin: auto;
        }

        .login-icon {
            font-size: 3.5rem;
            color: rgb(56, 189, 248);
            margin-bottom: 10px;
        }

        .form-label {
            margin-bottom: 8px;
            font-weight: 600;
            color: #2563eb;
        }

        .form-control:focus {
            box-shadow: 0 0 0 2px #2563eb33;
            border-color: #2563eb;
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

        .login-title {
            font-weight: 700;
            color: #2d3748;
            letter-spacing: 1px;
        }
    </style>
</head>

<body>
    <!-- Main Content -->
    <div class="main-content p-4 w-100" style="background: #f8fafc; min-height: 100vh;">
        <div class="row justify-content-center align-items-center" style="min-height: 90vh;">
            <div class="col-md-7 col-lg-5">
                <div class="card shadow-sm border-0" style="border-radius: 18px;">
                    <div class="card-body p-4">
                        <div class="text-center mb-4">
                            <span style="font-size: 3rem; color: #2563eb;">
                                <i class="bi bi-shield-lock"></i>
                            </span>
                            <h3 class="mb-1" style="font-weight: 700; color: #2d3748;">Login Admin</h3>
                            <div class="text-muted" style="font-size: 1.05rem;">Panel Admin Tekno Jago</div>
                        </div>
                        <?php if(session()->getFlashdata('error')): ?>
                        <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
                        <?php endif; ?>
                        <form method="post" action="<?= base_url('/loginadmin/auth') ?>">
                            <div class="mb-3">
                                <label for="username_admin" class="form-label fw-semibold">Username</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-white border-end-0"><i class="bi bi-person"></i></span>
                                    <input type="text" name="username_admin" id="username_admin"
                                        class="form-control border-start-0" required autocomplete="username">
                                </div>
                            </div>
                            <div class="mb-4">
                                <label for="password" class="form-label fw-semibold">Password</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-white border-end-0"><i class="bi bi-lock"></i></span>
                                    <input type="password" name="password" id="password"
                                        class="form-control border-start-0" required autocomplete="current-password">
                                </div>
                            </div>
                            <button type="submit"
                                class="btn btn-primary btn-lg w-100 shadow-sm" style="border-radius: 8px;">
                                <i class="bi bi-box-arrow-in-right"></i> Login
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
