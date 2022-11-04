<?php

function checkURL(string $input):string {
    $regExp = '/(https|http):\/\/(www\.)?([a-zA-Z0-9]+)(\.[a-zA-Z0-9]+)?(\.[a-zA-Z]+)([a-zA-Z0-9\/\\@:%._+~#?&=]+)?/';
    if (preg_match($regExp, $input)) {
        return 'OK';
    } else {
        return 'Not a valid URL';
    }
}

echo checkURL('https://innowise.com/');
echo checkURL('https://docs.google.com/document/d/10IXEVGxlECznbmo0u203SaKvssxXBTJO5uE2ILO6CVk/edit');
echo checkURL(' htps://innowise,com/');