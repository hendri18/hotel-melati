<template>
    <div class="py-3 text-center">
        <h3 class="text-center">Pemesanan Berhasil</h3>
        <p>Selamat pemesanan anda berhasil <br> Nomor kamar anda adalah</p>
        
        <h4><strong>{{transaksi.kamar.nomor_kamar}}</strong></h4>
        <p>Silahkan lakukan pembayaran di resepsionis sebesar: </p>
        <h5><strong>Rp. {{transaksi.total_harga}}</strong></h5>
        <p>Lalu anda akan menerima kunci kamar anda.</p>
        <router-link :to="{ name: 'home' }" class="btn btn-default btn-dark">Kembali ke Home</router-link>
    </div>
</template>

<script>
import 'vue2-datepicker/index.css';
    export default {
        data(){
            return {
                transaksi: {
                    kamar: {},
                    pengunjung: {}
                }
            }
        },
        methods: {
        },
        beforeMount(){
            this.$root.setLoading(true);
            if(this.$isEmpty(this.$route.params.id_transaksi)) this.$router.push({name: 'home'});
            
            let uri = '/api/pesan-detail/'+this.$route.params.id_transaksi;
            this.axios.get(uri).then(response => {
                this.$root.setLoading(false);
                if(response.data.data == 0 || response.data.code != 200){
                    this.$router.push({name: 'home'});
                    this.$swal.fire({
                        text: "Permintaan anda tidak dapat diproses, harap hubungi resepsionis",
                        icon: 'error'
                    });
                    return;
                }
                this.transaksi = response.data.data;
            }).catch(error =>{
                this.$router.push({name: 'home'});
                this.$swal.fire({
                    text: 'Permintaan anda tidak dapat diproses, harap hubungi resepsionis',
                    icon: 'error'
                });
                this.$root.setLoading(false);
                
            });
        }
    }
</script>
