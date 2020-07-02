<template>
    <div>
      <div class="form-group">
    <label for="exampleInputEmail1">No Meja</label>
    <input type="number" name="name" v-model="form.desk_no" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Menu</label>
     <h3>List Makanan</h3>
<table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Staus</th>
                    <th>Jumlah Beli</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(food,index) in foods" :key="food.id">
                <td scope="row">{{ index+1 }}</td>
                <td>{{ food.name }}</td>
                <td>{{ food.price }}</td>
                <td>{{ food.status == 'Y' ? 'Ready' : 'Tidak' }}</td>
                <td><input style="width:100px" type="number" v-model="qty[index]" name="qty" class="form-control" min="1" id="" required value="1"></td>
                <td><button class="btn btn-xs btn-info text-white" @click="addItem(food,qty[index])">Tambah</button></td>
                </tr>
            </tbody>
        </table>

        <hr>
        <h3>Daftar Pesanan</h3>
        <div  v-if="form.items.length > 0">
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Harga</th>
                    <th>Jumlah Beli</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(item,index) in form.items" :key="item.id">
                <td scope="row">{{ index+1 }}</td>
                <td>{{ item.selected.name }}</td>
                <td>{{ item.selected.price }}</td>
                <td><input type="number" name="" v-model.number="item.qty" min="1"  id="" class="form-control" style="width:100px"></td>
                <td><button class="btn btn-xs btn-danger text-white" @click="removeItem(index)">Hapus</button></td>
                </tr>
            </tbody>
        </table>
          <div class="form-group">
    <label for="exampleInputPassword1" class="col-3">Status</label>
        <div class="col-3">
          <select name="" v-model="form.status" id="" class="form-control">
          <option value="Y">Ready</option>
          <option value="N">Close</option>
        </select>
        </div>
          </div>
        </div>
        <div v-else class="text-center"><h3>Belum ada Order</h3></div>
  </div> 
  <div class="d-flex justify-content-end">

  <button @click="saveOrders" class="btn btn-primary btn-sm text-white" :class="{'disabled' : form.items.length === 0}">Simpan</button>
  </div>
     
    </div>
</template>

<script>
import vSelect from 'vue-select'
import "vue-select/dist/vue-select.css";
export default {
    components :{
        'v-select':vSelect
    },
    mounted(){
      this.fetchFoods()
      this.fillingOrder()
    },
    data(){
      return{
        qty:[],
        foods:[],
        form:{
        desk_no:null,
        status:'Y',
        order_no:null,
          items:[]
        }
      }
    },
    props:{
      prefillOrder:{
        default:[],
        type:String
      }
    },
    methods:{
      fillingOrder(){
        let orders = JSON.parse(this.prefillOrder);
        this.form.items = orders.items
        this.form.desk_no = orders.desk_no
        this.form.order_no = orders.no
      },
      async saveOrders(){
        
        if(this.form.order_no === null){
          let url = "/restaurant/orders/create";
        let response =  await axios.post(url,{form:this.form});
        window.location.href = "/restaurant/orders";
        }else if(this.form.order_no != null){
          let response =  await axios.put('/restaurant/orders/'+this.form.order_no+'/edit',{form:this.form});
          window.location.href = "/restaurant/orders";
        }
      },
      async fetchFoods(){
        let url = '/api/restaurant/foods';
        let response = await axios.get(url);
        this.foods = response.data
      },
      addItem(food,qty){
        event.preventDefault()
        let exists = this.checkExistingItem(food);
        if(exists == false){
          this.form.items.push({
          selected:food,
          qty:parseInt(qty === undefined ? 1 :qty)
        })
        }else{          
          const result = this.form.items.find(({ selected }) => selected.id === food.id);
          result.qty += parseInt(qty === undefined ? 1 :qty)
        }
        
      },
      removeItem(index){
        event.preventDefault();
        this.form.items.splice(index,1)
      },checkExistingItem(food){
        let exist = this.form.items.some(el => el.selected.id === food.id) && this.form.items.length > 0;
        return exist;
      }
    }
}
</script>

<style>

</style>