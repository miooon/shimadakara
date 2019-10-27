<?php
/*
Template Name: シマダカラトップページ-テンプレート
*/
get_header(); ?>

<div id="first">
	<div id="mv">
		<h1><img src="img/logo.svg" alt="うるまシマダカラ芸術祭"></h1>
		<p class="date">開催まであと<span id="days"></span>日</p>
	</div>
	<div class="info">
		<div class="inner">
			<dl>
				<dt><img src="img/date01.svg" width="234" alt="開催期間 2019 11.1(Fri)-10(Sun)"></dt>
				<dd><img src="img/date02.svg" width="99" alt="10:00-17:00 ※時間外に行う企画もあります"></dd>
			</dl>
			<dl>
				<dt><img width="125" src="img/place01.svg" alt="うるま島しょ地域"></dt>
				<dd><img width="189" src="img/place02.svg" alt="メイン会場：旧浜中学校（浜比嘉島）/ 集落展示：伊計島伊計区内、宮城島区内"></dd>
			</dl>
		</div>
		<!-- /.inner -->
	</div>

	<div id="side">
		<div class="inner">
			<div class="insta">
				<dl>
					<dt><div id="instafeed"></div>
					<script>
					$(function(){
						$.ajax({
							type: 'GET',
							url: 'https://graph.facebook.com/v3.0/17841420049072414?fields=name%2Cmedia.limit(1)%7Bcaption%2Clike_count%2Cmedia_url%2Cpermalink%2Ctimestamp%2Cusername%7D&access_token=EAAHUCbq71qwBAF1Snm9OebuUt1FjO7ld1qwZCDtH2CDhTCr9E8RY2WZAJlZAuzpZBJZCsx6qZAxepnMEiIVDMvcnG7oapZAKfnuoxRcfBE2Dq4bbMzr1dltd5nZBwkbrtkEJsXsmSLSE5KiOj9ZB8Prc8Ult3xhpSSwI1YZBvZAHgYl48kNEYmSfpJssbMRxhensrkZD',
							dataType: 'json',
							success: function(json) {
							    	
							    var html = '';
							    var insta = json.media.data;
							    for (var i = 0; i < insta.length; i++) {
							    	html += '<div ><a href="' + insta[i].permalink + '" target="_blank"><img src="' + insta[i].media_url + '"></a></div>';
							    }
							      $("#instafeed").append(html);			
							},
							error: function() {

							//エラー時の処理
							}
						});
					});	
					</script></dt>
					<dd>今日のシマダカラ</dd>
				</dl>
			</div>

			<section>
				<div class="news">
					<h2>おしらせ</h2>
					<?php /*おしらせ投稿start*/
					$args = array(
					  'post_type' => 'information', /* カスタム投稿名 */
					  'posts_per_page' => 2, /* 表示する数 */
					); ?>
					<?php $my_query = new WP_Query( $args ); ?>
					
					<ul>
						<?php while ( $my_query->have_posts() ) : $my_query->the_post(); ?>
						<li><?php echo get_the_excerpt(); ?>（<?php the_date(); ?>）</li>
						<?php endwhile; ?>
					</ul>
					<?php wp_reset_postdata();/*おしらせ投稿end*/ ?>
					<div class="link"><a href="/info/">一覧を読む</a></div>
				</div>
				<div class="down">
					<figure><img src="img/download.png" alt=""></figure>
					<div class="cont">
						<h3><span>公式パンフレット</span>ダウンロード</h3>
						<ul>
							<li><a href="pdf/omote.pdf" target="_blank" title="新しいウィンドウが開きます">表面<br>PDF</a></li>
							<li><a href="pdf/ura.pdf" target="_blank" title="新しいウィンドウが開きます">裏面<br>PDF</a></li>
						</ul>
					</div>
				</div>
			</section>
		</div>
		<!-- /.inner -->
	</div>
