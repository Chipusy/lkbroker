<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <link rel="shortcut icon" href="/favicon.ico" />
    <?php include_stylesheets() ?>
    <?php include_javascripts() ?>
	<script type="text/javascript" src="/js/tiny_mce/tiny_mce.js"></script>
	<script type="text/javascript" src="/highslide/highslide-full.js"></script>
	<link rel="stylesheet" type="text/css" href="/highslide/highslide.css" />
	<script type="text/javascript">
		hs.graphicsDir = "/highslide/graphics/";
		hs.outlineType = "rounded-white";
		hs.wrapperClassName = 'draggable-header';
	</script>
  </head>
  <body>
	<script type="text/javascript" charset="utf-8">
		<?php if ($sf_params->get('module') == 'page'): ?>
			tinyMCE.init({
				mode : "exact",
				elements : "page_content",
				theme : "advanced",
				language: 'en',
				plugins : "safari,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount",
				theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect,|, cut,copy,paste,pasteword,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,image, |,preview, fullscreen, forecolor,backcolor,",
				theme_advanced_buttons2 : '',
				theme_advanced_buttons3 : '',
				theme_advanced_toolbar_location : "top",
				theme_advanced_toolbar_align : "left",
				theme_advanced_statusbar_location : "bottom",
				file_browser_callback : "mceFileUpload",
				theme_advanced_resizing : true,
			});
		<?php elseif($sf_params->get('module') == 'category'): ?>
			tinyMCE.init({
				mode : "exact",
				elements : "category_description",
			});
		<?php endif ?>
	
		function mceFileUpload(field_name, url, type, win)
		{
		    tinyMCE.activeEditor.windowManager.open({
		        file : "/upload/image",
		        title : "Загрузка файла",
		        width : 350,
		        height : 100,
		        resizable : "no",
		        inline : "yes",
		        close_previous : "no"
		    }, {
		        window : win,
		        input : field_name
		    });
		    return false;
		};
	</script>
	
	<div class="menu">
		<a href="<?php echo url_for('category/index') ?>">категории</a> | <a href="<?php echo url_for('page/index') ?>">простые страницы </a> | <a href="<?php echo url_for('element/index') ?>">элементы </a> | <a href="<?php echo url_for('element_status/index') ?>">статусы  элементов</a> | <a href="<?php echo url_for('company/index') ?>"> компании </a>
	</div>
	
	<br>
	
    <?php echo $sf_content ?>
  </body>
</html>
