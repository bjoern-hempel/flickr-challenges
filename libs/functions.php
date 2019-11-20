<?php

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

