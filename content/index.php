<?php
/**
 * Created by PhpStorm.
 * User: Nick Stephen
 * Date: 28/09/14
 * Time: 6:25 PM
 */

if (!isset($rel))
{
    $rel = '../';
}

require $rel . 'lib/HTMLOutput.php';

$htmlOut = new HTML();

$htmlOut->relPath = './';
$htmlOut->thisPath = './';

$htmlOut->content->title = 'Welcome!';
$htmlOut->content->isMenu = true;

$htmlOut->content->addButton(new Button('Software Projects', '/software/'));

$htmlOut->content->addButton(new Button('About Me', 'about.php'));

$htmlOut->content->addButton(new Button('Contact Me', 'contact.php'));

$htmlOut->content->addButton(new Button('Blogs', '/blog/'));

$htmlOut->write();