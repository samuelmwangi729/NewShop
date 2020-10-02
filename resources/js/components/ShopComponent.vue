<template>
<div class="container-fluid">
    <head-component></head-component>
		<!-- End Breadcrumbs -->

		<!-- Product Style -->
		<section class="product-area shop-sidebar shop section">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-3 col-md-4 col-12">
						<div class="shop-sidebar">
								<!-- Single Widget -->
								<div class="single-widget category">
									<h4 class="title" >
                                        <i class="fa fa-filter" style="color:#f7941d"></i> Filter By
                                        Categories
                                        </h4>
									<ul class="categor-list">
										<li v-for="category in Categories" :key="category.id" @click="GetCategory(category.Category)"> {{category.Category}}</li>
									</ul>
								</div>
								<!--/ End Single Widget -->
								<!-- Shop By Price -->
									<div class="single-widget range">
										<h3 class="title">Shop by Price</h3>
										<ul class="check-box-list">
											<li>
												<label class="checkbox-inline" for="1"><input name="news" id="1" type="checkbox" v-model="first">Ksh 2000 - 50000<span class="count"></span></label>
											</li>
											<li>
												<label class="checkbox-inline" for="2"><input name="news" id="2" type="checkbox" v-model="second">Ksh 50000 - 10000<span class="count"></span></label>
											</li>
											<li>
												<label class="checkbox-inline" for="3"><input name="news" id="3" type="checkbox" v-model="third">Ksh 10000 - 25000<span class="count"></span></label>
											</li>
                                            <li>
												<label class="checkbox-inline" for="3"><input name="news" id="3" type="checkbox" v-model="fourth"> Ksh 25,000 - 50,000<span class="count"></span></label>
                                            </li>
                                            <li>
												<label class="checkbox-inline" for="3"><input name="news" id="3" type="checkbox" v-model="fifth"> Ksh 50,000 - 100,000<span class="count"></span></label>
                                            </li>
                                            <li>
												<label class="checkbox-inline" for="3"><input name="news" id="3" type="checkbox" v-model="sixth">Over  Ksh 100,000<span class="count"></span></label>
                                            </li>
										</ul>
									</div>
									<!--/ End Shop By Price -->
								<!-- Single Widget -->
								<div class="single-widget recent-post">
									<h3 class="title">Recent Products</h3>
									<!-- Single Post -->
									<div class="single-post first" v-for="hot in HotProducts" :key="hot.id">
										<div class="image">
											<img :src="hot.ProductBanner" alt="#">
										</div>
										<div class="content">
											<h5><a href="#">{{hot.ProductName}}</a></h5>
											<p class="price">Ksh: {{hot.FinalPrice}}</p>
											<ul class="reviews">
												<li class="yellow"><i class="ti-star"></i></li>
												<li class="yellow"><i class="ti-star"></i></li>
												<li class="yellow"><i class="ti-star"></i></li>
												<li><i class="ti-star"></i></li>
												<li><i class="ti-star"></i></li>
											</ul>
										</div>
									</div>
									<!-- End Single Post -->
								</div>
								<!--/ End Single Widget -->
						</div>
					</div>
					<div class="col-lg-9 col-md-8 col-12">
						<div class="row">
							<div class="col-12">
								<!-- Shop Top -->
								<div class="shop-top">
									<div class="shop-shorter">
										<div class="single-shorter">
											<label>Show :</label>
											<select style="height:30px;width:70px">
												<option selected="selected">25</option>
												<option>50</option>
												<option>75</option>
												<option>100</option>
												<option>All</option>
											</select>
										</div>
										<div class="single-shorter">
											<label>Sort By :</label>
											<select style="height:30px;width:70px">
												<option selected="selected">Name</option>
												<option>Price</option>
												<option>Size</option>
											</select>
										</div>
									</div>
								</div>
								<!--/ End Shop Top -->
							</div>
						</div>
						<div class="row">
							<div class="col-sm-2 card" v-for="product in Products" :key="product.id" style="margin-left:20px;margin-top:10px">
								<div class="single-product">
									<div class="text-center product-img">
										<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#" @click="GetSingle(product.Slug)">
											<img class="default-img" :src="product.ProductBanner" alt="#" style="width:150px; height:120px !important">
											<img class="hover-img"  :src="product.ProductBanner" alt="#" style="width:150px; height:150px !important">
										</a>
										<div class="button-head">
											<div class="product-action">
												<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#" @click="GetSingle(product.Slug)"><i class=" ti-eye"></i><span>Quick Shop</span></a>
                                                <a title="Add to cart" href="javascript:void(0)"  @click="AddWish(product.SKU)">
                                                    <i class="fa fa-heart"></i>
                                                </a>
												<!-- <a title="Wishlist" href="#"><i class=" ti-heart"></i><span>Add to Wishlist</span></a> -->
												<!-- <a title="Compare" href="javascript::void()" @click="Compare(product.SKU)"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a> -->
											</div>
											<div class="product-action-2">
												<a title="Add to cart" href="javascript:void(0)"  @click="AddCart(product.SKU)">Add to cart</a>

											</div>
										</div>
									</div>
									<div class="product-content">
										<h3><a :href="'/Product/'+product.Slug" style="font-size:10px">{{product.ProductName}}</a></h3>
										<div class="product-price">
											<span>Ksh: {{product.FinalPrice}}</span>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!--/ End Product Style 1  -->

		<!-- Start Shop Newsletter  -->
		<section class="shop-newsletter section">
			<div class="container">
				<div class="inner-top">
					<div class="row">
						<div class="col-lg-8 offset-lg-2 col-12">
							<!-- Start Newsletter Inner -->
							<div class="inner">
								<h4>Newsletter</h4>
								<p> Subscribe to our newsletter and get <span>10%</span> off your first purchase</p>
								<form action="mail/mail.php" method="get" target="_blank" class="newsletter-inner">
									<input name="EMAIL" placeholder="Your email address" required="" type="email">
									<button class="btn">Subscribe</button>
								</form>
							</div>
							<!-- End Newsletter Inner -->
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End Shop Newsletter -->



		<!-- Modal -->
			<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close" @click="Clear()"><span class="ti-close" aria-hidden="true"></span></button>
						</div>
						<div class="modal-body">
							<div class="row no-gutters">
								<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
									<!-- Product Slider -->
										<div class="product-gallery">
											<div class="quickview-slider-active">
												<div class="single-slider">
													<img :src="SingleProduct.ProductBanner" alt="#" style="height:500px; width:600px !important">
												</div>
												<div class="single-slider">
													<img :src="SingleProduct.FrontImage" alt="#" style="height:500px; width:600px !important">
												</div>
												<div class="single-slider">
													<img :src="SingleProduct.SideImage" alt="#" style="height:500px; width:600px !important">
												</div>
												<div class="single-slider">
													<img :src="SingleProduct.BackImage" alt="#" style="height:500px; width:600px !important">
												</div>
											</div>
										</div>
									<!-- End Product slider -->
								</div>
								<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
									<div class="quickview-content">
										<h2>{{SingleProduct.ProductName}}</h2>
										<div class="quickview-ratting-review">
											<div class="quickview-ratting-wrap">
												<div class="quickview-ratting">
													<i class="yellow fa fa-star"></i>
													<i class="yellow fa fa-star"></i>
													<i class="yellow fa fa-star"></i>
													<i class="yellow fa fa-star"></i>
													<i class="fa fa-star"></i>
												</div>
												<a href="#"> (1 customer review)</a>
											</div>
											<div class="quickview-stock">
												<span><i class="fa fa-check-circle-o"></i> in stock</span>
											</div>
										</div>
										<h3>Ksh : {{SingleProduct.FinalPrice}}</h3>
										<div class="quickview-peragraph" v-html="SingleProduct.Description">
										</div>
										<div class="quantity">
											<!-- Input Order -->
											<div class="input-group">
												<div class="button minus">
													<button type="button" class="btn btn-primary btn-number" data-type="minus" @click="Sub()">
														<i class="ti-minus"></i>
													</button>
												</div>
												<input type="text" name="quant[1]" class="input-number"  data-min="1" data-max="1000" v-model="MinCart">
												<div class="button plus">
													<button type="button" class="btn btn-primary btn-number" data-type="plus" @click="Add()">
														<i class="ti-plus"></i>
													</button>
												</div>
											</div>
											<!--/ End Input Order -->
										</div>
										<div class="add-to-cart">
                                            <button class="btn" @click="AddCart(SingleProduct.SKU)">Add to Cart</button>
											<a href="#" class="btn min"><i class="ti-heart"  @click="AddWish(SingleProduct.SKU)"></i></a>
										</div>
										<div class="default-social">
											<h4 class="share-now">Share:</h4>
											<ul>
												<li><a class="facebook" href="https://facebook.com?u=express.co.ke/jj"><i class="fa fa-facebook"></i></a></li>
												<li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
												<li><a class="youtube" href="#"><i class="fa fa-pinterest-p"></i></a></li>
												<li><a class="dribbble" href="#"><i class="fa fa-google-plus"></i></a></li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Modal end -->
