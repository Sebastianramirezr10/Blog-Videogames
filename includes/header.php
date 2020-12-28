<?php require_once 'conexion.php'; ?>
<?php require_once 'includes/helpers.php' ?>
<!DOCTYPE html>
<html lang="es">
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1" />
<link rel="stylesheet" type="text/css" href="../proyecto/assets/css/style.css" />
<link rel="icon" type="favicon/x-icon" href="" />

<head>
    <title>Blog De VideoJuegos</title>
</head>

<body>

    <!--ENCABEZADO-->
    <header id="cabecera">
        <!--LOGO-->
        <div id="logo">
            <a href="index.php">Blog de Videojuegos</a>
        </div>
        <!--MENU-->



        <nav id="menu">
            <ul class="nav">
                <li><a href="index.php">Inicio</a></li>
                <?php $categorias = conseguirCategorias($db);
                if (!empty($categorias)) :
                    while ($categoria = mysqli_fetch_assoc($categorias)) : ?>
                        <li><a href="categoria.php?id=<?= $categoria['id'] ?>"><?= $categoria['nombre']; ?></a></li>
                <?php endwhile;
                endif; ?>

                <li><a href="index.php">Sobre Mi</a></li>
                <li><a href="index.php">Contacto</a></li>
            </ul>
        </nav>
    </header>
</body>
<div class="contenedor">