<?php

$subject = "Sparkle - Contacto";

// Extraer variables enviadas
extract($_POST);

$fname=$_POST['f-name'];
$fphone=$_POST['f-phone'];
$femail=$_POST['f-email'];
$fmessage=$_POST['f-message'];

//Contenido del mensaje
$message = $subject.": \n\n";
$message .= "Nombre: " . $fname . "\n";
$message .= "Teléfono: " . $fphone . "\n";
$message .= "Email: " . $femail . "\n";
$message .= "Mensaje: " . $fmessage . "\n";

$message_html  = $subject.": \n\n";
$message_html .= "Nombre: " . $fname . "\n";
$message_html .= "Teléfono: " . $fphone . "\n";
$message_html .= "Email: " . $femail . "\n";
$message_html .= "Mensaje: " . $fmessage . "\n";

// Enviar correo
$mailjetApiKey = '6631c44e5568634a150873f48a5905fc';
$mailjetApiSecret = '6be33946af063d254e6a4f1166545489';

$messageData = [
    'Messages' => [
        [
            'From' => [
                'Email' => 'webmaster@sparkle.pe',
                'Name' => 'Sparkle'
            ],
            'To' => [
                [
                    'Email' => 'gpena@sparkle.pe',
                    'Name' =>'Sparkle'
                ]
            ],
            // 'Bcc' => [
            //     [
            //         'Email' => 'geeboox@gmail.com',
            //         'Name' => 'Geraldine'
            //     ]
            // ],
            'Subject' => $subject,
            'TextPart' => $message,
            'HTMLPart' => $message_html
        ]
    ]
];

$jsonData = json_encode($messageData);
$ch = curl_init('https://api.mailjet.com/v3.1/send');

curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
curl_setopt($ch, CURLOPT_USERPWD, "{$mailjetApiKey}:{$mailjetApiSecret}");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Content-Type: application/json',
    'Content-Length: ' . strlen($jsonData)
]);

$response = json_decode(curl_exec($ch));

// Zona horaria
// date_default_timezone_set('America/Bogota');
// // Fecha de envío
// $idate = date("d/m/Y H:i:s");

// $mysqli = new mysqli('localhost', 'bd', 'user', 'pass')
//     or die('Error al conectarse con la base de datos' . $mysqli->error);

// $mysqli->set_charset("utf8");

// // Guardar registro
// $sql = "INSERT INTO inscripcion_comercio (nombre, ruc, rubro, distrito,nombrelegal,dni,celular,email,nsucursales,tyc)
    // VALUES ('$fname','$fruc','$frubro','$fdistrito','$fnamelegal','$fdni','$fphone','$femail','$fnsuc','$ftyc')";
// Ejecutar registro
// $query = $mysqli->query($sql);

if ($response) {
    echo "Envío exitoso\n";
    echo $message;
} else {
    echo 'Hubo un error';
}