<template>
    <div>
         <div class="row">
            <div class="col-md-3">
                <div class="panel">
                    <div class="panel-body text-center">
                        <h4>
                          <i class="fa fa-user-secret"></i>  Visitors|{{ Visitors }}
                        </h4>
                    </div>
                </div>
            </div>
             <div class="col-md-3">
                <div class="panel">
                    <div class="panel-body text-center">
                        <h4>
                           <i class="fa fa-group"></i> Users|{{ Users }}
                        </h4>
                    </div>
                </div>
            </div>
             <div class="col-md-3">
                <div class="panel">
                    <div class="panel-body text-center">
                        <h4>
                            <i class="fa fa-calendar"></i> Todays Visitors|{{ TodaysVisitors }}
                        </h4>
                    </div>
                </div>
            </div>
             <div class="col-md-3">
                <div class="panel">
                    <div class="panel-body text-center">
                        <h4>
                            <i class="fa fa-file-pdf-o"></i> All Orders|{{ Orders }}
                        </h4>
                    </div>
                </div>
            </div>
             <div class="col-md-3">
                <div class="panel">
                    <div class="panel-body text-center">
                        <h4>
                           <i class="fa fa-university"></i> Shops|{{ Shops }}
                        </h4>
                    </div>
                </div>
            </div>
             <div class="col-md-3">
                <div class="panel">
                    <div class="panel-body text-center">
                        <h4>
                           <i class="fa fa-money"></i> Payments|Ksh {{ Payments }}
                        </h4>
                    </div>
                </div>
            </div>
             <div class="col-md-3">
                <div class="panel">
                    <div class="panel-body text-center">
                        <h4>
                           <i class="fa fa-mobile-phone"></i>Paid By Mpesa |Ksh {{ PaidMpesa }}
                        </h4>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="panel">
                    <div class="panel-body text-center">
                        <h4>
                           <i class="fa fa-credit-card"></i> Paid By Card|Ksh {{ PaidCard }}
                        </h4>
                    </div>
                </div>
            </div>
             <div class="col-md-3">
                <div class="panel">
                    <div class="panel-body text-center">
                        <h4>
                          <i class="fa fa-dropbox"></i> Products|{{ Products }}
                        </h4>
                    </div>
                </div>
            </div>
             <div class="col-md-3">
                <div class="panel">
                    <div class="panel-body text-center">
                        <h4>
                          <i class="fa fa-backward"></i> Returned Products| {{ ReturnedGoods }}
                        </h4>
                    </div>
                </div>
            </div>
             <div class="col-md-3">
                <div class="panel">
                    <div class="panel-body text-center">
                        <h4>
                          <i class="fa fa-check-circle"></i> Processed Orders|{{ ProcessedOrders }}
                        </h4>
                    </div>
                </div>
            </div>
             <div class="col-md-3">
                <div class="panel">
                    <div class="panel-body text-center">
                        <h4>
                          <i class="fa fa-user"></i> Approved Sellers| {{ Sellers }}
                        </h4>
                    </div>
                </div>
            </div>
             <div class="col-md-3">
                <div class="panel">
                    <div class="panel-body text-center">
                        <h4>
                         <i class="fa fa-user-times"></i> Sellers Under Review| {{ SellersReviewed }}
                        </h4>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="panel">
                    <div class="panel-body text-center">
                        <h4>
                         <i class="fa fa-list"></i> Brands| {{ Brands }}
                        </h4>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="panel">
                    <div class="panel-body text-center">
                        <h4>
                         <i class="fa fa-list"></i> Categories|{{ Categories }}
                        </h4>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="panel">
                    <div class="panel-body text-center">
                        <h4>
                         <i class="fa fa-globe fa-spin"></i> Locations| {{ Locations }}
                        </h4>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="panel">
                    <div class="panel-body text-center">
                        <h4>
                         <i class="fa fa-truck"></i> PickUp Location| {{ PickupLocations }}
                        </h4>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="panel">
                    <div class="panel-body text-center">
                        <h4>
                         <i class="fa fa-list"></i> Collections| {{ Collections }}
                        </h4>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="panel">
                    <div class="panel-body text-center">
                        <h4>
                         <i class="fa fa-print"></i> Reports| <a href="#">Print reports</a>
                        </h4>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="panel">
                    <div class="panel-body text-center">
                        <h4>
                         <i class="fa fa-users"></i> Staff| {{ Staff }}
                        </h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="container-fluid">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title"> Order List </h3>
                    </div>
                    <div class="panel-body">
                        <!--Default Tabs (Left Aligned)-->
                        <!--===================================================-->
                        <div class="tab-base mar-no">
                            <!--Nav Tabs-->
                            <ul class="nav nav-tabs">
                                <li class="active"> <a data-toggle="tab" href="#demo-lft-tab-1"> New User </a> </li>
                                <li> <a data-toggle="tab" href="#demo-lft-tab-2">New Clients</a> </li>
                                <li> <a data-toggle="tab" href="#demo-lft-tab-3">Invoices</a> </li>
                            </ul>
                            <!--Tabs Content-->
                            <div class="tab-content">
                                <div id="demo-lft-tab-1" class="tab-pane fade active in">
                                    <!--Bordered Table-->
                                    <!--===================================================-->
                                    <div class="table-responsive">
                                        <table class="table table-hover table-vcenter">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Name</th>
                                                    <th>Position</th>
                                                    <th>Office</th>
                                                    <th>start date</th>
                                                    <th>Salary</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>Albert Desouza</td>
                                                    <td><span class="label label-purple">System Architect</span></td>
                                                    <td>Edinburgh</td>
                                                    <td>2011/04/25</td>
                                                    <td>$320,800</td>
                                                </tr>
                                                <tr>
                                                    <td>2</td>
                                                    <td>Teresa L. Doe</td>
                                                    <td><span class="label label-primary">Pre-Sales Support</span></td>
                                                    <td>Edinburgh</td>
                                                    <td>2011/04/25</td>
                                                    <td>$320,800</td>
                                                </tr>
                                                <tr>
                                                    <td>3</td>
                                                    <td>Veronica Gusikowski</td>
                                                    <td><span class="label label-danger">Civil Engineer</span></td>
                                                    <td>Edinburgh</td>
                                                    <td>2011/04/25</td>
                                                    <td>$320,800</td>
                                                </tr>
                                                <tr>
                                                    <td>4</td>
                                                    <td>Bruce Rogahn</td>
                                                    <td><span class="label label-success">CEO</span></td>
                                                    <td>Edinburgh</td>
                                                    <td>2011/04/25</td>
                                                    <td>$320,800</td>
                                                </tr>
                                                <tr>
                                                    <td>5</td>
                                                    <td>Carolina Hickle</td>
                                                    <td><span class="label label-info">Junior accountant</span></td>
                                                    <td>Edinburgh</td>
                                                    <td>2011/04/25</td>
                                                    <td>$320,800</td>
                                                </tr>
                                                <tr>
                                                    <td>6</td>
                                                    <td>Semantha</td>
                                                    <td><span class="label label-warning">System Architect</span></td>
                                                    <td>London</td>
                                                    <td>2012/04/25</td>
                                                    <td>$320,800</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!--===================================================-->
                                    <!--End Bordered Table-->
                                </div>
                                <div id="demo-lft-tab-2" class="tab-pane fade">
                                    <table class="table table-hover table-vcenter">
                                        <thead>
                                            <tr>
                                                <th>Customer Name</th>
                                                <th>Total Orders</th>
                                                <th class="text-center">Total Amount</th>
                                                <th>Delivery date</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>David Wilson</td>
                                                <td> 10 </td>
                                                <td class="text-center">$2000</td>
                                                <td>2012/04/25</td>
                                                <td>
                                                    <div class="label label-table label-info">On Process</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Amanda Nilson</td>
                                                <td> 20 </td>
                                                <td class="text-center">$4500</td>
                                                <td>2012/04/25</td>
                                                <td>
                                                    <div class="label label-table label-danger">pending</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Jhon Doe</td>
                                                <td> 30 </td>
                                                <td class="text-center">$5600</td>
                                                <td>2012/04/25</td>
                                                <td>
                                                    <div class="label label-table label-success">Shipped</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Bill Chang</td>
                                                <td> 45 </td>
                                                <td class="text-center">$7500</td>
                                                <td>2012/04/25</td>
                                                <td>
                                                    <div class="label label-table label-danger">Pending</div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div id="demo-lft-tab-3" class="tab-pane fade">
                                    <table class="table table-hover table-vcenter">
                                        <thead>
                                            <tr>
                                                <th>Invoice</th>
                                                <th>Name</th>
                                                <th class="text-center">Value</th>
                                                <th>Delivery date</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Order #53451</td>
                                                <td>
                                                    <span class="text-semibold">Desktop</span>
                                                    <br>
                                                    <small class="text-muted">Last 7 days : 4,234k</small>
                                                </td>
                                                <td class="text-center">$250</td>
                                                <td>2012/04/25</td>
                                                <td>
                                                    <div class="label label-table label-info">On Process</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Order #53451</td>
                                                <td>
                                                    <span class="text-semibold">Laptop</span>
                                                    <br>
                                                    <small class="text-muted">Last 7 days : 3,876k</small>
                                                </td>
                                                <td class="text-center">$350</td>
                                                <td>2012/04/25</td>
                                                <td>
                                                    <div class="label label-table label-danger">Cancelled</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Order #53451</td>
                                                <td>
                                                    <span class="text-semibold">Tablet</span>
                                                    <br>
                                                    <small class="text-muted">Last 7 days : 45,678k</small>
                                                </td>
                                                <td class="text-center">$325</td>
                                                <td>2012/04/25</td>
                                                <td>
                                                    <div class="label label-table label-success">Shipped</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Order #53451</td>
                                                <td>
                                                    <span class="text-semibold">Smartphone</span>
                                                    <br>
                                                    <small class="text-muted">Last 7 days : 34,553k</small>
                                                </td>
                                                <td class="text-center">$250</td>
                                                <td>2012/04/25</td>
                                                <td>
                                                    <div class="label label-table label-warning">Pending</div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!--===================================================-->
                        <!--End Default Tabs (Left Aligned)-->
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
              <div class="col-sm-6">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Last 5 Card Payments</h3>
                    </div>
                    <!-- Bordered Table -->
                    <!-- =================================================== -->
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Payee Names</th>
                                        <th>Amount</th>
                                        <th>Description</th>
                                        <th>Date/Time</th>
                                        <th>Fees</th>
                                        <th>Manager</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Albert Desouza</td>
                                        <td>$320,800</td>
                                        <td>Dont forget about fee</td>
                                        <td>20.01.2014 16:24</td>
                                        <td>$64.58</td>
                                        <td>John Doe</td>
                                    </tr>
                                    <tr>
                                        <td>Teresa L. Doe</td>
                                        <td>$320,800</td>
                                        <td>Delivery...	</td>
                                        <td>20.01.2014 12:24</td>
                                        <td>$45.58</td>
                                        <td>John Doe</td>
                                    </tr>
                                    <tr>
                                        <td>Veronica Gusikowski</td>
                                        <td>$320,800</td>
                                        <td>Will pay by cash</td>
                                        <td>20.01.2014 05:24</td>
                                        <td>$65.25</td>
                                        <td>John Doe</td>
                                    </tr>
                                    <tr>
                                        <td>Bruce Rogahn</td>
                                        <td>$320,800</td>
                                        <td>Call Me..</td>
                                        <td>20.01.2014 08:24</td>
                                        <td>$35.26</td>
                                        <td>John Doe</td>
                                    </tr>
                                    <tr>
                                        <td>Carolina Hickle</td>
                                        <td>$320,800</td>
                                        <td>Empty</td>
                                        <td>20.01.2014 12:24</td>
                                        <td>$25.21</td>
                                        <td>John Doe</td>
                                    </tr>
                                    <tr>
                                        <td>Semantha</td>
                                        <td>$320,800</td>
                                        <td>Still Pending</td>
                                        <td>20.01.2014 19:24</td>
                                        <td>$16.52</td>
                                        <td>John Doe</td>
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
            <div class="col-sm-6">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Last 5 Transaction(Mpesa)</h3>
                    </div>
                    <!-- Bordered Table -->
                    <!-- =================================================== -->
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Payee Names</th>
                                        <th>Amount</th>
                                        <th>Description</th>
                                        <th>Date/Time</th>
                                        <th>Fees</th>
                                        <th>Manager</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Albert Desouza</td>
                                        <td>$320,800</td>
                                        <td>Dont forget about fee</td>
                                        <td>20.01.2014 16:24</td>
                                        <td>$64.58</td>
                                        <td>John Doe</td>
                                    </tr>
                                    <tr>
                                        <td>Teresa L. Doe</td>
                                        <td>$320,800</td>
                                        <td>Delivery...	</td>
                                        <td>20.01.2014 12:24</td>
                                        <td>$45.58</td>
                                        <td>John Doe</td>
                                    </tr>
                                    <tr>
                                        <td>Veronica Gusikowski</td>
                                        <td>$320,800</td>
                                        <td>Will pay by cash</td>
                                        <td>20.01.2014 05:24</td>
                                        <td>$65.25</td>
                                        <td>John Doe</td>
                                    </tr>
                                    <tr>
                                        <td>Bruce Rogahn</td>
                                        <td>$320,800</td>
                                        <td>Call Me..</td>
                                        <td>20.01.2014 08:24</td>
                                        <td>$35.26</td>
                                        <td>John Doe</td>
                                    </tr>
                                    <tr>
                                        <td>Carolina Hickle</td>
                                        <td>$320,800</td>
                                        <td>Empty</td>
                                        <td>20.01.2014 12:24</td>
                                        <td>$25.21</td>
                                        <td>John Doe</td>
                                    </tr>
                                    <tr>
                                        <td>Semantha</td>
                                        <td>$320,800</td>
                                        <td>Still Pending</td>
                                        <td>20.01.2014 19:24</td>
                                        <td>$16.52</td>
                                        <td>John Doe</td>
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
    </div>
