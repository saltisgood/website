<?php
/**
 * Created by PhpStorm.
 * User: Nick
 * Date: 14/12/13
 * Time: 12:38 AM
 */



echo "<!DOCTYPE html>
<head>
    <meta charset=\"UTF-8\" />
    <title>", $cons->getPageTitle(), " - NickStephen.com</title>
    ",
    "<link rel=\"stylesheet\" type=\"text/css\" href=\"", getRootPath(), "/styles.css\" />";

if ($cons->includeMenuStyles()) {
    echo "
    <link rel=\"stylesheet\" type=\"text/css\" href=\"", getRootPath(), "/menus.css\" />";
}

if ($cons->getIncludeScripts()) {
    echo '
    <script type="text/javascript" src="', getRootPath(), '/scripts.js"></script>
    <script type="text/javascript">
        function toggleMenu() {
            toggleShowMenu(\'side-menu\', \'' . getRootPath() . '/img/\');
        }
    </script>';
}
echo $cons->getExtraHeaders();

echo '

    <!--[if !IE 7]>
        <style type="text/css">
            /*noinspection CssUnusedSymbol*/
            #wrap { display: table; height: 100% }
        </style>
    <![endif]-->
</head>

';