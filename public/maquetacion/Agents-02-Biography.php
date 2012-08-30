<?php include 'layout/header.php';?>            
            <div id="central-content">
                    <p id="my-account" class="oswald">My Account</p>
                    <?php include 'layout/menu-lateral-account-settings.php';?>
                    <section id="block-right">
                        <form id="form-profile-page" class="form-account-setting">
                            <h2 class="h2-cms oswald">Agents</h2>
                            <p id="number-published"><span>Create a new member profile</span></p>
                            <fieldset id="agent-contact-details"><legend class="oswald">AGENT CONTACT DETAILS</legend>
                                <div class="agent-image">
                                <label for="profileCompany">Agent Photo:</label>  
                                    <div class="drop-image"></div>
                                    <div class="drop-image-text">
                                        <p>This is the image we use to<br/> represent you on Mexi-Go</p>
                                        <p>Your logo is shown at 145 x 145 pixels:</p>
                                    </div>
                                </div>
                                <label for="profileFirstName">*First Name:</label>
                                <input type="text" id="profileFirstName" name="profileCompany" /><br/>
                                <label for="profileLastName">*Last Name:</label>
                                <input type="text" id="profileLastName" name="profileCompany" /><br/>
                                <div class="fields">
                                    <label for="profileEmail">*Email Address:</label>
                                    <input type="text" id="profileEmail" name="profileEmail" /><span class="email-icon"></span>
                                    <p>
                                        Emails sent through the contact form on your listings will be forwarded to this address.
                                    </p>
                                </div>
                                <label for="profileWebsite">Website:</label>
                                <input type="text" id="profileWebsite" name="profileWebsite" /><span class="website-icon"></span><br/>
                                <label for="profileBrokerage">Brokerage:</label>
                                <input type="text" id="profileBrokerage" name="profileWebsite" /><br/>
                                <table id="agent-description-table">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <label for="profileAgentProfile">Agent Profile:</label><br/>
                                                <img src="images/profile-icon.png" alt="" title="">
                                            </td>
                                            <td>
                                                <textarea id="agentDescription" name="profileDescription">Write a short description that will appear on your profile.</textarea>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                
                                
                            </fieldset>
                            <hr class="hr-gris"/>
                            <fieldset id="location-information"><legend class="oswald">Primary Location</legend>
                                <div class="combo-fix">
                                    <label for="accountCountry">Country:</label>
                                    <div class="flecha-combo"><select name="accountCountry" id="accountCountry" type="text"><option>Uruguay</option><option>Brasil</option></select></div>
                                </div><br>
                                <div class="combo-fix">
                                    <label for="accountState">Region:</label>
                                    <div class="flecha-combo"><select name="accountState" id="accountState" type="text"><option>Montevideo</option><option>Maldonado</option></select></div>
                                </div><br>
                                <div class="combo-fix">
                                    <label for="accountCity">City:</label>
                                    <div class="flecha-combo"><select name="accountCity" id="accountCity" type="text"><option>Montevideo</option><option>Maldonado</option></select></div>
                                </div><br>
                                <div class="combo-fix">
                                    <label for="accountState">State/Province:</label>
                                    <div class="flecha-combo"><select name="accountState" id="accountState" type="text"><option>Montevideo</option><option>Maldonado</option></select></div>
                                </div><br>
                                
                            </fieldset>
                            <fieldset id="location-information"><legend class="oswald">Secondary Location</legend>
                                <div class="combo-fix">
                                    <label for="accountCountry">Country:</label>
                                    <div class="flecha-combo"><select name="accountCountry" id="accountCountry" type="text"><option>Uruguay</option><option>Brasil</option></select></div>
                                    <input type="button" class="grey-button button-shadow"  value="ADD ANOTHER LOCATION >>">
                                </div>
                                <div class="combo-fix">
                                    <label for="accountState">Region:</label>
                                    <div class="flecha-combo"><select name="accountState" id="accountState" type="text"><option>Montevideo</option><option>Maldonado</option></select></div>
                                </div><br>
                                <div class="combo-fix">
                                    <label for="accountCity">City:</label>
                                    <div class="flecha-combo"><select name="accountCity" id="accountCity" type="text"><option>Montevideo</option><option>Maldonado</option></select></div>
                                </div><br>
                                <div class="combo-fix">
                                    <label for="accountState">State/Province:</label>
                                    <div class="flecha-combo"><select name="accountState" id="accountState" type="text"><option>Montevideo</option><option>Maldonado</option></select></div>
                                </div><br/>
                                <hr class="hr-gris hr-gris-clear">
                                <label for="accountPhonePre">Phone:</label>
                                <input id="accountPhonePre" class="campo-chico-3" type="text" name="accountPhonePre">
                                -
                                <input id="accountPhone1" class="campo-chico-3" type="text" name="accountPhone1">
                                -
                                <input id="accountPhone2" class="campo-chico-3" type="text" name="accountPhone2">
                                <br>
                                <label for="accountPhonePre">Mobile Phone:</label>
                                <input id="accountPhonePre" class="campo-chico-3" type="text" name="accountPhonePre">
                                -
                                <input id="accountPhone1" class="campo-chico-3" type="text" name="accountPhone1">
                                -
                                <input id="accountPhone2" class="campo-chico-3" type="text" name="accountPhone2">
                                <br>
                                <hr class="hr-gris">
                                <p class="align-center"><input type="submit" value="SAVE AND CONTINUE &gt;&gt;" class="oswald generals-buttons hand"></p>
                            </fieldset>
                            </form>
                    </section>
                </div>
<?php include 'layout/footer.php';?>
