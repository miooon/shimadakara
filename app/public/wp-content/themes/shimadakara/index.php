<?php
/*
Template Name: シマダカラトップページ-テンプレート
*/
get_header(); ?>
	
	<h2>おしらせ</h2>
	<?php /*おしらせ投稿start*/
	$args = array(
	  'post_type' => 'information', /* カスタム投稿名 */
	  'posts_per_page' => 2, /* 表示する数 */
	); ?>
	<?php $my_query = new WP_Query( $args ); ?>
	<div class="infoBlog">
	<?php while ( $my_query->have_posts() ) : $my_query->the_post(); ?>
	    
    	<div class="information">
    		<ul>
    			<li><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_excerpt(); ?>（<?php the_date(); ?>）</a></li>
    		</ul>
		</div>
	  
	<?php endwhile; ?>
	</div>
	<?php wp_reset_postdata();/*おしらせ投稿end*/ ?>

	<h2>イベント</h2>
	<?php /*イベント投稿start*/
	$args = array(
	  'post_type' => 'event', /* カスタム投稿名 */
	  'posts_per_page' => 6, /* 表示する数 */
	); ?>
	<?php $my_query = new WP_Query( $args ); ?>
	<div class="infoBlog">
	<?php while ( $my_query->have_posts() ) : $my_query->the_post(); ?>
	    
    	<div class="infomation">
    		<dl>
    			<dt><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail('thumb_event'); ?></a></dt>
    			
    			<dd><?php echo get_post_meta($post->ID, '開催日', true); ?></dd>
				<dd><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_excerpt(); ?></a></dd>
    		</dl>
		</div>
	  
	<?php endwhile; ?>
	</div>
	<?php wp_reset_postdata();/*イベント投稿end*/ ?>

	<h2>アーティスト</h2>

	<h3>浜比嘉島</h3>
	<ul id="news">
	<?php
	$hamahiga_art = get_posts(array(
	    'post_type' => 'post', // 投稿タイプ
	    'category_name' => 'hamahiga', // カテゴリをスラッグで指定する場合
	    'orderby' => 'date', // 表示順の基準
	    'order' => 'DESC' // 昇順・降順
	));
	global $post;
	if($hamahiga_art): foreach($hamahiga_art as $post): setup_postdata($post); ?>
	 
	<!-- ループはじめ -->
	<li>
	  	<?php if (has_post_thumbnail()) : ?>
        	<dl>
        		<dt><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail('thumb_artist'); ?></a></dt>
        		<dd><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
        			<div class="title"><?php the_title(); ?></div>
        			<div class="day"><?php the_date(); ?></div>
        			<p class="tag"><?php the_tags('', ' '); ?></p>
        		</a></dd>
        	</dl>
	    <?php else : ?>
	        <dl>
	        	<dt><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><img src="<?php bloginfo('template_url'); ?>/img/blog_noimage.gif" width="150" height="150" alt="デフォルト画像" /></a></dt>
        		<dd><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
        			<div class="title"><?php the_title(); ?></div>
        			<div class="day"><?php the_date(); ?></div>
        			<p class="tag"><?php the_tags('', ' '); ?></p>
        		</a></dd>
	        	</dl>
	       	</a>
	    <?php endif ; ?>
	  </li>
	<!-- ループおわり -->
	 
	<?php endforeach; endif; wp_reset_postdata(); ?>
	</ul>

	<h3>宮城島</h3>
	<ul id="news">
	<?php
	$miyagi_art = get_posts(array(
	    'post_type' => 'post', // 投稿タイプ
	    'category_name' => 'miyagi', // カテゴリをスラッグで指定する場合
	    'orderby' => 'date', // 表示順の基準
	    'order' => 'DESC' // 昇順・降順
	));
	global $post;
	if($miyagi_art): foreach($miyagi_art as $post): setup_postdata($post); ?>
	 
	<!-- ループはじめ -->
	<li>
	  	<?php if (has_post_thumbnail()) : ?>
        	<dl>
        		<dt><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail('thumb_artist'); ?></a></dt>
        		<dd><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
        			<div class="title"><?php the_title(); ?></div>
        			<div class="day"><?php the_date(); ?></div>
        			<p class="tag"><?php the_tags('', ' '); ?></p>
        		</a></dd>
        	</dl>
	    <?php else : ?>
	        <dl>
	        	<dt><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><img src="<?php bloginfo('template_url'); ?>/img/blog_noimage.gif" width="150" height="150" alt="デフォルト画像" /></a></dt>
        		<dd><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
        			<div class="title"><?php the_title(); ?></div>
        			<div class="day"><?php the_date(); ?></div>
        			<p class="tag"><?php the_tags('', ' '); ?></p>
        		</a></dd>
	        	</dl>
	       	</a>
	    <?php endif ; ?>
	  </li>
	<!-- ループおわり -->
	 
	<?php endforeach; endif; wp_reset_postdata(); ?>
	</ul>

	

<?php get_footer();
