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
    global $blog;

    $menu->blog->active = true;

    $item = new MenuItem();
    $item->active = true;

    if (!$blog)
    {
        $item->name = 'Ain\'t a post!';
    }
    else
    {
        $item->name = $blog->title;
    }

    $menu->blog->subItems[] = $item;
    $menu->blog->hasSubItems = true;
}

$html = new HTML();

$html->relPath = '.././';

$id = $_GET['id'];

$html->thisPath = "./blog/entry.php?id=$id";

if (empty($id))
{
    $html->thisPath = './blog/entry.php';
}

$blog = retrieveBlogPost($id);

if (!$blog)
{
    $html->content->title = 'Nope!';

    $html->content->addSection(new Section(null, new Paragraph('Sorry, but I can\'t seem to find that one!')));
}
else
{
    $html->canonicalLink = getCanonicalBlogLink($blog->id, $blog->title);
    $blog->retrieveContent();

    $html->content = $blog;
}

$html->write();
