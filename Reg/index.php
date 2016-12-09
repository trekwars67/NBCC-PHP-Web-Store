<?php
session_start();

if (empty($_SESSION['num_items'])) 
{
	$_SESSION['num_items'] = 0;
}
?>

<html>

  <head>
  
    <title>
      Customer Registration Form : Future Bound Enterprises
    </title>
	
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"> 
    <meta name="description"  		content="Use this form to register for an account with us!" />
    <meta name="author"       		content="Andrew Murray, andrew.murray1992@gmail.com" />
	<meta name="designer"       	content="JE Marriott, joe.marriott@nbcc.ca" />
	


	
    <link href="../Include/ProductPage.css" type="text/css" rel="stylesheet" />
	<link rel="shortcut icon" href="../favicon.ico"> 
	
  
  	<script language="javascript" src="../Include/menuitems.js" type="text/javascript"></script>
	<script language="javascript" src="../Include/menu.js" type="text/javascript"></script>
	<script language="javascript" src="../Include/caricafoto.js" type="text/javascript"></script>
	
	<script language="javascript">

	function EditFields(dFn) {
	// Incoming parameters :	dFn represents document."Formname"
	// Responsibilities :		Performs edits checks as required against all fields in form.
	//							Displays error messages for all fields failing tests, sets focus to first field in error.
	// Return type :			TRUE if all edits passed, FALSE otherwise.
	
	
	// Note! Making a mistake/typo in any fieldname will result in this function returning true! 
	// MAKE SURE your fieldnames are spelled correctly AND match the control names on your form!
			
			// We start optimistically
			var success=true;
			var message="";
			var firstError="";
			dFn.emailaddress.className = "inputok";
			dFn.password.className = "inputok";
			dFn.confirmpassword.className = "inputok";
			dFn.firstname.className = "inputok";
			dFn.lastname.className = "inputok";
			dFn.homeprefix.className = "inputok";
			dFn.homeinfix.className = "inputok";
			dFn.homesuffix.className = "inputok";
			dFn.workprefix.className = "inputok";
			dFn.workinfix.className = "inputok";
			dFn.worksuffix.className = "inputok";
			dFn.addressline1.className = "inputok";
			dFn.addressline2.className = "inputok";
			dFn.cardnumber.className = "inputok";
			dFn.cardholdername.className = "inputok";
			
			if (dFn.emailaddress.value == "") {
				// Remember the first field that trips an edit so I can set focus later 
				if (firstError == "") firstError = dFn.emailaddress;
				// Highlight field in error
				dFn.emailaddress.className = "inputreqd";
				// Add to the message list 
				message+="\n    • Email address";
			}
			if (dFn.password.value == "") {
				// Remember the first field that trips an edit so I can set focus later 
				if (firstError == "") firstError = dFn.password;
				// Highlight field in error
				dFn.password.className = "inputreqd";
				// Add to the message list 
				message+="\n    • Password";
			}
			if (dFn.confirmpassword.value == "" || dFn.confirmpassword.value != dFn.password.value) {
				// Remember the first field that trips an edit so I can set focus later 
				if (firstError == "") firstError = dFn.confirmpassword;
				// Highlight field in error
				dFn.confirmpassword.className = "inputreqd";
				// Add to the message list 
				message+="\n    • Confirm password";
			}
			if (dFn.firstname.value == "") {
				// Remember the first field that trips an edit so I can set focus later 
				if (firstError == "") firstError = dFn.firstname;
				// Highlight field in error
				dFn.firstname.className = "inputreqd";
				// Add to the message list 
				message+="\n    • First name";
			}  
			if (dFn.lastname.value == "") {
				// Remember the first field that trips an edit so I can set focus later 
				if (firstError == "") firstError = dFn.lastname;
				// Highlight field in error
				dFn.lastname.className = "inputreqd";
				// Add to the message list 
				message+="\n    • Last name";
			}
			if (dFn.homeprefix.value == "") {
				// Remember the first field that trips an edit so I can set focus later 
				if (firstError == "") firstError = dFn.homeprefix;
				// Highlight field in error
				dFn.homeprefix.className = "inputreqd";
				// Add to the message list 
				message+="\n    • Home prefix";
			}
			if (dFn.homeinfix.value == "") {
				// Remember the first field that trips an edit so I can set focus later 
				if (firstError == "") firstError = dFn.homeinfix;
				// Highlight field in error
				dFn.homeinfix.className = "inputreqd";
				// Add to the message list 
				message+="\n    • Home infix";
			}
			if (dFn.homesuffix.value == "") {
				// Remember the first field that trips an edit so I can set focus later 
				if (firstError == "") firstError = dFn.homesuffix;
				// Highlight field in error
				dFn.homesuffix.className = "inputreqd";
				// Add to the message list 
				message+="\n    • Home suffix";
			}
			if (dFn.workprefix.value == "") {
				// Remember the first field that trips an edit so I can set focus later 
				if (firstError == "") firstError = dFn.workprefix;
				// Highlight field in error
				dFn.workprefix.className = "inputreqd";
				// Add to the message list 
				message+="\n    • Work prefix";
			}
			if (dFn.workinfix.value == "") {
				// Remember the first field that trips an edit so I can set focus later 
				if (firstError == "") firstError = dFn.workinfix;
				// Highlight field in error
				dFn.workinfix.className = "inputreqd";
				// Add to the message list 
				message+="\n    • Work infix";
			}
			if (dFn.worksuffix.value == "") {
				// Remember the first field that trips an edit so I can set focus later 
				if (firstError == "") firstError = dFn.worksuffix;
				// Highlight field in error
				dFn.worksuffix.className = "inputreqd";
				// Add to the message list 
				message+="\n    • Work suffix";
			}
			if (dFn.addressline1.value == "") {
				// Remember the first field that trips an edit so I can set focus later 
				if (firstError == "") firstError = dFn.addressline1;
				// Highlight field in error
				dFn.addressline1.className = "inputreqd";
				// Add to the message list 
				message+="\n    • Address line 1";
			}
			if (dFn.addressline2.value == "") {
				// Remember the first field that trips an edit so I can set focus later 
				if (firstError == "") firstError = dFn.addressline2;
				// Highlight field in error
				dFn.addressline2.className = "inputreqd";
				// Add to the message list 
				message+="\n    • Address line 2";
			}
			if (dFn.cardnumber.value == "") {
				// Remember the first field that trips an edit so I can set focus later 
				if (firstError == "") firstError = dFn.cardnumber;
				// Highlight field in error
				dFn.cardnumber.className = "inputreqd";
				// Add to the message list 
				message+="\n    • Card number";
			}
			if (dFn.cardholdername.value == "") {
				// Remember the first field that trips an edit so I can set focus later 
				if (firstError == "") firstError = dFn.cardholdername;
				// Highlight field in error
				dFn.cardholdername.className = "inputreqd";
				// Add to the message list 
				message+="\n    • Cardholder name";
			}
			// etc.
			
			// If any errors have been encountered, display the message that was built,					
			// and set the focus to the first field in error.  Don't you hate screen designs that don't	
			// set focus for you?  It's easy for the programmer to save you that extra click.			
			// Start looking for it, and next time you see it, think "lazy programmer!"					
			if (message != "" ) {
				alert("Please enter\n" + message);
				firstError.focus();
				success=false;			
			}
			
			return success;
	}

	function WriteCookies(dFn) {
	// Incoming parameters :	dFn represents document."Formname"
	// Responsibilities :		Calls EditFields() to edit check all user provided data in form.
	//							Writes cookies for all data only if all edits passed.
	// Return type :			TRUE if all edits passed, FALSE otherwise.
	
	
	// Note! Making a mistake/typo in any fieldname will result in this function returning true! 
	// MAKE SURE your fieldnames are spelled correctly AND match the control names on your form!
			
			// Perform edit checks, catch result
			var success=EditFields(dFn);	
			
			// Only write cookies if all edits passed 
			if (success) {
			
				var strExpDate;
				// Make sure this date is in the future
				strExpDate = " path=/; expires=Tuesday, 31-Dec-2013 12:00:00 GMT;";
			
				// Text boxes
				document.cookie = "EmailAddress=" + dFn.emailaddress.value + ";" + strExpDate;		
				document.cookie = "Password=" + dFn.password.value + ";" + strExpDate;
				document.cookie = "ConfirmPassword=" + dFn.confirmpassword.value + ";" + strExpDate;		
				document.cookie = "FirstName=" + dFn.firstname.value + ";" + strExpDate;		
				document.cookie = "LastName=" + dFn.lastname.value + ";" + strExpDate;
				document.cookie = "HomePrefix=" + dFn.homeprefix.value + ";" + strExpDate;		
				document.cookie = "HomeInfix=" + dFn.homeinfix.value + ";" + strExpDate;
				document.cookie = "HomeSuffix=" + dFn.homesuffix.value + ";" + strExpDate;		
				document.cookie = "WorkPrefix=" + dFn.workprefix.value + ";" + strExpDate;
				document.cookie = "WorkInfix=" + dFn.workinfix.value + ";" + strExpDate;		
				document.cookie = "WorkSuffix=" + dFn.worksuffix.value + ";" + strExpDate;
				document.cookie = "AddressLine1=" + dFn.addressline1.value + ";" + strExpDate;		
				document.cookie = "AddressLine2=" + dFn.addressline2.value + ";" + strExpDate;
				document.cookie = "CardNumber=" + dFn.cardnumber.value + ";" + strExpDate;		
				document.cookie = "CardholderName=" + dFn.cardholdername.value + ";" + strExpDate;
				
				// Sample debug code
				// Want to see what's being written as a cookie?  Try activating the following line...
				// alert ( "LastName=" + dFn.lastname.value + ";" + strExpDate );
				
				// Radio button group				
				if (dFn.languagepreference[0].checked)document.cookie = "LanguagePreference=" + dFn.languagepreference[0].value  + ";" + strExpDate;
				if (dFn.languagepreference[1].checked)document.cookie = "LanguagePreference=" + dFn.languagepreference[1].value  + ";" + strExpDate;
				if (dFn.languagepreference[2].checked)document.cookie = "LanguagePreference=" + dFn.languagepreference[2].value  + ";" + strExpDate;
				// Obviously, you could invoke loop logic above if you had many buttons
				
				
				// If you want the index (ie 0,1,2,etc) of what was selected in the dropdown...
				document.cookie = "Title=" + dFn.title.selectedIndex + ";" + strExpDate;
				document.cookie = "Province=" + dFn.province.selectedIndex + ";" + strExpDate;
				document.cookie = "CreditCardType=" + dFn.creditcardtype.selectedIndex + ";" + strExpDate;
				document.cookie = "ExpiryDateMonth=" + dFn.expirydatemonth.selectedIndex + ";" + strExpDate;
				document.cookie = "ExpiryDateYear=" + dFn.expirydateyear.selectedIndex + ";" + strExpDate;
				
				// Or, if you prefer the actual text (ie "Whatever I'm Passing") of what was selected in the dropdown...
				var which1=dFn.title.selectedIndex;
				document.cookie = "Title=" + dFn.title[which1].text + ";" + strExpDate;
				var which2=dFn.province.selectedIndex;
				document.cookie = "Province=" + dFn.province[which2].text + ";" + strExpDate;
				var which3=dFn.creditcardtype.selectedIndex;
				document.cookie = "CreditCardType=" + dFn.creditcardtype[which3].text + ";" + strExpDate;
				var which4=dFn.expirydatemonth.selectedIndex;
				document.cookie = "ExpiryDateMonth=" + dFn.expirydatemonth[which4].text + ";" + strExpDate;
				var which5=dFn.expirydateyear.selectedIndex;
				document.cookie = "ExpiryDateYear=" + dFn.expirydateyear[which5].text + ";" + strExpDate;
				
				// Or, if you prefer assigned values (ie "WTVR") of what was selected in the dropdown...
				document.cookie = "Title=" + dFn.title.value + ";" + strExpDate;
				document.cookie = "Province=" + dFn.province.value + ";" + strExpDate;
				document.cookie = "CreditCardType=" + dFn.creditcardtype.value + ";" + strExpDate;
				document.cookie = "ExpiryDateMonth=" + dFn.expirydatemonth.value + ";" + strExpDate;
				document.cookie = "ExpiryDateYear=" + dFn.expirydateyear.value + ";" + strExpDate;
				
				// Recognize the conditional assignment to handle checkboxes?
				document.cookie = dFn.emailnotifications.value + ((dFn.emailnotifications.checked)? "=yes;":"=no;")+ strExpDate;
			}
			
			return success;
	}

