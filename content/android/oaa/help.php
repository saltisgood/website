<?php
/**
 * Created by PhpStorm.
 * User: Nick Stephen
 * Date: 27/09/14
 * Time: 6:13 PM
 */

if (!isset($rel))
{
    $rel = '../../../';
}

include $rel . 'lib/HTMLOutput.php';

$htmlOut = new HTML();

$htmlOut->relPath = '../.././';
$htmlOut->thisPath = './android/oaa/help.php';

$htmlOut->content->title = 'Help';
$htmlOut->content->subtitle = 'Open App Android';

$htmlOut->content->addSection(new Section('Introduction',
    new Paragraph('This is the help page for Open App Android and will show you completely how to use the app to its full potential.')));

$htmlOut->content->addSection(new Section('Choose an App', new Paragraph('When you first start the app this is what you see. It\'s all fairly self-explanatory, just click on the top
button to view the apps that you\'ve installed onto your phone and the middle button to view system apps. I\'d
recommend sticking to the simpler downloaded apps to start with. This tutorial will use Open App Android itself.')));

$htmlOut->content->addSection((new Section('Exploring the App'))
    ->addParagraph((new RichParagraph())
        ->addText(new Text('Once you\'ve clicked on one of the apps in the list you will come to this page. Once again it\'s fairly
self-explanatory with just 3 buttons to choose from. The first button, marked "Explore Java Classes" is
to start exploring the code structures inside the app. The second button, "Explore Resources", is to view
the app\'s resources and the final button is to launch the app. Please note that since Open App Android finds '))
        ->addOutput(new GenTag('emph', 'ALL'))
        ->addText(new Text(' apps, some may not be able to be launched.')))
    ->addParagraph(new Paragraph('The final 2 items on the page are the name of the app\'s package and the total number of classes found in
the app. If the package name is too long to be displayed just tap on it and it will pop-up.')));

$htmlOut->content->addSection((new Section('Exploring Resources'))
    ->addParagraph((new RichParagraph())
        ->addText(new Text('For now let\'s look at the app\'s resources. Clicking on the "Explore Resources" button will bring you to
the following page. '))
        ->addSpan(new Span('content-emph', 'Note:'))
        ->addText(new Text(' If the R class can\'t be found inside the app
then this page won\'t appear and instead you will receive an error message. This should only occur if the
app\'s developers have actively tried to obfuscate the code.')))
    ->addParagraph((new RichParagraph())
        ->addText(new Text('Then you will see this list of resource types that will be familiar to any Android developers. You can also
find some more information on the <a href="http://developer.android.com/guide/topics/resources/index.html">Android Website</a>.
Currently only the drawable and string resource types are supported in Open App Android, but the others could be easily added in a future update.')))
    ->addParagraph(new Paragraph('Click on one of the resource types and you will see a list of all the resources of that type inside the
app with a preview of the resource and the name of the resource. Clicking on any item will also give you
a pop-up with a larger view of the resource.')));

$htmlOut->content->addSection((new Section('Exploring the Code'))
    ->addParagraph(new Paragraph('So we\'ve had a look at the resources of the app, so now let\'s go back and check out the code. Just hit
the back button a few times until you get back to the app explorer page and then click on the "Explore
Java Classes" button.'))
    ->addParagraph(new Paragraph('You\'ll now see a list of all the Java packages inside the app and clicking on them will browse through
them down the hierarchy. In this example I\'ve gone down to <code>com.nickstephen.openandroid.components</code>,
which is actually the package containing the Fragments that make up Open App Android. From the screenshot
you can see there are no more sub-packages and there is a list of classes inside this package. Now you
can click on any of the classes to view the inside of them. I\'ll click on ClassBrowserFrag, which happens
to be the Fragment that is displaying the new information on screen (very meta...).'))
    ->addParagraph(new Paragraph('This gives you the class or object view. The icon in the top left of the screen says that this object is a
class, as opposed to an interface, field or method. Each of these object types has a separate icon. Next to
that is the name of object as given in the source code. Below that is the full name of the super-class.
This can be clicked on to view the corresponding information for the super-class. Then the expandable list
below this has all the components of the object. These can be slightly different depending on the type of
object. For example a class has fields, an interface does not. All of these components can be clicked on
and viewed as well.')));

$htmlOut->write();