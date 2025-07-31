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
                    <img src="/img/nicaragua-map.svg" alt="Mapa de Nicaragua" width="220" height="250" style="display:block; margin-bottom:18px;">
                    <h1 class="mt-4 mb-2">E-GO</h1>
                    <p>¡Emprende ahora!</p>
                </div>
                <!-- Right panel -->
                <div class="right-panel col-12 col-md-7" >
                    
                    <h2 class="mb-1 text-center">Iniciar Sesión</h2>
                    @if(session()->has('message'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('message') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="mb-3">
                            <input type="text" class="form-control" placeholder="Usuario" required name="name">
                        </div>
                        <div class="mb-2">
                            <input type="password" class="form-control" placeholder="Contraseña" required name="password">
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
</body>
</html>