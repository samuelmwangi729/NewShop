<template>
    <div class="mt-5 container-fluid noprint">
        <div class="mt-3 container-fluid">
            <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <h2 class="text-center">
                                My Orders
                            </h2>
                        </h3>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Order Number {{OrderNumber}}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <table class="table table-bordered table-stripped">
                                    <thead>
                                        <tr>
                                            <td>
                                                Pickup Station
                                            </td>
                                             <td>
                                                Shipped To:
                                            </td>
                                             <td>
                                                Order Status
                                            </td>
                                            <td>
                                                Date Sent
                                            </td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                {{ AllClientData.Pickup }}
                                            </td>
                                            <td>
                                                {{ AllClientData.Client }}
                                            </td>
                                             <td>
                                                 <span v-if="AllClientData.Status==1" style="color:green">
                                                     Shipped
                                                 </span>
                                                 <span v-if="AllClientData.Status==0" style="color:red">
                                                     Pending Shipping
                                                 </span>
                                                 <span v-if="AllClientData.Status==2" style="color:green">
                                                     Cancelled By The You
                                                 </span>
                                                 <span v-if="AllClientData.Status==3" style="color:green">
                                                     Cancelled By The Seller
                                                 </span>
                                            </td>
                                             <td>
                                                {{ AllClientData.DateSent }}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <h2 class="text-center">
                                    Order Item(s)
                                </h2>
                                <table class="table table-condensed table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Qty</th>
                                            <th>Price/Piece</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="products in AllProducts" :key="products.id">
                                            <td>
                                                {{ products[0][0].ProductName }}
                                            </td>
                                            <td>
                                                 {{ products[1] }}
                                            </td>
                                            <td>
                                             Ksh. {{ products[0][0].FinalPrice }}
                                            </td>
                                             <td>
                                             Ksh. {{ products[0][0].FinalPrice *  products[1] }}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <button @click="Print(OrderNumber)">Print</button>
                                <button class="btn btn-info btn-xs" style="font-size:10px">
                                    Complain
                                </button>
                            </div>
                            </div>
                        </div>
                    </div>
                    <!-- Bordered Table -->
                    <!-- =================================================== -->
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Order Number</th>
                                        <th>Client</th>
                                        <th>Pickup Station</th>
                                        <th>Date Placed</th>
                                        <th>Date Sent</th>
                                        <th>Date Received</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="order in Orders" :key="order.id">
                                        <td>{{order.OrderNumber}}</td>
                                        <td>{{order.Client}}</td>
                                        <td>{{order.Pickup}}</td>
                                        <td>{{order.DatePlaced}}</td>
                                        <td>
                                            <span v-if="order.DateSent==null">
                                                <small style="color:red">Not Yet Shipped</small>
                                            </span>
                                            <span v-else>
                                                <small style="color:green">
                                                    {{ order.DateSent }}
                                                </small>
                                            </span>
                                        </td>
                                        <td>
                                            <span v-if="order.DateReceived==null">
                                                <small style="color:red">Not Yet Received</small>
                                            </span>
                                            <span v-else>
                                                <small style="color:green">
                                                    {{ order.DateReceived }}
                                                </small>
                                            </span>
                                        </td>
                                        <td>
                                            <button class="btn btn-secondary btn-xs" style="font-size:10px" data-toggle="modal" data-target="#exampleModal" @click="setOrder(order.OrderNumber)">
                                                View Order
                                            </button>
                                            <button class="btn btn-success btn-xs" style="font-size:10px" @click="Received(order.OrderNumber)">
                                                Mark Received
                                            </button>
                                            <button class="btn btn-primary btn-xs" style="font-size:10px">
                                                Rating
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <button class="btn btn-success fa fa-eye" style="font-size:12px !important">
                                View All
                            </button>
                        </div>
                    </div>
                    <!-- =================================================== -->
                    <!-- End Bordered Table -->
                </div>
        </div>
    </div>
</template>
<script>
export default {
    data(){
        return{
            Orders:[],
            OrderNumber:'',
            AllClientData :[],
            AllProducts:[]
        }
    },
    methods:{
        Print(Order){
            alert(Order)
        },
        setOrder(id){
            this.OrderNumber=id
            //fetch all the cart products with the current logged in users and also the order number plus the user details
            axios.get('/getAllUserData/'+id.split("#")[1]).then((response)=>{
                this.AllClientData=response.data
            })
            //then get all the products data from the order
            this.getAllData(id.split("#")[1])
        },
        getAllData(id){
            axios.get('/getOrderProducts/'+id).then((response)=>{
                this.AllProducts=response.data
            })
        },
        getOrders(){
            axios.get('/JvNDv6EMuWNrd0BioK4alYet1V4qD').then((response)=>{
                this.Orders=response.data
                // console.log(response.data)
            })
        },
        Received(Order){
            // alert(Order.split("#")[1])
            axios.get('/markReceived/'+Order.split("#")[1]).then((response)=>{
                //show sweetalert
                if(response.data.Status=='error'){
                    swal
                    ({
                        title:'An Error Occurred',
                        text:response.data.message,
                        icon:'error'
                    })
                }
                if(response.data.Status=='success'){
                    swal
                    ({
                        title:'Completed',
                        text:response.data.message,
                        icon:'success'
                    })
                }
            })
        },
    },
    created(){
        this.getOrders()
    }
}
</script>
