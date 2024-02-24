<section class=" space area_testimonial">
        <div class="parallax" data-parallax-image="assets/img/bg/testi-bg-2-1.jpg"></div>
        <div class="shape-mockup jump-reverse d-none d-xxl-block" data-top="12%" data-right="6%"><img src="assets/img/shape/leaf-1-1.png" alt="shape"></div>
        <div class="shape-mockup jump  d-none d-xxl-block" data-top="35%" data-left="17.5%"><img src="assets/img/shape/leaf-1-8.png" alt="shape"></div>
        <div class="container">
            <div class="title-area text-center">
                <span class="sec-subtitle">client testimonial</span>
                <h2 class="sec-title"><?= $site_name; ?> Customers</h2>
            </div>
            <div class="pb-1px"></div>
            <div class="testi-style2">
                <span class="vs-icon"><img src="assets/img/icon/quote-1-1.png" alt="icon"></span>
                <div class="vs-carousel" data-slide-show="1" data-fade="true" data-arrows="true" data-ml-arrows="true" data-xl-arrows="true" data-lg-arrows="true" data-prev-arrow="fal fa-long-arrow-left" data-next-arrow="fal fa-long-arrow-right">
                trust-partners verified
                <?php
                    foreach ($json_testimonials_data['testimonials'] as $testimonial) {?>
                    <div>
                        <p class="testi-text"><?= $testimonial['content']?></p>
                        <div class="arrow-shape"><i class="arrow"></i><i class="arrow"></i><i class="arrow"></i><i class="arrow"></i></div>
                        <h3 class="testi-name h5"><?=$testimonial['author']?></h3>
                        <span class="testi-degi"><?=$testimonial['other']?></span>
                    </div>
                <?php }?>
                </div>
            </div>
        </div>
    </section>