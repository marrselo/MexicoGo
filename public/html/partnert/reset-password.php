<?php include 'layout/header.php';?>            
            <div id="central-content">
                    <p id="my-account" class="oswald">My Account</p>
                    <?php include 'layout/menu-lateral-account-settings.php';?>
                    <section id="block-right">
                        <form id="reset-pass" class="form-account-setting">
                            <h2 class="oswald h2-cms">Reset Password</h2>
                            <p>Please enter your new password below</p>
                                <label for="accountCurrentPass">Current Password:</label><br/>
                                <input type="text" id="accountCurrentPass" name="accountCurrentPass" /><br/>
                                <label for="accountNewPass">New Password:</label><br/>
                                <input type="text" id="accountNewPass" name="accountNewPass" value="5 or more characters"/><br/>
                                <label for="accountVerifyPass">Verify Password:</label><br/>
                                <input align="middle" type="text" id="accountVerifyPass" name="accountVerifyPass" value="5 or more characters"/><br/>
                            
                                <input id="save-reset-pass" class="hand boton-yellow-1  oswald" type="submit" value="SAVE >>" /><br/>
                                <a href="" class="oswald">Forgot your password?</a>
                        </form>
                    </section>
                </div>
<?php include 'layout/footer.php';?>
