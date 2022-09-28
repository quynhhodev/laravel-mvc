<?php use Gloudemans\Shoppingcart\Facades\Cart;?>
@extends('frontend.unmain')
@section('content')
<div class="shopping-cart section">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<!-- Shopping Summery -->
				<table class="table shopping-summery">
					<thead>
						<tr class="main-hading">
							<th>PRODUCT</th>
							<th>NAME</th>
							<th class="text-center">UNIT PRICE</th>
							<th class="text-center">QUANTITY</th>
							<th class="text-center">TOTAL</th> 
							<th class="text-center"><i class="ti-trash remove-icon"></i></th>
						</tr>
					</thead>
					<tbody>
						@foreach (Cart::content() as $row )
						<tr>
							<td class="image" data-title="No"><img src="{{$path}}template/frontend/images/{{$row->image}}" alt="#"></td>
							<td class="product-des" data-title="Description">
								<p class="product-name"><a href="#">{{$row->name}}</a></p>
								<p class="product-des">{{$row->detail}}</p>
							</td>
							<td class="price" data-title="Price"><span>{{$row->price}} </span></td>
							<td class="qty" data-title="Qty"><!-- Input Order -->
								<div class="input-group">
									<div class="button minus">
										<a href="{{$path}}cartDec/{{$row->rowId}}"  class="btn btn-primary " data-field="quant[1]">
											<i class="ti-minus"></i>
										</a>
									</div>
									<input type="text" name="quant[1]" class="input-number" data-min="1" data-max="100" value="{{$row->qty}}">
									<div class="button plus">
										<a href="{{$path}}cartInc/{{$row->rowId}}"  class="btn btn-primary" data-field="quant[1]">
											<i class="ti-plus"></i>
										</a>
									</div>
								</div>
								<!--/ End Input Order -->
							</td>
							<td class="total-amount" data-title="Total"><span>{{($row->price)*($row->qty)}}</span></td>
							<td class="action" data-title="Remove"><a href="{{$path}}cartDelete/{{$row->rowId}}"><i class="ti-trash remove-icon"></i></a></td>
						</tr>
						@endforeach
					
						
					</tbody>
				</table>
				<!--/ End Shopping Summery -->
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<!-- Total Amount -->
				<div class="total-amount">
					<div class="row">
						<div class="col-lg-8 col-md-5 col-12">
							<div class="left">
								<div class="coupon">
									<form action="#" target="_blank">
										<input name="Coupon" placeholder="Enter Your Coupon">
										<button class="btn">Apply</button>
									</form>
								</div>
								<div class="checkbox">
									<label class="checkbox-inline" for="2"><input name="news" id="2" type="checkbox"> Shipping (+10$)</label>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-7 col-12">
							<div class="right">
								<ul>
									<li>Shipping<span>Free</span></li>
									<li>Total Price<span>{{Cart::priceTotal()}}</span></li>
									<li>Total Tax<span>{{Cart::tax()}}</span></li>
									<li class="last">You Pay<span>{{Cart::priceTotal()}}+{{Cart::tax()}} = {{Cart::total()}}</span></li>
								</ul>
								<div class="button5">
									<a href="{{$path}}checkout" class="btn">Checkout</a>
									<a href="{{$path}}" class="btn">Continue shopping</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--/ End Total Amount -->
			</div>
		</div>
	</div>
</div>
@endsection