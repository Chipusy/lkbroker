<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <link rel="shortcut icon" href="/favicon.ico" />
    <?php include_stylesheets() ?>
    <?php include_javascripts() ?>
  </head>
  <body>
	
	<div id="all">
		<div id="header">
			<div class="logo"><a href="#"><img src="/images/logo.gif" alt="ЛК брокер" /></a></div>
			<div class="contacts">
				<div class="enter"><a href="#">Вход</a></div>
				<table>
					<tr>
						<td>
							<div class="numbers">
								<span class="code">+7(495)</span> 661-72-09<br />   
								<span class="code">+7(495)</span> 585-74-02<br />
								<span class="code">+7(495)</span> 518-76-08
							</div>
						</td>
						<td>
							<div class="numbers_txt">Многоканальные телефоны ежедневно <br /> <b>с 10 до 18 часов</b></div>
						</td>
						<td>
							<div class="icq">
								<span>Он-лайн консультация</span>
								<div class="icq_numbers">429-524-167<br />654-684-543</div>
							</div>
						</td>
					</tr>
				</table>
			</div>
			<div class="clear"><img src="images/spacer.gif" alt="" height="1" /></div>
		</div>
		
		<div class="search">
			<div class="search_right"></div>
			<span><input type="text" class="search_form" value="Что ищем ?" /></span>
			<span><input type="button" value="Поиск" class="search_submit" /></span>
			<div class="example_search">Например: <a href="#">строительная техника</a></div>
			<div class="search_options">+ <a href="#">Расширенный поиск</a></div>
		</div>
		
		<div id="content">
			<div class="left_block">
				<div id="main_menu">
					<?php include_partial('page/menu') ?>
				</div>
				<div class="price"><a href="#">скачать ПРАЙС</a></div>
			</div>
		</div>
		
		<div class="right_block">
			<?php echo $sf_content ?>
		</div>
		
		<div id="footer">
			<div class="left_ftr"></div>
			<div class="right_ftr">
				<span><a href="#"><img src="/images/logo_ftr.gif" alt="ЛК брокер" /></a></span>
				<div class="copyright"> &copy; ООО &quot;ЛК-БРОКЕР&quot; 2008-2010</div>
			</div>
			<div class="middle_ftr">
				<div id="footer_menu">
					<?php include_partial('page/menu', array('active' => 2)) ?>
					<div class="clear"><img src="images/spacer.gif" alt="" height="1" /></div>
				</div>
				<div class="slogan">97% НАШИХ КЛИЕНТОВ ВОЗВРАЩАЮТСЯ К НАМ</div>
			</div>
		</div>	
	</div>
  </body>
</html>
