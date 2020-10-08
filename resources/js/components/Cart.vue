<template>
    <div class="container-fluid">
        <head-component></head-component>
	<!-- Breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="bread-inner">
						<ul class="bread-list">
							<li><a href="index1.html">Home<i class="ti-arrow-right"></i></a></li>
							<li class="active"><a href="blog-single.html">Cart</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Breadcrumbs -->

	<!-- Shopping Cart -->
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
                            <tr v-if="CartTotal==0">
                                <td colspan="6" data-title="Error">
                                    <div class="alert alert-danger">
                                        Your Cart is Empty
                                    </div>
                                </td>
                            </tr>
							<tr v-for="item in CartProducts" :key="item.id">
								<td class="image" data-title="Picture"><img :src="item[0][0].ProductBanner" alt="#" style="width:100px;height:70px !important"></td>
								<td class="product-des" data-title="Product Name">
									<p class="product-name"><a :href="'/Product/'+item[0][0].Slug">{{item[0][0].ProductName}}</a></p>
								</td>
								<td class="price" data-title="Price"><span> Ksh: {{ item[0][0].FinalPrice }} </span></td>
								<td class="qty" data-title="Item(s)"><!-- Input Order -->
									<div class="text-center input-group">
                                        <span>{{item[1]}}</span>
									</div>
									<!--/ End Input Order -->
								</td>
								<td class="total-amount" data-title="Total"><span>Ksh: {{item[1] *  item[0][0].FinalPrice}}</span></td>
								<td class="action" data-title="Remove">
                                    <i class="fa fa-trash" style="color:red" @click="Delete(item[0][0].SKU)"></i>
                                </td>
							</tr>
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
								</div>
							</div>
							<div class="col-lg-4 col-md-7 col-12">
								<div class="right">
									<ul>
										<li>Cart Subtotal<span> Ksh: {{CartTotal}}</span></li>
										<li class="last">You Pay<span>Ksh: {{CartTotal}}</span></li>
									</ul>
									<div class="button5">
										<span v-if="CartTotal==0"></span>
                                        <span v-else>
                                            <a href="/checkout" class="btn">Checkout</a>
                                        </span>
										<a href="/DL891URi4QURM0MaYoa" class="btn">Continue shopping</a>
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
	<!--/ End Shopping Cart -->

	<!-- Start Shop Services Area  -->
	<section class="shop-services section">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="ti-rocket"></i>
						<h4>Free shiping</h4>
						<p>Orders over $100</p>
					</div>
					<!-- End Single Service -->
				</div>
				<div class="col-lg-3 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="ti-reload"></i>
						<h4>Free Return</h4>
						<p>Within 30 days returns</p>
					</div>
					<!-- End Single Service -->
				</div>
				<div class="col-lg-3 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="ti-lock"></i>
						<h4>Sucure Payment</h4>
						<p>100% secure payment</p>
					</div>
					<!-- End Single Service -->
				</div>
				<div class="col-lg-3 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="ti-tag"></i>
						<h4>Best Peice</h4>
						<p>Guaranteed price</p>
					</div>
					<!-- End Single Service -->
				</div>
			</div>
		</div>
	</section>
	<!-- End Shop Newsletter -->
    </div>
</template>
<script>
    export default{
        data(){
            return{
                CartTotal:'',
				CartProducts:[],
				Amount:1,
                Categories:[]
            }
        },
        methods:{
            Delete(id){
               axios.delete('/cart/'+id).then((response)=>{
                //    console.log(response.data)
                  window.open('/cart','_parent')
               })
            },
            countCart(){
                axios.get('/k1HT1eDwpUe5LG9').then((response)=>{
                    this.CartCount=response.data
                })
            },
             getCartQty(id){
                axios.get('/nhepSC0ODs/'+id).then((response)=>{
                    this.Amount=response.data
                    console.log(response.data)
                })
            },
            getCart(){
                axios.get('/k1HT1eDwpUe5LG95e').then((response)=>{
                    this.CartProducts=response.data
                })
            },
            getCartTotal(){
                axios.get('/k1HT1eDwpUe5LG95ey7').then((response)=>{
                    this.CartTotal=response.data
                })
            },
		},
		created(){
			this.getCart()
			this.getCartTotal()
		}
    }
</script>
