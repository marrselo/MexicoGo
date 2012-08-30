$(document).ready(function(){

	$("#listings-about-form label").click(function(){
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
        
});
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