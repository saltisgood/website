<?php
/**
 * Created by PhpStorm.
 * User: Nick Stephen
 * Date: 23/09/14
 * Time: 2:34 PM
 */

include_once 'Content.php';

class HTML implements Output
{
    const TITLE_SUF = ' - NickStephen.com';

    public $content;
    public $relPath = '';

    function __construct()
    {
        $this->content = new Content();
    }

    public function write()
    {
        $this->writeHeader();
        $this->writeBody();
    }

    public function writeHeader()
    {
        echo "<!DOCTYPE html><head>
            <meta charset='UTF-8' />
            <title>", $this->content->title, HTML::TITLE_SUF, "</title>
            <meta name='viewport' content='width=device-width, initial-scale=1.0' />
            <link rel='stylesheet' type='text/css' href='$this->relPath/styles.css' />
        </head>";
    }

    public function writeBody()
    {
        echo "<body>
        <div id='content'>
            <div class='content-title'>
                <h3 class='content-title-text'>", $this->content->title, "</h3>
            </div>
            <div class='content-body'>";

       $this->content->write();

        echo "    </div>
        </div>
        </body>";
    }
}