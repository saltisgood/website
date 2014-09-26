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
            <title>", $this->content->title;

        if (!is_null($this->content->subtitle))
        {
            echo " &middot; ", $this->content->subtitle;
        }

        echo HTML::TITLE_SUF, "</title>
            <meta name='viewport' content='width=device-width, initial-scale=1.0' />
            <link href='http://fonts.googleapis.com/css?family=Roboto:400,400italic,700,500' rel='stylesheet' type='text/css'>
            <link rel='stylesheet' type='text/css' href='$this->relPath/styles.css' />
        </head>";
    }

    public function writeBody()
    {
        echo '<body>';

        $this->content->write();

        // Now the main dessert is finished, add the toppings.

        // The Header
        echo '
<div id="header"><header>
	<div class="contain">
		<h1 class="fleft"><a href="', $this->relPath, '">NickStephen<span id="title-low-emph">.com</span></a></h1>
		<h1 class="fright"><a href="../">Up</a></h1>
	</div>
	<div class="scrpt hov un-emph" id="head-hider" style="position:absolute">Hide</div>
</header></div>
<div class="scrpt hov hide un-emph" id="head-shower" style="position:fixed">Show</div>';

        // The Side Menu
        echo '
<nav><div id="side-menu">
    <div class="hov un-emph" id="side-menu-close">Close Nav</div>
	<div id="side-menu-main">
		<ul>
			<li>
				<input class="nav-check nos-check" id="nav-android" type="checkbox" checked="true" value="nav-android" />
				<label for="nav-android" class="nav-label">Android</label>
				<ul>
					<li>
						<input class="nav-check nos-check" type="checkbox" checked="true" id="nav-oaa" value="nav-oaa" />
						<label class="nav-label" for="nav-oaa">Open App Android</label>
						<ul>
							<li><a href="about.php">About</a></li>
							<li><a href="download.php">Download</a></li>
							<li class="emph">Help</li>
							<li><a href="source.php">Source</a></li>
						</ul>
					</li>
					<li>
						<input class="nav-check nos-check" type="checkbox" id="nav-snap" value="nav-snap"/>
						<label class="nav-label" for="nav-snap">OpenSnap</label>
						<ul>
							<li><a href="../snap/about.php">About</a></li>
							<li><a href="../snap/download.php">Download</a></li>
							<li><a href="../snap/help.php">Help</a></li>
							<li><a href="../snap/source.php">Source</a></li>
						</ul>
					</li>
					<li><a href="">Android Development</a></li>
					<li><a href="">Android Info</a></li>
				</ul>
			</li>
			<li>
				<a href="">Web Development</a>
			</li>
			<li>
				<a href="">About Me</a>
			</li>
			<li>
				<a href="contact.php">Contact Me</a>
			</li>
		</ul>
	</div>
</div></nav>
<div class="scrpt hov hide un-emph" id="side-menu-open">Show Nav</div>';

        // The Footer
        echo '
<div id="footer"><footer>
	<div id="foot-hier"><a class="navi" href="../../../">Home</a> &gt; <a class="navi" href="../../">Android</a> &gt; <a class="navi" href="./">Open App Android</a> &gt; Help</div>
	<div class="contain">Nicholas Stephen - 2014</div>
	<div class="scrpt hov un-emph" id="foot-hide" style="padding:0 20px;">Hide</div>
</footer></div>
<div class="scrpt hov hide un-emph" id="foot-show">Show</div>';

        echo "<script type='text/javascript' src='$this->relPath/jquery-1.10.2.min.js' defer></script>
    <script type='text/javascript' src='$this->relPath/scripts.js' defer></script></body>";
    }
}