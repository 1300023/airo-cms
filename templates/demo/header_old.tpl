<!DOCTYPE html>
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>{$title_seo}</title>
{$meta}
<link href="{$templates_patch}css/style.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js"></script>
<script type="text/javascript" src="{$templates_patch}js/jquery.placeholder.min.js"></script>
<script type="text/javascript" src="{$templates_patch}js/jquery.bxslider.min.js"></script>
<script type="text/javascript" src="{$templates_patch}js/func.js"></script>

<script type="text/javascript" src="/templates/demo/js/highslide/highslide-with-gallery.js"></script>
<link rel="stylesheet" type="text/css" href="/templates/demo/js/highslide/highslide.css" />
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
{/literal}
</head>
<body>
	<!-- header -->
  <div class="header">
    <div class="wrap">
    	<div class="hed-top nuclear">
    		<a href="/" class="logo"><img src="{$templates_patch}images/logo.png" alt=""></a>
    		<div class="hed-mdl">
    			<ul class="nav">
    				<li><a href="/"><img src="{$templates_patch}images/n1.png" alt=""></a><img src="{$templates_patch}images/sep.gif" alt=""></li>
    				<li><a href="/karta_saita/"><img src="{$templates_patch}images/n2.png" alt=""></a><img src="{$templates_patch}images/sep.gif" alt=""></li>
    				<li><a href="mailto:info@mastmarket.ru"><img src="{$templates_patch}images/n3.png" alt=""></a></li>
    			</ul>
    			<div class="search nuclear">
    				<form action="" method="post">
    					<input type="text" placeholder="�����" class="inp">
    					<input type="submit" value="�����" class="but">
    				</form>
    			</div>
    		</div>
    		<div class="contact">
    			<span>��� �������    �.������</span>
    			<div class="phone">
    				<span>8(495) <b>554-45-58</b></span>&nbsp;&nbsp;
    				<span>8 (926) <b>911 69 29</b></span>
    			</div>
    			<span class="inf">��������������</span>
    		</div>
    	</div>
    	<div class="hed-mnu">
	    	<ul>
	    		<li><a href="/o_kompanii/">� ��������</a></li>
	    		<li><a href="/produkciya/">���������</a></li>
	    		<li class="active"><a href="/fotogalereya/">�����������</a></li>
	    		<li><a href="/partnery/">��������</a></li>
	    		<li><a href="/rekvizity/">���������</a></li>
	    		<li><a href="/kontakty/">��������</a></li>    		
	    	</ul>
	    </div>
    </div>
  </div>      
  <!--/ header -->
  <!-- top-slider -->
  <div class="top-slider">
		<div class="wrap">
			<div class="mask"></div>
			<div class="sl-wrp"> 
				<div class="ul bxslider">
				  <li><a href="#"><img src="{$templates_patch}images/sl.jpg" alt=""></a></li>
					<li><a href="#"><img src="{$templates_patch}images/sl1.jpg" alt=""></a></li>
					<li><a href="#"><img src="{$templates_patch}images/sl2.jpg" alt=""></a></li>
					<li><a href="#"><img src="{$templates_patch}images/sl3.jpg" alt=""></a></li>
					<li><a href="#"><img src="{$templates_patch}images/sl4.jpg" alt=""></a></li>
					<li><a href="#"><img src="{$templates_patch}images/sl5.jpg" alt=""></a></li>
					<li><a href="#"><img src="{$templates_patch}images/sl6.jpg" alt=""></a></li>
					<li><a href="#"><img src="{$templates_patch}images/sl7.jpg" alt=""></a></li>
					<li><a href="#"><img src="{$templates_patch}images/sl8.jpg" alt=""></a></li>
					<li><a href="#"><img src="{$templates_patch}images/sl9.jpg" alt=""></a></li>
				</div>
			</div>
		</div>		
  </div>
  <!--/ top-slider -->
  <div class="cnt-wrp">
  	<div class="cnt-wrp-in">
  		<div class="wrap nuclear"> 
  			<!-- sidebar 			 -->
  			<div class="sidebar">
  				<ul class="navigation">
  					<li><a href="/">�������</a></li>
  						
  					{$fire_menu}
  					
  					<li><a href="/praislist/">�����-����</a></li>
  					<li><a href="/obratnaya_svyaz/">�������� �����</a></li> 
  					<li><a href="/kontakty/">��������</a></li> 					
  				</ul>
  			</div>
  			<!--/ sidebar -->
  			<!-- content -->
  			<div class="content">
  				<div class="bread-crumbs">
  					<a href="#">�������</a>
  					<span class="sep">/</span>
  					{$title_seo}
  				</div>