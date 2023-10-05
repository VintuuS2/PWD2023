<?php
require_once '../Util/vendor/autoload.php';

$token = "6608994184:AAH87Kkb8YISTvYxR4fxZoFANP2ykBkweyY";

use SergiX44\Nutgram\Nutgram;
use SergiX44\Nutgram\RunningMode\Webhook;

$bot = new Nutgram($token);
echo ($bot->setRunningMode(Webhook::class));

$bot->onMessage(function(Nutgram $bot){
    $bot->sendMessage('Que querés wn?');
});

$bot->run();

use Uala\SDK;

//El true es para poner el isDev en true kappa
$sdk = new SDK("new_user_1631906477", "5qqGKGm4EaawnAH0J6xluc6AWdQBvLW3", "cVp1iGEB-DE6KtL4Hi7tocdopP2pZxzaEVciACApWH92e8_Hloe8CD5ilM63NppG", true);

//$orden = $sdk->createOrder(2000.00, "Hola mundo! 2", "http://localhost/PWD2023/", "http://localhost/PWD2023/", "http://localhost/PWD2023/");

$order = $sdk->createOrder(10, 'UNA SANDIA varata', 'https://www.google.com/', 'https://www.google.com/');

include_once '../../TP4/configuracion.php';
include_once './Estructura/header.php';
?>

    <div class="vh-100 w-100 row justify-content-center">
        <div class="d-flex justify-content-center align-items-center w-50 h-100 bg-gris">
            <h2>Hola mundo!</h2>
            <br>
            <a href="<?php echo $checkoutLink ?>" target="_blank" class="btn btn-primary">Ir a pagar</a>
        </div>
    </div>

<?php
include_once './Estructura/footer.php';
?>