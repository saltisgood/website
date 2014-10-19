<?php
/**
 * Created by PhpStorm.
 * User: Nick Stephen
 * Date: 23/09/14
 * Time: 2:34 PM
 */

include_once 'Content.php';
include_once 'Menus.php';

function strStartsWith($haystack, $needle)
{
    $length = strlen($needle);
    return (substr($haystack, 0, $length) === $needle);
}

function strEndsWith($haystack, $needle)
{
    $length = strlen($needle);
    if ($length == 0) {
        return true;
    }

    return (substr($haystack, -$length) === $needle);
}

class HTML implements Output
{
    const TITLE_SUF = ' - NickStephen.com';

    public $content;
    public $relPath = './';
    public $thisPath = '';
    public $canonicalLink;

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
        echo '<!DOCTYPE html><head>
            <meta charset="UTF-8" />
            <title>', $this->content->title;

        if (!is_null($this->content->subtitle))
        {
            echo ' &middot; ', $this->content->subtitle;
        }

        echo HTML::TITLE_SUF, '</title>
            <meta name="viewport" content="width=device-width, initial-scale=1.0" />';

        if (!is_null($this->canonicalLink))
        {
            echo '<link rel="canonical" href="', $this->canonicalLink, '" />';
        }

        echo '
            <link href="http://fonts.googleapis.com/css?family=Roboto:400,400italic,700,500" rel="stylesheet" type="text/css">
            <link rel="stylesheet" type="text/css" href="/styles.css" />
            <style> @media (min-width: 601px) { html { background: url(\'/img/back', rand(1,5), '.jpg\') no-repeat center center fixed; background-size: cover; } }</style>
            <noscript><style> .scrpt { display: none; }  .noscrpt { display: inline; } </style></noscript>',
            "<script>
   (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-46464874-1', 'auto');
  ga('send', 'pageview');

    </script>
</head>";
    }

    public function writeBody()
    {
        echo '<body>';

        $this->content->write();

        // Now the main dessert is finished, add the toppings.

        if (strcmp($this->thisPath, './') == 0)
        {
            writeHeader(false, false);
        }
        else
        {
            writeHeader(strEndsWith($this->thisPath, 'index.php'));
        }

        $sideMenu = new SideMenu($this->relPath);

        $path = explode('/', $this->thisPath);
        $count = count($path);
        if ($count >= 2 && strcmp($path[1], 'android') === 0)
        {
            $sideMenu->android->active = true;

            if ($count >= 3 && strcmp($path[2], 'oaa') === 0)
            {
                $sideMenu->android->subItems[0]->active = true;

                if ($count >= 4)
                {
                    if (strcmp($path[3], 'index.php') === 0)
                    {
                        $sideMenu->android->subItems[0]->subItems[0]->active = true;
                    } else if (strcmp($path[3], 'download.php') === 0)
                    {
                        $sideMenu->android->subItems[0]->subItems[1]->active = true;
                    } else if (strcmp($path[3], 'help.php') === 0)
                    {
                        $sideMenu->android->subItems[0]->subItems[2]->active = true;
                    } else if (strcmp($path[3], 'source.php') === 0)
                    {
                        $sideMenu->android->subItems[0]->subItems[3]->active = true;
                    }
                }
            }
            else if ($count >= 3 && strcmp($path[2], 'snap') === 0)
            {
                $sideMenu->android->subItems[1]->active = true;

                if ($count >= 4)
                {
                    if (strcmp($path[3], 'index.php') === 0)
                    {
                        $sideMenu->android->subItems[1]->subItems[0]->active = true;
                    } else if (strcmp($path[3], 'download.php') === 0)
                    {
                        $sideMenu->android->subItems[1]->subItems[1]->active = true;
                    } else if (strcmp($path[3], 'help.php') === 0)
                    {
                        $sideMenu->android->subItems[1]->subItems[2]->active = true;
                    } else if (strcmp($path[3], 'source.php') === 0)
                    {
                        $sideMenu->android->subItems[1]->subItems[3]->active = true;
                    }
                }
            }
        }
        else if ($count == 2 && strcmp($path[1], 'contact.php') === 0)
        {
            $sideMenu->contact->active = true;
        }
        else if ($count == 3 && strcmp($path[1], 'blog') === 0 && strcmp($path[2], 'index.php') === 0)
        {
            $sideMenu->blog->active = true;
        }

        writeSideMenu($sideMenu);

        writeFooter($sideMenu, $this->content->title);

        echo '<div id="bg"></div><script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" defer></script>
    <script type="text/javascript" src="/scripts.js" defer></script></body>';
    }
}