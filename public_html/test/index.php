<?php
/**
 * Created by PhpStorm.
 * User: Nick Stephen
 * Date: 20/09/14
 * Time: 6:36 PM
 */

include '../../lib/HTMLOutput.php';

$htmlOut = new HTML();
$htmlOut->content->title = 'Help &middot; Open App Android';

$sec = new Section();
$sec->heading = 'Introduction';
$para = new Paragraph();
$para->text = 'This is the help page for Open App Android and will show you completely how to use the app to its full potential.';
$sec->addParagraph($para);
$htmlOut->content->addSection($sec);

$sec = new Section();
$sec->heading = 'Choose an App';
$para = new Paragraph();
$para->text = "When you first start the app this is what you see. It's all fairly self-explanatory, just click on the top
				button to view the apps that you've installed onto your phone and the middle button to view system apps. I'd
				recommend sticking to the simpler downloaded apps to start with. This tutorial will use Open App Android itself.";
$sec->addParagraph($para);
$htmlOut->content->addSection($sec);

$sec = new Section();
$sec->heading = 'Exploring the App';
$para = new RichParagraph();
$txt = new Text();
$txt->text = "Once you've clicked on one of the apps in the list you will come to this page. Once again it's fairly
				self-explanatory with just 3 buttons to choose from. The first button, marked \"Explore Java Classes\" is
				to start exploring the code structures inside the app. The second button, \"Explore Resources\", is to view
				the app's resources and the final button is to launch the app. Please note that since Open App Android finds";
$para->addText($txt);
$txt = new Span();
$txt->class = "content-emph";
$txt->text = "ALL";
$txt = new Text();
$txt->text = " apps, some may not be able to be launched.";
$para->addText($txt);
$sec->addParagraph($para);

$para = new Paragraph();
$para->text = "The final 2 items on the page are the name of the app's package and the total number of classes found in
				the app. If the package name is too long to be displayed just tap on it and it will pop-up.";
$sec->addParagraph($para);
$htmlOut->content->addSection($sec);

$sec = new Section();
$sec->heading = 'Exploring Resources';
$para = new RichParagraph();
$txt = new Text();
$txt->text = "For now let's look at the app's resources. Clicking on the \"Explore Resources\" button will bring you to
				the following page. ";
$para->addText($txt);
$txt = new Span();
$txt->class = 'content-emph';
$txt->text = 'Note:';
$para->addSpan($txt);
$txt = new Text();
$txt->text = " If the R class can't be found inside the app
				then this page won't appear and instead you will receive an error message. This should only occur if the
				app's developers have actively tried to obfuscate the code.";
$para->addText($txt);
$sec->addParagraph($para);
$para = new RichParagraph();
$txt = new Text();
$txt->text = "Then you will see this list of resource types that will be familiar to any Android developers. You can also
				find some more information on the ";
$para->addOutput($txt);
$txt = new GenTag('a');
$txt->addAttr('href', 'http://developer.android.com/guide/topics/resources/index.html');
$txtalt = new Text();
$txtalt->text = 'Android website';
$txt->addContents($txtalt);
$para->addOutput($txt);
$txt = new Text();
$txt->text = '.
				Currently only the drawable and string resource types are supported in Open App Android, but the others
				could be easily added in a future update.';
$para->addOutput($txt);
$sec->addParagraph($para);
$para = new Paragraph();
$para->text = 'Click on one of the resource types and you will see a list of all the resources of that type inside the
				app with a preview of the resource and the name of the resource. Clicking on any item will also give you
				a pop-up with a larger view of the resource.';
$sec->addParagraph($para);
$htmlOut->content->addSection($sec);

$sec = new Section();
$sec->heading = 'Exploring the Code';
$para = new Paragraph();
$para->text = "So we've had a look at the resources of the app, so now let's go back and check out the code. Just hit
				the back button a few times until you get back to the app explorer page and then click on the \"Explore
				Java Classes\" button.";
$sec->addParagraph($para);

$para = new RichParagraph();
$txt = new Text();
$txt->text = "You'll now see a list of all the Java packages inside the app and clicking on them will browse through
				them down the hierarchy. In this example I've gone down to ";
$para->addOutput($txt);
$txt = new GenTag('code');
$txtalt = new Text();
$txtalt->text = 'com.nickstephen.openandroid.components';
$txt->addContents($txtalt);
$para->addOutput($txt);
$txt = new Text();
$txt->text = ",
				which is actually the package containing the Fragments that make up Open App Android. From the screenshot
				you can see there are no more sub-packages and there is a list of classes inside this package. Now you
				can click on any of the classes to view the inside of them. I'll click on ClassBrowserFrag, which happens
				to be the Fragment that is displaying the new information on screen (very meta...).";
$para->addOutput($txt);
$sec->addParagraph($para);

$para = new Paragraph();
$para->text = "This gives you the class or object view. The icon in the top left of the screen says that this object is a
				class, as opposed to an interface, field or method. Each of these object types has a separate icon. Next to
				that is the name of object as given in the source code. Below that is the full name of the super-class.
				This can be clicked on to view the corresponding information for the super-class. Then the expandable list
				below this has all the components of the object. These can be slightly different depending on the type of
				object. For example a class has fields, an interface does not. All of these components can be clicked on
				and viewed as well.";
$sec->addParagraph($para);
$htmlOut->content->addSection($sec);

$htmlOut->write();