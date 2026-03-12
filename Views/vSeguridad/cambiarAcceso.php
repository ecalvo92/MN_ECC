<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/MN_ECC/Views/layout.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/MN_ECC/Controllers/SeguridadController.php";
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

                                <h3 class="mb-15">Cambiar Contraseña</h3>

                                <form id="formCambiarAcceso" action="" method="POST">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="input-style-1">
                                                <label>Nueva Contraseña</label>
                                                    <input type="password" placeholder="Nueva Contraseña"
                                                        id="NuevaContrasenna" name="NuevaContrasenna" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="input-style-1">
                                                <label>Confirmar Contraseña</label>
                                                    <input type="password" placeholder="Confirmar Contraseña"
                                                        id="ConfirmarContrasenna" name="ConfirmarContrasenna" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="button-group d-flex justify-content-center flex-wrap">
                                                <button type="submit" id="btnCambiarAcceso" name="btnCambiarAcceso"
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
    <script src="../assets/funciones/cambiarAcceso.js"></script>

</body>

</html>