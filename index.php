<?php

$botToken = "7809567491:AAFf96tJQfL3EugHf5sRIZaln8L6Hu1ZhoA";
$website = "https://api.telegram.org/bot".$botToken;

$content = file_get_contents("php://input");
$update = json_decode($content, true);

// تأكد من أن البيانات موجودة
if (isset($update["message"])) {
    $chat_id = $update["message"]["chat"]["id"];
    $text = $update["message"]["text"];

    if ($text == "/start") {
        $keyboard = [
            "keyboard" => [
                [["text" => "✅ ≪ اشترك الآن ≫ ✅"]],
                [["text" => "🔻 ≪ بوت فك الحظر ≫"], ["text" => "📄 ≪ قناة التفعيلات ≫"]],
            ],
            "resize_keyboard" => true
        ];

        $reply_markup = json_encode($keyboard);

        $message = "👋 ≪ السلام عليكم ورحمة الله وبركاته ≫\n";
        $message .= "🧑‍💼 ≪ حياك الله يا Mohammed Alamh، أهلاً وسهلاً ومرحباً بك. ≫\n";
        $message .= "🤖 ≪ البوت المميز والحصري في تقديم خدمة صيد الأرقام مع فك الحظر التلقائي عن الأرقام. ≫\n";
        $message .= "📕 ≪ كل ما عليك فقط أن تشترك في البوت لتبدأ رحلة صيد الأرقام العالمية والدولية 📱 ≫\n";
        $message .= "❗≪ ماذا تنتظر...؟! ≫\n≪ اضغط هنا وابدأ 🔻 ≫";

        file_get_contents($website."/sendMessage?chat_id=".$chat_id."&text=".urlencode($message)."&reply_markup=".urlencode($reply_markup));
    }
}