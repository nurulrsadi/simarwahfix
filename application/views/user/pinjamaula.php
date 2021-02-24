</header>
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.3.2/main.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/4.0.0-alpha.4/plugins/gcal.js"></script>
<link href="<?= base_url().'assets/js/fullcalendarjs/main.min.css'?>" rel="stylesheet" type="text/css">
<script src="<?= base_url().'assets/js/fullcalendarjs/main.js' ?>"type="text/javascript"/></script>
<script src="<?= base_url().'assets/js/fullcalendarjs/locales-all.js' ?>" type="text/javascript"></script>
<!-- Button trigger modal -->
<?php if( $this->session->userdata('statususer') >=2 && $this->session->userdata('role') == 0 || $this->session->userdata('role') ==2) :?>

<table class="content-table">
	<thead>
		<tr>
			<th>No</th>
			<th>Peminjam</th>
			<th>Nama Kegiatan</th>
			<th>Jenis Aula</th>
			<th>Mulai Tanggal Pinjam</th>
			<th>Cetak surat izin aula</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<?php $j=1;?>
			<?php foreach($userpdf->result_array() as $i ):
        $penyewa=$i['penyewa'];
        $Keterangan=$i['Keterangan'];
        $id_sewa=$i['id_sewa'];
        $jenis_aula=$i['keterangan'];
        $tanggal_sewa=$i['dari'];
        $akhir_sewa=$i['hingga'];
      ?>
			<td><?= $j++; ?></td>
			<td><?= $penyewa; ?></td>
			<td><?= $Keterangan; ?></td>
			<td><?= $jenis_aula; ?></td>
			<td><?= longdate_indo($tanggal_sewa);?></td>
			<td>
				<a href="<?= base_url('c_user/Cetak_Sewa_Aula/'.$id_sewa.'/'.$penyewa.'/'.$Keterangan)?>" target="_blank"
					class="btn btn-default"><i class="fa fa-print"></i> Cetak</a>
			</td>
		</tr>
		<?php endforeach;?>
	</tbody>
</table>


<?php foreach($userlogin->result_array() as $i ):
  $user_login=$i['kode_himp'];
  $id_user=$i['id_user'];
?>
<br>

<?php endforeach;?>
<div class="row gtr-200">
  <div class="col-4 col-12-medium">
    <?php 
    $datenow = date('Y-m-d');
    $attStat = $this->session->userdata("kode_himp_sess");
    $query = "SELECT * FROM tb_sewaaula WHERE penyewa='$attStat' AND hingga >='$datenow' ";
    $check = $this->db->query($query);
    if($check->num_rows()==0){?>
    <button type="button" class="button primary" data-toggle="modal" data-target="#exampleModal">
        Sewa Aula SC
        </button>
    <?php }?>
  </div>
  <div class="col-4 col-12-medium">
  </div>
  <div class="col-4 col-12-medium">
    <b>Keterangan</b>
    <br><br>
      <div class="ket" style="display:flex;">
        <div class="boxaulaA" style="padding-top:5px;width:20px;height:20px;background:#0000ff; display:flex; padding-right:5px;"></div>&nbsp;&nbsp;&nbsp;Aula A
      </div>
      <br>
      <div class="ket" style="display:flex;">
        <div class="boxaulaA" style="width:20px;height:20px;background:#800080; display:flex;"></div>&nbsp;&nbsp;&nbsp;Aula B
      </div>
  </div>
