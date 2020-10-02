<template>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-4 card mt-2">
          <h1 class="text-center">  Add Brands</h1>
            <form @submit.prevent="Submit()">
                <div class="form-group">
                    <label for="Select Category" class="label-control">
                        <i class="fa fa-list"></i> Category
                    </label>
                    <span style="color:red">
                        <br>{{ errorMain }}
                    </span>
                    <select class="form-control" v-model="MainCategory" :class="MainClass">
                        <option label="--Select Category--"></option>
                        <option v-for="category in Categories" :key="category.id" :value="category.id">{{category.Category}}</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="BrandName" class="label-control">
                        <i class="fa fa-tags"></i>
                        Brand Name
                    </label>
                    <span style="color:red">
                        <br>{{ errorBrand }}
                    </span>
                    <input type="text" class="form-control" v-model="BrandName" :class="BrandClass">
                </div>
                <button class="btn btn-success" type="submit">
                    Submit
                </button>
            </form>
        </div>
        <div class="col-sm-6 offset-sm-2 mt-2 card">
            <h1>Brands Available</h1>
         <table class="table table-hover table-vcenter table-bordered">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Category</th>
                    <th>Brand Name</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="brand in Brands" :key="brand.id">
                    <td>
                       <img :src="brand.BrandImage" width="40px" :alt="brand.BrandName">
                    </td>
                    <td>
                        {{ brand.Category }}
                    </td>
                    <td>
                        {{ brand.BrandName }}
                    </td>
                    <td class="text-center">
                       <div class="badge badge-success" @click="Open(brand.id)">Add Image</div>
                        <i class="fa fa-trash" style="color:red"></i>
                        <i class="fa fa-check" style="color:blue"></i>
                        <i class="fa fa-times" style="color:purple"></i>
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
                MainCategory:'',
                Categories:[],
                Class:'',
                BrandName:'',
                BrandImage:'',
                errorMain:'',
                errorBrand:'',
                errorImage:'',
                file:'',
                MainClass:'',
                BrandClass:'',
                ImageClass:'',
                token:'',
                Brands:[]
            }
        },
        methods:{
            Open(id){
                window.open('/brand/'+id+'/edit');
            },
            Submit(){
                //get the Category Name
                if(this.MainCategory.length==0){
                    this.errorMain='This field is required';
                    this.MainClass='is-invalid';
                    // return;
                }
                if(this.BrandName.length==0){
                    this.errorBrand='This Field Is required';
                    this.BrandClass='is-invalid';
                    // return;
                }

                //get the Brand Name
                if(this.MainCategory.length !=0 && this.BrandName.length !=0){
                    axios.post('/brand',{
                        _token:this.token,
                        BrandName:this.BrandName,
                        Category:this.MainCategory
                    }).then((response)=>{
                       swal({
                        title: response.data.Status,
                        text: response.data.message,
                        icon: "success",
                    })
                    this.MainCategory='',
                    this.BrandName='',
                    this.loadBrands()
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
            loadBrands(){
                axios.get('/brand').then((response)=>{
                    this.Brands=response.data
                })
            }
        },
        created(){
            this.loadCategories();
            this.loadBrands();
              this.token= $('meta[name="csrf-token"]').attr('content')
        },
        watch:{
            MainCategory:function(){
                this.errorMain='';
                this.MainClass=''
            },
            BrandName:function(){
                this.errorBrand='';
                this.BrandClass=''
            },
            file:function(){
                this.errorImage='';
                this.ImageClass=''
            }
        }
    }
</script>
