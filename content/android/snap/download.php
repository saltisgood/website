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

include $rel . 'lib/HTMLOutput.php';

$htmlOut = new HTML();

$htmlOut->relPath = '../.././';
$htmlOut->thisPath = './android/snap/download.php';

$htmlOut->content->title = 'Download';
$htmlOut->content->subtitle = 'OpenSnap';

$sec = new Section();
$sec->heading = 'Manual Install';

$para = new Paragraph();
$para->text = 'If you\'re a power user then feel free to go to the <a href="source.php">source page</a>, download the source code and build the
                app yourself. Everything needed is freely available and the instructions are there for you. Once you can
                build the app you just need to take the .apk file and install that on your device.';
$sec->addParagraph($para);

$htmlOut->content->addSection($sec);

$htmlOut->write();