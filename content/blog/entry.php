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

    $para = new Paragraph();
    $para->text = 'Sorry, but I can\'t seem to find that one!';

    $sec = new Section();
    $sec->addParagraph($para);

    $html->content->addSection($sec);
}
else
{
    $html->canonicalLink = getCanonicalBlogLink($blog->id, $blog->title);
    $blog->retrieveContent();

    $html->content = $blog;
}

$html->write();
