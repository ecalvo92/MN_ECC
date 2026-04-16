<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/MN_ECC/Views/layout.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/MN_ECC/Controllers/CarritoController.php";

$datos = ConsultarDatos();
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
                <div class="row align-items-center mb-4">
                    <div class="col-12">
                        <h3 class="fw-bold mb-1">
                            <i class="fas fa-chart-bar me-2 text-primary"></i>Panel de Indicadores
                        </h3>
                        <p class="text-muted mb-0">Resumen general del negocio</p>
                    </div>
                </div>

                <?php
                // Indexar por TITULO para acceder directamente
                $indicadores = [];
                foreach ($datos as $fila) {
                    $indicadores[$fila["TITULO"]] = $fila;
                }

                $productoMasVendido = $indicadores["Producto Más Vendido"] ?? null;
                $clienteFrecuente   = $indicadores["Cliente Frecuente"]    ?? null;
                $totalRecaudado     = $indicadores["Total Recaudado"]      ?? null;
                ?>

                <div class="row g-4">

                    <!-- Producto más vendido -->
                    <?php if ($productoMasVendido): ?>
                    <div class="col-xl-4 col-md-6">
                        <div class="kpi-card card scheme-gold">
                            <div class="card-top-bar"></div>
                            <div class="card-body p-4">
                                <div class="d-flex align-items-center gap-3 mb-3">
                                    <div class="icon-wrap">
                                        <i class="fas fa-trophy"></i>
                                    </div>
                                    <span class="kpi-titulo text-muted">Producto Más Vendido</span>
                                </div>
                                <div class="kpi-value mb-1"><?= number_format((float)$productoMasVendido["VALOR"], 0, ",", ".") ?></div>
                                <p class="text-muted small mb-2">Unidades vendidas</p>
                                <div class="d-flex align-items-center gap-2 pt-2 border-top">
                                    <i class="fas fa-box text-muted" style="font-size:12px"></i>
                                    <span class="kpi-text text-dark"><?= htmlspecialchars($productoMasVendido["TEXTO"]) ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>

                    <!-- Cliente frecuente -->
                    <?php if ($clienteFrecuente): ?>
                    <div class="col-xl-4 col-md-6">
                        <div class="kpi-card card scheme-blue">
                            <div class="card-top-bar"></div>
                            <div class="card-body p-4">
                                <div class="d-flex align-items-center gap-3 mb-3">
                                    <div class="icon-wrap">
                                        <i class="fas fa-user-tie"></i>
                                    </div>
                                    <span class="kpi-titulo text-muted">Cliente Frecuente</span>
                                </div>
                                <div class="kpi-value mb-1"><?= number_format((float)$clienteFrecuente["VALOR"], 0, ",", ".") ?></div>
                                <p class="text-muted small mb-2">Compras realizadas</p>
                                <div class="d-flex align-items-center gap-2 pt-2 border-top">
                                    <i class="fas fa-user text-muted" style="font-size:12px"></i>
                                    <span class="kpi-text text-dark"><?= htmlspecialchars($clienteFrecuente["TEXTO"]) ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>

                    <!-- Total recaudado -->
                    <?php if ($totalRecaudado): ?>
                    <div class="col-xl-4 col-md-6">
                        <div class="kpi-card card scheme-green">
                            <div class="card-top-bar"></div>
                            <div class="card-body p-4">
                                <div class="d-flex align-items-center gap-3 mb-3">
                                    <div class="icon-wrap">
                                        <i class="fas fa-coins"></i>
                                    </div>
                                    <span class="kpi-titulo text-muted">Total Recaudado</span>
                                </div>
                                <div class="kpi-value">
                                    ₡<?= number_format((float)$totalRecaudado["VALOR"], 2, ",", ".") ?>
                                </div>
                            </div>
                        </div>
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