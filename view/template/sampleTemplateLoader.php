<?php
createXML();
function createXML(){
$xml = simplexml_load_file("receiptTemplate.xml");
$prefix = "<![CDATA[";

$prods["prodNum"] = "1";
$prods["prodDesk"] = "Samsung";
$prods["prodQty"] = "2";
$prods["prodUnit"] = "PAC";
$prods["prodRate"] = "20";
$prods["prodAmount"] = "40";

$productList[] = $prods;

$products = "<tr>
                    <th>1</th>
                    <th>Desc</th>
                    <th>marks</th>
                    <th>Quantity</th>
                    <th>Unit</th>
                    <th>Rate</th>
                    <th>Amount</th>
                </tr>";
foreach($productList as $prod ){
            $row =' <tr>
                    <th>$prod["number"]</th>
                    <th>$prod["prodDesk"]</th>
                    <th>marks</th>
                    <th>$prod["prodQty"]</th>
                    <th>$prod["prodUnit"]</th>
                    <th>$prod["prodRate"]</th>
                    <th>$prod["prodAmount"]</th>
                </tr>';
            $products .=$row;
}
$suffix = "]]>";
$header = '<![CDATA['
        . '<div data-role="popup" id="popupParis" data-overlay-theme="b" data-theme="b" data-corners="false">
    <a href="#" data-rel="back" class="ui-btn ui-corner-all ui-shadow ui-btn-a ui-icon-delete ui-btn-icon-notext ui-btn-right">Close</a>
    <link rel="stylesheet" href="../../css/Receipt.css" />
    <table id="receiptTable" style="border: 1px solid #000; width: 900px">
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
            Invoice NO : <input type="text">
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
    <table id="receiptTable" style="border: 1px solid #000; width: 800px">'
        . ']]';
$footer = '<![CDATA[
        <tr><td colspan="7"><hr/></td></tr>
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
        <center><u><b>Terms &amp; Conditions</b></u><br/></center>
        <ul>
            <li>18 % interest  will be charged on all invoices not paid within 30 days from the  date of invoice</li>
            <li>Goods once sold will not be taken back or exchanged.</li>
            <li>Our responsibility ceases soon after the goods leave from our premises.</li>
        </ul>
        </td>
        <td style="text-align: right">
            <b>For OMM MAA TRADERS</b><br/>
            <p>&#160;</p><p>&#160;</p><p>&#160;</p>
            <b>Authorised Signatory</b>
        </td>
        </tr>
    </table>
</div>
            ]]>';
$xml->addChild("tag");
$xml->addChild("header", $header);
$xml->addChild("prefix", $prefix);
$xml->addChild("prefix", $products);
$xml->addChild("prefix", $suffix);
$xml->addChild("prefix", $footer);
$xml->saveXML("sample.xml");
}
