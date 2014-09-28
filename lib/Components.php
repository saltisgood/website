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