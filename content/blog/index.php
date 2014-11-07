<?php
/**
 * Created by PhpStorm.
 * User: Nick Stephen
 * Date: 7/10/14
 * Time: 9:47 PM
 */

if (!isset($rel))
{
    $rel = '../../';
}

require $rel . 'lib/HTMLOutput.php';
require $rel . 'lib/DBStuff.php';

function setupMenu(SideMenu $menu)
{
    $menu->blog->active = true;
}

$blogs = retrieveLatestPosts(5);

$html = new HTML();

$html->relPath = '.././';
$html->thisPath = './blog/index.php';

$html->content->title = 'Blogs';

if ($blogs === false)
{
    $html->content->addSection(new Section('Uh-Oh!',
        new Paragraph('Something went wrong retrieving the latest blogs!')));

    $html->write();
}
else
{
    $sec = new Section('Latest');

    foreach ($blogs as $blog)
    {
        $sec->addParagraph(new BlogFeature($blog));
    }

    $html->content->addSection($sec);

    $html->write();
}