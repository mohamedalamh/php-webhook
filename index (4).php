
<?php
$token = "7809567491:AAFf96tJQfL3EugHf5sRIZaln8L6Hu1ZhoA";
$website = "https://api.telegram.org/bot$token";

$update = json_decode(file_get_contents("php://input"), TRUE);
$chat_id = $update["message"]["chat"]["id"];
$text = $update["message"]["text"];

if ($text == "/start") {
    $first_name = $update["message"]["from"]["first_name"];
    $welcome = "👋 ≪ السلام عليكم ورحمة الله وبركاته ≫\n"
             . "👤 ≪ حياك الله يا {$first_name} أهلاً وسهلاً ومرحباً بك. ≫\n\n"
             . "🤖 ≪ البوت المميز والحصري في تقديم خدمة صيد الأرقام مع فك الحظر التلقائي عن الأرقام. ≫\n\n"
             . "🗃 ≪ كل ما عليك فقط أن تشترك في البوت لنبدأ رحلة صيد الأرقام العالمية والدولية 📱 ≫\n\n"
             . "ماذا تنتظر...؟!\n≪ ≪ اضغط هنا وابدأ! 🔻";

    $keyboard = [
        "inline_keyboard" => [
            [
                ["text" => "✅ ≪ اشترك الآن ≫ ✅", "url" => "https://t.me/EL3FreT/33"]
            ],
            [
                ["text" => "🔻 ≪ بوت فك الحظر ≫ 🔻", "url" => "https://t.me/your_unblock_bot_link"]
            ],
            [
                ["text" => "📄 ≪ قناه التفعيلات ≫ 📄", "url" => "https://t.me/your_activation_channel"]
            ]
        ]
    ];

    $reply_markup = json_encode($keyboard);

    file_get_contents("$website/sendMessage?chat_id=$chat_id&text=" . urlencode($welcome) . "&parse_mode=Markdown&reply_markup=$reply_markup");
}
?>
