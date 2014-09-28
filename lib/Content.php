<?php
/**
 * Created by PhpStorm.
 * User: Nick Stephen
 * Date: 23/09/14
 * Time: 5:48 PM
 */

include_once 'Output.php';
include_once 'Components.php';

class Paragraph implements Output
{
    public $text;

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

    public function __construct($tag)
    {
        $this->tag = $tag;
    }

    public function addAttr($attr, $val)
    {
        $this->attrs[$attr] = $val;
    }

    public function addContents(Output $conts)
    {
        $this->contents = $conts;
    }

    public function addStringContents($conts)
    {
        $this->stringContents = $conts;
    }

    public function write()
    {
        echo "<$this->tag ";
        foreach ($this->attrs as $k=>$val)
        {
            echo "$k=\"$val\"";
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

        echo "</$this->tag>";
    }
}

class Span implements Output
{
    public $class;
    public $text;

    public function write()
    {
        echo "<span class=\"$this->class\">$this->text</span>";
    }
}

class RichParagraph implements Output
{
    protected $text = array();
    protected $textCount = 0;

    public function addText(Text $txt)
    {
        $this->text[$this->textCount++] = $txt;
    }

    public function addSpan(Span $spn)
    {
        $this->text[$this->textCount++] = $spn;
    }

    public function addOutput(Output $out)
    {
        $this->text[$this->textCount++] = $out;
    }

    public function write()
    {
        echo "<p>";
        for ($i = 0; $i < $this->textCount; ++$i)
        {
            $this->text[$i]->write();
        }
        echo "</p>";
    }
}

class Section implements Output
{
    public $heading;

    protected $paras = array();
    protected $paraCount = 0;

    public function addParagraph(Output $par)
    {
        if (!is_null($par))
        {
            $this->paras[$this->paraCount++] = $par;
        }
    }

    public function write()
    {
        if (!is_null($this->heading))
        {
            echo "<h5>$this->heading</h5>";
        }
        for ($i = 0; $i < $this->paraCount; ++$i)
        {
            $this->paras[$i]->write();
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
        echo "<div id='content' class='contain'>
    <div id='js-warn' class='noscrpt emph'>This website is better with JavaScript enabled! Promise :)</div>
    <div id='content-title'><header><h3>$this->title</h3>";

        if (!is_null($this->subtitle))
        {
            echo "<h4 style='margin-left:10%;'>$this->subtitle</h4>";
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

        echo "</div>
</div>";
    }
} 