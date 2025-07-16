<?php
// إعدادات البوت
$bot_token = "7809567491:AAFf96tJQfL3EugHf5sRIZaln8L6Hu1ZhoA";
$chat_id   = "834033986";

// استقبال البيانات القادمة من TextBee
$input = json_decode(file_get_contents("php://input"), true);

// التأكد من وجود بيانات صالحة
if (isset($input['from']) && isset($input['body'])) {
    $from_number = $input['from'];
    $message_body = $input['body'];

    // تنسيق الرسالة لإرسالها إلى تليجرام
    $text = "📩 *رسالة جديدة من TextBee:*\n"
          . "📱 من: `$from_number`\n"
          . "💬 المحتوى:\n```$message_body```";

    // إرسال إلى Telegram
    $url = "https://api.telegram.org/bot$bot_token/sendMessage";

    $params = [
        "chat_id" => $chat_id,
        "text" => $text,
        "parse_mode" => "Markdown"
    ];

    // تنفيذ الطلب
    file_get_contents($url . "?" . http_build_query($params));
} else {
    // تخزين للمراجعة في حال وصول بيانات غير مكتملة
    file_put_contents("log.txt", json_encode($input) . "\n", FILE_APPEND);
}
?>