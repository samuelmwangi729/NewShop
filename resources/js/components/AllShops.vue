<template>
    <div class="container-fluid card table-responsive">
          <div class="container">
              <div class="pull-left">
                  <h2 class="pull-left text-center">
            Available Shops
        </h2>
              </div>
              <div class="pull-right">
                  <form class="mt-3 form-inline">
                      <input type="text" name="" id="" class="form-control">
                      <button class="btn btn-success">
                          <i class="fa fa-search"></i>
                      </button>
                  </form>
              </div>
          </div>
        <table class="table table-condensed table-bordered">
            <thead>
                <tr>
                    <th></th>
                    <th>Store Number</th>
                    <th>Shop Name</th>
                    <th>Address</th>
                    <th>Phone Number</th>
                    <th>Payment method</th>
                    <th>Mpesa Number</th>
                    <th>Owner</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="shop in Shops" :key="shop.id">
                    <td>
                        <img :src="shop.ShopLogo" :alt="shop.ShopName" width="40px" height="40px" style="border-radius:40px">
                    </td>
                     <td>
                        {{ shop.ShopNumber }}
                    </td>
                    <td>
                        {{ shop.ShopName }}
                    </td>
                    <td>
                          {{ shop.ShopAddress }}
                    </td>
                    <td>
                          {{ shop.ShopPhoneNumber }}
                    </td>
                    <td>
                        {{ shop.ShopAcceptable }}
                    </td>
                    <td>
                        {{ shop.ShopMpesa }}
                    </td>
                    <td>
                        {{ shop.ShopOwner }}
                    </td>
                    <td>
                        <span v-if="shop.ShopStatus==1">
                            <div class="badge badge-success">
                                Shop Active
                            </div>
                        </span>
                        <span v-else>
                            <div class="badge badge-warning">
                                Shop Suspended
                            </div>
                        </span>
                    </td>
                    <td>
                        <i class="fa fa-trash"></i>
                        <i class="fa fa-edit" style="color:blue" @click="Edit(shop.ShopNumber)"></i>
                        <i class="fa fa-eye" style="color:green" @click="Show(shop.ShopNumber)"></i>
                        <span v-if="shop.ShopStatus==0">
                            <i class="fa fa-check-circle" style="color:green"  @click="Suspend(shop.ShopNumber,'appprove')"></i>
                        </span>
                        <span v-else>
                            <i class="fa fa-times-circle" style="color:purple" @click="Suspend(shop.ShopNumber,'suspend')"></i>
                        </span>
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
                Shops:[],
                Category:''
            }
        },
        methods:{
            Suspend(id,type){
                axios.get('/uJgiDGMJLjENaaSt/'+id+'/'+type).then((response)=>{
                     this.getShops()
                })
            },
            Show(id){
                window.open('/product/'+id,'_parent');
            },
            Edit(id){
                window.open('/shop/'+id+'/edit','_parent');
            },
            getShops(){
                axios.get('/joRmnz918OuV/uJgiDGMJLjEN').then((response)=>{
                    this.Shops=response.data
                    console.log(this.Shops)
                }).catch((error)=>{
                    console.log(error)
                })
            }
        },
        created(){
            this.getShops()
        }
    }
</script>
