<?php 
$input=getenv('POPCLIP_TEXT');

echo json_decode('"' . $input . '"');
