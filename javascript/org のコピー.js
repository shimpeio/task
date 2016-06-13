$(function(){
	$("#chara").on("mouseover",function(){
		$("#png").attr("src","chara.gif");
	})
	$("#chara").on("mouseout",function(){
		$("#png").attr("src","anime.png");
	})
})