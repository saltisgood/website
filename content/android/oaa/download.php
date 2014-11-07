<?php
/**
 * Created by PhpStorm.
 * User: Nick Stephen
 * Date: 3/10/14
 * Time: 3:41 PM
 */

if (!isset($rel))
{
    $rel = '../../../';
}

require $rel . 'lib/HTMLOutput.php';

function setupMenu(SideMenu $menu)
{
    $menu->software->active = true;
    $menu->software->subItems[SOFT_ANDR]->active = true;
    $menu->software->subItems[SOFT_ANDR]->subItems[SOFT_ANDR_OAA]->active = true;
    $menu->software->subItems[SOFT_ANDR]->subItems[SOFT_ANDR_OAA]->subItems[SOFT_ANDR_OAA_DOWN]->active = true;
}

$htmlOut = new HTML();

$htmlOut->relPath = '../.././';
$htmlOut->thisPath = './software/android/oaa/download.php';

$htmlOut->content->title = 'Download';
$htmlOut->content->subtitle = 'Open App Android';

$htmlOut->content->addSection((new Section('Google Play'))
    ->addParagraph(new Paragraph('The easiest way to download the app is through the
                <a href="https://play.google.com/store/apps/details?id=com.nickstephen.openandroid">
                Play Store.</a> Just click the link to go the page and then click on install.'))
    ->addParagraph(new Paragraph('Or you can search for Open App Android through your mobile\'s Play Store application.')));

$htmlOut->content->addSection(new Section('Manual Install', new Paragraph('If you\'re a power user then feel free to go to the <a href="source.php">source page</a>, download the source code and build the
                app yourself. Everything needed is freely available and the instructions are there for you. Once you can
                build the app you just need to take the .apk file and install that on your device.')));

$htmlOut->write();