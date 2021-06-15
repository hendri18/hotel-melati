<template>
    <div>
        <carousel :items="1" :autoplay="true" :nav="false" :loop="true">
            <div class="img-slideshow img-1"></div>
            <div class="img-slideshow img-2"></div>
            <div class="img-slideshow img-3"></div>
            <div class="img-slideshow img-4"></div>
        </carousel>
        <div>
            <form @submit.prevent="searchRoom" class="form-search-hotel">
                <h4 class="text-center">Cari Kamar Hotel</h4>
                <div class="row p-4">
                    <div class="col-md-4">
                        <date-picker v-model="checkin_date" valueType="format"></date-picker>
                    </div>
                    <div class="col-md-4">
                        <date-picker v-model="checkout_date" valueType="format"></date-picker>
                    </div>
                    <div class="col-md-4">
                        <button class="btn btn-default btn-block">Search</button>
                    </div>
                </div>
            </form>
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
                checkin_date: null,
                checkout_date: null,
            }
        },
        components: { carousel, DatePicker },
        methods: {
            searchRoom(e){

                if(!this.checkin_date || !this.checkout_date){
                    this.$swal.fire({
                        text: "Checkin dan Checkout tidak boleh kosong!",
                        icon: 'error'
                    })
                    return false;
                }
                if(this.checkin_date > this.checkout_date){
                    this.$swal.fire({
                        text: "Tanggal Checkin tidak bisa lebih besar dari Tanggal Checkout!",
                        icon: 'error'
                    })
                    return false;
                }
                this.$router.push({ name: 'list', query: { checkin_date: this.checkin_date, checkout_date: this.checkout_date } })
                e.preventDefault();
            }
        }
    }
</script>
