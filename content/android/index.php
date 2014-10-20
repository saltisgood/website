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

$htmlOut->content->addSection((new Section('My Apps'))
    ->addParagraph((new FeatureContent('Open App Android', 'An app for exploring other apps with the technique of Java type introspection.'))
        ->setLink('oaa/')
        ->setImage((new Image('oaa/img/app_list_small.gif', 169, 300))
            ->setAltText('OAA showing a list of apps to explore')))
    ->addParagraph((new FeatureContent('OpenSnap', 'A custom front-end for the popular SnapChat app.'))
        ->setLink('snap/')
        ->setImage((new Image('snap/img/opensnap_home_small.gif', 169, 300))
            ->setAltText('OpenSnap\'s home screen'))));

$htmlOut->write();