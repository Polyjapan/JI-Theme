<div class="container">
	<div class="leftPoster" <?php if ( get_header_image() ) : ?>
						style="background-image:url(<?php header_image(); ?>)"
			<?php endif; ?> >
			
	</div>
	<div class="rightContent">
		<?php
				// TODO transform that in a plugin
				/*$uri = dirname(__FILE__).'/slider';
				$files = scandir($uri,1);
				$i = 0;
				
				$indicators = '<div id="JI_slider">
				<div id="myCarousel" class="carousel slide" data-ride="carousel"><ol class="carousel-indicators">';
				$wrappers = '<div class="carousel-inner" role="listbox">';
				$arrows = '<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
				<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			  </a>
			  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
				<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			  </a>		</div>
</div>';
				foreach($files as $file)
				{
					if($file != '.' && $file != '..')
					{
						$name = substr($file, 0, -4);
						$link = "http://www.japan-impact.ch/fr/programme/".$name.'/';

						if($i == 0)
						{
							$indicators .= '<li data-target="#myCarousel" data-slide-to="'.$i.'" class="active"></li>';
							$wrappers .= '<div class="item active">
											<a href="'.$link.'">
											<img src="'.get_template_directory_uri().'/slider/'.$file.'" alt="'.$file.'" >
											</a>
										</div>';
						}
						else
						{
							$indicators .= '<li data-target="#myCarousel" data-slide-to="'.$i.'"></li>';
							$wrappers .= '<div class="item">
											  <a href="'.$link.'" ><img src="'.get_template_directory_uri().'/slider/'.$file.'" alt="'.$file.'"></a>
											</div>';
						}
					}
					$i++;
				}
				$indicators .= '</ol>';
				$wrappers .= '</div>';
				
				if($i >= 2)
				{
					echo $indicators;
					echo $wrappers;
					echo $arrows;
				}*/
			?>
		<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>
			<div class="post">
				<h3 class="post-title">
					<?php the_title(); ?>
					<span class="post-info">Posté le <?php the_date(); /* Avec qTranslate : echo qtrans_formatPostDateTime('%d.%m.%y'); */ ?></span>
				</h3>
				<div class="post-content">
					<?php the_content(); ?>
				</div>
			</div>
		<?php endwhile; ?>
	<?php else : ?>
		<p class="nothing">
			Il n'y a pas de Post à afficher !
		</p>
	<?php endif; ?>
	</div>
</div>