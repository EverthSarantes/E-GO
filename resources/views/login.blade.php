<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Iniciar Sesión | E-GO</title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link href="/css/login.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="login-container">
            <div class="card card-login d-flex flex-row w-100">
                <!-- Left panel -->
                <div class="left-panel col-5 d-none d-md-flex flex-column align-items-center justify-content-center">
                    <!-- SVG Mapa Nicaragua con pines -->
                    <svg width="250" height="270" viewBox="0 0 250 270" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M30,220 Q10,120 80,40 Q170,-10 230,60 Q260,120 200,230 Q120,270 30,220 Z" fill="#e6e6fa" stroke="#b3b3e6" stroke-width="3"/>
                        <!-- Pines morados -->
                        <circle cx="60" cy="80" r="7" fill="#7b5cff"/>
                        <circle cx="120" cy="60" r="7" fill="#7b5cff"/>
                        <circle cx="200" cy="90" r="7" fill="#7b5cff"/>
                        <circle cx="80" cy="150" r="7" fill="#7b5cff"/>
                        <circle cx="170" cy="180" r="7" fill="#7b5cff"/>
                        <circle cx="60" cy="200" r="7" fill="#7b5cff"/>
                        <!-- Pines amarillos -->
                        <circle cx="100" cy="120" r="7" fill="#ffd600"/>
                        <circle cx="210" cy="210" r="7" fill="#ffd600"/>
                        <circle cx="150" cy="50" r="7" fill="#ffd600"/>
                    </svg>
                    <h1 class="mt-4 mb-2">E-GO</h1>
                    <p>¡Emprende ahora!</p>
                </div>
                <!-- Right panel -->
                <div class="right-panel col-12 col-md-7">
                    <h2 class="mb-1 text-center">Iniciar Sesión</h2>
                    <form>
                        <div class="mb-3">
                            <input type="text" class="form-control" placeholder="Usuario" required>
                        </div>
                        <div class="mb-2">
                            <input type="password" class="form-control" placeholder="Contraseña" required>
                        </div>
                        <div class="mb-3">
                            <a href="#" class="forgot-link">Recuperar contraseña</a>
                        </div>
                        <button type="submit" class="btn btn-login w-100">Ingresar</button>
                    </form>
                    <div class="my-3 text-center" style="color:#aaa;">o</div>
                    <button class="btn btn-social w-100 mb-2">
                        <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/google/google-original.svg" alt="Google"> Sign in with Google
                    </button>
                    <button class="btn btn-social w-100">
                        <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/facebook/facebook-original.svg" alt="Facebook"> Sign up with Facebook
                    </button>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Toggle Cliente/Emprendedor
        const btnCliente = document.getElementById('btnCliente');
        const btnEmprendedor = document.getElementById('btnEmprendedor');
        btnCliente.addEventListener('click', function() {
            btnCliente.classList.add('active');
            btnEmprendedor.classList.remove('active');
        });
        btnEmprendedor.addEventListener('click', function() {
            btnEmprendedor.classList.add('active');
            btnCliente.classList.remove('active');
        });
    </script>
</body>
</html>