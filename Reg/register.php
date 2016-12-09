<?php

header("Cache-Control: no-cache, must-revalidate");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
header("Pragma: no-cache");

session_start();

if (empty($_SESSION['num_items'])) 
{
	$_SESSION['num_items'] = 0;
}
// This page is designed to be called from FormDemo.php , so its logic is useless unless you are coming from that page	
// It demonstates how PHP retrieves Cookies.																			

// $_COOKIE is a language construct and is known as a "SUPERGLOBAL" , and is an array
// The "$" denotes a variable
// Variables do not need to be declared in PHP
// PHP automatically determines the data type

// Look for a cookie named FirstName, and put its value into the variable $strFirstName
$strEmailAddress 		= $_COOKIE['EmailAddress'];
$strPassword  			= $_COOKIE['Password'];
$strConfirmPassword 	= $_COOKIE['ConfirmPassword'];
$strFirstName 			= $_COOKIE['FirstName'];
$strLastName  			= $_COOKIE['LastName'];
$strHomePrefix 			= $_COOKIE['HomePrefix'];
$strHomeInfix  			= $_COOKIE['HomeInfix'];
$strHomeSuffix 			= $_COOKIE['HomeSuffix'];
$strWorkPrefix  		= $_COOKIE['WorkPrefix'];
$strWorkInfix 			= $_COOKIE['WorkInfix'];
$strWorkSuffix  		= $_COOKIE['WorkSuffix'];
$strAddressLine1 		= $_COOKIE['AddressLine1'];
$strAddressLine2  		= $_COOKIE['AddressLine2'];
$strCardNumber 			= $_COOKIE['CardNumber'];
$strCardholderName  	= $_COOKIE['CardholderName'];
$strLanguagePreference  = $_COOKIE['LanguagePreference'];
$strTitle 	  			= $_COOKIE['Title'];
$strProvince 	  		= $_COOKIE['Province'];
$strCreditCardType 	  	= $_COOKIE['CreditCardType'];
$strExpiryDateMonth 	= $_COOKIE['ExpiryDateMonth'];
$strExpiryDateYear 	  	= $_COOKIE['ExpiryDateYear'];

// isset() can be used to check if something exists before trying to use it, otherwise you'll invoke an error.
// Of course, ***good programming habits*** dictate you should always do this, even if you don't think
// you have to.  For example, I would implement the isset() shown below in the above code as well.

// To see what happens when things go wrong, change the above firstname to firstnameX and rerun FormDemo

// Recognize the conditional assignment?
// This is saying "If CPP exists, put its value into variable $strCPP.  Oterwise, put "no" into $strCPP"
$strEmailNotifications 	  		= isset($_COOKIE['emailnotifications'])		 	?		$_COOKIE['emailnotifications']  	 	 	: "no";

?>

<html>

  <head>
  
    <title>
	Customer Registration Form - Cookies
	</title>
	
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"> 
    <meta name="description"  		content="Use this form to submit cookies before you officially register for an account with us!" />
    <meta name="author"       		content="Andrew Murray, andrew.murray1992@gmail.com" />
	<meta name="designer"       	content="JE Marriott, joe.marriott@nbcc.ca" />
	


	
    <link href="../Include/ProductPage.css" type="text/css" rel="stylesheet" />
	<link rel="shortcut icon" href="../favicon.ico"> 
	
  
  	<script language="javascript" src="../Include/menuitems.js" type="text/javascript"></script>
	<script language="javascript" src="../Include/menu.js" type="text/javascript"></script>
	<script language="javascript" src="../Include/caricafoto.js" type="text/javascript"></script>

	</head>
  
  <body>

