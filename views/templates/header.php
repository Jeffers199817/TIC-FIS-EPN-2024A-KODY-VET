<header class="header">
    <div class="header__contenedor">
    <nav class="header__navegacion">
        
            <?php if(is_auth()) { ?>
                <a href="<?php echo is_admin() ? '/admin/dashboard' : '/finalizar-registro'; ?>" class="header__enlace">Administrar</a>
                <form method="POST" action="/logout" class="header__form">
                    <input type="submit" value="Cerrar Sesión" class="header__submit">
                </form>
            <?php } else { ?>


        <a href="/registro" class="header__enlace">Registro</a>
        <a href="/login"  class="header__enlace">Iniciar Sesión</a>

              <?php } ?>
    </nav>

    <div class="header__contenido">
        <a href="/">
            <h1 class="header__logo">
                 KODY-VET                </h1>

                </a>

                <p class="header__texto">Septiembre 4-5 - 2024</p>
                <p class="header__texto header__texto--modalidad">En Línea - Presencial</p>
                <a href="/registro" class="header__boton">Comprar Pase</a>
            </h1>
        </a>
    </div>

    </div>
</header>

<div class="barra">
    <div class="barra__contenido">
        <a href="../login">
        <h2 class="barra__logo">   KODY-VET
            
        </h2>
        </a>
        <nav class="navegacion">
            <a href="/chat-dog" class="navegacion__enlace <?php echo pagina_actual('/chat-dog') ? 'navegacion__enlace--actual': '' ?>">Chat Dog</a>
            <a href="/milenyum-dog" class="navegacion__enlace <?php echo pagina_actual('/milenyum-dog') ? 'navegacion__enlace--actual': '' ?>">Nosotros</a>
            <a href="/paquetes" class="navegacion__enlace <?php echo pagina_actual('/paquetes') ? 'navegacion__enlace--actual': '' ?>">Paquetes</a>
            <a href="/conferencias-workshops" class="navegacion__enlace <?php echo pagina_actual('/conferencias-workshops') ? 'navegacion__enlace--actual': '' ?>">Workshops / Conferencias</a>
            <a href="/registro" class="navegacion__enlace <?php echo pagina_actual('/registro') ? 'navegacion__enlace--actual': '' ?>" >Comprar Pase</a>
        </nav>
    </div>


</div>