<?php require_once 'includes/helpers.php' ?>

<!--BARRA LATERAL-->
<aside id="sidebar">
    <div id="buscador" class="bloque">
        <h3>Buscador</h3>

        <form action="buscar.php" method="post">

            <input type="text" name="busqueda" />
            <input type="submit" value="buscar">
        </form>
    </div>




    <!--MENSAJE DE INDENTIFICACION-->
    <?php if (isset($_SESSION['usuario'])) : ?>
        <div id="usuario-logueado" class="bloque">
            <h3>Bienvenido, <?= $_SESSION['usuario']['nombre'] . ' ' . $_SESSION['usuario']['apellido']; ?></h3>
            <!--BOTONES-->
            <a class="boton boton-verde" href="crear-entrada.php">Crear Entradas</a>
            <a class="boton " href="crear-categoria.php">Crear Categoria</a>
            <a class="boton boton-naranja" href="mis-datos.php">Mis Datos</a>
            <a class="boton boton-rojo" href="cerrar.php">Cerrar Sesion</a>

        </div>
    <?php endif; ?>
    <!--LOGIN-->

    <?php if (!isset($_SESSION['usuario'])) : ?>
        <div id="login" class="bloque">
            <h3>indentificate</h3>

            <!--ALERTA-->
            <?php if (isset($_SESSION['error_login'])) : ?>
                <div class="alerta alerta-error">
                    <?= $_SESSION['error_login'] ?>
                </div>
            <?php endif; ?>


            <form action="login.php" method="post">
                <label for="email">Email</label>
                <input type="text" name="email" />
                <label for="password">Password</label>
                <input type="password" name="password" />
                <input type="submit" value="entrar" />
            </form>
        </div>

        <div id="register" class="bloque">

            <h3>Registrate</h3>

            <!--MOSTRAR ERRORES-->
            <?php if (isset($_SESSION['completado'])) : ?>
                <div class="alerta alerta-exito">
                    <?= $_SESSION['completado']; ?>
                </div>

            <?php elseif (isset($_SESSION['errores']['general'])) : ?>
                <div class="alerta alerta-exito">
                    <?= $_SESSION['errores']['general']; ?>
                </div>
            <?php endif; ?>
            <!--FORMULARIO-->
            <form action="registro.php" method="post">

                <label for="nombre">Nombre</label>
                <input id type="text" name="nombre" />
                <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'nombre') : ''; ?>

                <label for="apellidos">Apellidos</label>
                <input id type="text" name="apellidos" />
                <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'apellidos') : ''; ?>

                <label for="email">Email</label>
                <input id type="text" name="email" />
                <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'email') : ''; ?>

                <label for="password">Password</label>
                <input id type="password" name="password" />
                <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'password') : ''; ?>

                <input type="submit" name="submit " value="registrar" />
            </form>
            <?php borrarErrores() ?>
        </div>
        <div class="clearfix"></div>
    <?php endif; ?>
</aside>