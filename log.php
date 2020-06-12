<?php
$enable_debug = true;

function LOG_ARRAY($array) {
    foreach ($array as $k=>$v) {
        if (is_array($v)) {
            LOG_MESSAGE("\t".$k);
            LOG_ARRAY($v);
        } else if (is_bool($v) && $v)
            echo "\t{$k}: TRUE\n";
        else if (is_bool($v) && !$v)
                echo "\t{$k}: FALSE\n";
        else if ($v === '')
            echo "\t{$k}: ''\n";
        else 
            echo "\t{$k}: {$v}\n";
    }
}

function LOG_MESSAGE(...$args) {
    global $enable_debug;
    if ($enable_debug) {
        foreach($args as $arg) {
            if (is_string($arg) || is_numeric($arg))
                echo "<b>{$arg}</b><br>";
            else if (is_bool($arg) && !$arg)
                    echo "<pre>\tFALSE\n</pre>";
            else if (is_bool($arg) && $arg)
                echo "<pre>\tTRUE\n</pre>";
            else {
                echo '<pre>';
                LOG_ARRAY($arg);
                echo '</pre>';
            }
        }
    }
}
?>