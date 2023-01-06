
$(function(){

	
	
});



function dd_menu(){

if (!$("#more_menu").hasClass("clicked")){
	
$("#more_menu").addClass("js-clicked clicked");	
$("#more_menu_show").show();	

} else {
	
$("#more_menu_show").hide();
$("#more_menu").removeClass("js-clicked clicked");

}	
	
	return false;
}






function dd_menu_mess(){
	
if (!$("#more_menu").hasClass("js-clicked")){
	
$("#more_menu").addClass("js-clicked");	
$("#more_menu_show").show();	

} else {
	
$("#more_menu_show").hide();
$("#more_menu").removeClass("js-clicked");

}	
	
	return false;
}



function dd_messages(evt){
	
if (!$("#"+evt.id+"").hasClass("js-clicked")){
	
$("#"+evt.id+"").addClass("js-clicked");	
$("#moremess_"+evt.id).show();	
	

} else {
	
$("#moremess_"+evt.id).hide();
$("#"+evt.id+"").removeClass("js-clicked");

}	
	
	return false;
}

