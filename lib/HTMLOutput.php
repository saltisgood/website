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
        echo '<body>';

        $this->content->write();

        // Now the main dessert is finished, add the toppings.

        // The Header
        echo '
<div id="header">
	<div class="contain">
		<h1 class="fleft"><a href="', $this->relPath, '">NickStephen<span id="title-low-emph">.com</span></a></h1>
		<h1 class="fright"><a href="../">Up</a></h1>
	</div>
	<div class="scrpt hov" id="head-hider" style="position:absolute">Hide Header
    </div>
</div>
<div class="scrpt hov hide" id="head-shower" style="position:fixed">Show Header
</div>';

        // The Side Menu
        echo '
<nav><div id="side-menu">
    <div class="hov" id="side-menu-close">&lt; Close Nav</div>
	<div id="side-menu-main">
		<ul>
			<li>
				<input class="nav-check" id="nav-android" type="checkbox" checked="true" value="nav-android" />
				<label for="nav-android" class="nav-label">Android</label>
				<ul>
					<li>
						<input class="nav-check" type="checkbox" checked="true" id="nav-oaa" value="nav-oaa" />
						<label class="nav-label" for="nav-oaa">Open App Android</label>
						<ul>
							<li><a href="about.php">About</a></li>
							<li><a href="download.php">Download</a></li>
							<li class="emph">Help</li>
							<li><a href="source.php">Source</a></li>
						</ul>
					</li>
					<li>
						<input class="nav-check" type="checkbox" id="nav-snap" value="nav-snap"/>
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
<div class="scrpt hov hide" id="side-menu-open">&gt; Show Nav</div>';

        // The Footer
        echo '
<div id="footer">
	<div id="foot-hier"><a class="navi" href="../../../">Home</a> &gt; <a class="navi" href="../../">Android</a> &gt; <a class="navi" href="./">Open App Android</a> &gt; Help</div>
	<div class="contain">Nicholas Stephen - 2014</div>
	<div class="scrpt hov" id="foot-hide" style="padding:0 20px;">Hide Footer</div>
</div>
<div class="scrpt hov hide" id="foot-show">Show Footer</div>';

        echo "<script type='text/javascript' src='$this->relPath/jquery-1.10.2.min.js' defer></script>
    <script type='text/javascript' src='$this->relPath/scripts.js' defer></script></body>";
    }
}