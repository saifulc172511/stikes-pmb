<link rel="stylesheet" href="<?php echo base_url();?>assets/css/form.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
<style>
/* Style the form */
#regForm {
  background-color: #ffffff;
  margin: 100px auto;
  padding: 40px;
  width: 70%;
  min-width: 300px;
}

/* Style the input fields */
input {
  padding: 10px;
  width: 100%;
  font-size: 17px;
  font-family: Raleway;
  border: 1px solid #aaaaaa;
}

/* Mark input boxes that gets an error on validation: */
input.invalid {
  background-color: #ffdddd;
}

/* Hide all steps by default: */
.tab {
  display: none;
}

/* Make circles that indicate the steps of the form: */
.step {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbbbbb;
  border: none;
  border-radius: 50%;
  display: inline-block;
  opacity: 0.5;
}

/* Mark the active step: */
.step.active {
  opacity: 1;
}

/* Mark the steps that are finished and valid: */
.step.finish {
  background-color: #04AA6D;
}
</style>


<div class="page-container">
	<div class="row">
		<div class="col-md-12">
			<form id="regForm" action="">

				<h1>Register:</h1>

				<!-- One "tab" for each step in the form: -->
				<div class="tab">Name:
				  <p><input placeholder="First name..." oninput="this.className = ''"></p>
				  <p><input placeholder="Last name..." oninput="this.className = ''"></p>
				</div>

				<div class="tab">Contact Info:
				  <p><input placeholder="E-mail..." oninput="this.className = ''"></p>
				  <p><input placeholder="Phone..." oninput="this.className = ''"></p>
				</div>

				<div class="tab">Birthday:
				  <p><input placeholder="dd" oninput="this.className = ''"></p>
				  <p><input placeholder="mm" oninput="this.className = ''"></p>
				  <p><input placeholder="yyyy" oninput="this.className = ''"></p>
				</div>

				<div class="tab">Login Info:
				  <p><input placeholder="Username..." oninput="this.className = ''"></p>
				  <p><input placeholder="Password..." oninput="this.className = ''"></p>
				</div>

				<div style="overflow:auto;">
				  <div style="float:right;">
					<button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
					<button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
				  </div>
				</div>

				<!-- Circles which indicates the steps of the form: -->
				<div style="text-align:center;margin-top:40px;">
				  <span class="step"></span>
				  <span class="step"></span>
				  <span class="step"></span>
				  <span class="step"></span>
				</div>

				</form>
		</div>
	</div>





    <div class="main-content">
        <div class="text-center mt-2 mb-4" style="color:#007bff;font-size:20px"><b>Formulir Pendaftaran</b></div>

    <!-- MultiStep Form -->
        <div class="multisteps-form">
            <!--progress bar-->
            <div class="row">
                <div class="col-12 col-lg-8 ml-auto mr-auto mb-4">
                <div class="multisteps-form__progress">
                    <button class="multisteps-form__progress-btn js-active" type="button" disabled title="Data Pribadi">Data Pribadi</button>
                    <button class="multisteps-form__progress-btn" type="button" disabled title="Pendukung">Pendukung</button>
                </div>
                </div>
            </div>
  <!--form panels-->
  <?php
 
    foreach ($siswa as $sd):
        if($sd->AplikanID != 0){
            $dep = $this->m_user->get_prodi_by_idproses();
			$sumberinfo = $this->m_user->get_sumber_by_idproses();
        }
  ?>

