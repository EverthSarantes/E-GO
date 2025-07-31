<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'E-GO')</title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link href="/css/app.css" rel="stylesheet">
    @stack('styles')
</head>
<body>
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <!-- Sidebar -->
            <nav class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 sidebar d-flex flex-column collapse" id="sidebarMenu">
                <button type="button" class="btn btn-link text-white ms-auto d-lg-none" id="closeSidebarBtn" style="font-size:2rem;position:absolute;top:10px;right:18px;z-index:1100;display:none;">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="logo text-center mb-4">E-GO</div>
                <ul class="nav nav-pills flex-column mb-auto">
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="bi bi-house-door"></i> Inicio
                        </a>
                    </li>
                    <li>
                        <a href="#" class="nav-link">
                            <i class="bi bi-person"></i> Perfil
                        </a>
                    </li>
                    <li>
                        <a href="#" class="nav-link">
                            <i class="bi bi-briefcase"></i> Emprendimientos
                        </a>
                    </li>
                    <li>
                        <a href="{{route('entrepreneur.products.index')}}" class="nav-link">
                            <i class="bi bi-box"></i> Productos
                        </a>
                    </li>
                    <li>
                        <a href="{{route('admin.products.categories.index')}}" class="nav-link">
                            <i class="bi bi-gear"></i> Catalogos
                        </a>
                    </li>
                </ul>
                <hr class="d-none d-md-block">
                <div class="mt-auto mb-3 text-center d-none d-md-block">
                    <form action="{{route('logout')}}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-outline-light btn-sm">Cerrar sesión</button>
                    </form>
                </div>
            </nav>
            <!-- Main content -->
            <div class="col p-0">
                <!-- Navbar -->
                <nav class="navbar navbar-expand-lg navbar-light sticky-top px-3">
                    <div class="container-fluid">
                        <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <a class="navbar-brand d-lg-none" href="#">E-GO</a>
                        <div class="collapse navbar-collapse">
                            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Notificaciones</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Mi cuenta</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <main class="main-content">
                    @yield('content')
                </main>
            </div>
        </div>
    </div>
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
    <script>
    // Mostrar botón cerrar solo en móviles cuando sidebar está abierto
    function toggleSidebarCloseBtn() {
        var sidebar = document.getElementById('sidebarMenu');
        var closeBtn = document.getElementById('closeSidebarBtn');
        if (window.innerWidth < 992 && sidebar.classList.contains('show')) {
            closeBtn.style.display = 'block';
        } else {
            closeBtn.style.display = 'none';
        }
    }
    document.addEventListener('DOMContentLoaded', function() {
        var sidebar = document.getElementById('sidebarMenu');
        var closeBtn = document.getElementById('closeSidebarBtn');
        if (sidebar && closeBtn) {
            closeBtn.addEventListener('click', function() {
                sidebar.classList.remove('show');
                closeBtn.style.display = 'none';
            });
            // Detectar cambios de colapso
            sidebar.addEventListener('transitionend', toggleSidebarCloseBtn);
            // Detectar resize
            window.addEventListener('resize', toggleSidebarCloseBtn);
            // Detectar apertura
            var observer = new MutationObserver(toggleSidebarCloseBtn);
            observer.observe(sidebar, { attributes: true, attributeFilter: ['class'] });
        }
    });
    </script>
</body>
</html>
