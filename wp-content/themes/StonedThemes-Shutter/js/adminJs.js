jQuery(document).live('acf/setup_fields', function(e, div){
	
	var $ = jQuery;
	
	(function(){
	
		//Check slider in single project
		
		$('#acf-gallery1 tr.row').each(function(){
		
			if($(this).find("[data-field_name='type']").find('li:first').find('input').attr('checked')){
					$(this).find("[data-field_name='image']").closest('tr').show();
					$(this).find("[data-field_name='video_url']").closest('tr').hide();
					$(this).find("[data-field_name='video_thumb']").closest('tr').hide();
			}else
			{
					$(this).find("[data-field_name='image']").closest('tr').hide();
					$(this).find("[data-field_name='video_url']").closest('tr').show();
					$(this).find("[data-field_name='video_thumb']").closest('tr').show();
					$(this).find("[data-field_name='crop']").closest('tr').hide();							
			}
		});
		
	})();
	
});


jQuery(document).ready(function($){	
	//on click single project 		
	$("[data-field_name='type']").find('li').find('input').live('click',function(){
		if($(this).attr('value') == 'image'){
			$(this).closest('table').find("[data-field_name='image']").closest('tr').show();			
			$(this).closest('table').find("[data-field_name='crop']").closest('tr').show();
			$(this).closest('table').find("[data-field_name='video_thumb']").closest('tr').hide();
			$(this).closest('table').find("[data-field_name='video_url']").closest('tr').hide();
		}	
		else{
			$(this).closest('table').find("[data-field_name='image']").closest('tr').hide();
			$(this).closest('table').find("[data-field_name='video_url']").closest('tr').show();
			$(this).closest('table').find("[data-field_name='video_thumb']").closest('tr').show();
			$(this).closest('table').find("[data-field_name='crop']").closest('tr').hide();
				
		}
	});
});



	