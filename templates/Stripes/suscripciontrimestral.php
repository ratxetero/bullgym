
<head>
    <title>Pasarela de pago</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <style type="text/css">
body{
	font-family: Arial, Helvetica, sans-serif;
	background: #343a40;
}

.card{
	background: #000;
	color: #fff;
	width: 410px!important;
}
.mrow{
	margin-top: 30px;
	margin-bottom:30px; 
}
img{
	margin-right: 10px;
}
.main span:hover{
	text-decoration: underline;
	cursor: pointer;
}
.mrow img:hover{
	border-bottom: 1px solid #fff;
	cursor: pointer;
}
.btn-primary{
	border: none;
	border-radius: 30px;
}

h5{
	padding-top: 8px;
}

.form-group{
	position: relative;
	margin-bottom: 2rem;
}
.form-control-placeholder{
	position: absolute;
	top: 6px;
	padding: 7px 0 0 10px;
	transition: all 200ms;
	opacity: 0.5;
	color: #dae0e5!important;
	font-size: 75%;
}
.form-control:focus+.form-control-placeholder,
.form-control:valid+.form-control-placeholder{
	font-size: 75%;
	transform: translate3d(0,-100%,0);
	opacity: 1;
	top: 10px;
}
.form-control{
	background: transparent;
	border: none;
	border-bottom: 1px solid #fff!important;
	border-radius: 0;
	outline: 0;
}
.form-control:focus,
.form-control:after{
	outline-width: 0;
	border-bottom: 1px solid #fff!important;
	background: transparent;
	box-shadow: none;
	border-radius: 0;
	color: #dae0e5;
	letter-spacing: 1px;
}
    </style>
</head>

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section" style="background-image:url(<?php echo $this->Url->image('breadcrumb-bg.jpg') ?>)">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb-text">
                        <h2>Suscripción trimestral</h2>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->
  
<?= $this->Flash->render() ?>
<div class="container-fluid">
    <br><br>
  
	<div class="row justify-content-center">
			<div class="card my-4 p-3">

				
					<div class="row justify-content-center mrow">
						<div class="col-12">
							<img src="https://img.icons8.com/color/48/000000/mastercard-logo.png" width="35px" height="35px"/>
							<img src="https://img.icons8.com/color/48/000000/visa.png" width="35px" height="35px"/>
						</div>
					</div>
                    <?= $this->Form->create(null, [
                        "action" => $this->Url->build("/trimestral", ["fullBase" => false]),
                        "method" => "post",
                        "class" => "require-validation",
                        "data-cc-on-file" => "false",
                        "data-stripe-publishable-key" => STRIPE_KEY,
                        "id" => "payment-form"
                    ]) ?>
					<div class="row">
						<div class="col-12">
							<div class="form-group">
    						<input type="text" class="form-control card-number p-0 " required><label class="form-control-placeholder p-0">CardNumber</label>
 						</div>
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							<div class="form-group">
    						<input type="text" class="form-control p-0"  required><label class="form-control-placeholder p-0" >Cardholder'sName</label>
 						</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-4 col-12">
							<div class="form-group">
    							<input type="text" class="form-control card-expiry-month  p-0 "  required><label class="form-control-placeholder p-0 card-expiry-month" >Expiration month</label>
 							</div>
						</div>
						<div class="col-sm-4 col-12">
							<div class="form-group">
    							<input type="text" class="form-control card-expiry-year p-0 "  required><label class="form-control-placeholder p-0 ">Expiration year</label>
 							</div>
						</div>
						<div class="col-sm-4 col-12">
							<div class="form-group">
    							<input type="password" class="form-control card-cvc p-0 " required><label class="form-control-placeholder p-0 " >CVV</label>
						</div>
						</div>
					</div>
					<div class="row lrow mt-4 mb-3">
						<div class="col-sm-8 col-12"><h3> Total:</h3></div>
						<div class="col-sm-4 col-12"><h5>90€</h5></div>
					</div>
					<div class="row mb-2">
						<div class="col-sm-12">
							<button type="submit" class="btn btn-primary btn-block">Pagar 90€</button>
						</div>
					</div>
					
                    <?= $this->Form->end() ?>
					
			</div>
		</div>
</div>



      

  

  
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
  
<script type="text/javascript">
$(function() {
   
    var $form         = $(".require-validation");
   
    $('form.require-validation').bind('submit', function(e) {
        var $form         = $(".require-validation"),
        inputSelector = ['input[type=email]', 'input[type=password]',
                         'input[type=text]', 'input[type=file]',
                         'textarea'].join(', '),
        $inputs       = $form.find('.required').find(inputSelector),
        $errorMessage = $form.find('div.error'),
        valid         = true;
        $errorMessage.addClass('hide');
  
        $('.has-error').removeClass('has-error');
        $inputs.each(function(i, el) {
          var $input = $(el);
          if ($input.val() === '') {
            $input.parent().addClass('has-error');
            $errorMessage.removeClass('hide');
            e.preventDefault();
          }
        });
   
        if (!$form.data('cc-on-file')) {
          e.preventDefault();
          Stripe.setPublishableKey($form.data('stripe-publishable-key'));
          Stripe.createToken({
            number: $('.card-number').val(),
            cvc: $('.card-cvc').val(),
            exp_month: $('.card-expiry-month').val(),
            exp_year: $('.card-expiry-year').val()
          }, stripeResponseHandler);
        }
  
  });
  
  function stripeResponseHandler(status, response) {
        if (response.error) {
            $('.error')
                .removeClass('hide')
                .find('.alert')
                .text(response.error.message);
        } else {
            /* token contains id, last4, and card type */
            var token = response['id'];
               
            $form.find('input[type=text]').empty();
            $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
            $form.get(0).submit();
        }
    }
   
});
</script>






