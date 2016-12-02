jQuery(document).ready(function($) {	
	shortcodes();
});

function shortcodes(){
    //tab
    var tabID = 0;
    $('.tabAllHolder').each(function () {
        $(this).attr('id', 'tabs-' + tabID);
        tabID++;
    });

    tabID = 0;
    $('.tabs-container').each(function () {
        $(this).attr('id', 'tabs-' + tabID);
        tabID++;
    });

    (function ($) {

        var titles = new Array();
        var contents = new Array();
		var icons = new Array();
        var IDs = new Array();
		
        $(".tabAllHolder").find(".tab-all").each(function () {
            if ($(this).attr("rendered") != "true") {
                var title = $(this).data("title");	
                var icon = $(this).data("icon");					
                titles.push(title);
				icons.push(icon);
                contents.push($(this).text());
                IDs.push($(this).parent().attr('id'));
				
            }
        });		
		
        $('div').remove('.tabAllHolder');
        $('.tabs-container').each(function () {	
			var tabi = "first";		
            for (var i = 0; i < titles.length; i++) {				
                if (IDs[i] == $(this).attr('id')) {					
					if(tabi!=$(this).attr('id')){
						tabi = ""+ $(this).attr('id');
                    $(this).children('#myTab').append('<li class="active"><a href="#' + i + '" role="tab" data-toggle="tab"><span>' + titles[i] + '</span><i class="fa '+icons[i]+'"></i></a></li>');
                    $(this).children('#myTabContent').append('<div class="tab-pane fade in active" id="'+ i +'"><p class="post-categoty">' + contents[i] + '</p></div>');
                }
				else
				{
				 $(this).children('#myTab').append('<li><a href="#' + i + '" role="tab" data-toggle="tab"><span>' + titles[i] + '</span><i class="fa '+icons[i]+'"></i></a></li>');
                 $(this).children('#myTabContent').append('<div class="tab-pane fade" id="'+ i +'"><p class="post-categoty">' + contents[i] + '</p></div>');
				}
				}
            }
        });

    })(jQuery);
	
	//accordion
    var accID = 0;
	
    $('.accAllHolder').each(function () {
        $(this).attr('id', 'accordion' + accID);
        accID++;
    });

    accID = 0;
    $('.shortcode').each(function () {
		$(this).attr('id', 'accordion' + accID);
        accID++;
    });

    (function ($) {

        var titles = new Array();
        var contents = new Array();
        var IDs = new Array();
		
        $(".accAllHolder").find(".accHeader").each(function () {
            if ($(this).attr("rendered") != "true") {
                var title = $(this).data("title");
                titles.push(title);
                contents.push($(this).text());
                IDs.push($(this).parent().attr('id'));
				
            }
        });		
		
        $('div').remove('.accAllHolder');
        $('.shortcode').each(function () {	
			var tabi = "first";		
		
            for (var i = 0; i < titles.length; i++) {	
					//console.log($(this).attr('id'));
					//console.log(IDs[i]);
                if (IDs[i] == $(this).attr('id')) {	
									
					if(tabi!=$(this).attr('id')){
						tabi = ""+ $(this).attr('id');
                    $(this).append(
					'<div class="panel accordion-item"><div class="accordion-title"><p><a  data-toggle="collapse" data-parent="#'+$(this).attr('id')+'" href="#acc'+i+'">'
						      + ''+ titles[i] +'</a></p></div>'+
					'<div id="acc'+i+'" class="collapse in">'+
						      '<div class="accordion-body">'+
						      	''+
										 contents[i] + 
						      		'</div></div>');					
                  
                }
				else
				{
				   $(this).append(
					'<div class="panel accordion-item"><div class="accordion-title"><p><a  data-toggle="collapse" data-parent="#'+$(this).attr('id')+'" href="#acc'+i+'" class="collapsed">'
						      + ''+ titles[i] +'</a></p></div>'+
					'<div id="acc'+i+'" class="collapse">'+
						      '<div class="accordion-body">'+
						      	''+
										 contents[i] + 
						      		'</div></div>');		
				}
				}
            }
        });

    })(jQuery);
}