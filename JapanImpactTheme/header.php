<!DOCTYPE html>
<html>
	<head <?php language_attributes(); ?>>
    	<meta charset="<?php bloginfo('charset'); ?>">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title><?php wp_title(''); ?></title>
		<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" type ="image/x-icon" />
		<link rel="icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" type ="image/x-icon"/>
		<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css">
		
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<title>Japan Impact new beautiful website</title>

		<!-- Bootstrap -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		
		<!--countdown -->
		<script src="countdown/countdown.js"></script>
		
		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
		<?php wp_head(); ?>
	</head>
	<body>
		<!-- need php work -->
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="container">
			  <div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
				  <span class="sr-only">Toggle navigation</span>
				  <span class="icon-bar"></span>
				  <span class="icon-bar"></span>
				  <span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#"><img alt="Japan Impact" src="images/logo-b.png" width="50%"></a>
			  </div>
			  <div class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
				  <li class="active" id="menuLink"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a></li>
				  <li id="menuLink"><a href="#about">About</a></li>
				  <li id="menuLink"><a href="#contact">Contact</a></li>
				  <li class="dropdown" id="menuLink">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
					<ul class="dropdown-menu">
					  <li><a href="#">Action</a></li>
					  <li><a href="#">Another action</a></li>
					  <li><a href="#">Something else here</a></li>
					</ul>
				  </li>
				</ul>
			  </div><!--/.nav-collapse -->
			  <!--countdown script -->
			  <div class="navbar-countdown">
						<script>
							var myCountdown1 = new Countdown({
													year	: 2016,
													month	: 2, 
													day		: 20,
													width	: 100, 
													height	: 30,
													hideLine	: false,
													inline		: true,
													rangeHi		: "month",
													rangeLo		: "days",
													labelText	: 	{
																		second 	: "SECONDS",
																		minute 	: "MINUTES",
																		hour	: "HOURS",
																		day 	: "JOURS",
																		month 	: "MOIS",
																		year 	: "ANNEE"			// <- no comma on last item!
																	}
													});
						</script>
						avant le prochain Japan Impact !
			  </div>
			</div>
		 </nav>
		<!-- old header 
		<header class="site-header">
		<?php if ( dynamic_sidebar('sidebar-4') ) : else : endif; ?>
			<!-- image du header 
			<?php if ( get_header_image() ) : ?>
				<div id="site-header">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
						<img src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="">
					</a>
				</div>
			<?php endif; ?>
			
		</header>
		and old navigation
		<nav id="main-navigation">
			<ul>
				<li class="page_home">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
						Accueil
					</a>
				</li>
			</ul>
			<!-- menu navigation principal 
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu', 'depth' => '1' ) ); /*utiliser depth pour choisir le niveau des pages */?>
		</nav>  
		and old stuff :)
		<div class="page-info">
			<?php if (is_home()) : /*si on est dans la page d'accueil */ ?>
				<h1>Accueil</h1>
			<?php elseif ($post->post_parent == 0) : ?>
				<h1><?php wp_title( ''); ?></h1>
			<?php endif; ?>
			<hr class="content-separator">
		</div>  -->
		