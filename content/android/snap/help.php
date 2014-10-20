<?php
/**
 * Created by PhpStorm.
 * User: Nick Stephen
 * Date: 3/10/14
 * Time: 4:20 PM
 */

if (!isset($rel))
{
    $rel = '../../../';
}

include $rel . 'lib/HTMLOutput.php';

$htmlOut = new HTML();

$htmlOut->relPath = '../.././';
$htmlOut->thisPath = './android/snap/help.php';

$htmlOut->content->title = 'Help';
$htmlOut->content->subtitle = 'OpenSnap';

$htmlOut->content->addSection(new Section('Introduction',
    new Paragraph('This is the help page for OpenSnap and will show you how to use the app to its full potential.')));

$htmlOut->content->addSection(new Section('Login',
    new Paragraph('When you first start the app this is what you see. You login with your normal SnapChat username and password.
Making an account is not currently supported, but will be added in a future update. The login process only
goes through the SnapChat servers, no information is collected by me (in fact, I don\'t collect any
information whatsoever, unlike SnapChat...).')));

$htmlOut->content->addSection((new Section('Home'))
    ->addParagraph(new Paragraph('Once you login you\'re brought to the home page, which you can see below. Here you have 3 buttons to take
a new snap, view your snaps or view your contacts. You can click the buttons to go to any of those things,
or simply swipe from left to right to view the snap list, or from right to left to view your contacts. You
can also click the OpenSnap icon in the Action Bar to open a drawer on the left side with all the options,
or click on the cog in the top right to view the settings.'))
    ->addParagraph(new Paragraph('Users with phones with a hardware options button can click the options button to view the options popup,
whereas those without will see the overflow button in the right of the Action Bar.')));

$htmlOut->content->addImageSection((new ImageSection(ImageSection::SCREENSHOT))
    ->addImage((new Image('img/opensnap_home_small.gif', 169, 300))
        ->setAltLink('img/opensnap_home.gif')
        ->setAltText('The Home Page')
        ->setCaption('The Home Page')));

$htmlOut->content->addSection((new Section('The Snaplist'))
    ->addParagraph(new Paragraph('All your snaps are saved in a list like the one in the picture. Each snap has an icon to the left which
is its status, the user it was sent to or from and a timestamp of when that was. Video snaps also have a movie icon to
the right. New snaps will also show up with a red background.'))
    ->addParagraph(new Paragraph('When you want to download a snap you simply tap on the item in the list and it will show up a progress
bar to track it. You can also enable an option in the settings so that snaps are automatically downloaded
and to enable or disable notifications of downloads. Once a snap is downloaded you tap again to view it.
You don\'t need to hold down the screen to keep the snap viewed.'))
    ->addParagraph(new Paragraph('Snaps can also be long-clicked to get a pop-up with more specific options available, though those are fairly
bare bones at the moment.')));

$htmlOut->content->addSection((new Section('Contacts'))
    ->addParagraph(new Paragraph('Your contacts are also saved in a list much like the snaps. They\'re displayed in alphabetical order of
their display names (if available) or usernames. Your favourite contact (as decided by SnapChat) is shown
with a star next to their name.'))
    ->addParagraph(new Paragraph('Tap a contact\'s name to view the thread of snaps sent and received between yourself and them. This thread
is just like you would see in a SMS app and shows the thumbnails of the snaps. Tapping on a thumbnail will
let you view the full snap (if the snap is saved, i.e. if you have premium features).')));

$htmlOut->content->addSection((new Section('New Snaps'))
    ->addParagraph(new Paragraph('So you want to take a snap, click on the new snap button in the home page. You then have 4 options,
opensnap camera, resend, select from library and android camera.'))
    ->addParagraph(new Paragraph('OpenSnap Camera is to take a picture with the camera built into OpenSnap. Though there are less options
than the Android camera it will automatically choose the correct picture size and is pretty fast. Use this
unless you have a reason not to.'))
    ->addParagraph(new Paragraph('The resend button will be grayed out unless you\'ve previously sent a snap. In that case you can select it
to go back to the editing screen with that other snap and modify or send it again.'))
    ->addParagraph(new Paragraph('Select from library allows you to send a picture that is currently stored in your android gallery. So
imagine you\'d previously taken a picture you want to send you can select it, or you\'ve downloaded
something you want to send you can do it. A very handy feature that\'s not allowed in SnapChat. Note that
on some phones the kinks haven\'t been completely worked out yet.'))
    ->addParagraph(new Paragraph('Android camera is to take a picture with your phone\'s default camera app. This allows you to have more
control over the end result if you really want to.'))
    ->addParagraph(new Paragraph('Once you\'ve taken a snap in some way you\'ll get taken to the snap editor.')));

$htmlOut->content->addSection(new Section('Snap Editor',
    new Paragraph('The editor is just as fully featured as the SnapChat version. Tap on the snap to the make a caption, drag
the caption to move it around. Tap the pencil to start drawing, or long click it to choose a colour. Tap
the pencil again to start erasing. Tap the number in the bottom left to choose the display time and the
floppy disk if you want to save your snap. Once you\'re finished click on send.')));

$htmlOut->content->addSection(new Section('Contact Selector',
    new Paragraph('Now you\'re ready to send your snap. You can drag from the very left of the screen to view a preview of
your snap before it\'s sent. Otherwise tap on a contact to send it just to them or tap the check boxes to
send to multiple people. If you select people with the check boxes you can also long click on the send
button to mark it to be sent later. In this case it gets put into your snap list as a temporary snap and
you just tap on it to send it.')));

$htmlOut->write();