




<script>

$(document).ready(function(){
  $(".fancybox").fancybox({
        openEffect: "none",
        closeEffect: "none"
    });
    
    $(".zoom").hover(function(){
		
		$(this).addClass('transition');
	}, function(){
        
		$(this).removeClass('transition');
	});
});
    
</script>






<!-- Breadcrumb Section Begin -->





<section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb-bg.jpg" style="background-image: url(img/breadcrumb-bg.jpg);">>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb-text">
                    <h2>GALERIA</h2>

                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->


<br><br><br>

<div class="row">
<?php foreach ($fotos as $foto) : ?>

<div class="col-lg-3 col-md-4 col-xs-6 thumb">
 <?= $this->Html->image($foto->image, ['alt' => 'Foto', 'height' =>'200px', 'width' => '400px']); ?>
</div>

<?php endforeach; ?>

</div>


<br><br>
<style>

body {
  background-color:#1d1d1d !important;
  font-family: "Asap", sans-serif;
  color:#989898;
  margin:10px;
  font-size:16px;
}

#demo {
  height:100%;
  position:relative;
  overflow:hidden;
}


.green{
  background-color:#6fb936;
}
        .thumb{
            margin-bottom: 30px;
        }
        
        .page-top{
            margin-top:85px;
        }

   
img.zoom {
    width: 100%;
    height: 200px;
    border-radius:5px;
    object-fit:cover;
    -webkit-transition: all .3s ease-in-out;
    -moz-transition: all .3s ease-in-out;
    -o-transition: all .3s ease-in-out;
    -ms-transition: all .3s ease-in-out;
}
        
 
.transition {
    -webkit-transform: scale(1.2); 
    -moz-transform: scale(1.2);
    -o-transform: scale(1.2);
    transform: scale(1.2);
}
    .modal-header {
   
     border-bottom: none;
}
    .modal-title {
        color:#000;
    }
    .modal-footer{
      display:none;  
    }


</style>

