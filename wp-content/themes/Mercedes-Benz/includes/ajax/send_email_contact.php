<?php
add_action('wp_ajax_nopriv_send_email_contact', 'send_email_contact');
add_action('wp_ajax_send_email_contact', 'send_email_contact');

function send_email_contact()
{

    $names = $_REQUEST['name'];
    $email = $_REQUEST['email'];
    $phone = $_REQUEST['phone'];
    $service = $_REQUEST['service'];


    $htmlMailling = '<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Correo de Contacto</title>
    <style>
        body {
            background-color: #f8f8f8;
            font-family: Arial, sans-serif;
            padding: 20px;
        }
        .container {
            background-color: #ffffff;
            padding: 20px;
            max-width: 600px;
            margin: auto;
            border-radius: 5px;
        }
        .header {
            background-color: #d0113f;
            color: #ffffff;
            padding: 10px;
            text-align: center;
            font-size: 24px;
            border-top-left-radius: 5px;
            border-top-right-radius: 5px;
        }
        .content {
            margin-top: 20px;
            font-size: 18px;
        }
        p {
            margin-bottom: 20px;
        }
        .footer {
            margin-top: 20px;
            background-color: #eeeeee;
            padding: 10px;
            text-align: center;
            border-bottom-left-radius: 5px;
            border-bottom-right-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            Nuevo contacto pagina web
        </div>
        <div class="content">
            <p>Hola Administrador,</p>
            <p><strong>Nombre:</strong> ' . $names . '</p>
            <p><strong>Teléfono:</strong> ' . $phone . '</p>
            <p><strong>Email:</strong> ' . $email . '</p>
            <p><strong>Servicio Solicitado:</strong> ' . $service . '</p>
        </div>
        <div class="footer">
            Todos los derechos reservados.
        </div>
    </div>
</body>
</html>
';

    $attachments = '';
    $headers = array('Content-Type: text/html;');
    $to = "contacto@solucionsoft.com, ";
    $send_mail = wp_mail($to, 'Nuevo mensaje de Contacto - Web SolucionSoft', $htmlMailling, $headers, $attachments);
    print_r($send_mail);

    /*INSERT DATA IN WORDPRESS*/
    if (function_exists('createLead')) {
        $data = [];
        $data['names'] = $names;
        $data['email'] = $email;
        $data['phone'] = $phone;
        $data['date'] = date('Y-m-d H:i:s');
        $data['org'] = 'Web';
        $data['form'] = 'contacto';
        $data['termsandcondition'] = 1;

        // Insertar los datos en WordPress utilizando la función createLead
        createLead($data);
    }

    if ($send_mail) {
        echo 1;
    } else {
        echo 0;
    }
}

function createLead($data)
{
    // Insertar los datos en WordPress
    $post_id = wp_insert_post(array(
        'post_title' => $data['names'],
        'post_content' => $data['email'] . ' - ' . $data['phone'],
        'post_status' => 'publish',
        'post_type' => 'lead',
    ));

    // Verificar si la inserción fue exitosa y devolver un resultado apropiado
    if ($post_id) {
        return true; // Si la inserción fue exitosa
    } else {
        return false; // Si hubo un error
    }
}
