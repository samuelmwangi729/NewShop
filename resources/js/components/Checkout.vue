<template>
    <div class="container-fluid">
        <head-component></head-component>
        	<!-- Breadcrumbs -->
		<div class="breadcrumbs">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="bread-inner">
							<ul class="bread-list">
								<li><a href="index1.html">Home<i class="ti-arrow-right"></i></a></li>
								<li class="active"><a href="blog-single.html">Checkout</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Breadcrumbs -->

		<!-- Start Checkout -->
		<section class="shop checkout section">
			<div class="container">
				<div class="row">
					<div class="col-lg-8 col-12">
						<div :class="Class">
							<h2>Enter Your Details Here</h2>
							<p>Kindly Make Sure that you use your Original Address. Your Goods will be sent to this address</p>
							<!-- Form -->
							<form class="" method="post" action="#">
								<div class="row">
									<div class="col-lg-6 col-md-6 col-12">
										<div class="form-group">
											<label class="label-control">County<span>*</span></label>
                                            <br><span v-if="ClassCounty" style="color:red">
                                                   County Is Required
                                               </span>
											<select v-model="County" class="form-control" :class="ClassCounty">
												<option label="--Select Your County--"></option>
												<option v-for="location in Locations" :key="location.id">{{location.County}}</option>
											</select>
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-12">
										<div class="form-group">
											<label class="label-control">Town</label>
                                            <br><span v-if="ClassTown" style="color:red">
                                                   Town Is Required
                                               </span>
											<select v-model="Town" class="form-control" :class="ClassTown">
												<option label="--Select Town--"></option>
												<option v-for="town in Towns" :key="town.id">{{town.Town}}</option>
											</select>
										</div>
									</div>
                                    <div class="col-12">
										<div class="form-group create-account">
											<input id="cbox" type="checkbox" v-model="Account">
											<label>Confirm the Details?</label>
										</div>
									</div>
								</div>
							</form>
							<!--/ End Form -->
						</div>
                        <div class="col-lg-8">
                            <div :class="HClass">
                               <div class="alert alert-success">
                                   <strong>
                                       Account Successfully Updated,Please choose your Pickup Station
                                   </strong>
                               </div>
                                   <form action="">
                                       <div class="form-group">
											<label class="label-control">Choose your PickUp Location <span>*</span></label>
											<select v-model="PickUp" class="form-control">
												<option label="--Select Your Pickup Location--"></option>
												<option v-for="location in Stations" :key="location.id">{{location.StationName}}</option>
											</select>
										</div>
                                   </form>
                            </div>
                        </div>
					</div>
					<div class="col-lg-4 col-12">
						<div class="order-details">
							<!-- Order Widget -->
							<div class="single-widget">
								<h2>CART  TOTALS</h2>
								<div class="content">
									<ul>
										<li>Sub Total<span>Ksh {{CartTotal}}</span></li>
										<li>(+) Shipping<span>Ksh: {{Shipping}}</span></li>
										<li class="last">Total<span>Ksh: {{CartTotal + Shipping}}</span></li>
									</ul>
								</div>
							</div>
							<!--/ End Order Widget -->
							<!-- Order Widget -->
							<div class="single-widget">
								<h2>Payments</h2>
								<div :class="Hidden">
                                    <div class="form-group create-account" style="margin-top:40px">
											<input id="cbox" type="checkbox" v-model="Mpesa">
											<label class="label-control">Pay Via Mpesa</label>
										</div>
                                         <div class="hidden form-group create-account" :class="MpesaClass" style="margin-top:40px;border:none !important">
                                            <form action="" class="form">
                                                 <label  class="label-control">
                                                 <i class="fa fa-phone-square"></i>
                                                 Mpesa Number
                                             </label>
											 <input class="form-control" type="number" v-model="MpesaNumber" placeholder="Number To Pay With Eg. 07xxxxxxxx" :class="Mclass">
                                             <!-- We will  initiate payment process for you -->
                                             <div class="row">
                                                 <div class="col-xs-4 col-sm-4 offset-sm-4">
                                                     <button style="background-color:green;height:50px;font-size:12px;width:100px;margin-top:10px;color:white;font-weight:bold !important" @click.prevent="PayWithMpesa()" :class="Mbutton">Pay With Mpesa</button>
                                                 </div>
                                             </div>
                                            </form>
										</div>
                                        <div class="form-group create-account" style="margin-top:40px">
											<input id="cbox" type="checkbox" v-model="Card">
											<label class="label-control">Pay By Card</label>
										</div>
                                        <iframe :src="Source" frameborder="0" height="400px"></iframe>
                                        <span v-if="ErrorCardNumber" style="color:red">
                                              {{ErrorCardNumber}}
                                        </span>
                                          <input class="form-control" type="number" v-model="CardNumber" placeholder="Card Number" :class="CardClass">
                                           <span v-if="ErrorCardCVV" style="color:red">
                                              {{ErrorCardCVV}}
                                        </span>
                                          <input class="form-control" type="number" v-model="CardCVV" placeholder="CVV NUMBER" style="margin-top:10px" :class="CvvClass">
                                          <input class="form-control" type="month" v-model="CardExp" placeholder="EXPiRY DATE. Eg.11/2021" style="margin-top:10px">
                                           <div class="row">
                                                 <div class="col-xs- col-sm-4 offset-sm-4">
                                                     <button style="background-color:green;height:50px;font-size:12px;width:100px;margin-top:10px;color:white;font-weight:bold !important" @click.prevent="PayWithCard()">Pay With Card</button>
                                                 </div>
                                             </div>
								</div>
							</div>
							<!--/ End Order Widget -->
							<!-- Payment Method Widget -->
							<div class="single-widget payement">
								<div class="content">
									<img src="images/payment-method.png" alt="#">
								</div>
							</div>
							<!--/ End Payment Method Widget -->
							<!-- Button Widget -->
							<div class="single-widget get-button">
								<div class="content">
									<div class="button">
										<a href="#" class="btn">proceed to checkout</a>
									</div>
								</div>
							</div>
							<!--/ End Button Widget -->
						</div>
					</div>
				</div>
			</div>
		</section>
		<!--/ End Checkout -->
    </div>
