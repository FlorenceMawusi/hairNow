<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Your Cart</title>
<link rel="stylesheet" href="style/style.css" type="text/css" media="screen" />
</head>
<body>
<div align="center" id="mainWrapper">
  <?php include_once("template_header.php");?>
  <div id="pageContent">
    <div style="margin:24px; text-align:left;">
	
    <br />
    <table width="100%" border="1" cellspacing="0" cellpadding="6">
      <tr>
        <td width="18%" bgcolor="#C5DFFA"><strong>Product name</strong></td>
        <td width="45%" bgcolor="#C5DFFA"><strong>Product Description</strong></td>
        <td width="10%" bgcolor="#C5DFFA"><strong>Unit Price</strong></td>
        <td width="9%" bgcolor="#C5DFFA"><strong>Quantity</strong></td>
        <td width="9%" bgcolor="#C5DFFA"><strong>Total</strong></td>
        <td width="9%" bgcolor="#C5DFFA"><strong>Delete</strong></td>
      </tr>
     <?php echo $cartOutput; ?>
    <tr>
        <td>&nb;</td>
        <td>&nb;</td>
        <td>&nb;</td>
        <td>&nb;</td>
        <td>&nb;</td>
        <td>&nb;</td>
      </tr>
    </table>
    <?php echo $cartTotal; ?>
    <br />
<br />
<?php //echo $pp_checkout_btn; ?>
    <br />
    <br />
    <a href="../action/managecart.php?cmd=emptycart">Click Here to Empty Your Shopping Cart</a>
    </div>
   <br />
  </div>
  
</div>
</body>
</html>