<?php
/**
 * Created by PhpStorm.
 * User: Nick
 * Date: 15/02/2014
 * Time: 6:33 PM
 */

include "../../../php/stevo/util.php";
set_include_path("../../../");

$args = array(
    \stevo\Constants::TITLE => "Download &middot; OpenSnap",
    \stevo\Constants::MENU_STYLES => False,
    \stevo\Constants::PRIME_NAV => True,
    \stevo\Constants::SELECT_PRIME_NAV => new \stevo\PrimeNavEnum(\stevo\PrimeNavEnum::ANDROID),
    \stevo\Constants::INCLUDE_SCRIPTS => True,
    \stevo\Constants::SELECT_SUB_NAV => new \stevo\AndroidNavEnum(\stevo\AndroidNavEnum::OPENSNAP)
);

$cons = new \stevo\Constants($args);

$preContent = '    <noscript>
        <div id="side-menu" class="side-show" style="width:150px">
            <div id="side-menu-links" >
                <div id="side-menu-deco" >
                    <div class="side-menu-link oaa"><a href="./">About</a></div>
                    <div class="side-menu-link oaa"><a>Download</a></div>
                    <div class="side-menu-link oaa"><a href="help.php">Help</a></div>
                    <div class="side-menu-link oaa"><a href="source.php">Source</a></div>
                </div>
            </div>
        </div>
    </noscript>

    <script type="text/javascript">
        $(document).ready(function() {
            $("#side-menu").addClass("side-hide").addClass("oaa").removeClass("side-show").css("width", 190);
        });
    </script>

    <script type="text/javascript">
        document.write(\'<div id="side-menu" class="side-hide oaa">\' +
                \'<ul id="side-menu-tab" >\' +
                    \'<img id="side-menu-toggle" onclick="toggleMenu()" src="../../../img/side_menu_expand.png">\' +
                \'</ul>\' +
                \'<div id="side-menu-links" class="oaa" >\' +
                    \'<div id="side-menu-deco" class="oaa" >\' +
                        \'<div class="side-menu-link oaa"><a href="./" onclick="toggleMenu()">About</a></div>\' +
                        \'<div class="side-menu-link oaa"><a onclick="toggleMenu()">Download</a></div>\' +
                        \'<div class="side-menu-link oaa"><a href="help.php" onclick="toggleMenu()">Help</a></div>\' +
                        \'<div class="side-menu-link oaa"><a href="source.php" onclick="toggleMenu()">Source</a></div>\' +
                    \'</div>\' +
                \'</div>\' +
            \'</div>\')
    </script>';

include "base_header.php";
include "top_body.php";

echo '        <div class="content-title"><h3 class="content-title-text">Download</h3></div>
        <div class="content-body">
            <h5>Google Play</h5>
            <p>
                The easiest way to download the app is through the
                <a href="https://play.google.com/store/apps/details?id=com.nickstephen.opensnap">
                Play Store.</a> Just click the link to go the page and then click on install.
            </p>
            <p>
                Or you can search for Open App Android through your mobile\'s Play Store application.
            </p>
            <h5>Manual Install</h5>
            <p>
                If you\'re a power user then feel free to go to the <a href="source.php">source page</a>, download the source code and build the
                app yourself. Everything needed is freely available and the instructions are there for you. Once you can
                build the app you just need to take the .apk file and install that on your device.
            </p>
        </div>';

include "bottom_body.php";

$hierarchy = array(
    'Home' => '../../../',
    'Android' => '../../',
    'OpenSnap' => './',
    'Download' => ''
);

include "footer.php";