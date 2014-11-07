<?php
/**
 * Created by PhpStorm.
 * User: Nick Stephen
 * Date: 3/10/14
 * Time: 4:20 PM
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
    $menu->software->subItems[SOFT_ANDR]->subItems[SOFT_ANDR_SNAP]->active = true;
    $menu->software->subItems[SOFT_ANDR]->subItems[SOFT_ANDR_SNAP]->subItems[SOFT_ANDR_SNAP_DOWN]->active = true;
}

$htmlOut = new HTML();

$htmlOut->relPath = '../.././';
$htmlOut->thisPath = './software/android/snap/download.php';

$htmlOut->content->title = 'Download';
$htmlOut->content->subtitle = 'OpenSnap';

$htmlOut->content->addSection(new Section('Manual Install',
    new Paragraph('If you\'re a power user then feel free to go to the <a href="source.php">source page</a>, download the source code and build the
app yourself. Everything needed is freely available and the instructions are there for you. Once you can
build the app you just need to take the .apk file and install that on your device.')));

$htmlOut->write();