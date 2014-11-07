<?php
/**
 * Created by PhpStorm.
 * User: Nick Stephen
 * Date: 7/11/14
 * Time: 1:11 PM
 */

if (!isset($rel))
{
    $rel = '../../../';
}

require $rel . 'lib/HTMLOutput.php';

function setupMenu($menu)
{
    $menu->software->active = true;
    $menu->software->subItems[SOFT_XDIN]->active = true;
    $menu->software->subItems[SOFT_XDIN]->subItems[SOFT_XDIN_SUPP]->active = true;
}

$htmlOut = new HTML();

$htmlOut->relPath = '../.././';
$htmlOut->thisPath = './software/xdinput/support.php';

$htmlOut->content->title = 'Support';
$htmlOut->content->subtitle = 'XD-Input';

$htmlOut->content->addSection((new Section())
    ->addParagraph(new Paragraph('XD-Input works by being effectively a User Mode Driver for a USB Controller and because
    of that I wouldn\'t expect it to work unchanged for any device. At the moment it\'s specifically written to work with
    one particular device (mine!) and for that it works well but I think it will need to change for other people.'))
    ->addParagraph(new Paragraph('Sadly I don\'t have multiple controllers to test that theory, so if you do experience wrong
    or missing button inputs using the program, please feel free to send me a message through my <a href="/contact.php">contact
    page</a> and I\'ll endeavour to help you out. If there\'s enough interest I may add support for general controllers
    in the future.'))
);

$htmlOut->content->addSection((new Section('Best Use'))
    ->addParagraph(new Paragraph('If you want XD-Input to run in the background, detect when you start a game, automatically
    load a button config and shut down when the game ends you can do that by changing the settings files. If you haven\'t
    already started XD-Input with your controller plugged in, do that now and get the program to remember your device.
    This will generate the default config files for you.'))
    ->addParagraph(new Paragraph('Now you can open up the config files in any text editor and have a look at them.
    Settings.config is the main config file and any others are button remappings. So open up Settings.config and go to
    the PROCESS_LIST line. Here you can enter a list of processes like this: Process1.exe;Process2.exe;... Make sure to
    end the line with a semi-colon (;).'))
    ->addParagraph(new Paragraph('From now on, whenever you start up XD-Input it will go into a waiting mode until you start
    one of the games in the process list. Once you do, it will load up the config file named after that process for the button
    setup. This is also, of course, completely modifiable.'))
    ->addParagraph(new Paragraph('Finally, you can change the QUIT_ON_GAME_CLOSE setting. By default this is FALSE, so when
    you close your game XD-Input will go back into wait mode. If you change it to TRUE, then when XD-Input detects your game
    has closed it will automatically close as well.'))
);

$htmlOut->write();