</template>
<script>
export default {
    data(){
        return{
            Visitors:0,
            Users:0,
            TodaysVisitors:0,
            Orders:0,
            Shops:0,
            Payments:0,
            PaidCard:0,
            PaidMpesa:0,
            Products:0,
            ReturnedGoods:0,
            ProcessedOrders:0,
            Sellers:0,
            SellersReviewed:0,
            Brands:0,
            Categories:0,
            Locations:0,
            PickupLocations:0,
            Collections:0,
            Staff:0,
        }
    },
    methods:{
        loadData(){
            //load visitors
            this.loadVisitors()
            this.loadUsers()
            this.todayVisitors()
            this.loadOrders()
            this.loadShops()
            this.loadPayments()
        },
        loadVisitors(){
            axios.get('/api/CEtZx3vKDPyrMiK1etzR3RDUjyMiOvmkuD9uD/3hc9U9svsC').then((response)=>{
                this.Visitors=response.data
            })
        },
        loadUsers(){
            axios.get('/api/CEtZx3vKDPyrMiK1etzR3RDUjyMiOvmkuD9uD').then((response)=>{
                this.Users=response.data
            })
        },
        todayVisitors(){
            axios.get('/api/today/CEtZx3vKDPyrMiK1etzR3RDUjyMiOvmkuD9uD/3hc9U9svsC').then((response)=>{
                this.TodaysVisitors=response.data
            })
        },
        loadOrders(){
            axios.get('/api/hBfEhicVBZ6OT900f93OxXZMcvJ51nYeqQ2RHIgK8Vl7qVg9XUu').then((response)=>{
                this.Orders=response.data
            })
        },
        loadShops(){
            axios.get('/api/iJxXMuVdqLeUV2fwXQ3t5wL/cyQacb56nNOs6').then((response)=>{
                this.Shops=response.data
            })
        },
        loadPayments(){
            axios.get('/api/qmNsBnNwBQvAEZxt3rkVfEUIuiZCFwC').then((response)=>{
                this.Payments=response.data
            })
        }
    },
    created(){
        this.loadData()
    }
}
</script>
