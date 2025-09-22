<?php
include($_SERVER['DOCUMENT_ROOT'] . '/admin/includes/db-config.php');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../../../../vendor/autoload.php';
require_once($_SERVER['DOCUMENT_ROOT'] . '/vendor/setasign/fpdf/fpdf.php');
$companyLogo = 'https://www.edtechinnovate.com/web-assets/images/main/updated-logo.webp';

if ($freeDemo === 'freeDemo') {
    $demomail = false;
    $supportTeamData = [];
    $supportTeamQuery = $conn->query("SELECT * FROM demo_user WHERE id = $id");
    $supportTeamData = $supportTeamQuery->fetch_assoc();
    //    echo('<pre>');print_r($supportTeamData);die;#
    try {
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'no-reply@edtechinnovate.com'; // Update with your actual email
        $mail->Password   = 'qftsisgdjjafqsvi'; // Use App Password, not regular password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;
        $mail->setFrom('no-reply@edtechinnovate.com', 'EdTech Innovate Pvt. Ltd');
        $mail->isHTML(true);

        // ----------------------
        // FIRST EMAIL (with invoice attachment)
        // ----------------------
        $mail->addAddress($supportTeamData['email'], $supportTeamData['name']);
        $mail->Subject = 'Access Your Free Demo EdTech Innovate Team';
        $mail->Body = "
                
                <table width='100%' cellpadding='0' cellspacing='0' border='0' 
                       style='background: radial-gradient(circle, rgba(46,46,128,1) 0%, rgba(18,18,18,1) 99%); height:600px;'>
                    <tr>
                        <td align='center' valign='middle'>
                            <table style='background:#fff; border-radius:8px; width:90%; max-width:600px;' cellpadding='0' cellspacing='0' border='0'>
                                <tr>
                                    <td style='text-align:center; padding:20px;'>
                                        <img src='{$companyLogo}' alt='EdTech Logo' style='width:180px;' />
                                    </td>
                                </tr>
                                <tr>
                                    <td style='padding:30px; color:#000; line-height:1.6; font-family:Arial,sans-serif;'>
                                        <p>Thank you for showing interest in our services.</p>
                                        <p>We will share your credentials within 24 hours at your registered email {$supportTeamData['email']}.</p>
                                        <p>For any queries, please reach us at <a href='mailto:techsupport@edtechinnovate.com' style='color:black; text-decoration:underline;'>techsupport@edtechinnovate.com</a> or call us directly at <a href='tel:7042799663' style='color: black; text-decoration: underline;'>7042799663</a>.</p>
                                        <p>Thank you</p>
                                        <p>Best Regards,<br><strong>EdTech Innovate Team</strong></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style='background: radial-gradient(circle, rgba(46,46,128,1) 0%, rgba(18,18,18,1) 99%); color:#fff; text-align:center; padding:20px; font-size:14px;'>
                                        Need help? Contact us at <a href='mailto:techsupport@edtechinnovate.com' style='color:#fff; text-decoration:underline;'>techsupport@edtechinnovate.com</a><br>
                                        &copy; 2023 EdTech Innovate. All rights reserved.
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>";
        $mail->send();
        $typeOfClients='Demo Client';
        $teamMessage= 'A new client has submitted a Free Demo request. Please review the details below and ensure their credentials are shared within <strong>24 hours</strong>.';
        $clientData=$supportTeamData;
        include('./teamMail.php');
        echo json_encode([
            "status"  => 1,
            "message" => "Free demo request received."
        ]);
    } catch (Exception $e) {
        echo json_encode([
            "status"  => 0,
            "message" => "Mail error: " . $mail->ErrorInfo
        ]);
    }

    $conn->close();
    exit;
}
