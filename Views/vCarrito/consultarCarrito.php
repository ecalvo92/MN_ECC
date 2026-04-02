<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/MN_ECC/Views/layout.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/MN_ECC/Controllers/ProductoController.php";

$datosProductos = ConsultarProductos();
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
                                  <h3 class="mb-15">Productos</h3>
                                  <a href="registrarProducto.php" class="btn btn-outline-secondary mb-3"> Agregar + </a>
                                </div>

                                    <div class="row">
                                        
                                        <table id="tProductos" class="table table-responsive">
                                          <thead>
                                            <tr>
                                              <th>#</th>
                                              <th>Nombre</th>
                                              <th>Precio</th>
                                              <th>Cantidad</th>
                                              <th>Estado</th>
                                              <th>Imagen</th>
                                              <th>Acciones</th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                          
                                            <?php
                                            foreach ($datosProductos as $producto) {
                                                echo
                                                '<tr>
                                                  <td>' . $producto["Consecutivo"] . '</td>
                                                  <td>' . $producto["Nombre"] . '</td>
                                                  <td>' . $producto["Precio"] . '</td>
                                                  <td>' . $producto["Cantidad"] . '</td>
                                                  <td>' . $producto["EstadoDescripcion"] . '</td>
                                                  <td><img src="' . $producto["Imagen"] . '" alt="Imagen del producto" width="100"></td>
                                                  <td>
                                                    <div class="d-flex gap-1">
                                                      
                                                      <form action="" method="POST">
                                                        <input type="hidden" name="Consecutivo" value="' . $producto["Consecutivo"] . '">
                                                        <button id="btnCambiarEstado" name="btnCambiarEstado" type="submit" class="btn btn-sm btn-info" title="Cambiar Estado">
                                                          <i class="fa-solid fa-rotate"></i>
                                                        </button>
                                                      </form>
                                                      
                                                      <a href="actualizarProducto.php?id=' . $producto["Consecutivo"] . '" class="btn btn-sm btn-info" title="Actualizar Producto">
                                                        <i class="fa-solid fa-edit"></i>
                                                      </a>

                                                    </div>
                                                  </td>
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
  <script src="../assets/funciones/consultarProductos.js"></script>

</body>

</html>