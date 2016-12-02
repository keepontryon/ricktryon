var history_count = 0;

var historyLinks = new Array();
historyLinks.push(document.URL);
currentLink = 0;

jQuery(document).ready(function($){

    //ajax on click menu and buttons
    $("body").on("click",".menu a, .st_ajaxLink, .st_ajaxLink a",function(e){	

       if(ajaxDisabled==="1"){
            return true;			
        }	
		
	    e.preventDefault();

        $('.main_container').css('height','auto')
        $('.csspinner').css('display', 'block');

        if($('.main-menu').hasClass('open')){
            $('.main-menu').removeClass('open');
        }

		//History Add link
		currentLink++;
		historyLinks[currentLink] = jQuery(this).attr("href");
		
        var url = jQuery(this).attr("href");
        var this_item = $(this);

        $.post(url, { sth_ajax_load_site: true }, function (data) {



			$("a.current_page_item").removeClass("current_page_item");
			this_item.addClass("current_page_item");

			changeURL(url);
               

            $("div.main_container").html(data);
             reloadSocialShares();
           
            history_count = 1;
        })
        .done(function() {
            $('.csspinner').css('display', 'none');
        })
        .error(function () {
                window.location = url;
        });
    });

    /*
        var callThePolice = function(){
            var $id_of_post = $(this).data('id');
            loadligthBox($id_of_post);
        }
        $(document).on("click", ".view", callThePolice);
	*/
	
	/*Ajax For Back Button*/
    window.onpopstate = function (event) {
	   
        if (history_count) {
	
		 if(jQuery(this).attr("target")){
                return true;
            }

            $('.main_container').css('height','auto')
            $('.csspinner').css('display', 'block');
		
			//History go to link
			if(currentLink > 0){
				currentLink--;
			}
			if (historyLinks.length > 0){
				var url = historyLinks[currentLink];	
			}
			else{
				 window.history.go(-1);
			}
			
            var this_item = $(this);
			 //jQuery('#sth_shadow').addClass('active');
			 
            $.post(url, { sth_ajax_load_site: true }, function (data) {
			
	            $("a.current_page_item").removeClass("current_page_item");
	            this_item.addClass("current_page_item");

                changeURL(url);

            $("div.main_container").html(data);
                 reloadSocialShares();
          
            history_count = 1;

            })
             .done(function() {
                $('.csspinner').css('display', 'none');
            })
             .error(function () {
                    window.location = url;
            });
        }
    };

     //IF - IE hash is included than redirect to
    if(window.location.hash != ''){
        var hash = window.location.hash;
        hash = hash.replace('#!', " ")
        window.location = hash;
    }

});

function reloadSocialShares(){
    if(typeof twttr != 'undefined'){
        twttr.widgets.load();
    }
    if(typeof FB != 'undefined'){
        FB.XFBML.parse();
    }
    if(typeof IN != 'undefined'){
        IN.parse();
    }
}

function changeURL(path){
    window.scrollTo(0, 0);

    if (typeof(window.history.pushState) == 'function') {
        window.history.pushState(null, path, path);
    }else{
        window.location.hash = '#!' + path;
    }
}
