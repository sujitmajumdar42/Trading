<?php

require_once('tcpdf_include.php');
require_once('./tcpdf.php');
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('TCPDF Example 048');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');
$pdf->AddPage();
$pdf->SetFont('helvetica', '', 8);
$html = '
    <link rel="stylesheet" href="../../css/Receipt.css" />
    <table id="receiptTable" style="border: 1px solid #000;">
        <tr>
            <td style="text-align: center;">
                <h3 style="margin-bottom: 0px">OMM MAA TRADERS</h3>
                <hr style="width: 60%;">
                MANGALASAHI,SAMANTARAPUR<br/>
                KHURDA,PIN-752055<br/>
                ODISHA
            </td>
            <td>
                <table>
                    <tr>
                        <td><input type="checkbox"></td>
                        <td><i>Original For</i> :</td>
                        <td>Buyer</td>
                    </tr>
                    <tr>
                        <td><input type="checkbox"></td>
                        <td><i>Duplicate For</i> :</td>
                        <td>Transporter</td>
                    </tr>
                    <tr>
                        <td><input type="checkbox"></td>
                        <td><i>Triplicate For</i> :</td>
                        <td>Office Filing</td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr><td colspan="2"><hr></td></tr>
        <tr style="height:2px;">
            <td style="text-align: center;height: 20px"><h2 style="height:0px;">TAX INVOICE</h2></td>
            <td>TIN No : 21392901248</td>
        </tr>
        <tr><td colspan="2"><hr></td></tr>
        <tr>
            <td rowspan="2" style="border-right: 1px solid #000">
        <u>Goods shipped to : </u><br/>
        <textarea>M/S.METTO SUPER MARKET PVT. LTD. Bhubaneswar</textarea><br/>
        VAT TIN No. : <input type="text"> 	<br/>	
        CST TIN No. : <input type="text">      <br/>
        </td>
        <td style="padding-left: 15px">
            Invoice NO : <input type="text"> &nbsp;
            Date : 8/4/2014
        </td>
        </tr>
        <tr>
            <td style="padding-left: 15px">
                <table id="shippingMode" >
                    <tr>
                        <td> Mode of dispatch : </td>
                        <td><input type="text"></td>
                    </tr>
                    <tr>
                        <td> L.R/R.R. No. : </td>
                        <td><input type="text"></td>
                    </tr>
                    <tr>
                        <td> Transporter Name : </td>
                        <td><input type="text"></td>
                    </tr>
                </table>
                <br/>
                Date : 8/4/2014
            </td>
        </tr>
        <tr><td colspan="2"><hr></td></tr>
        <tr>
            <td >
                <table  id="shippingMode">
                    <tr>
                        <td style="border-bottom: 1px solid #000" colspan="2">BIlling Address :</td>
                    </tr>
                    <tr>
                        <td>M/s.</td>
                        <td><textarea></textarea></td>
                    </tr>
                    <tr>
                        <td>VAT TIN No :</td>
                        <td><input type ="text"></td>
                    </tr>
                    <tr>
                        <td>CST TIN No :</td>
                        <td><input type ="text"></td>
                    </tr>
                </table>
            </td>
            <td style="border-left: 1px solid #000">
                P.O. No. :<input type="text"><br/>
                Remarks : <textarea></textarea>
            </td>
        </tr>
    </table>
    <table id="receiptTable" style="border: 1px solid #000; width: 800px">
        <tr>
            <th>Sl. No.</th>
            <th>Description Of Goods.</th>
            <th>marks</th>
            <th>Quantity</th>
            <th>Unit</th>
            <th>Rate</th>
            <th>Amount</th>
        </tr>';
$pdf->writeHTML($html, true, false, true, false, '');
$html = '<tr><td colspan="7"><hr/></td></tr>
        <tr><td colspan="7"><hr/></td></tr>
        <tr>
            <th colspan="3">Total</th>
            <th>23</th>
            <th colspan="3">400</th>
        </tr>
    </table >
    <table id="receipt_footer" style="border: 1px solid #000; width: 800px">
        <tr>
            <td style="border-bottom: 1px solid #000; border-right: 1px solid #000">Rupees Three Hundred Ninety-Nine and Paise Fifty Only </td>
            <td rowspan="2" style="border-bottom: 1px solid #000;">I/We hereby certify that my/our registration certificate under the Odisha Value Added Tax Act. 2002 is in force on the date on which the sale of  the goods specified in this " Tax Invoice"  is made by me/us and that the transaction of sales covered.</td>
        </tr>
        <tr>
            <td style="border-bottom: 1px solid #000;border-right: 1px solid #000">Certified that the particulars given above are true and correct and the amount represents the price actully charged from the buyer.</td>
        </tr>
        <tr>
            <td style="border-right: 1px solid #000">
        <center><u><b>Terms &AMP; Conditions</b></u><br/></center>
        <ul>
            <li>18 % interest  will be charged on all invoices not paid within 30 days from the  date of invoice</li>
            <li>Goods once sold will not be taken back or exchanged.</li>
            <li>Our responsibility ceases soon after the goods leave from our premises.</li>
        </ul>
        </td>
        <td style="text-align: right">
            <b>For OMM MAA TRADERS</b><br/>
            <p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>
            <b>Authorised Signatory</b>
        </td>
        </tr>
    </table>
</div>';
$pdf->writeHTML($html, true, false, true, false, '');
$pdf->Output('sample.pdf', 'I');
