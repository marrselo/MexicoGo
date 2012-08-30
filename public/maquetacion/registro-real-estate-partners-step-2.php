<?php include 'layout/header.php';?>            
            <div id="central-content" class="registro-REA-step2">
                <div class="circle-step-div"><span class="circle-step">STEP 2</span> <h2 class="oswald">View Plans & Pricing</h2></div>
                
                <div class="barra-step oswald">MEXI-GO.CA ONLINE</div>
                <p id="barra-step-sub" class="oswald">Presenting Mexican properties and lifestyle<br/>options to Canadian buyers online</p>
                <form id="plans-pricings">
                    <fieldset>
                        <legend><h3 class="oswald">REAL ESTATE LISTINGS</h3></legend>
                        <div id="tabla-step-2" class="round-corner-5">
                            <div class="first-line">
                            <span class="table-elem-first">REAL ESTATE<br/>LISTINGS</span>
                            <div class="table-elem"><div class="round-corner-5">1 listing<br/>$10<br/>per month<br/><label id="label-listings-1" for="listings-1" class="solo-check-img-black"></label><input id="listings-1" name="listings-1" type="checkbox" /></div>$ 10 each</div>
                            <div class="table-elem"><div class="round-corner-5">5 listing<br/>$40<br/>per month<br/><label id="label-listings-5" for="listings-5" class="solo-check-img-black"></label><input id="listings-5" name="listings-5" type="checkbox" /></div>$ 8 each</div>
                            <div class="table-elem"><div class="round-corner-5">10 listing<br/>$60<br/>per month<br/><label id="label-listings-10" for="listings-10" class="solo-check-img-black"></label><input id="listings-10" name="listings-10" type="checkbox" /></div>$ 6 each</div>
                            <div class="table-elem"><div class="round-corner-5">20 listing<br/>$100<br/>per month<br/><label id="label-listings-20" for="listings-20" class="solo-check-img-black"></label><input id="listings-20" name="listings-20" type="checkbox" /></div>$ 5 each</div>
                            </div>
                            <div class="second-line"><div class="flecha-combo-chico-1"><select class="select-chico-1" name="monthsContract" id="monthsContract" ><option value="6">6</option><option value="12">12</option><option value="18">18</option><option value="24">24</option></select></div><label for="monthsContract">Months </label></div>
                            <p id="packagesMessage" class="oswald">All packages are a minimun of 6 months pre-pais.</p>
                            <div class="second-line-down">
                                <span class="table-elem-first">Feature your listings<br/>for $5/months each</span>
                                <div class="table-elem-largo round-corner-5">
                                    <span id="featureOnlyF"> FEATURE:</span>
                                    <label id="label-featureOnly" for="featureOnly" class="solo-check-img-black"></label><input id="featureOnly" name="featureOnly" type="checkbox" />
                                    <div class="flecha-combo-chico-1"><select class="select-chico-1" name="featureSelect" id="featureSelect" ><option value="1">1</option></select></div>
                                    <span id="featureAllF">FEATURE ALL</span>
                                    <label id="label-featureAll" for="featureAll" class="solo-check-img-black"></label><input id="featureAll" name="featureAll" type="checkbox" />
                                </div>
                            </div>
                            
                        </div>
                        <div class="align-center">
                        <input type="submit" class="hand boton-dark-yellow boton-css-formato oswald round-corner-5" value="Add to cart >>" />
                        </div>
                    </fieldset>
                </form>
                
                   
            </div>
<?php include 'layout/footer.php';?>