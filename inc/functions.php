<?php
/**
 * Created by PhpStorm.
 * User: acb222
 * Date: 11/8/16
 * Time: 11:11 AM
 */

function getQuestionData() {
    $datadir = "inc";
    $datafile = "a.ini";
    $datapath = $datadir . "/" . $datafile;
    return parse_ini_file ( $datapath, true );
}