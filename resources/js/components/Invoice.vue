<template>
    <div class="container-fluid" style="margin-top:20px !important">
        <!--Page content-->
<!--===================================================-->
<div id="container" class="container">
    <div class="invoice-wrapper">
        <section class="invoice-container">
            <div class="invoice-inner">
                <div class="row">
                    <div class="col-sm-4">
                        <img src="images/logo.png" alt="">
                    </div>
                    <div class="col-sm-4 offset-sm-4">
                         <address style="font-family:'courier';font-weight:bold;font-size:10px;color:red">
                             XPRESS kENYA LIMITED<br>
                             TEL: +254704922042
                             EMAIL:info@xpress-kenya.com<br>
                             &block;&block;&block; support@xpress-kenya.com<br>
                             KRA: A008896456U
                        </address>
                    </div>
                </div>
                  ========================================================================================================================================
                <div class="row">
                      <div class="col-xs-6">
                    </div>
                    <div class="text-right col-xs-6">
                        <h5>Order {{OrderId}}</h5>
                    </div>
                </div>
                  ========================================================================================================================================
                <div class="row">
                    <div class="col-xs-6">
                        <address style="font-family:'courier';font-weight:bold;font-size:10px">
                            <strong>Billed To:</strong><br />
                            {{Billing.First_Name }}  {{Billing.Last_Name }}<br />
                             {{Billing.County}} County,<br />
                            {{Billing.Town}} Town<br />
                            {{Billing.email}}
                        </address>
                    </div>
                    <div class="text-right col-xs-6">
                        <address style="font-family:'courier';font-weight:bold;font-size:10px">
                            <strong>Shipped To:</strong><br />
                           {{Billing.First_Name }}  {{Billing.Last_Name }}<br />
                             {{Billing.County}} County,<br />
                            {{Billing.Town}} Town<br />
                            {{Billing.email}}
                        </address>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-6" style="font-family:'courier';font-weight:bold;font-size:10px">
                        <strong>Payment Method:</strong>{{ Shipping.Billing.TransactionType }}
                        <br />
                        <span v-if="Shipping.Billing.TransactionType=='Mpesa'">
                            Number  <i>+{{Shipping.Billing.MSISDN}}</i>
                        </span>
                        <br /> {{ Shipping.Billing.Email }}
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
                                            <!-- {{ FinalOrder }} -->
                                            <tr v-for="item in FinalOrder" :key="item.id" style="font-family:'courier-new';font-weight:normal;font-size:15px">
                                                <td>{{item[0][0].ProductName}}</td>
                                                <td class="text-center">Ksh: {{item[0][0].FinalPrice}}</td>
                                                <td class="text-center">{{item[1]}}</td>
                                                <td class="text-right">Ksh:{{item[0][0].FinalPrice * item[1] }}</td>
                                            </tr>
                                            <tr>
                                                <td colspan="3">
                                                    Items
                                                </td>
                                                <td>
                                                    ==========<br>
                                                    <span class="text-center" style="font-family:courier;color:red !important">
                                                      {{CartItems}} Item(s)
                                                    </span>
                                                    <br>
                                                    ==========<br>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="3">
                                                    Total
                                                </td>
                                                <td>
                                                    ==========<br>
                                                    <span class="text-center" style="font-family:courier;color:red !important">
                                                      Ksh: {{CartTotal}}
                                                    </span>
                                                    <br>
                                                    ==========<br>
                                                </td>
                                            </tr>
                                            <tr>
                                                 <td colspan="3">
                                                    Shipping
                                                </td>
                                                <td>
                                                    ==========<br>
                                                    <span class="text-center" style="font-family:courier;color:red !important">
                                                      Ksh: {{CartTotal}}
                                                    </span>
                                                    <br>
                                                    ==========<br>
                                                </td>
                                            </tr>
                                            <tr>
                                                 <td colspan="3">
                                                   Grand  Total
                                                </td>
                                                <td>
                                                    ==========<br>
                                                    <span class="text-center" style="font-family:courier;color:red !important">
                                                      Ksh: {{CartTotal+ parseInt(Shipping.Shipping)}}
                                                    </span>
                                                    <br>
                                                    ==========<br>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table class="table table-condensed">
                                        <tr>
                                            <th class="text-center" style="font-family:courier !important">=========<br>CODE<br>=========</th>
                                            <th class="text-center" style="font-family:courier !important">=========<br>RATE<br>=========</th>
                                            <th class="text-center" style="font-family:courier !important">===============<br>VATABLE AMOUNT<br>===============</th>
                                            <th class="text-center" style="font-family:courier !important">===========<br>VAT AMOUNT<br>===========</th>
                                        </tr>
                                        <tr class="text-center">
                                            <td>
                                                XPVAT
                                            </td>
                                            <td>
                                                14%
                                            </td>
                                            <td>
                                               kSH: {{ CartTotal }}
                                            </td>
                                            <td>
                                                 kSH: {{( CartTotal * 14/100) }}
                                            </td>
                                        </tr>
                                    </table>
                                    <table class="table">
                                        <tr class="text-center" style="font-family:'courier'">
                                            PRICES INCLUSIVE OF VAT WHERE APPLICABLE
                                        </tr>
                                    </table>
                                    <div class="text-right" style="font-size:10px">
                                        THANK YOU FOR SHOPPING WITH US
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center printBtn">
                 <button class="btn btn-success noprint" @click="print()">Print</button>
                 <a href="/" class="btn btn-primary noprint">Home</a>
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
            FinalOrder:[],
            CartItems:0,
            CartTotal:0
        }
    },
    methods:{
        getCartTotals(){
            axios.get('/k1HT1eDwpUe5LG95ey71').then((response)=>{
                this.CartTotal=response.data
            })
        },
        countCarts(){
            axios.get('/k1HT1eDwpUe5LG91').then((response)=>{
                this.CartItems=response.data
            })
        },
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
        getFinalOrder(){
            axios.get('/k1HT1eDwpU/').then((response)=>{
               this.FinalOrder=response.data
                // console.log(this.FinalOrder)
                // alert(response.data[0])
            })
        },
        print(){
           window.print()
        }
    },
    created(){
        this.getCartTotals()
        this.countCarts()
        this.getOrderNumber()
        this.getBilling()
        this.getShipping()
        this.getOrder()
        this.getFinalOrder()
    }
}
</script>
