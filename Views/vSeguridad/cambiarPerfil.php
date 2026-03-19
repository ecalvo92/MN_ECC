<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/MN_ECC/Views/layout.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/MN_ECC/Controllers/SeguridadController.php";

$datosUsuario = ConsultarUsuario();

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

                                <h3 class="mb-15">Cambiar Perfil</h3>

                                <form id="formCambiarPerfil" action="" method="POST">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="input-style-1">
                                                <label>Identificación</label>
                                                <input type="text" placeholder="Identificación"
                                                    id="Identificacion" name="Identificacion" onkeyup="ConsultarNombre();"
                                                    value="<?php echo $datosUsuario['Identificacion']; ?>" />
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="input-style-1">
                                                <label>Nombre</label>
                                                <input type="text" placeholder="Nombre"
                                                    id="Nombre" name="Nombre" class="ReadOnly" readOnly="true"
                                                    value="<?php echo $datosUsuario["Nombre"]; ?>" />
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="input-style-1">
                                                <label>Correo Electrónico</label>
                                                <input type="text" placeholder="Correo Electrónico"
                                                    id="CorreoElectronico" name="CorreoElectronico"
                                                    value="<?php echo $datosUsuario["CorreoElectronico"]; ?>" />
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="button-group d-flex justify-content-center flex-wrap">
                                                <button type="submit" id="btnCambiarPerfil" name="btnCambiarPerfil"
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
    <script src="../assets/funciones/cambiarPerfil.js"></script>

</body>

</html>