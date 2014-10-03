<?php
/**
 * Created by PhpStorm.
 * User: Nick Stephen
 * Date: 3/10/14
 * Time: 4:21 PM
 */

if (!isset($rel))
{
    $rel = '../../../';
}

include $rel . 'lib/HTMLOutput.php';

$htmlOut = new HTML();

$htmlOut->relPath = '../.././';
$htmlOut->thisPath = './android/snap/source.php';

$htmlOut->content->title = 'Source';
$htmlOut->content->subtitle = 'OpenSnap';

$sec = new Section();

$para = new Paragraph();
$para->text = 'The full source code for OpenSnap can be found on my <a href="https://github.com/saltisgood/opensnap">GitHub Repository</a>.';
$sec->addParagraph($para);

$para = new Paragraph();
$para->text = 'To download and browse it you will just need <a href="http://git-scm.com/downloads">Git</a> and then you
can use the commands in a git bash terminal:';
$sec->addParagraph($para);

$para = new GenTag('code');

$subSec = new Section();
$subPara = new Paragraph();
$subPara->text = 'git clone https://github.com/saltisgood/opensnap.git OpenSnapProj';
$subSec->addParagraph($subPara);

$subPara = new Paragraph();
$subPara->text = 'cd OpenSnapProj';
$subSec->addParagraph($subPara);

$subPara = new Paragraph();
$subPara->text = 'git submodule init';
$subSec->addParagraph($subPara);

$subPara = new Paragraph();
$subPara->text = 'git submodule update';
$subSec->addParagraph($subPara);

$para->addContents($subSec);
$sec->addParagraph($para);

$para = new Paragraph();
$para->text = 'These commands simply download the source code files to a new folder OpenSnapProj, change into that
folder and then initialise and synchronise the submodules as well. The end result of these commands is
that you\'ll have an exact copy of the last stable release of OpenSnap.';
$sec->addParagraph($para);

$para = new Paragraph();
$para->text = 'The repository is set up so that if you\'re using
<a href="http://developer.android.com/sdk/installing/studio.html">Android Studio</a> you should just be
able to open it straight away without any hassle importing the project. If you\'re using eclipse with the
<a href="http://developer.android.com/tools/sdk/eclipse-adt.html">ADT Plugin</a> then you may have to do
some wrangling to get it to import and build.';
$sec->addParagraph($para);

$htmlOut->content->addSection($sec);

$htmlOut->write();