</div>
</template>
<script>
    export default{
        data(){
            return{
                Categories:[],
                first:'',
                second:'',
                third:'',
                fourth:'',
                fifth:'',
                sixth:'',
                HotProducts:[],
                Products:[],
                SingleProduct:[],
                token:'',
                User:'',
                CartCount:0,
                CartTotal:0,
                CartProducts:[],
                isLoggedIn:"",
                MinCart:1,
                Wishlisted:0
            }
        },
        methods:{
              AddWish(sku){
                axios.get('/mHCAGNXtutk/S2wTcoUWu8cP').then((response)=>{
                    // console.log(response.data)
                    //set session username to a random username
                     swal({
                        title: 'Success',
                        text: 'Product Successfully Added to Wishlist',
                        icon: "success",
                        })
                })
               axios.post('/WGAeCy70FdeZr5Huu4ASweIgs4jnfBxAsh8oGUbnKu',{
                   _token:this.token,
                   SKU:sku
               }).then((response)=>{
                   if(response.data.success){
                        swal({
                        title: 'Success',
                        text: response.data.success,
                        icon: "success",
                        })
                    this.countWish()
                   }else{
                       swal({
                        title: 'Error',
                        text: response.data.error,
                        icon: "error",
                        })
                   }
               })
               this.getCartTotal()
            },
            Add(){
                this.MinCart=this.MinCart+1;
            },
            Sub(){
                this.MinCart=this.MinCart-1;
            },
            GetCategory(name){
                axios.get('/48j4lEBGhrZML2Yiovwz2/'+name).then((response)=>{
                    if(response.data.message==1){
                        //there are no products with the category
                        swal({
                        title: 'Sorry',
                        text: 'No products available under '+name+' Category',
                        icon: "error",
                        })
                        return;
                    }
                    if(response.data.message==0){
                        this.Products=response.data.products
                    }
                })
            },
            countCart(){
                axios.get('/k1HT1eDwpUe5LG9').then((response)=>{
                    this.CartCount=response.data
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
                        swal({
                        title: 'Success',
                        text: response.data.success,
                        icon: "success",
                        })
                   }else{
                       swal({
                        title: 'Error',
                        text: response.data.error,
                        icon: "error",
                        })
                   }
               })
                this.countCart()
                this.getCart()
                this.getCartTotal()
            },
            Clear(){
                this.SingleProduct=''
            },
            GetSingle(id){
                // alert(id)
                axios.get('/8fublrIcMmGPlQ7n8z1u/k6BL331sXw4S00cN4BaX8DfuvQsh8K/'+id).then((response)=>{
                    this.SingleProduct=response.data
                })
            },
            loadProducts(){
                axios.get('/gLTEUwX8wzIf9B9u5ngUZBTmVh0R4D0bxn3NUmg5F717Xq6').then((response)=>{
                    this.Products=response.data
                })
            },
            loadHot(){
                axios.get('/Sk9zv/4LZ/A8zKt70Js0mRzqA').then((response)=>{
                    this.HotProducts=response.data

                })
            },
            LoadCategories() {
                axios.get("/ClywjTdDiB7G3yYmszGO").then((response) => {
                    this.Categories = response.data.Categories;
                });
            },
            checkLogin() {
                axios.get("/api/JIoIB58KFb8E682uZRiTdgRgufiJ").then((response) => {
                    this.isLoggedIn = response.data.isLoggedIn[0];
                    // console.log(this.isLoggedIn=="")
                });
            },
        },
        created(){
            this.LoadCategories()
            this.loadHot()
            this.loadProducts()
            this.token=$('meta[name="csrf-token"]').attr('content')
            console.log(this.token)
            this.checkLogin();
            this.countCart(),
            this.getCart(),
            this.getCartTotal()
        },
        watch:{
            first:function(){
                this.second=''
                this.third=''
                this.fourth=''
                this.fifth=''
                if(this.first){
                    alert('true')
                }
            },
            second:function(){
                this.first=''
                this.third=''
                this.fourth=''
                this.fifth=''
                if(this.second){
                    alert('true')
                }
            },
            third:function(){
                this.second=''
                this.first=''
                this.fourth=''
                this.fifth=''
                if(this.third){
                    alert('true')
                }
            },
            fourth:function(){
                this.second=''
                this.third=''
                this.first=''
                this.fifth=''
                if(this.fourth){
                    alert('true')
                }
            },
            fifth:function(){
                this.second=''
                this.third=''
                this.fourth=''
                this.first=''
                if(this.fifth){
                    alert('true')
                }
            },
            MinCart:function(){
                if(this.MinCart<1){
                    this.MinCart=1;
                    return;
                }
            }
        }
    }
</script>
