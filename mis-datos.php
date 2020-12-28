<?php require_once '../proyecto/includes/redireccion.php' ?>
<?php require_once '../proyecto/includes/header.php' ?>
<?php require_once '../proyecto/includes/lateral.php' ?>

<!--CAJA PRINCIPAL-->
<div id="principal">

    <h1>Mis Datos</h1>
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
    <form action="actualizar-usuario.php" method="post">

        <label for="nombre">Nombre</label>
        <input id type="text" name="nombre" value="<?= $_SESSION['usuario']['nombre']; ?>" />
        <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'nombre') : ''; ?>


        <label for="apellidos">Apellidos</label>
        <input id type="text" name="apellidos" value="<?= $_SESSION['usuario']['apellido']; ?>" />
        <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'apellidos') : ''; ?>

        <label for="email">Email</label>
        <input id type="text" name="email" value="<?= $_SESSION['usuario']['email']; ?>" />
        <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'email') : ''; ?>



        <input type="submit" name="submit" value="Actualizar" />
    </form>
    <?php borrarErrores(); ?>
</div>
<?php require_once './includes/footer.php'; ?>