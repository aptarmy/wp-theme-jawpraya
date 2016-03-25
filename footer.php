<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package jawpraya
 */

?>
	</div><!-- #content -->
</div><!--.site-body-->
<footer id="colophon" class="site-footer" role="contentinfo">
	<div class="site-footer-desktop">
	<div class="container">
			<div class="site-info">
				<div class="site-logo"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/logo-light.png" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"></div>
				<div class="site-company-info">
					<h3 class="site-company-name">บริษัท ธนาบูลย์ไฮเทค วอเตอร์ อิเล็คทริค จำกัด</h3>
					<p class="site-company-address">เลขที่403 ถนนสรรพาวุธ แขวงบางนา เขตบางนา กทม.10260</p>
				</div>
			</div>
			<div class="site-calltoaction">
				<a class="jpy-btn-calltoaction" href="#">ติดต่อเรา</a>
				<p class="site-company-slogan">ตู้กดน้ำระบบพาสเวิร์ด ที่แรก และที่เดียวในประเทศไทย<br>ให้ธุรกิจคอนโดและอพาร์ทเม้นท์ของคุณล้ำหน้าไปอีกขั้น</p>
			</div>
		</div>
	</div>
	<div class="site-footer-mobile">
		<p class="site-copyright"><i class="fa fa-copyright"></i> <?php echo date("Y"); ?> <?php bloginfo( 'name' ); ?>. All rights reserved.</p>
	</div>
</footer><!--site-footer-->
</div><!--#page-->

<?php wp_footer(); ?>
</body>
</html>
