<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#5368e8">

    <title>Login | Perumdam Tirta Kencana</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <link rel="stylesheet" href="{{ asset('assets/dist/css/signin.css') }}">
</head>

<body>

    <main class="login-page">

        <!-- Ornamen vector air -->
        <div class="water-vector water-drop-one">
            <i class="fa-solid fa-droplet"></i>
        </div>

        <div class="water-vector water-drop-two">
            <i class="fa-solid fa-droplet"></i>
        </div>

        <div class="water-circle circle-one"></div>
        <div class="water-circle circle-two"></div>

        <div class="water-wave">
            <svg viewBox="0 0 1440 250" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 120 C180 30 300 220 520 130 S850 40 1080 130 S1300 190 1440 80 V250 H0 Z"
                    fill="rgba(255,255,255,0.12)" />
                <path d="M0 160 C200 70 350 240 570 150 S900 70 1100 160 S1300 210 1440 120 V250 H0 Z"
                    fill="rgba(255,255,255,0.10)" />
                <path d="M0 190 C200 110 350 250 580 180 S900 110 1150 190 S1320 230 1440 160" fill="none"
                    stroke="rgba(255,255,255,0.30)" stroke-width="3" />
            </svg>
        </div>

        <section class="login-card">

            <div class="login-brand">

                <div class="brand-logo">
                    <img src="{{ asset('assets/dist/img/logo.png') }}" alt="Logo Perumdam Tirta Kencana">
                </div>

                <div class="brand-name">
                    <h2>PERUMDAM TIRTA KENCANA</h2>
                    <span>KOTA SAMARINDA</span>
                </div>

                <div class="brand-line"></div>

                <div class="welcome-text">
                    <h1>Selamat Datang</h1>
                    <p>
                        Silakan masuk untuk mengakses sistem
                        Perumdam Tirta Kencana.
                    </p>
                </div>

                <div class="brand-watermark">
                    <i class="fa-solid fa-droplet"></i>
                </div>

            </div>

            <div class="login-form-container">

                <div class="form-heading">
                    <span class="heading-line"></span>
                    <h2>Masuk ke Sistem</h2>
                    <p>Gunakan akun Anda untuk melanjutkan.</p>
                </div>

                @if ($errors->any())
                    <div class="login-alert">
                        <i class="fa-solid fa-circle-exclamation"></i>
                        <div>
                            @foreach ($errors->all() as $error)
                                <p>{{ $error }}</p>
                            @endforeach
                        </div>
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="form-group">
                        <label for="email">Email / Username</label>

                        <div class="input-wrapper">
                            <i class="fa-regular fa-user input-icon"></i>

                            <input type="text" id="email" name="email" value="{{ old('email') }}"
                                placeholder="Masukkan email atau username" autocomplete="username" required autofocus>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>

                        <div class="input-wrapper">
                            <i class="fa-solid fa-lock input-icon"></i>

                            <input type="password" id="password" name="password" placeholder="Masukkan password"
                                autocomplete="current-password" required>

                            <button type="button" class="password-toggle" id="togglePassword"
                                aria-label="Tampilkan password">
                                <i class="fa-regular fa-eye"></i>
                            </button>
                        </div>
                    </div>

                    <div class="form-options">
                        <label class="remember-me">
                            <input type="checkbox" name="remember" value="1">
                            <span>Ingat saya</span>
                        </label>

                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="forgot-password">
                                Lupa password?
                            </a>
                        @endif
                    </div>

                    <button type="submit" class="login-button">
                        <span>Masuk ke Sistem</span>
                        <i class="fa-solid fa-arrow-right"></i>
                    </button>

                </form>

                <div class="login-footer">
                    <span></span>
                    <p>PERUMDAM TIRTA KENCANA</p>
                    <span></span>
                </div>

                <div class="security-note">
                    <i class="fa-solid fa-shield-halved"></i>
                    <span>Akses sistem yang aman dan terlindungi</span>
                </div>

            </div>

        </section>

        <footer class="page-footer">
            &copy; {{ date('Y') }} Perumdam Tirta Kencana Kota Samarinda
        </footer>

    </main>

    <script>
        const togglePassword = document.getElementById('togglePassword');
        const passwordInput = document.getElementById('password');

        togglePassword.addEventListener('click', function() {
            const isPassword = passwordInput.type === 'password';

            passwordInput.type = isPassword ? 'text' : 'password';

            this.innerHTML = isPassword ?
                '<i class="fa-regular fa-eye-slash"></i>' :
                '<i class="fa-regular fa-eye"></i>';
        });
    </script>

</body>

</html>