<!-- Header -->
	<div id="Header">
	
  		 <div id="HeaderLeft">     
            <a href="../index.php"> <img height="35" alt="Home Page" src="../Images/Nuke.jpg" width="135" border="0" align="left" /> </a>
		 </div>
		 
		 <div id="HeaderRight">         
            <a href="../Cart/index.php" class="header">
			<img src="../Images/shoppingcart.gif" height="18" width="127" border="0" align="ABSMIDDLE" />Contains <?php echo $_SESSION['num_items']; ?> Items</a>
		 </div>
		          
    </div>
    <!-- End of Header  -->
	
	
	<!-- Menu Bar -->
	<div id="MenuBar">
   
   		 <div id="MenuBarLeft">
            <a href="../Reg/SignIn.php" class="headerbar">You are not signed in</a>
		 </div>
        
		 <div id="MenuBarRight">
			<a href="../Reg/register.php" class="headerbar">| Account Settings</a> 
            <a href="../Reg/SignIn.php" class="headerbar">| My Account</a> 
			<a href="../Cart/index.php" class="headerbar">| My Cart</a> 
			<a href="../Cart/Checkout.php" class="headerbar">| Checkout</a> 
			<a class="headerbar" href="../ContactUs.php">| Contact Us</a>
		</div>
         
	</div>
    <!-- End of Menu Bar -->
	
	
	<!-- Search and "You Are Here" -->
	<div id="Search"> 
   
   		 <div id="SearchLeft">
            <form action="../search/index.php" method="get">
				  <input type="text" name="txtsearch" value="Search" size="15" />
				  <input type="image" src="../images/go.gif" border="0" width="26" height="21"  align="middle" /> 
			</form>
		 </div>
        
		 <div id="YouAreHereList">		 	
			 <form action="">
                  <select onchange="document.location=this.value" name="CatId">
                        <option value="register.php" selected="selected">Registration Cookies</option>
                  </select>
             </form>
		 </div>
		
		 <div id="YouAreHereLinks">		 
		 	
			<a href="../index.php">Home</a> &raquo;
		 </div>
				         
	</div>	
	<!-- End of Search and "You Are Here" -->
	
		
	<!-- Main -->
	<div id="Main">
	
		<div class="MainProduct">
			 <div class="MainProductText">

