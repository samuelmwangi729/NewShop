<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-4 card mt-2">
                <div class="form">
                    <form @submit.prevent="PostCategory()">
                        <div class="form-group">
                            <fieldset>
                                <legend>
                                    Add Products Categories
                                </legend>
                                    <div class="form-group">
                                        <label for="CategoryName" class="label-control">
                                            <i class="fa  fa-tags"></i>
                                            <span>
                                                Category Name
                                            </span>
                                        </label>
                                        <span v-if="errorCategory" style="color:red">
                                          <br>  {{ errorCategory }}
                                        </span>
                                        <input type="text" v-model="Category" class="form-control" :class="Class">
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4 offset-sm-4">
                                            <button class="btn btn-success btn-block">
                                                Add Category
                                            </button>
                                        </div>
                                    </div>
                            </fieldset>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-sm-7 offset-sm-1 card mt-2">
                <h1 class="text-center">Available Categories</h1>
                <div class="card">
                        <table class="table table-hover table-vcenter">
                            <thead>
                                <tr>
                                    <th>Category</th>
                                    <th>Status</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="category in Categories" :key="category.id">
                                    <td>
                                        {{ category.Category }}
                                    </td>
                                    <td>
                                        <span v-if="category.Status==0">
                                            <div class="badge badge-success">
                                                Active
                                            </div>
                                        </span>
                                        <span v-else>
                                            <div class="badge badge-danger">
                                                Inactive
                                            </div>
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        <i class="fa fa-trash" style="color:red" @click="Delete(category.id)"></i>&nbsp;&nbsp;
                                        <span v-if="category.Status==1">
                                             <i class="fa fa-check" style="color:green" @click="Activate(category.id)"></i>&nbsp;&nbsp;
                                        </span>
                                        <span v-else>
                                              <i class="fa fa-times" style="color:purple" @click="Deactivate(category.id)"></i>&nbsp;&nbsp;
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
            token:'',
            Category:'',
            errorCategory:'',
            Class:'is-valid',
            Categories:[]
        }
    },
    methods:{
        Deactivate(id){
            axios.get('/categories/'+id+'/edit').then((response)=>{
                // console.log(response.data)
                this.loadCategories()
            }).catch((error)=>{
                console.log(error)
            })
        },
        Activate(id){
            axios.get('/categories/'+id).then((response)=>{
                // console.log(response.data)
                this.loadCategories()
            }).catch((error)=>{
                console.log(error)
            })
        },
        PostCategory:function(){
            if(this.Category==''){
                //set the error to true
                //return false
                this.errorCategory="this field is required";
                this.Class="is-invalid";
                return false;
            }else{
                //post the data
                axios.post('/categories',{
                    _token:this.token,
                    Category:this.Category
                }).then((response)=>{
                    swal({
                        title: response.data.Status,
                        text: response.data.message,
                        icon: "success",
                    })
                    this.Category='',
                    this.loadCategories()
                    // console.log(response.data)
                }).catch((error)=>{
                    console.log(error)
                })
            }
        },
        loadCategories(){
            axios.get('/categories').then((response)=>{
                this.Categories=response.data.Categories
            }).then((error)=>{
                console.log(error)
            })
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
                    axios.delete('/categories/'+id).then((response)=>{

                    //show an alert box
                      swal("Okay. Category Successfully Deleted!");
                      this.loadCategories()
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
    watch: {
        Category:function(){
            this.errorCategory='';
            this.Class='is-valid'
        }
    },
    created(){
        this.loadCategories()
        this.token= $('meta[name="csrf-token"]').attr('content')
    }
}
</script>
