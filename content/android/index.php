<?php
/**
 * Created by PhpStorm.
 * User: Nick Stephen
 * Date: 6/10/14
 * Time: 3:58 PM
 */

if (!isset($rel))
{
    $rel = '../../';
}

include $rel . 'lib/HTMLOutput.php';

$htmlOut = new HTML();

$htmlOut->relPath = '.././';
$htmlOut->thisPath = './android/index.php';

$htmlOut->content->title = 'Android';

$sec = new Section();
$sec->heading = 'My Apps';

$feat = new FeatureContent();
$feat->title = 'Open App Android';
$feat->desc = 'An app for exploring other apps with the technique of Java type introspection.';
$feat->link = 'oaa/';

$img = new Image('oaa/img/app_list_small.gif', 169, 300);
$img->setAltText('OAA showing a list of apps to explore');

$feat->img = $img;

$sec->addParagraph($feat);

$feat = new FeatureContent();
$feat->title = 'OpenSnap';
$feat->desc = 'A custom front-end for the popular SnapChat app.';
$feat->link = 'snap/';

$img = new Image('snap/img/opensnap_home_small.gif', 169, 300);
$img->setAltText('OpenSnap\'s home screen');

$feat->img = $img;

$sec->addParagraph($feat);

$htmlOut->content->addSection($sec);

$htmlOut->write();