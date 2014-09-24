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
    /*
    echo '                <form style="margin:10px" name="email-form" method="post" action="contact.php">
                    <table border="0" class="centre">
                        <tbody>
';
    if (!is_null($emailError)) {
        if ($emailError == 1) {
            echo '                            <tr>
                                <td colspan="2"><span class="red-emph">There was an error sending the message! Please try again later</span></td>
                            </tr>';
        } elseif ($emailError == 0) {
            echo '                            <tr>
                                <td colspan="2"><span class="red-emph">Please enter information in all required fields!</span></td>
                            </tr>';
        }
    }
    echo '                            <tr>
                                <td style="width:200px"><span style="color:red">*</span>Enquiry Type: </td>
                                <td class="text-center" style="width:500px">
                                    <select name="enq_type" class="td-width">
                                        <option value="android"';
    if (!empty($formType) && $formType == "android") {
        echo ' selected="selected"';
    }
    echo '>Android Development</option>
                                        <option value="android_app"';
    if (!empty($formType) && $formType == "android_app") {
        echo ' selected="selected"';
    } echo '>Android App</option>
                                        <option value="webdev"';
    if (!empty($formType) && $formType == "webdev") {
        echo ' selected="selected"';
    } echo '>Web Development</option>
                                        <option value="other"';
    if (!empty($formType) && $formType == "other") {
        echo ' selected="selected"';
    }
    echo '>Other</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td><span class="red-emph">*</span>Your Name: </td>
                                <td class="text-center"><input type="text" name="name" class="td-width" value="';
    echo $formName;
    echo '"></td>
                            </tr>
                            <tr>
                                <td><span class="red-emph">*</span>Contact Address: </td>
                                <td class="text-center"><input type="email" name="email" class="td-width" value="';
    echo $formEmail;
    echo '"></td>
                            </tr>
                            <tr>
                                <td><span class="red-emph">*</span>Message: </td>
                                <td class="text-center"><textarea name="message" rows="15" cols="40" class="td-width">';
    echo $formMessage;
    echo '</textarea></td>
                            </tr>
                            <tr>
                                <td><span class="red-emph">*Required field</span></td>
                            </tr>
                            <tr>
                                <td style="text-align:center" colspan="2"><input type="submit" value="Submit"></td>
                            </tr>
                        </tbody>
                    </table>
                </form>
            </div>';
    */
} else {
    $para = new Paragraph();
    $para->text = 'Thank you for submitting your message!';
    $sec->addParagraph($para);
}

$htmlOut->content->addSection($sec);
$htmlOut->write();