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