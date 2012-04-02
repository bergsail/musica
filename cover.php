<?php

require_once('getid3/getid3.php');

$file = $_GET['filename'];

$getID3 = new getID3;
$getID3->option_tag_id3v2 = true; 
$getID3->analyze($file);
$getID3->option_tags_images = true;

if(isset($getID3->info['id3v2']['APIC'][0]['data']))
{
    $cover = $getID3->info['id3v2']['APIC'][0]['data'];
}
else if (isset($getID3->info['id3v2']['PIC'][0]['data']))
{
    $cover = $getID3->info['id3v2']['PIC'][0]['data'];
}else
{
    $cover = "no_cover";
}

if (isset($getID3->info['id3v2']['APIC'][0]['image_mime']))
{
    $mimetype = $getID3->info['id3v2']['APIC'][0]['image_mime'];
} else
{
    $mimetype = 'image/jpeg';
}

if (!is_null($cover))
{
    // Send file
    header("Content-Type: " . $mimetype);

    if (isset($getID3->info['id3v2']['APIC'][0]['image_bytes']))
    {
        header("Content-Length: " . $getID3->info['id3v2']['APIC'][0]['image_bytes']);
    }

    echo($cover);
    
    echo $cover;
} ?>