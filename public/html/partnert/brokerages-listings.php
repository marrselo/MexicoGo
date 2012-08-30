<?php include 'layout/header.php';?>            
            <div id="central-content">
                    <p id="my-account" class="oswald">My Account</p>
                    <?php include 'layout/menu-lateral-account-settings.php';?>
                    <section id="block-right">
                            <h2 class="h2-cms oswald">Agents</h2>
                            <p id="number-published"><span>Agents / Listings</span></p>
                            <div class="search-field-p oswald">Add homes to: USE AGENT NAME <span><form><input type="text" value="   Search"/><input type="submit"></form></span></div>
                            <div class="wrapper-agent-listings-2">
                            <!--<div class="">-->
                                <hr class="hr-custom" />
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
                                    <td class="td2 house-thumb"><img src="images/house-thumbs/demo-thumb.png"/>These home are currently visible in the profile</td>
                                    <td class="td3"><p>
                                            <span class="house-title oswald">Oportunity Knocks!</span></br>
                                            <span class="house-geo">Stunning villa</span><br>
                                            <span class="house-price ">USD $ 1,350,000</span>
                                        <p></td>
                                    <td class="td4"><img src="images/black-star.png" /></td>
                                    <td class="td5 oswald"><a href="" class="boton-yellow-1">PREVIEW >><a/><a href="" class="boton-grey-3">DELETE THIS HOME >><a/></td>
                                </tr>
                            </table>
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
                                    <td class="td5 oswald"><a href="" class="boton-yellow-1">PREVIEW >><a/><a href="" class="boton-yellow-3">ADD THIS HOME >><a/></td>
                                </tr>
                                <tr>
                                    <td class="td1 oswald" ><a href=""><img src="images/plus-icon.png"/></a></td>
                                    <td class="td2 no-house-thumb"></td>
                                    <td class="td3 oswald"><p>No info available<p></td>
                                    <td class="td4"><img src="images/black-star.png" /></td>
                                    <td class="td5 oswald"><a href="" class="boton-yellow-1">PREVIEW >><a/><a href="" class="boton-yellow-3">ADD THIS HOME >><a/></td>
                                </tr>
                                <tr>
                                    <td class="td1 oswald" ><a href=""><img src="images/plus-icon.png"/></a></td>
                                    <td class="td2 no-house-thumb"></td>
                                    <td class="td3 oswald"><p>No info available<p></td>
                                    <td class="td4"><img src="images/black-star.png" /></td>
                                    <td class="td5 oswald"><a href="" class="boton-yellow-1">PREVIEW >><a/><a href="" class="boton-yellow-3">ADD THIS HOME >><a/></td>
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
                            </div>
                    </section>
            </div>
<?php include 'layout/footer.php';?>
