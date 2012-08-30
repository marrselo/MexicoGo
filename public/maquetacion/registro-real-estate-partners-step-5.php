<?php include 'layout/header.php';?>            
            <div id="central-content" class="registro-REA-step5">
                <h2 class="oswald">Payment Details</h2>
                <span class="hi-nombre-register oswald">HI STEVE</span>
                <p id="modify-billing-details"><a href=""><< MODIFY YOUR BILLING DETAILS</a></p>
                <form>
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
                 
                <input class="boton-dark-yellow boton-css-formato oswald round-corner-5" type="submit" value="Process Order >>">
                
                </form>
                
                
                
              
                
            </div>
<?php include 'layout/footer.php';?>