;(function($){
	$(document).ready(function(){
		$("#post-formats-select .post-format").on("click",function(){
			if( $(this).attr("id") == "post-format-image" ){
				$("#_first_image_information").show();
			}
			else{
				$("#_first_image_information").hide();
			}
		});

		if(first_pf.format != "image" ){
			$("#_first_image_information").hide();
		}
	});
})(jQuery);