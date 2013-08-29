<!DOCTYPE html>

<head>

	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/style/footer-widget.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/style/popup_text.css" type="text/css" media="screen" />

	<link rel="shortcut icon" type="image/x-icon" href="<?php bloginfo('template_url'); ?>/img/favicon.ico" />
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />

	<title>FindX</title>

 	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="content-type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

    <link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" />

    <?php wp_head(); ?>

    <script>
        jQuery( function( $ )
        {
            $("button").click(function ()
            {
                $(".btntoogle").toggle();
            });

            $("div.simpleDiv").textTyper();
        });
    </script>

</head>

<body>

    <div class="tooglebtn">
        <button><a class='menuloggafindx' title='menufindx'></a></button>
        <div class='header-banner'><a class='loggafindx' title='loggafindx'></a></div>
    </div>

    <div id="wrapper" class="hfeed">

        <div id="header">

            <div id="masthead">

                <div id="access">

                    <?php #wp_page_menu( 'sort_column=menu_order' ); ?>

    				<?php
    					if (is_page('find-me'))
    					{
    						?>
                                <div class="btntoogle"></div>

                                <div class="btntoogle" style="display: none"></div>

    						<?php
    					}
    					else if (is_page('find-a-city'))
    					{
    						?>

    							<div class="btntoogle"></div>

                                <div class="btntoogle" style="display: none"></div>

    						<?php
    					}
    					else if (is_page('distance-x'))
    					{
    						?>

    							<div class="btntoogle"></div>

                                <div class="btntoogle" style="display: none"></div>

    						<?php
    					}
                        else if (is_page('about-findx'))
                        {
                            ?>

                                <div class="btntoogle"></div>

                                <div class="btntoogle" style="display: none"></div>

                            <?php
                        }
    					else
    					{
                            ?>

                            <?php
    					}
    				?>

                    <div class="btntoogle"><?php wp_nav_menu( array( 'sort_column' => 'menu_order', 'container_class' => 'menu-header' ) );?></div>
                    <div class="btntoogle" style="display: none"></div>

            </div> <!-- #masthead -->
        </div> <!-- #header -->

        <div id="main">