<div class="row">
    <div class="col-12 col-lg-12 m-auto">
        <div class="multisteps-form__form">
            <!--single form panel-->
            <div class="multisteps-form__panel p-4 rounded bg-white js-active" data-animation="scaleIn">
                <h4 class="multisteps-form__title">Data Penerimaan Calon Mahasiswa</h3>
                <div class="multisteps-form__content">                
                    <div class="card">
                        <div class="card-body" style="background-color:#f0f7ff">
                                <div class="row mb-2">
                                    <div class="form-group col-md-4">
                                        <label class="font-weight-semibold" for="oldPassword">Program Studi:</label>
                                        <select class="select_prodi" id="prodi" name="prodi">
                                            <?php foreach ($prodi as $dd) {									
                                                if($dd->ProdiID == $dep){
                                                    echo '<option value="'.$dd->ProdiID.'" selected>'.$dd->ProdiID.'</option>';
                                                }else{
                                                    echo '<option value="'.$dd->ProdiID.'">'.$dd->ProdiID.'</option>';
													
                                                }
                                            }?>                                    
                                        </select>
                                    </div>
									<div />
									<div />               
                                </div>
                        </div>								
                    </div>
					<div class="row">
                    
						<div class="form-group col-md-4">
							<label class="font-weight-semibold">Nama sesuai KTP:</label>                                
							<input type="text" class="form-control" id="namamhsw" name="namamhsw" value="<?php echo $sd->Nama;?>">
						</div>
						<div class="form-group col-md-8">
							<label class="font-weight-semibold">Alamat:</label>                                
							<input type="text" class="form-control" id="alamatmhsw" name="alamatmhsw" value="<?php echo $sd->Alamat;?>">
						</div>

					</div>
					<div class="row">
						<div class="form-group col-md-4">
							<label class="font-weight-semibold">No. KTP (dikosongkan jika belum ada):</label>                                
							<input type="number" class="form-control" id="ktpmhsw" name="ktpmhsw" value="<?php echo $sd->Kebangsaan;?>"
							max="16">
						</div>
						<div class="form-group col-md-4">
							<label class="font-weight-semibold">No. KK:</label>                                
							<input type="text" class="form-control" id="kkmhsw" name="kkmhsw" value="<?php echo $sd->WargaNegara;?>">
						</div>
                    	<div class="form-group col-md-4">
							<label class="font-weight-semibold">No. Ponsel (HP):</label>                                
							<input type="text" class="form-control" id="hpmhsw" name="hpmhsw" value="<?php echo $sd->Handphone;?>">
						</div>
					</div>
					              
					<div class="row">
						<div class="form-group col-md-4">
							<label class="font-weight-semibold" for="oldPassword">Mengetahui kami dari mana:</label>
							<select class="select_sumber" id="sumber" name="sumber">
								<?php foreach ($sumber as $ee) {									
									if($ee->InfoID == $sumberinfo){
										echo '<option value="'.$ee->InfoID.'" selected>'.$ee->Nama.'</option>';
									}else{
										echo '<option value="'.$ee->InfoID.'">'.$ee->Nama.'</option>';
									}
								}?>                                    
							</select>
						</div>
						<div class="form-group col-md-8">
							<label class="font-weight-semibold">Sebutkan Nama dan No.HP jika ada yang mereferensikan Anda</label>                                
							<input type="text" class="form-control" id="datapresenter" name="datapresenter" value="<?php echo $sd->Telepon;?>">
						</div>						
					</div>
			
					<div class="row">
						<div class="button-row d-flex mt-8">
							<button class="btn btn-primary ml-auto js-btn-next" id="btn_penerimaan" type="button" onclick="save_aplikan();" title="Next">Selanjutnya <i class="anticon anticon-arrow-right"></i></button>
						</div> 
					</div>	
                </div>	
            </div>
            <!--single form panel-->
            <div class="multisteps-form__panel p-4 rounded bg-white" data-animation="scaleIn">
                <h4 class="multisteps-form__title">Data Pendukung</h3>
                <div class="multisteps-form__content">
                    <form id="data_pribadi">
                        <div class="card">

                                <div class="row mb-2">


                                    <div class="form-group col-md-8">
                                        <label class="font-weight-semibold">Alamat:</label>                                
                                        <input type="text" class="form-control" id="alamatsiswa" name="alamatsiswa" value="<?php echo $sd->Alamat;?>">
                                    </div>


                                  

                                    
                                    <div class="form-group col-md-4">
                                        <label class="font-weight-semibold">Email :</label>                                
                                        <input type="email" class="form-control" value="<?php echo $this->session->userdata('email');?>" id="emailsiswa" name="emailsiswa">
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label class="font-weight-semibold">Telepon:</label>                                
                                        <input type="number" class="form-control" id="telponsiswa" name="telponsiswa" value="<?php echo $sd->Telepon;?>">
                                    </div>


                                    
                                    
                                </div>

                            </div>
                        </div>
                    </form>
                
                </div>
            </div>           
        </div>       
</div>
        
        <?php endforeach;?>
    </div>    
</div>
</div>
      


<!-- Modal -->
<div class="modal fade" id="exampleModalCenter">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Submit Formulir</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <i class="anticon anticon-close"></i>
                </button>
            </div>
            <div class="modal-body">
                

                <div class="alert alert-success" >
                    <h4 class="alert-heading">Apakah data sudah benar?</h4>
                    <p class="m-b-0">Mohon periksa kembali data-data anda, jika sudah benar silakan klik Lanjutkan untuk melakukan pendaftaran.</p>
                    <hr class="m-v-20">
                    <p class="m-b-0">Setalah melakukan submit data tidak bisa diubah kembali, silakan hubungi kontak person jika akan melakukan perubahan data.</p>
                </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-dismiss="modal">Ingin periksa ulang</button>
                <a href="<?php echo base_url();?>user/verify_form/<?php echo $this->uri->segment('3');?>" class="btn btn-danger">Ya, Lanjutkan</a>
            </div>
        </div>
    </div>
</div>

<!-- Content Wrapper END -->

<script src="<?php echo base_url();?>assets/js/form.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>


<script>

var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
  // This function will display the specified tab of the form ...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  // ... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    document.getElementById("nextBtn").innerHTML = "Submit";
  } else {
    document.getElementById("nextBtn").innerHTML = "Next";
  }
  // ... and run a function that displays the correct step indicator:
  fixStepIndicator(n)
}

function nextPrev(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !validateForm()) return false;
  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form... :
  if (currentTab >= x.length) {
    //...the form gets submitted:
    document.getElementById("regForm").submit();
    return false;
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
}

