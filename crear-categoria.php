<?php require_once '../proyecto/includes/redireccion.php' ?>
<?php require_once '../proyecto/includes/header.php' ?>
<?php require_once '../proyecto/includes/lateral.php' ?>

<!--CAJA PRINCIPAL-->
<div id="principal">

    <h1>Crear Categorias</h1>
    <p class="fecha">Añade Nuevas Categorias Para el Blog de Videojuegos! para que los usuarios puedan
        usarlas al crear sus entradas.</p>
    </br>

    <form action="guardar-categoria.php" method="POST">
        <label for="nombre">Categoria</label>
        <input id="categoria-input" type="text" name="nombre">
        <input type="submit" value="Guardar">
    </form>
</div>


<!--FIN PRINCIPAL-->


<?php require_once './includes/footer.php'; ?>