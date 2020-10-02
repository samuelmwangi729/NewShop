<template>
    <div class="container-fluid">
       <div class="row">
           <div class="col-sm-6">
               <div class="card">
                   <h2 class="text-center">
                       Add A Pickup Station
                   </h2>
                   <form @submit.prevent="AddPickup()" style="padding-bottom:40px">
                       <div class="row container-fluid">
                           <div class="col-sm-6">
                               <div class="input-group">
                                   <label for="Town" class="label-control">
                                         <i class="fa fa-building" style="padding-left:20px"></i>
                                         Choose Town
                                   </label>
                                   <span v-if="ErrorTown" style="color:red">
                                       <br> Please Choose A Town
                                   </span>
                                   <select v-model="PickupTown" class="form-control" :class="ClassTown">
                                       <option label="--SELECT TOWN--"></option>
                                       <option v-for="town in Towns" :key="town.id" :value="town.Town">{{town.Town}}</option>
                                   </select>
                               </div>
                           </div>
                           <div class="col-sm-6">
                               <div class="input-group">
                                   <label for="Pickup Name" class="label-control">
                                       <i class="fa fa-tags"></i>
                                       Pickup Name
                                   </label>
                                     <span v-if="ErrorName" style="color:red">
                                       <br> Please Choose A Name
                                   </span>
                                   <input type="text" v-model="PickupName"  class="form-control" :class="ClassName">
                               </div>
                           </div>
                           <div class="col-sm-6">
                               <div class="input-group">
                                   <label for="Amount" class="label-control">
                                       <i class="fa fa-money"></i>
                                       Amount
                                   </label>
                                     <span v-if="ErrorAmount" style="color:red">
                                       <br> Please Give Shipping Amount
                                   </span>
                                   <input type="number" v-model="PickupAmount" id="" class="form-control" :class="ClassAmount">
                               </div>
                           </div>
                           <div class="col-sm-6">
                               <button style="margin-top:25px" class="btn btn-primary">Add Station</button>
                           </div>
                       </div>
                   </form>
               </div>
           </div>
           <div class="col-sm-6">
               <div class="card">
                   <h2 class="text-center">
                       Available Pickup Stations
                   </h2>
                   <div class="container-fluid">
                       <div class="pull-right">
                         <form  class="form-horizontal">
                              <label for="Town" class="label-control">
                                         <i class="fa fa-filter" style="color:red"></i>
                                         Filter By Town
                                   </label>
                                   <select v-model="FilterTown" class="form-control">
                                       <option label="--SELECT TOWN--"></option>
                                       <option v-for="town in Towns" :key="town.id" :value="town.Town">{{town.Town}}</option>
                                   </select>
                         </form>
                       </div>
                   </div>
                   <table class="table table-condensed table-hover-table-bordered">
                       <thead>
                           <tr>
                               <th>
                                   Town
                               </th>
                               <th>
                                   Station
                               </th>
                               <th>
                                   Shipping Amount
                               </th>
                               <th>
                                   Status
                               </th>
                               <th>
                                   Actions
                               </th>
                           </tr>
                       </thead>
                       <tbody>
                           <tr v-for="station in Stations" :key="station.id">
                               <td>{{station.TownId}}</td>
                               <td>{{station.StationName}}</td>
                               <td>{{station.Shipping}}</td>
                               <td>{{station.Status}}</td>
                               <td>
                                   <div class="badge badge-success">
                                       Activate
                                   </div>
                                   <div class="badge badge-primary">
                                       Suspend
                                   </div>
                                    <div class="badge badge-danger" @click="Delete(station.StationName)">
                                       Delete
                                   </div>
                               </td>
                           </tr>
                       </tbody>
                   </table>
               </div>
           </div>
       </div>
    </div>
</template>
<script>
export default {
    data(){
        return{
            Towns:[],
            PickupTown:'',
            PickupName:'',
            PickupAmount:'',
            ErrorTown:'',
            ErrorName:'',
            ErrorAmount:'',
            ClassTown:'',
            ClassName:'',
            ClassAmount:'',
            token:'',
            Stations:[],
            FilterTown:''
        }
    },
    methods:{
        Delete(id){
            axios.delete('/pickup/'+id).then((response)=>{
                swal({
                    title:'Done',
                    text:'Station Successfully Deleted',
                    icon:'error'
                })
                this.getPickups()
            })
        },
        getPickups(){
            axios.get('/bVcR9UWw2xfTOhIGbKZbqlZ8CnTfXGViJ9rD8AxP6wOS').then((response)=>{
                this.Stations=response.data
            })
        },
        getTowns(){
            axios.get('/5228JaeyweZCBBZPb2VcdgCZA').then((response)=>{
                this.Towns=response.data
            })
        },
        AddPickup(){
            if(this.PickupTown.length==0){
                this.ErrorTown=true;
                this.ClassTown='is-invalid'
            }
            if(this.PickupName.length==0){
                this.ErrorName=true;
                this.ClassName='is-invalid'
            }
            if(this.PickupAmount.length==0){
                this.ErrorAmount=true
                this.ClassAmount='is-invalid'
            }
            //make sure all the variables are not empty
            if(!(this.PickupTown.length==0 && this.PickupName.length==0 && this.PickupAmount==0)){
               axios.post('/pickup',{
                   _token:this.token,
                   TownId:this.PickupTown,
                   StationName:this.PickupName,
                   Shipping:this.PickupAmount
               }).then((response)=>{
                  //if true
                swal({
                    title: 'Success',
                    text: 'Pickup Station Added',
                    icon: "success",
                })
                this.PickupTown=''
                this.PickupName=''
                this.PickupAmount=''
                this.getPickups()
               })
            }
        }
    },
    created(){
        this.getTowns()
        this.getPickups()
        this.token=$('meta[name="csrf-token"]').attr("content")
        console.log(this.token)
    },
    watch:{
        PickupTown(){
            this.ErrorTown=''
            this.ClassTown='is-valid'
        },
        PickupName(){
            this.ErrorName=''
            this.ClassName='is-valid'
        },
        PickupAmount(){
            this.ErrorAmount=''
            this.ClassAmount='is-valid'
        },
        FilterTown(){
            axios.get('/pickup/'+this.FilterTown).then((response)=>{
                if(response.data.length==0){
                    swal({
                        title:'error',
                        text:'No Pickup Stations in Such Towns',
                        icon:'error'
                    })
                }else{
                    this.Stations=response.data
                }
            })
        }
    }
}
</script>
