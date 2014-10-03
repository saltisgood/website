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
$htmlOut->thisPath = './android/snap/help.php';

$htmlOut->content->title = 'Help';
$htmlOut->content->subtitle = 'OpenSnap';