function validateForm() {
  // This function deals with validation of the form fields
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");
  // A loop that checks every input field in the current tab:
  for (i = 0; i < y.length; i++) {
    // If a field is empty...
    if (y[i].value == "") {
      // add an "invalid" class to the field:
      y[i].className += " invalid";
      // and set the current valid status to false:
      valid = false;
    }
  }
  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return valid; // return the valid status
}

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class to the current step:
  x[n].className += " active";
}






    function save_aplikan(){
        var prodi = document.getElementById("prodi").value;
        var sumber = document.getElementById("sumber").value;
        
        var aplikanid = "<?php echo $this->uri->segment('3');?>";

        $.ajax({
            url: "<?php echo base_url();?>JsUser/save_aplikan",
            type : 'post',
            data : {data:data, aplikanid:aplikanid},
            cache: false,
            success: function(msg){
                notif('61de00', 'Perubahan berhasil disimpan', 'fa fa-check-circle');
            },
            beforeSend: function(){
                notif('FFC300', 'Menyimpan perubahan...', 'fa fa-spinner');
            },
            error: function(msg){
                notif('de0000', 'Gagal disimpan', 'fa fa-times-circle');
            }
        });

    }


    function save_data_wali(){   
        var data = JSON.stringify( $('#data_wali').serializeArray());
        var replid = "<?php echo $this->uri->segment('3');?>";
        
        $.ajax({
            url: "<?php echo base_url();?>JsUser/save_data_wali",
            type : 'post',
            data : {data:data, replid:replid},
            cache: false,
            success: function(msg){
                notif('61de00', 'Perubahan berhasil disimpan', 'fa fa-check-circle');
                $("html, body").animate({ scrollTop: 0 }, "slow");
            },
            beforeSend: function(msg){
                notif('FFC300', 'Menyimpan perubahan...', 'fa fa-spinner');
                $("html, body").animate({ scrollTop: 0 }, "slow");
            },
            error: function(msg){
                notif('de0000', 'Gagal disimpan', 'fa fa-circle-exclamation');

            }
        });
    }

    function save_data_pribadi(){

        if ($("#data_pribadi")[0].checkValidity()){
            
            var data = JSON.stringify( $('#data_pribadi').serializeArray());
                var replid = "<?php echo $this->uri->segment('3');?>";
                
                $.ajax({
                    url: "<?php echo base_url();?>JsUser/save_data_pribadi",
                    type : 'post',
                    data : {data:data, replid:replid},
                    cache: false,
                    success: function(msg){
                        notif('61de00', 'Perubahan berhasil disimpan', 'fa fa-check-circle');
                        $("html, body").animate({ scrollTop: 0 }, "slow");
                    },
                    beforeSend: function(msg){
                        notif('FFC300', 'Menyimpan perubahan...', 'fa fa-spinner');
                        $("html, body").animate({ scrollTop: 0 }, "slow");
                    },
                    error: function(msg){
                        notif('de0000', 'Gagal disimpan'+msg, 'fa fa-times-circle');
                    }
                });
                
        }else{
            notif('de0000', 'Data belum lengkap, silakan kembali ke halaman seblumnya', 'fa fa-times-circle');
            $("#data_pribadi")[0].reportValidity()
        }

       
    }

    
    function save_sekolah(){
        var asalsekolah = document.getElementById("asalsekolah").value;
        var noijasah = document.getElementById("noijasah").value;
        var tglijasah = document.getElementById("tglijasah").value;
        var ketsekolah = document.getElementById("ketsekolah").value;
        var darah = document.getElementById("darah").value;
        
        var replid = "<?php echo $this->uri->segment('3');?>";

        $.ajax({
            url: "<?php echo base_url();?>JsUser/save_sekolah",
            type : 'post',
            data : {replid:replid,asalsekolah:asalsekolah,noijasah:noijasah,tglijasah:tglijasah,ketsekolah:ketsekolah, darah:darah, berat:berat, tinggi:tinggi, kesehatan:kesehatan},
            cache: false,
            success: function(msg){
                notif('61de00', 'Perubahan berhasil disimpan', 'fa fa-check-circle');
                $("html, body").animate({ scrollTop: 0 }, "slow");
            },
            beforeSend: function(){
                notif('FFC300', 'Menyimpan perubahan...', 'fa fa-spinner');
                $("html, body").animate({ scrollTop: 0 }, "slow");
            },
            error: function(msg){
                notif('de0000', 'Gagal disimpan', 'fa fa-times-circle');
            }
        });

    }


   d = function(){
        document.getElementById("btn_penerimaan").disabled = true; 
        
        select_prodi(document.getElementById("prodi").value);
        select_sumber(document.getElementById("sumber").value);
    };


    function notif(color, msg, icon){

        const notyf = new Notyf({
            duration: 6000,
            position: {
                x: 'right',
                y: 'top',
            },
            types: [
                {
                    type: 'info',
                    background: '#'+color,
                    icon: {
                        className: icon,
                        tagName: 'span',
                        color: '#fff'
                    },
                    dismissible: false
                }
            ]
        });

        notyf.open({
            type: 'info',
            message: msg
        });

        }

</script>