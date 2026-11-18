<div class="hero-card" style="flex-direction: column; align-items: flex-start; gap: 1.5rem;">
    <div style="display: flex; align-items: center; gap: 1.5rem; flex-wrap: wrap;">
        <div class="avatar-wrapper" style="width: 100px; height: 100px;">
            <img src="<?php echo htmlspecialchars($perfil['foto']); ?>" alt="Foto" style="width: 100%; height: 100%; object-fit: cover; object-position: top;">
        </div>
        <div>
            <span class="badge" style="margin-bottom: 0.4rem; display: inline-block;">Perfil de Autora</span>
            <h2 style="font-family: 'Plus Jakarta Sans', sans-serif; font-size: 1.6rem;"><?php echo htmlspecialchars($perfil['nombre']); ?></h2>
            <p class="hero-subtitle"><?php echo htmlspecialchars($perfil['ciclo']); ?></p>
        </div>
    </div>
    
    <div style="color: var(--text-muted); font-size: 0.95rem; line-height: 1.7;">
        <p style="margin-bottom: 1rem;"><?php echo htmlspecialchars($perfil['bio']); ?></p>
        <p style="margin-bottom: 0.5rem;"><strong>Áreas de interés principal:</strong> Gestión y análisis de datos, estruturación de información para la toma de decisiones, desarrollo web modular y herramientas tecnológicas modernas.</p>
        <p><strong>Contacto institucional:</strong> <a href="mailto:<?php echo htmlspecialchars($perfil['correo']); ?>" style="color: var(--accent);"><?php echo htmlspecialchars($perfil['correo']); ?></a></p>
        <p><strong>GitHub:</strong> <a href="<?php echo htmlspecialchars($perfil['github']); ?>" target="_blank" style="color: var(--accent);"><?php echo htmlspecialchars($perfil['github']); ?></a></p>
    </div>

    <div style="margin-top: 1rem;">
        <a href="?sec=inicio" class="btn-nav">← Volver al inicio del blog</a>
    </div>
</div>