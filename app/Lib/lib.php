<?php

use Illuminate\Support\Facades\Storage;


function resizeImageToThumbnail($imagePath)
{

    $fullImagePath = config('app.images_url') . $imagePath;

    $source = imagecreatefrompng($fullImagePath);
    list($width, $height) = getimagesize($fullImagePath);

    $newWidth = $width / 5;
    $newHeight = $height / 5;

    $destinationImage = imagecreatetruecolor($newWidth, $newHeight);
    imagecopyresampled($destinationImage, $source, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

    imagepng($destinationImage, "thumbnail.png", 9);

    $pathToFile = public_path() . '/thumbnail.png';

    $thumbnailName = 'thumbnails/' . $imagePath;

    Storage::put($thumbnailName, file_get_contents($pathToFile));

    return $thumbnailName;

}


