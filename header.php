<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<?php wp_head(); ?>
	<script>
		$(document).ready(function(){
			$('.ui.accordion').accordion();
		});
	</script>
	</head>
	<body <?php body_class(); ?>>
			
<header id="header" class="ui padded center aligned one column grid">	
	
	<div id="headerMobile" class="mobile only column">
		<div class="ui accordion container">
			<div class="title">
				<span>
					<?php cc_opfield('header_title'); ?>
				</span>
				<i class="dropdown icon"></i> 
			</div>
			<div class="content">
				<div class="ui items">
					<?php dynamic_sidebar('sidebar-header'); ?>
				</div>
			</div>
		</div>
	</div><!-- /#mobileMenu -->

	<div id="headerTitle" class="tablet computer only column">
		<h1 class="ui blue header">
			<?php cc_opfield('header_title'); ?>
		</h1><!-- /#headerTitle -->
	</div>
	
	<div id="headerSocial" class="tablet computer only column">
		<?php easttheme_social_icons('social_media_settings'); ?>
	</div><!-- /#headerSocial -->
	
	<div id="headerSubTitle" class="tablet computer only column">
		<h3 class="ui disabled sub header">
			<?php cc_opfield('header_subtitle'); ?>
		</h3>
	</div><!-- /#headerSubTitle -->
	
	<div id="headerNav" class="tablet computer only column">
		<?php wp_nav_menu(array(
			'theme_location' => 'primary_navigation',
			'container' => '',
			'items_wrap' => '<div id="%1$s" class="ui fluid six item borderless %2$s">%3$s</div>',
			'walker' => new EastTheme_Nav_Menu_Walker()
		)); ?>
	</div><!-- /#headerNav -->
	
</header><!-- /#header -->
		
<main id="main" class="ui pushable">
	<div id="page" class="ui container">
