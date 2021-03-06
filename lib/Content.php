<?php
/**
 * Created by PhpStorm.
 * User: Nick Stephen
 * Date: 23/09/14
 * Time: 5:48 PM
 */

include_once 'Output.php';
include_once 'Components.php';
include_once 'Forms.php';

class Paragraph implements Output
{
    public $text;

    public function __construct($text = null)
    {
        $this->text = $text;
    }

    public function write()
    {
        echo '<p>';
        if (!is_null($this->text))
        {
            echo $this->text;
        }
        echo '</p>';
    }
}

class Text implements Output
{
    public $text;

    public function __construct($text = null)
    {
        $this->text = $text;
    }

    public function write()
    {
        echo $this->text;
    }
}

class GenTag implements Output
{
    protected $tag;
    protected $attrs = array();
    protected $contents;
    protected $stringContents;

    public function __construct($tag, $strContents = null)
    {
        $this->tag = $tag;
        $this->stringContents = $strContents;
    }

    public function addAttr($attr, $val)
    {
        $this->attrs[$attr] = $val;
        return $this;
    }

    public function addContents(Output $conts)
    {
        $this->contents = $conts;
        return $this;
    }

    public function addStringContents($conts)
    {
        $this->stringContents = $conts;
        return $this;
    }

    public function write()
    {
        echo '<', $this->tag, ' ';
        foreach ($this->attrs as $k=>$val)
        {
            echo $k, '="', $val, '"';
        }
        echo '>';

        if (!is_null($this->contents))
        {
            $this->contents->write();
        }
        else if (!is_null($this->stringContents))
        {
            echo $this->stringContents;
        }

        echo '</', $this->tag, '>';
    }
}

class Span implements Output
{
    public $class;
    public $text;

    public function __construct($class = null, $text = null)
    {
        $this->class = $class;
        $this->text = $text;
    }

    public function write()
    {
        echo '<span class="', $this->class, '">', $this->text, '</span>';
    }
}

class FeatureContent implements Output
{
    public $title;
    public $desc;
    public $img;
    public $link;

    public function __construct($title = null, $desc = null)
    {
        $this->title = $title;
        $this->desc = $desc;
    }

    public function setImage(Image $img)
    {
        $this->img = $img;
        return $this;
    }

    public function setLink($link)
    {
        $this->link = $link;
        return $this;
    }

    public function write()
    {
        $this->img->setClass('plain');

        echo '<a href="', $this->link, '"><div class="content-feat"><div class="feat-desc"><h6>',
            $this->title, '</h6><p>', $this->desc, '</p>
            </div>';
        $this->img->write();
        echo '<div class="clear"></div></div></a>';
    }
}

class RichParagraph implements Output
{
    protected $text = array();
    protected $textCount = 0;

    public function addText(Text $txt)
    {
        $this->text[$this->textCount++] = $txt;
        return $this;
    }

    public function addSpan(Span $spn)
    {
        $this->text[$this->textCount++] = $spn;
        return $this;
    }

    public function addOutput(Output $out)
    {
        $this->text[$this->textCount++] = $out;
        return $this;
    }

    public function write()
    {
        echo '<p>';
        for ($i = 0; $i < $this->textCount; ++$i)
        {
            $this->text[$i]->write();
        }
        echo '</p>';
    }
}

class SubSection implements Output
{
    public $heading;

    protected $paras = array();

    public function __construct($head = null, $para = null)
    {
        $this->heading = $head;
        if (!is_null($para))
        {
            $this->paras[] = $para;
        }
    }

    public function addLine($par)
    {
        $this->paras[] = $par;
        return $this;
    }

    public function write()
    {
        if (!is_null($this->heading))
        {
            echo '<h6>', $this->heading, '</h6>';
        }

        foreach ($this->paras as $p)
        {
            echo '<p>', $p, '</p>';
        }
    }
}

class ListHTML implements Output
{
    protected $heading;
    public $isOrdered = false;
    protected $items = array();

    public function __construct($heading = null)
    {
        $this->heading = $heading;
    }

    public function addItem($item)
    {
        $this->items[] = $item;
        return $this;
    }

    public function setOrdered($isOrdered)
    {
        $this->isOrdered = $isOrdered;
        return $this;
    }

    public function write()
    {
        if (!is_null($this->heading))
        {
            echo '<h6>', $this->heading, '</h6>';
        }

        echo ($this->isOrdered) ? '<ol>' : '<ul>';

        foreach ($this->items as $item)
        {
            echo '<li>', $item, '</li>';
        }

        echo ($this->isOrdered) ? '</ol>' : '</ul>';
    }
}

class Section implements Output
{
    public $heading;

    protected $paras = array();

    public function __construct($heading = null, Output $par = null)
    {
        $this->heading = $heading;

        if (!is_null($par))
        {
            $this->paras[] = $par;
        }
    }

    public function addParagraph(Output $par)
    {
        if (!is_null($par))
        {
            $this->paras[] = $par;
        }

        return $this;
    }

    public function write()
    {
        if (!is_null($this->heading))
        {
            echo '<h5>', $this->heading, '</h5>';
        }

        foreach ($this->paras as $para)
        {
            $para->write();
        }
    }
}

class Content implements Output
{
    public $title = 'TITLE UNSET';
    public $subtitle;

    public $isMenu = false;

    protected $sections = array();
    protected $secCount = 0;

    public function addSection(Section $sec)
    {
        $this->sections[$this->secCount] = $sec;
        ++$this->secCount;
    }

    public function addButton(Button $but)
    {
        $this->sections[$this->secCount] = $but;
        ++$this->secCount;
    }

    public function addImageSection(ImageSection $img)
    {
        $this->sections[$this->secCount] = $img;
        ++$this->secCount;
    }

    public function write()
    {
        echo '<div id="content" class="contain">
    <div id="js-warn" class="noscrpt emph">This website is better with JavaScript enabled! Promise :)</div>
    <div id="content-title"><header><h1>', $this->title, '</h1>';

        if (!is_null($this->subtitle))
        {
            echo '<h2>', $this->subtitle, '</h2>';
        }

        echo '</header></div><div id="content-body" ';

        if ($this->isMenu)
        {
            echo 'class="menu-page"';
        }

        echo '>';

        for ($i = 0; $i < $this->secCount; ++$i)
        {
            $this->sections[$i]->write();
        }

        echo '</div>
</div>';
    }
} 