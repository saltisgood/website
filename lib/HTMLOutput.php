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
        </div>";

        // The Header
        echo '
<div id="top-menu">
	<div class="contain">
		<h1><a href="http://nickstephen.com">NickStephen<span id="title-low-emph">.com</span></a></h1>
		<h1 style="float: right"><a href="../">Up</a></h1>
	</div>
	<div class="scrpt" id="head-hider" style="position:absolute;right:0;top:0;padding:0 20px;text-decoration:underline;">Hide Header
    </div>
</div>
<div class="scrpt" id="head-shower" style="position:fixed;right:0;top:0;padding:0 20px;text-decoration:underline;display:none;">Show Header
</div>';

        // The Side Menu
        echo '
<nav><div id="side-menu-test" style="position: fixed; top: 90px; bottom: 50px; border-style: solid; background-color: rgba(0,0,0,0.7); min-width:100px;">
    <div style="width: 100%; text-align: right;text-decoration:underline;" id="side-menu-close">&lt; Close Nav</div>
	<div style="top: 10%; position: relative; margin: 10px;">
		<ul style="list-style: none; margin: 0;">
			<li>
				<input class="menu-check" id="android" type="checkbox" checked="true" value="android" />
				<label for="android" class="menu-label">Android</label>
				<ul>
					<li>
						<input class="menu-check" type="checkbox" checked="true" id="oaa" value="menu-check" />
						<label class="menu-label" for="oaa">Open App Android</label>
						<ul>
							<li><a href="about.php">About</a></li>
							<li><a href="download.php">Download</a></li>
							<li class="this-nav">Help</li>
							<li><a href="source.php">Source</a></li>
						</ul>
					</li>
					<li>
						<input class="menu-check" type="checkbox" id="snap" value="menu-check"/>
						<label class="menu-label" for="snap">OpenSnap</label>
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
<div id="side-menu-open" style="position:fixed;top:90px;display:none;text-decoration:underline;">&gt; Show Nav</div>';

        // The Footer
        echo '
<div id="footer">
	<div id="hierarchy"><a class="navi" href="../../../">Home</a> &gt; <a class="navi" href="../../">Android</a> &gt; <a class="navi" href="./">Open App Android</a> &gt; Help</div>
	<div id="vanity">Nicholas Stephen - 2014</div>
	<div class="scrpt" id="foot-hide-button" style="position:absolute;right:0;top:0;padding:0 20px;text-decoration:underline;">Hide Footer</div>
</div>
<div class="scrpt" id="footer-show" style="position: fixed;right:0;bottom:0;height:50px;text-decoration:underline;padding:0 20px;display:none;">Show Footer</div>';

        echo "</body>";
    }
}