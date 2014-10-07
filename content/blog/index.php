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

$blogs = retrieveLatestPosts(5);

$html = new HTML();

$html->relPath = '.././';
$html->thisPath = './blog/index.php';

$html->content->title = 'Blogs';

if ($blogs === false)
{
    $sec = new Section();
    $sec->heading = 'Uh-Oh!';

    $para = new Paragraph();
    $para->text = 'Something went wrong retrieving the latest blogs!';

    $sec->addParagraph($para);
    $html->content->addSection($sec);

    $html->write();
}
else
{
    $sec = new Section();
    $sec->heading = 'Latest';

    foreach ($blogs as $blog)
    {
        $sec->addParagraph(new BlogFeature($blog));
    }

    $html->content->addSection($sec);

    $html->write();
}