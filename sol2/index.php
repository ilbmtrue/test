<?php

/**
 * @param string $url
 * @return string
 */
function getValidUrl(string $url) : string
{   
    $parsedUrl = parse_url($url);
    parse_str($parsedUrl['query'], $queryParams);
    $queryParams = array_filter($queryParams, function($v) {
        return $v != 3 && is_numeric($v);
    });
    asort($queryParams);
    $queryParams['url'] = $parsedUrl['path'];
    $scheme = $parsedUrl['scheme'];
    $host = $parsedUrl['host'];
    $query = http_build_query($queryParams);
    
    return "$scheme://$host/?$query";
}


$url = "https://www.somehost.com/test/index.html?param1=4&param2=3&param3=2&param4=1&param5=3";
$expectedUrl = "https://www.somehost.com/?param4=1&param3=2&param1=4&url=%2Ftest%2Findex.html";

$validUrl = getValidUrl($url);

echo strcmp($validUrl, $expectedUrl) ? 'no' : 'ok';

