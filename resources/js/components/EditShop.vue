<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-8 offset-sm-2 card">
                <h2 class="text-center">
                  Edit Shop
                </h2>
                <form :action="'/shop/'+Shop.id" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_method" class="form-control" value="PATCH">
                <input type="hidden" name="_token" class="form-control" :value="token">
                <fieldset>
                    <legend class="text-center">
                       <h5>
                            Please Fill Using Correct Details. We Will verify the Details before we activate Your Shop
                       </h5>
                    </legend>
                    <h4 class="text-center">Shop Details</h4>
                    <hr>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                    <label for="Name" class="label-control">
                                        <i class="fa fa-tags"></i>
                                        Desired Shop Name
                                    </label>
                                    <input type="text" name="ShopName" class="form-control" required v-model="ShopName">
                            </div>
                        </div>
                        <div class="col-sm-6">
                             <div class="form-group">
                        <label for="Name" class="label-control">
                            <i class="fa fa-picture"></i>
                            Desired Shop Logo
                        </label>
                        <input type="file" name="Logo"  class="form-control" style="border:none">
                    </div>

                        </div>
                        <div class="col-sm-6">
                             <div class="form-group">
                        <label for="Name" class="label-control">
                            <i class="fa fa-file"></i>
                            Tax Document(KRA PIN for Applicant)<sup><i class="fa fa-question-circle" title="To verify Tax Compliance"></i></sup>
                        </label>
                        <input type="file" name="Pin"  class="form-control" style="border:none">
                    </div>

                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                        <label for="Name" class="label-control">
                            <i class="fa fa-tags"></i>
                          Physical Address
                        </label>
                        <input type="text" name="Address" id="" class="form-control" required>
                    </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                        <label for="Name" class="label-control">
                            <i class="fa fa-building"></i>
                         County
                        </label>
                        <select v-model="County"  class="form-control" name="County">
                            <option label="--Select County--"></option>
                            <option :value="Shop.ShopCounty" selected> {{ Shop.ShopCounty }} </option>
                            <option v-for="county in Counties" :key="county.id" :value="county.County">
                                {{ county.County }}
                            </option>
                        </select>
                    </div>
                        </div>
                        <div class="col-sm-6">
                             <div class="form-group">
                        <label for="Name" class="label-control">
                            <i class="fa fa-building"></i>
                                Town
                        </label>
                         <select v-model="CountyTown"  class="form-control" name="Town">
                            <option label="--Select Town--"></option>
                            <option :value="Shop.ShopTown" selected>{{Shop.ShopTown}}</option>
                            <option v-for="town in Towns" :key="town.id" :value="town.Town">
                                {{ town.Town }}
                            </option>
                        </select>
                    </div>
                        </div>
                        <div class="col-sm-4 offset-sm-4">
                             <div class="form-group">
                        <label for="Name" class="label-control">
                            <i class="fa fa-phone"></i>
                         Phone Number
                         <input type="number" name="ShopPhoneNumber" id="" class="form-control" required v-model="ShopPhoneNumber">
                        </label>
                    </div>
                        </div>
                        <div class="col-sm-6"></div>
                    </div>
                    <hr>
                    <h4 class="text-center">Payment Details</h4>
                    <hr>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="Name" class="label-control">
                                    <i class="fa fa-tags"></i>
                                Acceptable Payment Methods
                                </label>
                                <select  name="Acceptable" class="form-control" v-model="Acceptable" required>
                                    <option label="--Select Payment Method--"></option>
                                    <option value="Mpesa Only">
                                        Mpesa Only
                                    </option>
                                    <option value="Bank & Bank">
                                        Mpesa & Bank
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="Name" class="label-control">
                                    <i class="fa fa-tags"></i>
                                M-Pesa Number(For Payments Purposes)
                                </label>
                                <input type="number" name="MpesaNumber" class="form-control" placeholder="For Mpesa Payments" required v-model="ShopMpesa">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                            <label for="Name" class="label-control">
                            <i class="fa fa-tags"></i>
                            Bank
                            </label>
                            <select name="Bank" id="" class="form-control">
                                <option label="--Select Your Bank--"></option>
                                <option value="Equity">Equity Bank</option>
                                <option value="Family">Family Bank</option>
                                <option value="KCB">Kenya Commercial Bank</option>
                                <option value="NAT">National Bank</option>
                                <option value="DTB"> Diamond Trust Bank</option>
                                <option value="CHASE">Chase Bank</option>
                                <option value="SC">Standard Chatered</option>
                                <option value="COOP">Cooperative Bank</option>
                                <option value="Barc">Barclays</option>
                            </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                            <label for="Name" class="label-control">
                            <i class="fa fa-tags"></i>
                            Bank Account(Leave Empty if None)
                            </label>
                            <input type="number" class="form-control" placeholder="Bank Account to Receive Payment," maxlength="20" minlength="10" name="ShopBankAccount" v-model="ShopBankAccount">
                            </div>
                        </div>
                    </div>
                     <input type="checkbox" required>  &nbsp;<span>By creating an Account, you agree to our <a href="/terms" style="color:blue">Terms &amp; Conditions</a> </span>
                </fieldset>
                <div class="row">
                    <div class="col-sm-4 offset-sm-4">
                        <button class="btn btn-primary btn-block mt-3 mb-3">
                            Create Shop
                        </button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</template>
<script>
export default{
    data(){
        return{
            Acceptable:'',
            Counties:[],
            County:'',
            Towns:[],
            CountyTown:'',
            ShopName:'',
            ShopPhoneNumber:'',
            ShopMpesa:'',
            ShopBankAccount:'',
            token:'',
            Shop:[],
            Action:'',
            Address:''
        }
    },
    methods:{
        getShop(){
            axios.get('/5228JaeyPKKFL0pIKd').then((response)=>{
                this.Shop=response.data
                this.County=this.Shop.ShopCounty
                this.ShopName=this.Shop.ShopName,
                this.Address=this.Shop.ShopAddress
                this.ShopPhoneNumber=this.Shop.ShopPhoneNumber
                this.ShopMpesa=this.Shop.ShopMpesa
                this.ShopBankAccount=this.Shop.ShopBankAccount
                this.Action=document.domain+'/shop/'+response.data.id
                // console.log(response.data)
                // alert(this.Action)
            })
        },
        getLocations(){
            axios.get('/5228JaeyweZCBBZPb2VcdgCZAMGpgqEFZIPKKFd').then((response)=>{
                this.Counties=response.data
            })
        },
    },
    created(){
        this.token=$('meta[name="csrf-token"]').attr('content')
        this.getLocations()
        this.getShop()
    },
    watch:{
        County:function(){
            this.CountyTown=''
            axios.get('/Pb2VcdgCZAMGpo9qEFZIPKKF/'+this.County).then((response)=>{
                this.Towns=response.data
            })
        }
    }
}
</script>
