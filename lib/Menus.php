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
        if ($this->hasSubItems)
        {
            if ($this->active)
                echo '<li class="list">';
            else
                echo '<li class="cl-list">';
        }
        else
        {
            if ($this->active)
            {
                echo '<li class="emph">', $this->name, '</li>';
                return;
            }
            else
                echo '<li>';
        }

        if ($this->hasLink)
        {
            echo '<a href="', $this->link, '"';

            if ($this->active)
            {
                echo ' class="active"';
            }

            echo '>';
        }
        echo $this->name;
        if ($this->hasLink)
        {
            echo '</a>';
        }

        if ($this->active && $this->hasSubItems)
        {
            echo '<ul>';
            foreach ($this->subItems as $item)
            {
                $item->write();
            }
            echo '</ul>';
        }

        echo '</li>';
    }
}

// Constants for menu positions
define('SOFT_ANDR', 0);

define('SOFT_ANDR_OAA', 0);
define('SOFT_ANDR_OAA_IND', 0);
define('SOFT_ANDR_OAA_DOWN', 1);
define('SOFT_ANDR_OAA_HLP', 2);
define('SOFT_ANDR_OAA_SRC', 3);

define('SOFT_ANDR_SNAP', 1);
define('SOFT_ANDR_SNAP_IND', 0);
define('SOFT_ANDR_SNAP_DOWN', 1);
define('SOFT_ANDR_SNAP_HLP', 2);
define('SOFT_ANDR_SNAP_SRC', 3);

define('SOFT_XDIN', 1);
define('SOFT_XDIN_IND', 0);
define('SOFT_XDIN_SUPP', 1);
define('SOFT_XDIN_SRC', 2);

class SideMenu
{
    public $relativePath = '';
    public $software;
    public $about;
    public $contact;
    public $blog;

    function __construct($relPath)
    {
        $this->relativePath = $relPath;

        $this->software = new MenuItem();
        $this->software->name = 'Software';
        $this->software->hasSubItems = true;
        $this->software->link = '/software/';
        $this->software->hasLink = true;

        $android = new MenuItem();
        $android->name = 'Android';
        $android->hasSubItems = true;
        $android->link = '/software/android/';
        $android->hasLink = true;

        $subMenu = new MenuItem();
        $subMenu->name = 'Open App Android';
        $subMenu->hasSubItems = true;
        $subMenu->link = '/software/android/oaa/';
        $subMenu->hasLink = true;

        $subSubMenu = new MenuItem();
        $subSubMenu->name = 'About';
        $subSubMenu->link = '/software/android/oaa/index.php';
        $subSubMenu->hasLink = true;
        $subMenu->subItems[SOFT_ANDR_OAA_IND] = $subSubMenu;

        $subSubMenu = new MenuItem();
        $subSubMenu->name = 'Download';
        $subSubMenu->link = '/software/android/oaa/download.php';
        $subSubMenu->hasLink = true;
        $subMenu->subItems[SOFT_ANDR_OAA_DOWN] = $subSubMenu;

        $subSubMenu = new MenuItem();
        $subSubMenu->name = 'Help';
        $subSubMenu->link = '/software/android/oaa/help.php';
        $subSubMenu->hasLink = true;
        $subMenu->subItems[SOFT_ANDR_OAA_HLP] = $subSubMenu;

        $subSubMenu = new MenuItem();
        $subSubMenu->name = 'Source';
        $subSubMenu->link = '/software/android/oaa/source.php';
        $subSubMenu->hasLink = true;
        $subMenu->subItems[SOFT_ANDR_OAA_SRC] = $subSubMenu;

        $android->subItems[SOFT_ANDR_OAA] = $subMenu;

        $subMenu = new MenuItem();
        $subMenu->name = 'OpenSnap';
        $subMenu->hasSubItems = true;
        $subMenu->link = '/software/android/snap/';
        $subMenu->hasLink = true;

        $subSubMenu = new MenuItem();
        $subSubMenu->name = 'About';
        $subSubMenu->link = '/software/android/snap/index.php';
        $subSubMenu->hasLink = true;
        $subMenu->subItems[SOFT_ANDR_SNAP_IND] = $subSubMenu;

        $subSubMenu = new MenuItem();
        $subSubMenu->name = 'Download';
        $subSubMenu->link = '/software/android/snap/download.php';
        $subSubMenu->hasLink = true;
        $subMenu->subItems[SOFT_ANDR_SNAP_DOWN] = $subSubMenu;

        $subSubMenu = new MenuItem();
        $subSubMenu->name = 'Help';
        $subSubMenu->link = '/software/android/snap/help.php';
        $subSubMenu->hasLink = true;
        $subMenu->subItems[SOFT_ANDR_SNAP_HLP] = $subSubMenu;

        $subSubMenu = new MenuItem();
        $subSubMenu->name = 'Source';
        $subSubMenu->link = '/software/android/snap/source.php';
        $subSubMenu->hasLink = true;
        $subMenu->subItems[SOFT_ANDR_SNAP_SRC] = $subSubMenu;

        $android->subItems[SOFT_ANDR_SNAP] = $subMenu;

        $this->software->subItems[SOFT_ANDR] = $android;

        $subMenu = new MenuItem();
        $subMenu->name = 'XD-Input';
        $subMenu->link = '/software/xdinput/index.php';
        $subMenu->hasLink = true;
        $subMenu->hasSubItems = true;

        $subSubMenu = new MenuItem();
        $subSubMenu->name = 'About';
        $subSubMenu->link = '/software/xdinput/index.php';
        $subSubMenu->hasLink = true;
        $subMenu->subItems[SOFT_XDIN_IND] = $subSubMenu;

        $subSubMenu = new MenuItem();
        $subSubMenu->name = 'Support';
        $subSubMenu->link = '/software/xdinput/support.php';
        $subSubMenu->hasLink = true;
        $subMenu->subItems[SOFT_XDIN_SUPP] = $subSubMenu;

        $subSubMenu = new MenuItem();
        $subSubMenu->name = 'Source';
        $subSubMenu->link = '/software/xdinput/source.php';
        $subSubMenu->hasLink = true;
        $subMenu->subItems[SOFT_XDIN_SRC] = $subSubMenu;

        $this->software->subItems[SOFT_XDIN] = $subMenu;

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
        $this->software->write();
        $this->about->write();
        $this->contact->write();
        $this->blog->write();
        echo '</ul>';
    }
}

function writeSideMenu(SideMenu $menu)
{
    if (!$menu->software->active && !$menu->about->active && !$menu->blog->active && !$menu->contact->active)
    {
        return;
    }

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
        $name = $menu->software->active ? $menu->software->name :
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

        if ($menu->software->active)
        {
            $subMenu = $menu->software;
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