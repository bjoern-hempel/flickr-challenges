<?php

$pageIsa = 'https://www.flickr.com/photos/181759262@N03/48976825247/in/dateposted/';
$pageBjoern = 'https://www.flickr.com/photos/aomorin/48988168367/in/dateposted-public/';

function getNumberOfViews($html)
{
    $matches = array();
    if (preg_match('~<span class="view-count-label">.+?([0-9,]+)~s', $html, $matches)) {
        return str_replace(',', '', $matches[1]);
    }

    return 0;

}

function getNumberOfLikes($html)
{
    $matches = array();
    if (preg_match('~<span class="fave-count-label">.+?([0-9,]+)~s', $html, $matches)) {
        return str_replace(',', '', $matches[1]);
    }

    return 0;
}

function getNumberOfComments($html)
{
    $matches = array();
    if (preg_match('~<span class="comment-count-label">.+?([0-9,]+)~s', $html, $matches)) {
        return str_replace(',', '', $matches[1]);
    }

    return 0;
}

function getInformationsOfPage($page)
{
    $curl = curl_init();

    curl_setopt_array($curl, [
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_URL => $page,
        CURLOPT_USERAGENT => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.120 Safari/537.36'
    ]);

    $html = curl_exec($curl);

    curl_close($curl);

    return array(
        'views'    => getNumberOfViews($html),
        'likes'    => getNumberOfLikes($html),
        'comments' => getNumberOfComments($html),
    );
}

$informationsIsa = getInformationsOfPage($pageIsa);
$informationsBjoern = getInformationsOfPage($pageBjoern);
$time = date("d.m.Y - H:i:s", time());

$htmlTemplate = <<<HTML
<!DOCTYPE html>
<html lang="en" style="width: 100%%; height: 100%%; padding: 0; margin: 0;">
    <head>
        <title>Die Flickr Challenge</title>
    </head>
    <body style="width: 100%%; height: 100%%; padding: 0; margin: 0; background-image: url('https://live.staticflickr.com/65535/48976646986_1d786e7d56_h.jpg'); background-position: center; background-repeat: no-repeat; background-size: cover;">
        <table border="0" style="width: 100%%; height: 100%%;"><tr><td valign="middle" align="center" style="font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 40px; font-style: normal; font-variant: normal; font-weight: 400; background-color: rgba(255, 255, 255, 0.5);">
            <table border="0" cellpadding="20" style="background-color: rgba(255, 255, 255, 0.5);">
                <tr><td></td><td align="center" style="font-size: 60px;"><b>Isa</b></td><td>vs.</td><td align="center" style="font-size: 60px;"><b>Bj&ouml;rn</b></td></tr>
                <tr><td style="font-size: 20px;">Views</td><td align="center">%d</td><td>vs.</td><td align="center">%d</td></tr>
                <tr><td style="font-size: 20px;">Likes</td><td align="center">%d</td><td>vs.</td><td align="center">%d</td></tr>
                <tr><td style="font-size: 20px;">Comments</td><td align="center">%d</td><td>vs.</td><td align="center">%d</td></tr>
                <tr><td align="center" colspan="4" style="font-size: 20px;"><b>Stand:</b> %s</td>
            </table>
        </td></tr></table>
    </body>
</html>
HTML;

print sprintf($htmlTemplate, $informationsIsa['views'], $informationsBjoern['views'], $informationsIsa['likes'], $informationsBjoern['likes'], $informationsIsa['comments'], $informationsBjoern['comments'], $time);

