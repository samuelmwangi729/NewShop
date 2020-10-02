<template>
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-6">
        <h2 class="text-center">Create Labels</h2>
        <form class="form-inline" @submit.prevent="AddLabel()">
          <div class="form-group">
            <input type="text" class="form-control" v-model="Label">
            <button class="btn btn-success">Add Label</button>
          </div>
        </form>
      </div>
      <div class="col-sm-6">
        <h2>Available Labels</h2>
        <div class="card text-center">
            <table class="table-bordered table stripped">
                <thead>
                    <tr>
                        <th>Label</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="label in Labels" :key="label.id">
                        <td>
                            {{ label.Label }}
                        </td>
                        <td>
                            <span v-if="label.Status==0">
                                <div class="badge badge-success">
                                    Active
                                </div>
                            </span>
                            <span v-else>
                                <div class="badge badge-danger">
                                    Rejected
                                </div>
                            </span>
                        </td>
                        <td>
                            <i class="fa fa-trash" style="color:red" @click="Delete(label.id)"></i>&nbsp;
                            <span v-if="label.Status==1">
                                 <i class="fa fa-check-circle" style="color:green" @click="Accept(label.id,'accept')"></i>&nbsp;
                            </span>
                            <span v-else>
                                <i class="fa fa-times-circle" style="color:purple" @click="Reject(label.id,'reject')"></i>&nbsp;
                            </span>
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
  export default{
    data(){
      return{
        Labels:[],
        Label:'',
        token:''
      }
    },
    methods:{
        Reject(id,type){
            axios.get('/MRSgEfE0PzAMlI2SYyrL/'+id+'/'+type).then((response)=>{
                swal({
              title: 'Success',
              text: 'Operation Successfully Completed',
              icon: "success",
          })
            })
            this.loadLabels()
        },
        Accept(id,type){
            axios.get('/MRSgEfE0PzAMlI2SYyrL/'+id+'/'+type).then((response)=>{
                swal({
              title: 'Success',
              text: 'Operation Successfully Completed',
              icon: "success",
          })
            })
             this.loadLabels()
        },
         Delete(id){
                swal("Delete the Menu?","This Cant be Undone", {
                    icon:'error',
                    buttons: {
                    cancel: "Cancel the Operation",
                    delete: {
                    text: "Delete the menu!",
                    value: "delete",
                    },
                },
            })
            .then((value) => {
                switch (value) {
                    case "delete":
                    axios.delete('/labels/'+id).then((response)=>{

                    //show an alert box
                      swal("Okay. Label Successfully Deleted!");
                       this.loadLabels()
                    }).catch((error)=>{
                        //if the menu cant be deleted
                        console.log(error)
                    });

                    break;

                    default:
                    swal("Okay. Nice Choice!");
                }
            });
        },
      AddLabel(){
        axios.post('/labels',{
          _token:this.token,
          Label:this.Label
        }).then((response)=>{
          swal({
              title: 'Success',
              text: 'Label Successfully Created',
              icon: "success",
          })
        })
        this.Label=''
         this.loadLabels()
      },
      loadLabels(){
        axios.get('/MRSgEfE0PzAMlI2y4CmXbUYYoSYyrL').then((response)=>{
          this.Labels=response.data
        })
      }
    },
    created(){
      this.loadLabels()
      this.token=$('meta[name="csrf-token"]').attr('content')
    }
  }
</script>
