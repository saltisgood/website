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

    function write()
    {
        if ($this->hasLink)
        {
            echo "<a class='button' href='$this->link' ";
        }
        else
        {
            echo '<div ';
        }

        if ($this->hasId)
        {
            echo "id='$this->id'";
        }

        echo ">$this->text";

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
    }

    function setAltLink($alt)
    {
        $this->altLink = $alt;
        $this->hasAltLink = true;
    }

    function setAltText($alt)
    {
        $this->altText = $alt;
        $this->hasAltText = true;
    }

    function write()
    {
        if ($this->hasAltLink)
        {
            echo "<a target='_blank' href='$this->altLink' />";
        }

        echo '<img ';

        if ($this->usesIntDimens)
        {
            echo "width='$this->dimX' height='$this->dimY' ";
        }
        else
        {
            echo $this->dimString;
        }

        if ($this->hasAltText)
        {
            echo " alt='$this->altText' title='$this->altText'";
        }
        else
        {
            echo ' alt=""';
        }

        echo " src='$this->imgLink'></img>";

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

class ImageSection
{
    const SHOWCASE = 1;
    const SCREENSHOT = 2;
    const DEFAULT_TYPE = ImageSection::SCREENSHOT;
    const DUB_SCREENSHOT = 4;

    public $type = ImageSection::DEFAULT_TYPE;

    protected $images = array();
    protected $imageCount = 0;

    function addImage(Image $img)
    {
        $this->images[$this->imageCount++] = $img;
    }

    function write()
    {
        $showclass = (($this->type & ImageSection::SHOWCASE) == ImageSection::SHOWCASE) ? 'img-showcase' : '';

        if (($this->type & ImageSection::DUB_SCREENSHOT) == ImageSection::DUB_SCREENSHOT)
        {
            if ($this->imageCount < 2)
            {
                return;
            }

            echo "<div class='dub-screenshot $showclass'>";
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
            if ($this->imageCount < 1)
            {
                return;
            }

            echo "<div class='screenshot $showclass'>";
            $this->images[0]->write();
            echo '</div>';
        }
    }
}