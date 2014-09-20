<?php
/**
 * Created by PhpStorm.
 * User: Nick
 * Date: 15/02/2014
 * Time: 6:12 PM
 */

include "../../../php/stevo/util.php";
set_include_path("../../../");

$args = array(
    \stevo\Constants::TITLE => "Source &middot; OpenSnap",
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
                The full source code for OpenSnap can be found on my <a href="https://github.com/saltisgood/opensnap">GitHub Repository</a>.
            </p>
            <p>
                To download and browse it you will just need <a href="http://git-scm.com/downloads">Git</a> and then you
                can use the commands in a git bash terminal:
            </p>
            <p class="indent"><code>
                git clone https://github.com/saltisgood/opensnap.git OpenSnapProj
            </code></p>
            <p class="indent"><code>
                cd OpenSnapProj
            </code></p>
            <p class="indent"><code>
                git submodule init
            </code></p>
            <p class="indent"><code>
                git submodule update
            </code></p>
            <p>
                These commands simply download the source code files to a new folder OpenSnapProj, change into that
                 folder and then initialise and synchronise the submodules as well. The end result of these commands is
                 that you\'ll have an exact copy of the last stable release of OpenSnap.
            </p>
            <p>
                The repository is set up so that if you\'re using
                <a href="http://developer.android.com/sdk/installing/studio.html">Android Studio</a> you should just be
                able to open it straight away without any hassle importing the project. If you\'re using eclipse with the
                <a href="http://developer.android.com/tools/sdk/eclipse-adt.html">ADT Plugin</a> then you may have to do
                some wrangling to get it to import and build.
            </p>
        </div>';

include "bottom_body.php";

$hierarchy = array(
    'Home' => '../../../',
    'Android' => '../../',
    'OpenSnap' => './',
    'Source' => ''
);

include "footer.php";