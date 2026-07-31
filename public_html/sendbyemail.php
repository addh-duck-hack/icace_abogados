<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ICACE Abogados</title>
    <link rel="stylesheet" href="css/styles.css?29042025">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <!-- Encabezado -->
    <div id="header">
        <?php include 'partials/header.php'; ?>
    </div>

    <div class="container-fluid content-result-email">
        <div class="row justify-content-md-center">
            <div class="col-sm-12 col-lg-6">
                <br>
                <?php
                use PHPMailer\PHPMailer\PHPMailer;
                use PHPMailer\PHPMailer\Exception;

                require 'vendor/autoload.php'; // Asegúrate de que PHPMailer esté instalado y cargado

                if (isset($_POST['name'])) {
                    // Cambia las próximas dos líneas con tu dirección de email y el asunto del email
                    $email_to = "abogados@juridicoicacehidalgo.mx";
                    $email_subject = "Contacto desde el sitio web ICACE Abogados";

                    // Validación de los campos del formulario
                    if (!isset($_POST['name']) || !isset($_POST['mail']) || !isset($_POST['phone']) || !isset($_POST['message'])) {
                        echo "<h1>Ocurrió un error y el formulario no ha sido enviado. </h1><br />";
                        echo "<h2>Por favor, vuelva atrás y verifique la información ingresada</h2><br />";
                    } else if ($_POST['name'] == "" || $_POST['mail'] == "" || $_POST['phone'] == "" || $_POST['message'] == "") {
                        echo "<h1>Ocurrió un error y el formulario no ha sido enviado. </h1><br />";
                        echo "<h2>Por favor, vuelva atrás y verifique la información ingresada</h2><br />";
                    } else {
                        // Construcción del mensaje del email
                        $email_message = "Datos proporcionados por el usuario desde el sitio www.juridicoicacehidalgo.mx:\n\n";
                        $email_message .= "Nombre: " . $_POST['name'] . "\n";
                        $email_message .= "Correo electrónico: " . $_POST['mail'] . "\n";
                        $email_message .= "Teléfono: " . $_POST['phone'] . "\n";
                        $email_message .= "Mensaje: " . $_POST['message'] . "\n";
                        $email_message .= "\n";
                        $email_message .= "Este es un mensaje automático, favor de no responder.";

                        // Configuración de PHPMailer
                        $mail = new PHPMailer(true);

                        try {
                            // Configuración del servidor SMTP
                            $mail->isSMTP();
                            $mail->Host = 'mail.juridicoicacehidalgo.mx'; // Host del servidor SMTP
                            $mail->SMTPAuth = true;
                            $mail->Username = 'contacto@juridicoicacehidalgo.mx'; // Dirección de correo desde donde se enviará
                            $mail->Password = 'CCvWJJSffs'; // Contraseña del correo
                            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Encriptación TLS
                            $mail->Port = 587; // Puerto SMTP

                            // Configuración del correo
                            $mail->CharSet = 'UTF-8';
                            $mail->setFrom('contacto@juridicoicacehidalgo.mx', 'ICACE Abogados'); // Remitente
                            $mail->addAddress($email_to); // Destinatario
                            $mail->addReplyTo($_POST['mail'], $_POST['name']); // Responder al correo del usuario

                            // Contenido del correo
                            $mail->isHTML(false); // Enviar como texto plano
                            $mail->Subject = $email_subject;
                            $mail->Body = $email_message;

                            // Enviar el correo
                            $mail->send();
                            echo "<h1>¡Gracias por tu interés en nosotros!</h1>";
                            echo "<h2>Recibimos tu mensaje</h2>";
                            echo "<h1>Pronto nos comunicaremos contigo</h1>";
                        } catch (Exception $e) {
                            echo "<h1>Ocurrió un error al enviar el mensaje.</h1><br />";
                            echo "<h2>Error: {$mail->ErrorInfo}</h2><br />";
                        }
                    }
                } else {
                    echo "<h1>Ocurrió un error y el formulario no ha sido enviado. </h1><br />";
                    echo "<h2>Favor de llenar todos los datos del formulario para continuar</h2><br />";
                }
                ?>
            </div>
        </div>
    </div>

    <!-- Pie de página -->
    <div id="footer">
        <?php include 'partials/footer.php'; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="js/scripts.js?29042025" defer></script>
</body>
</html>