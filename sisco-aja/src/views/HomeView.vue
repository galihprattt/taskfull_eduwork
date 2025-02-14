<script setup>
import axios from "axios";
import { ref } from "vue";

// Produk yang ditampilkan di bagian utama
let products = ref([]);

// Fungsi mendapatkan daftar produk
function getProduct() {
  axios
    .get("https://sistemtoko.com/public/demo/product")
    .then((res) => {
      products.value = res.data.aaData;
    })
    .catch((err) => alert(err));
}

getProduct();
</script>

<template>
  

  <main>
    <div class="container">
      <center><h2>Featured Product</h2></center>
      <div class="row">
        <div class="col-md-4 mb-4" v-for="(product, idx) in products" :key="idx">
          <div class="card">
            <div class="card-body">
              <img :src="product.photo" alt="" width="100%" />
              <span>{{ product.name }}</span>
              <br />
              <b><span>Rp. {{ product.price }}</span></b>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
</template>