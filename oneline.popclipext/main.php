<?php
$text=trim(getenv('POPCLIP_TEXT'));


echo _to_one_line($text);

function _to_one_line($text) {
    $text = str_replace(" ", "", $text);

    if (!str_contains($text, "\"") && !str_contains($text, "\'")) {
        $text = add_quota($text);
    }
    $text = preg_replace('/\n/', ',', $text, -1);
    return $text;
}

function add_quota($text) {
    $text = preg_replace('/(?m)^/', "'", $text);
    $text = preg_replace('/(?m)$/', "'", $text);
    return $text;
}
