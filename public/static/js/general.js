$(document).ready(function(){
    //DROPDOWN
    try {
        oHandler = $(".mydds").msDropDown().data("dd");
        oHandler.visible(true);
        
        $("#ver").html($.msDropDown.version);
    } catch(e) {
    //alert("Error: "+e.message);
    }
    // HIDE MENU PARTENERS / TRAVEL / LIVING
    $('.hide_option').click(function() {
        if(!$(this).hasClass('press')) {
            $(this).addClass('press');
            $('.living_content').slideUp();
        }else {
            $(this).removeClass('press');
            $('.living_content').slideDown();
        }
    });
    $('.location_map_item .tick_map ').hover(function() {
        var destino = $(this).attr('rel');
        $(this).prev().addClass('grey');
        //console.log(test)
        $(destino).css({
            'z-index' : '6'
        });
    }, function() {
        var destino = $(this).attr('rel');
        //console.log(destino)
        $(destino).css({
            'z-index' : '1'
        });
        $(this).prev().removeClass('grey');
    });
    var cats = $('.cats');
    var mainMenu = $('ul.menulat li')
    mainMenu.click('toggle',function() {
        $('ul.menulat li' , this).children('a').removeClass('color');
        $('ul.menulat li.active').children('a').removeClass('title2');
        $('ul.menulat li.active').removeClass('active');
        $(this).addClass('active');
        $('ul.menulat li' , this).children('a').addClass('color');
        $('ul.menulat li.active').children('a').fadeIn().addClass('title2');
        //me fijo si se esta animado en la ul
        if ($('.menulat ul:animated').size() == 0) {
            $esto = $(this);
            $expandidoHijos = $esto.siblings().find('ul:visible');
            //su alguno esta visible lo oculto y abro el selccionado
            if ($expandidoHijos.size() > 0) {
                $('ul.cats a.sub').removeClass('submenu');//remueve lac lase de activo del submenu en cuando saca todos los submenu
                $expandidoHijos.slideUp(300, function(){
                    $esto.find('ul').slideDown(500);
                });
            }
            else {
                //si ninguno esta abierto abro el seleccionado
                $esto.find('ul:hidden').slideDown(700);
            }
        }
    });
    //dejo activo el submenu para la navegacion
    $('ul.cats a.sub').click(function() {
        $('ul.cats a.sub').removeClass('submenu');
        $(this,this).addClass('submenu');
    });
    $(".location_map_item .tick_map").append("<em></em>");
    $(".location_map_item .tick_map").hover(function() {
        $(this).find("em").stop(true, true).animate({
            opacity: "show", 
            top: "-95"
        }, "slow");
        //var hoverText = $(this).attr("title");
        var hoverText = $(this).next().text();
        console.log(hoverText);
        $(this).find("em").text(hoverText);
    }, function() {
        $(this).find("em").stop(true, true).animate({
            opacity: "hide", 
            top: "-85"
        }, "fast");
    });
    $('.open').toggle(function() {
        $(this).find('p').toggle();
        $('.moreoptions ').slideDown();
    }, function () {
        $('.moreoptions').slideUp();
        $(this).find('p').toggle();
    });
    $('#pestana-buy-lat').click(function () {
        $('#cuerpo-search-rent-lat').hide();
        $(this).addClass();
        $('#cuerpo-search-buy-lat').show();
    });
    $('#pestana-rent-lat').click(function () {
        $('#cuerpo-search-buy-lat').hide();
        $(this).addClass();
        $('#cuerpo-search-rent-lat').show();
    });
    $('.switchBuyRentMap').click(function(){
        var idMostrar = $(this).attr("id");
        if(idMostrar == "pestaña-adv-buy"){
            var idOcultar = "pestaña-adv-rent"
            }
        else{
            var idOcultar = "pestaña-adv-buy";
        }
        if($("#"+idMostrar+"-map").hasClass('hided-now')){
            $("#"+idMostrar+"-map").removeClass('hided-now');
            $('#'+idOcultar+"-map").addClass('hided-now');
        }
    });
    $('.switchBuyRent').click(function(){
        var idMostrar = $(this).attr("id");
        if(idMostrar == "pestaña-adv-buy"){
            var idOcultar = "pestaña-adv-rent"
            }
        else{
            var idOcultar = "pestaña-adv-buy";
        }
        if($("#"+idMostrar+"-blk").hasClass('hided-now')){
            $("#"+idMostrar+"-blk").removeClass('hided-now');
            $('#'+idOcultar+"-blk").addClass('hided-now');
        }
    });
    $('#pestaña-adv-buy').click(function(){
        $(this).removeClass('actualmente-hidden');
        $('#pestaña-adv-rent').addClass('actualmente-hidden');
    });
    $('.cargoContactForm').click(function(){
        mostrarContactoForm();
    })
    $('.ocultoContactForm').click(function(){
        ocultoContactoForm();
    })
    //funcion para deslizar o esconder elementos
    $('.trigger-sh').click(function(){
        mostrarEsconder($(this).attr("id"));
    });
    $("#listings-about-form label").click(function(){
        changeCheckbox($(this).attr("for"),"label-activo");
    });
    $(".omi-check label").click(function(){
        changeCheckbox($(this).attr("for"),"label-activo");
    });
    $(".ejecuto-label-rojo").click(function(){
        changeCheckbox($(this).attr("for"),"label-activo-rojo");
    });
    $(".ejecuto-label-negro").click(function(){
        changeCheckbox($(this).attr("for"),"label-activo-negro");
    });
    $(".label-radio").click(function(){
        changeCheckboxRadio($(this).attr("id"));
    });
    $(".solo-check-img-black").click(function(){
        changeCheckbox($(this).attr("for"),"label-activo-solo-check-black");
    });
    $(".showAmenitiesBuy").click(function(){
        if($(this).hasClass("elemHid")){
            $(".contenedor-picks-1").removeClass("hided-now");
            $(this).removeClass("elemHid")
        }else{
            $(".contenedor-picks-1").addClass("hided-now");
            $(this).addClass("elemHid");
        }
    });
    $(".showOutBuildingsBuy").click(function(){
        if($(this).hasClass("elemHid")){
            $(".contenedor-picks-2").removeClass("hided-now");
            $(this).removeClass("elemHid")
        }else{
            $(".contenedor-picks-2").addClass("hided-now");
            $(this).addClass("elemHid");
        }
    });
    $(".showAppliancesBuy").click(function(){
        if($(this).hasClass("elemHid")){
            $(".contenedor-picks-3").removeClass("hided-now");
            $(this).removeClass("elemHid")
        }else{
            $(".contenedor-picks-3").addClass("hided-now");
            $(this).addClass("elemHid");
        }
    //$("#contenedor-picks-3").slideToggle('slow');
    });
    $(".texto-input-defecto").click(function(){
        eliminarTextoDefecto(this);
    });
    $(".texto-input-defecto").focus(function(){
        eliminarTextoDefecto(this);
    });
    /* agregar-material-actualizado*/
    $("#show-image-gal-btn").click(function(){
        showImageGal();
    });
    $("#show-video-gal-btn").click(function(){
        showVideoGal();
    });
/* termina-material-actualizado*/
});
/* agregar-material-actualizado*/
function showVideoGal(){
    if($("#blok-videos-slidr").hasClass("hiden-now")){
        $("#blok-imagenes-slidr").addClass("hiden-now");
        $("#blok-videos-slidr").removeClass("hiden-now");
    }
}
function showImageGal(){
    if($("#blok-imagenes-slidr").hasClass("hiden-now")){
        $("#blok-videos-slidr").addClass("hiden-now");
        $("#blok-imagenes-slidr").removeClass("hiden-now");
    }
}
/* termina-material-actualizado*/
function mostrarOcultarElem(elem){
    if($(".contenedor-picks-3").hasClass("hiden-now")){
        alert("conchadet");
        $(".contenedor-picks-3").removeClass("hided-now");
    }else{
        $(".contenedor-picks-3").addClass("hided-now");
    }
}
function mostrarContactoForm(){
    if($(".tipo-profile-agente-contact-right").hasClass("actualmente-hidden")){
        $(".tipo-profile-agente-contact-right").removeClass("actualmente-hidden");
        $(".tipo-profile-agente-right").addClass("actualmente-hidden");
    }
}
function ocultoContactoForm(){
    if($(".tipo-profile-agente-right").hasClass("actualmente-hidden")){
        $(".tipo-profile-agente-contact-right").addClass("actualmente-hidden");
        $(".tipo-profile-agente-right").removeClass("actualmente-hidden");
    }
}
//las clases trigger-sh ejecutar el triger y el id del elemento a animat tiene el formato "idElementoTrigger"+"-hiddable"
function mostrarEsconder(idElem){
    $("#"+idElem+"-hiddable").slideToggle('slow');
}
function changeCheckbox(forVal,classActivoName){
    $('#'+forVal).trigger('change');
    if(!$("#label-"+forVal).hasClass(classActivoName)){
        $("#label-"+forVal).addClass(classActivoName);
    }else{
        $("#label-"+forVal).removeClass(classActivoName);
    }
}
function changeCheckboxRadio(idVal){
    var id=idVal.split("label-");
    var id=id[1];
    $('#'+id).trigger('click');
    if(!$("#label-"+id).hasClass("label-activo-radio")){
        $("#label-"+id).addClass("label-activo-radio");
    }else{
        $("#label-"+id).removeClass("label-activo-radio");
    }
}
function eliminarTextoDefecto(elem){
    if($(elem).hasClass("texto-input-defecto")){
        $(elem).val("");
        $(elem).removeClass("texto-input-defecto");
    }
}