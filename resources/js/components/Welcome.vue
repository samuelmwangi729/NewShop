<template>
<div class="container-fluid" style="margin-top:-30px">
      <header class="header shop">
    <!-- Topbar -->
    <div class="topbar">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-4 col-md-12 col-12">
            <!-- Top Left -->
            <div class="top-left">
              <ul class="list-main">
                <li>
                  <i class="ti-headphone-alt"></i> +254704922042
                </li>
                <li>
                  <i class="ti-email"></i> support@xpresskenya.co.ke
                </li>
              </ul>
            </div>
            <!--/ End Top Left -->
          </div>

          <div class="col-lg-8 col-md-12 col-12">
            <!-- Top Right -->
            <div class="right-content">
              <ul class="list-main">
                <li>
                  <i class="fa fa-truck"></i>
                  <a href="#">
                    Xpress Mashinani
                    <sup>
                      <div class="badge badge-danger">New</div>
                    </sup>
                  </a>
                </li>
                <span v-if="isLoggedIn=='false'">
                  <li>
                    <i class="fa fa-user-plus"></i>
                    <a href="/register">Register</a>
                  </li>
                  <li>
                    <i class="fa fa-sign-in"></i>
                    <a href="/login">Login</a>
                  </li>
                </span>
                <span v-else>
                  <li>
                    <i class="fa fa-user-plus"></i>
                    <a href="/home">My Account</a>
                  </li>
                  <li>
                    <i class="fa fa-sign-in"></i>
                    <a href="login.html#">Orders</a>
                  </li>
                  <li>
                    <i class="fa fa-sign-in"></i>
                    <a href="login.html#">Pending Orders</a>
                  </li>
                </span>
              </ul>
            </div>
            <!-- End Top Right -->
          </div>
           <marquee behavior="blink" direction="left">
            <i class="fa fa-truck" style="color:purple;text-shadow:1px 1px gold"></i>
          </marquee>
        </div>
      </div>
    </div>
    <!-- End Topbar -->
    <div class="middle-inner">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-2 col-md-2 col-12">
            <!-- Logo -->
            <div class="logo">
              <a href="/">
                <img src="images/logo.png" alt="logo" />
              </a>
            </div>
            <!--/ End Logo -->
            <!-- Search Form -->
            <div class="search-top">
              <div class="top-search">
                <a href="/cart" class="fa fa-shopping-cart"></a>
                  <sup>
                      <div class="badge badge-success">
                          {{ CartCount }}
                      </div>
                  </sup>
              </div>
              <!-- Search Form -->
              <!--/ End Search Form -->
            </div>
            <!--/ End Search Form -->
            <div class="mobile-nav"></div>
          </div>
          <div class="col-lg-8 col-md-7 col-12">
            <div class="search-bar-top">
              <form>
                  <input name="search" placeholder="Search Products Here....." type="search" style="border-radius:40px" id="search" />
                </form>
            </div>
          </div>
          <div class="col-lg-2 col-md-3 col-12">
            <div class="right-bar">
              <!-- Search Form -->
              <div class="sinlge-bar">
                <a href="/Wishlist" class="single-icon">
                  <i class="fa fa-heart-o" aria-hidden="true">
                      <sup>
                        <span class="total-count">{{WishListed}}</span>
                      </sup>
                  </i>
                </a>
              </div>
              <div class="sinlge-bar shopping">
                <a href="#" class="single-icon">
                  <i class="fa fa-shopping-cart"></i>
                    <span class="total-count">{{CartCount}}</span>
                </a>
                <!-- Shopping Item -->
                <div class="shopping-item">
                  <div class="dropdown-cart-header">
                    <span>{{ CartCount }} Items</span>
                    <a href="/cart">View Cart</a>
                  </div>
                  <ul class="shopping-list">
                    <li v-for="item in CartProducts" :key="item.id">
                      <a class="cart-img" href="#">
                        <img :src="item[0][0].ProductBanner" alt="#" />
                      </a>
                      <h4>
                        <a href="#">{{item[0][0].ProductName}}</a>
                      </h4>
                      <p class="quantity">
                        <span class="amount">Ksh: {{item[0][0].FinalPrice}}</span>
                      </p>
                    </li>
                  </ul>
                  <div class="bottom">
                    <div class="total">
                      <span>Total</span>
                      <span class="total-amount">Ksh: {{CartTotal}}</span>
                    </div>
                    <a href="/checkout" class="btn animate">Checkout</a>
                  </div>
                </div>
                <!--/ End Shopping Item -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Header Inner -->
    <div class="header-inner">
      <div class="container-fluid">
        <div class="cat-nav-head">
          <div class="row">
            <div class="col-lg-3">
              <div class="all-category">
                <h3 class="cat-heading">
                  <i class="fa fa-bars" aria-hidden="true"></i>CATEGORIES
                </h3>
                <ul class="main-category">
                  <li class="main-mega">
                    <a href="#">
                      best selling
                      <i class="fa fa-angle-right" aria-hidden="true"></i>
                    </a>
                    <ul class="mega-menu">
                      <li class="single-menu">
                        <a href="#" class="title-link">Electronics</a>
                        <div class="image">
                          <img src="https://via.placeholder.com/225x155" alt="#" />
                        </div>
                        <div class="inner-link">
                          <a href="#">Television</a>
                          <a href="#">Accessories & Supplies</a>
                          <a href="#">Camera</a>
                          <a href="#">Audio</a>
                        </div>
                      </li>
                      <li class="single-menu">
                        <a href="#" class="title-link">Computing</a>
                        <div class="image">
                          <img src="https://via.placeholder.com/225x155" alt="#" />
                        </div>
                        <div class="inner-link">
                          <a href="#">Laptops</a>
                          <a href="#">Desktops</a>
                          <a href="#">Accessories & Supplies</a>
                          <a href="#">IOT & Components</a>
                        </div>
                      </li>
                      <li class="single-menu">
                        <a href="#" class="title-link">Fashion</a>
                        <div class="image">
                          <img src="https://via.placeholder.com/225x155" alt="#" />
                        </div>
                        <div class="inner-link">
                          <a href="#">Beauty</a>
                          <a href="#">Ladies</a>
                          <a href="#">Men</a>
                          <a href="#">Baby</a>
                        </div>
                      </li>
                    </ul>
                  </li>
                  <li
                    v-for="category in Categories"
                    :key="category.id"
                    @mouseover="getSubs(category.id)"
                  >
                    <a href="#" style="font-weight:bold;font-family:'courier new';font-size:12px;line-height:1px !important">
                      {{category.Category}}
                      <i class="fa fa-angle-right" aria-hidden="true"></i>
                    </a>
                    <ul class="sub-category">
                      <li v-for="sub in SubCategories" :key="sub.id">
                        <a href="#" style="font-weight:bold;font-family:'courier new';font-size:12px;line-height:1px !important">{{sub.SubCategory}}</a>
                      </li>
                    </ul>
                  </li>
                </ul>
              </div>
            </div>
            <div class="col-lg-9 col-12">
              <div class="pull-right">
                <!-- Main Menu -->
                <nav class="navbar navbar-expand-lg">
                  <div class="navbar-collapse">
                    <div class="nav-inner">
                      <ul class="nav main-menu menu navbar-nav">
                        <li>
                          <a href="/DL891URi4QURM0MaYoa">
                            Shop
                          </a>
                        </li>
                         <li>
                          <a href="/cart">My Cart</a>
                        </li>
                         <li>
                          <a href="/Wishlist">Wishlist</a>
                        </li>
                        <li>
                          <a href="/crcO1bX8i5GjqPWsr5vlN2w8WIgrg12">
                            Blog
                          </a>
                        </li>
                        <li>
                          <a href="/Contact">Contact Us</a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </nav>
                <!--/ End Main Menu -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--/ End Header Inner -->
  </header>
    <!-- Slider Area -->
