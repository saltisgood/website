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

include $rel . 'lib/HTMLOutput.php';

$htmlOut = new HTML();

$htmlOut->relPath = '../.././';
$htmlOut->thisPath = './android/snap/index.php';

$htmlOut->content->title = 'About';
$htmlOut->content->subtitle = 'OpenSnap';

$sec = new ImageSection();
$pic = new Image('img/opensnap_home_small.gif', 169, 300);
$pic->setAltLink('img/opensnap_home.gif');
$pic->setAltText('OpenSnap Homepage');
$pic->setCaption('OpenSnap Homepage');
$sec->addImage($pic);
$sec->type = ImageSection::SCREENSHOT | ImageSection::SHOWCASE;

$htmlOut->content->addImageSection($sec);

$sec = new Section();
$para = new Paragraph();
$para->text = 'OpenSnap is an alternate client for <a href="http://www.snapchat.com/">SnapChat</a> that includes extra
features such as the ability to permanently save snaps, send pictures from your Android library, view
message threads between contacts, view snaps in a privacy mode and more.';
$sec->addParagraph($para);

$para = new Paragraph();
$para->text = 'OpenSnap is developed solely by myself so certain features haven\'t yet been added to it, but will be
in future updates (such as the ability to modify your friends list). Purchasing the premium features
like snap saving allows me to spend more time on the project and maintain it faster.';
$sec->addParagraph($para);

$para = new Paragraph();
$para->text = 'Like my other Android apps OpenSnap is fully open source and the code files can be downloaded from the
<a href="source.php">source page</a>.';
$sec->addParagraph($para);

$para = new Paragraph();
$para->text = 'If you find any bugs please don\'t hesitate to send me a message, either through the
<a href="https://play.google.com/store/apps/details?id=com.nickstephen.opensnap">Play Store listing</a>
, or through my <a href="../../../contact.php">website\'s contact page</a>. And as always, if you enjoy
the use of the app please rate it on the Play Store.';
$sec->addParagraph($para);

$para = new GenTag('p');
$para->addAttr('style','text-align:right');
$para->addStringContents('- Nicholas Stephen, 2013.');
$sec->addParagraph($para);
$htmlOut->content->addSection($sec);

$htmlOut->write();