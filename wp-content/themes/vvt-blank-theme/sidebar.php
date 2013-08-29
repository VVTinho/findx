<?php if ( is_sidebar_active('primary_widget_area') ) : ?>

        <div id="primary" class="widget-area">
            <ul class="xoxo">
                <?php dynamic_sidebar('primary_widget_area'); ?>
            </ul>
        </div> <!-- #primary .widget-area -->
        
<?php endif; ?>    
 
<?php if ( is_sidebar_active('secondary_widget_area') ) : ?>

        <div id="secondary" class="widget-area">
        
            <ul class="xoxo">
                <?php dynamic_sidebar('secondary_widget_area'); ?>
            </ul>
            
			<div class="toggler">
				<div id="effect" class="ui-widget-content ui-corner-all">
					<h3 class="ui-widget-header ui-corner-all">SocialNetwork!</h3>
						<p>
							</br>
							<a href="http://www.w3schools.com"><img src="<?php bloginfo('template_url'); ?>/img/facebook.png"></a>
							</br>
							</br>
							<a href="http://www.w3schools.com"><img src="<?php bloginfo('template_url'); ?>/img/twitter.png"></a> 
						</p>
				</div>
			</div> <!-- .toggler -->
			 
        </div> <!-- #secondary .widget-area -->

<?php endif; ?>