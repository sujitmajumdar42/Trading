<script src="../../js/ajax/logout.js"></script>
<div data-role="header" data-position="fixed">
    <div class="ui-btn-left">
        <a data-role="button" id="logout" data-inline="true">Logout</a>
        <a href="index.php?cont=Cont_User_Home" data-role="button" data-inline="true" data-icon="home" data-url="?cont=Cont_User_Home">Home</a>     
        <a data-role="button" data-inline="true" data-icon="refresh" onclick="javascript:window.location.reload()">Refresh</a>     
    </div>
    <div class="ui-btn-right">
        <a href="#popupInfo" data-rel="popup" data-role="button" data-inline="true" data-icon="grid" data-position="right">Today's Budg</a>     
        
    </div>
    <!--<a data-role="button" id="logout">Logout</a>
    <a href="#popupInfo" data-rel="popup" data-role="button" data-inline="true" data-icon="grid" data-position="right">Today's Budg</a>
    <a href="#popupInfo" data-rel="popup" data-role="button" data-inline="true" data-icon="grid" data-position="right">Today's Budg</a>
    -->
  <h1>OMM MAA TRADERS</h1>
</div>
<div data-role="popup" id="popupInfo" class="ui-content" data-theme="e" style="max-width:450px;">
<table style="width: 300px">
    <tr>
        <td><b>Date : </b></td>
        <td>6th July,2014</td>
    </tr>
    <tr>
        <td><b>Product Sold : </b></td>
        <td>112</td>
    </tr>
    <tr>
        <td><b>Trade In : </b></td>
        <td>20</td>
    </tr>
    <tr>
        <td><b>Trade Out : </b></td>
        <td>21</td>
    </tr>
</table>
</div>  