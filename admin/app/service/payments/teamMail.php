<?php
$mail->clearAddresses();
$mail->clearAttachments();
// send to your team
$mail->addAddress("crmservices@edtechinnovate.com", "EdTech Support Team");

$mail->Subject = "{$typeOfClients}- {$clientData['name']}";

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
                            <p><strong>New Client Alert 🚀</strong></p>
                            <p>{$teamMessage}</p>
                            <p><b>Name:</b> {$clientData['name']}</p>
                            <p><b>Email:</b> {$clientData['email']}</p>                            
                            <p><b>Phone No:</b> {$clientData['phone_no']}</p>
                            <p><b>Address:</b> {$clientData['address']}</p>
                            <p>Please verify and share credentials within <b>24 hours</b>.</p>
                            <p>— Automated Notification from <strong>EdTech Innovate</strong></p>
                        </td>
                    </tr>
                    <tr>
                        <td style='background: radial-gradient(circle, rgba(46,46,128,1) 0%, rgba(18,18,18,1) 99%); color:#fff; text-align:center; padding:20px; font-size:14px;'>
                            Internal Notification - No action required from client<br>
                            &copy; 2023 EdTech Innovate. All rights reserved.
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>";
$mail->send();