<section class="hero-slider">
    <!-- Single Slider -->
    <div class="single-slider">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-lg-9 offset-lg-3 col-12">
                    <div class="text-inner">
                        <div class="row">
                            <div class="col-lg-7 col-12">
                                <div class="hero-text">
                                    <h1><span>UP TO 50% OFF </span>Shirt For Man</h1>
                                    <p>Maboriosam in a nesciung eget magnae <br> dapibus disting tloctio in the find it pereri <br> odiy maboriosm.</p>
                                    <div class="button">
                                        <a href="#" class="btn">Shop Now!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ End Single Slider -->
</section>
<!--/ End Slider Area -->

<!-- Start Small Banner  -->
<section class="small-banner section">
    <div class="container-fluid">
         <h1 class="text-center">
                Collections
        </h1>
        <div class="row">
            <!-- Single Banner  -->
            <div class="col-sm-2" v-for="collection in Collections" :key="collection.id">
                <div class="single-banner">
                    <img :src="'../'+collection.Image" alt="#">
                    <div class="content">
                        <button>{{collection.Title}}</button>
                        <h6 style="color:white;text-shadow:2px 2px black">{{collection.Description}}</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Small Banner -->

<!-- Start Product Area -->
<div class="product-area section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>Top Categories</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="product-info">
                        <div class="nav-main">
                            <!-- Tab Nav -->
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" v-for="category in TopCategories" :key="category.id"><a class="nav-link" @click="getProd(category.Category)">{{ category.Category }}</a></li>
                                <li class="nav-item"><a class="nav-link" @click="loadSingles()">All</a></li>
                            </ul>
                            <!--/ End Tab Nav -->
                        </div>
                        <div class="row">
                            <div class="col-sm-2" v-for="tp in TopProducts" :key="tp.id">
                                <div class="single-product card">
                                    <div class="product-img">
                                        <a :href="'/Product/'+tp.Slug">
                                            <img :src="tp.ProductBanner" alt="tp.ProductName" style="height:138px;width:229px">
                                            <span class="out-of-stock"><b>-</b>{{tp.Discount}}%</span>
                                        </a>
                                        <div class="button-head">
                                            <div class="product-action">
                                                <a :href="'/Product/'+tp.Slug"><i class=" ti-eye"></i><span>View</span></a>
                                                <a href="javascript:void(0)" style="padding-right:20px" @click="AddWish(tp.SKU)">
                                                    <i class="ti-heart"></i>
                                                    <span>Add Wishlist</span>
                                                </a>
                                            </div>
                                            <div class="product-action-2">
                                                <a title="Add to cart" href="javascript:void(0)" class="btn" @click="AddCart(tp.SKU)">Add to cart</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <h6> <a  :href="'/Product/'+tp.Slug"> {{tp.ProductName}}</a></h6>
                                        <div class="mt-2 product-price">
                                            <span style="font-size:12px">Was <del>Ksh. {{tp.Price}}</del></span>
                                            <span style="color:green;font-size:12px">Now Ksh{{tp.FinalPrice}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
<!-- End Product Area -->

<!-- Start Midium Banner  -->
<section class="midium-banner">
    <div class="container">
        <div class="row">
            <!-- Single Banner  -->
            <div class="col-lg-6 col-md-6 col-12" v-for="featured in Featured" :key="featured.id">
                <div class="single-banner">
                    <img :src="featured.Image" alt="#">
                    <div class="content">
                        <p style="text-shadow:1px 1px white;font-size:20px">{{featured.Title}}</p>
                        <h3 style="text-shadow:1px 1px white">{{featured.Description}}</h3>
                        <a href="#">View Collection</a>
                    </div>
                </div>
            </div>
            <!-- /End Single Banner  -->
        </div>
    </div>
</section>
<!-- End Midium Banner -->
<!-- Start Shop Home List  -->
<section class="mt-5 shop-home-list section">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-12">
                <div class="row">
                    <div class="col-12">
                        <div class="shop-section-title">
                            <h1>On sale</h1>
                        </div>
                    </div>
                </div>
                <!-- Start Single List  -->
                <div class="single-list" v-for="hot in HotProducts" :key="hot.id">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="list-image overlay">
                                <!-- <img src="https://via.placeholder.com/115x140" alt="#"> -->
                                <img :src="hot.ProductBanner" alt="" style="width:115px; height:100px !important">
                                <a href="javascript:void(0)" class="buy" @click="AddCart(hot.SKU)"><i class="fa fa-shopping-bag"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12 no-padding">
                            <div class="content">
                                <h4 class="title">
                                    <a :href="'/Product/'+hot.Slug">
                                        {{ hot.ProductName }}
                                    </a>
                                    </h4>
                                <p class="price with-discount">Ksh: {{hot.FinalPrice}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single List  -->
            </div>
            <div class="col-lg-4 col-md-6 col-12">
                <div class="row">
                    <div class="col-12">
                        <div class="shop-section-title">
                            <h1>Best Seller
                            </h1>
                        </div>
                    </div>
                </div>
                <!-- Start Single List  -->
                <div class="single-list" v-for="best in BestSeller" :key="best.id">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="list-image overlay">
                                <img :src="best.ProductBanner" alt="" style="width:115px; height:100px !important">
                                <a href="javascript:void(0)" class="buy" @click="AddCart(best.SKU)"><i class="fa fa-shopping-bag"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12 no-padding">
                            <div class="content">
                                <h5 class="title"><a :href="'/Product/'+best.Slug">{{best.ProductName}}</a></h5>
                                <p class="price with-discount">Ksh: {{best.FinalPrice}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single List  -->
            </div>
            <div class="col-lg-4 col-md-6 col-12">
                <div class="row">
                    <div class="col-12">
                        <div class="shop-section-title">
                            <h1>Top viewed</h1>
                        </div>
                    </div>
                </div>
                <!-- Start Single List  -->
                <div class="single-list" v-for="top in TopViewed" :key="top.id">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="list-image overlay">
                                 <img :src="top.ProductBanner" alt="" style="width:115px; height:100px !important">
                                <a href="javascript:void(0)" class="buy" @click="AddCart(top.SKU)"><i class="fa fa-shopping-bag"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12 no-padding">
                            <div class="content">
                                <h5 class="title"><a :href="'/Product/'+top.Slug">
                                    {{ top.ProductName }}
                                    </a></h5>
                                <p class="price with-discount">Ksh: {{top.FinalPrice}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single List  -->
            </div>
        </div>
    </div>
</section>
<!-- End Shop Home List  -->
</div>
</template>
<script>
    export default{
        data(){
            return{
                Collections:[],
                TopCategories:[],
                TopProducts:[],
                Featured:[],
                HotProducts:[],
                BestSeller:[],
                TopViewed:[],
                CartCount:0,
                CartProducts:[],
                Categories: [],
                SubCategories: [],
                isLoggedIn: "",
                Logo:document.domain+'/images/logo.png',
                CartTotal:'',
                WishListed:0,
                MinCart:1,
            }
        },
        methods:{
    countCart(){
        axios.get('/k1HT1eDwpUe5LG9').then((response)=>{
            this.CartCount=response.data
        })
    },
    countWish(){
       axios.get('/k1HT1eDwp9').then((response)=>{
            this.WishListed=response.data
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
                    this.countCart()
                    this.getCart()
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
            AddWish(sku){
                axios.get('/mHCAGNXtutk/S2wTcoUWu8cP').then((response)=>{
                    // console.log(response.data)
                    //set session username to a random username
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
            loadHot(){
                axios.get('/Sk9zv/4LZ/A8zKt70Js0mRzqA').then((response)=>{
                    this.HotProducts=response.data

                })
            },
            loadBest(){
                axios.get('/Sk9zv/4LZ/k1HT1eDwpUe5LG95e').then((response)=>{
                    this.BestSeller=response.data

                })
            },
            loadTopViewed(){
                axios.get('Sk9zv/4LZ/A8zKt7zqA').then((response)=>{
                    this.TopViewed=response.data

                })
            },
            loadFeatured(){
                 axios.get('/S5SnACVegWU6XnYlJI').then((response)=>{
                    this.Featured=response.data

                })
            },
            loadSingles(){
                axios.get('/Q8ZWsf74d/A2rno6EFpxeZZ0k7MuwWItodfoq8IIe').then((response)=>{
                    this.TopProducts=response.data
                })
            },
            getProd(id){
                axios.get('/S5SnACVegWU6XnYaKa3JV6R/'+id).then((response)=>{
                   if(response.data.length<=0){
                       return '';
                   }else{
                        this.TopProducts=response.data
                   }
                })
            },
            loadTop(){
                axios.get('/S5SnACVegWU6XnYaKa3J').then((response)=>{
                    this.TopCategories=response.data

                })
            },
             loadCollections(){
                axios.get('/S5SnACVegWU6XnYaKa3JV6R5yI9SVWB').then((response)=>{
                    this.Collections=response.data

                })
            },
            LoadCategories() {
                axios.get("/ClywjTdDiB7G3yYmszGO").then((response) => {
                this.Categories = response.data.Categories;
                });
            },
            getSubs(id) {
                axios.get("/fThtjpKy1XPtGuWbqwuOY9Rc5CQHle/" + id).then((response) => {
                    this.SubCategories = response.data;
                });
            },
            checkLogin() {
                axios.get("/api/JIoIB58KFb8E682uZRiTdgRgufiJ").then((response) => {
                    this.isLoggedIn = response.data.isLoggedIn[0];
                    // console.log(this.isLoggedIn=="")
                });
            },
        },created(){
            this.loadTop()
            this.loadCollections()
            this.loadSingles()
            this.loadFeatured()
            this.loadHot()
            this.loadTopViewed()
            this.loadBest()
            this.countCart()
            this.getCart()
            this.checkLogin();
            this.LoadCategories();
            this.getCartTotal()
            this.countWish()
            this.token=$('meta[name="csrf-token"]').attr('content')
        }
    }
</script>
