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

$html->content->addSection((new Section())
    ->addParagraph(new Paragraph('Well, hello there! My name\'s Nicholas Stephen and this is my website.'))
    ->addParagraph((new ListHTML('Important Links:'))
        ->addItem('<a href="https://github.com/saltisgood">My GitHub</a>')
        ->addItem('<a href="https://www.youtube.com/user/nickSTEVOstephen">My YouTube</a>'))
    ->addParagraph(new Paragraph('I\'m a 22 year old Australian currently living in Sydney. I recently graduated from the
<a href="http://sydney.edu.au/">University of Sydney</a> with a Bachelor of Science (Computer Science) and I attended
<a href="http://www.barker.nsw.edu.au/">Barker College</a> as my school.'))
    ->addParagraph((new ListHTML('My Programming Experience:'))
        ->addItem('I\'m very proficient at C++/C, C# and Java (especially Android)')
        ->addItem('I\'m reasonably experienced at various aspects of Web Development, e.g. PHP, HTML, CSS, JavaScript')
        ->addItem('I\'ve constructed programs utilising 3D Graphics technologies, mainly OpenGL')
        ->addItem('In the past I\'ve also used Python, Fortran and Lisp'))
    ->addParagraph((new ListHTML('My Awards:'))
        ->addItem('Medal Winner -  Science, International Competitions and Assessments For Schools, University of New South Wales, 2007')
        ->addItem('Highest Individual Score Prize - Australian Primary Schools Mathematical Olympiads')
        ->addItem('7 High Distinctions - Uni of Sydney, Computer Skills, Science, English (UNSW), Australasian Schools Science Competition, Australian Mathematics Trust')
        ->addItem('17 Distinctions - Uni of Sydney, Royal Australian Chemical Institute, Australasian Schools Competitions (UNSW), Australian Mathematics Trust')
        ->addItem('2 Consecutive Latin Prizes - Barker College')
        ->addItem('94.85 ATAR'))
    ->addParagraph((new ListHTML('My Interests:'))
        ->addItem('Music - Rush, Dream Theater, Karnivool, Porcupine Tree, Rammstein, ...')
        ->addItem('Sports - Squash, AFL, Rugby Union, Formula 1, ...')
        ->addItem('Learning about any and all')
        ->addItem('Gaming')));

$html->write();