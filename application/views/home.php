

    <!---->
    <!---->
    <section id="ormawa" class="section-padding wow fadeInUp delay-05s" style="background-color: #f3f3f3">

      <div class="container">
        <div class="row" style="margin-bottom: 30px;">
          <div class="col-md-12 text-center">
            <h2 class="service-title pad-bt15">Organisasi Mahasiswa</h2>
            <!-- <p class="sub-title pad-bt15"></p> -->
            <hr class="bottom-line">
          </div>
          <?php foreach ($himpunan->result_array() as $i):
            $nama_himpunan = $i['nama_himpunan'];
            $kode_himpunan = $i['kode_himpunan'];
            $deskripsi = $i['desc_himpunan'];
            $image = $i['image'];
          ?>
          <?php if($kode_himpunan == 'SEMAU' || $kode_himpunan == 'DEMAU')
             {?>
                <div class="col-md-6 col-sm-12 col-xs-12">
            <div class="kotakb" style="margin-left: 20;">
              <div class="service-item">
                <a href="<?php echo base_url().'c_home/himpunan/'.$kode_himpunan.'';?>">
                  <img src="<?php echo base_url('assets/img/jurusan/').$image;?>" style="width:100px;height:100px; margin: 10px;">
                  <h3><?php echo $nama_himpunan;?></h3>
                  <p><?php echo $deskripsi;?></p>
                </a>
              </div>
            </div>
          </div>
            <?php } else {?>
            <?php } ?>
          <?php endforeach ?>
          <br>
          <br>
        </div>

        <div class="row" style="margin-bottom: 30px;">
          <?php $id=1; foreach($fakultas as $fak){ ?>
            <div class="col-md-4 col-sm-12 col-xs-12">
            <div class="service-item">
              <div class="kotakb">
                <a href="<?php echo base_url().'c_home/fakultas/'.$fak->kode_fakultas.'';?>">
                  <h3><span><?php echo $fak->kode_fakultas ?></span></h3>
                  <p><?php echo $fak->nama_fakultas ?></p>
                </a>
              </div>
            </div>
          </div>
          <?php } ?>
        </div>
      </div>
    </section>
    <!---->
    <!---->
    <!---->
    <!---->
     <section id="ukm" class="section-padding wow fadeInUp delay-05s">
      <div class="container" style="margin-top: 50px;">
        <div class="row">
          <div class="col-md-12 text-center">
            <h2 class="service-title pad-bt15">UKM & UKK</h2>
            <p class="sub-title pad-bt15">Unit Kegiatan Mahasiswa & Unit Kegiatan Khusus</p>
            <hr class="bottom-line">
          </div>
          <?php foreach ($semua_ukmukk->result_array() as $u):
            $kode_ukmukk = $u['kode_ukmukk'];
            $nama_ukmukk = $u['nama_ukmukk'];
            $desc_ukmukk = $u['desc_ukmukk'];
            $image = $u['image'];
          ?>
            <div class="col-md-4 col-sm-6 col-xs-12 portfolio-item padding-right-zero mr-btn-15">
            <figure>
              <a href="<?php echo base_url().'c_home/ukmaja/'.$kode_ukmukk;?>">
                <img src="<?php echo base_url('assets/img/ukmukk/'.$image.'')?>" style="width: 500px; height: 250px;" class="img-responsive">
                <figcaption>
                  <h2><?php echo $nama_ukmukk ?></h2>
                  <p><?php echo $desc_ukmukk ?></p>
                </figcaption>
              </a>
            </figure>
          </div>
          <?php endforeach ?>

          
          

        </div>
    </section>
    <!---->
    <!---->
    <section class="section-padding wow fadeInUp delay-05s" style="background-color: #f3f3f3">
    <div class="row">
      <div class="col-md-12 text-center">
            <h2 class="service-title pad-bt15">Daftar Kegiatan</h2>
            <p class="sub-title pad-bt15">Kegiatan Organisasi Mahasiswa</p>
            <hr class="bottom-line">
      </div>
      <?php 
            foreach($kegiatan->result_array() as $i):
            $Parent_himpunan=$i['Parent_himpunan'];
            $start_date=$i['start_date'];
            $end_date=$i['end_date'];
            $nama_kegiatan=$i['nama_kegiatan'];
            $image=$i['image'];
          ?>
            <div class="col-md-4 col-sm-6 col-xs-12 portfolio-item padding-right-zero mr-btn-15">
            <figure>              
                <img src="<?php echo base_url('assets/img/kegiatan/'.$image.'')?>" style="width: 500px; height: 250px;" class="img-responsive">
                <figcaption>
                  <h2><?php echo $Parent_himpunan ?></h2>
                  <h2><?php echo $nama_kegiatan ?></h2>
                  <p><?php echo p_bulanindo($start_date) ?> s/d <?php echo p_bulanindo($end_date) ?></p>                  
                </figcaption>
            
            </figure>
          </div>
          <?php endforeach ?>

    </div>
    <div class="row">
      <div class="col-md-12 text-center">            
            <p class="sub-title pad-bt15">Kegiatan UKM dan UKK</p>
            <hr class="bottom-line">
      </div>
      <?php 
            foreach($kegiatan_ukmukk->result_array() as $i):
            $parent_ukmukk=$i['parent_ukmukk'];
            $ustart_date=$i['ustart_date'];
            $uend_date=$i['uend_date'];
            $nama_ukegiatan=$i['nama_ukegiatan'];
            $image=$i['image'];
          ?>
            <div class="col-md-4 col-sm-6 col-xs-12 portfolio-item padding-right-zero mr-btn-15">
            <figure>              
                <img src="<?php echo base_url('assets/img/kegiatan/'.$image.'')?>" style="width: 500px; height: 250px;" class="img-responsive">
                <figcaption>
                  <h2><?php echo $parent_ukmukk ?></h2>
                  <h2><?php echo $nama_ukegiatan ?></h2>
                  <p><?php echo p_bulanindo($ustart_date) ?> s/d <?php echo p_bulanindo($uend_date) ?></p>                  
                </figcaption>
            
            </figure>
          </div>
          <?php endforeach ?>

    </div>
    </section>
 
 
    <!---->
    <section id="aulasc" class="section-padding wow fadeInUp delay-05s">
			<div class="container">
				<div class="row">
					<div class="col-md-12 text-center">
						<h2 class="service-title pad-bt15">Peminjaman Aula Student Center</h2>
						<p class="sub-title pad-bt15">Aula yang terletak di Lt.1 Student Center biasa digunakan untuk kegiatan
							mahasiswa.</p>
						<hr class="bottom-line">
					</div>
					<div id="calendar" style="max-width: 800px;margin: 2rem auto;padding: 0 5px">

						<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.3.2/main.min.js"></script>
						<script type="text/javascript"
							src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/4.0.0-alpha.4/plugins/gcal.js"></script>
						<link href="<?= base_url().'assets/js/fullcalendarjs/main.min.css'?>" rel="stylesheet" type="text/css">
						<script src="<?= base_url().'assets/js/fullcalendarjs/main.js' ?>" type="text/javascript" />
						</script>
						<script src="<?= base_url().'assets/js/fullcalendarjs/locales-all.js' ?>" type="text/javascript"></script>
						<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment-with-locales.min.js"
							integrity="sha512-LGXaggshOkD/at6PFNcp2V2unf9LzFq6LE+sChH7ceMTDP0g2kn6Vxwgg7wkPP7AAtX+lmPqPdxB47A0Nz0cMQ=="
							crossorigin="anonymous"></script>

						<script>
							document.addEventListener('DOMContentLoaded', function () {
								var initialLocaleCode = 'id';
								var localeSelectorEl = document.getElementById('locale-selector');
								var calendarEl = document.getElementById('calendar');
								var calendar = new FullCalendar.Calendar(calendarEl, {
									headerToolbar: {
										left: 'prev,next today',
										center: 'title',
										right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
									},
									// startEditable:true,
									allDayDefault: true,
									locale: initialLocaleCode,
									buttonIcons: false, // show the prev/next text
									weekNumbers: true,
									navLinks: true, // can click day/week names to navigate views
									editable: true,
									dayMaxEvents: true, // allow "more" link when too many events
									eventSources: [{
										url: "<?php echo base_url('ormawa/getEvents');?>"
									}]
								});

								calendar.getEventSources();
								calendar.render();

								// build the locale selector's options
								calendar.getAvailableLocaleCodes().forEach(function (localeCode) {
									var optionEl = document.createElement('option');
									optionEl.value = localeCode;
									optionEl.selected = localeCode == initialLocaleCode;
									optionEl.innerText = localeCode;
									localeSelectorEl.appendChild(optionEl);
								});

								// when the selected option changes, dynamically change the calendar option
								localeSelectorEl.addEventListener('change', function () {
									if (this.value) {
										calendar.setOption('locale', this.value);
									}
								});
							});

						</script>
					</div>
					<div class="col-4 col-12-medium">
						<b>Keterangan</b>
						<br><br>
						<div class="ket" style="display:flex;">
							<div class="boxaulaA"
								style="padding-top:5px;width:20px;height:20px;background:#0000ff; display:flex; padding-right:5px;">
							</div>
							&nbsp;&nbsp;&nbsp;Aula A
						</div>
						<br>
						<div class="ket" style="display:flex;">
							<div class="boxaulaA" style="width:20px;height:20px;background:#800080; display:flex;"></div>
							&nbsp;&nbsp;&nbsp;Aula B
						</div>
					</div>
					
				</div>
			</div>
		</section>
    <!---->

   