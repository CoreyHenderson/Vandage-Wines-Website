$(document).ready(function(){
	activeNavigation();
});

function activeNavigation(){
	$("li a").click(function(){
		$("li a.active").removeClass("active")
		$(this).addClass("active");
	});
}