<?php
declare(strict_types=1);

function imageUpload(string $path, object $image) :array
{

    // generate a unique image name
    $imageNewName = time().'.'.$image->extension();

    // upload image
    $image->move($path, $imageNewName);

    // copy image in thumbnail folder ( here you can use (intervention/image) package to generate the image thumbnail )
    copy($path.'/'.$imageNewName, $path.'/thumbnails/'.$imageNewName);

    return [

        'image' => $imageNewName,
        'imageThumbnail' => $imageNewName
    ];
}

function imageUnlink(string $path, string $image)
{
    // unlink image
    @unlink($path.'/'.$image);

    // unlink image thumbnails
    @unlink($path.'/thumbnails/'.$image);
}
