jQuery(function() { 
		
		jQuery('span').click(function(e) {
		
		 //alert($(this).attr('id'));
		 //alert($(this).text());
		 //alert($("#currentTime").val());
		var url = siteurl+"script.php?ID="+jQuery(this).attr('id')+"&time="+jQuery("#currentTime").val();
		
		//alert(url); 
		 
		jQuery.ajax({
		type: "POST",
		url: url, 
		success: function(data) 
		 {
			
			//alert(data);
			return false;	 

		 }
		
		});
		
		 
		 
		 
		
		});
		
			
		});
		
		
		function karaokeimg(src)
		{
		
		  //alert(src);
		  var url = siteurl+"iscript.php?ID="+src+"&time="+jQuery("#currentTime").val();
		  
		  jQuery.ajax({
		  type: "POST",
		  url: url, 
		  success: function(data) 
		  {
			
			//alert(data);
			return false;	 

		  }
		
		});
		  
		  
		
		}
		
		
		function ontimeupdate(currentTime, duration)
		{
		
		jQuery("#currentTime").val(currentTime);
		jQuery("#duration").val(duration);
		
		}