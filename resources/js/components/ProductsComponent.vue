<template>
    <div class="container-fluid card">
          <h2 class="pull-left text-center">
            Available Products
        </h2>
        <table id="demo-dt-basic" class="table table-condensed table-bordered table-responsive" style="margin-top:20px">
            <thead>
                <tr>
                    <th>Banner</th>
                    <th>Name</th>
                    <th>Brand</th>
                    <th>Price</th>
                    <th>Discount</th>
                    <th>Discounted Price</th>
                    <th>Posted By</th>
                    <th>Status</th>
                    <th>Coupon Available</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="product in Products" :key="product.id">
                    <td>
                        <img :src="product.ProductBanner" width="30px" height="30px" style="border-radius:30px">
                    </td>
                    <td style="font-size:10px">
                        {{ product.ProductName }}
                    </td>
                    <td>
                          {{ product.ProductBrand }}
                    </td>
                    <td>
                        Ksh. {{ product.Price }}
                    </td>
                    <td>
                        {{ product.Discount }} %
                    </td>
                    <td>
                       Ksh.{{ product.FinalPrice }}
                    </td>
                    <td>
                        {{ product.AddedBy }}
                    </td>
                    <td>
                        <span v-if="product.Status==0" style="color:red">Pending Approval</span>
                        <span v-else-if="product.Status==1" style="color:green">Approved</span>
                        <span v-else style="color:purple">Suspended</span>
                    </td>
                    <td>
                        <span v-if="product.HasCoupon==0" style="color:Red">
                            No Coupon Available
                        </span>
                        <span v-else>
                            Coupon Code Available
                        </span>
                        <td>
                            <i class="fa fa-eye" style="color:green" @click="Show(product.Slug)"></i>
                            <i class="fa fa-edit" style="color:blue" @click="Edit(product.Slug)"></i>
                            <span v-if="product.Status==1">
                                <i class="fa fa-times" style="color:red" @click="Suspend(product.Slug,'Suspend')"></i>
                            </span>
                            <span v-else> <i class="fa fa-check" style="color:purple" @click="Suspend(product.Slug,'Approve')"></i></span>
                        </td>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>
<script>
    export default{
        data(){
            return{
                Products:[],
                Category:''
            }
        },
        methods:{
            Suspend(id,type){
                axios.get('/uJgiDGMJLjENaaSthKat5OaDaXFW/'+id+'/'+type).then((response)=>{
                    console.log(response.data)
                     this.getProducts()
                })
            },
            Show(id){
                window.open('/product/'+id,'_parent');
            },
            Edit(id){
                window.open('/product/'+id+'/edit','_parent');
            },
            getProducts(){
                axios.get('/joRmnz918OuV/uJgiDGMJLjENaaSthKat5OaDaXFW').then((response)=>{
                    this.Products=response.data
                }).catch((error)=>{
                    console.log(error)
                })
            }
        },
        created(){
            this.getProducts()
        }
    }
</script>
