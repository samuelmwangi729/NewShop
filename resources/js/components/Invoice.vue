<template>
    <div class="container-fluid" style="margin-top:100px !important">
        <!--Page content-->
<!--===================================================-->
<div id="container" class="container">
    <div class="invoice-wrapper">
        <section class="invoice-container">
            <div class="invoice-inner">
                <div class="row">
                      <div class="col-xs-6">

                    </div>
                    <div class="text-right col-xs-6">
                        <h5>Order #{{OrderId}}</h5>
                    </div>
                </div>
                <hr/>
                <div class="row">
                    <div class="col-xs-6">
                        <address style="font-family:'courier';font-weight:bold;font-size:10px">
                            <strong>Billed To:</strong><br />
                            {{Billing.FirstName }}  {{Billing.LastName }}<br />
                             {{Shipping.County}} County,<br />
                            {{Shipping.Town}} Town<br />
                            {{Shipping.email}}
                        </address>
                    </div>
                    <div class="text-right col-xs-6">
                        <address style="font-family:'courier';font-weight:bold;font-size:10px">
                            <strong>Shipped To:</strong><br />
                            {{Shipping.First_Name}} {{Shipping.Last_Name}}<br />
                            {{Shipping.County}} County,<br />
                            {{Shipping.Town}} Town<br />
                            {{Shipping.email}}
                        </address>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-6" style="font-family:'courier';font-weight:bold;font-size:10px">
                        <strong>Payment Method:</strong>
                        <br /> {{ Billing.TransactionType }} Number  <i>+{{Billing.MSISDN}}</i>
                        <br /> {{ Billing.Email }}
                    </div>
                    <div class="text-right col-xs-6" style="font-family:'courier';font-weight:bold;font-size:10px">
                        <strong>Order Date:</strong>
                        <br />{{Orders.order.DatePlaced}}
                        <br />
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 pad-top">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Order summary</h3>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-condensed table-bordered">
                                        <thead>
                                            <tr style="font-family:'courier-new';font-weight:bold;font-size:10px">
                                                <td><strong>Item</strong></td>
                                                <td class="text-center"><strong>Price</strong></td>
                                                <td class="text-center"><strong>Quantity</strong></td>
                                                <td class="text-right"><strong>Totals</strong></td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="item in FinalOrder" :key="item.id" style="font-family:'courier-new';font-weight:normal;font-size:15px">
                                                <td>{{item[0][0].ProductName}}</td>
                                                <td class="text-center">Ksh: {{item[0][0].FinalPrice}}</td>
                                                <td class="text-center">{{item[1]}}</td>
                                                <td class="text-right">Ksh:{{item[0][0].FinalPrice * item[1] }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center printBtn">
                 <button class="btn btn-success noprint" @click="print()">Print</button>
                </div>
            </div>
        </section>
    </div>
</div>
<!--===================================================-->
<!--End page content-->

    </div>
</template>
<script>
export default {
    data(){
        return{
            OrderId:'',
            Billing:[],
            Shipping:[],
            Orders:[],
            FinalOrder:[]
        }
    },
    methods:{
        getOrderNumber:function(){
            axios.get('/PDEKhgO2JDUrL8Zd23OOPKEvmyQCl2m').then((response)=>{
                this.OrderId=response.data
            })
        },
        getBilling(){
            axios.get('/ws5xKxFILK7JiA4JlgenYZ6/dRqvsdymJLsAnNm16jS4gz5iIm').then((response)=>{
                this.Billing=response.data
            })
        },
        getShipping(){
            axios.get('/ws5xKxFILK7JiA4JlgenYZ6').then((response)=>{
                this.Shipping=response.data
            })
        },
        getOrder(){
            axios.get('/6juQg3f1Jltvp7pMz/aCoJVagCy').then((response)=>{
                this.Orders=response.data
            })
        },
        getName(sku){
            let name=''
            axios.get('/k1HT1eDwpU/').then((response)=>{
               this.FinalOrder=response.data
               console.log(response.data)
            })
        },
        print(){
           window.print()
        }
    },
    created(){
        this.getOrderNumber()
        this.getBilling()
        this.getShipping()
        this.getOrder()
        this.getName()
    }
}
</script>
