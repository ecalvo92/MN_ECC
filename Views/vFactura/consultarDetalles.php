<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/MN_ECC/Views/layout.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/MN_ECC/Controllers/CarritoController.php";

$numFactura = $_GET["id"];
$datosDetalle = ConsultarDetallesFactura($numFactura);
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
                    <div class="row align-items-center">
                        <div class="col-md-11 mx-auto">
                            <div class="card-style mt-5">

                                <?php
                                if (isset($_POST["Mensaje"])) {
                                    echo
                                    '<div class="alert alert-danger text-center" role="alert">
                                                            ' . $_POST["Mensaje"] . '
                                                        </div>';
                                    }
                                ?>

                                <div class="d-flex align-items-center justify-content-between">
                                  <h3 class="mb-15">Detalle Factura # <?php echo $numFactura; ?></h3>
                                </div>

                                    <div class="row">
                                        
                                        <table id="tFacturas" class="table table-responsive">
                                          <thead>
                                            <tr>
                                              <th># Producto</th>
                                              <th>Nombre</th>
                                              <th>Cantidad</th>
                                              <th>Monto Unitario</th>
                                              <th>Monto Total</th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                          
                                            <?php
                                            foreach ($datosDetalle as $detalle) {
                                                echo
                                                '<tr>
                                                  <td>' . $detalle["ConsecutivoProducto"] . '</td>
                                                  <td>' . $detalle["Nombre"] . '</td>
                                                  <td>' . number_format($detalle["Cantidad"], 0) . '</td>
                                                  <td>₡' . number_format($detalle["MontoUnitario"], 2) . '</td>                                                 
                                                  <td>₡' . number_format($detalle["Monto"], 2) . '</td>
                                                </tr>';
                                            }
                                            ?>

                                          </body>
                                        </table>
                                        
                                    </div>
                            </div>

                        </div>
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
  <script src="../assets/funciones/consultarFacturas.js"></script>

</body>

</html>