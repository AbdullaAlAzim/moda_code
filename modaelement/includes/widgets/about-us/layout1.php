<?php
echo '<!-- Who We Are start  -->
    <section class="who-we-are-section moda-section">
        <div class="container">
            <div class="moda-author-post">
                <div class="row ">
                    <div class="col-lg-7">
                        <div class="moda-left-content wow fadeInUp" >
                            <h2 class="line-hight">' . $settings['title'] . '</h2>
                            <p>' . $settings['info'] . '</p>
                            <div class="moda-sinatures">
                                <div class="signatures">
                                    ' . get_that_image($settings['image']) . '
                                </div>
                                <p class="mb-0">' . $settings['desig'] . '</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="moda-right-thumb wow fadeInUp"  data-wow-delay="0.3s">
                            ' . get_that_image($settings['image1']) . '
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Who We Are end  -->';