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

function getImagePath($html)
{
    $matches = array();

    if (preg_match('~<img .+? src="([^"]+)" class="low-res-photo"~s', $html, $matches)) {
        return $matches[1];
    }

    return null;
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
        'path'     => getImagePath($html),
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
        <script type="text/javascript">
            function compare()
            {
                var viewsIsa = document.getElementById('viewsIsa').textContent;
                var viewsBjoern = document.getElementById('viewsBjoern').textContent;
                var likesIsa = document.getElementById('likesIsa').textContent;
                var likesBjoern = document.getElementById('likesBjoern').textContent;
                var commentsIsa = document.getElementById('commentsIsa').textContent;
                var commentsBjoern = document.getElementById('commentsBjoern').textContent;

                if (viewsIsa > viewsBjoern){
                    document.getElementById('viewsIsa').setAttribute("style", "color: #4cb576; font-weight: bold");
                }else if (viewsIsa < viewsBjoern) {
                    document.getElementById('viewsBjoern').setAttribute("style", "color: #4cb576; font-weight: bold");
                }

                if (likesIsa > likesBjoern){
                    document.getElementById('likesIsa').setAttribute("style", "color: #4cb576; font-weight: bold");
                }else if (likesIsa < likesBjoern) {
                    document.getElementById('likesBjoern').setAttribute("style", "color: #4cb576; font-weight: bold");
                }

                if (commentsIsa > commentsBjoern){
                    document.getElementById('commentsIsa').setAttribute("style", "color: #4cb576; font-weight: bold");
                }else if (commentsIsa < commentsBjoern) {
                    document.getElementById('commentsBjoern').setAttribute("style", "color: #4cb576; font-weight: bold");
                }
            }
        </script>
    </head>
    <!--body style="width: 100%%; height: 100%%; padding: 0; margin: 0; background-image: url('https://live.staticflickr.com/65535/48976646986_1d786e7d56_h.jpg'); background-position: center; background-repeat: no-repeat; background-size: cover;"-->
    <body style="width: 100%%; height: 100%%; padding: 0; margin: 0; background-color: #c0c0c0; background-image: url('https://live.staticflickr.com/65535/48976646986_1d786e7d56_h.jpg'); background-position: center; background-repeat: no-repeat; background-size: 100%% auto;" onload="compare()">
        <table border="0" style="width: 100%%; height: 100%%;"><tr><td valign="middle" align="center" style="font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 40px; font-style: normal; font-variant: normal; font-weight: 400; background-color: rgba(255, 255, 255, 0.5);">
            <table border="0" cellpadding="20" style="background-color: rgba(255, 255, 255, 0.5);">
                <tr><td colspan="4">Hier schummelt niemand! Und wer 6 Likes mehr hat, muss ja gar nicht meckern 😉</td></tr>
                <tr><td></td><td align="center" style="font-size: 60px;"><b>Isa</b></td><td>vs.</td><td align="center" style="font-size: 60px;"><b>Bj&ouml;rn</b></td></tr>
                <tr><td style="font-size: 20px;">Image</td><td align="center"><img style="width: 200px;" src="%s"></td><td>vs.</td><td align="center"><img style="width: 200px;" src="%s"></td></tr>
                <tr><td style="font-size: 20px;">Views</td><td align="center" id="viewsIsa">%d</td><td>vs.</td><td align="center" id="viewsBjoern">%d</td></tr>
                <tr><td style="font-size: 20px;">Likes</td><td align="center" id="likesIsa">%d</td><td>vs.</td><td align="center" id="likesBjoern">%d</td></tr>
                <tr><td style="font-size: 20px;">Comments</td><td align="center" id="commentsIsa">%d</td><td>vs.</td><td align="center" id="commentsBjoern">%d</td></tr>
                <tr><td align="center" colspan="4" style="font-size: 20px;"><b>Stand:</b> %s</td>
            </table>
        </td></tr></table>
    </body>
</html>
HTML;

print sprintf($htmlTemplate, $informationsIsa['path'], $informationsBjoern['path'], $informationsIsa['views'], $informationsBjoern['views'], $informationsIsa['likes'], $informationsBjoern['likes'], $informationsIsa['comments'], $informationsBjoern['comments'], $time);

