   <?php
function rupiah($angka){
    
    $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
    return $hasil_rupiah;
 
}
function timestamp_indo($tanggal){
    $bulan = array (
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    $pecahkan = explode('-', $tanggal);
    return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}


?> 

  <section class="emPage__invoiceDetails">
                <div class="emhead__invoice">
                    <div class="brand__id">
                        <div class="brand">
                             <img src="<?php echo base_url('assets/');?>logo_panjang.jpg"  alt="Porto Admin" />
                        </div>
                        <div class="date_ticket">
                            <span class="id color-secondary">#<?php echo $booking->ID_BOOKING ?></span>
                            <span class="date color-text"><?php echo timestamp_indo(substr($booking->STR_DATETIME_INSERT,0,10)).', '.substr($booking->STR_DATETIME_INSERT,11,5)?></span>
                            <?php
                            if ($booking->STATUS == 0 && date('Y-m-d') > substr($booking->STR_CHECKIN,0,10)) { ?>
                                  <div class="emhead_w">
                                    <a  onclick="return confirm('Apakah anda yakin akan cancel booking ini?')" href="<?php echo site_url('home/cancel_booking/').$booking->ID_BOOKING ?>" style="color:white" class="btn  bg-danger">Cancel Booking</a>
                                  </div>
                            <?php
                            }
                             ?>
                           
                        </div>
                    </div>
                </div>
                <div class="embody__invoice">
                    <div class="about__sent">
                        <div class="billed__to">
                            <h2>General Info</h2>
                            <p class="username">Checkin : <?php echo timestamp_indo(substr($booking->STR_CHECKIN,0,10)).', '.substr($booking->STR_CHECKIN,11,5); ?></p>
                            <p class="username">Checkout : <?php echo timestamp_indo(substr($booking->STR_CHECKOUT,0,10)).', '.substr($booking->STR_CHECKOUT,11,5); ?></p>
                            <p class="username">Jumlah Tamu : <?php echo $booking->TOTAL_PERSON ?> Orang</p>

                            <div class="group">
                                <?php
                                    if ($booking->STATUS == 0) {
                                       echo ' <span class="bg-blue rounded-4 px-1 color-white min-w-25 h-21 d-flex align-items-center justify-content-center">New Booking</span>
                                    <span class="short__name"></span>';
                                    }else if($booking->STATUS == 1){
                                        echo ' <span class="bg-yellow rounded-4 px-1 color-black min-w-25 h-21 d-flex align-items-center justify-content-center">Setting Rooms</span>
                                    <span class="short__name"></span>';
                                    }else if($booking->STATUS == 2){
                                        echo ' <span class="bg-green rounded-4 px-1 color-white min-w-25 h-21 d-flex align-items-center justify-content-center">Completed</span>
                                    <span class="short__name"></span>';
                                    } else {
                                         echo ' <span class="bg-primary rounded-4 px-1 color-white min-w-25 h-21 d-flex align-items-center justify-content-center">Canceled</span>
                                    <span class="short__name"></span>';
                                    }
                                    
                                ?>
                                   
                                </div>
                        </div>
                        <div class="pay__to">
                            <h2>Guest Info</h2>
                            <p class="username"><?php echo $booking->GUEST_NAME_LEAD ?></p>
                            <p class="username"><?php echo $booking->GUEST_NOHP_LEAD ?></p>
                            <p class="username"><?php echo $booking->UNIT_PIC_BOOKING ?></p>
                            <p class="username"><?php echo $booking->DESC ?></p>
                        </div>
                    </div>
                    <div class="emtable__Details">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col"><b>Type Room</b></th>
                                    <th scope="col"><b>No Room</b></th>
                                    <th scope="col"><b>Sub Total</b></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    foreach ($booking_room as $data_list_room) { ?>
                                        <tr>
                                            <td>  <span class="name_pt"><?php echo $data_list_room->ROOM_NAME ?></span></td>
                                            <td><?php if ($data_list_room->ROOM_NO == "") {
                                               echo "belum di setting admin";
                                            } else {
                                               echo $data_list_room->ROOM_NO; 
                                            }
                                             ?></td>
                                            <td><?php echo rupiah($data_list_room->PRICE) ?></td>
                                        </tr>
                                <?php
                                    }
                                ?>

                            </tbody>
                        </table>
                        <div class="footer__detailsTable">
                            <div class="title_total">
                                Total Harga
                            </div>
                            <div class="detailsTotaly">
                                <div class="signature">
                                    <img src="<?php echo base_url('assets/frontend')?>/img/signature.png" alt="">
                                </div>
                                <div class="txtDetails">
                                    <h3><?php echo rupiah($booking->TOTAL_PRICE) ?></h3>
                                    <?php
                                        if ($total_add_bed != 0) {
                                            echo '<p><b>(Ada penambahan bed sebesar '.rupiah($total_add_bed).' )</b></p>';
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="emfooter__invoice">
                    <h1 class="title">Activity Details</h1>
                    <div class="group">
                            <?php foreach ($log_booking as $data_log) { ?>


                                                             <a href="#" class="item__activiClassic">
                                                                <div class="media">
                                                                    <div class="icon bg-green bg-opacity-10">
                                                                        <svg id="Iconly_Two-tone_Shield_Done" data-name="Iconly/Two-tone/Shield Done"
                                                                            xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                                                                            <g id="Shield_Done" data-name="Shield Done" transform="translate(3.542 2.291)">
                                                                                <path id="Stroke_1" data-name="Stroke 1"
                                                                                    d="M12.179,1.979a.907.907,0,0,1,.608.857V8.48A6.485,6.485,0,0,1,11.2,12.73a6.476,6.476,0,0,1-1.838,1.415L6.4,15.746l-2.97-1.6a6.472,6.472,0,0,1-1.84-1.415A6.486,6.486,0,0,1,0,8.476V2.835a.907.907,0,0,1,.607-.857L6.092.051a.909.909,0,0,1,.6,0Z"
                                                                                    transform="translate(0 0)" fill="none" stroke="#25c998"
                                                                                    stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"
                                                                                    stroke-width="1.5" />
                                                                                <path id="Stroke_3" data-name="Stroke 3" d="M0,1.671,1.577,3.248,4.825,0"
                                                                                    transform="translate(4.227 5.97)" fill="none" stroke="#25c998"
                                                                                    stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"
                                                                                    stroke-width="1.5" opacity="0.4" />
                                                                            </g>
                                                                        </svg>

                                                                    </div>
                                                                    <div class="media-body my-auto">
                                                                        <div class="txt">
                                                                            <h2><?php echo $data_log->MESSAGE.' ('.$data_log->FIRST_NAME.' '.$data_log->LAST_NAME.')' ?> </h2>
                                                                            <p><?php echo $data_log->STR_DATETIME_INSERT ?></p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                         
                                                <?php
                                                } ?>
                                   
                                    </div>
                </div>
            </section>