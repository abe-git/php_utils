<?php
// namespace php_utils\functions;

/**
 * カラーコードを入力するとNTSC加重平均により計算したグレースケールのカラーコードを返す
 * 
 * @param string $colorCode カラーコード
 * @return string グレースケールのカラーコード
 */
function convertToGreyScale($colorCode){
    // カラーコードからRGBをそれぞれ抽出し数値に変換
    $red = hexdec(substr($colorCode,1,2));
    $green = hexdec(substr($colorCode,3,2));
    $blue = hexdec(substr($colorCode,5,2));

    // RGBからNTSC加重平均のグレースケールを計算
    $greyScale = ceil(0.298912*$red + 0.586611*$green + 0.114478*$blue);

    // グレースケールをカラーコードに変換
    $greyElm = dechex($greyScale);
    $greyScaleCode = "#" . $greyElm . $greyElm . $greyElm;

    return $greyScaleCode;
}

/**
 * 背景色を入力すると見やすい文字色が白か黒か判断しカラーコードを返す
 * 
 * 背景色の明暗に合わせて下記を返す。
 * 背景色が明るい→黒(#000000)
 * 背景色が暗い→白(#ffffff)
 * 
 * @param string $colorCode 背景色のカラーコード
 * @return string 背景色に適した文字のカラーコード(白黒)
 */
function getRGreyScale($colorCode){
    // カラーコードからRGBをそれぞれ抽出し数値に変換
    $red = hexdec(substr($colorCode,1,2));
    $green = hexdec(substr($colorCode,3,2));
    $blue = hexdec(substr($colorCode,5,2));

    // RGBからNTSC加重平均のグレースケールを計算
    $greyScale = ceil(0.298912*$red + 0.586611*$green + 0.114478*$blue);

    // グレースケールが黒寄りなら白、白寄りなら黒の反転グレースケールにする
    if($greyScale < 128){
        $rGreyScale = 255;
    }else{
        $rGreyScale = 0;
    }

    // 反転グレースケールをカラーコードに変換
    $rGreyElm = dechex($rGreyScale);
    $rGreyScaleCode = "#" . $rGreyElm . $rGreyElm . $rGreyElm;

    return $rGreyScaleCode;
}