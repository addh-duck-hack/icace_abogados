<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>ICACE - Clientes</title>
</head>
<body>
    <video class="background-video" src="resources/background.mp4" autoplay="true" muted="true" loop="true" poster="resources/img1.png" playsinline="playsinline"></video>
    <div class="background"></div>
    <nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-custom">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">
                <img src="/resources/logo-new5.jpeg" alt="" width="285" height="45">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link lemon-milk-regular" aria-current="page" href="index.php" onclick="cerrar()">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link lemon-milk-regular" href="index.php#quienes-somos" onclick="cerrar()">¿Quienes somos?</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link lemon-milk-regular" href="index.php#contacto" onclick="cerrar()">Contactanos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link lemon-milk-regular" href="clientes.php" onclick="cerrar()">Clientes</a>
                </li>
            </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid content-result-email">
        <div class="row justify-content-md-center">
            <div class="col-sm-12 col-lg-6 head-form lemon-milk-medium">
                <br>
                <?php

            // Verifica si el formulario ha sido enviado
            if(isset($_POST['email'])) {
                // Cambia las próximas dos líneas con tu dirección de email y el asunto del email
                $email_to = "ventas@elquintosolmarketing.com";
                $email_subject = "Contacto desde el sitio web";
                
                // Validación de los campos del formulario. En caso de que alguno de los campos no exista, retorna un error.
                if(!isset($_POST['nombre']) || !isset($_POST['email']) || !isset($_POST['telefono'])) {
                    echo "<h1>Ocurrió un error y el formulario no ha sido enviado. </h1><br />";
                    echo "<h2>Por favor, vuelva atrás y verifique la información ingresada</h2><br />";
                //Validación de datos vacios
                }else if($_POST['nombre'] == "" || $_POST['email'] == "" || $_POST['telefono'] == "") {
                    echo "<h1>Ocurrió un error y el formulario no ha sido enviado. </h1><br />";
                    echo "<h2>Por favor, vuelva atrás y verifique la información ingresada</h2><br />";
                }else{
                    // Construcción del mensaje del email
                    $email_message = "Datos proporcionados por el usuario desde el sitio www.juridicoicacehidalgo.com:\n\n";
                    $email_message .= "Nombre: " . $_POST['nombre'] . "\n";
                    $email_message .= "Correo electrónico: " . $_POST['email'] . "\n";
                    $email_message .= "Teléfono: " . $_POST['telefono'] . "\n";
                    $email_message .= "Este es un mensaje automatico, favor de no responder.";

                    // Creación de las cabeceras del email
                    $headers = 'From: administrador@juridicoicacehidalgo.com';

                    // Envío del email
                    @mail($email_to, $email_subject, $email_message, $headers);

                    // Mensaje de confirmación al usuario
                    echo "<h1>¡Gracias por tu interes en nosotros!</h1>";
                    echo "<h2>Recibimos tu mensaje</h2>";
                    echo "<h1>Pronto nos comunicaremos contigo</h1>";
                }
            }
            ?>
            </div>
        </div>
    </div>
    <footer>

    </footer>
    <script language="JavaScript" type="text/javascript" src="/js/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script>
        function cerrar() {
            let navbar = document.querySelector(".navbar-toggler");
            navbar.click();
        }
    </script>
    <script language="JavaScript" type="text/javascript">
        $(".navbar-nav a[href^='#']").on('click', function(e) {
            // prevent default anchor click behavior
            e.preventDefault();

            // animate
            $('html, body').animate({
                scrollTop: $(this.hash).offset().top - 200
                }, 300, function(){
                });
        });
    </script>
</body>
</html>
