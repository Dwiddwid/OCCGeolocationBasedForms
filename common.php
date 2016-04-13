<?php

function textLink($id, $text) {
    $output = "<span id=\"$id" . "Link\" class=\"textLink\">";
    $output.="<a href=\"$id" . ".php\">";
    $output.=$text;
    $output.="</a>";
    $output.="</span>";
    echo $output;
    unset($output);
}

function imageLink($id, $text, $citation) {
    $output = "<div id=\"$id" . "ImageLink\" >";
    $output.="<a href=\"$id" . ".php\">";
    $output.="<image id=\"$id" . "Image\" src=\"$id" . ".png\">";
    $output.="</a>";
    $output.="<!-- $citation -->";
    $output.="</div>";
    $output.="<div id=\"$id" . "ImageCaption\" class=\"caption\" >$text</div>";
    echo $output;
    unset($citation);
    unset($output);
}



?>