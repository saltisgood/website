<?php
/**
 * Created by PhpStorm.
 * User: Nick
 * Date: 15/12/13
 * Time: 4:11 PM
 */

include "../../../php/stevo/util.php";
set_include_path("../../../");

$args = array(
    \stevo\Constants::TITLE => "Source &middot; Open App Android",
    \stevo\Constants::MENU_STYLES => False,
    \stevo\Constants::PRIME_NAV => True,
    \stevo\Constants::SELECT_PRIME_NAV => new \stevo\PrimeNavEnum(\stevo\PrimeNavEnum::ANDROID),
    \stevo\Constants::INCLUDE_SCRIPTS => True,
    \stevo\Constants::SELECT_SUB_NAV => new \stevo\AndroidNavEnum(\stevo\AndroidNavEnum::OPEN_APP)
);

$cons = new \stevo\Constants($args);

$preContent = '    <noscript>
        <div id="side-menu" class="side-show" style="width:150px">
            <div id="side-menu-links" >
                <div id="side-menu-deco" >
                    <div class="side-menu-link oaa"><a href="./">About</a></div>
                    <div class="side-menu-link oaa"><a href="download.php">Download</a></div>
                    <div class="side-menu-link oaa"><a href="help.php">Help</a></div>
                    <div class="side-menu-link oaa"><a>Source</a></div>
                </div>
            </div>
        </div>
    </noscript>

    <script type="text/javascript">
        document.write(\'<div id="side-menu" class="side-hide oaa">\' +
                \'<ul id="side-menu-tab" >\' +
                    \'<img id="side-menu-toggle" onclick="toggleMenu()" src="../../../img/side_menu_expand.png">\' +
                \'</ul>\' +
                \'<div id="side-menu-links" class="oaa" >\' +
                    \'<div id="side-menu-deco" class="oaa" >\' +
                        \'<div class="side-menu-link oaa"><a href="./" onclick="toggleMenu()">About</a></div>\' +
                        \'<div class="side-menu-link oaa"><a href="download.php" onclick="toggleMenu()">Download</a></div>\' +
                        \'<div class="side-menu-link oaa"><a href="help.php" onclick="toggleMenu()">Help</a></div>\' +
                        \'<div class="side-menu-link oaa"><a onclick="toggleMenu()">Source</a></div>\' +
                    \'</div>\' +
                \'</div>\' +
            \'</div>\')
    </script>';

include "base_header.php";
include "top_body.php";

echo '        <div class="content-title"><h3 class="content-title-text">Source</h3></div>
        <div class="content-body">
            <p>
                Still to come, stay tuned!
            </p>
        </div>';

include "bottom_body.php";

$hierarchy = array(
    'Home' => '../../../',
    'Android' => '../../',
    'Open App Android' => './',
    'Source' => ''
);

include "footer.php";