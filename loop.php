<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?> role="article">


								<header class="article-header">

							    <h2 class="post-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a> </h2>
								 <?php
									if( has_post_thumbnail( $post->ID ) ) {
										$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID) , 'featured-loop' );
								?>
										<a class="thumbnail loop-featured-image" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
											<img src="<?php echo $image[0]; ?>" title="<?php the_title(); ?>" alt="<?php the_title(); ?>" />
										</a>
								<?php
									}
								?>

								<p class="post-title-meta">
									<span class="fa fa-user"></span> <?php _e("By ", "kodehelp"); the_author_posts_link();?><?php _e('  '); ?><span aria-hidden="true" class="fa fa-calendar"></span>
									<?php if ($dateformat == 'default') {
											the_time(get_settings('date_format'));
										  } else {
											the_time('F j, Y');
									} ?>
									<span class="fa fa-clock-o"></span> <?php _e('at'); ?> <?php the_time() ?> &#183; <span class="fa fa-tag"></span> <?php the_category(', ') ?>
								</p>

						    </header> <!-- end article header -->

								<section class="entry-content clearfix">
									<?php the_excerpt(); ?>
								</section> <!-- end article section -->

								<footer class="article-footer">
									<!--<p class="tags"><?php the_tags( '<span class="tags-title">' . __( 'Tags:', 'skeletontheme' ) . '</span> ', ', ', '' ); ?></p> -->

								</footer> <!-- end article footer -->

								<?php // comments_template(); // uncomment if you want to use them ?>

							</article> <!-- end article -->
							<hr class="cl" />
							<?php endwhile; ?>

									<?php if ( function_exists( 'skeleton_page_navi' ) ) { ?>
											<?php skeleton_page_navi(); ?>
									<?php } else { ?>
											<nav class="wp-prev-next">
													<ul class="clearfix">
														<li class="prev-link"><?php next_posts_link( __( '&laquo; Older Entries', 'skeletontheme' )) ?></li>
														<li class="next-link"><?php previous_posts_link( __( 'Newer Entries &raquo;', 'skeletontheme' )) ?></li>
													</ul>
											</nav>
									<?php } ?>

							<?php else : ?>

									<article id="post-not-found" class="hentry clearfix">
											<header class="article-header">
												<h1><?php _e( 'Oops, Post Not Found!', 'skeletontheme' ); ?></h1>
										</header>
											<section class="entry-content">
												<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'skeletontheme' ); ?></p>
										</section>
										<footer class="article-footer">
												<p><?php _e( 'This is the error message in the index.php template.', 'skeletontheme' ); ?></p>
										</footer>
									</article>

							<?php endif; ?>
