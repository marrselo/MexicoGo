<?php include 'layout/header.php';?>            
            <div id="central-content" class="registro-REA-step4">
                        <form id="payment-details-setting" class="input-default-format" >
                            <h2 class="oswald h2-cms">Payment Details</h2>
                            <fieldset id="profile"><legend class="oswald">PROFILE</legend>
                                <label for="paymentFirstName">First Name*</label>
                                <input type="text" id="paymentFirstName" name="paymentFirstName" /><br/>
                                <label for="paymentLastName">Last Name*</label>
                                <input type="text" id="paymentLastName" name="paymentLastName" /><br/>
                                <label for="paymentPhonePre">Phone*</label>
                                <input type="text" id="paymentPhonePre" name="paymentPhonePre" class="campo-chico-3"/> -
                                <input type="text" id="paymentPhone1" name="paymentPhone1" class="campo-chico-3" /> -
                                <input type="text" id="paymentPhone2" name="paymentPhone2" class="campo-chico-3" /><br/>
                            </fieldset>
                            <fieldset id="billing-information"><legend class="oswald">BILLING INFORMATION</legend>
                                <label for="paymentCompanyName">Company name:</label>
                                <input type="text" id="paymentCompanyName" name="paymentCompanyName" /><br/>
                                <label for="paymentRfc">RFC:</label>
                                <input type="text" id="paymentRfc" name="paymentRfc" /><br/>
                                <label for="paymentMailingAddress">Mailing Address:</label>
                                <input type="text" id="paymentMailingAddress" name="paymentMailingAddress" /><br/>
                                <label for="paymentSuit">Suite/Apt./Unit:</label>
                                <input type="text" id="paymentSuit" name="paymentSuit" /><br/>
                                <div class="combo-fix">
                                    <label for="paymentCity">City:</label>
                                    <div class="flecha-combo"><select type="text" id="paymentCity" name="paymentCity" ><option>Montevideo</option><option>Maldonado</option></select></div>
                                </div><br/>
                                <div class="combo-fix">
                                    <label for="paymentCountry">Country:</label>
                                    <div class="flecha-combo"><select type="text" id="paymentCountry" name="paymentCountry" ><option>Uruguay</option><option>Brasil</option></select></div>
                                </div><br/>
                                <div class="combo-fix">
                                    <label for="paymentState">State/Province:</label>
                                    <div class="flecha-combo"><select type="text" id="paymentState" name="paymentState" ><option>Montevideo</option><option>Maldonado</option></select></div>
                                </div><br/>
                                <label for="paymentRfc">Zip/Postal Code:</label>
                                <input type="text" id="paymentZip" name="paymentZip" /><br/>                               
                                
                            </fieldset>
                            <label class="label-width-fix">Use billing address for my Profile Page:</label>
                                <div class="input-width-fix"><input type="checkbox"  name="useBillingMyProfile" value="useBilling" /></div>
                            <table>
                                <tr><td colspan="3" class="oswald">PAYMENT OPTIONS</td></tr>
                                <tr>
                                    <td><input type="checkbox" name="paymentOptions" value="paypal" /><img src="images/paypal-logo.png" /></td>
                                    <td><input type="checkbox" name="paymentOptions" value="bankTransfer" /><span>Bank transfer</span></td>
                                    <td><input type="checkbox" name="paymentOptions" value="check" /><span>Check</span></td>
                                </tr>
                                <tr class="oswald">
                                    <td>PAY ONLINE</td>
                                    <td colspan="2">OTHER OPTIONS</td>
                                </tr>
                            </table>
                        <input type="submit" value="Continue >>" class="boton-dark-yellow boton-css-formato oswald round-corner-5">
                        </form>
                </div>
<?php include 'layout/footer.php';?>