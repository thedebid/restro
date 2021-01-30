<div class="better-widgets better-slider-1">
    <div class="slid-half">
        <div id="js-cta-slider" class="cta__slider-wrapper nofull swiper-container bg-img" data-background="<?php echo esc_url ( $settings['bg_image']['url']); ?>">
            <div class="swiper-wrapper cta__slider">
                <?php foreach ( $settings['slider_list'] as $index => $item ) : ?>
                <!-- SLIDER ITEM -->
                <div class="cta__slider-item swiper-slide">
                    <div class="media-wrapper slide-inner valign">
                        <div class="bg-img" data-background="<?php echo esc_url ( $item['image']['url']); ?>" data-overlay-dark="<?php echo $settings['slider_mask'];?>"></div>
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-10 offset-lg-1">
                                    <div class="caption">
                                        <span class="top-corn"></span>
                                        <span class="bottom-corn"></span>
                                        <div class="custom-font">
                                            <h5 class="thin custom-font"><?php echo wp_kses_post ( $item['subtitle'] ); ?></h5>
                                            <h1 data-splitting><?php echo wp_kses_post ( $item['title'] ); ?></h1>
                                        </div>
                                        <p><?php echo wp_kses_post ( $item['text'] ); ?></p>
                                        <a href="<?php echo esc_url ( $item['btn_link']['url'] ) ; ?>" class="btn-curve btn-color mt-30">
                                            <span><?php echo esc_attr ( $item['btn_text'] ) ; ?></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
                <!-- SLIDER ITEM -->
            </div>
            <div class="cta__slider-arrows <?php echo $show_paging;?>">
                <i id="js-cta-slider-next" class="cta__slider-arrow cta__slider-arrow--next">
                    <i class="fas fa-chevron-up"></i>
                </i>
                <i id="js-cta-slider-previous" class="cta__slider-arrow cta__slider-arrow--previous">
                    <i class="fas fa-chevron-down"></i>
                </i>
            </div>
        </div>
        <?php if($show_paging=='show') : ?>
        <div class="swiper-pagination top custom-font"></div>
        <?php endif; ?>
    </div>
</div>