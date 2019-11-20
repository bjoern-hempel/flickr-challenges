<?php

include_once 'libs/functions.php';

$pageIsa = 'https://www.flickr.com/photos/181759262@N03/48976825247/in/dateposted/';
$pageBjoern = 'https://www.flickr.com/photos/aomorin/48988168367/in/dateposted-public/';

$informationsIsa = getInformationsOfPage($pageIsa);
$informationsBjoern = getInformationsOfPage($pageBjoern);
$time = date("d.m.Y - H:i:s", time());
$message = 'Hast du etwa.. Ja du hast! Du hast diesen kleinen niedlichen Affen wieder hinzugefügt! Obwohl du ganz genau weißt, dass ich dem nicht wiederstehen kann und er mich von allem Ringsum ablenkt! Gut! Das bedeutet Krieg! 😂 Dann packe ich einfach was hinzu, was mich auch inspiriert und füge meine eigene Vorstellung von unseren Avataren hinzu! Ja so in dieser Kombination sieht das für mich richtig gut aus! 😉';
$templatePath = sprintf('%s/templates/index.tpl', dirname(__FILE__));
$htmlTemplate = file_get_contents(sprintf('%s/templates/index.tpl', dirname(__FILE__)));

print sprintf(
    $htmlTemplate,
    $message,
    $informationsIsa['path'],
    $informationsBjoern['path'],
    $informationsIsa['views'],
    $informationsBjoern['views'],
    $informationsIsa['likes'],
    $informationsBjoern['likes'],
    $informationsIsa['comments'],
    $informationsBjoern['comments'],
    $time
);

