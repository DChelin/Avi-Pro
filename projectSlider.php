<?php
    $count = 1;
?>

<div id="projectSlider" class="container">

    <div class="swiper projectSlider">
        <div class="swiper-wrapper">

    <?php 
        $args = array(
        'post_type'     => 'post',
        'numberposts' 	=> 9,
        'category_name'      => 'projects'
        );
        
        $latest_posts = get_posts( $args );
        
        foreach ( $latest_posts as $post ) {
            $subHead = get_field('sub_heading', $post); ?>

            <div class="swiper-slide">
                <div class="innercontainer">
                    <div class="imager">
                        <span class="big-number">0<? echo $count++;?></span>
                        <?php echo get_the_post_thumbnail( $post, 'large' );?>
                    </div>
                    <div class="content">
                        <h4><?php echo $post->post_title;?></h4>
						<?php if($subHead) { ?>
							<h5><?php echo $subHead; ?></h5>
						<?php } 
						if(wp_is_mobile()) { ?>
							<div class="description"><p><?php echo wp_trim_words($post->post_content, 20);?></p></div>
						<?php } else { ?>
							<div class="description"><p><?php echo wp_trim_words($post->post_content, 45);?></p></div>
                        <?php } ?>
                        <a href="<?php echo the_permalink($post);?>" class="elementor-button" role="button">View project</a>
                    </div>
                </div>
            </div>
            
        <?php }
        wp_reset_postdata();
        ?>
        </div>
      <div class="swiper-pagination"></div>
    </div>
</div>
<script>
var swiper = new Swiper(".projectSlider", {
    slidesPerView: 1,
    spaceBetween: 100,
    centeredSlides: true,
    loop: true,
    autoplay: {
		delay: 3500,
	},
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
        renderBullet: function (index, className) {
        return '<span class="' + className + '">' + '0' +(index + 1) + '.' + "</span>";
        },
    },
	breakpoints: {
		1024: {
			slidesPerView: 3,
			spaceBetween: 20,
			loop: true,
		},
		800: {
			slidesPerView: 3,
			spaceBetween: 20,
			loop: true,
		},
		600: {
			slidesPerView: 1,
			spaceBetween: 20,
			loop: true,
		}
	}
});
	$(".projectSlider").hover(function() {
		(this).swiper.autoplay.stop();
	}, function() {
		(this).swiper.autoplay.start();
	});
</script>