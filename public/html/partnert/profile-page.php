<?php include 'layout/header.php';?>            
            <div id="central-content">
                    <p id="my-account" class="oswald">My Account</p>
                    <?php include 'layout/menu-lateral-account-settings.php';?>
                    <section id="block-right">
                        <form id="form-profile-page" class="form-account-setting">
                            <h2 class="h2-cms oswald">Profile Page</h2>
                            <hr class="hr-gris"/>
                            <fieldset id="business-contact"><legend class="oswald">BUSINESS CONTACT DETAILS</legend>
                                <div id="div-drop-image">
                                    <div><label>logo:</label></div>
                                    <div class="drop-image"></div>
                                    <div>
                                        <p>This is the image we use to<br/> represent you on Mexi-Go</p>
                                        <p>Your logo is shown at 145 x 145 pixels:</p>
                                    </div>
                                    
                                </div>
                                <br/>
                                <hr class="hr-gris"/>
                                <label for="profileCompany">Company:</label>
                                <input type="text" id="profileCompany" name="profileCompany" /><br/>
                                <label for="profileEmail">*Email Address:</label>
                                <input type="text" id="profileEmail" name="profileEmail" /><span class="email-icon"></span><br/>
                                <label for="profileFullName">Website:</label>
                                <input type="text" id="profileWebsite" name="profileWebsite" /><span class="website-icon"></span><br/>
                                <label for="profilePhoneDescription1">Phone 1:</label>
                                <input type="text" id="profileDecription1" name="profileDescription" value="Phone description" />
                                <input type="text" id="profilePhonePre1" name="profilePhonePre1" class="campo-chico-3"/> -
                                <input type="text" id="profilePhone1" name="profilePhone1" class="campo-chico-3"/> -
                                <input type="text" id="profilePhonepost1" name="profilePhonepost1" class="campo-chico-3"/><br/>
                                <label for="profilePhoneDescription2">Phone 2:</label>
                                <input type="text" id="profileDecription2" name="profileDescription2" value="Phone description" />
                                <input type="text" id="profilePhonePre2" name="profilePhonePre2" class="campo-chico-3"/> -
                                <input type="text" id="profilePhone2" name="profilePhone2" class="campo-chico-3"/> -
                                <input type="text" id="profilePhonepost2" name="profilePhonepost2" class="campo-chico-3"/><a href="" class="boton-gris-1 oswald">ADD ANOTHER PHONE >></a><br/>
                                <textarea id="profileDescription" name="profileDescription">Write a short description that will appear on your profile page</textarea>
                                
                            </fieldset>
                            <hr class="hr-gris"/>
                            <fieldset id="upload-pdf"><legend class="oswald">YOUR PDF FILES</legend>
                                <input type="file" value=""/><a href="" class="boton-gris-1 oswald">ADD ADDITIONAL PDF >></a>
                            </fieldset>
                            <hr class="hr-gris"/>
                            <fieldset id="upload-image"><legend class="oswald">IMAGE GALLERY</legend>
                                <div id="upload-gallery-images" class="round-border-gris">
                                    Drag and drop your photos here<br/>
                                    or<br/>
                                    <span class="round-border-yellow">chose photos to upload</span>
                                </div>
                            </fieldset>
                            <hr class="hr-gris"/>
                            <fieldset id="upload-videos"><legend class="oswald">VIDEO GALLERY</legend>
                                 <input type="text" id="profileVideo1" name="profileVideo1" /><span class="text-gris-claro desc-subida-video">Insert your video link (vimeo or youtube)</span><br/>
                                 <input type="text" id="profileVideo2" name="profileVideo2" /><span class="text-gris-claro desc-subida-video">Insert your video link (vimeo or youtube)</span><br/>
                                 <a href="" class="no-margen-left boton-gris-1 oswald">ADD MORE VIDEOS >></a>                                
                            </fieldset>
                            <hr class="hr-gris"/>
                            <fieldset id="loaction"><legend class="oswald">LOCATION</legend>
                                <div style="width:370px;float:left">
                                <label for="profileLocationAddress">Address:</label>
                                <input type="text" id="profileLocationAddress" name="profileLocationAddress" />
                                
                                <br/>
                                <label for="profileLocationSuite">*Suite/Apt./Unit:</label>
                                <input type="text" id="profileLocationSuite" name="profileLocationSuite" />
                                <br/>
                                <div class="combo-fix">
                                    <label for="accountLocationCity">City:</label>
                                    <div class="flecha-combo"><select type="text" id="accountlocationCity" name="accountLocationCity" ><option>Montevideo</option><option>Maldonado</option></select></div>
                                </div><br/>
                                <div class="combo-fix">
                                    <label for="accountLocationCountry">Country:</label>
                                    <div class="flecha-combo"><select type="text" id="accountLocationCountry" name="accountLocationCountry" ><option>Uruguay</option><option>Maldonado</option></select></div>
                                </div><br/>
                                <div class="combo-fix">
                                    <label for="accountLocationState">State:</label>
                                    <div class="flecha-combo"><select type="text" id="accountLocationState" name="accountLocationState" ><option>Montevideo</option><option>Maldonado</option></select></div>
                                </div><br/>
                                <div class="combo-fix">
                                    <label for="accountLocationRegion">Region:</label>
                                    <div class="flecha-combo"><select type="text" id="accountLocationRegion" name="accountLocationRegion" ><option>South America</option><option>Maldonado</option></select></div>
                                </div><br/>
                                <div class="combo-fix">
                                    <label for="accountLocationZip">Zip/Postal Code:</label>
                                    <div class="flecha-combo"><select type="text" id="accountLocationZip" name="accountLocationZip" ><option>12000</option><option>Maldonado</option></select></div>
                                </div><br/>
                                </div>
                                <div style="width:370px;float:left">
                                    <label for="profileLocationLatitud">Latitude:</label>
                                <input type="text" id="profileLocationLatitud" name="profileLocationLatitud" /><br/>
                                    <label for="profileLocationLongitud">Longitud:</label>
                                    <input type="text" id="profileLocationLongitud" name="profileLocationLongitud" /><br/>
                                    <p class="align-right"><a href="">How to do it >></a><br/><a href="">How to do find it >></a></p>
                                </div>
                                
                            </fieldset>
                            <div>mapa</div>
                            <fieldset id="pick-categories"><legend class="oswald">PICK THE CATEGORIES WHERE YOUR PAGE WILL APPEAR</legend>
                                <p>(Two sections max.)</p>
                                <input id="checkRealState" type="checkbox" /><label for="checkRealState" class="label-check">Real estate</label>
                                <input id="checkTravel" type="checkbox" /><label for="checkTravel" class="label-check">Travel</label>
                                <input id="checkRetirement" type="checkbox" /><label for="checkRetirement" class="label-check">Retirement</label>
                                <input id="checkLiving" type="checkbox" /><label for="checkLiving" class="label-check">Living</label>
                                <input id="checkPartners" type="checkbox" /><label for="checkPartners" class="label-check">Parteners</label>
                            </fieldset>
                            <fieldset id="pick-subcategories"><legend class="oswald">SELECT A SUBCATEGORY</legend>
                                <div class="pick-izq">
                                <input id="checkAccounting" type="checkbox" /><label for="checkRealState" class="label-check2">Accounting</label>
                                <input id="checkAirline" type="checkbox" /><label for="checkAirline" class="label-check2">Airline</label>
                                <input id="checkAll-inclusive" type="checkbox" /><label for="checkAll-inclusive" class="label-check2">All-inclusive resorts</label>
                                <input id="checkArtist" type="checkbox" /><label for="checkArtist" class="label-check2">Artist and entertainer</label>
                                <input id="checkBanking" type="checkbox" /><label for="checkBanking" class="label-check2">Banking</label>
                                <input id="checkAccounting" type="checkbox" /><label for="checkRealState" class="label-check2">Beauty salons</label>
                                <input id="checkAirline" type="checkbox" /><label for="checkAirline" class="label-check2">Bed and breakfast</label>
                                <input id="checkAll-inclusive" type="checkbox" /><label for="checkAll-inclusive" class="label-check2">Car rental</label>
                                <input id="checkArtist" type="checkbox" /><label for="checkArtist" class="label-check2">Construccion / renoval</label>
                                <input id="checkBanking" type="checkbox" /><label for="checkBanking" class="label-check2">Cosmetic surgery</label>
                                <input id="checkAccounting" type="checkbox" /><label for="checkRealState" class="label-check2">Dentist</label>
                                <input id="checkAirline" type="checkbox" /><label for="checkAirline" class="label-check2">Doctor</label>
                                <input id="checkAll-inclusive" type="checkbox" /><label for="checkAll-inclusive" class="label-check2">Education</label>
                                </div>
                                <div class="pick-med">
                                <input id="checkAccounting" type="checkbox" /><label for="checkRealState" class="label-check2">Fashion and retail</label>
                                <input id="checkAirline" type="checkbox" /><label for="checkAirline" class="label-check2">Fishing charters</label>
                                <input id="checkAll-inclusive" type="checkbox" /><label for="checkAll-inclusive" class="label-check2">Golfing</label>
                                <input id="checkArtist" type="checkbox" /><label for="checkArtist" class="label-check2">Government</label>
                                <input id="checkBanking" type="checkbox" /><label for="checkBanking" class="label-check2">Hotel</label>
                                <input id="checkAccounting" type="checkbox" /><label for="checkRealState" class="label-check2">Insurance</label>
                                <input id="checkAirline" type="checkbox" /><label for="checkAirline" class="label-check2">Lawyer</label>
                                <input id="checkAll-inclusive" type="checkbox" /><label for="checkAll-inclusive" class="label-check2">Long-term care</label>
                                <input id="checkArtist" type="checkbox" /><label for="checkArtist" class="label-check2">Notary public</label>
                                <input id="checkBanking" type="checkbox" /><label for="checkBanking" class="label-check2">Property management</label>
                                <input id="checkAccounting" type="checkbox" /><label for="checkRealState" class="label-check2">REal estate agent</label>
                                <input id="checkAirline" type="checkbox" /><label for="checkAirline" class="label-check2">Real estate brokerage</label>
                                <input id="checkAll-inclusive" type="checkbox" /><label for="checkAll-inclusive" class="label-check2">Real estate development</label>
                                </div>
                                <div class="pick-der">
                                <input id="checkAccounting" type="checkbox" /><label for="checkRealState" class="label-check2">Restaurant and bars</label>
                                <input id="checkAirline" type="checkbox" /><label for="checkAirline" class="label-check2">Retirement specialist</label>
                                <input id="checkAll-inclusive" type="checkbox" /><label for="checkAll-inclusive" class="label-check2">Retreats</label>
                                <input id="checkArtist" type="checkbox" /><label for="checkArtist" class="label-check2">Scuba diving and snorkeling</label>
                                <input id="checkBanking" type="checkbox" /><label for="checkBanking" class="label-check2">Shipping and warehousing</label>
                                <input id="checkAccounting" type="checkbox" /><label for="checkRealState" class="label-check2">Spas</label>
                                <input id="checkAirline" type="checkbox" /><label for="checkAirline" class="label-check2">Surgical care</label>
                                <input id="checkAll-inclusive" type="checkbox" /><label for="checkAll-inclusive" class="label-check2">Surfing</label>
                                <input id="checkTour" type="checkbox" /><label for="checkTour" class="label-check2">Tour Company</label>
                                <input id="checkTravelAgent" type="checkbox" /><label for="checkTravelAgent" class="label-check2">Travel agent</label>
                                <input id="checkVeterinarian" type="checkbox" /><label for="checkVeterinarian" class="label-check2">Veterinarian</label>
                                <input id="checkWedding" type="checkbox" /><label for="checkWedding" class="label-check2">Wedding planner</label>
                                <input id="checkYoga" type="checkbox" /><label for="checkYoga" class="label-check2">Yoga</label>
                                </div>
                                
                            </fieldset>
                        <input class="boton-yellow-1 oswald" type="submit" value="SAVE >>"/>
                        </form>
                    </section>
                </div>
<?php include 'layout/footer.php';?>
