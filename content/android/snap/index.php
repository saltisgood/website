<?php
/**
 * Created by PhpStorm.
 * User: Nick Stephen
 * Date: 3/10/14
 * Time: 4:19 PM
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
    $menu->software->subItems[SOFT_ANDR]->subItems[SOFT_ANDR_SNAP]->subItems[SOFT_ANDR_SNAP_IND]->active = true;
}

$htmlOut = new HTML();

$htmlOut->relPath = '../.././';
$htmlOut->thisPath = './software/android/snap/index.php';

$htmlOut->content->title = 'About';
$htmlOut->content->subtitle = 'OpenSnap';

$htmlOut->content->addImageSection((new ImageSection(ImageSection::SCREENSHOT | ImageSection::SHOWCASE))
    ->addImage((new Image('img/opensnap_home_small.gif', 169, 300))
       ->setAltLink('img/opensnap_home.gif')
        ->setAltText('OpenSnap Homepage')
        ->setCaption('OpenSnap Homepage')));

$htmlOut->content->addSection((new Section())
    ->addParagraph(new Paragraph('OpenSnap is an alternate client for <a href="http://www.snapchat.com/">SnapChat</a> that includes extra
features such as the ability to permanently save snaps, send pictures from your Android library, view
message threads between contacts, view snaps in a privacy mode and more.'))
    ->addParagraph(new Paragraph('OpenSnap is developed solely by myself so certain features haven\'t yet been added to it, but will be
in future updates (such as the ability to modify your friends list). Purchasing the premium features
like snap saving allows me to spend more time on the project and maintain it faster.'))
    ->addParagraph(new Paragraph('Like my other Android apps OpenSnap is fully open source and the code files can be downloaded from the
<a href="source.php">source page</a>.'))
    ->addParagraph(new Paragraph('If you find any bugs please don\'t hesitate to send me a message through
my <a href="/contact.php">website\'s contact page</a>. And as always, if you enjoy
the use of the app I\'d be happy to hear from you :).'))
    ->addParagraph((new GenTag('p', '- Nicholas Stephen, 2014.'))
        ->addAttr('style', 'text-align:right')));

$htmlOut->write();