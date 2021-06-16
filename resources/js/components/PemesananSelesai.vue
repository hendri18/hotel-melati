<template>
    <div class="py-3 text-center">
        <h3 class="text-center">Pemesanan Berhasil</h3>
        <p>Selamat pemesanan anda berhasil <br> Kamar anda berada di</p>
        
        <h4><strong>Lt. 2 No 45</strong></h4>
        <p>Silahkan lakukan pembayaran di resepsionis sebesar: </p>
        <h5><strong>Rp. 16.000.000</strong></h5>
        <p>Lalu anda akan menerima kunci kamar anda.</p>
        <router-link :to="{ name: 'home' }" class="btn btn-default btn-dark">Kembali ke Home</router-link>
    </div>
</template>

<script>
import 'vue2-datepicker/index.css';
    export default {
        data(){
            return {
            }
        },
        components: {  },
        methods: {
        }
    }
</script>
