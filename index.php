<?php
// استلام البيانات من تليجرام
$update = json_decode(file_get_contents("php://input"), true);

// استخراج البيانات الأساسية
$chat_id = $update["message"]["chat"]["id"] ?? null;
$text = $update["message"]["text"] ?? "";

// التوكن الخاص بك
$token = "7809567491:AAFf96tJQfL3EugHf5sRIZaln8L6Hu1ZhoA";

// إعداد الرد التلقائي
if ($chat_id) {
    $reply = "أهلاً! استلمت رسالتك: " . $text;

    // إرسال الرد
    file_get_contents("https://api.telegram.org/bot$token/sendMessage?chat_id=$chat_id&text=" . urlencode($reply));
}

// اختياري: حفظ السجل في ملف
file_put_contents("log.txt", json_encode($update, JSON_PRETTY_PRINT) . PHP_EOL, FILE_APPEND);

// استجابة لتليجرام (مطلوبة)
echo "OK";
?>
