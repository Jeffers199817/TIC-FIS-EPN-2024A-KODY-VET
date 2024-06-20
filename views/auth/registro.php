<main class="auth">
    <h2 class="auth__heading"><?php echo $titulo; ?></h2>
    <p class="auth__texto">Regístrate en KODY-VET</p> 

    <?php 
        require_once __DIR__ . '/../templates/alertas.php';
    ?>

    <form method="POST" action="/registro" class="formulario">
        <div class="formulario__campo">
            <label for="nombre" class="formulario__label">Nombre</label>
            <input
                type="text"
                class="formulario__input"
                placeholder="Tu Nombre"
                id="nombre"
                name="nombre"
                value="<?php echo $usuario->nombre; ?>"
            >
        </div>

        <div class="formulario__campo">
            <label for="apellido" class="formulario__label">Apellido</label>
            <input
                type="text"
                class="formulario__input"
                placeholder="Tu Apellido"
                id="apellido"
                name="apellido"
                value="<?php echo $usuario->apellido; ?>"
            >
        </div>

        <div class="formulario__campo">
            <label for="email" class="formulario__label">Email</label>
            <input
                type="email"
                class="formulario__input"
                placeholder="Tu Email"
                id="email"
                name="email"
                value="<?php echo $usuario->email; ?>"
            >
        </div>

        <!--DATOS DE LA MASCOTA-->
        <div class="formulario__campo">
            <label for="nombrem" class="formulario__label">Nombre Mascota</label>
            <input
                type="text"
                class="formulario__input"
                placeholder="Nombre de Tu Mascota"
                id="nombrem"
                name="nombrem"
                value="<?php echo $usuario->nombrem; ?>"
            >
        </div>

        <div class="formulario__campo">
            <label for="edadm" class="formulario__label">Edad Mascota</label>
            <input
                type="number"
                class="formulario__input"
                placeholder="Edad de Tu Mascota"
                id="edadm"
                name="edadm"
                value="<?php echo $usuario->edadm; ?>"
            >
        </div>
        <div class="formulario__campo">
            <label for="razam" class="formulario__label">Raza</label>
            <input
                type="text"
                class="formulario__input"
                placeholder="La raza de Tu Mascota"
                id="razam"
                name="razam"
                value="<?php echo $usuario->razam; ?>"
            >
        </div>

        <!--Fin de los Datos de mascota-->

        <div class="formulario__campo">
            <label for="password" class="formulario__label">Password</label>
            <input
                type="password"
                class="formulario__input"
                placeholder="Tu Password"
                id="password"
                name="password"
            >
        </div>

        <div class="formulario__campo">
            <label for="password2" class="formulario__label">Repetir Password</label>
            <input
                type="password"
                class="formulario__input"
                placeholder="Repetir Password"
                id="password2"
                name="password2"
            >
        </div>

        <input type="submit" class="formulario__submit" value="Crear Cuenta">
    </form>

    <div class="acciones">
        <a href="/login" class="acciones__enlace">¿Ya tienes cuenta? Iniciar sesión</a>
        <a href="/olvide" class="acciones__enlace">¿Olvidaste tu Password?</a>
    </div>
</main>