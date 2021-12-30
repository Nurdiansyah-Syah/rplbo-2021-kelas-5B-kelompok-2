<?php
function debug() {
    foreach (func_get_args() as $value) {
        echo "<pre>";
        print_r($value);
        echo "</pre>";
    }
}

function debux() {
    foreach (func_get_args() as $value) {
        echo "<pre>";
        print_r($value);
        echo "</pre>";
    }
    exit();
}