</div><!-- /#first -->
<div id="contents">
<main>
	<div id="event">
		<?php /*イベント投稿start*/
		$args = array(
		  'post_type' => 'event', /* カスタム投稿名 */
		  'posts_per_page' => 6, /* 表示する数 */
		); ?>
		<?php $my_query = new WP_Query( $args ); ?>
		<?php while ( $my_query->have_posts() ) : $my_query->the_post(); ?>
		    <ul>
		    	<li>
					<figure><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail('thumb_event'); ?></a></figure>
					<dl>
						<dt><?php echo get_post_meta($post->ID, '開催日', true); ?></dt>
						<dd><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_excerpt(); ?></a></dd>
					</dl>
				</li>
			</ul>
	    <?php endwhile; ?>
		<?php wp_reset_postdata();/*イベント投稿end*/ ?>


		<div class="more"><a href="/event/">一覧を見る</a></div>
	</div>

	<div id="articsts">
		<section>
			<h2><img width="120" src="img/h201.svg" alt="浜比嘉島"></h2>
			
			<ul>
			<?php
			$hamahiga_art = get_posts(array(
			    'post_type' => 'post', // 投稿タイプ
			    'category_name' => 'hamahiga', // カテゴリをスラッグで指定する場合
			    'posts_per_page' => -1 ,
			    'orderby' => 'date', // 表示順の基準
				'order' => 'ASC' // 古いほうが最新
			));
			global $post;
			if($hamahiga_art): foreach($hamahiga_art as $post): setup_postdata($post); ?>
				<li>
					<a href="<?php echo '#modal'; echo get_the_ID(); ?>" title="<?php the_title_attribute(); ?>">
						<figure><?php the_post_thumbnail('thumb_artist'); ?></figure>
						<dl>
							<dt><?php the_title(); ?></dt>
							<dd><?php
									$posttags = get_the_tags();
									$count = count($posttags);
									$loop = 0;
									if ($posttags) {
										foreach ($posttags as $tag) {
											$loop++;
											if ($count == $loop){
												echo $tag->name . '';
											} else {
												echo $tag->name . '・';
											}
										}
									} ?></dd>
						</dl>
					</a>
				</li>
			<?php endforeach; endif; wp_reset_postdata(); ?>
			</ul>
		</section>

		<div class="col">
			<section>
				<h2><img width="90" src="img/h202.svg" alt="宮城島"></h2>
				<ul>
				<?php
					$miyagi_art = get_posts(array(
					    'post_type' => 'post', // 投稿タイプ
					    'category_name' => 'miyagi', // カテゴリをスラッグで指定する場合
					    'posts_per_page' => -1 ,
					    'orderby' => 'date', // 表示順の基準
					    'order' => 'ASC' // 古いほうが最新
					));
					global $post;
					if($miyagi_art): foreach($miyagi_art as $post): setup_postdata($post); ?>
					<li>
						<a href="<?php echo '#modal'; echo get_the_ID(); ?>" title="<?php the_title_attribute(); ?>">
							<figure><?php the_post_thumbnail('thumb_artist'); ?></figure>
							<dl>
								<dt><?php the_title(); ?></dt>
								<dd><?php
									$posttags = get_the_tags();
									$count = count($posttags);
									$loop = 0;
									if ($posttags) {
										foreach ($posttags as $tag) {
											$loop++;
											if ($count == $loop){
												echo $tag->name . '';
											} else {
												echo $tag->name . '・';
											}
										}
									} ?></dd>
							</dl>
						</a>
					</li>
				<?php endforeach; endif; wp_reset_postdata(); ?>
				</ul>
			</section>

			<section>
				<h2><img width="90" src="img/h203.svg" alt="伊計島"></h2>
				<ul>
				<?php
				$ikei_art = get_posts(array(
				    'post_type' => 'post', // 投稿タイプ
				    'category_name' => 'ikei', // カテゴリをスラッグで指定する場合
				    'posts_per_page' => -1 ,
				    'orderby' => 'date', // 表示順の基準
				    'order' => 'ASC' // 古いほうが最新
				));
				global $post;
				if($ikei_art): foreach($ikei_art as $post): setup_postdata($post); ?>
					<li>
						<a href="<?php echo '#modal'; echo get_the_ID(); ?>" title="<?php the_title_attribute(); ?>">
							<figure><?php the_post_thumbnail('thumb_artist'); ?></figure>
							<dl>
								<dt><?php the_title(); ?></dt>
								<dd><?php
									$posttags = get_the_tags();
									$count = count($posttags);
									$loop = 0;
									if ($posttags) {
										foreach ($posttags as $tag) {
											$loop++;
											if ($count == $loop){
												echo $tag->name . '';
											} else {
												echo $tag->name . '・';
											}
										}
									} ?></dd>
							</dl>
						</a>
					</li>
				<?php endforeach; endif; wp_reset_postdata(); ?>
				</ul>
			</section>

			

			<?php
			  $args = array(
				'posts_per_page' => -1 , 
			  );
			  $posts = get_posts( $args );
			  foreach ( $posts as $post ): // ループの開始
			  setup_postdata( $post ); // 記事データの取得
			?>
			<div class="remodal" data-remodal-id="<?php echo 'modal'; echo get_the_ID(); ?>">
			<button data-remodal-action="close" class="remodal-close"></button>
			<div class="inner">
				<figure><?php the_post_thumbnail('thumb_artist_dtls'); ?></figure>
				<div class="cont">
					<dl>
						<dt><?php the_title(); ?></dt>
						<dd><?php
						$posttags = get_the_tags();
						$count = count($posttags);
						$loop = 0;
						if ($posttags) {
							foreach ($posttags as $tag) {
								$loop++;
								if ($count == $loop){
									echo $tag->name . '';
								} else {
									echo $tag->name . '・';
								}
							}
						} ?></dd>
					</dl>
					<div class="info">
						<?php the_content(); ?>
					</div>
				</div>
			</div>
			</div>
			<?php endforeach; // ループの終了
				  wp_reset_postdata(); // 直前のクエリを復元する
			?>
		</div><!-- /#articsts -->


		<div id="access">
		<h2><img width="105" src="img/h204.svg" alt="アクセス"></h2>

		<div class="col">
			<figure><img src="img/map.png" alt=""></figure>
			<div class="map">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1339.5029120439333!2d127.9533801982625!3d26.325083798917973!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x34e509be3dfdf2f7%3A0x336581ca2b1f1d9c!2z5rWc5Lit5a2m5qCh!5e0!3m2!1sja!2sjp!4v1571809030597!5m2!1sja!2sjp" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
			</div>
		</div>
	</div>

	<div id="aboutBlock">
		<div class="col">
			<section id="about">
				<h2><img width="270" src="img/h205.svg" alt="シマダカラ芸術祭とは"></h2>
				<div class="inner">
					<p>2012年から2017年まで開催された「イチハナリアートプロジェクト」は、うるま市の5つの島々を舞台に、多くの人々がアートに親しむ機会をつくりだしてきました。その後、島人や作家を中心に、島で行うアートプロジェクトのあり方を考える対話を重ね、イチハナリアートプロジェクトは「うるまシマダカラ芸術祭」に生まれ変わりました。</p>
					<p>うるまシマダカラ芸術祭の「シマダカラ」には「それぞれの島に存在する人、文化、自然などはシマ（島）のタカラ（宝）である」という意味と、「シマダカラ（島だから）できる芸術祭をめざす」という2つの意味があります。<br>島という資源の少ない環境で「手元にあるモノを活かして暮らしを紡いできた創造力」。外から来た異質な存在である「マレビトを取り入れてきたダイナミズム」。現代アート、デザイン、食、工芸など約30組の作家たちが島に通いながら、島人と共に多彩な作品を生みだしました。</p>
					<figure><img src="img/fig.svg" alt=""></figure>
				</div>
				<!-- /.inner -->
			</section>

			<section id="place">
				<h2><img width="112" src="img/h206.svg" alt="開催概要"></h2>
				<div class="inner">
					<table>
						<tr>
							<th>会期</th>
							<td>:</td>
							<td>2019年11月1日（金）～11月10日（日）</td>
						</tr>
						<tr>
							<th>時間</th>
							<td>:</td>
							<td>10時～17時　※時間外に行う企画もあります</td>
						</tr>
						<tr>
							<th>会場</th>
							<td>:</td>
							<td>うるま市島しょ地域<br>メイン会場：浜比嘉島 旧浜中学校（沖縄県うるま市勝連浜19）<br>集落展示：伊計島伊計区内、宮城島宮城区内</td>
						</tr>
						<tr>
							<th>料金</th>
							<td>:</td>
							<td>1名500円   ※一部別料金コンテンツあり ※高校生以下無料</td>
						</tr>
						<tr>
							<th>主催</th>
							<td>:</td>
							<td>うるま市、島アートプロジェクト実行委員会</td>
						</tr>
						<tr>
							<th>共催</th>
							<td>:</td>
							<td>琉球新報社</td>
						</tr>
						<tr>
							<th>後援</th>
							<td>:</td>
							<td>うるま市議会、うるま市教育委員会、うるま市文化協会、うるま市商工会</td>
						</tr>
						<tr>
							<th>協力</th>
							<td>:</td>
							<td>伊計自治会、池味自治会、上原自治会、津堅自治会、桃原自治会、浜自治会、比嘉自治会、平安座自治会、宮城自治会　(※五十音順)</td>
						</tr>
						<tr>
							<th>事務局</th>
							<td>:</td>
							<td>2019年11月1日（金）～11月10日（日）</td>
						</tr>
						<tr>
							<th>会期</th>
							<td>:</td>
							<td>2019年11月1日（金）～11月10日（日）</td>
						</tr>
						<tr>
							<th>会期</th>
							<td>:</td>
							<td>うるま市観光物産協会</td>
						</tr>
					</table>

					<table>
						<caption>お問い合わせ うるま市観光物産協会</caption>
						<tr>
							<th>電話</th>
							<td>:</td>
							<td>098-978-0077  FAX : 098-978-1177</td>
						</tr>
						<tr>
							<th>メール</th>
							<td>:</td>
							<td>info@uruma-ru.jp</td>
						</tr>
					</table>
					<ul>
						<li>公式サイト：uruma.shimadakara.jp</li>
						<li>Facebook：uruma.shimadakara.art</li>
						<li>Instagram：uruma.shimadakara</li>
					</ul>
				</div>
				<!-- /.inner -->
			</section>
		</div>
	</div>

</main>
<!--/#contents--></div>

	
	

<?php get_footer();
