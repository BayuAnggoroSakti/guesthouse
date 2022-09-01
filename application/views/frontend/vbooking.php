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
 <section class="padding-t-70 components_page padding-b-30">
      <div class="emTitle_co padding-20">
                    <h2 class="size-16 weight-500 color-secondary mb-1">Booking List</h2>
                    <p class="size-12 color-text m-0">Menampilkan list booking anda</p>
                </div>
<div class="emPage__billsWallet padding-20 py-0">
                    <div class="emBk__bills">
                        <?php
                        if (count($list_booking) == 0) {
                            echo '<div class="alert alert-danger" role="alert">Anda belum pernah melakukan booking</div>';
                        } 
                        if (isset($message)) {
                                 echo $message;
                              }
                        
                            foreach ($list_booking as $data_booking) { ?>
                                   <div class="item">
                                    <div class="embody_w">
                                        <div class="details_w">
                                            <h3>Tamu : <?php echo $data_booking->GUEST_NAME_LEAD ?></h3>
                                            <span><?php echo timestamp_indo(substr($data_booking->STR_CHECKIN,0,10)).', '.substr($data_booking->STR_CHECKIN,11,5).' Sampai '.timestamp_indo(substr($data_booking->STR_CHECKOUT,0,10)).', '.substr($data_booking->STR_CHECKOUT,11,5);  ?></span>
                                               <span>Jumlah Tamu : <?php echo $data_booking->TOTAL_PERSON ?> Orang</span>
                                                <span>Datetime Insert : <?php echo $data_booking->STR_DATETIME_INSERT ?></span>
                                        </div>
                                        <div class="price">
                                            <b><?php echo rupiah($data_booking->TOTAL_PRICE) ?></b>
                                              <div class="emhead_w">
                                                 <a href="<?php echo site_url('home/booking_detail/'.$data_booking->ID_BOOKING) ?>" class="btn btn_default bg-primary">Detail</a>
                                             </div>
                                        </div>
                                        
                                    </div>
                                </div>
                        <?php
                            }
                        ?>
                     
                      
                    </div>
                </div>
            </section>