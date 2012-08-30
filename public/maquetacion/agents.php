<?php include 'layout/header.php';?>            
            <div id="central-content">
                    <p id="my-account" class="oswald">My Account</p>
                    <?php include 'layout/menu-lateral-account-settings.php';?>
                    <section id="block-right">
                            <h2 class="h2-cms oswald">Agents</h2>
                            <p id="number-published"><span>Your current Agents:</span> You have <span>1 of 20</span> Agents Published</p>
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
                                <section id="published">
                                    <h3><span class="oswald">Published</span> (Agents currently visible)</h3>
                                    <table CELLPADDING="0" CELLSPACING="0">
                                        <tr>
                                            <th class="th1"></th>
                                            <th class="th2"></th>
                                            <th class="th3"></th>
                                            <th class="th4"># Listings</th>
                                            <th class="th5"></th>                                            
                                        </tr>
                                        <tr>
                                            <td class="td1"><a href="" class="delete-icon">delete</a></td>
                                            <td class="td2">Member's name</td>
                                            <td class="td3">blackswan@bksn.mx</td>
                                            <td class="td4">3</td>
                                            <td class="td5">
                                                <a href="" class="boton-yellow-1 oswald">EDIT >></a>
                                                <a href="" class="boton-yellow-2 oswald">PREVIEW >></a>
                                                <a href="" class="boton-yellow-2 oswald">UNPUBLISH >></a>
                                            </td>                                            
                                        </tr>
                                        
                                    </table>
                                </section>
                                <hr class="hr-custom" />
                                <section id="draft">
                                    <h3><span class="oswald">Published</span> (Agents currently visible)</h3>
                                    <table CELLPADDING="0" CELLSPACING="0">
                                        <tr>
                                            <th class="th1"></th>
                                            <th class="th2"></th>
                                            <th class="th3"></th>
                                            <th class="th4"># Listings</th>
                                            <th class="th5"></th>                                            
                                        </tr>
                                        <tr class="grey-line-under">
                                            <td class="td1" ><a href="" class="delete-icon">delete</a></td>
                                            <td class="td2">Member's name</td>
                                            <td class="td3">blackswan@bksn.mx</td>
                                            <td class="td4">3</td>
                                            <td class="td5">
                                                <a href="" class="boton-yellow-1 oswald">EDIT >></a>
                                                <a href="" class="boton-yellow-2 oswald">PREVIEW >></a>
                                                <a href="" class="boton-yellow-2 oswald">UNPUBLISH >></a>
                                            </td>                                            
                                        </tr>
                                        <tr class="grey-line-under">
                                            <td class="td1" <a href="" class="delete-icon">delete</a></td>
                                            <td class="td2" >Member's name</td>
                                            <td class="td3" >blackswan@bksn.mx</td>
                                            <td class="td4" >3</td>
                                            <td class="td5" >
                                                <a href="" class="boton-yellow-1 oswald">EDIT >></a>
                                                <a href="" class="boton-yellow-2 oswald">PREVIEW >></a>
                                                <a href="" class="boton-yellow-2 oswald">UNPUBLISH >></a>
                                            </td>                                            
                                        </tr>
                                        <tr>
                                            <td class="td1" ><a href="" class="delete-icon">delete</a></td>
                                            <td class="td2" >Member's name</td>
                                            <td class="td3" >blackswan@bksn.mx</td>
                                            <td class="td4" >3</td>
                                            <td class="td5" >
                                                <a href="" class="boton-yellow-1 oswald">EDIT >></a>
                                                <a href="" class="boton-yellow-2 oswald">PREVIEW >></a>
                                                <a href="" class="boton-yellow-2 oswald">UNPUBLISH >></a>
                                            </td>                                            
                                        </tr>
                                    </table>
                                </section>
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
                                <p class="auto-renewal">Auto Renewal ON</p>
                            </div>
                    </section>
                </div>
<?php include 'layout/footer.php';?>