<!-- Description of FORM tag :: -->
<!-- NAME needs to be unique.  -->
<!-- ACTION tells form what page it goes to when form is submitted.  -->
<center>
<form name="myForm" action="../index.php">
<table border="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="500" bgcolor="#0033cc">
<tr>
	<td bgcolor="#666666"> 
		<table border="1" cellpadding="3" style="border-collapse: collapse" bordercolor="#cccccc" width="500" bgcolor="#ffffff" height="142">
		   
		   <tr>
		   	   <td width="500" height="18" colspan="2"> 
			   	   <p align="center"><font size="2" face="arial black" color="#666666">Registration Form - Controls Seeded From Cookies<br>( PHP Version )</font></p>
			   </td>
		   </tr>
		   
		   <tr>		   	   
		   	   <td width="250" height="38" colspan="2">
			   	   <font size="2" face="arial">Email Address<br></font>
				   <font face="arial">
				   		<input type="text" name="emailaddress" size="30" maxlength="20" value=<?php echo $strEmailAddress; ?>>
				   </font>
			   </td>
		  </tr>
		   <tr>		   	   
		   	   <td width="250" height="38">
			   	   <font size="2" face="arial">Password<br></font>
				   <font face="arial">
				   		<input type="password" name="password" size="30" maxlength="20" value=<?php echo $strPassword; ?>>
				   </font>
			   </td>
			   <td width="250" height="38">
			   	   <font size="2" face="arial">Confirm Password<br></font>
				   <font face="arial"> 
				   		 <input type="password" name="confirmpassword" size="30" maxlength="20" value=<?php echo $strConfirmPassword ?> >
				   </font>
			   </td>
		  </tr>
		   <tr>		   	   
		   	   <td width="250" height="38">
			   	   <font size="2" face="arial">First Name<br></font>
				   <font face="arial">
				   		<input type="text" name="firstname" size="30" maxlength="20" value=<?php echo $strFirstName; ?>>
				   </font>
			   </td>
			   <td width="250" height="38">
			   	   <font size="2" face="arial">Last Name<br></font>
				   <font face="arial"> 
				   		 <input type="text" name="lastname" size="30" maxlength="20" value=<?php echo $strLastName ?> >
				   </font>
			   </td>
		  </tr>
		  <tr>		   	   
		   	   <td width="250" height="38">
			   	   <font size="2" face="arial">Home Telephone<br></font>
				   <font face="arial">
				   		<input type="text" name="homeprefix" size="3" maxlength="3" value=<?php echo $strHomePrefix; ?>>
						<input type="text" name="homeinfix" size="3" maxlength="3" value=<?php echo $strHomeInfix; ?>>
						<input type="text" name="homesuffix" size="4" maxlength="4" value=<?php echo $strHomeSuffix; ?>>
				   </font>
			   </td>
			   <td width="250" height="38">
			   	   <font size="2" face="arial">Work Telephone<br></font>
				   <font face="arial"> 
				   		 <input type="text" name="workprefix" size="3" maxlength="3" value=<?php echo $strWorkPrefix ?> >
						 <input type="text" name="workinfix" size="3" maxlength="3" value=<?php echo $strWorkInfix ?> >
						 <input type="text" name="worksuffix" size="4" maxlength="4" value=<?php echo $strWorkSuffix ?> >
				   </font>
			   </td>
		  </tr>
		  <tr>		   	   
		   	   <td width="250" height="38">
			   	   <font size="2" face="arial">Address Line 1<br></font>
				   <font face="arial">
				   		<input type="text" name="addressline1" size="30" maxlength="20" value=<?php echo $strAddressLine1; ?>>
				   </font>
			   </td>
			   <td width="250" height="38">
			   	   <font size="2" face="arial">Address Line 2<br></font>
				   <font face="arial"> 
				   		 <input type="text" name="addressline2" size="30" maxlength="20" value=<?php echo $strAddressLine2 ?> >
				   </font>
			   </td>
		  </tr>
		  <tr>		   	   
		   	   <td width="250" height="38">
			   	   <font size="2" face="arial">Card Number<br></font>
				   <font face="arial">
				   		<input type="text" name="cardnumber" size="30" maxlength="20" value=<?php echo $strAddressLine1; ?>>
				   </font>
			   </td>
			   <td width="250" height="38">
			   	   <font size="2" face="arial">Cardholder Name<br></font>
				   <font face="arial"> 
				   		 <input type="text" name="cardholdername" size="30" maxlength="20" value=<?php echo $strAddressLine2 ?> >
				   </font>
			   </td>
		  </tr>
		  
		  <tr>
		  	  <td width="250" height="38">
			  	  <font size="2" face="arial">Language Preference<br></font>
				  <font face="arial">
				  		<input type="radio"  name="languagepreference" value="English" <?php echo ($strLanguagePreference=='English')?('CHECKED="CHECKED"'):('') ?> >
				  </font>
				  <font size="2" face="arial"> English&nbsp; </font>
				  <font face="arial"> 
				  		<input type="radio"  name="languagepreference" value="Francais" <?php echo ($strLanguagePreference=='Francais')?('CHECKED="CHECKED"'):('') ?> >
				  </font>
				  <font size="2" face="arial"> Francais&nbsp; </font>
				  <font face="arial">
				  		<input type="radio" name="languagepreference" value="Espanol" <?php  echo ($strLanguagePreference=='Espanol')?('CHECKED="CHECKED"'):('') ?> >
				  </font>
				  <font size="2" face="arial">Espanol</font>
			  </td>
			  <td width="250" height="38">
			  	  <font size="2" face="arial">Title<br></font>
				  <font face="arial"> 
				  		<select size="1" name="title"> 
							<?php 
								// I'll do this part a bit differently to demo some language constructs
								for ($i=0; $i<6; $i++) {
									echo "<OPTION";
									if ($strTitle==$i) 
										echo ' selected="yes"';
									echo ">";
									switch ($i) {
										case 0:
											echo "Mr.";
											break;
										case 1:
											echo "Mrs.";
											break;
										case 2:
											echo "Miss.";
											break;
										case 3:
											echo "Ms.";
											break;
										case 4:
											echo "Dr.";
											break;
										default:
											echo "I have no title";
											break;
										
									}
									echo "</OPTION>";
								}
							
							?>
						</select>
				  </font> 
			  </td>
		</tr>
		
		<tr>
		<td width="250" height="38">
			  	  <font size="2" face="arial">Province<br></font>
				  <font face="arial"> 
				  		<select size="1" name="province"> 
							<?php 
								// I'll do this part a bit differently to demo some language constructs
								for ($i=0; $i<14; $i++) {
									echo "<OPTION";
									if ($strProvince==$i) 
										echo ' selected="yes"';
									echo ">";
									switch ($i) {
										case 0:
											echo "Alberta";
											break;
										case 1:
											echo "British Columbia";
											break;
										case 2:
											echo "Manitoba";
											break;
										case 3:
											echo "New Brunswick";
											break;
										case 4:
											echo "Newfoundland & Labrador";
											break;
										case 5:
											echo "Northwest Territories";
											break;
										case 6:
											echo "Nova Scotia";
											break;
										case 7:
											echo "Nunavut";
											break;
										case 8:
											echo "Ontario";
											break;
										case 9:
											echo "Prince Edward Island";
											break;
										case 10:
											echo "Quebec";
											break;
										case 11:
											echo "Saskatchewan";
											break;
										case 12:
											echo "Yukon";
											break;
										default:
											echo "I do not live in Canada";
											break;
										
									}
									echo "</OPTION>";
								}
							
							?>
						</select>
				  </font> 
			  </td>
			  <td width="250" height="38">
			  	  <font size="2" face="arial">Credit Card Type<br></font>
				  <font face="arial"> 
				  		<select size="1" name="creditcardtype"> 
							<?php 
								// I'll do this part a bit differently to demo some language constructs
								for ($i=0; $i<4; $i++) {
									echo "<OPTION";
									if ($strCreditCardType==$i) 
										echo ' selected="yes"';
									echo ">";
									switch ($i) {
										case 0:
											echo "AMEX";
											break;
										case 1:
											echo "MC";
											break;
										case 2:
											echo "Visa";
											break;
										default:
											echo "I do not have a credit card";
											break;
										
									}
									echo "</OPTION>";
								}
							
							?>
						</select>
				  </font> 
			  </td>
			</tr>
			
			<tr>
				<td width="250" height="38">
			  	  <font size="2" face="arial">Expiry Date Month<br></font>
				  <font face="arial"> 
				  		<select size="1" name="expirydatemonth"> 
							<?php 
								// I'll do this part a bit differently to demo some language constructs
								for ($i=0; $i<13; $i++) {
									echo "<OPTION";
									if ($strExpiryDateMonth==$i) 
										echo ' selected="yes"';
									echo ">";
									switch ($i) {
										case 0:
											echo "January";
											break;
										case 1:
											echo "February";
											break;
										case 2:
											echo "March";
											break;
										case 3:
											echo "April";
											break;
										case 4:
											echo "May";
											break;
										case 5:
											echo "June";
											break;
										case 6:
											echo "July";
											break;
										case 7:
											echo "August";
											break;
										case 8:
											echo "September";
											break;
										case 9:
											echo "October";
											break;
										case 10:
											echo "November";
											break;
										case 11:
											echo "December";
											break;
										default:
											echo "I do not know what month my credit card expires";
											break;
										
									}
									echo "</OPTION>";
								}
							
							?>
						</select>
				  </font> 
			  </td>
			  <td width="250" height="38">
			  	  <font size="2" face="arial">Expiry Date Year<br></font>
				  <font face="arial"> 
				  		<select size="1" name="expirydateyear"> 
							<?php 
								// I'll do this part a bit differently to demo some language constructs
								for ($i=0; $i<12; $i++) {
									echo "<OPTION";
									if ($strExpiryDateYear==$i) 
										echo ' selected="yes"';
									echo ">";
									switch ($i) {
										case 0:
											echo "2007";
											break;
										case 1:
											echo "2008";
											break;
										case 2:
											echo "2009";
											break;
										case 3:
											echo "2010";
											break;
										case 4:
											echo "2011";
											break;
										case 5:
											echo "2012";
											break;
										case 6:
											echo "2013";
											break;
										case 7:
											echo "2014";
											break;
										case 8:
											echo "2015";
											break;
										case 9:
											echo "2016";
											break;
										case 10:
											echo "2017";
											break;
										default:
											echo "I do not know what year my credit card expires";
											break;
										
									}
									echo "</OPTION>";
								}
							
							?>
						</select>
				  </font> 
			  </td>
			</tr>
		
		<tr>
			<td width="500" height="36" colspan="2">
				<font size="2" face="arial">
				  &nbsp;Email Notifications ::<br>
				  <input type="checkbox" name="emailnotifications" value="emailnotifications" <?php if($strEmailNotifications=="yes") echo 'Checked="CHECKED"'; ?> > Email Notifications&nbsp;
				</font>
			</td>
	   </tr>
	   
	   <tr>
	   	   <td width="250" height="19">&nbsp;</td>
		   <td width="250" height="19">&nbsp;</td>
	  </tr>
	  
	  <tr>
	  	  <td width="250" height="1"><input type="submit" value="submit" name="button1"><br/><font size="2" face="arial"></font></td>
		  <td width="250" height="1"><input type="reset" value="reset" name="button2"></td>
	  </tr>
	  
	  </table>
	  </td>
