function CerrarSesion() {
    $.ajax({
        url: '/MN_ECC/Controllers/HomeController.php',
        method: 'POST',
        dataType: 'json',
        data: { btnCerrarSesion: true },
        success: function (response) {
            window.location.href = '/MN_ECC/Views/vHome/login.php';
        }
    });
};
