<template>
    <div class="py-5">
        <h4 class="py-2" @click="searchRoom">List Kamar Hotel yang Tersedia</h4>
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
                            <button class="btn btn-primary" type="button">Button</button>
                            <button class="btn btn-primary" type="button">Button</button>
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
            dataList: [1,2]
        }
    },
    components: { carousel, DatePicker },
    
    methods: {
        searchRoom(e){
            console.log(this.dataList)
            e.preventDefault();
        }
    }
}
</script>
