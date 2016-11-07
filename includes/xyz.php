
	



<input type="button" id="Like" value="Like"/>


<script type="text/javascript">
$('#Like').click(function() {
   if ($(this).val() == "Like") {
      $(this).val("Unlike");
  
   }
   else {
      $(this).val("Like");
    
   }
});
</script>