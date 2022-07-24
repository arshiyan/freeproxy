<?php
error_reporting(false);
header('Content-Type: application/json;charset=utf-8');
$get = file_get_contents("https://free-proxy-list.net/anonymous-proxy.html");
preg_match_all('#<td>([0-9.]+)</td>#i', $get, $Ice);

for ($i = 0 ; $i <= count($Ice[1]) ; $i += 2){
    
    if(strlen($Ice[1][$i] ) > 8)
    {

        $d = [ 'ip' => $Ice[1][$i] ,
        'port' => $Ice[1][$i+1] ,
        'proxy' => $Ice[1][$i].':'.$Ice[1][$i+1] ];
         $arr[] = $d;
    }
}

echo json_encode(
    array_merge([
        'ok'=> true,
        'title' => '» Get Proxy List For Request !',
        'writer'=> "@MJ.Arsiyan",
        'results'=> [
            'count' => count($arr),
            'Proxies' => $arr
        ],
    ]
    ), JSON_PRETTY_PRINT
);
