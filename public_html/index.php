<?php
/**
 * Created by PhpStorm.
 * User: Nick
 * Date: 14/12/13
 * Time: 12:23 AM
 */

set_include_path("php/stevo");
include "php/stevo/util.php";

$args = array(
    \stevo\Constants::TITLE => "Welcome!",
    \stevo\Constants::MENU_STYLES => True,
    \stevo\Constants::PRIME_NAV => False
);
$cons = new \stevo\Constants($args);

include "base_header.php";

include "top_body.php";

echo '            <a class="menu-button" style="margin-top: 40px" href="android/">
                <div class="menu-button-bottom">Android</div>
                <div class="menu-button-top">Android</div>
            </a>

            <a class="menu-button" href="">
                <div class="menu-button-bottom">Web Development</div>
                <div class="menu-button-top">Web Development</div>
            </a>

            <a class="menu-button" href="">
                <div class="menu-button-bottom">About Me</div>
                <div class="menu-button-top">About Me</div>
            </a>

            <a class="menu-button" href="contact.php">
                <div class="menu-button-bottom">Contact Me</div>
                <div class="menu-button-top">Contact Me</div>
            </a>';

include "bottom_body.php";
include "footer.php";
