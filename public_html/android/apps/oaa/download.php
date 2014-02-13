<?php
/**
 * Created by PhpStorm.
 * User: Nick
 * Date: 15/12/13
 * Time: 4:18 PM
 */

include "../../../php/stevo/util.php";
set_include_path("../../../");

$args = array(
    \stevo\Constants::TITLE => "Download &middot; Open App Android",
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
            <p><span class="content-emph">Coming soon!</span> The easiest way to download the app is through the <a class="content-link" href="https://play.google.com/store">Play Store</a>. Just click here to go to the page and
            then click on install. </p>

            <h5>Versions</h5>
            <p>
                Latest Version (15/12/2013) - <a href="apks/beta-v1-001.apk">Download</a>
            </p>

            <h5>Installation Instructions</h5>
            <p>
                Here are the instructions for manually installing (not through the Play Store):
            </p>
            <ol>
                <li>Download a version of the app from the above links</li>
                <li>Transfer the .apk file to your phone</li>
                <li>Using a file browser (I recommend the
                    <a class="content-link" href="https://play.google.com/store/apps/details?id=com.estrongs.android.pop&hl=en">ES File Explorer</a>)
                    click on the .apk and install it.</li>
            </ol>
        </div>';

include "bottom_body.php";

$hierarchy = array(
    'Home' => '../../../',
    'Android' => '../../',
    'Open App Android' => './',
    'Download' => ''
);

include "footer.php";