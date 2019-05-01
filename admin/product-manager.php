<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   <title>Replace Textarea by Code</title>
   <script src="../static/ckeditor/ckeditor.js"></script>
   <script src="../static/js/myjs.js"></script>
</head>

<body>
   <form action="" method="post">
       <input type="text" name="action">
       <textarea id="editor1" name="editor1">
       </textarea>
       <input type="submit" name="Submit" value="Submit">
   </form>
   <div>
   	<?php 
		if(isset($_POST['Submit'])){
			$data = $_POST['editor1'];
			echo $data;
		}
 	?>
 	
 </div>
   <script>
          CKEDITOR.replace( 'editor1', {
	        width: '700px',
	        resize_enabled : false
	      	});
          configCK();
    </script>    
</body>
</html>