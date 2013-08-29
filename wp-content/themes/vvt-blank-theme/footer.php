    </div> <!-- #main -->

    <div id="footer">
        <div id="colophon">
            <div id="site-info">
				<h6>Copyright 2013 by V.V.T / vvt-mediadesign.se / LoveYourApp / LoveYourGame</6>
            </div> <!-- #site-info -->
        </div> <!-- #colophon -->
        <a class='go-to-top' href='#wrapper' title='back to top'>Back to Top</a>
    </div> <!-- #footer -->

    <!--   <div id="footerwidgets">

		<div id="footer-left">
			<ul>
				<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer 1') ) : ?>
				<li>
				<?php endif; ?>
			</ul>
		</div>

		<div id="footer-middle">
			<ul>
				<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer 2') ) : ?>
				<li>
				<?php endif; ?>
			</ul>
		</div>

		<div id="footer-right">
			<ul>
				<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer 3') ) : ?>
				<li>
				<?php endif; ?>
			</ul>
		</div>

	</div> -->

	<clear="all"/>

</div> <!-- #wrapper -->

<?php wp_footer(); ?>

<script>
    jQuery(function ( $ ) {
    $('.go-to-top').click(function () {
    $('html,body').animate({
    scrollTop: 0
    }, 500);
    return false;
    });
    });
</script>

</body>
</html>
