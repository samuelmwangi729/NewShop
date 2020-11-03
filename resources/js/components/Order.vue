<template>
    <div class="mt-5 container-fluid">
        <div class="mt-3 container-fluid">
            <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <h2 class="text-center">
            My Orders
        </h2
        ></h3>
                    </div>
                    <!-- Bordered Table -->
                    <!-- =================================================== -->
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Order Number</th>
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
                                            <button class="btn btn-secondary">
                                                <i class="fa fa-eye"></i>
                                                View Order
                                            </button>
                                            <button class="btn btn-success">
                                                <i class="fa fa-check-circle"></i>
                                                Mark Received
                                            </button>
                                            <button class="btn btn-primary">
                                                <i class="fa fa-star"></i>
                                                Rate Products
                                            </button>
                                            <button class="btn btn-info">
                                                <i class="fa fa-times-circle"></i>
                                                Complain
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
            Orders:[]
        }
    },
    methods:{
        getOrders(){
            axios.get('/JvNDv6EMuWNrd0BioK4alYet1V4qD').then((response)=>{
                this.Orders=response.data
                // console.log(response.data)
            })
        }
    },
    created(){
        this.getOrders()
    }
}
</script>
