<?php 

$input=trim(getenv('POPCLIP_TEXT'));

$api = 'https://ip.rss.ink/v1/qqwry?ip=';
$opts = array(
    'http'=>array(
        'method'=>"GET",
        'header'=>"User-Agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.116 Safari/537.36\r\n",
    )
);

$context = stream_context_create($opts);
$url = $api . $input;
$data = file_get_contents($url, false, $context);

if (!empty($data)) {
    $data = json_decode($data, true);
    if ($data['code'] == 200 && !empty($data['data'])) {
        $keys = ["country", "province", "city", "county", "area", "isp"];
        $texts = [];
        foreach ($keys as $key) {
            $val = $data['data'][$key];
            if (!empty($val)) {
                $texts[] = $val;
            }
        }
        if (!empty($texts)) {
            echo implode('|', $texts);
            return;
        }
    }
}


echo 'fail';

