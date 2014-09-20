<?php
/**
 * Created by PhpStorm.
 * User: Nick
 * Date: 15/02/2014
 * Time: 6:47 PM
 */

include "../../../php/stevo/util.php";
set_include_path("../../../");

$args = array(
    \stevo\Constants::TITLE => "Help &middot; OpenSnap",
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
                This is the help page for OpenSnap and will show you how to use the app to its full potential.
            </p>

            <h5>Premium Features</h5>
            <p>
                All features that are available in the normal SnapChat app are available in OpenSnap by default, but there
                are certain features that are available only to users who purchase Premium Features for a small one time
                fee of AUD$1 (check for your local currency). These features are:
                 <ul>
                    <li>Saving snaps permanently</li>
                    <li>Private viewing mode (i.e. view snaps without them being registered as opened)</li>
                    <li>Ignore snap viewing times</li>
                    <li>Anything else I decide to throw in ;)</li>
                 </ul>
            </p>
            <p>
                Premium features can be accessed by pressing your options button whilst in the home page or by going to
                the settings page and clicking on premium features. This will take you to a Google Play page that handles
                the transaction process. The purchase is then registered to your Google account and will remain with you
                no matter what phone you use or if you reinstall the app. As a small developer it helps greatly if you
                decide to support me with a purchase :)
            </p>

            <h5>Login</h5>
            <p>
                When you first start the app this is what you see. You login with your normal SnapChat username and password.
                Making an account is not currently supported, but will be added in a future update. The login process only
                goes through the SnapChat servers, no information is collected by me (in fact, I don\'t collect any
                information whatsoever, unlike SnapChat...).
            </p>

            <h5>Home</h5>
            <p>
                Once you login you\'re brought to the home page, which you can see below. Here you have 3 buttons to take
                a new snap, view your snaps or view your contacts. You can click the buttons to go to any of those things,
                or simply swipe from left to right to view the snap list, or from right to left to view your contacts. You
                can also click the OpenSnap icon in the Action Bar to open a drawer on the left side with all the options,
                or click on the cog in the top right to view the settings.
            </p>
            <p>
                Users with phones with a hardware options button can click the options button to view the options popup,
                whereas those without will see the overflow button in the right of the Action Bar.
            </p>

            <div class="center scrnshot-width">
                <a href="../../../img/snap/opensnap_home.gif" target="_blank">
                    <img src="../../../img/snap/opensnap_home_small.gif" width="169" height="300">
                </a>
                <div class="image-caption">The Home Page</div>
            </div>

            <h5>The Snaplist</h5>
            <p>
                All your snaps are saved in a list like the one in the picture. Each snap has an icon to the left which
                is its status, the user it was sent to or from and a timestamp of when that was. Video snaps also have a movie icon to
                the right. New snaps will also show up with a red background.
            </p>
            <p>
                When you want to download a snap you simply tap on the item in the list and it will show up a progress
                bar to track it. You can also enable an option in the settings so that snaps are automatically downloaded
                and to enable or disable notifications of downloads. Once a snap is downloaded you tap again to view it.
                You don\'t need to hold down the screen to keep the snap viewed.
            </p>
            <p>
                Snaps can also be long-clicked to get a pop-up with more specific options available, though those are fairly
                bare bones at the moment.
            </p>

            <h5>Contacts</h5>
            <p>
                Your contacts are also saved in a list much like the snaps. They\'re displayed in alphabetical order of
                their display names (if available) or usernames. Your favourite contact (as decided by SnapChat) is shown
                with a star next to their name.
            </p>
            <p>
                Tap a contact\'s name to view the thread of snaps sent and received between yourself and them. This thread
                is just like you would see in a SMS app and shows the thumbnails of the snaps. Tapping on a thumbnail will
                let you view the full snap (if the snap is saved, i.e. if you have premium features).
            </p>

            <h5>New Snaps</h5>
            <p>
                So you want to take a snap, click on the new snap button in the home page. You then have 4 options,
                opensnap camera, resend, select from library and android camera.
            </p>
            <p>
                OpenSnap Camera is to take a picture with the camera built into OpenSnap. Though there are less options
                than the Android camera it will automatically choose the correct picture size and is pretty fast. Use this
                unless you have a reason not to.
            </p>
            <p>
                The resend button will be grayed out unless you\'ve previously sent a snap. In that case you can select it
                to go back to the editing screen with that other snap and modify or send it again.
            </p>
            <p>
                Select from library allows you to send a picture that is currently stored in your android gallery. So
                imagine you\'d previously taken a picture you want to send you can select it, or you\'ve downloaded
                something you want to send you can do it. A very handy feature that\'s not allowed in SnapChat. Note that
                on some phones the kinks haven\'t been completely worked out yet.
            </p>
            <p>
                Android camera is to take a picture with your phone\'s default camera app. This allows you to have more
                control over the end result if you really want to.
            </p>
            <p>
                Once you\'ve taken a snap in some way you\'ll get taken to the snap editor.
            </p>

            <h5>Snap Editor</h5>
            <p>
                The editor is just as fully featured as the SnapChat version. Tap on the snap to the make a caption, drag
                the caption to move it around. Tap the pencil to start drawing, or long click it to choose a colour. Tap
                the pencil again to start erasing. Tap the number in the bottom left to choose the display time and the
                floppy disk if you want to save your snap. Once you\'re finished click on send.
            </p>

            <h5>Contact Selector</h5>
            <p>
                Now you\'re ready to send your snap. You can drag from the very left of the screen to view a preview of
                your snap before it\'s sent. Otherwise tap on a contact to send it just to them or tap the check boxes to
                send to multiple people. If you select people with the check boxes you can also long click on the send
                button to mark it to be sent later. In this case it gets put into your snap list as a temporary snap and
                you just tap on it to send it.
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