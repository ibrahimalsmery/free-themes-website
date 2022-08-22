<?php


function if_is_current_url_return($url, $string): string
{
    return url()->full() === $url ? 'orange_color' : '';
}
