<?php include 'layout/header.php';?>            
            <div id="central-content">
                    <p id="my-account" class="oswald">My Account</p>
                    <?php include 'layout/menu-lateral-account-settings.php';?>
                    <section id="block-right">
                        <form id="email-preferences">
                            <h2 class="oswald h2-cms">Email Preferences</h2>
                            <div class="center-checkboxes">
                                <div class="general-checkbox">
                                    <input type="checkbox" id="check_01" name="check_01">
                                        <label for="check_01">Opción</label>
                                        <span class="banner-login-label">Mexi-Go! Newsletter</span>
                                </div>
                                <div class="general-checkbox checkbox-left">
                                    <input type="checkbox" id="check_01" name="check_01">
                                        <label for="check_01">Opción</label>
                                        <span class="banner-login-label">Special Offers</span>
                                </div>
                            </div>
                            <div class="clear-both"></div>
                            <div class="grey-bar">
                                <div class="center-content">
                                    <div class="general-checkbox">
                                        <input type="checkbox" id="check_01" name="check_01">
                                            <label for="check_01">Opción</label>
                                            <span class="banner-login-label white-label">Unsubscribe me from all Mexi-Go! emails</span>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </section>
                </div>
<?php include 'layout/footer.php';?>
