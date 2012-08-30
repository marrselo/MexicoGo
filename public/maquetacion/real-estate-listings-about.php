<?php include 'layout/header.php';?>            
            <div id="central-content">
                    <p id="my-account" class="oswald">My Account</p>
                    <?php include 'layout/menu-lateral-account-settings.php';?>
                    <section id="block-right">
                            <h2 class="h2-cms oswald">About this home</h2>
                            <p id="number-published"><span>Home / Features</span></p>
                            
                            <div id="listings-about">
								<form id="listings-about-form">
								<fieldset><legend class="oswald">ABOUT THIS HOME</legend>
                                <p class="listings-about-header-1 oswald"><span>STATUS</span></p>
								<div class="combo-fix">
									<label for="available">Available</label>
									<div class="flecha-combo"><select type="text" id="available" name="available" ><option>Any</option><option>Yes</option><option>No</option></select></div>
                                </div><br/>
								<p class="listings-about-header-1 oswald"><span>SELECT PROPERTY TYPE</span></p>
								<div class="combo-fix float-left inline-block clear-none">
									<label for="listingStatus">Listing Status</label>
									<div class="flecha-combo"><select type="text" id="listingStatus" name="listingStatus" ><option>Any</option><option>Yes</option><option>No</option></select></div>
                                </div>
								<div class="combo-fix float-left inline-block clear-none">
									<label for="propertyType" class="label-special-width">Property Type</label>
									<div class="flecha-combo"><select type="text" id="propertyType" name="propertyType" ><option>Any</option><option>Yes</option><option>No</option></select></div>
                                </div><br/>
								<p class="listings-about-header-1 oswald"><span>PRICE</span></p>
								<div class="combo-fix">
									<label for="priceValue">$ </label>
									<input type="text" id="priceValue" name="priceValue" class="float-left special-margen-right"/>
									<div class="flecha-combo-chico-1"><select type="text" id="priceCoin" name="priceCoin" class="select-chico-1"><option>USD</option><option>AUS</option><option>EUR</option></select></div>
                                </div>
								<p class="listings-about-header-1 oswald"><span>PROPERTY DETAILS</span></p>
								<div class="combo-fix">
									<label for="houseValue">House</label>
									<input type="text" id="houseValue" name="houseValue" class="float-left special-margen-right"/>
									<div class="flecha-combo-chico-1"><select type="text" id="houseMedida" name="houseMedida" class="select-chico-1"><option>M&sup2;</option><option>Yes</option><option>No</option></select></div>
                                </div>
								<div class="combo-fix">
									<label for="landValue">Land</label>
									<input type="text" id="landValue" name="landValue" class="float-left special-margen-right"/>
									<div class="flecha-combo-chico-1"><select type="text" id="landMedida" name="landMedida" class="select-chico-1"><option>Any</option><option>Yes</option><option>No</option></select></div>
                                </div>
								<p class="listings-about-header-1 oswald"><span>SELECT FEATURES</span></p>
								<div class="margin-bottom-special">
								<div class="combo-fix float-left inline-block clear-none">
									<label for="bedroom">Bedroom</label>
									<div class="flecha-combo"><select type="text" id="bedroom" name="bedroom" ><option>Any</option><option>1</option><option>2</option></select></div>
                                </div>
								<div class="combo-fix float-left inline-block clear-none">
									<label for="bathrooms" class="label-special-width">Bathrooms</label>
									<div class="flecha-combo"><select type="text" id="bathrooms" name="bathrooms" ><option>Any</option><option>1</option><option>2</option></select></div>
                                </div>
								</div>
								<div  class="margin-bottom-special">
								<div class="combo-fix float-left inline-block clear-none">
									<label for="style">Style</label>
									<div class="flecha-combo"><select type="text" id="style" name="style" ><option>Any</option><option>1</option><option>2</option></select></div>
                                </div>
								<div class="combo-fix float-left inline-block clear-none">
									<label for="keyword" class="label-special-width">Keyword</label>
									<input type="text" id="keyword" name="keyword" class="float-left"/>
                                </div>
								</div>
								<div  class="margin-bottom-special">
								<div class="combo-fix float-left inline-block clear-none">
									<label for="garage">Garage</label>
									<div class="flecha-combo"><select type="text" id="garage" name="garage" ><option>Any</option><option>1</option><option>2</option></select></div>
                                </div>
								<div class="combo-fix float-left inline-block clear-none">
									<label for="address" class="label-special-width">Address</label>
									<input type="text" id="address" name="address" class="float-left"/>
                                </div>
								</div>
								<div class="margin-bottom-special">
								<div class="combo-fix float-left inline-block clear-none">
									<label for="view">View</label>
									<div class="flecha-combo"><select type="text" id="view" name="view" ><option>Any</option><option>1</option><option>2</option></select></div>
                                </div>
								<div class="combo-fix float-left inline-block clear-none">
									<label for="size" class="label-special-width">Size (sq.ft.)</label>
									<input type="text" id="size" name="size" class="float-left special-margen-right"/>
                                </div>
								</div>
								<div class="combo-fix">
									<label for="recreation">Recreational Areas</label>
									<div class="flecha-combo"><select type="text" id="recreation" name="recreation" ><option>Any</option><option>1</option><option>2</option></select></div>
                                </div>
								<p class="listings-about-header-2 oswald"><span>FEATURES</span></p>
								<div class="contenedor-picks-1">
									<div class="pick-izq-2">
									<label for="checkBBQ" id="label-checkBBQ" class="label-check3 check-special">BBQ Area</label><input id="checkBBQ" name="checkBBQ" type="checkbox" />
									<label for="checkBeach" id="label-checkBeach" class=" label-check3 check-special">Beach Club</label><input id="checkBeach" type="checkbox" />
									<label for="checkBeamed" id="label-checkBeamed" class="label-check3 check-special">Beamed Ceilings</label><input id="checkBeamed" type="checkbox" />
									<label for="checkBreakfast" id="label-checkBreakfast" class="label-check3 check-special">Breakfast Nook</label><input id="checkBreakfast" type="checkbox" />
									<label for="checkCable" id="label-checkCable" class="label-check3 check-special">Cable Television</label><input id="checkCable" type="checkbox" />
									<label for="checkCathedral" id="label-checkCathedral" class="label-check3 check-special">Cathedral Ceilings</label><input id="checkCathedral" type="checkbox" />
									<label for="checkDeck" id="label-checkDeck" class="label-check3 check-special">Deck</label><input id="checkDeck" type="checkbox" />
									<label for="checkFence" id="label-checkFence" class="label-check3 check-special">Fence / Wall</label><input id="checkFence" type="checkbox" />
									<label for="checkFireplace" id="label-checkFireplace" class="label-check3 check-special">Fireplace</label><input id="checkFireplace" type="checkbox" />
									<label for="checkFountain" id="label-checkFountain" class="label-check3 check-special">Fountain</label><input id="checkFountain" type="checkbox" />
									<label for="checkGames" id="label-checkGames" class="label-check3 check-special">Games Room</label><input id="checkGames" type="checkbox" />
									</div>
									<div class="pick-med-2">
									<label for="checkGarden" id="label-checkGarden" class="label-check3 check-special">Garden</label><input id="checkGarden" name="checkGarden" type="checkbox" />
									<label for="checkGated" id="label-checkGated" class="label-check3 check-special">Gated</label><input id="checkGated" type="checkbox" />
									<label for="checkGuarded" id="label-checkGuarded" class="label-check3 check-special">Guarded</label><input id="checkGuarded" type="checkbox" />
									<label for="checkGym" id="label-checkGym" class="label-check3 check-special">Gym</label><input id="checkGym" type="checkbox" />
									<label for="checkHighInternet" id="label-checkHighInternet" class="label-check3 check-special">High Speed Internet</label><input id="checkHighInternet" type="checkbox" />
									<label for="checkHotTub" id="label-checkHotTub" class="label-check3 check-special">Hot Tub</label><input id="checkHotTub" type="checkbox" />
									<label for="checkPalapa" id="label-checkPalapa" class="label-check3 check-special">Palapa</label><input id="checkPalapa" type="checkbox" />
									<label for="checkPatio" id="label-checkPatio" class="label-check3 check-special">Patio</label><input id="checkPatio" type="checkbox" />
									<label for="checkPool" id="label-checkPool" class="label-check3 check-special">Pool</label><input id="checkPool" type="checkbox" />
									<label for="checkElevator" id="label-checkElevator" class="label-check3 check-special">Private Elevator</label><input id="checkElevator" type="checkbox" />
									<label for="checkRoofTerrace" id="label-checkRoofTerrace" class="label-check3 check-special">Roof Top Terrace</label><input id="checkRoofTerrace" type="checkbox" />
									</div>
									<div class="pick-der-2">
										<label for="checkSatelite" id="label-checkSatelite" class="label-check3 check-special">Satellite Television</label><input id="checkSatelite" name="checkSatelite" type="checkbox" />
									<label for="checkSauna" id="label-checkSauna" class="label-check3 check-special">Sauna</label><input id="checkSauna" type="checkbox" />
									<label for="checkSecondKitchen" id="label-checkSecondKitchen" class="label-check3 check-special">Second Kitchen</label><input id="checkSecondKitchen" type="checkbox" />
									<label for="checkSpa" id="label-checkSpa" class="label-check3 check-special">Spa</label><input id="checkSpa" type="checkbox" />
									<label for="checkStorage" id="label-checkStorage" class="label-check3 check-special">Storage Area</label><input id="checkStorage" type="checkbox" />
									<label for="checkSwimBar" id="label-checkSwimBar" class="label-check3 check-special">Swim-up Bar</label><input id="checkSwimBar" type="checkbox" />
									<label for="checkTennis" id="label-checkTennis" class="label-check3 check-special">Tennis Court</label><input id="checkTennis" type="checkbox" />
									<label for="checkTerrace" id="label-checkTerrace" class="label-check3 check-special">Terrace</label><input id="checkTerrace" type="checkbox" />
									<label for="checkTheater" id="label-checkTheater" class="label-check3 check-special">Theater</label><input id="checkTheater" type="checkbox" />
									<label for="checkWineCellar" id="label-checkWineCellar" class="label-check3 check-special">Wine Cellar</label><input id="checkWineCellar" type="checkbox" />
									<label for="checkWifi" id="label-checkWifi" class="label-check3 check-special">Wireless Internet</label><input id="checkWifi" type="checkbox" />
			
									</div>
								</div>
								
								<p class="listings-about-header-3 oswald"><span>OUT BUILDINGS</span></p>
								<div class="contenedor-picks-2">
									<div class="pick-izq-2">
										<label for="checkBarn" id="label-checkBarn" class="label-check3 check-special">Barn / Stable</label><input id="checkBarn" name="checkBBQ" type="checkbox" />
										<label for="checkBoatLift" id="label-checkBoatLift" class="label-check3 check-special">Boatlift</label><input id="checkBoatLift" type="checkbox" />
										<label for="checkCarPort" id="label-checkCarPort" class="label-check3 check-special">Car Port</label><input id="checkCarPort" type="checkbox" />
										<label for="checkCasita" id="label-checkCasita" class="label-check3 check-special">Casita</label><input id="checkCasita" type="checkbox" />
									
									</div>
									<div class="pick-med-2">
										<label for="checkDock" id="label-checkDock" class="label-check3 check-special">Dock / Pier</label><input id="checkDock" name="checkDock" type="checkbox" />
										<label for="checkGazebo" id="label-checkGazebo" class="label-check3 check-special">Gazebo</label><input id="checkGazebo" type="checkbox" />
										<label for="checkMaidsQuarters" id="label-checkMaidsQuarters" class="label-check3 check-special">Maids Quarters</label><input id="checkMaidsQuarters" type="checkbox" />
										<label for="checkPergola" id="label-checkPergola" class="label-check3 check-special">Pergola</label><input id="checkPergola" type="checkbox" />								
									</div>
									<div class="pick-der-2">
										<label for="checkPoolHouse" id="label-checkPoolHouse" class="label-check3 check-special">Pool House</label><input id="checkPoolHouse" name="checkPoolHouse" type="checkbox" />
										<label for="checkStudio" id="label-checkStudio" class="label-check3 check-special">Studio</label><input id="checkStudio" type="checkbox" />
									
			
									</div>
								</div>
								
								<p class="listings-about-header-3 oswald"><span>APPLIANCES</span></p>
								<div class="contenedor-picks-3">
									<div class="pick-izq-2">
									<label for="checkAirConditioning" id="label-checkAirConditioning" class="label-check3 check-special">Air Conditioning</label><input id="checkBBQ" name="checkAirConditioning" type="checkbox" />
									<label for="checkCeilingFan" id="label-checkCeilingFan" class="label-check3 check-special">Ceiling Fans</label><input id="checkCeilingFan" type="checkbox" />
									<label for="checkCentralVac" id="label-checkCentralVac" class="label-check3 check-special">Central Vac</label><input id="checkCentralVac" type="checkbox" />
									<label for="checkClothesDryer" id="label-checkClothesDryer" class="label-check3 check-special">Clothes Dryer</label><input id="checkClothesDryer" type="checkbox" />
									<label for="checkClothesWasher" id="label-checkClothesWasher" class="label-check3 check-special">Clothes washer</label><input id="checkClothesWasher" type="checkbox" />
									<label for="checkCompactorVac" id="label-checkCompactorVac" class="label-check3 check-special">Compactor Vac</label><input id="checkCompactorVac" type="checkbox" />
									<label for="checkDish" id="label-checkDish" class="label-check3 check-special">Dishwasher</label><input id="checkDish" type="checkbox" />
									</div>
									<div class="pick-med-2">
										<label for="checkDisposal" id="label-checkDisposal" class="label-check3 check-special">Disposal</label><input id="checkDisposal" name="checkGarden" type="checkbox" />
									<label for="checkFreezer" id="label-checkFreezer" class="label-check3 check-special">Freezer</label><input id="checkFreezer" type="checkbox" />
									<label for="checkIceMaker" id="label-checkIceMaker" class="label-check3 check-special">Ice Maker</label><input id="checkIceMaker" type="checkbox" />
									<label for="checkMicrowave" id="label-checkMicrowave" class="label-check3 check-special">Microwave</label><input id="checkMicrowave" type="checkbox" />
									<label for="checkMiniSplit" id="label-checkMiniSplit" class="label-check3 check-special">Mini-Split</label><input id="checkMiniSplit" type="checkbox" />
									<label for="checkOvenElectric" id="label-checkOvenElectric" class="label-check3 check-special">Oven: Electric</label><input id="checkOvenElectric" type="checkbox" />
									<label for="checkOvenGas" id="label-checkOvenGas" class="label-check3 check-special">Oven: Gas</label><input id="checkOvenGas" type="checkbox" />
									</div>
									<div class="pick-der-2">
										<label for="checkRangeElectric" id="label-checkRangeElectric" class="label-check3 check-special">Range: Electric</label><input id="checkRangeElectric" name="checkSatelite" type="checkbox" />
									<label for="checkRangeGas" id="label-checkRangeGas" class="label-check3 check-special">Range: Gas</label><input id="checkRangeGas" type="checkbox" />
									<label for="checkRefrigerator" id="label-checkRefrigerator" class="label-check3 check-special">Refrigerator</label><input id="checkRefrigerator" type="checkbox" />
									<label for="checkWaterHeater" id="label-checkWaterHeater" class="label-check3 check-special">Water Heater</label><input id="checkWaterHeater" type="checkbox" />
									<label for="checkWaterPurification" id="label-checkWaterPurification" class="label-check3 check-special">Water Purification</label><input id="checkWaterPurification" type="checkbox" />
									<label for="checkWineFridge" id="label-checkWineFridge" class="label-check3 check-special">Wine Fridge</label><input id="checkWineFridge" type="checkbox" />
									
									</div>
								</div>
								<div class="hr-gris-div"></div>
								<p id="botonera" class="oswald">
								<span>Draft</span><input type="submit" class="boton-css-formato boton-css-gradient-yellow oswald round-corner-5" value="SAVE >>" />
								<a href="" class="float-right boton-css-formato boton-css-gradient-yellow round-corner-5">NEXT >></a>
								</p>
								</fieldset>
								</form>
								
                                
                            </div>
                    </section>
                </div>
<?php include 'layout/footer.php';?>