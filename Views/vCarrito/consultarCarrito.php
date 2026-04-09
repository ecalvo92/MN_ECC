<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/MN_ECC/Views/layout.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/MN_ECC/Controllers/CarritoController.php";

$datosCarrito = ConsultarCarrito();
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
                                  <h3 class="mb-15">Mi Carrito</h3>
                                </div>

                                    <div class="row">
                                        
                                        <table id="tCarrito" class="table table-responsive">
                                          <thead>
                                            <tr>
                                              <th># Producto</th>
                                              <th>Nombre</th>
                                              <th>Fecha</th>
                                              <th>Cantidad</th>
                                              <th>Precio</th>
                                              <th>Total</th>
                                              <th>Imagen</th>
                                              <th>Acciones</th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                          
                                            <?php
                                            foreach ($datosCarrito as $carrito) {
                                                echo
                                                '<tr>
                                                  <td>' . $carrito["ConsecutivoProducto"] . '</td>
                                                  <td>' . $carrito["Nombre"] . '</td>
                                                  <td>' . date('d/m/Y H:i:s', strtotime($carrito["FechaCarrito"])) . '</td>
                                                  <td>' . number_format($carrito["Cantidad"], 0) . '</td>
                                                  <td>' . number_format($carrito["Precio"], 2) . '</td>
                                                  <td>' . number_format($carrito["Total"], 2) . '</td>
                                                  <td><img src="' . $carrito["Imagen"] . '" alt="Imagen del producto" width="100"></td>
                                                  <td>
                                                   <div class="d-flex gap-1">
                                                      
                                                      <form action="" method="POST">
                                                        <input type="hidden" name="Consecutivo" value="' . $carrito["Consecutivo"] . '">
                                                        <button id="btnRemoverProductoCarrito" name="btnRemoverProductoCarrito" type="submit" class="btn btn-sm btn-danger" title="Eliminar del carrito">
                                                          <i class="fa-solid fa-trash"></i>
                                                        </button>
                                                      </form>

                                                    </div>
                                                  </td>
                                                </tr>';
                                            }
                                            ?>

                                          </body>
                                        </table>
                                        
                                    </div>

                                    <?php if ($_SESSION["TotalPago"] > 0): ?>
                                    <div class="mt-5 d-flex justify-content-end">
                                      <div class="card border-0" style="min-width: 280px;">
                                        <div class="card-body text-end">
                                          <p class="fs-5 fw-semibold text-muted mb-1">Total a cancelar ₡ <?php echo number_format($_SESSION["TotalPago"], 2) ?></p>
                                        
                                          <form action="" method="POST">
                                            <input id="btnPagar" name="btnPagar" type="submit" class="btn btn-success btn-lg w-100" value="Proceder al Pago">
                                          </form>
                                        
                                        </div>
                                   
                                    </div>
                                    <?php endif; ?>
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
  <script src="../assets/funciones/consultarCarrito.js"></script>

</body>

</html>