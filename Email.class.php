<?php
require_once('local.php');
//require_once('library/mailer/SendGrid_loader.php');
//$sendgrid = new SendGrid(EMAILER_USERNAME, EMAILER_PASSWORD);
//$mail = new SendGrid\Mail();
      function mailHeader(){
        return '
        <table style="font-family: verdana; border:1px solid #ccc; padding:8px; margin:8px;" align="center">
        <tr>
        <td><img src="https://targetcgwarehouse.com/a/app/img/mailer-header.jpg" alt="Mailer Header" ></td>
        </tr>
        <tr>
        <tr>
        	<td style="padding:20px;">
        ';
      }
      function mailFooter(){
        return '
        </td>
        </tr>
        </tr>
        <tr>
        <td bgcolor="#7A7A7A" style="color:#fff; text-align:center;padding:10px; font-size:10px; ">
        Any immediate questions, please email – <a style="color:#fff" href="mailto:TargetCGI-Airlock@target.com" style="color:#fff">TargetCGI-Airlock@target.com</a>
        </td>
        </tr>
        </table>
        ';

      }
?>
