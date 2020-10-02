<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h3 class="text-center">
                    Add Counties
                </h3>
                <form @submit.prevent="Post()">
                <div class="form-group">
                    <label for="CountyName" class="label-control">
                        <i class="fa fa-map"></i>
                        County Name
                    </label>
                    <input type="text"  v-model="County" class="form-control">
                    <div class="row">
                        <div class="col-sm-4 offset-sm-4">
                            <button class="btn btn-success btn-block mt-4">
                        Submit
                    </button>
                        </div>
                    </div>
                </div>
                </form>
            </div>
            <div class="col-sm-6 card">
                <h3 class="text-center">
                    Available Counties
                </h3>
                     <table class="table table-bordered table-stripped">
                        <thead>
                            <tr>
                                <th>County</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="location in Locations" :key="location.id">
                                <td>{{location.County}}</td>
                                <td>
                                    <span v-if="location.Status==1">
                                        <div class="badge badge-warning">
                                            Out of Service
                                        </div>
                                    </span>
                                    <span v-else>
                                        <div class="badge badge-success">
                                            In Service
                                        </div>
                                    </span>
                                </td>
                                <td>
                                   <span v-if="location.Status==1">
                                        <i class="fa fa-check-circle" style="color:green" @click="Action(location.id,'resume')"></i>
                                   </span>
                                   <span v-else>
                                       <i class="fa fa-times-circle" style="color:purple" @click="Action(location.id,'suspend')"></i>
                                   </span>
                                    <i class="fa fa-trash" style="color:red" @click="Delete(location.id)"></i>
                                </td>
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
                County:'',
                token:'',
                Locations:[]
            }
        },
        methods:{
            Action(id,type){
                axios.get('/5228JaeyweZCB0POh/'+id+'/'+type).then((response)=>{
                    this.getLocations()
                })
            },
            getLocations(){
                axios.get('/5228JaeyweZCBBZPb2VcdgCZAMGpgqEFZIPKKFd').then((response)=>{
                    this.Locations=response.data
                })
            },
            Delete(id){
                axios.delete('/locations/'+id).then((response)=>{
                    console.log(response.data)
                })
                  this.getLocations()
            },
            Post(){
                axios.post('/locations',{
                    _token:this.token,
                    County:this.County
                }).then((response)=>{
                    swal({
                        title: 'Success',
                        text: 'County Successfully Created',
                        icon: "success",
                    })
                    this.getLocations()
                    this.County=''
                }).catch((error)=>{
                    console.log(error)
                })
            }
        },
        created(){
            this.getLocations()
            this.token=$('meta[name="csrf_token"]').attr('content')
        }
    }
</script>
