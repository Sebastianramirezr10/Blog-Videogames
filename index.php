<?php require_once './includes/header.php'; ?>
<?php require_once './includes/lateral.php'; ?>

<!--CAJA PRINCIPAL-->
<div id="principal">



  <h1>Ultimas Entradas</h1>

  <?php $entradas = conseguirEntradas($db, true);

  if (!empty($entradas)) :
    while ($entrada = mysqli_fetch_assoc($entradas)) : ?>
      <article class="entrada">
        <a href="entrada.php?id=<?= $entrada['id'] ?>">
          <h2><?= $entrada['titulo']; ?></h2>
          <span class="fecha"><?= $entrada['categoria'] . '|' . $entrada['fecha'] ?></span>
          <p><?= substr($entrada['descripcion'], 0, 180) . "..." ?></p>
        </a>
      </article>
  <?php endwhile;
  endif; ?>
  <div class="vertodas">
    <a href="entradas.php">ver todas las entradas</a>
  </div>
</div>
<!--FIN PRINCIPAL-->


<?php require_once './includes/footer.php'; ?>