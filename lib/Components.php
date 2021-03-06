<?php
/**
 * Created by PhpStorm.
 * User: Nick Stephen
 * Date: 28/09/14
 * Time: 6:07 PM
 */

class Button
{
    public $text = '';
    public $hasLink = false;
    public $link = '';
    public $id = '';
    public $hasId = false;

    function __construct($text = null, $link = null)
    {
        $this->text = $text;

        if (!is_null($link))
        {
            $this->link = $link;
            $this->hasLink = true;
        }
    }

    function write()
    {
        if ($this->hasLink)
        {
            echo '<a class="button" href="', $this->link, '"';
        }
        else
        {
            echo '<div ';
        }

        if ($this->hasId)
        {
            echo 'id="', $this->id, '"';
        }

        echo '>', $this->text;

        if ($this->hasLink)
        {
            echo '</a>';
        }
        else
        {
            echo '</div>';
        }
    }
}

class Image
{
    protected $caption = '';
    protected $hasCaption = false;

    protected $imgLink = '';

    protected $altLink = '';
    protected $hasAltLink = false;

    protected $altText = '';
    protected $hasAltText = false;

    protected $usesIntDimens = false;
    protected $dimX = 0;
    protected $dimY = 0;
    protected $dimString;

    protected $hasClass = false;
    protected $class = '';

    function __construct($imgLocation, $xSize = 0, $ySize = 0)
    {
        $this->imgLink = $imgLocation;

        if ($xSize != 0 && $ySize != 0)
        {
            $this->dimX = $xSize;
            $this->dimY = $ySize;
            $this->usesIntDimens = true;
        }
        else
        {
            $sizes = getimagesize($imgLocation);
            $this->dimString = $sizes[3];
        }
    }

    function setCaption($cap)
    {
        $this->caption = $cap;
        $this->hasCaption = true;
        return $this;
    }

    function setAltLink($alt)
    {
        $this->altLink = $alt;
        $this->hasAltLink = true;
        return $this;
    }

    function setAltText($alt)
    {
        $this->altText = $alt;
        $this->hasAltText = true;
        return $this;
    }

    function setClass($cls)
    {
        $this->hasClass = true;
        $this->class = $cls;
        return $this;
    }

    function write()
    {
        if ($this->hasAltLink)
        {
            echo '<a target="_blank" href="', $this->altLink, '" >';
        }

        echo '<img ';

        if ($this->hasClass)
        {
            echo 'class="', $this->class, '" ';
        }

        if ($this->usesIntDimens)
        {
            echo 'width="', $this->dimX, '" height="', $this->dimY, '" ';
        }
        else
        {
            echo $this->dimString;
        }

        if ($this->hasAltText)
        {
            echo ' alt="', $this->altText, '" title="', $this->altText, '"';
        }
        else
        {
            echo ' alt=""';
        }

        echo ' src="', $this->imgLink, '" />';

        if ($this->hasCaption)
        {
            echo '<div class="img-caption">', $this->caption, '</div>';
        }

        if ($this->hasAltLink)
        {
            echo '</a>';
        }
    }
}

class ImageSection implements Output
{
    const SHOWCASE = 1;
    const SCREENSHOT = 2;
    const DEFAULT_TYPE = ImageSection::SCREENSHOT;
    const DUB_SCREENSHOT = 4;
    const BLOCK = 8;

    public $type;

    protected $images = array();

    function __construct($type = ImageSection::DEFAULT_TYPE)
    {
        $this->type = $type;
    }

    function addImage(Image $img)
    {
        $this->images[] = $img;
        return $this;
    }

    function write()
    {
        $showclass = (($this->type & ImageSection::SHOWCASE) == ImageSection::SHOWCASE) ? 'img-showcase' : '';

        $imgCount = count($this->images);

        if (($this->type & ImageSection::DUB_SCREENSHOT) == ImageSection::DUB_SCREENSHOT)
        {
            if ($imgCount < 2)
            {
                return;
            }

            echo '<div class="dub-screenshot ', $showclass, '">';
            for ($i = 0; $i < 2; ++$i)
            {
                echo '<div>';
                $this->images[$i]->write();
                echo '</div>';
            }
            echo '</div>';
        }
        else if (($this->type & ImageSection::SCREENSHOT) == ImageSection::SCREENSHOT)
        {
            if ($imgCount < 1)
            {
                return;
            }

            echo '<div class="screenshot ', $showclass, '">';
            $this->images[0]->write();
            echo '</div>';
        }
        else if (($this->type & ImageSection::BLOCK) == ImageSection::BLOCK)
        {
            echo '<div class="img-block">';
            foreach ($this->images as $img)
            {
                $img->write();
            }
            echo '</div>';
        }
    }
}

class CodeBlock implements Output
{
    public $heading;
    protected $lines = array();

    public function __construct($heading = null)
    {
        $this->heading = $heading;
    }

    public function addLine($line)
    {
        $this->lines[] = $line;
        return $this;
    }

    public function write()
    {
        echo '<div class="code-block">';

        if (!is_null($this->heading))
        {
            echo '<p>', $this->heading, '</p>';
        }

        echo '<code><ol>';

        foreach ($this->lines as $l)
        {
            echo '<li>', $l, '</li>';
        }

        echo '</ol></code></div>';
    }
}