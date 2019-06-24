<?php

    function after ($thi, $inthat)
    {
        if (!is_bool(strpos($inthat, $thi)))
        return substr($inthat, strpos($inthat,$thi)+strlen($thi));
    };

    function after_last ($thi,  $inthat)
    {
        if (!is_bool(strrevpos($inthat, $thi)))
        return substr($inthat, strrevpos($inthat, $thi)+strlen($thi));
    };

    function before ($thi,  $inthat)
    {
        return substr($inthat, 0, strpos($inthat, $thi));
    };

    function before_last ($thi,  $inthat)
    {
        return substr($inthat, 0, strrevpos($inthat, $thi));
    };

    function between ( $that, $inthat)
    {
        return before ($that, after( $inthat));
    };

    function between_last ( $that, $inthat)
    {
     return after_last( before_last($that, $inthat));
    };

// use strrevpos function in case your php version does not include it
function strrevpos($instr, $needle)
{
    $rev_pos = strpos (strrev($instr), strrev($needle));
    if ($rev_pos===false) return false;
    else return strlen($instr) - $rev_pos - strlen($needle);
};
?>
