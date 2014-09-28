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

include $rel . 'lib/HTMLOutput.php';

$htmlOut = new HTML();

$htmlOut->relPath = '../.././';
$htmlOut->thisPath = './android/oaa/index.php';

$htmlOut->content->title = 'About';
$htmlOut->content->subtitle = 'Open App Android';

$sec = new ImageSection();
$pic = new Image('img/app_list_small.gif', 169, 300);
$pic->setAltLink('img/app_list_ori.gif');
$pic->setCaption('The App List');
$pic->setAltText('The App List');
$sec->addImage($pic);

$pic = new Image('img/res_list_small.gif', 169, 300);
$pic->setAltLink('img/res_list_ori.gif');
$pic->setCaption('Resource Viewer');
$pic->setAltText('Resource Viewer');
$sec->addImage($pic);

$sec->type = ImageSection::DUB_SCREENSHOT | ImageSection::SHOWCASE;

$htmlOut->content->addImageSection($sec);

$sec = new Section();
$para = new Paragraph();
$para->text = 'Open App Android is an Android app created to allow users and particularly other Android
                developers to browse the internal structure of their favourite apps and discover how they work. Users can
                easily select from any app that you\'ve installed as well as the pre-installed system apps and load any
                object (in the Java sense) that\'s used in the app to view their details. This is a process known as
                <a href="http://en.wikipedia.org/wiki/Type_introspection">Type Introspection.</a>
                In future updates to the app, full reflection capabilities will be added so that any object can be instantiated
                and manipulated completely inside the app.';
$sec->addParagraph($para);

$para = new Paragraph();
$para->text = 'Once inside an object all the details can be seen, including the implemented interfaces, annotations, fields,
                inner classes and methods as well as the super class. Clicking on any of these items will move to a new
                page that shows a more in-depth view of this item. This page can tell you the modifiers on this object, its
                type, and if the object is a constant will even tell you its value.';
$sec->addParagraph($para);

$para = new Paragraph();
$para->text = 'For certain apps the resources of the app can also be viewed. These are the materials that are used as
                icons, images, strings and even constants inside apps. Note: These values are currently being taken from
                the R class inside the app\'s package, so any app that engages in some code obfuscation can spoof this
                system. Future updates will look to address this limitation.';
$sec->addParagraph($para);

$para = new Paragraph();
$para->text = 'I hope you enjoy the use of this app and I encourage you to use it in conjunction with the source code
                to the app so that you can get an idea of how to interpret it. Please feel free to contact
                me with any suggestions, bug reports, criticisms or even just questions on how it all works. I love to
                hear from users of my programs!';
$sec->addParagraph($para);

$para = new GenTag('p');
$para->addAttr('style','text-align:right');
$para->addStringContents('- Nicholas Stephen, 2013.');
unset($subPara);

$sec->addParagraph($para);
$htmlOut->content->addSection($sec);

$htmlOut->write();