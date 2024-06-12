<?php
echo '<table cellpadding="0" style="width:100%;">
        <tbody>
           <tr style="width:100%;clear:both">
              <td style="width:70%;display:block;clear:both">
                 <table width="70%" border="0" align="center" cellpadding="0" cellspacing="0" style="margin-top:1.875rem;margin-bottom:1.875rem;background-clip:padding-box;border-collapse:collapse;border-color:#dddddd;border-radius:0 0 .1875rem .1875rem;border-style:solid solid none;border-width:0 .0625rem .0625rem">
        <tbody>
           <tr>
              <td height="3" bgcolor="#23588e"></td>
           </tr>
           <tr style="height:6.25rem">
              <td align="center" bgcolor="#ffffff" height="30"><img src ="./gifa-art-college-logo-1.png"
              ">
              </td>
           </tr>
           <tr>
              <td bgcolor="#F7F9F9">
                 <table style="width:100%;clear:both" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tbody>
                       <tr>
                          <td height=".125rem;"></td>
                       </tr>
                       <tr>
                          <td height=".125rem;"></td>
                       </tr>
                       <tr>
                          <td>
                             <table rules="all" style="border-color:#666;" cellpadding="12;" width="100%;">
                             <tr>
                             <td style="color:#101010;font-size:16px;"><strong>Order id:</strong> </td>
                             <td style="color:#101010;font-size:16px;"> GIFA2024-' . $number .'</td>
                          </tr>
                             <tr>
                             <td style="color:#101010;font-size:1rem;"><strong>Name:</strong> </td>
                             <td style="color:#101010;font-size:1rem;">' . $side_name . '</td>
                          </tr>
                          <tr>
                          <td style="color:#101010;font-size:1rem;"><strong>E-mail:</strong> </td>
                          <td style="color:#101010;font-size:1rem;">' . $side_cemail . '</td>
                       </tr>
                       <tr>
                       <td style="color:#101010;font-size:1rem;"><strong>Mobile:</strong> </td>
                       <td style="color:#101010;font-size:1rem;"><a href="https://wa.me/'.$side_contact.'?text=Hi!+Thanks+for+contact+us. ">' . $side_contact . '</a></td>
                    </tr>
                    <tr> 
                    <td style="color:#101010;font-size:1rem;"><strong>Subject:</strong> </td>
                    <td style="color:#101010;font-size:1rem;">' . $sub . '</td>
                 </tr>
                    <tr> 
                          <td style="color:#101010;font-size:1rem;"><strong>Message:</strong> </td>
                          <td style="color:#101010;font-size:1rem;">' . $msg . '</td>
                       </tr>

                    </tbody>
                 </table>
                 <br>
              </td>
           </tr>
           <tr>
              <td align="center" bgcolor="#23588e" height="50"><font face="Segoe UI,Trebuchet MS,Arial, Helvetica, sans-serif" color="#fff" style="font-size:.8125rem"> Copyright by <b>Shoolin Logistics request</b> All rights reserved. </font></td>
           </tr>
        </tbody>
     </table>';
