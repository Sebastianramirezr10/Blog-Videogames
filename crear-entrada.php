<?php require_once '../proyecto/includes/redireccion.php' ?>
<?php require_once '../proyecto/includes/header.php' ?>
<?php require_once '../proyecto/includes/lateral.php' ?>

<!--CAJA PRINCIPAL-->
<div id="principal">

    <h1>Crear Entrada</h1>
    <p class="fecha">Añade Nuevas Entradas Para el Blog de Videojuegos!</p>
    </br>

    <form action="guardar-entrada.php" method="POST">

        <label for="titulo">Titulo</label>
        <input type="text" name="titulo">
        <?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'titulo') : ''; ?>

        <label for="descripcion">Descripcion</label>
        <textarea type="text" name="descripcion"></textarea><br>
        <?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'descripcion') : ''; ?>

        <label for="categoria">Categoria</label>
        <select name="categoria">
            <?php $categorias = conseguirCategorias($db);
            if (!empty($categorias)) :
                while ($categoria = mysqli_fetch_assoc($categorias)) : ?>

                    <option value="<?= $categoria['id'] ?>">
                        <?= $categoria['nombre'] ?>
                    </option>

            <?php endwhile;
            endif; ?>
        </select>
        <?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'categoria') : ''; ?>




        <input type="submit" value="Guardar">
    </form>
    <?php borrarErrores(); ?>
</div>


<!--FIN PRINCIPAL-->


<?php require_once './includes/footer.php'; ?>