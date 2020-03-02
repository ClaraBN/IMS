<?php
session_start();

if(isset($_SESSION['custom_captcha'])){
unset($_SESSION['custom_captcha']); //destroy the session if it already exists
}
// make the text
$string1="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";//capital letters?
$string2="0123456789";
$string=$string1.$string2;
$string= str_shuffle($string);
$random_text= substr($string,0,8); //we want 8 characters in our captcha for now
$_SESSION['custom_captcha']=$random_text;

// make the background
$im = @ImageCreate (80, 30); //size of captcha (dont know what GD stream means)
$background_color = imagecolorallocate($im, 56, 182, 255); //Assign background color
// making pattern on background
$colors = [];
$red = rand(205, 255);
$green = rand(0, 50);
$blue = rand(137, 177);

for($i = 0; $i < 5; $i++){
    if($i == 0){
        $colors[] = imagecolorallocate($im, 56, 182, 255);
    }
    $colors[] = imagecolorallocate($im, $red-5*$i, $green-5*$i, $blue-5*$i);
}
imagefill($im, 0, 0, $colors[0]);
for($i = 0; $i < 5; $i++){
    imagesetthickness($im, rand(2,5));
    $rect_color = $colors[rand(0,4)];
    imagerectangle($im, rand(-10,70), rand(-10,10), rand(-10,70), rand(20,40), $rect_color);
}

// color the text
$text_color = imagecolorallocate($im, 0, 0, 0); //text color


// put everything togheter
ImageString($im, 5, 5, 5, $random_text, $text_color); //Random string from session added
header('Content-type: image/png'); //to tell the server what mediatype it is looking at
ImagePng($im); //image is displayed as png
imagedestroy($im); //Memory allocation for image is removed


?>