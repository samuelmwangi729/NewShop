<template>
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-10 offset-sm-1 card">
        <h2 class="text-center">Add Product</h2>
        <form action="/product" method="POST" enctype="multipart/form-data">
        <input type="text" name="_token" id="" class="hidden" :value="token">
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label for="ProductName" class="label-control">
                  <i class="fa fa-tags"></i>
                  Product Name
                </label>
                <input type="text" name="ProductName" class="form-control" />
              </div>
            </div>
            <!-- End col-sm-6 -->
            <div class="col-sm-6">
              <div class="form-group">
                <label for="Brand" class="label-control">
                  <i class="fa fa-list"></i>
                  Brand
                </label>
                <select name="Brand" class="form-control">
                  <option label="--Select Brand--"></option>
                  <option v-for="brand in Brands" :key="brand.id">{{brand.BrandName}}</option>
                </select>
              </div>
            </div>
              <!-- End col-sm-6 -->
              <div class="col-sm-6">
                  <div class="form-group">
                      <label for="Image1" class="label-control">
                          <i class="fa fa-image"></i>
                          Banner Image( We need Max of 4 Photos)
                      </label>
                      <input type="file" name="Banner"  class="form-control">
                  </div>
              </div>
              <div class="col-sm-6">
                  <div class="form-group">
                      <label for="Image1" class="label-control">
                          <i class="fa fa-image"></i>
                         Front Image
                      </label>
                       <input type="file" name="Front"  class="form-control">
                  </div>
              </div>
              <div class="col-sm-6">
                  <div class="form-group">
                      <label for="Image1" class="label-control">
                          <i class="fa fa-image"></i>
                         Side Photo
                      </label>
                       <input type="file" name="Side"  class="form-control">
                  </div>
              </div>
              <div class="col-sm-6">
                  <div class="form-group">
                      <label for="Image1" class="label-control">
                          <i class="fa fa-image"></i>
                         Back ViewImage
                      </label>
                       <input type="file" name="Back"  class="form-control">
                  </div>
              </div>
              <div class="col-sm-6">
                  <div class="form-group">
                      <label for="Image1" class="label-control">
                          <i class="fa fa-tags"></i>
                            Product Category
                      </label>
                      <select name="Category"  class="form-control" @change="Load()" v-model="Category">
                          <option label="--Select Category--"></option>
                          <option v-for="category in Categories" :key="category.id" :value="category.Category">{{category.Category}}</option>
                      </select>
                  </div>
              </div>
              <div class="col-sm-6">
                  <div class="form-group">
                      <label for="Image1" class="label-control">
                          <i class="fa fa-tags"></i>
                            Product SubCategory
                      </label>
                       <select name="SubCategory"  class="form-control">
                          <option label="--Select SubCategory--"></option>
                          <option v-for="subc in Subcategories" :key="subc.id">{{subc.SubCategory}}</option>
                      </select>
                  </div>
              </div>
              <div class="col-sm-6">
                  <div class="form-group">
                      <label for="Image1" class="label-control">
                          <i class="fa fa-tags"></i>
                           Price
                      </label>
                      <input type="number" name="Price" class="form-control" v-model="Price">
                  </div>
              </div>
              <div class="col-sm-3">
                  <div class="form-group">
                      <label for="Image1" class="label-control">
                          <i class="fa fa-tags"></i>
                           Discount (%)
                      </label>
                      <input type="number" name="Discount" v-model="Discount"  class="form-control">
                  </div>
              </div>
              <div class="col-sm-3">
                  <div class="form-group">
                      <label for="Image1" class="label-control">
                          <i class="fa fa-tags"></i>
                           Selling price after Discount
                      </label>
                    <div class="text-center" style="color:red">
                      {{ Price - (Discount*Price)/100 }}
                    </div>
                  </div>
              </div>
              <div class="col-sm-4">
                  <label for="StoreUnit" class="label-control">
                      <i class="fa fa-shop"></i>
                      Store Keeping Unit <i class="fa fa-question-circle add-tooltip" data-placement="right" data-toggle="tooltip" data-original-title="Store Keeping Unit to Help Track your Products"></i>
                  </label>
                    <input type="text" name="SKU"  class="form-control" v-model="SKU">
              </div>
              <div class="mt-4 col-sm-2">
                  <button class="btn btn-success btn-block" @click.prevent="Generate()">
                      Generate Random
                  </button>
              </div>
              <div class="col-sm-3">
                  <div class="form-group">
                      <label for="Qty" class="label-control">
                          <i class="fa fa-count"></i>
                          Available Products in Store
                      </label>
                      <input type="number" name="Qty" id="" class="form-control">
                  </div>
              </div>
              <div class="text-center col-sm-3">
                 <label for="" class="label-control">
                      Allow Orders Even if Out of Stock?
                 </label>
                  <br><input type="checkbox" name="O">
              </div>
              <div class="col-sm-12">
                      <textarea name="Description" id="demo-summernote" style="width:100%"></textarea>
              </div>
          </div>
          <div class="container mt-4 mb-4 text-center">
              <button class="btn btn-success">
                  Add Product
              </button>
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
                Price:'',
                Discount:'',
                SellingPrice:'',
                SKU:'',
                token:'',
                Brands:[],
                Categories:[],
                Category:'',
                Subcategories:[]
            }
        },
        methods:{
            Load(){
                //get the subcategories based on category id
                axios.get('/hlrsWE9ZeCr6g5iG3peOvIE3oFjP/'+this.Category).then((response)=>{
                    this.Subcategories=response.data
                    console.log(response.data)
                })
            },
            loadCategories(){
                axios.get('/qTuXJFkoN7GP.xDIrM5nyTBVu6wfycHR/bT7kMhTBB3K').then((response)=>{
                    this.Categories=response.data.Categories
                })
            },
            loadBrands(){
                axios.get('/u3frZeJzrMEe2g42KvAdv2gbUbRjwr49fbk6Zll1Dz').then((response)=>{
                    this.Brands=response.data
                })
            },
            Generate(){
                axios.get('/EfGTGYkBDAqW/lbpg/ajYPPyb2').then((response)=>{
                    this.SKU=response.data,
                    console.log(response.data)
                })
            }
        },
        created(){
            this.token=$('meta[name="csrf-token"]').attr('content')
            console.log(this.token)
            this.loadBrands()
            this.loadCategories()
        }
    }
</script>
