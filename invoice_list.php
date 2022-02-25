<?php 
session_start();
include('inc/header.php');
include 'Invoice.php';
$invoice = new Invoice();
$invoice->checkLoggedIn();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Your Invoice</title>
  <script src="js/invoice.js"></script>
  <link href="css/style.css" rel="stylesheet">
  <style>
    .atas {
      margin-top: 50px;
    }
  </style>

<script>
function copyToClipboard(text) {
var inputc = document.body.appendChild(document.createElement("input"));
inputc.value = window.location.href;
inputc.focus();
inputc.select();
document.execCommand('copy');
inputc.parentNode.removeChild(inputc);
alert("URL Copied.");
}
</script>
</head>
<body style="background-image: url(http://mmopilot.oesman.id/wp-content/themes/gamehoak/images/codezeel/body-bg.jpg);">
<?php include('inc/container.php');?>
	<div class="container">		
	  <h2 class="title">Your Invoice</h2>
	  <!-- <?php include('menu.php');?>			   -->
      <table id="data-table" class="table table-condensed table-striped atas">
        <thead>
          <tr>
            <th>Invoice No.</th>
            <th>Create Date</th>
            <th>Customer Name</th>
            <th>Invoice Total</th>
            <th>Download</th>
            <th>Share</th>
            <th>Join Discord</th>
          </tr>
        </thead>
        <?php		
		$invoiceList = $invoice->getInvoiceList();
        foreach($invoiceList as $invoiceDetails){
			$invoiceDate = date("d/M/Y, H:i:s", strtotime($invoiceDetails["order_date"]));
            echo '
              <tr>
                <td>'.$invoiceDetails["order_id"].'</td>
                <td>'.$invoiceDate.'</td>
                <td>'.$invoiceDetails["order_receiver_name"].'</td>
                <td>'.$invoiceDetails["order_total_after_tax"].'</td>
                <td><a href="./Invoice-684.pdf" download="Invoice-684"><button>Download PDF</button></a></td>
                <td><button onclick="copyToClipboard()">Copy Link</button></td>
                <td><a href="https://discord.com/users/469993439732432916" target="_blank">Join Now <span class="glyphicon glyphicon-discord"></span></a></td>
              </tr>
            ';
        }       
        ?>  
      </table>	

      <h2>Preview Checkout akan muncul disini</h2>
</div>	
<?php include('inc/footer.php');?>
</body>
</html>
<!-- <title>Your Invoice</title>
<script src="js/invoice.js"></script>
<link href="css/style.css" rel="stylesheet">
<?php include('inc/container.php');?>
	<div class="container">		
	  <h2 class="title">Your Invoice</h2>
	  <?php include('menu.php');?>			  
      <table id="data-table" class="table table-condensed table-striped">
        <thead>
          <tr>
            <th>Invoice No.</th>
            <th>Create Date</th>
            <th>Customer Name</th>
            <th>Invoice Total</th>
            <th>Print</th>
            <th>Edit</th>
            <th>Delete</th>
          </tr>
        </thead>
        <?php		
		$invoiceList = $invoice->getInvoiceList();
        foreach($invoiceList as $invoiceDetails){
			$invoiceDate = date("d/M/Y, H:i:s", strtotime($invoiceDetails["order_date"]));
            echo '
              <tr>
                <td>'.$invoiceDetails["order_id"].'</td>
                <td>'.$invoiceDate.'</td>
                <td>'.$invoiceDetails["order_receiver_name"].'</td>
                <td>'.$invoiceDetails["order_total_after_tax"].'</td>
                // 
                <td><a href="print_invoice.php?invoice_id='.$invoiceDetails["order_id"].'" title="Print Invoice"><span class="glyphicon glyphicon-print"></span></a></td>
                <td><a href="edit_invoice.php?update_id='.$invoiceDetails["order_id"].'"  title="Edit Invoice"><span class="glyphicon glyphicon-edit"></span></a></td>
                <td><a href="#" id="'.$invoiceDetails["order_id"].'" class="deleteInvoice"  title="Delete Invoice"><span class="glyphicon glyphicon-remove"></span></a></td>
              </tr>
            ';
        }       
        ?>
      </table>	
</div>	
<?php include('inc/footer.php');?> -->