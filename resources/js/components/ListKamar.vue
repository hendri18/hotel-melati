<template>
    <div class="py-3">
        <h4 class="py-2" @click="searchRoom">List Kamar Hotel yang Tersedia <a @click="$router.go(-1)" class="btn btn-default btn-dark float-right">Kembali</a></h4>
        <p><strong>Dari Tanggal: {{this.checkin_date}} <sup>s</sup>/<sub>d</sub> {{this.checkout_date}}</strong></p>
        <div class="card my-3" v-for="(list, index) in dataList" v-bind:key="index">
            <div class="card-header">Featured</div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <img
                            class="w-100"
                            src="https://images.oyoroomscdn.com/uploads/hotel_image/45626/medium/4d150273dc99ded1.jpg"
                            alt=""
                            style="width: 215px"
                        />
                    </div>
                    <div class="col-md-4">
                        <h5 class="card-title">Special title treatment</h5>
                        <p class="card-text">
                            With supporting text below as a natural lead-in to additional
                            content.
                        </p>
                        <br />
                        <h5>Rp.xxx.xxx.xxx</h5>
                    </div>
                    <div class="col-md-4 d-flex align-items-end flex-column">
                        <div class="d-grid gap-2 d-md-block mt-auto">
                            <router-link :to="{ name: 'pemesanan', params: {id: 1}, query:{checkin_date: checkin_date,checkout_date: checkout_date} }" class="btn btn-default btn-dark">Pesan</router-link>
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
            dataList: [1,2],
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
    mounted(){
        if(this.$isEmpty(this.$route.query.checkin_date) || this.$isEmpty(this.$route.query.checkout_date))
            this.$router.push({name: 'home'});
        
    }
}
</script>
