
              <?php
                /*
                 * This is the default post format.
                 *
                 * So basically this is a regular post. if you don't want to use post formats,
                 * you can just copy ths stuff in here and replace the post format thing in
                 * single.php.
                 *
                 * The other formats are SUPER basic so you can style them as you like.
                 *
                 * Again, If you want to remove post formats, just delete the post-formats
                 * folder and replace the function below with the contents of the "format.php" file.
                */
              ?>

              <article id="post-<?php the_ID(); ?>" <?php post_class('cf'); ?> role="article" itemscope itemprop="blogPost" itemtype="http://schema.org/BlogPosting">

                <header class="article-header entry-header">

                  <h1 class="entry-title single-title" itemprop="headline" rel="bookmark"><?php the_title(); ?></h1>

                  <p id="post-meta" class="post-title-meta" >
									<span class="fa fa-user"></span> <?php _e("By ", "kodehelp"); the_author_posts_link();?><?php _e('  '); ?><span class="fa fa-calender"></span>
									<?php if ($dateformat == 'default') {
											the_time(get_settings('date_format'));
										  } else {
											the_time('F j, Y');
									} ?>
									<span class="fa fa-clock-o"></span> <?php _e('at'); ?> <?php the_time() ?> &#183; <span class="fa fa-bookmark"></span> <?php the_category(', ') ?>
								</p>

                </header> <?php // end article header ?>
                <section class="entry-content cf" itemprop="articleBody">
                  <?php
                    // the content (pretty self explanatory huh)
                    the_content();

                    /*
                     * Link Pages is used in case you have posts that are set to break into
                     * multiple pages. You can remove this if you don't plan on doing that.
                     *
                     * Also, breaking content up into multiple pages is a horrible experience,
                     * so don't do it. While there are SOME edge cases where this is useful, it's
                     * mostly used for people to get more ad views. It's up to you but if you want
                     * to do it, you're wrong and I hate you. (Ok, I still love you but just not as much)
                     *
                     * http://gizmodo.com/5841121/google-wants-to-help-you-avoid-stupid-annoying-multiple-page-articles
                     *
                    */
                    wp_link_pages( array(
                      'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'skeletontheme' ) . '</span>',
                      'after'       => '</div>',
                      'link_before' => '<span >',
                      'link_after'  => '</span>',
                    ) );
                  ?>
                </section> <?php // end article section ?>

                <section class="tag-section">

                  <?php the_tags( '<p class="tags"><span class="label label-info">' . __( 'Tags:', 'skeletontheme' ) . '</span> ', ', ', '</p>' ); ?>

                </section> <?php // end tag section ?>




                <?php //comments_template(); ?>

              </article> <?php // end article ?>
