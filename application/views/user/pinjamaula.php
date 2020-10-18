</header>
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.3.2/main.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/4.0.0-alpha.4/plugins/gcal.js"></script>
<link href="<?= base_url().'assets/js/fullcalendarjs/main.min.css'?>" rel="stylesheet" type="text/css">
<script src="<?= base_url().'assets/js/fullcalendarjs/main.js' ?>"type="text/javascript"/></script>
<script src="<?= base_url().'assets/js/fullcalendarjs/locales-all.js' ?>" type="text/javascript"></script>
<!-- Button trigger modal -->
<button type="button" class="button primary" data-toggle="modal" data-target="#exampleModal">
  Sewa Aula SC
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Sewa Aula Student Center</h4>
        </button>
      </div>
      <div class="modal-body">
      <form method="post" action="#">
      <div class="form-group">
      <input class="form-control" name="penyewa" id="penyewa" type="text" value="Nama Penyewa" readonly>
      </div>
      <div class="form-group">
      <label for="Keterangan">Nama Acara</label>
      <input type="text" name="Keterangan-name" id="Keterangan" value=""
                      placeholder="Nama Acara" />
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
        <label for="exampleFormControlSelect1">Aula Student Center</label>
        <select class="form-control" id="exampleFormControlSelect1">
          <option value="">- Aula -</option>
          <option value="blue">Aula A</option>
          <option value="purple">Aula B</option>
        </select>
      </div>
      <div class="row form-group">
        <div class="form-group col-md-6">
          <label for="inputEmail4">Mulai Tanggal</label>
          <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
        </div>
        <div class="form-group col-md-6">
          <label for="inputPassword4">Akhir Tanggal</label>
          <input type="text" class="form-control" id="inputPassword4" placeholder="Password">
        </div>
      </div>
      <div class="row form-group">
        <div class="form-group col-md-6">
          <label for="inputEmail4">Mulai Pukul</label>
          <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
        </div>
        <div class="form-group col-md-6">
          <label for="inputPassword4">Akhir Pukul</label>
          <input type="text" class="form-control" id="inputPassword4" placeholder="Password">
        </div>
      </div>
      <div class="form-group">
      <label for="nama_pj">Nama Penanggung Jawab</label>
      <input type="text" name="nama_pj" id="nama_pj" value=""
                      placeholder="" required/>
      </div>
      <div class="form-group">
      <label for="no_pj">No Penanggung Jawab</label>
      <input type="text" name="no_pj" id="no_pj" value=""
                      placeholder="" required/>
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="button" data-dismiss="modal">Tutup</button>
        <button type="submit" class="button primary">Kirim</button>
      </div>
    </div>
  </div>
</div>
</form>
<div id="calendar"></div>





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
      initialDate: '2020-09-12',
      locale: initialLocaleCode,
      buttonIcons: false, // show the prev/next text
      weekNumbers: true,
      navLinks: true, // can click day/week names to navigate views
      editable: true,
      dayMaxEvents: true, // allow "more" link when too many events
      events: [
        {
        title: 'All Day Event',
        start: '2020-09-01',
        color:'purple'
        },
        {
          title: 'Long Event',
          start: '2020-09-07',
          end: '2020-09-10',
          color:'purple'
        },
        {
        title: 'All Day Event',
        start: '2020-09-01',
        color:'red'
        },
        {
          title: 'Long Event',
          start: '2020-09-07',
          end: '2020-09-10',
          color:'blue'
        }
      ]
    });

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


</div>
</div>
