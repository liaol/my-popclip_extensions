<?php 

$input=trim(getenv('POPCLIP_TEXT'));

$api = 'http://freeapi.ipip.net/';
$opts = array(
    'http'=>array(
        'method'=>"GET",
        'header'=>"User-Agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.116 Safari/537.36\r\n",
    )
);

$input = '114.114.114.114';
$context = stream_context_create($opts);
$url = $api . $input;
$data = file_get_contents($url, false, $context);

if (!empty($data)) {
    $data = json_decode($data, true);
    foreach ($data as $k=>$v) {
        if (empty($v)){
            unset($data[$k]);
        }
    }
    echo implode('|', $data);
} else {
    echo 'fail';
}

