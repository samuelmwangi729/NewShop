<template>
<div class="container-fluid">
    Available collections
    <div class="card">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Banner</th>
                    <th>Title</th>
                    <th>Text</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="collection in collections" :key="collection.id">
                    <td>
                        <img :src="'../'+collection.Image" height="30px" width="30px" style="border-radius:30px">
                    </td>
                    <td>{{collection.Title}}
                        <span v-if="collection.Status==2">
                            <sup> <i class="fa fa-certificate" style="color:red"></i></sup>
                        </span>
                    </td>
                    <td>{{collection.Description}}</td>
                    <td>
                        <span v-if="collection.Status==0">
                            <div class="badge badge-success">
                                Active
                            </div>
                        </span>
                        <span v-else-if="collection.Status==2">
                           <div class="badge badge-success" @click="ChangeState(collection.id,'activate')">
                               Featured
                           </div>
                        </span>
                        <span v-else>
                            <div class="badge badge-danger">
                                Rejected
                            </div>
                        </span>
                    </td>
                    <td>
                        <i class="fa fa-trash" style="color:red" @click="Delete(collection.id)"></i>
                        <i class="fa fa-certificate" style="color:red" @click="ChangeState(collection.id,'feature')"></i>
                        <span v-if="collection.Status==1">
                             <i class="fa fa-check-circle" style="color:green" @click="ChangeState(collection.id,'activate')"></i>
                        </span>
                        <span v-else>
                            <i class="fa fa-times-circle" style="color:purple" @click="ChangeState(collection.id,'deactivate')"></i>
                        </span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
</template>
<script>
 export default{
     data(){
         return{
              collections:[]
         }
     },
     methods:{
         ChangeState(id,type){
             axios.get('/collections/'+id+'/'+type).then((response)=>{
                swal({
              title: 'Success',
              text: 'Operation Successful',
              icon: "success",
          })
          this.loadCollections()
             })
         },
         loadCollections(){
             axios.get('/collection').then((response)=>{
                 this.collections=response.data
             })
         },
          Delete(id){
                swal("Delete the Collection?","This Cant be Undone", {
                    icon:'error',
                    buttons: {
                    cancel: "Cancel the Operation",
                    delete: {
                    text: "Delete the collection!",
                    value: "delete",
                    },
                },
            })
            .then((value) => {
                switch (value) {
                    case "delete":
                    axios.delete('/collection/'+id).then((response)=>{

                    //show an alert box
                      swal("Okay. Collection Successfully Deleted!");
                      this.loadCollections()
                    }).catch((error)=>{
                        //if the menu cant be deleted
                        console.log(error)
                    });

                    break;

                    default:
                    swal("Okay. Nice Choice!");
                }
            });
        }
     },
     created(){
         this.loadCollections()
     }
 }
</script>
