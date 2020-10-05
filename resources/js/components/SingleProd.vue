<template>
    <div class="container-fluid">
        <head-component></head-component>
        <div class="row">
            <div class="mt-3 col-sm-6 offset-sm-3 card" style="margin-right:10px">
                <!-- {{ Product }} -->
                <div class="row">
                    <div class="col-sm-5">
                        <img :src="Banner" alt="Product.ProductName" style="width:350px;height:201px !important" >
                        <div class="ml-2 row">
                            <div class="mt-2 col-xs-3" style="margin-right:20px">
                                <img :src="Product.ProductBanner" height="50px" width="50px" @mouseover="ShowPicture(Product.ProductBanner)" @click="ShowPicture(Product.ProductBanner)">

                            </div>
                            <div class="mt-2 col-xs-3">
                                <img :src="Product.FrontImage" height="50px" width="50px" @mouseover="ShowPicture(Product.FrontImage)" @click="ShowPicture(Product.FrontImage)">
                            </div>
                             <div class="mt-2 col-xs-3" style="margin-left:20px">
                                <img :src="Product.SideImage" height="50px" width="50px" @mouseover="ShowPicture(Product.SideImage)" @click="ShowPicture(Product.SideImage)">
                            </div>
                             <div class="mt-2 col-xs-3" style="margin-left:20px">
                                <img :src="Product.BackImage" height="50px" width="50px" @mouseover="ShowPicture(Product.BackImage)" @click="ShowPicture(Product.BackImage)">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-7">
                        <h3 class="text-center">
                            {{ Product.ProductName }}
                        </h3>
                         <span>
                                Brand: {{ Product.ProductBrand }}
                                <a :href="'Brands/'+Product.ProductBrand" style="color:blue">View Goods with Similar Branding </a>
                            </span>
                            <hr>
                            <h3>KSH {{Product.FinalPrice}}</h3>
                            <h5>KSH <del>{{Product.FinalPrice}}</del>
                            <div class="badge badge-danger">
                                -{{ Product.Discount }}% off
                            </div>
                            </h5>
                            <div class="row" style="margin-left:100px;margin-top:20px">
                                <div class="col-xs-4">
                                   <button style="width:50px;height:20px;font-size:15px;margin-right:1px;background-color:red;color:white" @click="Sub()">
                                     <i class="fa fa-minus-circle"></i>
                                   </button>
                                </div>
                                <div class="col-xs-4">
                                  {{ MinCart }} Piece(s)
                                </div>
                                <div class="col-xs-4">
                                    <button  style="width:50px;height:20px;font-size:15px;margin-left:1px;background-color:blue;color:white" @click="Add()">
                                        <i class="fa fa-plus-circle"></i>
                                    </button>
                                </div>
                            </div>
                            <button class="mt-3 mb-2 btn-block btn-primary" @click="AddCart(Product.SKU)"><h3>Add to Cart</h3></button>
                    </div>
                </div>
            </div>
            <div class="col-sm-2 card" style="margin-top:10px">
                Delivery Details
                <hr>
                <ul class="list-group">
                    <li class="list-item">
                        <i class="fa fa-truck" style="color:#f7941d"></i> <strong>Enjoy Express Delivery</strong>
                    </li>
                    <hr>
                    <li class="list-item">
                        <i class="fa fa-send" style="color:#f7941d"></i> &nbsp;<strong>Use Xpress Mashinani to  Send to Mashinani</strong>
                    </li>
                    <hr>
                     <li class="list-item">
                        <i class="fa fa-refresh" style="color:#f7941d"></i> &nbsp;<strong>Our Return Policy</strong>
                    </li>
                    <hr>
                </ul>
            </div>
            <div class="mt-3 col-sm-6 offset-sm-3 card">
               <span v-html="Product.Description"></span>
            </div>
        </div>
    </div>
</template>
<script>
    export default{
        data(){
            return{
                Product:[],
                Banner:'',
                MinCart:1

            }
        },
        methods:{
                getCartTotal(){
        axios.get('/k1HT1eDwpUe5LG95ey7').then((response)=>{
            this.CartTotal=response.data
        })

    },
            AddCart(sku){
                // alert(this.MinCart)
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
            Add(){
                this.MinCart=this.MinCart+1;
            },
            Sub(){
                this.MinCart=this.MinCart-1;
            },
            getProduct(){
                axios.get('/grnQOcLDrT6b387qeR0hz79K').then((response)=>{
                    this.Product=response.data
                    this.Banner=this.Product.ProductBanner
                })
            },
            ShowPicture(id){
                this.Banner=id
            }
        },
        created(){
            this.getProduct()
        },
        watch:{
            MinCart:function(){
                //if it changes below 1,
                if(this.MinCart<1){
                    this.MinCart=1;
                    return;
                }
            }
        }
    }
</script>
