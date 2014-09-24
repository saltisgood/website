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

include $rel . 'lib/HTMLOutput.php';

$htmlOut = new HTML();

$htmlOut->relPath = '../.././';
$htmlOut->thisPath = './android/oaa/download.php';

$htmlOut->content->title = 'Download';
$htmlOut->content->subtitle = 'Open App Android';

$sec = new Section();
$sec->heading = 'Google Play';

$para = new Paragraph();
$para->text = 'The easiest way to download the app is through the
                <a href="https://play.google.com/store/apps/details?id=com.nickstephen.openandroid">
                Play Store.</a> Just click the link to go the page and then click on install.';
$sec->addParagraph($para);

$para = new Paragraph();
$para->text = 'Or you can search for Open App Android through your mobile\'s Play Store application.';
$sec->addParagraph($para);
$htmlOut->content->addSection($sec);

$sec = new Section();
$sec->heading = 'Manual Install';

$para = new Paragraph();
$para->text = 'If you\'re a power user then feel free to go to the <a href="source.php">source page</a>, download the source code and build the
                app yourself. Everything needed is freely available and the instructions are there for you. Once you can
                build the app you just need to take the .apk file and install that on your device.';
$sec->addParagraph($para);
$htmlOut->content->addSection($sec);

$htmlOut->write();