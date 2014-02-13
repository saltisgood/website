<?php
/**
 * Created by PhpStorm.
 * User: Nick
 * Date: 15/12/13
 * Time: 4:20 PM
 */

include "../../../php/stevo/util.php";
set_include_path("../../../");

$args = array(
    \stevo\Constants::TITLE => "Help &middot; Open App Android",
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
                    <div class="side-menu-link oaa"><a>Help</a></div>
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
                        \'<div class="side-menu-link oaa"><a href="./" onclick="toggleMenu()">About</a></div>\' +
                        \'<div class="side-menu-link oaa"><a href="download.php" onclick="toggleMenu()">Download</a></div>\' +
                        \'<div class="side-menu-link oaa"><a onclick="toggleMenu()">Help</a></div>\' +
                        \'<div class="side-menu-link oaa"><a href="source.php" onclick="toggleMenu()">Source</a></div>\' +
                    \'</div>\' +
                \'</div>\' +
            \'</div>\')
    </script>';

include "base_header.php";
include "top_body.php";

echo '        <div class="content-title"><h3 class="content-title-text">Help</h3></div>
        <div class="content-body">
            <h5>Introduction</h5>
            <p>
                This is the help page for Open App Android and will show you completely how to use the app to its full potential.
            </p>

            <h5>Choose an App</h5>
            <p>
                When you first start the app this is what you see. It\'s all fairly self-explanatory, just click on the top
                button to view the apps that you\'ve installed onto your phone and the middle button to view system apps. I\'d
                recommend sticking to the simpler downloaded apps to start with. This tutorial will use Open App Android itself.
            </p>

            <div class="center double-scrnshot-width">
                <div style="float: left">
                    <a href="../../../img/oaa/app_home_ori.gif" target="_blank">
                        <img src="../../../img/oaa/app_home_small.gif" width="169" height="300">
                    </a>
                    <div class="image-caption">The Home Menu</div>
                </div>
                <div style="float: right">
                    <a href="../../../img/oaa/app_list_ori.gif" target="_blank">
                        <img src="../../../img/oaa/app_list_small.gif" width="169" height="300">
                    </a>
                    <div class="image-caption">The App List</div>
                </div>
            </div>

            <h5>Exploring the App</h5>
            <p>
                Once you\'ve clicked on one of the apps in the list you will come to this page. Once again it\'s fairly
                self-explanatory with just 3 buttons to choose from. The first button, marked "Explore Java Classes" is
                to start exploring the code structures inside the app. The second button, "Explore Resources", is to view
                the app\'s resources and the final button is to launch the app. Please note that since Open App Android finds
                <span class="content-emph">ALL</span> apps, some may not be able to be launched.
            </p>
            <p>
                The final 2 items on the page are the name of the app\'s package and the total number of classes found in
                the app. If the package name is too long to be displayed just tap on it and it will pop-up.
            </p>
            <div class="center scrnshot-width">
                <a href="../../../img/oaa/app_intro_ori.gif" target="_blank">
                    <img src="../../../img/oaa/app_intro_small.gif" width="169" height="300">
                </a>
                <div class="image-caption">The Intro Page</div>
            </div>

            <h5>Exploring Resources</h5>
            <p>
                For now let\'s look at the app\'s resources. Clicking on the "Explore Resources" button will bring you to
                the following page. <span class="content-emph">Note:</span> If the R class can\'t be found inside the app
                then this page won\'t appear and instead you will receive an error message. This should only occur if the
                app\'s developers have actively tried to obfuscate the code.
            </p>
            <p>
                Then you will see this list of resource types that will be familiar to any Android developers. You can also
                find some more information on the
                <a class="content-link" href="http://developer.android.com/guide/topics/resources/index.html">Android website</a>.
                Currently only the drawable and string resource types are supported in Open App Android, but the others
                could be easily added in a future update.
            </p>
            <p>
                Click on one of the resource types and you will see a list of all the resources of that type inside the
                app with a preview of the resource and the name of the resource. Clicking on any item will also give you
                a pop-up with a larger view of the resource.
            </p>
            <div class="center double-scrnshot-width">
                <div style="float: left">
                    <a href="../../../img/oaa/res_intro_ori.gif" target="_blank">
                        <img src="../../../img/oaa/res_intro_small.gif" width="169" height="300">
                    </a>
                    <div class="image-caption">Resources Intro</div>
                </div>

                <div style="float: right">
                    <a href="../../../img/oaa/res_list_oaa_ori.gif" target="_blank">
                        <img src="../../../img/oaa/res_list_oaa_small.gif" width="169" height="300">
                    </a>
                    <div class="image-caption">Resources List</div>
                </div>
            </div>

            <h5>Exploring the Code</h5>
            <p>
                So we\'ve had a look at the resources of the app, so now let\'s go back and check out the code. Just hit
                the back button a few times until you get back to the app explorer page and then click on the "Explore
                Java Classes" button.
            </p>
            <p>
                You\'ll now see a list of all the Java packages inside the app and clicking on them will browse through
                them down the hierarchy. In this example I\'ve gone down to <code>com.nickstephen.openandroid.components</code>,
                which is actually the package containing the Fragments that make up Open App Android. From the screenshot
                you can see there are no more sub-packages and there is a list of classes inside this package. Now you
                can click on any of the classes to view the inside of them. I\'ll click on ClassBrowserFrag, which happens
                to be the Fragment that is displaying the new information on screen (very meta...).
            </p>
            <p>
                This gives you the class or object view. The icon in the top left of the screen says that this object is a
                class, as opposed to an interface, field or method. Each of these object types has a separate icon. Next to
                that is the name of object as given in the source code. Below that is the full name of the super-class.
                This can be clicked on to view the corresponding information for the super-class. Then the expandable list
                below this has all the components of the object. These can be slightly different depending on the type of
                object. For example a class has fields, an interface does not. All of these components can be clicked on
                and viewed as well.
            </p>
            <div class="center double-scrnshot-width">
                <div style="float: left">
                    <a href="../../../img/oaa/pack_list_ori.gif" target="_blank">
                        <img src="../../../img/oaa/pack_list_small.gif" width="169" height="300">
                    </a>
                    <div class="image-caption">Package Browser</div>
                </div>

                <div style="float: right">
                    <a href="../../../img/oaa/class_browse_ori.gif" target="_blank">
                        <img src="../../../img/oaa/class_browse_small.gif" width="169" height="300">
                    </a>
                    <div class="image-caption">Class Browser</div>
                </div>
            </div>
        </div>
';

include "bottom_body.php";

$hierarchy = array(
    'Home' => '../../../',
    'Android' => '../../',
    'Open App Android' => './',
    'Help' => ''
);

include "footer.php";