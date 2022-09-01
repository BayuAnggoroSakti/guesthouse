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
$checkin = strtotime($this->input->get('date_checkin'));
$checkout = strtotime($this->input->get('date_checkout'));
$datediff = $checkout - $checkin;
$datediff = round($datediff / (60 * 60 * 24));
?> 
           
 <section class="emPage__basket default">
                <div class="detailsTotally">
                    <ul>
                        <li>
                            <span>Checkin</span>
                            <span><?php echo timestamp_indo($this->input->get('date_checkin')).' '.$this->input->get('time_checkin') ?></span>
                        </li>
                        <li>
                            <span>Checkout</span>
                            <span><?php echo timestamp_indo($this->input->get('date_checkout')).' '.$this->input->get('time_checkout') ?></span>
                        </li>
                        <li>
                            <span>Person</span>
                            <span><?php echo $this->input->get('person') ?> Orang</span>
                        </li>
                    </ul>
                </div>
                <input type="hidden" name="total_day" id="total_day" value="<?php echo $datediff; ?>">
                 <div class="margin-t-30">
                    <a href="#" data-toggle="modal" data-target="#mdllSend" class="btn btn_default_lg">Change Filter</a>
                </div>
                <br>
                <?php
                if (count($room) == 0) {
                   echo '<div class="alert alert-danger" role="alert">Tidak ada room tersedia untuk tanggal tersebut</div>';
                } else{
                
                    foreach ($room as $data_room) { ?>
                        <div class="item_to_product margin-b-20">
                            <div class="d-flex align-items-center">
                                <div class="emhead_product">
                                    <div class="emCover_rpduct">
                                        <div class="bk_img">
                                             <?php
                                                if ($data_room->IMAGE != "") {
                                                    echo '<img src="'.base_url("assets/img/guesthouse/").$data_room->IMAGE.'" alt="">';
                                                } else {
                                                   echo '  <img src="'.base_url("assets/").'img/products/product-7.jpg" alt="">';
                                                }
                                                
                                            ?>
                                          
                                        </div>
                                     
                                    </div>
                                </div>
                                <div class="embody_product">

                                    <h2 class="name__product"><?php echo $data_room->ROOM_NAME ?></h2>
                                    <div class="pk_start">
                                        <span class="bg-info rounded-4 px-1 color-white  min-w-25 h-21  align-items-center justify-content-center"><?php echo $data_room->PERSON ?> Orang</span>
                                        <span class="bg-danger rounded-4 px-1 color-white  min-w-25 h-21  align-items-center justify-content-center"><?php echo ' '.$data_room->TYPE_BED ?></span>
                                        <input type="hidden" name="room_sisa" value="<?php echo $data_room->SISA ?>" id="room_sisa_<?php echo $data_room->ID_ROOM_TYPE ?>">
                                        
                                    </div>
                                      <span class="bg-warning rounded-4 px-1 color-black  min-w-25 h-21  align-items-center justify-content-center"><?php echo $data_room->SISA ?> kamar tersisa</span>
                                    <div class="pk_end">
                                        
                                        <span class="__color"><?php echo $data_room->FACILITY ?></span>
                                         <p class="item_price"><b><?php echo rupiah($data_room->RATE) ?></b> / day</p>
                                    </div>
                                </div>
                            </div>
                            <div class="emfooter_product">
                                <div class="itemCountr_manual vertical">
                                    <a href="#" onClick="cartAction('add','<?php echo $data_room->ID_ROOM_TYPE ?>','<?php echo $data_room->RATE ?>',<?php echo $data_room->PERSON ?>)" class="btn btn_counter w-42 h-30 co_up">
                                        <i class="tio-add"></i>
                                    </a>
                                    <input type="text" id="counter_<?php echo $data_room->ID_ROOM_TYPE ?>" class="form-control input_no color-secondary" value="0">
                                    <a href="#"  onClick="cartAction('remove','<?php echo $data_room->ID_ROOM_TYPE ?>','<?php echo $data_room->RATE ?>',<?php echo $data_room->PERSON ?>)" class="btn btn_counter co_down w-42 h-30">
                                        <i class="tio-remove"></i>
                                    </a>
                                </div>
                              
                            </div>
                        </div>
                      
                <?php
                    } ?>
                       <div class="detailsTotally">
                    <ul>
                        <li>
                            <span>Total Kamar dipilih</span>
                            <span id="total_room">0 Kamar</span>
                        </li>
                         <li>
                            <span>Total Tamu dipilih</span>
                            <span id="total_tamu">0 Orang</span>
                        </li>
                      
                        <div class="dividar"></div>
                        <li>
                            <span class="size-16 text_total">Total Price</span>
                            <span id="total_price" class="number_total size-16">Rp 0</span>
                        </li>
                    </ul>
                </div>
                <div class="margin-t-30">
                    <button data-toggle="modal"
                            data-target="#mdllConfirm-transfer" class="btn btn_default_lg">Proceed to Booking</button>
                </div>
            <?php }
                ?>
                  
           

            </section>
              <div class="modal transition-bottom screenFull defaultModal confirm__transfer mdlladd__rate fade"
            id="mdllConfirm-transfer" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header padding-l-20 padding-r-20 justify-content-center">
                        <div class="itemProduct_sm">
                            <h1 class="size-18 weight-600 color-secondary m-0">Confirm Booking</h1>
                        </div>
                        <div class="absolute right-0 padding-r-20">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <i class="tio-clear"></i>
                            </button>
                        </div>
                    </div>
                    <div class="modal-body">
                        <div >
                            <div class="trans__number margin-t-20 padding-b-30">
                                <h3 id="confirm_total_price">Rp. 0</h3>
                                <h3 id="confirm_total_room">0 Kamar</h3>
                            </div>

                            <div class="bk__convPersons emBK__transactions">
                                <form action="<?php echo site_url('home/act_booking') ?>" onsubmit="return validationCheckout()" method="post" class="row">
                                <input type="hidden" name="checkin" value="<?php echo $this->input->get('date_checkin').' '.$this->input->get('time_checkin').':00' ?>">
                                <input type="hidden" name="checkout" value="<?php echo $this->input->get('date_checkout').' '.$this->input->get('time_checkout').':00' ?>">
                                <input type="hidden" id="form_total_price" name="total_price" >
                                <input type="hidden" required id="list_room" name="list_room" >
                                <div class="col-6">
                                    <div class="form-group input-lined">
                                        <input type="text"  class="form-control" readonly name="" value="<?php echo timestamp_indo($this->input->get('date_checkin')).' '.$this->input->get('time_checkin') ?>">
                                        <label>Checkin</label>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group input-lined">
                                        <input type="text" class="form-control" readonly name="" value="<?php echo timestamp_indo($this->input->get('date_checkout')).' '.$this->input->get('time_checkout') ?>">
                                        <label>Checkout</label>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group input-lined">
                                        <input type="text"  class="form-control" readonly name="total_person" value="<?php echo $this->input->get('person') ?>">
                                        <label>Total Tamu</label>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group input-lined">
                                        <input id="confirm_tamu" required type="text" class="form-control" readonly>
                                        <label>Total Tamu yang di pesan</label>
                                    </div>
                                </div>
                                  <div class="col-12">
                                    <div class="form-group input-lined">
                                        <input type="text" required name="guest_name_lead" placeholder="Isi nama tamu perwakilan saja"  class="form-control"  name="">
                                        <label>Nama Tamu</label>
                                    </div>
                                </div>
                                  <div class="col-12">
                                    <div class="form-group input-lined">
                                        <input type="number" required name="guest_nohp_lead" placeholder="Isi perwakilan nomer hp tamu"  class="form-control"  name="">
                                        <label>No HP Tamu</label>
                                    </div>
                                </div>
                                  <div class="col-12">
                                    <div class="form-group input-lined">
                                        <input type="text" placeholder="Isi keterangan tamu"  class="form-control"  name="desc" >
                                        <label>Keterangan</label>
                                    </div>
                                </div>
                           
                            </div>
                            <p class="color-text size-13 text-center mb-0">Harga tersebut hanya <span
                                    class="color-secondary">estimasi</span>, harga bisa berubah menyesuaikan aktual saat tamu sudah datang</p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input value="Confirm" type="submit" id="btn_confirm" 
                            class="btn w-100 bg-primary m-0 color-white h-52 d-flex align-items-center rounded-8 justify-content-center">
                         </form>
                    </div>
                </div>
            </div>
        </div>

                 <div class="modal transition-bottom screenFull defaultModal mdlladd__rate fade" id="mdllSend" tabindex="-1"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header padding-l-20 padding-r-20 justify-content-center">
                        <div class="itemProduct_sm">
                            <h1 class="size-18 weight-600 color-secondary m-0">Booking Rooms</h1>
                        </div>
                        <!-- here is close button -->
                        <!-- <div class="absolute right-0 padding-r-20">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <i class="tio-clear"></i>
                      </button>
                  </div> -->
                    </div>
                    <div class="modal-body">
                        <div class="padding-t-20">
                            <form action="<?php echo site_url('home/search_room_avail')  ?>" onsubmit="return ValidationEvent()" method="get">

                                <div class="form-group input-lined">
                                   <input type="date" value="<?php echo $this->input->get('date_checkin') ?>"  class="form-control" id="date_checkin" name="date_checkin" required="">
                                    <label>Tanggal Check In</label>
                                </div>
                                 <div class="form-group input-lined">
                                   <input type="time" value="<?php echo $this->input->get('time_checkin') ?>" class="form-control"  name="time_checkin"  required="">
                                    <label>Jam Check In</label>
                                </div>
                                <div class="form-group input-lined">
                                    <input type="date" value="<?php echo $this->input->get('date_checkout') ?>"  class="form-control" id="date_checkout"   name="date_checkout"  required="">
                                    <label>Tanggal Check Out</label>
                                </div>
                                 <div class="form-group input-lined">
                                   <input type="time" class="form-control" value="<?php echo $this->input->get('time_checkout') ?>"  name="time_checkout"  required="">
                                    <label>Jam Check Out</label>
                                </div>
                                <div class="form-group input-lined relative">
                                    <input type="number" value="<?php echo $this->input->get('person') ?>"  class="form-control" name="person"   min="0" placeholder="Jumlah tamu"
                                        required="">
                                    <label>Total Person</label>
                                   
                                </div>

                          
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" 
                            class="btn w-100 bg-primary m-0 color-white h-52 d-flex align-items-center rounded-8 justify-content-center">
                            Search Available Room
                        </button>
                    </div>
                      </form>
                </div>
            </div>
        </div>
        <script>
            const count_room = [];
            const count_person = [];
            const sum_room = [];
            function simpleArraySum(ar) {
              var sum = 0;
              for (var i = 0; i < ar.length; i++) {
                sum += ar[i];
              }
              return sum;
            }
            function validationCheckout()
            {
                if ($('#form_total_price').val() == '') 
                {
                    alert("Mohon Pilih kamar terlebih dahulu");
                    return false;
                }else{
                    $('#btn_confirm').val('Processing, mohon di tunggu');
                    $('#btn_confirm').prop('disabled', true);
                    return true
                }
            }
            function ValidationEvent() 
            {
                // var in = $("#date_checkin").val();
                var d1 = new Date(document.getElementById("date_checkin").value);   
                var d2 = new Date(document.getElementById("date_checkout").value);   
                    
                var diff = d2.getTime() - d1.getTime();   
                    
                var daydiff = diff / (1000 * 60 * 60 * 24);  
                if (daydiff == 0 ) 
                {
                    alert("Tanggal checkin tidak boleh sama dengan tanggal checkout");
                    return false;
                } else if(daydiff < 0)
                {
                    alert("Tanggal checkin tidak boleh melebihi tanggal checkout");
                    return false;
                }else{
                    return true;
                } 
            }
            function cartAction(action,type_room,rate,person) {
                if (action == "add") 
                {
                     var sisa = $('#room_sisa_'+type_room+'').val();
                     var input_room =  $('#counter_'+type_room+'').val();
                     if (input_room > sisa-1) 
                     {
                         $('#counter_'+type_room+'').val(input_room-1);
                     }else{
                         count_room.push(type_room);
                         sum_room.push(parseInt(rate));
                         count_person.push(person);
                     }
                    
                }else {
                     var input_room =  $('#counter_'+type_room+'').val();
                     if (input_room == 0) 
                     {
                         console.log('melebihi 0');
                     }else{
                          var roomIndex = count_room.indexOf(type_room);
                         count_room.splice(roomIndex, 1);

                          var rateIndex = sum_room.indexOf(parseInt(rate));
                          sum_room.splice(rateIndex,1);

                          var personIndex = count_person.indexOf(parseInt(person));
                          count_person.splice(personIndex,1);
                     }
                   
                }
                $('#total_room').html(count_room.length+' Kamar');
                $('#total_tamu').html(simpleArraySum(count_person)+' Orang');
                $('#total_price').html('Rp. '+formatRupiah(simpleArraySum(sum_room) * $('#total_day').val()));
                $('#confirm_total_price').html('Rp. '+formatRupiah(simpleArraySum(sum_room) * $('#total_day').val()));
                $('#form_total_price').val(simpleArraySum(sum_room) * $('#total_day').val());
                $('#confirm_total_room').html(count_room.length+' Kamar');
                $('#confirm_tamu').val(simpleArraySum(count_person));
                $('#list_room').val(count_room);
            }

        function formatRupiah(bilangan){
             var    number_string = bilangan.toString(),
                sisa    = number_string.length % 3,
                rupiah  = number_string.substr(0, sisa),
                ribuan  = number_string.substr(sisa).match(/\d{3}/g);
                    
            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }
            return rupiah
        }
        </script>