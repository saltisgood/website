<?php
/**
 * Created by PhpStorm.
 * User: Nick Stephen
 * Date: 28/09/14
 * Time: 6:25 PM
 */

include '../../lib/HTMLOutput.php';

$htmlOut = new HTML();

$htmlOut->relPath = './';
$htmlOut->thisPath = './';

$htmlOut->content->title = 'Welcome!';
$htmlOut->content->isMenu = true;

$butt = new Button();
$butt->text = 'Android';
$butt->link = '/android/';
$butt->hasLink = true;
$htmlOut->content->addButton($butt);

$butt = new Button();
$butt->text = 'Web Development';
$butt->link = './webdev.php';
$butt->hasLink = true;
$htmlOut->content->addButton($butt);

$butt = new Button();
$butt->text = 'About Me';
$butt->link = './about.php';
$butt->hasLink = true;
$htmlOut->content->addButton($butt);

$butt = new Button();
$butt->text = 'Contact Me';
$butt->link = './contact.php';
$butt->hasLink = true;
$htmlOut->content->addButton($butt);

$htmlOut->write();