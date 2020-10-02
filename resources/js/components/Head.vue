<template>
    <div class="container-fluid">
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
                <img src="images/logo.png" alt="logo" style="width:150px"/>
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
                        <a href="#" class="title-link">Shop Kids</a>
                        <div class="image">
                          <img src="https://via.placeholder.com/225x155" alt="#" />
                        </div>
                        <div class="inner-link">
                          <a href="#">Kids Toys</a>
                          <a href="#">Kids Travel Car</a>
                          <a href="#">Kids Color Shape</a>
                          <a href="#">Kids Tent</a>
                        </div>
                      </li>
                      <li class="single-menu">
                        <a href="#" class="title-link">Shop Mens</a>
                        <div class="image">
                          <img src="https://via.placeholder.com/225x155" alt="#" />
                        </div>
                        <div class="inner-link">
                          <a href="#">Watch</a>
                          <a href="#">T-shirt</a>
                          <a href="#">Hoodies</a>
                          <a href="#">Formal Pant</a>
                        </div>
                      </li>
                      <li class="single-menu">
                        <a href="#" class="title-link">Shop Womens</a>
                        <div class="image">
                          <img src="https://via.placeholder.com/225x155" alt="#" />
                        </div>
                        <div class="inner-link">
                          <a href="#">Ladies Shirt</a>
                          <a href="#">Ladies Frog</a>
                          <a href="#">Ladies Sun Glass</a>
                          <a href="#">Ladies Watch</a>
                        </div>
                      </li>
                    </ul>
                  </li>
                  <li
                    v-for="category in Categories"
                    :key="category.id"
                    @mouseover="getSubs(category.id)"
                  >
                    <a href="#" style="font-weight:bold;font-size:12px;line-height:3px !important">
                      {{category.Category}}
                      <i class="fa fa-angle-right" aria-hidden="true"></i>
                    </a>
                    <ul class="sub-category">
                      <li v-for="sub in SubCategories" :key="sub.id">
                        <a href="#">{{sub.SubCategory}}</a>
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
    </div>
</template>
<script>
export default {
    data(){
        return{

            CartCount:0,
            CartProducts:[],
            isLoggedIn: "",
            CartTotal:'',
            WishListed:0,
            Categories:[]
        }
    },
   methods:{
       checkLogin() {
      axios.get("/api/JIoIB58KFb8E682uZRiTdgRgufiJ").then((response) => {
        this.isLoggedIn = response.data.isLoggedIn[0];
        // console.log(this.isLoggedIn=="")
      });
    },
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
   },
    created(){
        //loads when the component is created
        this.countCart()
        this.countWish(),
        this.getCart()
        this.getCartTotal(),
        this.checkLogin()
    }
}
</script>
