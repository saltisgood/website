<?php
/**
 * Created by PhpStorm.
 * User: Nick Stephen
 * Date: 28/09/14
 * Time: 9:01 PM
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
    $menu->software->subItems[SOFT_ANDR]->subItems[SOFT_ANDR_OAA]->active = true;
    $menu->software->subItems[SOFT_ANDR]->subItems[SOFT_ANDR_OAA]->subItems[SOFT_ANDR_OAA_IND]->active = true;
}

$htmlOut = new HTML();

$htmlOut->relPath = '../.././';
$htmlOut->thisPath = './software/android/oaa/index.php';

$htmlOut->content->title = 'About';
$htmlOut->content->subtitle = 'Open App Android';

$htmlOut->content->addImageSection((new ImageSection(ImageSection::DUB_SCREENSHOT | ImageSection::SHOWCASE))
    ->addImage((new Image('img/app_list_small.gif', 169, 300))
        ->setAltLink('img/app_list_ori.gif')
        ->setCaption('The App List')
        ->setAltText('The App List'))
    ->addImage((new Image('img/res_list_small.gif', 169, 300))
        ->setAltLink('img/res_list_ori.gif')
        ->setCaption('Resource Viewer')
        ->setAltText('Resource Viewer')));

$htmlOut->content->addSection((new Section())
    ->addParagraph(new Paragraph('Open App Android is an Android app created to allow users and particularly other Android
developers to browse the internal structure of their favourite apps and discover how they work. Users can
easily select from any app that you\'ve installed as well as the pre-installed system apps and load any
object (in the Java sense) that\'s used in the app to view their details. This is a process known as
<a href="http://en.wikipedia.org/wiki/Type_introspection">Type Introspection.</a>
In future updates to the app, full reflection capabilities will be added so that any object can be instantiated
and manipulated completely inside the app.'))
    ->addParagraph(new Paragraph('Once inside an object all the details can be seen, including the implemented interfaces, annotations, fields,
inner classes and methods as well as the super class. Clicking on any of these items will move to a new
page that shows a more in-depth view of this item. This page can tell you the modifiers on this object, its
type, and if the object is a constant will even tell you its value.'))
    ->addParagraph(new Paragraph('For certain apps the resources of the app can also be viewed. These are the materials that are used as
icons, images, strings and even constants inside apps. Note: These values are currently being taken from
the R class inside the app\'s package, so any app that engages in some code obfuscation can spoof this
system. Future updates will look to address this limitation.'))
    ->addParagraph(new Paragraph('I hope you enjoy the use of this app and I encourage you to use it in conjunction with the source code
to the app so that you can get an idea of how to interpret it. Please feel free to contact
me with any suggestions, bug reports, criticisms or even just questions on how it all works. I love to
hear from users of my programs!'))
    ->addParagraph((new GenTag('p', '- Nicholas Stephen, 2014.'))
        ->addAttr('style', 'text-align:right')));

$htmlOut->write();