<?php

use Illuminate\Database\Seeder;

class AllTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('type_kamar')->insert([
        [
            'nama_type_kamar' => 'Superior Room',
            'harga' => 1200000,
            'fasilitas' => '<div class="lk_content">
                <p><strong>Bed Type</strong>:&nbsp;Queen-size bed (180×200 cm) or&nbsp;twin single beds (90×200 cm)<br>
                <strong>Bathroom</strong>:&nbsp;Shower<br>
                <strong>Size (sqm)</strong>:&nbsp;18<br>
                <strong>Views</strong>&nbsp;: City of Bandung View<br>
                <strong>Max. Occupancy</strong>:&nbsp;2A(Adults)</p>
                <p>*Additional charge is applicable for the 3rd (third) person</p>
                <p>All rooms are equipped with: Air Conditioning, LCD TV 32 inch, a safe deposit box, coffee &amp; tea making facility. All beds are furnished with plush duvet covers</p>
                <p>Located at the 8th floor to the 15th floor of the hotel building, the type of room and the concept of a full interior make the comfortable rooms atmosphere and also relaxing at the same time. The room windows are wide, directly we can see the city of Bandung at any time.</p>
		        </div>',
        ],
        [
            'nama_type_kamar' => 'Suite Room',
            'harga' => 1500000,
            'fasilitas' => '<div class="lk_content">
                <p><strong>Bed Type</strong>: King-size bed (200×200 cm)<br>
                <strong>Bathroom</strong>: Shower and Bathtub<br>
                <strong>Size (sqm)</strong>: 36<br>
                <strong>Views</strong>: view of the mountain city of Bandung<br>
                <strong>Number of Rooms</strong>: 2<br>
                <strong>Max. Occupancy</strong>: 2A(Adults)</p>
                <p>*Additional charge is applicable for the 3rd (third) person</p>
                <p>All rooms are equipped with: Air Conditioning, LCD TV 32 inch,DVD Player, minibar, iron a safe deposit box, coffee machine &amp; tea making facility. All beds are furnished with plush duvet covers.</p>
                <p>Located at the 13th floor of the hotel building, with the biggest type of room and the concept of a full interior make the atmosphere comfortable rooms and relaxing. The room windows are large, directly we can see the view of the mountain city of Bandung at any time.</p>
                        </div>',
        ],
        [
            'nama_type_kamar' => 'Family Loft',
            'harga' => 1600000,
            'fasilitas' => '<div class="lk_content">
                <p><strong>Bed Type</strong>: Two Queen-size bed (180×200 cm)<br>
                <strong>Bathroom</strong>: Shower<br>
                <strong>Size (sqm)</strong>: 30<br>
                <strong>Views</strong>: City of Bandung View<br>
                <strong>Number of Rooms</strong>: 6<br>
                <strong>Max. Occupancy</strong>: 5A (Adults)</p>
                <p>All rooms are equipped with: Air Conditioning, LCD TV 32 inch, a safe deposit box, coffee &amp; tea making facility. All beds are furnished with plush duvet covers.</p>
                <p>Located at the same &nbsp;floor with Loft Room at the hotel building, this special room can be used as your family suite with their large size, with two queen bed. But also can be set as a SOHO (small office home office) too, a place for both meeting room and residential use.</p>
    		    </div>',
        ]
        ]);
        DB::table('kamar')->insert([
        [
            'id_type_kamar' => 1,
            'nomor_kamar' => 'HM-1',
            'status_kamar' => 'available',
            'gambar' => 'http://www.grandtebuhotels.com/wp-content/uploads/2016/02/IMG_0973.jpg',
        ],
        [
            'id_type_kamar' => 2,
            'nomor_kamar' => 'HM-2',
            'status_kamar' => 'available',
            'gambar' => 'http://www.grandtebuhotels.com/wp-content/uploads/2016/02/IMG_0926.jpg',
        ],
        [
            'id_type_kamar' => 2,
            'nomor_kamar' => 'HM-3',
            'status_kamar' => 'not_available',
            'gambar' => 'http://www.grandtebuhotels.com/wp-content/uploads/2016/02/IMG_0898.jpg',
        ],
        [
            'id_type_kamar' => 3,
            'nomor_kamar' => 'HM-4',
            'status_kamar' => 'available',
            'gambar' => 'http://www.grandtebuhotels.com/wp-content/uploads/2016/02/IMG_1012.jpg',
        ],
        [
            'id_type_kamar' => 1,
            'nomor_kamar' => 'HM-5',
            'status_kamar' => 'available',
            'gambar' => 'http://www.grandtebuhotels.com/wp-content/uploads/2016/02/IMG_0898.jpg',
        ],
        [
            'id_type_kamar' => 2,
            'nomor_kamar' => 'HM-6',
            'status_kamar' => 'available',
            'gambar' => 'http://www.grandtebuhotels.com/wp-content/uploads/2016/02/IMG_1089.jpg',
        ]
        ]);


    }
}
