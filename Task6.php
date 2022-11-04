<?php

function toCamelCase(string $input):string {
    return preg_replace('/[-_ ]/', '' , ucwords($input, ' /-/_'));
}


echo toCamelCase('               The quick-brown_fox jumps over the_lazy-dog      ');