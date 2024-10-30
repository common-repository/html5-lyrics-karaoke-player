$(function() { 
		
		$('span').click(function(e) {
		
		 //alert($(this).attr('id'));
		 //alert($(this).text());
		 //alert($("#currentTime").val());
		var url = "script.php?ID="+$(this).attr('id')+"&time="+$("#currentTime").val();
		
		//alert(url); 
		 
		$.ajax({
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
		  var url = "iscript.php?ID="+src+"&time="+$("#currentTime").val();
		  
		  $.ajax({
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
		
		$("#currentTime").val(currentTime);
		$("#duration").val(duration);
		
		}