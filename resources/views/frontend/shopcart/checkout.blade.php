@extends('frontend.unmain')
@section('content')
<?php use Gloudemans\Shoppingcart\Facades\Cart;?>
<section class="shop checkout section">
	<div class="container">
		<div class="row"> 
			<div class="col-lg-8 col-12">
				<div class="checkout-form">
					<h2>Make Your Checkout Here</h2>
					<p>Please register in order to checkout more quickly</p>
					<!-- Form -->
					<form class="form" method="post" action="{{$path}}doCheckout">
						@csrf
						<div class="row">	
									<input type="hidden" name="id" placeholder="" value="{{$customer->id}}">
							<div class="col-lg-6 col-md-6 col-12">
								<div class="form-group">
									<label>Your Name<span>*</span></label>
									<input type="text" name="customerName" placeholder="" value="{{$customer->customerName}}" required="required">
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-12">
								<div class="form-group">
									<label>Email Address<span>*</span></label>
									<input type="email" name="email" value="{{$customer->email}}" placeholder="" required="required">
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-12">
								<div class="form-group">
									<label>Phone Number<span>*</span></label>
									<input type="number" name="phone" value="{{$customer->phone}}" placeholder="" required="required">
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-12">
								<div class="form-group">
									<label>Address<span>*</span></label>
									<input type="text" name="address" value="{{$customer->address}}" placeholder="" required="required">
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-12">
								<div class="form-group">
									<label>Note<span></span></label>
									<textarea type="text" name="note" id="note" rows="3"></textarea>
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-12">
								<div class="form-group">
									<input type= "submit"/>
								</div>
							</div>
							
							
						</div>
					</form>
					<!--/ End Form -->
				</div>
			</div>
			<div class="col-lg-4 col-12">
			<p><?php echo Cart::content();?></p>
			</div>
		</div>
	</div>
</section>
<script type="text/javascript">
	const txt = '<?php echo Cart::content();?>';
	const obj = JSON.parse(txt);
	console.log(obj);
	for (const [key, value] of Object.entries(obj)) {
  console.log(`${key}: ${value}`);
}
</script>
@endsection
