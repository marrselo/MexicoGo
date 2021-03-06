<?php include 'layout/header.php';?>            
            <div id="central-content">
                    <p id="my-account" class="oswald">My Account</p>
                    <?php include 'layout/menu-lateral-account-settings.php';?>
                    <section id="block-right">
                        <form id="form-account-setting" class="form-account-setting">
                            <h2 class="oswald h2-cms">Account Settings</h2>
                            <fieldset id="profile"><legend class="oswald">PROFILE</legend>
                                <label for="accountUserName">*User Name:</label>
                                <input type="text" id="accountUserName" name="accountUserName" /><br/>
                                <label for="accountEmail">*Email Address:</label>
                                <input type="text" id="accountEmail" name="accountEmail" /><br/>
                                <label for="accountFullName">*Full Name:</label>
                                <input type="text" id="accountFullName" name="accountFullName" /><br/>
                            </fieldset>
                            <fieldset id="billing-information"><legend class="oswald">BILLING INFORMATION</legend>
                                <label for="accountCompanyName">Company name:</label>
                                <input type="text" id="accountCompanyName" name="accountCompanyName" /><br/>
                                <label for="accountRfc">RFC:</label>
                                <input type="text" id="accountRfc" name="accountRfc" /><br/>
                                <label for="accountMailingAddress">Mailing Address:</label>
                                <input type="text" id="accountMailingAddress" name="accountMailingAddress" /><br/>
                                <label for="accountSuit">Suite/Apt./Unit:</label>
                                <input type="text" id="accountSuit" name="accountSuit" /><br/>
                                <div class="combo-fix">
                                    <label for="accountCity">City:</label>
                                    <div class="flecha-combo"><select type="text" id="accountCity" name="accountCity" ><option>Montevideo</option><option>Maldonado</option></select></div>
                                </div><br/>
                                <div class="combo-fix">
                                    <label for="accountCountry">Country:</label>
                                    <div class="flecha-combo"><select type="text" id="accountCountry" name="accountCountry" ><option>Uruguay</option><option>Brasil</option></select></div>
                                </div><br/>
                                <div class="combo-fix">
                                    <label for="accountState">State/Province:</label>
                                    <div class="flecha-combo"><select type="text" id="accountState" name="accountState" ><option>Montevideo</option><option>Maldonado</option></select></div>
                                </div><br/>
                                <label for="accountRfc">Zip/Postal Code:</label>
                                <input type="text" id="accountZip" name="accountZip" /><br/>
                                <label for="accountPhonePre">Phone:</label>
                                <input type="text" id="accountPhonePre" name="accountPhonePre" class="campo-chico-3"/> -
                                <input type="text" id="accountPhone1" name="accountPhone1" class="campo-chico-3" /> -
                                <input type="text" id="accountPhone2" name="accountPhone2" class="campo-chico-3" /><br/>
                            </fieldset>
                        <input id="save-account-form" class="boton-yellow-1  oswald" type="submit" value="SAVE >>"/>
                        </form>
                    </section>
                </div>
<?php include 'layout/footer.php';?>
