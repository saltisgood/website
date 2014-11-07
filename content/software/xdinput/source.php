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
    $menu->software->subItems[SOFT_XDIN]->subItems[SOFT_XDIN_SRC]->active = true;
}

$htmlOut = new HTML();

$htmlOut->relPath = '../.././';
$htmlOut->thisPath = './software/xdinput/source.php';

$htmlOut->content->title = 'Source';
$htmlOut->content->subtitle = 'XD-Input';

$htmlOut->content->addSection((new Section())
    ->addParagraph(new Paragraph('The full source code for XD-Input can be found on my <a href="https://github.com/saltisgood/xd-input">GitHub Repository</a>.'))
    ->addParagraph(new Paragraph('To download and browse it you will just need <a href="http://git-scm.com/downloads">Git</a> and then you
can use this command in a git bash terminal:'))
        ->addParagraph((new CodeBlock())
            ->addLine('git clone https://github.com/saltisgood/xd-input.git'))
    ->addParagraph(new Paragraph('This command simply downloads the source code files to a new folder called XD-Input. The
    end result is that you get an exact copy of the last stable release of XD-Input.'))
);

$htmlOut->write();