<?php
	$uuid = md5(uniqid());
?>
<head>
    <title>Загрузка файла</title>
    <script type="text/javascript" src="/js/jquery.js"></script>
    <script type="text/javascript" src="/js/progressbar/jquery.progressbar.min.js"></script>
    <script type="text/javascript" src="/js/tiny_mce/tiny_mce_popup.js"></script>
</head>
<body>
	<script type="text/javascript">
		var progress_key = '<?= $uuid ?>';
		var checkstatus = false;
		jQuery.noConflict();
			jQuery(document).ready(function() {
				jQuery("#uploadprogressbar").progressBar({
					 "barImage": "/js/progressbar/i/progressbg_green.gif"
					 ,"boxImage": "/js/progressbar/i/progressbar.gif"
					 ,"speed": 10
					});
			});
			
			function beginUpload() {
				jQuery('.input_error').text('');
				checkstatus = true;
				runShowUpload();
			}
			
			function stopStatusCheck(data){
				  checkstatus = false;
				  jQuery("#uploadprogressbar").progressBar(100);
				  if(data.redirect){
					  document.location = data.redirect;
				  }
			}
			
			function showUpload() {
				if(!checkstatus){
					return;
				}
				
				try {
						jQuery.getJSON("/uploadstatus.php?upload_key=<?php echo $uuid?>&rnd=" + Math.random(), function(data) {
							if (data){
								var response = data;
								var percentage = Math.floor(100 * parseInt(response['bytes_uploaded']) / parseInt(response['bytes_total']));
								jQuery("#uploadprogressbar").progressBar(percentage);
							}
						});
						
						runShowUpload();
						
					} catch(e) {
						return;
					}
			}
			
			function runShowUpload(){
				setTimeout("showUpload()", 1000);
			}
			
			function handleErrors(errors){
				if(errors.length){
					for(var k in errors){
						jQuery('#input_error_' + errors[k].name).text(errors[k].text);
					}
				}
			}
	</script>
	
	<iframe name="upload_frame" width="1px" height="1px" id="upload_frame" style="display: none;"></iframe>
	<?php if($media_url): ?>

		<script type="text/javascript">
			var FileBrowserDialogue = {
				init : function () { },
				mySubmit : function () {
					var win = tinyMCEPopup.getWindowArg("window");
					win.document.getElementById(tinyMCEPopup.getWindowArg("input")).value = '<?=$media_url?>';
					if (typeof(win.ImageDialog) != "undefined")
					{
						if (win.ImageDialog.getImageData) win.ImageDialog.getImageData();
						if (win.ImageDialog.showPreviewImage) win.ImageDialog.showPreviewImage('<?=$media_url?>');
					}
					
					tinyMCEPopup.close();
				}
			}
			
			tinyMCEPopup.onInit.add(FileBrowserDialogue.init, FileBrowserDialogue);
			
			jQuery(function(){
				FileBrowserDialogue.mySubmit();
			});
		</script>
		
	<?php else: ?>
		
		<?php if(!is_null($error)): ?>
		    <h2>Ошибка:</h2>
		    <?php  switch($error)
		           {
		               case UploadActions::ERROR_MIME:
		                   echo "Неверный тип загруженного файла.";
		                   break;
		               case UploadActions::ERROR_UPLOADING:
		               default:
		                   echo "Не удалось загрузить файл.";
		                   break;
		           };
		    ?>
		<?php endif; ?>
		
		<center>
			<form action="/upload/do" name="FileUploadForm" method="post" enctype="multipart/form-data" onsubmit="beginUpload();" target="upload_frame">
				<input type="hidden" name="UPLOAD_IDENTIFIER" value="<?=$uuid?>" id="progress_key">
				<input type="file" name="upload_file" />
					<p>
						<span class="progressbar" id="uploadprogressbar">0%</span>
						<br class="clearfloat" />
					</p>
				<input type="submit" value="Upload" />
			</form>
		</center>
	<?php endif; ?>
</body>