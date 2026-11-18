<?php
require_once __DIR__ . '/datos_blog.php';

// Determinar qué sección cargar de la carpeta secciones/
$seccion = isset($_GET['sec']) ? $_GET['sec'] : 'inicio';
$archivoSeccion = __DIR__ . '/secciones/' . $seccion . '.php';

// Si la sección no existe, cargar inicio por defecto
if (!file_exists($archivoSeccion)) {
    // Revisar si es un artículo individual por slug
    $articuloEncontrado = null;
    foreach ($articulos as $art) {
        if ($art['slug'] === $seccion) {
            $articuloEncontrado = $art;
            break;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($perfil['titulo_blog']); ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Plus+Jakarta+Sans:wght@600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg: #FAFAFA; --surface: #FFFFFF; --surface-alt: #F3F4F6;
            --text: #18181B; --text-muted: #52525B; --border: #E4E4E7;
            --accent: #2563EB; --accent-soft: #EFF6FF; --radius: 14px;
        }
        [data-theme="dark"] {
            --bg: #111113; --surface: #18181B; --surface-alt: #27272A;
            --text: #F4F4F5; --text-muted: #A1A1AA; --border: #27272A;
            --accent: #60A5FA; --accent-soft: rgba(96, 165, 250, 0.12);
        }
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: 'Inter', sans-serif; background-color: var(--bg); color: var(--text); line-height: 1.6; }
        header { background: var(--surface); border-bottom: 1px solid var(--border); position: sticky; top: 0; z-index: 50; }
        .nav-container { max-width: 1100px; margin: 0 auto; padding: 1rem 1.5rem; display: flex; justify-content: space-between; align-items: center; }
        .brand { font-family: 'Plus Jakarta Sans', sans-serif; font-weight: 700; color: var(--text); text-decoration: none; display: flex; align-items: center; gap: 0.5rem; }
        .brand-dot { width: 10px; height: 10px; border-radius: 50%; background: var(--accent); }
        .nav-actions { display: flex; gap: 0.5rem; align-items: center; }
        .btn-nav, .btn-icon { background: var(--surface-alt); border: 1px solid var(--border); color: var(--text); padding: 0.4rem 0.8rem; border-radius: 8px; font-size: 0.85rem; cursor: pointer; text-decoration: none; }
        .container { max-width: 1100px; margin: 0 auto; padding: 2rem 1.5rem; }
        .hero-card { background: var(--surface); border: 1px solid var(--border); border-radius: var(--radius); padding: 2rem; display: flex; align-items: center; gap: 2rem; margin-bottom: 2rem; }
        .avatar-wrapper { width: 110px; height: 110px; border-radius: 50%; overflow: hidden; border: 3px solid var(--accent-soft); flex-shrink: 0; }
        .avatar-wrapper img { width: 100%; height: 100%; object-fit: cover; object-position: top; }
        .hero-info h1 { font-family: 'Plus Jakarta Sans', sans-serif; font-size: 1.5rem; margin-bottom: 0.2rem; }
        .hero-subtitle { color: var(--accent); font-weight: 600; font-size: 0.9rem; margin-bottom: 0.5rem; }
        .hero-bio { color: var(--text-muted); font-size: 0.92rem; }
        .toolbar { display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 1rem; margin-bottom: 1.5rem; padding-bottom: 0.8rem; border-bottom: 1px solid var(--border); }
        .categories { display: flex; gap: 0.4rem; flex-wrap: wrap; }
        .cat-btn { border: 1px solid var(--border); background: transparent; color: var(--text-muted); padding: 0.35rem 0.8rem; border-radius: 999px; font-size: 0.82rem; text-decoration: none; }
        .cat-btn.active, .cat-btn:hover { background: var(--accent); color: #fff; border-color: var(--accent); }
        .posts-container.view-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 1.5rem; }
        .posts-container.view-list { display: flex; flex-direction: column; gap: 1rem; }
        .post-card { background: var(--surface); border: 1px solid var(--border); border-radius: var(--radius); padding: 1.5rem; display: flex; flex-direction: column; justify-content: space-between; transition: transform 0.2s; }
        .post-card:hover { transform: translateY(-2px); border-color: var(--accent); }
        .post-meta { display: flex; gap: 0.6rem; font-size: 0.78rem; color: var(--text-muted); margin-bottom: 0.6rem; align-items: center; }
        .badge { background: var(--accent-soft); color: var(--accent); padding: 0.15rem 0.5rem; border-radius: 6px; font-weight: 600; }
        .post-title { font-family: 'Plus Jakarta Sans', sans-serif; font-size: 1.1rem; margin-bottom: 0.5rem; }
        .post-summary { color: var(--text-muted); font-size: 0.88rem; margin-bottom: 1rem; }
        .post-footer { display: flex; justify-content: space-between; align-items: center; border-top: 1px solid var(--border); padding-top: 0.8rem; }
        .btn-read { color: var(--accent); text-decoration: none; font-weight: 600; font-size: 0.85rem; }
        .like-btn { background: var(--surface-alt); border: 1px solid var(--border); color: var(--text-muted); padding: 0.25rem 0.6rem; border-radius: 999px; font-size: 0.78rem; cursor: pointer; }
        footer { text-align: center; padding: 2rem; border-top: 1px solid var(--border); color: var(--text-muted); font-size: 0.82rem; }
        @media (max-width: 768px) { .hero-card { flex-direction: column; text-align: center; } }
    </style>
</head>
<body>

<header>
    <div class="nav-container">
        <a href="?sec=inicio" class="brand">
            <span class="brand-dot"></span>
            <span>Diarly Tatiana | Blog</span>
        </a>
        <div class="nav-actions">
            <a href="?sec=sobre-mi" class="btn-nav">Sobre mí</a>
            <button class="btn-icon" id="themeToggle">🌓 Modo</button>
        </div>
    </div>
</header>

<main class="container">
    <!-- Tarjeta de autor fija arriba -->
    <section class="hero-card">
        <div class="avatar-wrapper">
            <img src="<?php echo htmlspecialchars($perfil['foto']); ?>" alt="Foto">
        </div>
        <div class="hero-info">
            <h1><?php echo htmlspecialchars($perfil['nombre']); ?></h1>
            <p class="hero-subtitle"><?php echo htmlspecialchars($perfil['subtitulo']); ?></p>
            <p class="hero-bio"><?php echo htmlspecialchars($perfil['bio']); ?></p>
        </div>
    </section>

    <!-- Cargador Dinámico de Secciones PHP -->
    <?php
    if (isset($articuloEncontrado) && $articuloEncontrado) {
        // Vista detallada de un artículo específico
        ?>
        <div class="hero-card" style="flex-direction: column; align-items: flex-start;">
            <a href="?sec=inicio" class="btn-nav" style="margin-bottom: 1rem;">← Volver al inicio</a>
            <div class="post-meta">
                <span class="badge"><?php echo htmlspecialchars($articuloEncontrado['categoria']); ?></span>
                <span><?php echo htmlspecialchars($articuloEncontrado['fecha']); ?></span>
                <span>• <?php echo htmlspecialchars($articuloEncontrado['lectura']); ?></span>
            </div>
            <h2 style="font-family: 'Plus Jakarta Sans'; font-size: 1.6rem; margin-bottom: 1rem;"><?php echo htmlspecialchars($articuloEncontrado['titulo']); ?></h2>
            <?php foreach ($articuloEncontrado['contenido'] as $parrafo): ?>
                <p style="margin-bottom: 1rem; color: var(--text-muted);"><?php echo htmlspecialchars($parrafo); ?></p>
            <?php endforeach; ?>
        </div>
        <?php
    } elseif (file_exists($archivoSeccion)) {
        include $archivoSeccion;
    } else {
        echo "<p>Sección no encontrada.</p>";
    }
    ?>
</main>

<footer>
    <p>© <?php echo date('Y'); ?> <?php echo htmlspecialchars($perfil['nombre']); ?> — Desarrollado en PHP modular y desplegado en Vercel[cite: 5].</p>
</footer>

<script>
    // Cambiar Modo Claro / Oscuro
    const themeToggle = document.getElementById('themeToggle');
    themeToggle.addEventListener('click', () => {
        const html = document.documentElement;
        const isDark = html.getAttribute('data-theme') === 'dark';
        html.setAttribute('data-theme', isDark ? 'light' : 'dark');
    });

    // Cambiar vistas de tarjetas a lista
    function cambiarVista(tipo) {
        const cont = document.getElementById('postsContainer');
        if(!cont) return;
        if(tipo === 'grid') {
            cont.className = 'posts-container view-grid';
        } else {
            cont.className = 'posts-container view-list';
        }
    }

    function darLike(btn) {
        let span = btn.querySelector('span');
        span.textContent = parseInt(span.textContent) + 1;
        btn.style.color = '#DC2626';
    }
</script>
</body>
</html>