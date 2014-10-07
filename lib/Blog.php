<?php
/**
 * Created by PhpStorm.
 * User: Nick Stephen
 * Date: 8/10/14
 * Time: 12:02 AM
 */

require_once 'Output.php';

function getCanonicalBlogLink($id, $title)
{
    return 'http://www.nickstephen.com/blog/' . $id . '-' . rawurlencode($title);
}

class Blog implements Output
{
    public $id;
    public $title;
    public $subtitle;
    public $desc;
    public $created;
    public $updated;
    public $tags;
    public $link;
    protected $content = array();

    public function getPrimaryTag()
    {
        $arr = explode(';', $this->tags);
        return $arr[0];
    }

    public function retrieveContent()
    {
        require(dirname(dirname(__FILE__)) . '/content/blog/Posts/' . $this->link);
    }

    public function write()
    {
        $time = 'Written on ' . date('j M, o', strtotime($this->created));

        echo '<div id="content" class="contain">
    <div id="js-warn" class="noscrpt emph">This website is better with JavaScript enabled! Promise :)</div>
    <div id="blog-time">', $time, '</div>
    <div id="content-title"><header><h1>', $this->title, '</h1>';

        if (!is_null($this->subtitle))
        {
            echo '<h2>', $this->subtitle, '</h2>';
        }

        echo '</header></div><div id="content-body">';

        foreach ($this->content as $cont)
        {
            $cont->write();
        }

        echo '</div></div>';
    }
}

class BlogFeature implements Output
{
    protected $blog;

    public function __construct(Blog $blog)
    {
        $this->blog = $blog;
    }

    public function write()
    {
        echo '<a href="', getCanonicalBlogLink($this->blog->id, $this->blog->title), '">
        <div class="content-feat"><div class="feat-desc"><h6>', $this->blog->title, '</h6><p>', $this->blog->desc,
        '</p></div><div class="feat-r">',
            $this->blog->getPrimaryTag(),
        '</div><div class="clear"></div></div></a>';
    }
}