<?php

/*
Template Name: Страница - Осуществленный проект
WP Post Template: Страница - Осуществленный проект
Template Post Type: post
*/

get_header(); ?>

<?php get_template_part('template-parts/header-section');?>

<main class="page">

  <section id="title-navigation" class="title-navigation">
    <div class="_container">
      <?php
        if ( function_exists('yoast_breadcrumb') ) {
        yoast_breadcrumb( '<p id="breadcrumbs">','</p>' ); 
       }
     ?> 
      <h1 class="title-navigation__title"><?php the_title();?></h1>
    </div>
  </section> 

  <section class="content"> 
    <div class="_container">
      <div class ="posts__content ">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <picture>
          <?php echo get_the_post_thumbnail( $post->ID, "turImg", array("alt" => $post->post_title, "title" => $post->post_title));?>
        </picture>
        <?php the_content();?>
        <?php endwhile;?>
        <?php endif; ?>
      </div>
    </div>
  </section>
</main>

<?php get_footer();