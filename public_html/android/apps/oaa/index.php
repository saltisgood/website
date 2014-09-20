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
    \stevo\Constants::TITLE => "About &middot; Open App Android",
    \stevo\Constants::MENU_STYLES => False,
    \stevo\Constants::PRIME_NAV => True,
    \stevo\Constants::SELECT_PRIME_NAV => new \stevo\PrimeNavEnum(\stevo\PrimeNavEnum::ANDROID),
    \stevo\Constants::INCLUDE_SCRIPTS => True,
    \stevo\Constants::SELECT_SUB_NAV => new \stevo\AndroidNavEnum(\stevo\AndroidNavEnum::OPEN_APP)
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
                <a href="../../../img/oaa/app_list_ori.gif" target="_blank">
                    <img src="../../../img/oaa/app_list_small.gif" alt="The App List" height="300" width="169" >
                </a>
                <div class="image-caption" style="margin-bottom: 10px">The App List</div>

                <a href="../../../img/oaa/res_list_ori.gif" target="_blank">
                    <img src="../../../img/oaa/res_list_small.gif" alt="The Resource Viewer" height="300" width="169">
                </a>
                <div class="image-caption">Resource Viewer</div>
            </div>
            <p>
                Open App Android is an Android app created to allow users and particularly other Android
                developers to browse the internal structure of their favourite apps and discover how they work. Users can
                easily select from any app that you\'ve installed as well as the pre-installed system apps and load any
                object (in the Java sense) that\'s used in the app to view their details. This is a process known as
                <a href="http://en.wikipedia.org/wiki/Type_introspection">Type Introspection.</a>
                In future updates to the app, full reflection capabilities will be added so that any object can be instantiated
                and manipulated completely inside the app.
            </p>

            <p>
                Once inside an object all the details can be seen, including the implemented interfaces, annotations, fields,
                inner classes and methods as well as the super class. Clicking on any of these items will move to a new
                page that shows a more in-depth view of this item. This page can tell you the modifiers on this object, its
                type, and if the object is a constant will even tell you its value.
            </p>
            <p>
                For certain apps the resources of the app can also be viewed. These are the materials that are used as
                icons, images, strings and even constants inside apps. Note: These values are currently being taken from
                the R class inside the app\'s package, so any app that engages in some code obfuscation can spoof this
                system. Future updates will look to address this limitation.
            </p>
            <p>
                I hope you enjoy the use of this app and I encourage you to use it in conjunction with the source code
                to the app so that you can get an idea of how to interpret it. Please feel free to contact
                me with any suggestions, bug reports, criticisms or even just questions on how it all works. I love to
                hear from users of my programs!
            </p>
            <p class="content-end">
                - Nicholas Stephen, 2013.
            </p>
        </div>';

include "bottom_body.php";

$hierarchy = array(
    'Home' => '../../../',
    'Android' => '../../',
    'Open App Android' => '',
    'About' => ''
);

include "footer.php";