</div>
  <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="exampleModalLabel">Sewa Aula Student Center</h4>
            </button>
          </div>
          <div class="modal-body">
          <form method="post" action="<?php echo base_url().'ormawa/do_sewa';?>" enctype="multipart/form-data" >
          <div class="form-group">
          <input type="hidden" name="id_user" value="<?= $id_user?>">
          <input class="form-control" name="penyewa" id="penyewa" type="text" value="<?= $user_login?>"required readonly>
          </div>
          <div class="form-group">
          <label for="Keterangan">Nama Acara</label>
          <input type="text" name="Keterangan" id="Keterangan" value=""
                          placeholder="Nama Acara"  autocomplete="off" required/>
          </div>
          <div class="form-group">
          <label for="no_surat">No Surat Permohonan Izin</label>
          <input type="text" name="no_surat" id="no_surat" value=""
                          placeholder="no_surat"  autocomplete="off" required/>
          </div>
          <div class="form-group">
          <label for="surat_sewa">Surat Permohanan Izin </label><br>
          <div class="file-upload-custom">
                <input class="file-upload__input-custom" type="file" value="" name="surat_sewa" id="surat_sewa"
                  accept="application/pdf" required>
                <button class="file-upload__button-custom" type="button">Choose A
                  File</button>
                <span class="file-upload__label-custom"></span>
              </div>
          </div>
          <div class="form-group form-row">
            <label for="jenisaula">Aula Student Center</label>
            <select class="form-control" id="jenisaula" name="jenisaula"  required>
              <option>- Aula -</option>
              <option value="blue">Aula A</option>
              <option value="purple">Aula B</option>
            </select>
          </div>
          <div class="row form-group">
            <div class="form-group col-md-6">
              <label for="dari">Mulai Tanggal</label>
              <input type="date" class="form-control" id="dari"  name="dari"  autocomplete="off" required>
            </div>
            <div class="form-group col-md-6">
              <label for="hingga">Akhir Tanggal</label>
              <input type="date" name="hingga" class="form-control" id="hingga" autocomplete="off" required>
            </div>
          </div>
          <div class="row form-group">
            <div class="form-group col-md-6">
              <label for="mulaipukul">Mulai Pukul</label>
              <input type="time" name="mulaipukul" class="form-control" id="mulaipukul"  autocomplete="off" required>
            </div>
            <div class="form-group col-md-6">
              <label for="akhirpukul">Akhir Pukul</label>
              <input type="time" class="form-control" id="akhirpukul" name="akhirpukul"  autocomplete="off" required>
            </div>
          </div>
          <div class="form-group">
          <label for="nama_pj">Nama Penanggung Jawab</label>
          <input type="text" name="nama_pj" id="nama_pj" value=""
                          placeholder="Nama ketua acara" required  autocomplete="off"/>
          </div>
          <div class="form-group">
          <label for="no_pj">No Penanggung Jawab</label>
          <input type="text" name="no_pj" id="no_pj"  min="10" max="11" value=""
                          placeholder="08xxx" required  autocomplete="off"/>
          </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="button" data-dismiss="modal">Tutup</button>
            <button type="submit" class="button primary">Kirim</button>
          </div>
        </div>
      </div>
    </div>
<div id="calendar">

</div>

<?php elseif($user['statususer'] ==1 && $user['role']==0 ) :?>
  <section>
	<header class="main">
		<!-- <h1>Pagu Keuangan</h1> -->
  </header>
  <br>
  <center>
  <h2>Hei!</h2>
    <h4>Silahkan update profile untuk dapat mengakses menu ini</h4>
  </br><br>
  </center>
  </section>
  <?php elseif($user['statususer'] ==1 && $user['role']==2 ) :?>
  <section>
	<header class="main">
		<!-- <h1>Pagu Keuangan</h1> -->
  </header>
  <br>
  <center>
  <h2>Hei!</h2>
    <h4>Silahkan update profile untuk dapat mengakses menu ini</h4>
  </br><br>
  </center>
  </section>
<?php else: ?>
  <section>
	<header class="main">
		<!-- <h1>Pagu Keuangan</h1> -->
  </header>
  <br>
  <center>
    <h2>Terima kasih telah melakukan update profile!</h2>
      <h4>Silahkan melakukan logout dan login kembali untuk meakses menu ini</h4>
    </br><br>
  </center>
  </section>
<?php endif;?>

</div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment-with-locales.min.js" integrity="sha512-LGXaggshOkD/at6PFNcp2V2unf9LzFq6LE+sChH7ceMTDP0g2kn6Vxwgg7wkPP7AAtX+lmPqPdxB47A0Nz0cMQ==" crossorigin="anonymous"></script>

  <!-- <script ></script> -->
	<!-- <script>
  function debug() {
		document.querySelector('#debug').textContent = JSON.stringify(calendar.get(), null, 4)
	}

  </script> -->
<script>
document.addEventListener('DOMContentLoaded', function() {
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
      allDayDefault:true,
      locale: initialLocaleCode,
      buttonIcons: false, // show the prev/next text
      weekNumbers: true,
      navLinks: true, // can click day/week names to navigate views
      editable: true,
      dayMaxEvents: true, // allow "more" link when too many events
      eventSources: [{
        url : "<?php echo base_url('ormawa/getEvents');?>"
      }]
        });
        
    calendar.getEventSources();
    calendar.render();

    // build the locale selector's options
    calendar.getAvailableLocaleCodes().forEach(function(localeCode) {
      var optionEl = document.createElement('option');
      optionEl.value = localeCode;
      optionEl.selected = localeCode == initialLocaleCode;
      optionEl.innerText = localeCode;
      localeSelectorEl.appendChild(optionEl);
    });

    // when the selected option changes, dynamically change the calendar option
    localeSelectorEl.addEventListener('change', function() {
      if (this.value) {
        calendar.setOption('locale', this.value);
      }
    });
  });
</script>
  <style>
  #top {
    background: #eee;
    border-bottom: 1px solid #ddd;
    padding: 0 10px;
    line-height: 40px;
    font-size: 12px;
  }

  #calendar {
    max-width: 1100px;
    margin: 40px auto;
    padding: 0 10px;
  }
  </style>
