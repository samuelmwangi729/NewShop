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
								<th class="text-center">TOTAL</th>
								<th class="text-center"></th>
                                <th></th>
							</tr>
						</thead>
						<tbody>
                            <tr v-if="CartProducts.length==0">
                                <td colspan="6">
                                    <div class="alert alert-danger">
                                        Your Wishlist is Empty
                                    </div>
                                </td>
                            </tr>
							<tr v-for="item in CartProducts" :key="item.id">
								<td class="image" data-title="Product"><img :src="item[0][0].ProductBanner" alt="#" style="width:100px;height:70px !important"></td>
								<td class="product-des" data-title="Name">
									<p class="product-name"><a href="#">{{item[0][0].ProductName}}</a></p>
								</td>
								<td class="price" data-title="Price"><span> Ksh: {{ item[0][0].FinalPrice }} </span></td>
								<td class="action" data-title="Remove">
                                   <div class="badge badge-danger" @click="Delete(item[0][0].SKU)">
                                       Remove
                                   </div>
                                </td>
                                <td data-title="Send to Cart">
                                    <div class="badge badge-success" @click="AddCart(item[0][0].SKU)">
                                        Add to Cart
                                    </div>
                                </td>
							</tr>
						</tbody>
					</table>
					<!--/ End Shopping Summery -->
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
                Categories:[],
                MinCart:1,
            }
        },
        methods:{
            AddCart(sku){
                axios.get('/mHCAGNXtutk/S2wTcoUWu8cP').then((response)=>{
                    // console.log(response.data)
                })
               axios.post('/cart',{
                   _token:this.token,
                   Qty:this.MinCart,
                   SKU:sku
               }).then((response)=>{
                   if(response.data.success){
                       //then remove the product from cart
                       this.Delete(sku)
                        window.open('/Wishlist','_parent')
                   }else{
                       swal({
                        title: 'Error',
                        text: response.data.error,
                        icon: "error",
                        })
                   }
               })
               //refresh the page then
            },
            Delete(id){
               axios.delete('/delWishlist/'+id).then((response)=>{
                  if(response.data==false){
                       swal({
                          title:'Error',
                          text:'Unknown Error Occurred',
                          icon:'error'
                      })
                  }
                window.open('/Wishlist','_parent')
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
                    // console.log(response.data)
                })
            },
            // getCart(){
            //     axios.get('/k1HT1eDwpUe5LG95e').then((response)=>{
            //         this.CartProducts=response.data
            //     })
            // },
             getWishlisted(){
                axios.get('/k1HT1eDwpUe5LG95').then((response)=>{
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
			// this.getCart()
			this.getCartTotal()
            this.getWishlisted()
		}
    }
</script>
