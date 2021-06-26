<template>
    <div class="py-3">
        <form @submit.prevent="pesan" >
            <div class="row">
                <div class="col-md-8">
                    <div class="card-body">
                        <h4>Reservasi Detail <a @click="$router.go(-1)" class="btn btn-default btn-dark float-right">Kembali</a></h4>
                        <hr>
                        <input type="hidden" name="id_kamar" v-model="pemesanan.id_kamar">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Nama Pengunjung</label>
                                    <input type="text" class="form-control" v-model="pemesanan.nama">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">No KTP</label>
                                    <input type="text" class="form-control" v-model="pemesanan.no_ktp">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Alamat</label>
                                    <textarea name="" id="" cols="30" rows="10" class="form-control" v-model="pemesanan.alamat"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Kota</label>
                                    <input type="text" class="form-control" v-model="pemesanan.kota">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Provinsi</label>
                                    <input type="text" class="form-control" v-model="pemesanan.provinsi">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Kode Code</label>
                                    <input type="text" class="form-control" v-model="pemesanan.kode_pos">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Phone</label>
                                    <input type="text" class="form-control" v-model="pemesanan.nomor_telepon">
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="text" class="form-control" v-model="pemesanan.email">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Check-in</label>
                                    <date-picker v-model="pemesanan.checkin_date" valueType="format" class="w-100"></date-picker>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Check-out</label>
                                    <date-picker v-model="pemesanan.checkout_date" valueType="format" class="w-100"></date-picker>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <img
                            class="w-100 pb-2"
                            :src="kamar.gambar"
                            alt=""
                            style="width: 215px"/>
                            <h4>{{kamar.nomor_kamar}}</h4>
                            <h5>Rp. {{kamar.type_kamar.harga}}</h5>
                            <div><button type="submit" class="btn btn-default btn-dark btn-block my-3">Pesan Sekarang</button></div>
                            <div v-html="kamar.type_kamar.fasilitas"></div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</template>

<script>
import DatePicker from 'vue2-datepicker';
import 'vue2-datepicker/index.css';
    export default {
        data(){
            return {
                pemesanan: {
                    checkin_date: this.$route.query.checkin_date ?? '',
                    checkout_date: this.$route.query.checkout_date ?? '',
                    id_kamar: this.$route.params.id_kamar,
                },
                id_kamar: this.$route.params.id_kamar ?? '',
                kamar: {
                    type_kamar:{}
                },
                
            }
        },
        components: { DatePicker },
        methods: {
            pesan: function(e){
                e.preventDefault();
                console.log(this.pemesanan)
                this.$root.setLoading(true);
                if(this.$isEmpty(this.$route.query.checkin_date) || this.$isEmpty(this.$route.query.checkout_date)) this.$router.go(-1);
                let uri = '/api/pesan';
                this.axios.post(uri, this.pemesanan).then(response => {
                    this.$root.setLoading(false);
                    if(response.data.code != 200){
                        this.$router.go(-1);
                        this.$swal.fire({
                            text: response.data.message ?? '',
                            icon: 'error'
                        });
                        return;
                    }
                    console.log(response.data.data);
                    this.$router.push({name: 'pemesanan-selesai', params: { id_transaksi: response.data.data.id_transaksi }});
                }).catch(error =>{
                    this.$swal.fire({
                        text: 'Permintaan anda tidak dapat diproses, harap hubungi resepsionis',
                        icon: 'error'
                    });
                    this.$root.setLoading(false);
                });
                e.preventDefault();
            }
        },
        beforeMount() {
            this.$root.setLoading(true);
            if(this.$isEmpty(this.$route.params.id_kamar) || this.$isEmpty(this.$route.query.checkin_date) || this.$isEmpty(this.$route.query.checkout_date)) this.$router.push({name: 'home'});
            let uri = '/api/list-kamar/'+(this.$route.params.id_kamar);
            this.axios.get(uri).then(response => {
                this.$root.setLoading(false);
                if(response.data.code != 200){
                    this.$router.go(-1);
                    this.$swal.fire({
                        text: response.data.message,
                        icon: 'error'
                    });
                    return;
                }
                this.kamar = response.data.data;
                console.log(this.kamar)
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
