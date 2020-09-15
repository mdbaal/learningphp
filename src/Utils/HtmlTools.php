<?php

function addBreak($times = 1)
{
    while ($times != 0) {
        echo "<br>";
        $times--;
    }
}
function addTestTitle($text, $color="black"){
    echo "<h1 style='color: $color'>$text</h1>";
}

function addTestHeader($text, $color="black"){
    echo "<h3 style='color: $color'>$text</h3>";
}

function echoResult($text, $color){
    echo "<span style='color: $color'>$text</span>";
}