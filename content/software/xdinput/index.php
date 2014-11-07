<?php
/**
 * Created by PhpStorm.
 * User: Nick Stephen
 * Date: 4/11/14
 * Time: 8:03 PM
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
    $menu->software->subItems[SOFT_XDIN]->subItems[SOFT_XDIN_IND]->active = true;
}

$htmlOut = new HTML();

$htmlOut->relPath = '../.././';
$htmlOut->thisPath = './software/xdinput/index.php';

$htmlOut->content->title = 'About';
$htmlOut->content->subtitle = 'XD-Input';

$htmlOut->content->addSection((new Section())
    ->addParagraph(new Paragraph('XD-Input is a tool for taking a controller for PC that\'s only capable of being used
    as a DirectInput (DInput) device and converting it to a XInput output.'))
);

$htmlOut->content->addSection((new Section('So what?'))
    ->addParagraph(new Paragraph('There are lots of PC games that allow the use of a controller but with terrible support.
    The example I\'ll use here is Dark Souls 2. The Dark Souls games are great games but fairly terrible PC ports and
    Dark Souls 2 was no exception; the big problem being that Dark Souls is meant to be played with a controller and yet
    with my controller the buttons were mapped incorrectly and with no way to fix them.'))
    ->addParagraph(new Paragraph('Other games support only the newer XInput standard or the barest amounts of DInput, but
    there are plenty of (non-Microsoft) PC controllers that only work with DInput. So you may find that your controller
    simply isn\'t recognised by the game, with the only solution being to buy a new one.'))
    ->addParagraph(new Paragraph('XD-Input fixes all these problems by creating a virtual XInput device that all games
    see as a Xbox 360 controller, but is actually just taking your inputs from whatever your controller is.'))
);

$htmlOut->content->addSection((new Section('Features'))
    ->addParagraph((new ListHTML())
        ->setOrdered(false)
        ->addItem('All buttons can be completely remapped')
        ->addItem('Supports devices with 2 analog sticks, 12 buttons and a 8-way POV Hat (D-pad)')
        ->addItem('Supports button remapping on a game by game process')
        ->addItem('Hides DInput device from the game to help support on difficult games')
        ->addItem('Automatically unhooks when games end')
        ->addItem('Can run in the background in a lightweight state')
        ->addItem('Low CPU usage even when running in full power state')
    )
);

$htmlOut->content->addSection((new Section('Download'))
    ->addParagraph(new SubSection('Easy', '<a href="ControllerHook.zip">Click here to download program</a>'))
    ->addParagraph(new SubSection('Power User', '<a href="source.php">Click here to get the source</a>'))
);

$htmlOut->content->addSection((new Section('Installation'))
    ->addParagraph((new ListHTML())
        ->setOrdered(true)
        ->addItem('Download and install the <a href="http://forums.pcsx2.net/Thread-XInput-Wrapper-for-DS3-and-Play-com-USB-Dual-DS2-Controller">SCP Driver Package</a> (required
        for the virtual Xbox controller)')
        ->addItem('Download the program (or build it from source) from the links above')
        ->addItem('Plug in your controller')
        ->addItem('Run XD-Input.exe')
        ->addItem('Follow the instructions of the program. No install required!'))
);

$htmlOut->content->addSection((new Section('Requirements'))
    ->addParagraph((new ListHTML())
        ->setOrdered(false)
        ->addItem('The <a href="http://www.microsoft.com/en-au/download/details.aspx?id=40784">VC 2013 Redistributable x86 Package</a>')
        ->addItem('The <a href="http://forums.pcsx2.net/Thread-XInput-Wrapper-for-DS3-and-Play-com-USB-Dual-DS2-Controller">Scp Driver Package</a>')
        ->addItem('Support for earlier versions of Windows NOT GUARANTEED!')
        ->addItem('If you\'re having issues with the inputs from your controller being recognised, please go <a href="support.php">here</a>. Thank-you!')
        )
);

$htmlOut->write();