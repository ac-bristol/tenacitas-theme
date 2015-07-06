<?php /* Template Name: Standard page template */ get_header(); ?>
<?php global $post; ?>
<?php
if (is_mobile()) {
    $src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large');
} else {
	$src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array( 5600,1000 ), false, '' );
}

?>
	<main role="main">
		<!-- section -->
			<?php if(!is_page('contact')) { ?>

			<section class="section section--first" style="background-image: url(<?php echo $src[0]; ?> );">
				<div class="content content--lines">

						<?php if (have_posts()): while (have_posts()) : the_post(); ?>

								<h1><?php the_title(); ?></h1>

							<!-- article -->
							<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

								<?php the_content(); ?>

								<?php comments_template( '', true ); // Remove if you don't want comments ?>

								<br class="clear">

								<?php edit_post_link(); ?>

							</article>
							<!-- /article -->

						<?php endwhile; ?>

						<?php else: ?>

							<!-- article -->
							<article>

								<h2><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h2>

							</article>
							<!-- /article -->

						<?php endif; ?>
						
				</div>
				<a href="#read-more" class="anchor mobile-hide js-ease"><img src="<?php echo get_template_directory_uri(); ?>/img/down-arrow.png" /></a>
			<?php } ?>

			<?php if(is_page('contact')) { ?>
			<section class="section section--first" style="background-image: url(<?php echo $src[0]; ?> );">
				<div class="bg-lines bg-lines--top"></div>
				<div class="content content--padding-top-large content--middle content--serif">

						<?php if (have_posts()): while (have_posts()) : the_post(); ?>

							<!-- article -->
							<article class="content__inner js-show-map" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

								<?php the_content(); ?>

								<?php comments_template( '', true ); // Remove if you don't want comments ?>

								<br class="clear">

								<?php edit_post_link(); ?>

								<a href="#read-more" class="map__button map__button--center js-map-open">View map</a>

							</article>
							<!-- /article -->

						<?php endwhile; ?>

						<?php else: ?>

							<!-- article -->
							<article>

								<h2><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h2>

							</article>
							<!-- /article -->

						<?php endif; ?>

				</div>
				<a href="#read-more" class="anchor mobile-hide js-ease"><img src="<?php echo get_template_directory_uri(); ?>/img/down-arrow.png" /></a>
				<div class="bg-lines bg-lines--bottom"></div>
			<?php } ?>

		</section>

				<?php if(is_page('about')) { ?>

					<section class="section section--pink" id="read-more">

						<div class="content">

							<h2 class="heading heading--line-white">What we do</h2>

							<div class="grid">

								<div class="grid__row">

									<div class="grid__col grid__col--two-col grid__col--first">
										<p>Our clients may need us to provide due diligence on prospective acquisitions or business partners, tackle reputation management issues, conduct internal investigations, trace assets, gather information in business disputes, or diagnose security issues. Trusted with highly sensitive assignments, we respond with accurate information and analysis, working often in countries where the rule of law is arbitrary and weak.</p>
									</div>

									<div class="grid__col grid__col--two-col">
										<p>Today's businesses are exploring inroads in frontier markets across all sectors, from timber to sugar cane, construction to mining, beverages, and finance to pharmaceuticals. Clients in these and many other industries turn to us for practical, actionable advice on barriers, challenges and opportunities.</p>
									</div>

								</div>

							</div><!-- /.grid -->

						</div>

					</section>
					
					<section class="section section--light-blue">

						<div class="content">

							<h2 class="heading heading--line-white">CSR</h2>

							<div class="grid">

								<div class="grid__row">

									<div class="grid__col grid__col--two-col grid__col--first"><?php the_field('content_left'); ?></div>

									<div class="grid__col grid__col--two-col"><?php the_field('content_right'); ?></div>

								</div>

							</div><!-- /.grid -->

						</div>

					</section>

				<?php } ?>

				<?php if(is_page('services')) { ?>

					<section class="section section--red" id="read-more">

						<div class="content">

							<h2 class="heading heading--line-white">How can we help?</h2>

							<div class="grid">

								<div class="grid__row">

									<div class="grid__col grid__col--two-col grid__col--first">
										<p>We can advise on the risks posed by a potential acquisition or new business partner. Or we can address suspicions that a competitor is using unlawful means to obtain a commercial advantage. Or we can address possible data theft, extortion activity, fraud and regulatory infringements.</p>
										<p>Data theft is a disturbingly regular occurrence. When clients face the loss of secure information, we find out who was involved and how the breach may have occurred. We also delve deep to construct a more robust IT network infrastructure and design procedures to mitigate the risk of future breaches.</p>
									</div>

									<div class="grid__col grid__col--two-col">
										<p>Challenges to reputation require swift action. These assaults can lead to visas being revoked, business dealings cancelled or other negative consequences. Clients seek our support in developing and executing an investigative and communications strategy to identify the facts and achieve redress.</p>
										<p>Whether we are conducting a forensic accounting review in the context of a potential regulatory infringement, diagnosing the vulnerabilities of an industrial plant, or delivering high-grade polling research to sovereign governments as part of their implementation of public security reforms, our clients' security and institutional integrity are at the heart of our mission.</p>
									</div>

								</div>

							</div><!-- /.grid -->

						</div>

					</section>

					<section class="section services">								

									<?php
							    $args = array(
							        'post_type' => 'service'
							    );

							    $post_query = new WP_Query($args);

									if($post_query->have_posts() ) {
							  		while($post_query->have_posts() ) {
							    		$post_query->the_post(); ?>
							    		<?php global $post; ?>
											<?php
											$servicesSrc = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array( 5600,1000 ), false, '' );
											?>
											<div class="services__block">
												<div class="services__img" style="background-image: url(<?php echo $servicesSrc[0]; ?> );"></div>
												<div class="services__content" style="background-color:<?php the_field('services_color'); ?>">
													<div class="services__content--align">
														<h2><?php the_title(); ?></h2>
							    					<?php the_content(); ?>	
							    				</div>
												</div>								    			
						    			</div>
							    	<?php } } ?>
					
					</section>

				<?php } ?>		

				<?php if(is_page('team')) { ?>

					<section class="section section--light-blue" id="read-more">

						<div class="content">

							<h2 class="heading heading--line-white">Our team</h2>

							<div class="team">

									<?php
							    $args = array(
							        'post_type' => 'team-member'
							    );

							    $post_query = new WP_Query($args);

									if($post_query->have_posts() ) {
							  		while($post_query->have_posts() ) {
							    		$post_query->the_post(); ?>
							    		<?php global $post; ?>
											<?php
											$newSrc = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array( 5600,1000 ), false, '' );
											?>
							    		<div class="team__item <?php the_ID(); ?> team__wrap" style="background-image: url(<?php echo $newSrc[0]; ?> );">
							    			<div class="team__mask"></div>
							    			<div class="team__cover">
								    			<h2><?php the_title(); ?></h2>
								    			<?php the_field('staff_member_title'); ?>
							    			<!-- <p><?php the_content(); ?></p> -->
							    			</div>							    			
							    		</div>
							    		<div class="team__content <?php the_ID(); ?> team__wrap">
							    			<a href="#" class="js-close"><img src="<?php echo get_template_directory_uri(); ?>/img/close.png" class="team__close" /></a>
						    				<h2><?php the_title(); ?></h2>
						    				<?php the_field('staff_member_title'); ?>
						    				<?php the_content(); ?>
						    			</div>
							    	<?php } } ?>

				    	</div><!-- /.team -->

				   	</div>
					
					</section>

				<?php } ?>	

				<?php if(is_page('contact')) { ?>
					<section class="section section--turquoise" id="read-more">
						<div id="js-map" class="map open"></div>
						<a href="#read-more" class="map__button map__button--bottom map__button--solid js-map-close">Close</a>
					</section>
				<?php } ?>		

				<?php if(is_page('team') || is_page('contact')) { ?>
					<section class="section section--turquoise" id="read-more">
						<div class="content content--padding-bottom">
							<h2 class="heading heading--line-white">Get in touch</h2>
							<div class="grid">
								<div class="grid__row padding-bottom">
									<div class="grid__col grid__col--three-col">
										<div class="contact-box contact-box--line">
											<i class="icon icon--phone contact-box__icon"></i>
											<p class="contact-box__text">Tel: +1 305 672 7920</p>
										</div>
									</div>
									<div class="grid__col grid__col--three-col">
										<div class="contact-box contact-box--line">
											<i class="icon icon--mail contact-box__icon"></i>
											<p class="contact-box__text"><a href="mailto:inquiries@tenacitas-intl.com">inquiries@tenacitas-intl.com</a></p>
										</div>
									</div>
									<div class="grid__col grid__col--three-col">
										<div class="contact-box">
											<i class="icon icon--location contact-box__icon"></i>
											<p class="contact-box__text">
											1395 Brickell Avenue<br />
											Suite 900<br />
											Miami FL 33131
											</p>
										</div>
									</div>
								</div><!-- /.grid__row-->
								<div class="grid__row">
									<div class="grid__col grid__col--one-col">
										<div class="contact-box">	
											<ul class="contact-box__middle-container">
												<li><a href="https://twitter.com/tenacitas_intl"><i class="icon icon--lg-twitter contact-box__icon--left"></i></a></li>
												<li><a href="https://www.linkedin.com/company/2988169?trk=prof-exp-company-name"><i class="icon icon--lg-linkedin contact-box__icon--right"></i></a></li>
											</ul>
										</div>
									</div>
								</div><!-- /.grid__row-->
							</div><!-- /.grid-->
						</div>
					</section>
				<?php } ?>

				<?php if(is_page('news')) { ?>

					<section class="section section--grey news" id="read-more">

						<div class="content content--padding-top">

							<h3 class="heading heading--grey heading--small-margin center">Filter by:</h2>

							<ul class="filter js-filter">
								<!-- <li class="filter__item"><a href="#all" class="filter__button filter__button--first">All</a></li> -->
								<li class="filter__item"><a href="#news" class="filter__button filter__button--first">News</a></li>
								<li class="filter__item"><a href="#insight" class="filter__button">Insight</a></li>
								<li class="filter__item"><a href="#reports" class="filter__button">Exclusive Reports</a></li>
							</ul>

							<ul class="filter filter--margin">
								<li class="filter__item"><a href="#all" class="filter__button filter__button--first js-archive">View archive</a></li>
							</ul>
							

							<div class="news__container" id="js-news-archive">

								<div class="grid-sizer"></div> 
								<div class="gutter-sizer"></div>

								<?php

								    $args = array(
								        'post_type' => 'post'
								    );

						    $counter = 0;

						    $post_query = new WP_Query($args);

								if($post_query->have_posts() ) { ?>
						  		<?php while($post_query->have_posts() ) {
						    		$post_query->the_post(); $counter++;?>
						    		<div class="news__item <?php $cats = get_the_category(); foreach ( $cats as $cat ): echo $cat->name; ?> <?php endforeach; ?>">
						    			<a href="<?php echo get_permalink(); ?>">
							    			<div class="news__img">
							    				<?php
				    			
									    			if ($counter < 5) {
															if( $counter % 2 == 0 ) {
																the_post_thumbnail('thumb-even');
															} else {
																the_post_thumbnail('thumb-odd');
															}
														} else if ($counter === 5 || $counter === 6 || $counter === 9 || $counter === 10 || $counter === 13 || $counter === 14|| $counter === 17 || $counter === 18 || $counter === 21 || $counter === 22) {
															the_post_thumbnail('thumb-even');
														} else {
															the_post_thumbnail('thumb-odd');
														}

													?>
							    				<div class="news__img--hidden">Get the full story &raquo;</div>
							    			</div>
							    			<div class="news__text">
								    			<!-- <h2><?php the_title(); ?></h2> -->
								    			<p class="news__text--date"><?php the_time( get_option( 'date_format' ) ); ?></p>
								    			<div class="news__text--content">
								    				<?php the_title(); ?> 
								    			</div>
								    			<p class="news__text--category <?php $cats = get_the_category(); 
													foreach ( $cats as $cat ): ?>
								        				<?php echo $cat->name; ?>
													<?php endforeach; ?>">
													<?php $cats = get_the_category(); 
													foreach ( $cats as $cat ): ?>
								        				<?php echo $cat->name; ?>
													<?php endforeach; ?>
												</p>
							    			</div>
							    		</a>
						    		</div>
						    	<?php } } ?>

					   	</div>

					   	<div class="news__container--bottom hide">
				   			<a href="#" class="news__button js-viewMore">View more</a>
					   	</div>

			    	</div>

					</section>

				<?php } ?>

	</main>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
