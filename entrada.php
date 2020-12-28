<?php require_once './includes/conexion.php'; ?>
<?php require_once './includes/helpers.php'; ?>


<?php
$entrada_actual = conseguirEntrada($db, $_GET['id']);


if (!isset($entrada_actual['id'])) {
    header('Location: index.php');
}
?>
<?php require_once './includes/header.php'; ?>
<?php require_once './includes/lateral.php'; ?>

<!--CAJA PRINCIPAL-->
<div id="principal">
    <a href="entradas.php">
        <h1><?= $entrada_actual['titulo'] ?></h1>
    </a>
    <a href="categoria.php?id=<?= $entrada_actual['categoria_id'] ?>">
        <h2><?= $entrada_actual['categoria'] ?></h2>
    </a>
    <h4><?= $entrada_actual['fecha'] ?> | Autor: <?= $entrada_actual['usuario'] ?> </h4>
    <p><?= $entrada_actual['descripcion'] ?></p>

    <?php if (isset($_SESSION['usuario']) && $_SESSION['usuario']['id'] == $entrada_actual['usuario_id']) : ?>
        <br>
        <a class="boton boton-verde" href="editar-entrada.php?id=<?= $entrada_actual['id'] ?>">Editar Entradas</a>
        <a class="boton " href="borrar-entrada.php?id=<?= $entrada_actual['id'] ?>">Borrar Entradas</a>

    <?php endif; ?>
</div>
<!--FIN PRINCIPAL-->


<?php require_once './includes/footer.php'; ?>