<!DOCTYPE html>
<html>
	<head <?php language_attributes(); ?>>
    	<meta charset="<?php bloginfo('charset'); ?>">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title><?php wp_title(''); ?></title>
		<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico" type ="image/x-icon" />
		<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico" type ="image/x-icon"/>
		
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<title>Japan Impact new beautiful website</title>
		
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
				<a class="navbar-brand" href="#"><img alt="Japan Impact" src="<?php echo get_template_directory_uri(); ?>/images/logo-b.png" width="50%"></a>
			  </div>
			  <div class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
				  <li class="active" id="menuLink"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a></li>
				   <?php 
				   /* Creation du menu dynamiquement */
					 	$menu_name = 'header-menu';
					 	if ( ( $locations = get_nav_menu_locations() ) && isset( $locations[ $menu_name ] ) ) 
					 	{
					 		$menu_array = array();
							$menu = wp_get_nav_menu_object( $locations[ $menu_name ] );

							$menu_items = wp_get_nav_menu_items($menu->term_id);
							$menu_list = '';
							/**
								Organise le menu dans un array comme cela :
								Array ( [145] => Array ( [name] => Éditions Précédentes
														 [url] => http://127.0.0.1/wordpress/?page_id=42 )
										[141] => Array ( [name] => horaire 
														 [url] => http://127.0.0.1/wordpress/?page_id=131 ) 
										[143] => Array ( [name] => Comité 
														 [url] => http://127.0.0.1/wordpress/?page_id=44 
														 [0] => Comité 2010 
														 [1] => Comité 2009 ) 
										)
							*/
							foreach ( (array) $menu_items as $key => $menu_item ) 
							{
								$title = $menu_item->title;
								$url = $menu_item->url;
								$id = $menu_item->ID;
								$id_parent = $menu_item->menu_item_parent;
								$post_par = $menu_item->post_parent;
								if($id_parent == 0 ) // si c'est un parent
								{
									$menu_array[$id] = array();
									$menu_array[$id]['name'] = $title;
									$menu_array[$id]['url'] = $url;
								}
								else // c'est un enfant
								{
									$item = '<a href="'.$url.'">'.$title.'</a>';
									array_push($menu_array[$id_parent],$item);
								}
							}
							
							/* Création du code html selon l'array */
							foreach((array) $menu_array as $element )
							{
								if(count($element) == 2) // c'est un parent sans enfant
								{
									$menu_list .= '<li id="menuLink"><a href="'.$element['url'].'">'. $element['name'].'</a></li>';
								}
								else // c'est un parent avec enfant
								{
									// dropdown header
									$menu_list .= '<li class="dropdown" id="menuLink">';
									$menu_list .= '<a href="'.$element['url'].'" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">'.$element['name'].'<span class="caret"></span></a>';
									// dropdown item
									$menu_list .= '<ul class="dropdown-menu">';
									foreach(array_slice($element, 2) as $item)
									{
										$menu_list .= '<li>'. $item.'</li>';
									}
									$menu_list .= '</ul></li>';
								}
							}
						} else 
						{
							$menu_list = '<li  id="menuLink">Menu "' . $menu_name . '" not defined.</li>';
						}
						echo $menu_list;
				// $menu_list now ready to output
				 ?>
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
		 <?php /*  wp_nav_menu( array('menu' => 'Nav Menu' ,
		 							'container' => 'div',
		 							'container_class' => 'navbar-collapse collapse',
		 							'menu_class' => 'nav navbar-nav' )); */?>
		
