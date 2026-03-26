<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/MN_ECC/Views/layout.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/MN_ECC/Controllers/ProductoController.php";
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
                        <div class="col-md-8 mx-auto">
                            <div class="card-style mt-5">

                                <?php
                                if (isset($_POST["Mensaje"])) {
                                    echo
                                    '<div class="alert alert-danger text-center" role="alert">
                                                            ' . $_POST["Mensaje"] . '
                                                        </div>';
                                }
                                ?>

                                <h3 class="mb-15">Agregar Producto</h3>

                                <form id="formProducto" action="" method="POST">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="input-style-1">
                                                <label>Nombre</label>
                                                <input type="text" placeholder="Nombre"
                                                    id="Nombre" name="Nombre" />
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="input-style-1">
                                                <label>Descripción</label>
                                                <textarea type="text" placeholder="Descripción"
                                                    id="Descripcion" name="Descripcion" rows="3" ></textarea>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="input-style-1">
                                                <label>Precio</label>
                                                <input type="text" placeholder="Precio"
                                                    id="Precio" name="Precio" />
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="input-style-1">
                                                <label>Cantidad</label>
                                                <input type="text" placeholder="Cantidad"
                                                    id="Cantidad" name="Cantidad" />
                                            </div>
                                        </div>
                                         <div class="col-12">
                                            <div class="input-style-1">
                                                <label>Imagen</label>
                                                <input type="file" id="ImagenProducto" name="ImagenProducto" />
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="button-group d-flex justify-content-center flex-wrap">
                                                <button type="submit" id="btnAgregarProducto" name="btnAgregarProducto"
                                                    class="main-btn primary-btn btn-hover w-100 text-center">
                                                    Procesar
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
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
    <script src="../assets/funciones/agregarProducto.js"></script>

</body>

</html>