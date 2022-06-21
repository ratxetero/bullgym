   <!-- Blog Details Hero Section Begin -->
   <section class="breadcrumb-section" style="background-image:url(<?php echo $this->Url->image('breadcrumb-bg.jpg') ?>)">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 p-0 m-auto">
                    <div class="bh-text">
                        <h3><?= h($noticia->titulo) ?></h3>
                        <ul>
                            <li>by Admin</li>
                            <li><?= h($noticia->fecha_creacion) ?></li>
                            
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Details Hero Section End -->

    <!-- Blog Details Section Begin -->
    <section class="blog-details-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 p-0 m-auto">
                    <div class="blog-details-text">
                        <div class="blog-details-title">
                            <p><?= h($noticia->texto) ?></p>

                                <div class="blog-details-pic">
                            <div class="blog-details-pic-item">
                            <?= $this->Html->image($noticia->image, ['alt' => 'Imagen']);?>
                            </div>
                                </div>
         
                        </div>
                    </div>
                </div>
            </div>
                       
    </section>
    <!-- Blog Details Section End -->