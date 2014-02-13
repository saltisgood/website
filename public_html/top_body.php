<?php
/**
 * Created by PhpStorm.
 * User: Nick
 * Date: 14/12/13
 * Time: 1:48 AM
 */

echo '<body>
    <script>
      (function(i,s,o,g,r,a,m){i[\'GoogleAnalyticsObject\']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,\'script\',\'//www.google-analytics.com/analytics.js\',\'ga\');

      ga(\'create\', \'UA-46464874-1\', \'nickstephen.com\');
      ga(\'send\', \'pageview\');

    </script>

    <div id="main">
        <div id="top-menu">
            <h1><a href="', getRootPath(), '">Nick Stephen<span id="title-low-emph">.com</span></a></h1>
            <div id="nav-bar">';

if ($cons->includePrimeNav()) {
    echo '
                <ul class="prime">
                    ';
    echo '<li';
    if ($cons->getSelectedPrimeNav() == \stevo\PrimeNavEnum::HOME) {
        echo ' class="selected prime"';
    }
    echo '><h2><a class="prime" href="', getRootPath(),'">Home</a></h2></li>
                    <li';
    if ($cons->getSelectedPrimeNav() == \stevo\PrimeNavEnum::ANDROID) {
        echo ' class="selected prime"';
    }
    echo'><h2><a class="prime" href="', getRootPath(),'/android/">Android</a></h2></li>
                    <li';
    if ($cons->getSelectedPrimeNav() == \stevo\PrimeNavEnum::OTHER) {
        echo ' class="selected prime"';
    }
    echo '><h2><a class="prime" href="">Other</a></h2></li>
                    <li class="right-align-li"><h2><a class="prime" href="#content">Top</a></h2></li>
                </ul>
                <ul class="sub">';

    if ($cons->getIncludeSubNav()) {
        switch ($cons->getSelectedPrimeNav()) {
            case \stevo\PrimeNavEnum::ANDROID:
                echo '
                <li';
                if ($cons->getSelectedSubNav() == \stevo\AndroidNavEnum::OPEN_APP) {
                    echo ' class="selected sub"';
                }
                echo '><h4><a class="sub" href="', getRootPath(), '/android/apps/oaa/" style="width:200px">Open App Android</a></h4></li>
                <li><h4><a class="sub" href="', getRootPath(),'/android/apps/snap/">OpenSnap</a></h4></li>
                <li><h4><a class="sub">Info</a></h4></li>';
                break;
        }
    }

    echo '</ul>';
}

echo '
            </div>
        </div>

';

if (!is_null($preContent)) {
    echo $preContent;
}

echo '

        <div id="content">
';