</script>
	
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
                        <option value="index.php" selected="selected">Registration</option>
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
				<form name="myForm" onsubmit="return WriteCookies(document.myForm)" action="register.php" 
				onreset="return confirm('Do you really want to reset the form?')" method="post">
				<center>
				<table>
				<tr><td>
				Email Address:
				</td><td>
				<input type="text" name="emailaddress" size="25" maxlength="50">
				</td></tr>
				<tr><td>
				Password:
				</td><td>
				<input type="password" name="password" size="50" maxlength="50">
				</td></tr>
				<tr><td>
				Confirm Password:
				</td><td>
				<input type="password" name="confirmpassword" size="50" maxlength="50">
				</td></tr>
				<tr><td></br></td></tr>
				<tr><td>
				Title:
				</td><td>
				<select name="title">
				<option value="Mr">Mr.</option>
				<option value="Mrs">Mrs.</option>
				<option value="Miss">Miss.</option>
				<option value="Ms">Ms.</option>
				<option value="Dr">Dr.</option>
				</select>
				</td></tr>
				<tr><td>
				First Name:
				</td><td>
				<input type="text" name="firstname" size="25" maxlength="50">
				</td></tr>
				<tr><td>
				Last Name:
				</td><td>
				<input type="text" name="lastname" size="25" maxlength="50">
				</td></tr>
				<tr><td>
				Home Telephone:
				</td><td>
				<input type="text" name="homeprefix" size="3" maxlength="3">
				<input type="text" name="homeinfix" size="3" maxlength="3">
				<input type="text" name="homesuffix" size="4" maxlength="4">
				</td><td>
				Work Telephone:
				</td><td>
				<input type="text" name="workprefix" size="3" maxlength="3">
				<input type="text" name="workinfix" size="3" maxlength="3">
				<input type="text" name="worksuffix" size="4" maxlength="4">
				</td></tr>
				<tr><td>
				Address Line 1:
				</td><td>
				<input type="text" name="addressline1" size="25" maxlength="50">
				</td></tr>
				<tr><td>
				Address Line 2:
				</td><td>
				<input type="text" name="addressline2" size="25" maxlength="50">
				</td></tr>
				<tr><td>
				Province:
				</td><td>
				<select name="province">
				<option value="alberta">Alberta</option>
				<option value="britishcolumbia">British Columbia</option>
				<option value="manitoba">Manitoba</option>
				<option value="newbrunswick">New Brunswick</option>
				<option value="newfoundland">Newfoundland & Labrador</option>
				<option value="northwest">Northwest Territories</option>
				<option value="novascotia">Nova Scotia</option>
				<option value="nunavut">Nunavut</option>
				<option value="ontario">Ontario</option>
				<option value="pei">Prince Edward Island</option>
				<option value="quebec">Quebec</option>
				<option value="saskatchewan">Saskatchewan</option>
				<option value="yukon">Yukon</option>
				</select>
				</td></tr>
				<tr><td></br></td></tr>
				<tr><td>
				Credit Card Type:
				</td><td>
				<select name="creditcardtype">
				<option value="amex">AMEX</option>
				<option value="mc">MC</option>
				<option value="visa">Visa</option>
				</select>
				</td><td>
				Card Number:
				</td><td>
				<input type="text" name="cardnumber" size="25" maxlength="50">
				</td></tr>
				<tr><td>
				Expiry Date Month:
				</td><td>
				<select name="expirydatemonth">
				<option value="january">January</option>
				<option value="february">February</option>
				<option value="march">March</option>
				<option value="april">April</option>
				<option value="may">May</option>
				<option value="june">June</option>
				<option value="july">July</option>
				<option value="august">August</option>
				<option value="september">September</option>
				<option value="october">October</option>
				<option value="november">November</option>
				<option value="december">December</option>
				</select>
				</td><td>
				Expiry Date Year:
				</td><td>
				<select name="expirydateyear">
				<option value="2007">2007</option>
				<option value="2008">2008</option>
				<option value="2009">2009</option>
				<option value="2010">2010</option>
				<option value="2011">2011</option>
				<option value="2012">2012</option>
				<option value="2013">2013</option>
				<option value="2014">2014</option>
				<option value="2015">2015</option>
				<option value="2016">2016</option>
				<option value="2017">2017</option>
				</select>
				</td></tr>
				<tr><td>
				Cardholder Name:
				</td><td>
				<input type="text" name="cardholdername" size="25" maxlength="50">
				</td></tr>
				<tr><td></br></td></tr>
				<tr><td>
				Language Preference:
				</td><td>
				<input type="radio" name="languagepreference" value="english">English
				<input type="radio" name="languagepreference" value="francais">Francais
				<input type="radio" name="languagepreference" value="espanol">Espanol
				</td></tr>
				<tr><td>
				Email Notifications:
				</td><td>
				<input type="checkbox" name="emailnotifications" value="emailnotifications">Would you like to receive email notifications?
				</td></tr>
				<tr><td>
				<input type="submit" id="submit" name = "submit" value="Submit" />
				</td></tr>
				</table>
				</center>
				</form>				
			</div>
	    </div>
			
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

