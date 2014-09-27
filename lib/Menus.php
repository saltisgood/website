<?php
/**
 * Created by PhpStorm.
 * User: Nick Stephen
 * Date: 27/09/14
 * Time: 6:15 PM
 */ 

function writeHeader($depth, $isTop)
{
    $pathTop = '';
    for ($i = 0; $i < $depth; ++$i)
    {
        $pathTop .= '../';
    }

    echo "<div id='header'><header>
	<div class='contain'>
		<h1 class='fleft'><a href='$pathTop'>NickStephen<span id='title-low-emph'>.com</span></a></h1>";

    if ($depth != 0)
    {
        echo '<h1 class="fright"><a href="../">Up</a></h1>';
    }
    else if (!$isTop)
    {
        echo '<h1 class="fright"><a href="./">Up</a></h1>';
    }

	echo "</div>
	<div class='scrpt hov un-emph' id='head-hider' style='position:absolute'>Hide</div>
</header></div>
<div class='scrpt hov hide un-emph' id='head-shower' style='position:fixed'>Show</div>";
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
            echo "<li class='emph'>$this->name</li>";
            return;
        }

        echo '<li>';
        if ($this->hasSubItems)
        {
            $id = 'nav-';
            $id .= str_replace(' ', '-', $this->name);

            echo "<input class='nav-check nos-check' id='$id' value='$id' type='checkbox' ";

            if ($this->active)
            {
                echo 'checked="true"';
            }

            echo "/><label for='$id' class='nav-label'>$this->name</label>";

            echo '<ul>';

            foreach ($this->subItems as $item)
            {
                $item->write();
            }

            echo '</ul>';
        }
        else if ($this->hasLink)
        {
            echo "<a href='$this->link'>$this->name</a>";
        }

        echo '</li>';
    }
}

class SideMenu
{
    public $relativePath = '';
    public $android;
    public $webDev;
    public $about;
    public $contact;

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
        $subSubMenu->link = $relPath . 'android/oaa/about.php';
        $subSubMenu->hasLink = true;
        $subMenu->subItems[0] = $subSubMenu;

        $subSubMenu = new MenuItem();
        $subSubMenu->name = 'Download';
        $subSubMenu->link = $relPath . 'android/oaa/download.php';
        $subSubMenu->hasLink = true;
        $subMenu->subItems[1] = $subSubMenu;

        $subSubMenu = new MenuItem();
        $subSubMenu->name = 'Help';
        $subSubMenu->link = $relPath . 'android/oaa/help.php';
        $subSubMenu->hasLink = true;
        $subMenu->subItems[2] = $subSubMenu;

        $subSubMenu = new MenuItem();
        $subSubMenu->name = 'Source';
        $subSubMenu->link = $relPath . 'android/oaa/source.php';
        $subSubMenu->hasLink = true;
        $subMenu->subItems[3] = $subSubMenu;

        $this->android->subItems[0] = $subMenu;

        $subMenu = new MenuItem();
        $subMenu->name = 'OpenSnap';
        $subMenu->hasSubItems = true;

        $subSubMenu = new MenuItem();
        $subSubMenu->name = 'About';
        $subSubMenu->link = $relPath . 'android/snap/about.php';
        $subSubMenu->hasLink = true;
        $subMenu->subItems[0] = $subSubMenu;

        $subSubMenu = new MenuItem();
        $subSubMenu->name = 'Download';
        $subSubMenu->link = $relPath . 'android/snap/download.php';
        $subSubMenu->hasLink = true;
        $subMenu->subItems[1] = $subSubMenu;

        $subSubMenu = new MenuItem();
        $subSubMenu->name = 'Help';
        $subSubMenu->link = $relPath . 'android/snap/help.php';
        $subSubMenu->hasLink = true;
        $subMenu->subItems[2] = $subSubMenu;

        $subSubMenu = new MenuItem();
        $subSubMenu->name = 'Source';
        $subSubMenu->link = $relPath . 'android/snap/source.php';
        $subSubMenu->hasLink = true;
        $subMenu->subItems[3] = $subSubMenu;

        $this->android->subItems[1] = $subMenu;

        $this->webDev = new MenuItem();
        $this->webDev->name = 'Web Development';
        $this->webDev->link = $relPath . 'webdev.php';
        $this->webDev->hasLink = true;

        $this->about = new MenuItem();
        $this->about->name = 'About Me';
        $this->about->link = $relPath . 'about.php';
        $this->about->hasLink = true;

        $this->contact = new MenuItem();
        $this->contact->name = 'Contact Me';
        $this->contact->link = $relPath . 'contact.php';
        $this->contact->hasLink = true;
    }

    function write()
    {
        echo '<ul>';
        $this->android->write();
        $this->webDev->write();
        $this->about->write();
        $this->contact->write();
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

function writeFooter(SideMenu $menu)
{
    echo '
<div id="footer"><footer>
	<div id="foot-hier">';

    if (strcmp($menu->relativePath, './') === 0)
    {
        $name = $menu->android->active ? $menu->android->name : ($menu->webDev->active ? $menu->webDev->name :
            ($menu->about->active ? $menu->about->name : ($menu->contact->active ? $menu->contact->name : false)));

        if ($name !== false)
        {
            echo "<a class='navi' href='./'>Home</a> &gt; $name";
        }
    }
    else
    {
        $rel = $menu->relativePath;

        echo "<a class='navi' href='$rel'>Home</a> &gt; ";

        $rel = substr($rel, 3);

        if ($menu->android->active)
        {
            $subMenu = $menu->android;
        } else if ($menu->webDev->active)
        {
            $subMenu = $menu->webDev;
        } else if ($menu->about->active)
        {
            $subMenu = $menu->about;
        } else
        {
            $subMenu = $menu->contact;
        }

        while ($rel !== false)
        {
            echo "<a class='navi' href='$rel'>$subMenu->name</a> &gt; ";

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

    echo '</div>
	<div class="contain">Nicholas Stephen - 2014</div>
	<div class="scrpt hov un-emph" id="foot-hide" style="padding:0 20px;">Hide</div>
</footer></div>
<div class="scrpt hov hide un-emph" id="foot-show">Show</div>';
}