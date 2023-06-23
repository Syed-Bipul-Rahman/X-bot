<?php

require_once 'path/to/vendor/autoload.php';

require_once 'telegram-bot-sdk-3.x/src/Action.php';
require_once 'telegram-bot-sdk-3.x/src/Api.php';
require_once 'telegram-bot-sdk-3.x/src/BotsManager.php';
require_once 'telegram-bot-sdk-3.x/src/HttpClients/GuzzleHttpClient.php';
require_once 'telegram-bot-sdk-3.x/src/Commands/Command.php';
require_once 'telegram-bot-sdk-3.x/src/Exceptions/TelegramSDKException.php';

$token = '6210524908:AAFjfCWXURsqfr_eryCB4ULVKWhz7ILM5VA';
$bot = new Client($token);

$bot->on(function (Update $update) use ($bot) {
    $message = $update->getMessage();
    $text = $message->getText();
    $chatId = $message->getChat()->getId();

    if ($text === '/start') {
        $bot->sendMessage($chatId, 'Hello mc, welcome!');
    } elseif ($text === '/pic') {
        $pictures = [
            'https://cdn3.wpbeginner.com/wp-content/uploads/2017/02/changetheme.jpg',
            'https://kinsta.com/wp-content/uploads/2016/10/plesk-wordpress-sites.jpg',
            'https://www.sitesaga.com/storage/2021/09/best-wp-website-examples.png',
            'https://colorlib.com/wp/wp-content/uploads/sites/2/featured_free-personal-WordPress-themes-1.jpg'
        ];

        $randomPicture = $pictures[array_rand($pictures)];

        $bot->sendPhoto($chatId, $randomPicture);
    } elseif ($text === '/gali') {
        $texts = [
            'What is Lorem Ipsum?',
            'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
            "Lorem Ipsum has been the industry's standard"
        ];

        $randomText = $texts[array_rand($texts)];

        $bot->sendMessage($chatId, $randomText);
    }
});

$bot->run();

?>
