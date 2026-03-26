<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/MN_ECC/Views/layout.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/MN_ECC/Controllers/ProductoController.php";

$todosProductos = ConsultarProductos();
$productosActivos = array_filter($todosProductos ?? [], fn($p) => $p["EstadoDescripcion"] === "Activo");
?>

<!DOCTYPE html>
<html lang="en">

<?php
MostrarCSS();
?>

<body>

  <div id="preloader">
    <div class="spinner"></div>
  </div>

  <?php
  MostrarNav();
  ?>

  <div class="overlay"></div>
  <main class="main-wrapper">

    <?php
    MostrarHeader();
    ?>

    <section class="section">
      <div class="container-fluid">
        <div class="title-wrapper pt-30">

          <div class="row g-4">
            <?php foreach ($productosActivos as $producto): ?>
            <div class="col-sm-6 col-md-4 col-lg-3">
              <div class="card h-100 shadow-sm">
                <img src="<?= htmlspecialchars($producto['Imagen']) ?>"
                     class="card-img-top object-fit-cover"
                     style="height: 200px;"
                     alt="<?= htmlspecialchars($producto['Nombre']) ?>">
                <div class="card-body d-flex flex-column">
                  <h5 class="card-title"><?= htmlspecialchars($producto['Nombre']) ?></h5>
                  <p class="card-text text-muted small flex-grow-1"><?= htmlspecialchars($producto['Descripcion']) ?></p>
                  <div class="d-flex justify-content-between align-items-center mt-3">
                    <span class="fw-bold text-primary">₡<?= number_format((float) str_replace(',', '.', $producto['Precio']), 2) ?></span>
                    <span class="badge bg-secondary">Stock: <?= (int) $producto['Cantidad'] ?></span>
                  </div>
                </div>
              </div>
            </div>
            <?php endforeach; ?>

            <?php if (empty($productosActivos)): ?>
            <div class="col-12">
              <p class="text-muted text-center">No hay productos activos disponibles.</p>
            </div>
            <?php endif; ?>
          </div>

        </div>
      </div>
    </section>

    <?php
    MostrarFooter()
    ?>

  </main>

  <?php
  MostrarJS();
  ?>

</body>

</html>