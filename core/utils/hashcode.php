<?php
	
/**
 * Generates an hashode that can be used when generating an entity
 * Default given lenght is 76 chars
 */
function generate_hashcode( $length = 76 ) {
    $password = "";
    $possible = "0123456789abcdfghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";

    $i = 0;
	$possible_lenght_minus_1 = strlen($possible) - 1; 
    while ($i < $length) {
        $char = substr($possible, mt_rand(0, $possible_lenght_minus_1 ), 1);
        $password .= $char;
        $i++;
    }
    return $password;
}
