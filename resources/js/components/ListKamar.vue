<template>
    <div class="py-3">
        <h4 class="py-2" @click="searchRoom">List Kamar Hotel yang Tersedia <a @click="$router.go(-1)" class="btn btn-default btn-dark float-right">Kembali</a></h4>
        <p><strong>Dari Tanggal: {{this.checkin_date}} <sup>s</sup>/<sub>d</sub> {{this.checkout_date}}</strong></p>
        <div class="card my-3" v-for="(list, index) in dataList" v-bind:key="index">
            <div class="card-header">Type Kamar: {{list.type_kamar ? list.type_kamar.nama_type_kamar : ''}}</div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <img
                            class="w-100"
                            :src="list.gambar"
                            alt=""
                            style="width: 215px"
                        />
                    </div>
                    <div class="col-md-7">
                        <h5 class="card-title"><strong>No Kamar: {{list.nomor_kamar}}</strong></h5>
                        <p class="card-text" v-html="list.type_kamar ? list.type_kamar.fasilitas : ''"></p>
                        <br />
                        <h5>Rp. {{list.type_kamar ? list.type_kamar.harga : ''}}</h5>
                    </div>
                    <div class="col-md-1 d-flex align-items-end flex-column">
                        <div class="d-grid gap-2 d-md-block mt-auto">
                            <router-link :to="{ name: 'pemesanan', params: {id_kamar: list.id_kamar}, query:{checkin_date: checkin_date,checkout_date: checkout_date} }" class="btn btn-default btn-dark">Pesan</router-link>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </div>
</template>

<script>
import carousel from 'vue-owl-carousel'
import DatePicker from 'vue2-datepicker';
import 'vue2-datepicker/index.css';
export default {
    data(){
        return {
            dataList: [],
            checkin_date: this.$route.query.checkin_date ?? '',
            checkout_date: this.$route.query.checkout_date ?? ''
        }
    },
    components: { carousel, DatePicker },
    
    methods: {
        searchRoom(e){
            console.log(this.$route.query)
            console.log(this.$route.query.checkin_date12)
            e.preventDefault();
        }
    },
    beforeMount() {
        this.$root.setLoading(true);
        if(this.$isEmpty(this.$route.query.checkin_date) || this.$isEmpty(this.$route.query.checkout_date)) this.$router.push({name: 'home'});
        const params = { checkin_date: this.checkin_date, checkout_date: this.checkout_date };
        const paramString = new URLSearchParams(params)
        let uri = '/api/list-kamar?'+(paramString.toString());
        this.axios.get(uri).then(response => {
            this.$root.setLoading(false);
            if(response.data.data == 0 || response.data.code != 200){
                this.$router.push({name: 'home'});
                this.$swal.fire({
                    text: "Tidak ada kamar yang tersedia",
                    icon: 'error'
                });
                return;
            }
            this.dataList = response.data.data;
        }).catch(error =>{
            this.$swal.fire({
                text: 'Permintaan anda tidak dapat diproses, harap hubungi resepsionis',
                icon: 'error'
            });
            this.$root.setLoading(false);
        });;
    },
}
</script>
