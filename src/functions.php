<?php
namespace php_utils\functions;

/**
 * カラーコードを入力するとNTSC加重平均を厳密ではない計算をしたグレースケールのカラーコードを返す
 * 
 * @param string $colorCode カラーコード
 * @return string グレースケールのカラーコード
 */
function convertToGreyScale(string $colorCode){
    if(substr($colorCode,0,1) !== "#" ){
        throw new \Exception('#で始まるカラーコードではない');
    }
    if(strlen($colorCode) != 4 && strlen($colorCode) != 7){
        throw new \Exception('3桁または6桁のカラーコードではない');
    }
    // カラーコードからRGBをそれぞれ抽出し数値に変換
    if(strlen($colorCode) == 4){
        $red   = hexdec(str_repeat(substr($colorCode,1,1),2));
        $green = hexdec(str_repeat(substr($colorCode,2,1),2));
        $blue  = hexdec(str_repeat(substr($colorCode,3,1),2));
    }else{
        $red   = hexdec(substr($colorCode,1,2));
        $green = hexdec(substr($colorCode,3,2));
        $blue  = hexdec(substr($colorCode,5,2));
    }

    // RGBからNTSC加重平均のグレースケールを計算
    $greyScale = round(0.29891*$red + 0.58661*$green + 0.11447*$blue);

    // グレースケールをカラーコードに変換
    $greyElm       = str_pad(dechex($greyScale), 2, 0, STR_PAD_LEFT);
    $greyScaleCode = "#" . $greyElm . $greyElm . $greyElm;

    return $greyScaleCode;
}
