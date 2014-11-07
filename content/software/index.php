<?php
/**
 * Created by PhpStorm.
 * User: Nick Stephen
 * Date: 8/11/14
 * Time: 12:11 AM
 */

if (!isset($rel))
{
    $rel = '../../';
}

require $rel . 'lib/HTMLOutput.php';

function setupMenu($menu)
{
    $menu->software->active = true;
}

$htmlOut = new HTML();

$htmlOut->relPath = '../.././';
$htmlOut->thisPath = './software/index.php';

$htmlOut->content->title = 'Software Projects';

$htmlOut->content->addSection((new Section())
    ->addParagraph((new FeatureContent('Android Apps', 'Information on my apps written for Android.'))
        ->setLink('android/')
        ->setImage((new Image('./android/oaa/img/app_list_small.gif', 169, 300))
            ->setAltText('Open App Android showing a list of apps to explore')))
    ->addParagraph((new FeatureContent('XD-Input', 'A program for converting legacy DirectInput controllers to the modern XInput format.'))
        ->setLink('xdinput/')
        ->setImage((new Image('./xdinput/img/control.png', 200, 112))
            ->setAltText('XBox 360 controller'))));

$htmlOut->write();