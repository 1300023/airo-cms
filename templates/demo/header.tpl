<!DOCTYPE html><head>

<meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
<title>{$title_seo}</title>

{$meta}


<link href="{$templates_patch}css/style.css" type="text/css" rel="stylesheet" />
<link href='http://fonts.googleapis.com/css?family=PT+Sans:400,400italic,700,700italic&amp;subset=latin,cyrillic' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js"></script>
<script type="text/javascript" src="{$templates_patch}js/jquery.placeholder.min.js"></script>
<script type="text/javascript" src="{$templates_patch}js/jquery.bxslider.min.js"></script>

<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.0/jquery.validate.min.js"></script>


<script type="text/javascript" src="{$templates_patch}js/func.js"></script>
<link rel="icon" href="/favicon.ico" type="image/x-icon">
<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">


<script type="text/javascript" src="/highslide/highslide-with-gallery.js"></script>
<link rel="stylesheet" type="text/css" href="/highslide/highslide.css" />
{literal}
<script type="text/javascript">
hs.graphicsDir = '/highslide/graphics/';
hs.align = 'center';
hs.transitions = ['expand', 'crossfade'];
hs.outlineType = 'rounded-white';
hs.fadeInOut = true;
//hs.dimmingOpacity = 0.75;

// Add the controlbar
hs.addSlideshow({
	//slideshowGroup: 'group1',
	interval: 5000,
	repeat: false,
	useControls: true,
	fixedControls: 'fit',
	overlayOptions: {
		opacity: 0.75,
		position: 'bottom center',
		hideOnMouseOut: true
	}
});
</script>
<script>
    $(document).ready(function(){
        $("#contact_form").validate();
      });
        $.validator.messages.required = " <font color='red'>Заполните поле!</font>";
        $.validator.messages.email = "Неверный формат email";
        $.validator.messages.url = "Неверный формат url, начните с http://";
</script> 
{/literal}
</head>
<body>
<div class="bg-layer-1">
	<div class="bg-layer-2">		
		<!-- header -->


	  <div class="header">
	    <div class="wrap-out">

			<div class="hed-top">
				<div class="wrap nuclear">

					</div>
				</div>
			<!--<div class="hed-top">
	    		<div class="wrap nuclear">
	    			<a href="/" class="logo"><img src="{$templates_patch}images/logo.png" alt=""></a>
	    			<div class="slogan">Онлайн мемуары</div>
	    			<div class="phone">
	    				<span class="txt">Связь</span>
						<div class="number"><span>Skype: </span>white_sneg</div>
	    				<div class="number"><span>ICQ: </span>967-043</div>
	    			</div>
	    			<div class="search">
	    				<form action="">
	    					<input type="text" placeholder="Поиск на сайте..." class="inp">
	    					<input type="submit" value="" class="mag">
	    				</form>
	    			</div>
	    		</div>
	    	</div>-->


	    	<div class="hed-mnu">
	    		<div class="wrap">
	    			<div class="menu-wrapper">
	    				<ul class="menu">
	    					<li><a href="/">Главная</a></li>
	    					<li><a href="/o-sebe/">О себе</a></li>
	    					<li><a href="/blog/">Блог</a></li>
	    					<li><a href="/portfolio/">Портфель</a></li>
	    					<li><a href="/project/">Проекты</a></li>
							<li><a href="/sotrudnichestvo/">Сотрудничество</a></li>
	    					<li><a href="https://github.com/1300023" target="_blank">GitHub</a></li>
	    					<li><a href="/kontakty/">Контакты</a></li>
	    				</ul>
	    			</div>
	    		</div>
	    	</div>
	    </div>
	  </div>      
	  <!--/ header -->

	  <div class="cnt-wrp">
	  	<div class="wrap-out">


	  		<!-- slider -->
	  	<!--	<div class="slider-wrp">


	  			<div class="wrap nuclear">
	  			
	  			
	  				<div class="bxslider">
	  				
	  				
	  				
	  					{$slider_big}
	  					
	  					
	  					
	  				</div>
	  			</div>
	  		</div>-->


	  		<!--/ slider -->
	  		<div class="cnt-wrp-in">
	  			<div class="wrap nuclear">
	  			
	  			
	  				<!-- sidebar -->
	  				<div class="sidebar">
	  				
	  					<div class="category-mnu">
		  					<ul>
		  						{$fire_menu}
		  					</ul>
		  				</div>



		  				<div class="news">
		  					    <div class="headline nuclear">
		  						<div class="hd">Новости</div>
		  						<a href="/novosti/" class="all">Все новости</a>
		  					    </div>
		  				     	{$fire_news}
		  				</div>
		  				
		  				
	  				</div>
	  				<!--/ sidebar -->
	  				<!-- content {$title_seo}-->
	  				<div class="content">	
	  					{$breads}