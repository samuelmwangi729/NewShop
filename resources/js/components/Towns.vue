<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h2 class="text-center">
                    Add Towns
                </h2>
                <div class="form">
                    <form class="form" @submit.prevent="AddTown()">
                        <div class="form-group">
                            <label for="County" class="label-control">
                                County
                            </label>
                            <select  class="form-control" v-model="County">
                                <option label="--Select the County--"></option>
                                <option v-for="county in Counties" :key="county.id" :value="county.County">{{county.County}}</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="Towm" class="label-control">
                                Add Town
                            </label>
                            <input type="text"  class="form-control" placeholder="Enter town Name" v-model="Town">
                        </div>
                        <button class="btn btn-primary mt-3">
                            Add Town
                        </button>
                    </form>
                </div>
            </div>
            <div class="col-sm-6">
                <h2 class="text-center">
                    Available Towns/County
                </h2>
                 <table id="demo-dt-basic" class="table table-bordered text-center" style="margin-top:20px">
                     <thead>
                         <th>County</th>
                         <th>Town</th>
                         <th>Actions</th>
                     </thead>
                     <tbody>
                         <tr v-for="town in Towns" :key="town.id">
                             <td>{{town.County}}</td>
                             <td>{{town.Town}}</td>
                             <i class="fa fa-trash" style="color:red" @click="Delete(town.id)"></i>&nbsp;
                             <i class="fa fa-eye" style="color:green"></i>&nbsp;
                             <i class="fa fa-times-circle" style="color:purple"></i>&nbsp;
                             <i class="fa fa-check-circle" style="color:blue"></i>&nbsp;
                         </tr>
                     </tbody>
                 </table>
            </div>
        </div>
    </div>
</template>
<script>
    export default{
        data(){
            return{
                Counties:[],
                County:'',
                Town:'',
                Towns:[],
                token:''
            }
        },
        methods:{
            Delete(id){
                axios.delete('/5228JaeyweZCBBZPb/'+id).then((response)=>{
                    swal({
                        title: 'Success',
                        text: 'Town Successfully Deleted',
                        icon: "error",
                    })
                    this.getTowns()
                })
            },
            AddTown(){
                axios.post('/addtowns',{
                    _token:this.token,
                    County:this.County,
                    Town:this.Town
                }).then((response)=>{
                   swal({
                        title: 'Success',
                        text: 'Town Successfully Created',
                        icon: "success",
                    })
                    this.Town=''
                    this.getTowns()
                })
            },
            getLocations(){
                axios.get('/5228JaeyweZCBBZPb2VcdgCZAMGpgqEFZIPKKFd').then((response)=>{
                    this.Counties=response.data
                })
            },
            getTowns(){
                axios.get('/5228JaeyweZCBBZPb2VcdgCZA').then((response)=>{
                    this.Towns=response.data
                })
            },
        },
        created(){
            this.getTowns()
            this.getLocations()
            this.token=$('meta[name="csrf-token"]').attr('content')
        }

    }
</script>
