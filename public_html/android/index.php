<?php
/**
 * Created by PhpStorm.
 * User: Nick
 * Date: 14/12/13
 * Time: 1:34 PM
 */

include "../php/stevo/util.php";
set_include_path("../");

$args = array(
    \stevo\Constants::TITLE => "Android",
    \stevo\Constants::MENU_STYLES => True,
    \stevo\Constants::PRIME_NAV => True,
    \stevo\Constants::SELECT_PRIME_NAV => NEW \stevo\PrimeNavEnum(\stevo\PrimeNavEnum::ANDROID)
);
$cons = new \stevo\Constants($args);

include "base_header.php";
include "top_body.php";

echo '            <a class="menu-button" style="margin-top: 40px" href="apps/oaa/">
                <div class="menu-button-bottom">Open App Android</div>
                <div class="menu-button-top">Open App Android</div>
            </a>

            <a class="menu-button" href="apps/snap/">
                <div class="menu-button-bottom">OpenSnap</div>
                <div class="menu-button-top">OpenSnap</div>
            </a>

            <a class="menu-button" href="">
                <div class="menu-button-bottom">Android Development</div>
                <div class="menu-button-top">Android Development</div>
            </a>

            <a class="menu-button" href="">
                <div class="menu-button-bottom">Android Info</div>
                <div class="menu-button-top">Android Info</div>
            </a>';

include "bottom_body.php";
include "footer.php";