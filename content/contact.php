<?php
/**
 * Created by PhpStorm.
 * User: Nick Stephen
 * Date: 3/10/14
 * Time: 6:05 PM
 */

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if (!isset($rel))
{
    $rel = '../';
}

include $rel . 'lib/HTMLOutput.php';

$htmlOut = new HTML();

$htmlOut->relPath = './';
$htmlOut->thisPath = './';

$htmlOut->content->title = 'Contact Me';

$formType = 'android';
$formName = $formEmail = $formMessage = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $formType = test_input($_POST["enq_type"]);
    $formName = test_input($_POST["name"]);
    $formEmail = test_input($_POST["email"]);
    $formMessage = test_input($_POST["message"]);

    if (empty($formType) || empty($formName) || empty($formEmail) || empty($formMessage)) {
        $emailSent = false;
        $emailError = 0;
    } else {
        // Send email
        $mailTo = "webenquiry@nickstephen.com";
        if ($formType == "android") {
            $mailSubject = "Android Development";
        } elseif ($formType == "android-app") {
            $mailSubject = "Android App";
        } elseif ($formType == "webdev") {
            $mailSubject = "Web Development";
        } else {
            $mailSubject = "Other";
        }

        $mailMessage = "Enquiry from: {$formName}.
Email: {$formEmail}

Message:
        {$formMessage}";

        $mailFrom = $formEmail;

        $mailHeaders = "From: {$formEmail}";
        if (@mail($mailTo, $mailSubject, $mailMessage, $mailHeaders)) {
            $emailSent = true;
        } else {
            $emailSent = false;
            $emailError = 1;
        }
    }

} else {
    $emailSent = false;
}

$sec = new Section();

if (!$emailSent) {
    $form = new Form('email-form', 'post', 'contact.php');

    $selector = new DropDownSelect('enq_type');
    $hasType = !empty($formType);
    $selector->addItem(new SelectItem($hasType && $formType == 'android', 'android', 'Android Development'));
    $selector->addItem(new SelectItem($hasType && $formType == 'android-app', 'android-app', 'Android App'));
    $selector->addItem(new SelectItem($hasType && $formType == 'webdev', 'webdev', 'Web Development'));
    $selector->addItem(new SelectItem($hasType && $formType == 'other', 'other', 'Other'));
    $form->addItem('Enquiry Type', $selector);

    $form->addItem('Your Name', new Input('name', $formName, 'text'));
    $form->addItem('Contact E-mail', new Input('email', $formEmail, 'email'));
    $form->addItem('Message', new TextBoxInput('message', '15', '40', $formMessage));

    $sec->addParagraph($form);
} else {
    $para = new Paragraph();
    $para->text = 'Thank you for submitting your message!';
    $sec->addParagraph($para);
}

$htmlOut->content->addSection($sec);
$htmlOut->write();