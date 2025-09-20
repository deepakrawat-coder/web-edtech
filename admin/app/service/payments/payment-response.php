<?php
include($_SERVER['DOCUMENT_ROOT'] . '/admin/includes/db-config.php');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../../../../vendor/autoload.php';

// --------------------
//  SHOW LOADER FIRST
// --------------------
?>
<!DOCTYPE html>
<html>
<head>
    <title>Processing Payment...</title>
    <style>
        body { display:flex; align-items:center; justify-content:center; flex-direction:column; height:100vh; background:#121212; color:#fff; font-family:Arial,sans-serif; }
        .loader { border:6px solid #f3f3f3; border-top:6px solid #2e2e80; border-radius:50%; width:60px; height:60px; animation:spin 1s linear infinite; }
        @keyframes spin { 0% { transform:rotate(0deg); } 100% { transform:rotate(360deg); } }
        .text { margin-top:20px; font-size:18px; }
    </style>
</head>
<body>
    <div class="loader"></div>
    <div class="text">Processing your payment... Please wait</div>
</body>
</html>

<?php
// --------------------
//  PROCESS PAYMENT
// --------------------
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $easebuzz_payment_id = $_POST['easepayid'] ?? '';
    $txnid = $_POST['txnid'] ?? '';
    $status = $_POST['status'] ?? '';

    if (!$txnid) {
        echo "<script>setTimeout(()=>{ window.location.href='http://localhost:5173/fail'; },2000);</script>";
        exit;
    }

    $order_status = ($status === 'success') ? 'paid' : 'failed';
    $payment_status = ($status === 'success') ? 'success' : 'failed';

    // Update payments
    $update_payment = $conn->prepare("UPDATE payments SET status=?, easebuzz_payment_id=? WHERE txn_id=?");
    $update_payment->bind_param("sss", $payment_status, $easebuzz_payment_id, $txnid);
    $update_payment->execute();

    // Update orders
    $update_order = $conn->prepare("UPDATE orders SET status=? WHERE id=(SELECT order_id FROM payments WHERE txn_id=?)");
    $update_order->bind_param("ss", $order_status, $txnid);
    $update_order->execute();

    if ($payment_status === 'success') {
        // Fetch order details
        $mailQuery = $conn->prepare("
            SELECT payments.amount, orders.name, orders.email, plains_category.name AS category_name
            FROM payments
            LEFT JOIN orders ON orders.id = payments.order_id
            LEFT JOIN plains ON plains.id = orders.plan_id
            LEFT JOIN plains_category ON plains_category.id = plains.plains_category_id
            WHERE payments.txn_id=?
        ");
        $mailQuery->bind_param("s", $txnid);
        $mailQuery->execute();
        $result = $mailQuery->get_result();
        $mailData = $result->fetch_assoc();

        if (!empty($mailData['email'])) {
            $invoicePath = $_SERVER['DOCUMENT_ROOT'] . "/invoices/invoice_$txnid.pdf";
            $mail = new PHPMailer(true);
            $firstMail = $secondMail = false;

            try {
                // SMTP setup
                $mail->isSMTP();
                $mail->Host       = 'smtp.gmail.com';
                $mail->SMTPAuth   = true;
                $mail->Username   = 'no-reply@edtechinnovate.com'; // Update with your actual email
                $mail->Password   = 'your_app_password_here'; // Use App Password, not regular password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port       = 587;
                $mail->setFrom('no-reply@edtechinnovate.com', 'EdTech Innovate Pvt. Ltd');
                $mail->isHTML(true);

                // ----------------------
                // FIRST EMAIL
                // ----------------------
                $mail->addAddress($mailData['email'], $mailData['name']);
                $mail->Subject = 'Payment Successful';
                $mail->Body = "
                <table width='100%' cellpadding='0' cellspacing='0' border='0' 
                       style='background: radial-gradient(circle, rgba(46,46,128,1) 0%, rgba(18,18,18,1) 99%); height:600px;'>
                    <tr>
                        <td align='center' valign='middle'>
                            <table style='background:#fff; border-radius:8px; width:90%; max-width:600px;' cellpadding='0' cellspacing='0' border='0'>
                                <tr>
                                    <td style='text-align:center; padding:20px;'>
                                        <img src='https://edtechinnovate.com/images/logo.png' alt='EdTech Logo' style='width:180px;' />
                                    </td>
                                </tr>
                                <tr>
                                    <td style='padding:30px; color:#000; line-height:1.6; font-family:Arial,sans-serif;'>
                                        <p><strong>Hello {$mailData['name']},</strong></p>
                                        <p>We have received <strong>Rs {$mailData['amount']}</strong> for your subscription to the <strong>{$mailData['category_name']}</strong> plan of <b>Edtech Innovate CRM</b>.</p>
                                        <p>Thank you for choosing us!</p>
                                        <p>Best Regards,<br><strong>Edtech Innovate Team</strong></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style='background: radial-gradient(circle, rgba(46,46,128,1) 0%, rgba(18,18,18,1) 99%); color:#fff; text-align:center; padding:20px; font-size:14px;'>
                                        Need help? Contact us at <a href='mailto:support@edtechinnovate.com' style='color:#fff; text-decoration:underline;'>support@edtechinnovate.com</a><br>
                                        &copy; 2025 EdTech Innovate. All rights reserved.
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>";

                // Check if invoice file exists before attaching
                // if (file_exists($invoicePath)) {
                    $mail->addAttachment($invoicePath, "Invoice_$txnid.pdf");
                // }

                if ($mail->send()) {
                    $firstMail = true;
                } else {
                    error_log("First email failed to send: " . $mail->ErrorInfo);
                }

                $mail->clearAddresses();
                $mail->clearAttachments();

                // ----------------------
                // SECOND EMAIL
                // ----------------------
                $mail->addAddress($mailData['email'], $mailData['name']);
                $mail->Subject = 'Your Subscription Details';
                $mail->Body = "
                <table width='100%' cellpadding='0' cellspacing='0' border='0' 
                       style='background: radial-gradient(circle, rgba(46,46,128,1) 0%, rgba(18,18,18,1) 99%); height:600px;'>
                    <tr>
                        <td align='center' valign='middle'>
                            <table style='background:#fff; border-radius:8px; width:90%; max-width:600px;' cellpadding='0' cellspacing='0' border='0'>
                                <tr>
                                    <td style='text-align:center; padding:20px;'>
                                        <img src='https://edtechinnovate.com/images/logo.png' alt='EdTech Logo' style='width:180px;' />
                                    </td>
                                </tr>
                                <tr>
                                    <td style='padding:30px; color:#000; line-height:1.6; font-family:Arial,sans-serif;'>
                                        <p><strong>Hello {$mailData['name']},</strong></p>
                                        <p>Thank you for choosing our services. You have successfully subscribed to the <strong>{$mailData['category_name']}</strong> CRM Plan from <b>EdTech Innovate</b>.</p>
                                        <p>Your account credentials will be shared within <strong>24 hours</strong> on your registered email address.</p>
                                        <p>If you have questions, contact us at <a href='mailto:support@edtechinnovate.com'>support@edtechinnovate.com</a>.</p>
                                        <p>Best Regards,<br><strong>Edtech Innovate Team</strong></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style='background: radial-gradient(circle, rgba(46,46,128,1) 0%, rgba(18,18,18,1) 99%); color:#fff; text-align:center; padding:20px; font-size:14px;'>
                                        Need help? Contact us at <a href='mailto:support@edtechinnovate.com' style='color:#fff; text-decoration:underline;'>support@edtechinnovate.com</a><br>
                                        &copy; 2025 EdTech Innovate. All rights reserved.
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>";

                if ($mail->send()) {
                    $secondMail = true;
                } else {
                    error_log("Second email failed to send: " . $mail->ErrorInfo);
                }

                // ----------------------
                // REDIRECT BASED ON EMAIL STATUS
                // ----------------------
                if ($firstMail && $secondMail) {
                    echo "<script>setTimeout(()=>{ window.location.href='http://localhost:5173/success'; },2000);</script>";
                } else {
                    error_log("Email sending failed: First - $firstMail, Second - $secondMail");
                    // Still redirect to success as payment was successful
                    echo "<script>setTimeout(()=>{ window.location.href='http://localhost:5173/success'; },2000);</script>";
                }

            } catch (Exception $e) {
                error_log('Mailer Error: '.$mail->ErrorInfo);
                // Still redirect to success as payment was successful
                echo "<script>setTimeout(()=>{ window.location.href='http://localhost:5173/success'; },2000);</script>";
            }

            exit;
        }

        // If no email, still redirect to success
        echo "<script>setTimeout(()=>{ window.location.href='http://localhost:5173/success'; },2000);</script>";
        exit;
    }

    // If payment failed
    echo "<script>setTimeout(()=>{ window.location.href='http://localhost:5173/fail'; },2000);</script>";
    exit;

} else {
    // Invalid request
    echo "<script>setTimeout(()=>{ window.location.href='http://localhost:5173/fail'; },2000);</script>";
    exit;
}
?>