</tr>
</table>
</form>
</center>

</div>
	    </div>
		<br />
		<?php include ('../Include/Footer.php'); ?>
					
	</div>
	<!-- End of Main -->
	
	
	
	<!-- Left Menu -->
	<div id="LeftMenu">	
		 <script language="javascript" type="text/javascript">create_menu('LeftMenu', LeftMenuLinks, LeftMenuProps);</script >	
	</div>
	<!-- End of Left Menu -->
	
	
	
	<!-- Left Ads -->
	
		<?php include ('../Include/LeftAds.php'); ?>
		
	<!-- End of Left Ads -->
	
	
  </body>
  
	
</html>

<?php		

			$db_server = "localhost";
			
			$db_user = "root";
			
			$db_passwd = "";
			
			$db_name = "andrewmurray";
			
			mysql_connect($db_server, $db_user, $db_passwd) 
				or die(mysql_error());
				
			mysql_select_db($db_name) 
				or die(mysql_error());
				
			// Build the SQL query string... MAKE SURE to select all the Products fields that are needed	
			$strSQL = "SELECT EmailAddress FROM customer ORDER BY EmailAddress";
			// Misspell one of the above fieldnames and see what error you get on your webpage.				
		
			// or  $strSQL = "SELECT * FROM Products WHERE Category = '$strCategory' ORDER BY ID";				
			// SELECT * is a bad lazy habit to get into.  If you have a large database with many fields,		
			// selecting all of them to save you typing impacts heavily on your server resources!				
			
				
			// For a better understanding of PHP string characteristics, see the StringsDemo.php page.
			
			

			// 3. Execute SQL to seed a "Products Record Set" variable										
			// As always, it is recommended to use relevent variable names.									
			$Prod_rs = mysql_query($strSQL)
				or die(mysql_error());
			
			// End Of "Retrieve Desired Record Set"
			
			if (isset($_POST['emailaddress']) && isset($_POST['password']) && isset($_POST['confirmpassword']) && isset($_POST['title']) 
			 && isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['homeprefix']) && isset($_POST['homeinfix']) 
			 && isset($_POST['homesuffix']) && isset($_POST['workprefix']) && isset($_POST['workinfix']) && isset($_POST['worksuffix']) 
			 && isset($_POST['addressline1']) && isset($_POST['addressline2']) && isset($_POST['province']) && isset($_POST['creditcardtype']) 
			 && isset($_POST['cardnumber']) && isset($_POST['expirydatemonth']) && isset($_POST['expirydateyear']) && isset($_POST['cardholdername']) 
			 && isset($_POST['languagepreference']) && isset($_POST['emailnotifications']))
			{	
				$strPassword = sha1($_POST['password']);
				$strConfirmPassword = sha1($_POST['confirmpassword']);
				
				while ($Prod_row = mysql_fetch_array($Prod_rs)) {
	  
					//    Obviously, if you know your previous logic does not retrieve multiple records, you would not need to loop!	
					//	  Keep that in mind for future exercises.																		
					
					if ($Prod_row["EmailAddress"] != $_POST['emailaddress'])
					{
					mysql_query("INSERT INTO customer (EmailAddress, Password, ConfirmPassword, Title, FirstName, LastName, HomePrefix, HomeInfix, HomeSuffix, 
								 WorkPrefix, WorkInfix, WorkSuffix, AddressLine1, AddressLine2, Province, CreditCardType, CardNumber, ExpiryDateMonth, ExpiryDateYear, 
								 CardholderName, LanguagePreference, EmailNotifications)
								 VALUES ('" . $strEmailAddress . "', '" . $strPassword . "', '" . $strConfirmPassword . "', '" . $strTitle . "', '"
											. $strFirstName . "', '" . $strLastName . "', '" . $strHomePrefix . "', '" . $strHomeInfix . "', '"
											. $strHomeSuffix . "', '" . $strWorkPrefix . "', '" . $strWorkInfix . "', '" . $strWorkSuffix . "', '"
											. $strAddressLine1 . "', '" . $strAddressLine2 . "', '" . $strProvince . "', '" . $strCreditCardType . "', '"
											. $strCardNumber . "', '" . $strExpiryDateMonth . "', '" . $strExpiryDateYear . "', '" . $strCardholderName . "', '"
											. $strLanguagePreference . "', '" . $strEmailNotifications . "')");
					
						echo '<script language="javascript">
					alert ( "The account has been added.");
					</script>';
					}
					else if ($Prod_row["EmailAddress"] == $_POST['emailaddress'])
					{
						echo '<script language="javascript">
					alert ( "There is another account in existence and the submitted information will not be stored to our database. Please try again.");
					</script>';
					}
				}
			}
?>