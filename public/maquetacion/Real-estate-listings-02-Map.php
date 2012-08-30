<?php include 'layout/header.php';?>            
            <div id="central-content">
                    <p id="my-account" class="oswald">My Account</p>
                    <?php include 'layout/menu-lateral-account-settings.php';?>
                    <section id="block-right">
                        <form id="real-state-listing-page" class="form-account-setting">
                            <hr class="hr-gris"/>
                            <fieldset id="about-this-home"><legend class="oswald">ABOUT THIS HOME</legend>
                                <br/>
                                <input type="text" id="profileWebsite" value="Title" name="profileWebsite" /><span class="text-gris-claro desc-titulo">Describe this home in less than 25 characters</span><br/>
                                <textarea id="homeDescription" name="homeDescription">Write a short description that will appear on your profile page</textarea>
                            </fieldset>
                            <fieldset id="upload-pdf"><legend class="oswald">FEATURE THIS HOME <input type="radio" value=""/></legend>
                                
                            </fieldset>
                            <hr class="hr-gris"/>
                            <fieldset id="upload-pdf"><legend class="oswald">ATTACHABLE DOCUMENTS</legend>
                                <div class="upload-button">
                                    <fieldset class="upload-file-fieldset">PDF</fieldset>
                                    <img id="img-upload-file" src="images/upload-button.png">
                                    <input class="ruta-input-file"type="text">
                                    <input type="file" value=""/>
                                    <script>
                                    $(function(){
                                        $("#img-upload-file").click(function(){
                                            $(".upload-button input:file").click();
                                        });
                                        $(".upload-button input:file").change(function(){
                                                $(".ruta-input-file").val($(this).val());
                                            });
                                        });
                                    </script>
                                    
                                </div>
                                <a href="" class="boton-gris-basico button-shadow oswald upload-file-right-button">ADD ANOTHER >></a>
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
                                <input type="text" name="profileLocationAddress" id="profileLocationAddress">
                                
                                <br>
                                <label for="profileLocationSuite">*Suite/Apt./Unit:</label>
                                <input type="text" name="profileLocationSuite" id="profileLocationSuite">
                                <br>
                                <div class="combo-fix">
                                    <label for="accountLocationCity">City:</label>
                                    <div class="flecha-combo"><select name="accountLocationCity" id="accountlocationCity" type="text"><option>Montevideo</option><option>Maldonado</option></select></div>
                                </div><br>
                                <div class="combo-fix">
                                    <label for="accountLocationCountry">Country:</label>
                                    <div class="flecha-combo"><select name="accountLocationCountry" id="accountLocationCountry" type="text"><option>Uruguay</option><option>Maldonado</option></select></div>
                                </div><br>
                                <div class="combo-fix">
                                    <label for="accountLocationState">State:</label>
                                    <div class="flecha-combo"><select name="accountLocationState" id="accountLocationState" type="text"><option>Montevideo</option><option>Maldonado</option></select></div>
                                </div><br>
                                <div class="combo-fix">
                                    <label for="accountLocationRegion">Region:</label>
                                    <div class="flecha-combo"><select name="accountLocationRegion" id="accountLocationRegion" type="text"><option>South America</option><option>Maldonado</option></select></div>
                                </div><br>
                                <div class="combo-fix">
                                    <label for="accountLocationZip">Zip/Postal Code:</label>
                                    <div class="flecha-combo"><select name="accountLocationZip" id="accountLocationZip" type="text"><option>12000</option><option>Maldonado</option></select></div>
                                </div><br>
                                </div>
                                <div style="width:370px;float:left">
                                    <label for="profileLocationLatitud">Latitude:</label>
                                <input type="text" name="profileLocationLatitud" id="profileLocationLatitud"><br>
                                    <label for="profileLocationLongitud">Longitud:</label>
                                    <input type="text" name="profileLocationLongitud" id="profileLocationLongitud"><br>
                                    <p class="align-right"><a href="">How to do it &gt;&gt;</a><br><a href="">How to do find it &gt;&gt;</a></p>
                                </div>
                                
                            </fieldset>
                            <div class="map-frame">
                                <img src="images/google-map-example.jpg" alt="" title="" />
                            </div>
                            <hr class="hr-gris"/>
                        <div class="agent-data-buttons">
                            <p class="draft-save">
                            <span class="oswald">DRAFT</span>
                            <input type="button" value="SAVE &gt;&gt;" class="generals-buttons" id="">
                            </p>
                            <input type="button" value="NEXT &gt;&gt;" class="generals-buttons" id="">
                        </div>
                        </form>
                    </section>
                </div>
<?php include 'layout/footer.php';?>