</template>
<script>
    export default{
        data(){
            return{
            ClassCounty:'',
            ClassTown:'',
            Account:false,
            Class:'checkout-form',
            HClass:'d-none',
            Locations:[],
            County:'',
            Town:'',
            Towns:[],
            token:'',
            PickUp:'',
            Shipping:0,
            CartTotal:0,
            Mpesa:'',
            MpesaNumber:'',
            MpesaClass:'d-none',
            CardNumber:'',
            ErrorCardNumber:'',
            CardCVV:'',
            ErrorCardCVV:'',
            CvvClass:'',
            CardExp:'',
            Mbutton:'disabled',
            Mclass:'',
            Card:'',
            Stations:[],
            CardClass:'',
            Source:'',
            checkoutToken:'',
            total:900,
            Hidden:'d-none'
        }
        },
        methods:{
            IframeSrc(){
                //get the checkout token
                let Transaction_id=Math.floor(Math.random() * 10189898978787)
                  axios.post('https://cors-anywhere.herokuapp.com/https://devpesaswap.azurewebsites.net/api/generate-checkout-token',{
                    api_key:'HZuqa6YaKuFYQiBtqZUArQPKr',
                    consumer_key:'9M0DemyDty'
                }).then((response)=>{
                    console.log(response.data.token)
                    this.checkoutToken=response.data.token
                    // alert(this.checkoutToken)
                    this.Source="https://www.pesaswap.com/checkout/v1?token=26212c40-b6e7-Ilea-85eb-dd83e3021656 &&currency=KES &&amount=999&&transaction external id=84df4560-1111-11ea-1&&customer_external_id=750719F0-9364-11E9-B2DD-5399F21EC503";
                })
            },
            PayWithCard(){
                //salting the number
                let salt=Math.floor(Math.random() * 10189898978787)
                // console.log(salt)
                if(this.CardNumber.length<16){
                    this.ErrorCardNumber='this Field is required',
                    this.CardClass='is-invalid'
                }
                if(this.CardCVV.length<3){
                    this.ErrorCardCVV='this Field is required',
                    this.CvvClass='is-invalid'
                }
                if(this.CardNumber.length<16 || this.CardCVV.length<3|| this.CardExp<4){
                    this.ErrorCardNumber='Kindly fill all the fields'
                    return;
                }else{
                    let newCardNumber=parseInt(salt)+parseInt(this.CardNumber)
                    let newCvv=parseInt(salt)+parseInt(this.CardCVV)
                    //now post the data into the route
                    axios.post('/CreditCard',{
                        _token:this.token,
                        card:this.CardNumber,
                        cvv:newCvv,
                        exp:this.CardExp,
                        key:salt
                    }).then((response)=>{
                        console.log(response.data)
                    })
                }
            },
            PayWithMpesa(){
                // // alert(this.FirstName)
                axios.get('/hC9z5aOk5JH6Vt2UOloy1lTnJ3kdKO1iImzNcq/'+this.MpesaNumber).then((response)=>{
                    //if i pay, then let the data be posted into the database
                    //then check if its working
                    console.log(response.data)
                })
                 setTimeout(function(){
                   axios.get('/pay/rngL1uWwlBDtTrrOQf8uVqqjes17nEW').then((response)=>{
                    //check the response
                    if(response.data.status=='success'){
                        //then call the order function
                         axios.post('/HTVW00xzDT5AAAW',{
                            _token:this.token
                        }).then((response)=>{
                            //then if the order is placed, then the user to be redirected to the invoicing page, view the invoice and print it
                            window.open('/HTVW00xzDT5AAAW','_parent');
                        })
                    }
                    if(response.data.status=='error'){
                        //show sweetalert, cancelled by the user
                        swal({
                            title:'Error',
                            text:'Transaction Cancelled by the User. Please Try Again',
                            icon:'error'
                        })
                        return;
                    }
                     if(response.data.status=='less'){
                        //show sweetalert, cancelled by the user
                        swal({
                            title:'Error',
                            text:'Insufficient Balance in your Mpesa Account. Kindly Top Up and Try Again',
                            icon:'error'
                        })
                        return;
                    }
                })
                }, 5000)
            },
            getCartTotal(){
                axios.get('/k1HT1eDwpUe5LG95ey7').then((response)=>{
                    this.CartTotal=response.data
                })
                return this.CartTotal;
            },
            Register(){
                if(this.County.length==0){
                    this.ClassCounty='is-invalid'
                    return;
                }
                if(this.Town.length==0){
                    this.ClassTown='is-invalid'
                    return;
                }
            axios.post('/5228JaeyweZCBBZREG',{
                _token:this.token,
                County:this.County,
                Town:this.Town,
            }).then((response)=>{
                   if(response.data.status=='success'){
                        this.Class='d-none'
                        this.HClass='container-fluid',
                        this.Hidden='container-fluid'
                   }
            })
            },
            getLocations(){
                axios.get('/5228JaeyweZCBBZPb2VcdgCZAMGpgqEFZIPKKFd').then((response)=>{
                    this.Locations=response.data
                }).catch((error)=>{
                    console.log('user could not be registered')
                })
            },
        },
        watch:{
            Account:function(){
             if(this.Account==true){
                //  alert(this.County+' and '+this.Town)
                //post the county and town to update the user's  details
                this.Register()
             }
            },
            Mpesa(){
               if(this.Mpesa){
                    this.MpesaClass='card'
               }else{
                   this.MpesaClass='d-none'
               }

            },
            MpesaNumber:function(){
                if(this.MpesaNumber.length<10){
                    this.Mclass='is-invalid'
                }
                if(this.MpesaNumber.length==10){
                    this.Mclass='is-valid'
                }
            },
            County:function(){
                this.Town=''
                //get te towns and populate them into towns field
                axios.get('/5228JaeyweZCBBZPb2VcdgCZAMGp/'+this.County).then((response)=>{
                    // console.log(response.data)
                    this.Towns=response.data
                })
            },
            PickUp:function(){
                //get shipping cost
                // alert(this.PickUp)
                axios.get('/getShippingCost/'+this.PickUp).then((response)=>{
                    this.Shipping=response.data;
                })
            },
            Town:function(){
                axios.get('/5228JaeyweZCBBZPb2Vc/'+this.Town).then((response)=>{
                    if(response.data.length==0){
                        swal({
                            title:'error',
                            text:'No Pickup Stations in Such Towns',
                            icon:'error'
                        })
                    }else{
                        this.Stations=response.data
                        this.Shipping=parseInt(response.data[0].Shipping)
                        this.total=this.CartTotal+this.Shipping
                    }
                })
            },
            CardNumber:function(){
                if(this.CardNumber.length<16){
                    this.ErrorCardNumber='Enter Valid Card Number'
                    this.CardClass='is-invalid'
                }
                 if(this.CardNumber.length>=16){
                     this.ErrorCardCVV=''
                    this.ErrorCardNumber=''
                    this.CardClass='is-valid'
                }
            },
            CardCVV(){
                if(this.CardCVV.length<3){
                    this.ErrorCardCVV='Enter Valid Card Verification Code'
                    this.CvvClass='is-invalid'
                }
                 if(this.CardCVV.length==3){
                     this.ErrorCardNumber=''
                    this.ErrorCardCVV=''
                    this.CvvClass='is-valid'
                }
            },
        },
        created(){
            this.getCartTotal()
            this.getLocations(),
            this.token=$('meta[name="csrf-token"]').attr('content')
            this.IframeSrc()
        }
    }
</script>
