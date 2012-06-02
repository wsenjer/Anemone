<script type="text/javascript">
	function delete_(model,id){
	   if(window.confirm("متأكد؟")){
	       $.ajax({
					method: "POST",
					url: "{$BASE_URL}admincp/"+model+"/delete/"+id,
					data: {},
					success: function(result){
					   
						$("#"+id).css({
							background:'#ff0000'
						});
						$("#"+id).fadeOut("slow");
					
                    
					}//funtion(result)
				}); //ajax 
	   }
	}
</script>