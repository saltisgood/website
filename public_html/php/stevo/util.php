<?php
/**
 * Created by PhpStorm.
 * User: Nick
 * Date: 14/12/13
 * Time: 7:15 PM
 */

include_once "Constants.php";
include_once "PrimeNavEnum.php";
include_once "AndroidNavEnum.php";

function getRootPath() {
    return "http://" . $_SERVER['HTTP_HOST'];
}