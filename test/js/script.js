$(document).ready(function() {
	$('#yearlist').change(function() {
		
		//save the selection as a variable
		var selectedYear = $(this).val();
		
		$.get("change_query.php?selectedYear="+selectedYear+"&level=1", function(data){
      		$('div.makeResult').html(data);
			
			//also watch for makelist being changed
			$('#makelist').change(function() {
		
				//save the selection as a variable
				var selectedMake = $(this).val();
				
				//if makelist is changed, send var to php file
				$.get("change_query.php?selectedYear="+selectedYear+"&selectedMake="+selectedMake+"&level=2", function(data){
      				$('div.modelResult').html(data);
					
					//also watch for modellist being changed
					$('#modellist').change(function() {
						
						//save the selection as a variable
						var selectedModel = $(this).val();	
						
						//if modellist is changed, send var to php file
						$.get("change_query.php?selectedYear="+selectedYear+"&selectedMake="+selectedMake+"&selectedModel="+selectedModel+"&level=3", function(data){
      						//when changes are made, put them in this div:
							$('div.trimResult').html(data);
							
							//finally, watch if trimlist is changed
							$('#trimlist').change(function() {
								
								//save the selection as a variable
								var selectedTrim = $(this).val();	
								
								$.get("change_query.php?selectedYear="+selectedYear+"&selectedMake="+selectedMake+"&selectedModel="+selectedModel+"&selectedTrim="+selectedTrim+"&level=4", function(data){
									
									//when changes are made, put them here:
									$('div.finalResult').html(data);
									
								});//end trimlist get function
								
							});//end trimlist watch
					
						});//end get for modelList query
						
					});//end modellist change function
					
				});
		
			});//end makelist change function
				
   		 });//end get function
		 
	});//end yearlist change function	

	

});//end ready function



