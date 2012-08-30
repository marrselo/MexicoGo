<?php include 'layout/header.php';?>       
<div id="signin-popup" class="round-corner-10">
	<div style="height:25px"><span id="popup-back" class="float-left"><a href=""><< BACK</a></span><span id="popup-close" class="float-right"><a href="">X</a></span></div>
	<p class="popup-title oswald">Reset Password</p>
	<p id="reset-description">Please enter your new password below</p>
	<label id="label-newPass" for="newPass">New Password:</label><br/>
    <input type="password" id="newPass" name="newPass" /><br/>
	<label id="label-verifyPass" for="verifyPass">Verify Password:</label><br/>
    <input type="password" id="verifyPass" name="verifyPass" /><br/>
	<input type="submit" class="boton-css-formato boton-css-gradient-yellow oswald round-corner-3 hand" value="SEND EMAIL >>" />
	<p id="having-trouble-reset-pass">Having trouble? <a href="">mexigo@mexigo.com</a></p>
</div>
<?php include 'layout/footer.php';?>    