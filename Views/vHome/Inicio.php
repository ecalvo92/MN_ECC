<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/MN_ECC/Views/layout.php";
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
            <div class="col-md-6">
              <div class="title">
                <h2>Inicio</h2>
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

</body>

</html>