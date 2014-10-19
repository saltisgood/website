<?php
/**
 * Created by PhpStorm.
 * User: Nick Stephen
 * Date: 19/10/14
 * Time: 8:03 PM
 */

if (!isset($rel))
{
    $rel = '../';
}

require $rel . 'lib/HTMLOutput.php';

$html = new HTML();

$html->relPath = './';
$html->thisPath = './about.php';

$html->content->title = 'About Me';

$sec = new Section();

$par = new Paragraph();
$par->text = 'Well, hello there! My name\'s Nicholas Stephen and this is my website.';
$sec->addParagraph($par);

$par = new Paragraph();
$par->text = 'I\'m a 22 year old Australian currently living in Sydney. I recently graduated from the
<a href="http://sydney.edu.au/">University of Sydney</a> with a Bachelor of Science (Computer Science) and I attended
<a href="http://www.barker.nsw.edu.au/">Barker College</a> as my school.';
$sec->addParagraph($par);

$sec->addParagraph(new SubSection('My Programming Experience:'));
$list = new ListHTML();
$list->addItem('I\'m very proficient at C++/C, C# and Java (especially Android)');
$list->addItem('I\'m reasonably experienced at various aspects of Web Development, e.g. PHP, HTML, CSS, JavaScript');
$list->addItem('I\'ve constructed programs utilising 3D Graphics technologies, mainly OpenGL');
$list->addItem('In the past I\'ve also used Python, Fortran and Lisp');
$sec->addParagraph($list);

$sec->addParagraph(new SubSection('My Awards:'));
$list = new ListHTML();
$list->addItem('Medal Winner -  Science, International Competitions and Assessments For Schools, University of New South Wales, 2007');
$list->addItem('Highest Individual Score Prize - Australian Primary Schools Mathematical Olympiads');
$list->addItem('7 High Distinctions - Uni of Sydney, Computer Skills, Science, English (UNSW), Australasian Schools Science Competition, Australian Mathematics Trust');
$list->addItem('17 Distinctions - Uni of Sydney, Royal Australian Chemical Institute, Australasian Schools Competitions (UNSW), Australian Mathematics Trust');
$list->addItem('2 Consecutive Latin Prizes - Barker College');
$list->addItem('94.85 ATAR');
$sec->addParagraph($list);

$sec->addParagraph(new SubSection('My Interests:'));
$list = new ListHTML();
$list->addItem('Music - Rush, Dream Theater, Karnivool, Porcupine Tree, Rammstein, ...');
$list->addItem('Sports - Squash, AFL, Rugby Union, Formula 1, ...');
$list->addItem('Learning about any and all');
$list->addItem('Gaming');
$sec->addParagraph($list);

$html->content->addSection($sec);

$html->write();