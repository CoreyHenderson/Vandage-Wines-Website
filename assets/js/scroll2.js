$(document).ready(function(){
	setScroll();
});

function setScroll(){
	$("button").click(function(e){
		e.preventDefault();
		var sectionID = e.currentTarget.id + "Section";
		
		$("html body").animate({
			scrollTop: $("#" + sectionID).offset().top
		}, 1000)
	})
}