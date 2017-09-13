<?php
/**
 * htmlspecialcharsのラッパー
 * @param $str
 * @return string
 */
function h($str) {
    return htmlspecialchars($str, ENT_QUOTES);
}