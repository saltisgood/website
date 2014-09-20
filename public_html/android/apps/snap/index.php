<?php
/**
 * Created by PhpStorm.
 * User: Nick
 * Date: 14/12/13
 * Time: 6:58 PM
 */

include "../../../php/stevo/util.php";
set_include_path("../../../");

$args = array(
    \stevo\Constants::TITLE => "About &middot; OpenSnap",
    \stevo\Constants::MENU_STYLES => False,
    \stevo\Constants::PRIME_NAV => True,
    \stevo\Constants::SELECT_PRIME_NAV => new \stevo\PrimeNavEnum(\stevo\PrimeNavEnum::ANDROID),
    \stevo\Constants::INCLUDE_SCRIPTS => True,
    \stevo\Constants::SELECT_SUB_NAV => new \stevo\AndroidNavEnum(\stevo\AndroidNavEnum::OPENSNAP)
);

$cons = new \stevo\Constants($args);

include "base_header.php";

$preContent = '    <noscript>
        <div id="side-menu" class="side-show" style="width:150px">
            <div id="side-menu-links" >
                <div id="side-menu-deco" >
                    <div class="side-menu-link oaa"><a>About</a></div>
                    <div class="side-menu-link oaa"><a href="download.php">Download</a></div>
                    <div class="side-menu-link oaa"><a href="help.php">Help</a></div>
                    <div class="side-menu-link oaa"><a href="source.php">Source</a></div>
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
                        \'<div class="side-menu-link oaa"><a onclick="toggleMenu()">About</a></div>\' +
                        \'<div class="side-menu-link oaa"><a href="download.php" onclick="toggleMenu()">Download</a></div>\' +
                        \'<div class="side-menu-link oaa"><a href="help.php" onclick="toggleMenu()">Help</a></div>\' +
                        \'<div class="side-menu-link oaa"><a href="source.php" onclick="toggleMenu()">Source</a></div>\' +
                    \'</div>\' +
                \'</div>\' +
            \'</div>\')
    </script>';

include "top_body.php";

echo '        <div class="content-title"><h3 class="content-title-text">About</h3></div>
        <div class="content-body">
            <div class="image-container" style="margin-bottom: 10px">
                <a href="../../../img/snap/opensnap_home.gif" target="_blank">
                    <img src="../../../img/snap/opensnap_home_small.gif" alt="The App List" height="300" width="169" >
                </a>
                <div class="image-caption" style="margin-bottom: 10px">OpenSnap Homepage</div>
            </div>
            <p>
                OpenSnap is an alternate client for <a href="http://www.snapchat.com/">SnapChat</a> that includes extra
                features such as the ability to permanently save snaps, send pictures from your Android library, view
                message threads between contacts, view snaps in a privacy mode and more.
            </p>
            <p>
                OpenSnap is developed solely by myself so certain features haven\'t yet been added to it, but will be
                in future updates (such as the ability to modify your friends list). Purchasing the premium features
                like snap saving allows me to spend more time on the project and maintain it faster.
            </p>
            <p>
                Like my other Android apps OpenSnap is fully open source and the code files can be downloaded from the
                <a href="source.php">source page</a>.
            </p>
            <p>
                If you find any bugs please don\'t hesitate to send me a message, either through the
                <a href="https://play.google.com/store/apps/details?id=com.nickstephen.opensnap">Play Store listing</a>
                 , or through my <a href="../../../contact.php">website\'s contact page</a>. And as always, if you enjoy
                  the use of the app please rate it on the Play Store.
            </p>
            <p class="content-end">
                - Nicholas Stephen, 2014.
            </p>
        </div>';

include "bottom_body.php";

$hierarchy = array(
    'Home' => '../../../',
    'Android' => '../../',
    'OpenSnap' => '',
    'About' => ''
);

include "footer.php";