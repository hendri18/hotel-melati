<template>
    <div class="py-3">
        <form action="">
            <div class="row">
                <div class="col-md-8">
                    <div class="card-body">
                        <form action="">
                            <h4>Reservasi Detail <a @click="$router.go(-1)" class="btn btn-default btn-dark float-right">Kembali</a></h4>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">First Name</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Last Name</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Address</label>
                                        <textarea name="" id="" cols="30" rows="10" class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">City</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">State</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Zip Code</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Phone</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="">Email</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Check-in</label>
                                        <date-picker v-model="checkin_date" valueType="format" class="w-100"></date-picker>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Check-out</label>
                                        <date-picker v-model="checkout_date" valueType="format" class="w-100"></date-picker>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <img
                            class="w-100 pb-2"
                            src="https://images.oyoroomscdn.com/uploads/hotel_image/45626/medium/4d150273dc99ded1.jpg"
                            alt=""
                            style="width: 215px"/>
                            <h4>Melati 1</h4>
                            <h5>Rp. 16.000.000</h5>
                            <div><router-link :to="{ name: 'pemesanan-selesai' }" class="btn btn-default btn-dark btn-block my-3">Pesan Sekarang</router-link></div>
                            <p>Feature: </p>
                            <ul>
                                <li>2 Kasur Lebar</li>
                                <li>AC</li>
                                <li>Kulkas</li>
                                <li>TV</li>
                                <li>Mesin Cuci</li>
                            </ul>
                            <p>Kenimatan tidur </p>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</template>

<script>
import carousel from 'vue-owl-carousel'
import DatePicker from 'vue2-datepicker';
import 'vue2-datepicker/index.css';
    export default {
        data(){
            return {
                checkin_date: this.$route.query.checkin_date ?? '',
                checkout_date: this.$route.query.checkout_date ?? ''
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
