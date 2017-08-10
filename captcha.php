<?php
session_start();    //開啟session
header("Content-type: image/png");  //宣告此檔案將產生png
$_SESSION['captcha'] = "";  //宣告：session的變數名稱為captcha，內容為空值
$image = imagecreatetruecolor(84, 24)
   or die("Cannot Initialize new GD image stream");    //設定圖片的寬度為84px、高度為24px，或是若系統不支援GD則停止執行
$transparent = imagecolorallocatealpha($image, 255, 255, 255, 127);    //設定透明色為白色
$color = imagecolorallocate($image, 68, 68, 68);    //設定字體顏色
$text = "";    //宣告字串text為空值

//設定字串text長度為7，亂數產生的數字放入字串text
for ($i = 0; $i < 7; $i++){
    $text .= rand(0,9);
}
$_SESSION['captcha'] = $text;   //將字串text的內容放入session變數captcha

//將白色轉換成透明
imagefill($image, 0, 0, $transparent);
imagecolortransparent ($image, $transparent);

imagestring($image, 5, 10, 5,  $text, $color);    //將字串text放入圖片中
imagepng($image);   //產生png
imagedestroy($image);   //關閉產生程式
?>