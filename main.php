<?php
function agentedGet($url){
    $options = array(
    'http'=>array(
        'method'=>"GET",
        'header'=>"Accept-language: en\r\n" .
                "User-Agent: Mozilla/5.0 (iPad; U; CPU OS 3_2 like Mac OS X; en-us) AppleWebKit/531.21.10 (KHTML, like Gecko) Version/4.0.4 Mobile/7B334b Safari/531.21.102011-10-16 20:23:10\r\n" // i.e. An iPad 
    )
    );

    $context = stream_context_create($options);
    return file_get_contents($url, false, $context);
}

$githubText = agentedGet("https://api.github.com/users/abbychau/events");
$githubArr = json_encode($githubText); //(created_at)

$t=simplexml_load_file("https://www.plurk.com/abbychau.xml");
$plurk=json_encode($t); //$x['entry'] (published)

$t=simplexml_load_file("https://realblog.zkiz.com/rssdata/4.xml");
$rb=json_encode($t);  //$x['channel']['item']

$t=simplexml_load_file("https://www.youtube.com/feeds/videos.xml?channel_id=UCwSbzL_4eLhZzi_UUUNlklg"); //$x['entry'] (published)
$yt=json_encode($t);

$t=simplexml_load_file("https://feeds.soundcloud.com/users/soundcloud:users:16834187/sounds.rss");
$sc=json_encode($t);/////$x['channel']['item'] (pubDate)


