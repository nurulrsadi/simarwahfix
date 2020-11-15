<!-- FOOTER -->
    <footer>
      <div class="footer" id="footer">
        <div class="container">
          <div class="row">         
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
              <h3 style="color: #62c462">AKSES CEPAT</h3>
              <ul>
                <li>
                  <h5><a href="https://salam.uinsgd.ac.id/portal/salam/">Sistem Administrasi Layanan Akademik</a></h5>
                </li>
                <li>
                  <h5><a href="https://sip.uinsgd.ac.id/sip_module/">Sistem Informasi Pegawai</a></h5>
                </li>
                <li>
                  <h5><a href="https://eknows.uinsgd.ac.id/">E-learning</a></h5>
                </li>
                <li>
                  <h5><a href="https://lib.uinsgd.ac.id/">Perpustakaan</a></h5>
                </li>
                <li>
                  <h5><a href="https://karir.uinsgd.ac.id/">Pusat Karir</a></h5>
                </li>
                <li>
                  <h5><a href="https://kemahasiswaan.uinsgd.ac.id/">Kemahasiswaan</a></h5>
                </li>
              </ul>
            </div>
            <div class="col-lg-3 col-sm-3 col-xs-3">
              <ul>
                <li>
                  <h3 style="color: #62c462">FAKULTAS</h3>
                </li>
                <?php foreach ($fakultasfooter as $i):
                 
                ?>
                <li>
                  <h5><a href="<?php echo base_url().'c_home/fakultas/'.$i->kode_fakultas.'';?>"><?php echo $i->nama_fakultas ?></a></h5>
                </li>                  
                <?php endforeach ?>
                
                
              </ul>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
              <h3 style="color: #62c462">MEDIA SOSIAL</h3> 
              <div style="margin-left: 25px; margin-bottom: 40px;">                             
                <a href="https://web.facebook.com/uinsunangunungdjatibandung/?_rdc=1&_rdr" class="fa fa-facebook"></a>
                <a href="https://twitter.com/uinbdg_official" class="fa fa-twitter"></a>
                <a href="https://www.instagram.com/uinbandungofficial/" class="fa fa-instagram"></a>
                <a href="https://www.youtube.com/channel/UCEeGdjh7dfuAJUQAQCq1ZQA" class="fa fa-youtube-play"></a>           
              </div>
              <img src="<?php echo base_url('assets/img/uinlogo.png')?>" style="width:110px;height:160px; margin: auto;">
                
              
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                <li>
                  <h3 style="margin-bottom: 5px; color: #62c462">Kampus 1</h3>
                  <a>Jalan A.H. Nasution No. 105, Cipadung, Cibiru, Kota Bandung, Jawa Barat 40614</a>
                </li>
                 <li>
                  <h3 style="margin-bottom: 5px; color: #62c462">Kampus 2</h3>
                  <a>Jalan Cimencrang, Panyileukan, Cimencrang, Gedebage, Kota Bandung, Jawa Barat 40292</a>
                </li>
                 <li>
                  <h3 style="margin-bottom: 5px; color: #62c462">Kampus 3</h3>
                  <a>Jalan Cileunyi Kabupaten Bandung, Jawa Barat 40292</a>
                </li>
                
            </div>

            
          </div>
        </div>
      </div>
    </footer>
    <!---->
    <!---->
  </div>
  <script src="<?php echo base_url('assets/js/simarwahjquery.min.js')?>"></script>
  <script src="<?php echo base_url('assets/js/simarwahjquery.easing.min.js')?>"></script>
  <script src="<?php echo base_url('assets/js/simarwahbootstrap.min.js')?>"></script>
  <script src="<?php echo base_url('assets/js/simarwahwow.js')?>"></script>
  <script src="<?php echo base_url('assets/js/simarwah/jquery.bxslider.min.js')?>"></script>
  <script src="<?php echo base_url('assets/js/simarwahcustom.js')?>"></script>
  <script src="<?php echo base_url('contactform/contactform.js')?>"></script>
  </body>

</html>