<?php
$settings = array(
    "position" => array('horizontal' => 'right', 'vertical' => 'bottom'),
    "margin" => 5,
    "content" => "watermark.png",
    "type" => "image"
);

if (!isset($_GET["file"])) {
    echo "Don't call this file directly";
    exit(0);
}
$pic = $_GET["file"];

$image_data = array(
    'png' => array('mime' => 'image/png', 'in' => 'imagecreatefrompng', 'out' => 'imagepng'),
    'jpe' => array('mime' => 'image/jpeg', 'in' => 'imagecreatefromjpeg', 'out' => 'imagejpeg'),
    'jpeg' => array('mime' => 'image/jpeg', 'in' => 'imagecreatefromjpeg', 'out' => 'imagejpeg'),
    'jpg' => array('mime' => 'image/jpeg', 'in' => 'imagecreatefromjpeg', 'out' => 'imagejpeg'),
    'gif' => array('mime' => 'image/gif', 'in' => 'imagecreatefromgif', 'out' => 'imagegif'),
    'bmp' => array('mime' => 'image/bmp', 'in' => 'imagecreatefromwbmp', 'out' => 'imagewbmp')
);

$ext = strtolower(array_pop(explode('.', $pic)));
if (array_key_exists($ext, $image_data)) {
    $im = $image_data[$ext]["in"]($pic);
    header("Content-Type: " . $image_data[$ext]["mime"]);

    $dimensions = getimagesize($pic);
    $width = $dimensions[0];
    $height = $dimensions[1];

    if ($settings["type"] != "image") {
        $fontbox = imagettfbbox($settings["font"]["size"], 0, $settings["font"]["file"], $settings["content"]);
    } else {
        $imagebox = getimagesize($settings["content"]);
    }

    $watermarkwidth = ($settings["type"] != "image") ? abs($fontbox[2] - $fontbox[0]) : $imagebox[0];
    $watermarkheight = ($settings["type"] != "image") ? abs($fontbox[3] - $fontbox[5]) : $imagebox[1];

    $x;
    switch ($settings["position"]["horizontal"]) {
        case "left":
            $x = $settings["margin"];
            break;
        case "center":
            $x = ($width - $watermarkwidth) / 2;
            break;
        case "right":
        default:
            $x = $width - $settings["margin"] - $watermarkwidth;
    }

    $y;
    switch ($settings["position"]["vertical"]) {
        case "top":
            $y = $settings["margin"] + ($settings["type"] != "image" ? $settings["font"]["size"] : $watermarkheight);
            break;
        case "center":
            $y = ($height + $watermarkheight) / 2;
            break;
        case "bottom":
        default:
            $y = $height - $settings["margin"];
    }

    if ($settings["type"] != "image") {
        $text_color = imagecolorallocatealpha($im, $settings["color"]["r"], $settings["color"]["g"], $settings["color"]["b"], (1 - $settings["color"]["alpha"]) * 127);
        imagettftext($im, $settings["font"]["size"], 0, $x, $y, $text_color, $settings["font"]["file"], $settings["content"]);
    } else {
        $watermarkext = strtolower(array_pop(explode('.', $settings["content"])));
        if (array_key_exists($watermarkext, $image_data)) {
            $imwatermark = $image_data[$watermarkext]["in"]($settings["content"]);
            imagecopy($im,$imwatermark,$x,$y-$watermarkheight,0,0,$watermarkwidth,$watermarkheight);
        }
    }

    $image_data[$ext]["out"]($im);
    imagedestroy($im);
} else {

	 header("location: http://www.vektor-mk.ru/");
	header("HTTP/1.1 404 Not Found");
	header("Status: 404 Not Found");
echo "<META http-equiv='refresh' content='0; url=http://www.vektor-mk.ru'> ";
    //echo "The extention '$ext' is not supported at the moment!";
}
?>

