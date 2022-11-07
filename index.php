<?php

require __DIR__. '/vendor/autoload.php';

use App\Pix\Payload;
use Mpdf\QrCode\QrCode;
use Mpdf\QrCode\Output;

//INSTANCIA PRINCIPAL DO PAYLOAD
$obPayload=(new Payload)->setPixKey('12345678900')
                        ->setDescription('Pagamento do pedido 123456')  
                        ->setMerchantName('John Doe')    
                        ->setMerchantCity('LEOPOLDINA')                    
                        ->setAmount('100.00')                                   
                        ->setTxid('WDEV1234');     


//echo phpinfo();
 //CODIGO DE PAGAMENTO
$payloadQrCode = $obPayload->getPayload();

//QR CODE
$obQrCode = new Qrcode($payloadQrCode);
                   
/* echo "<pre>";
print_r($obQrCode);
echo "</pre>"; exit; */

//IMAGEM DO QRCODE
$image = (new Output\Png)->output($obQrCode,400);
/* header('Content-Type: image/png');

echo $image; */
?>

<h1> QR CODE </h1>
<p><img src="data:image/png;base64,<?=base64_encode($image)?>"></p>
<br>
Código pix: <strong><?=$payloadQrCode?></strong>
