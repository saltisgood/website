<?php
/**
 * Created by PhpStorm.
 * User: Nick Stephen
 * Date: 27/09/14
 * Time: 6:15 PM
 */ 

function writeHeader($backUp = true, $backToDir = true)
{
    echo '<div id="header">
	<div class="contain">
		<h3 class="fleft"><a href="/">NickStephen<span id="title-low-emph">.com</span></a></h3>';

    if ($backUp)
    {
        echo '<h3 class="fright"><a href="../">Up</a></h3>';
    }
    else if ($backToDir)
    {
        echo '<h3 class="fright"><a href="./">Up</a></h3>';
    }

	echo '</div>
	<div class="scrpt hov un-emph" id="head-hider">Hide</div>
</div>
<div class="scrpt hov hide un-emph" id="head-shower">Show</div>';
}

class MenuItem
{
    public $name = '';
    public $link = '';
    public $hasLink = false;
    public $subItems = array();
    public $hasSubItems = false;
    public $active = false;

    function write()
    {
        if (!$this->hasSubItems && $this->active)
        {
            echo '<li class="emph">', $this->name, '</li>';
            return;
        }

        echo '<li>';
        if ($this->hasSubItems)
        {
            $id = 'nav-';
            $id .= str_replace(' ', '-', $this->name);

            echo '<input class="nav-check nos-check" id="', $id, '" value="', $id, '" type="checkbox" ';

            if ($this->active)
            {
                echo 'checked="true"';
            }

            echo '/><label for="', $id, '" class="nav-label">', $this->name, '</label>
            <ul>';

            foreach ($this->subItems as $item)
            {
                $item->write();
            }

            echo '</ul>';
        }
        else if ($this->hasLink)
        {
            echo '<a href="', $this->link, '">', $this->name, '</a>';
        }

        echo '</li>';
    }
}

class SideMenu
{
    public $relativePath = '';
    public $android;
    public $about;
    public $contact;
    public $blog;

    function __construct($relPath)
    {
        $this->relativePath = $relPath;

        $this->android = new MenuItem();
        $this->android->name = 'Android';
        $this->android->hasSubItems = true;

        $subMenu = new MenuItem();
        $subMenu->name = 'Open App Android';
        $subMenu->hasSubItems = true;

        $subSubMenu = new MenuItem();
        $subSubMenu->name = 'About';
        $subSubMenu->link = '/android/oaa/index.php';
        $subSubMenu->hasLink = true;
        $subMenu->subItems[0] = $subSubMenu;

        $subSubMenu = new MenuItem();
        $subSubMenu->name = 'Download';
        $subSubMenu->link = '/android/oaa/download.php';
        $subSubMenu->hasLink = true;
        $subMenu->subItems[1] = $subSubMenu;

        $subSubMenu = new MenuItem();
        $subSubMenu->name = 'Help';
        $subSubMenu->link = '/android/oaa/help.php';
        $subSubMenu->hasLink = true;
        $subMenu->subItems[2] = $subSubMenu;

        $subSubMenu = new MenuItem();
        $subSubMenu->name = 'Source';
        $subSubMenu->link = '/android/oaa/source.php';
        $subSubMenu->hasLink = true;
        $subMenu->subItems[3] = $subSubMenu;

        $this->android->subItems[0] = $subMenu;

        $subMenu = new MenuItem();
        $subMenu->name = 'OpenSnap';
        $subMenu->hasSubItems = true;

        $subSubMenu = new MenuItem();
        $subSubMenu->name = 'About';
        $subSubMenu->link = '/android/snap/index.php';
        $subSubMenu->hasLink = true;
        $subMenu->subItems[0] = $subSubMenu;

        $subSubMenu = new MenuItem();
        $subSubMenu->name = 'Download';
        $subSubMenu->link = '/android/snap/download.php';
        $subSubMenu->hasLink = true;
        $subMenu->subItems[1] = $subSubMenu;

        $subSubMenu = new MenuItem();
        $subSubMenu->name = 'Help';
        $subSubMenu->link = '/android/snap/help.php';
        $subSubMenu->hasLink = true;
        $subMenu->subItems[2] = $subSubMenu;

        $subSubMenu = new MenuItem();
        $subSubMenu->name = 'Source';
        $subSubMenu->link = '/android/snap/source.php';
        $subSubMenu->hasLink = true;
        $subMenu->subItems[3] = $subSubMenu;

        $this->android->subItems[1] = $subMenu;

        $this->about = new MenuItem();
        $this->about->name = 'About Me';
        $this->about->link = '/about.php';
        $this->about->hasLink = true;

        $this->contact = new MenuItem();
        $this->contact->name = 'Contact Me';
        $this->contact->link = '/contact.php';
        $this->contact->hasLink = true;

        $this->blog = new MenuItem();
        $this->blog->name = 'Blogs';
        $this->blog->link = '/blog/index.php';
        $this->blog->hasLink = true;
    }

    function write()
    {
        echo '<ul>';
        $this->android->write();
        $this->about->write();
        $this->contact->write();
        $this->blog->write();
        echo '</ul>';
    }
}

function writeSideMenu(SideMenu $menu)
{
    echo '<nav><div id="side-menu">
    <div class="hov un-emph scrpt" id="side-menu-close">Close Nav</div>
    <div id="side-menu-main">';

    $menu->write();

    echo '</div></div></nav><div class="scrpt hov hide un-emph" id="side-menu-open">Show Nav</div>';
}

function writeFooter(SideMenu $menu, $title = '')
{
    echo '
<div id="footer"><footer>
	<div id="foot-hier">';

    if (strcmp($menu->relativePath, './') === 0)
    {
        $name = $menu->android->active ? $menu->android->name :
            ($menu->about->active ? $menu->about->name : ($menu->contact->active ? $menu->contact->name : false));

        if ($name !== false)
        {
            echo '<a class="navi" href="/">Home</a> &gt; ', $name;
        }
    }
    else
    {
        $rel = $menu->relativePath;

        echo '<a class="navi" href="/">Home</a> &gt; ';

        $rel = substr($rel, 3);

        if ($menu->android->active)
        {
            $subMenu = $menu->android;
        } else if ($menu->about->active)
        {
            $subMenu = $menu->about;
        } else if ($menu->contact->active)
        {
            $subMenu = $menu->contact;
        } else
        {
            echo '<a class="navi" href="./">Blogs</a> &gt; ', $title;
            goto finish;
        }

        while ($rel !== false)
        {
            echo '<a class="navi" href="', $rel, '">', $subMenu->name, '</a> &gt; ';

            $rel = substr($rel, 3);
            foreach ($subMenu->subItems as $m)
            {
                if ($m->active)
                {
                    $subMenu = $m;
                    break;
                }
            }
        }

        echo $subMenu->name;
    }

finish:
    echo '</div>
	<div class="contain">Nicholas Stephen - 2014</div>
	<div class="scrpt hov un-emph" id="foot-hide">Hide</div>
</footer></div>
<div class="scrpt hov hide un-emph" id="foot-show">Show</div>';
}