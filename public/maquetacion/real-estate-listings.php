<?php include 'layout/header.php';?>            
            <div id="central-content">
                    <p id="my-account" class="oswald">My Account</p>
                    <?php include 'layout/menu-lateral-account-settings.php';?>
                    <section id="block-right">
                            <h2 class="h2-cms oswald">Real estate listings</h2>
                            <p id="number-published"><span>Your current Listings:</span> You have <span>1 of 100</span> Listings Published</p>
                            <div class="wrapper-agent-listings-2">
                            <!--<div class="">-->
                            <table id="tabla-agentes">
                                <tr>
                                    <th id="th1">PLAN DETAILS</th>
                                    <th id="th2"></th>
                                    <th id="th3">Time Left</th>
                                    <th id="th4">Status</th>
                                    <th id="th5">Subscription</th>
                                </tr>
                                <tr>
                                    <td id="td1" class="oswald"><p>SILVER PACKAGE<p></td>
                                    <td id="td2"><p>100 Listings<br/>200 sales agents<p></td>
                                    <td id="td3"><span>months</span> 5</td>
                                    <td id="td4" class="oswald"><img src="images/black-star.png" /><br/>5 FEATURED</td>
                                    <td id="td5" class="oswald"><a href="" class="boton-yellow-2">BUY MORE >></a> </td>
                                </tr>
                            </table>
                                <div id="registros-agentes">
                                    <p class="align-right"><a href="" class="add-agents oswald">Add Agents</a></p>
                                <div class="paginador">
                                    <span class="previous"><a href=""><< previous</a></span>
                                    <span class="number"><a href="">1</a></span>
                                    <span class="number actual"><a href="">2</a></span>
                                    <span class="puntos"></span>
                                    <span class="number "><a href="">10</a></span>
                                    <span class="next"><a href="">next >></a></span>
                                </div>
                                <hr class="hr-custom" />
                            <!--</div>-->
                            <h3><span class="oswald">Published</span> (These homes arre currently visible in your profile)</h3>
                            <table id="tabla-agentes-listings">
                                <tr>
                                    <th class="th1"></th>
                                    <th class="th2"></th>
                                    <th class="th3"></th>
                                    <th class="th4">Featured</th>
                                    <th class="th5"></th>
                                </tr>
                                <tr>
                                    <td class="td1 oswald" ><a href=""><img src="images/ticked-icon.png"/></a></td>
                                    <td class="td2 house-thumb"><img src="images/house-thumbs/demo-thumb.png"/>These home are currently visible in your profile</td>
                                    <td class="td3"><p>
                                            <span class="house-title oswald">Oportunity Knocks!</span></br>
                                            <span class="house-geo">Stunning villa</span><br>
                                            <span class="house-price ">USD $ 1,350,000</span>
                                        <p></td>
                                    <td class="td4"><img src="images/black-star.png" /></td>
                                    <td class="td5 oswald"><a href="" class="boton-yellow-1">EDIT >><a/><a href="" class="boton-yellow-1">PREVIEW >><a/><a href="" class="boton-yellow-2">UNPUBLISH >><a/></td>
                                </tr>
                            </table>
                            <h3><span class="oswald">Draft</span> (These home will not be visible in your profile until you publish them)</h3>
                            <table id="tabla-agentes-listings-not-added">
                                <tr>
                                    <th class="th1"></th>
                                    <th class="th2"></th>
                                    <th class="th3"></th>
                                    <th class="th4">Featured</th>
                                    <th class="th5"></th>
                                </tr>
                                <tr>
                                    <td class="td1 oswald" ><a href=""><img src="images/plus-icon.png"/></a></td>
                                    <td class="td2 no-house-thumb"></td>
                                    <td class="td3 oswald"><p>No info available<p></td>
                                    <td class="td4"><img src="images/black-star.png" /></td>
                                    <td class="td5 oswald"><a href="" class="boton-yellow-1">EDIT >><a/><a href="" class="boton-yellow-1">PREVIEW >><a/><a href="" class="boton-yellow-2">PUBLISH >><a/></td>
                                </tr>
                                <tr>
                                    <td class="td1 oswald" ><a href=""><img src="images/plus-icon.png"/></a></td>
                                    <td class="td2 no-house-thumb"></td>
                                    <td class="td3 oswald"><p>No info available<p></td>
                                    <td class="td4"><img src="images/black-star.png" /></td>
                                    <td class="td5 oswald"><a href="" class="boton-yellow-1">EDIT >><a/><a href="" class="boton-yellow-1">PREVIEW >><a/><a href="" class="boton-yellow-2">PUBLISH >><a/></td>
                                </tr>
                                <tr>
                                    <td class="td1 oswald" ><a href=""><img src="images/plus-icon.png"/></a></td>
                                    <td class="td2 no-house-thumb"></td>
                                    <td class="td3 oswald"><p>No info available<p></td>
                                    <td class="td4"><img src="images/black-star.png" /></td>
                                    <td class="td5 oswald"><a href="" class="boton-yellow-1">EDIT >><a/><a href="" class="boton-yellow-1">PREVIEW >><a/><a href="" class="boton-yellow-2">PUBLISH >><a/></td>
                                </tr>
                            </table>
                            <hr class="hr-custom" />
                            <div class="paginador">
                                    <span class="previous"><a href=""><< previous</a></span>
                                    <span class="number"><a href="">1</a></span>
                                    <span class="number actual"><a href="">2</a></span>
                                    <span class="puntos"></span>
                                    <span class="number "><a href="">10</a></span>
                                    <span class="next"><a href="">next >></a></span>
                                </div>
                            <p class="align-center"><input type="submit" class="oswald boton-yellow-4 hand" value="SAVE AND CONTINUE >>"/></p>
                            <hr class="hr-custom" />
                                <p class="auto-renewal">Auto Renewal ON</p>
                                </div>
                            </div>
                    </section>
            </div>
<?php include 'layout/footer.php';?>