<?php
include_once __DIR__ . '/conferencias.php';
?>

<section class="resumen">
    <div class="resumen__grid">
        <div <?php aos_animacion(); ?> class="resumen__bloque">
            <p class="resumen__texto resumen__texto--numero"><?php echo $ponentes_total; ?></p>
            <p class="resumen__texto">Speakers</p>
        </div>

        <div <?php aos_animacion(); ?> class="resumen__bloque">
            <p class="resumen__texto resumen__texto--numero"><?php echo $conferencias_total; ?></p>
            <p class="resumen__texto">Conferencias</p>
        </div>

        <div <?php aos_animacion(); ?> class="resumen__bloque">
            <p class="resumen__texto resumen__texto--numero"><?php echo $workshops_total; ?></p>
            <p class="resumen__texto">Workshops</p>
        </div>

        <div <?php aos_animacion(); ?> class="resumen__bloque">
            <p class="resumen__texto resumen__texto--numero">500</p>
            <p class="resumen__texto">Asistentes</p>
        </div>
    </div>
</section>

<section class="speakers">
    <h2 class="speakers__heading">Speakers</h2>
    <p class="speakers__descripcion">Conoce a nuestros expertos de Milenyum-Dog</p>

    <div class="speakers__grid">
        <?php foreach ($ponentes as $ponente) { ?>
            <div <?php aos_animacion(); ?> class="speaker">
                <picture>
                    <source srcset="img/speakers/<?php echo $ponente->imagen; ?>.webp" type="image/webp">
                    <source srcset="img/speakers/<?php echo $ponente->imagen; ?>.png" type="image/png">
                    <img class="speaker__imagen" loading="lazy" width="200" height="300" src="img/speakers/<?php echo $ponente->imagen; ?>.png" alt="Imagen Ponente">
                </picture>

                <div class="speaker__informacion">
                    <h4 class="speaker__nombre">
                        <?php echo $ponente->nombre . ' ' . $ponente->apellido; ?>
                    </h4>

                    <p class="speaker__ubicacion">
                        <?php echo $ponente->ciudad . ', ' . $ponente->pais; ?>
                    </p>

                    <nav class="speaker-sociales">
                        <?php
                        $redes = json_decode($ponente->redes);
                        ?>

                        
                        <?php if (!empty($redes->facebook)) { ?>
                        <a class="menu-redes__enlace" rel="noopener noreferrer" target="_blank" href="https://facebook.com/">
                        <span class="speaker__ocultar">Facebook</span>
                        </a> 
                        <?php } ?>

                        <?php if (!empty($redes->twitter)) { ?>
                        <a class="menu-redes__enlace" rel="noopener noreferrer" target="_blank" href="https://x.com/">
                        <span class="speaker__ocultar">X</span>
                        </a>
                        <?php } ?> 

                        <?php if (!empty($redes->youtube)) { ?>
                        <a class="menu-redes__enlace" rel="noopener noreferrer" target="_blank" href="https://youtube.com/">
                        <span class="speaker__ocultar">YouTube</span>
                        </a> 
                        <?php } ?> 

                        <?php if (!empty($redes->instagram)) { ?>
                            <a class="menu-redes__enlace" rel="noopener noreferrer" target="_blank" href="https://instagram.com/">
                        <span class="speaker__ocultar">Instagram</span>
                        </a> 


                        <?php } ?> 

                        <?php if (!empty($redes->tiktok)) { ?>
                        <a class="menu-redes__enlace" rel="noopener noreferrer" target="_blank" href="https://tiktok.com/">
                        <span class="speaker__ocultar">Tiktok</span>
                            </a> 
                        <?php } ?> 

                        <?php if (!empty($redes->telegram)) { ?>
                        <a class="menu-redes__enlace" rel="noopener noreferrer" target="_blank" href="https://telegram.org/a/">
                        <span class="speaker__ocultar">Telegram</span>
                        </a>
                        <?php } ?> 
                    </nav>

                    <ul class="speaker__listado-skills">
                        <?php
                        $tags = explode(',', $ponente->tags);
                        foreach ($tags as $tag) {
                            ?>
                            <li class="speaker__skill"><?php echo $tag; ?></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        <?php } ?>
    </div>
</section>

<div id="mapa" class="mapa"></div>

<section class="boletos">
    <h2 class="boletos__heading">Boletos & Precios</h2>
    <p class="boletos__descripcion">Precios para DevWebCamp</p>

    <div class="boletos__grid">
        <div <?php aos_animacion(); ?> class="boleto boleto--presencial">
            <h4 class="boleto__logo">&#60;DevWebCamp /></h4>
            <p class="boleto__plan">Presencial</p>
            <p class="boleto__precio">$199</p>
        </div>

        <div <?php aos_animacion(); ?> class="boleto boleto--virtual">
            <h4 class="boleto__logo">&#60;DevWebCamp /></h4>
            <p class="boleto__plan">Virtual</p>
            <p class="boleto__precio">$49</p>
        </div>

        <div <?php aos_animacion(); ?> class="boleto boleto--gratis">
            <h4 class="boleto__logo">&#60;DevWebCamp /></h4>
            <p class="boleto__plan">Gratis</p>
            <p class="boleto__precio">Gratis - $0</p>
        </div>
    </div>

    <div class="boleto__enlace-contenedor">
        <a href="/paquetes" class="boleto__enlace">Ver Paquetes</a>
    </div>
</section>