    <link href="<?php echo base_url().'assets/css/bootstrap.css'?>" rel="stylesheet">
    <link href="<?php echo base_url().'assets/css/usermain.css' ?>" rel="stylesheet"/>
    <link href="<?php echo base_url('assets/css/all.min.css') ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url('assets/css/dataTables.bootstrap4.min.css') ?>" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap-datepicker3.standalone.css')?>"/>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap-datepicker3.standalone.css.map')?>"/>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap-datepicker3.standalone.min.css')?>"/>
    </header>


    <section>
      <header class="main">
      </header>
      <?php 
        $data=$this->session->flashdata('sukses');
        if($data!=""){ ?>
          <div id="notifikasi" class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Sukses! </strong> <?=$data;?></div>
        <?php } ?>

        <?php 
        $data2=$this->session->flashdata('error');
        if($data2!=""){ ?>
          <div id="notifikasi" class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button><strong> Error! </strong> <?=$data2;?></div>
        <?php } ?>
      <div class="features">
        
        <article>
          <div class="content">
           <h2>HI, <?php echo strtoupper($this->session->userdata('nama')) ?> !</h2>
           <p>Anda diharuskan Update Profile terlebih dahulu agar dapat melakukan akses ke menu lainnya.</p>
         </div>
       </article>
       <article>                              
        <div class="content">
          <?php if ($this->session->userdata('role') == 0) { ?>
           <?php foreach ($datahimpunan ->result_array() as $u): 
            $kode_himpunan=$u['kode_himpunan'];
            $image=$u['image'];
            ?>
            <br>
            <center>
              <img src="<?php echo base_url('assets/img/jurusan/'.$image.'')?>" class="img-fluid" alt="Responsive image" width="100%" style="width: 50%; height: 50%; ">
            </center>
            <center>
              <a class="btn btn-success" style="margin-left: 50px; margin-top: 10px;" href="" data-toggle="modal" data-target="#modal_edit_foto_hmj" >Update Foto</a>
            </center>
          <?php endforeach ?>                              
        <?php  } elseif($this->session->userdata('role') == 2){ ?>
          <?php foreach ($dataukmukk ->result_array() as $u): 
            $kode_ukmukk=$u['kode_ukmukk'];
            $image=$u['image'];
            ?>
            <br>
            <center>
              <img src="<?php echo base_url('assets/img/ukmukk/'.$image.'')?>" class="img-fluid" alt="Responsive image" width="100%" style="width: 50%; height: 50%; ">
            </center>
            <center>
              <a class="btn btn-success justify-content-end" style="margin-left: 50px; margin-top: 10px;" href="" data-toggle="modal" data-target="#modal_edit_foto_ukm" >Update Foto</a>
            </center>
          <?php endforeach ?>  
        <?php  } else{?>
        <?php  } ?>
        
        
      </div>
      
      
    </article>
    </div>

    <?php if($this->session->userdata('role') == 0):?>
      <?php
      foreach($datahimpunan->result_array() as $i):
        $kode_himpunan=$i['kode_himpunan'];
        $nama_himpunan=$i['nama_himpunan'];
        $deskripsi=$i['desc_himpunan'];
        $visi=$i['visi'];
        $misi=$i['misi'];

        ?>
        <center>
          <div class="col-md-12">
            <h1><?php echo $kode_himpunan?></h1>   
            <h3><?php echo $deskripsi?></h3>    
          </div>
        </center>
        <hr>
        <div class="features">
          <article>
            <div class="content">
              <center>
                <h3>Visi</h3>                                      
              </center>
              <p><?php echo $visi?></p>
            </div>
          </article>
          <article>
            <div class="content">
              <center>
                <h3>Misi</h3>                                      
              </center>
              <p><?php echo $misi?></p>
            </div>
          </article>
        </div>
      <?php endforeach;?>

      <?php elseif($this->session->userdata('role') == 2):?>
        <?php
        foreach($dataukmukk->result_array() as $i):
          $kode_ukmukk=$i['kode_ukmukk'];
          $nama_ukmukk=$i['nama_ukmukk'];
          $desc_ukmukk=$i['desc_ukmukk'];
          $visi_ukmukk=$i['visi_ukmukk'];
          $misi_ukmukk=$i['misi_ukmukk'];
          ?>
          <center>
            <div class="col-md-12">
              <h1><?php echo $nama_ukmukk?></h1>   
              <h3><?php echo $desc_ukmukk?></h3>    
            </div>
          </center>
          <hr>
          <div class="features">
            <article>
              <div class="content">
                <center>
                  <h3>Visi</h3>                                     
                </center>
                <p><?php echo $visi_ukmukk?></p>
              </div>
            </article>
            <article>
              <div class="content">
                <center>
                  <h3>Misi</h3>                                      
                </center>
                <p><?php echo $misi_ukmukk?></p>
              </div>
            </article>
          </div>
        <?php endforeach;?>    
        <?php else:?>
          
        <?php endif;?>

        <?php if($this->session->userdata('role') == 0):?>
          <a class="btn btn-success" href="" data-toggle="modal" data-target="#modal_add_visimisi" >Update Visi Misi Himpunan</a>
          <a class="btn btn-success" href="" data-toggle="modal" data-target="#modal_add_bidang" >Tambah Bidang</a>
          <a class="btn btn-success" href="" data-toggle="modal" data-target="#modal_add_new" >Tambah Data Anggota</a>
          
          <?php elseif($this->session->userdata('role') == 2):?>
            <a class="btn btn-success" href="" data-toggle="modal" data-target="#modal_add_visimisi_ukmukk" >Update Visi Misi UKM UKK</a>
            <a class="btn btn-success" href="" data-toggle="modal" data-target="#modal_add_bidang_ukmukk" >Tambah Bidang</a>
            <a class="btn btn-success" href="" data-toggle="modal" data-target="#modal_add_anggota_ukmukk" >Tambah Data Anggota</a>
            
            <?php else:?>
              
            <?php endif;?>

            
            <?php if($this->session->userdata('role') == 0):?>
              <a class="btn btn-success" href="" data-toggle="modal" data-target="#modal_update_mhsaktif" >Update Jumlah Mahasiswa Aktif</a>
              <a class="btn btn-success" href="<?php echo base_url('c_home/himpunan/'.$kode_himpunan); ?>" target="_blank" data-toggle="" data-target="" >Lihat Profil <?php echo $kode_himpunan;?> </a>    
              

              <?php elseif($this->session->userdata('role') == 2):?>
                <a class="btn btn-success" href="" data-toggle="modal" data-target="#modal_update_umhsaktif" >Update Jumlah Mahasiswa Aktif</a>
                <a class="btn btn-success" href="<?php echo base_url('c_home/ukmaja/'.$kode_ukmukk); ?>" target="_blank" data-toggle="" data-target="" >Lihat Profil <?php echo $nama_ukmukk;?> </a>       
                <?php else:?>
                  
                <?php endif;?>
                

                <!-- <button type="button" class="btn" data-toggle="modal" data-target="#modal_add_new">Tambah Data Anggota</button> -->
                <br>
                <br>
                <?php if($this->session->userdata('role') == 0):?>
                 <div><h5>Daftar Bidang</h5></div>
                 <div class="card card-body">
                  <div class="table-responsive">
                    <table class="content-table" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <!-- <th><center>No</center></th> -->
                          <th>Kode Bidang</th>
                          <th>Label</th>
                          <th>Nama Bidang</th>
                          <th>Kode Himpunan</th>
                          <th>Logo</th>
                          <th><center>Aksi</center></th>
                        </tr>
                      </thead>
                      <!-- sampai sini back -->
                      <?php
                      foreach($bidangbidang->result_array() as $i):
                        $kode=$i['kode_bidang'];
                        $label=$i['label_bidang'];
                        $nama=$i['desc_bidang'];
                        $himpunan=$i['parent_himpunan'];
                        $logo=$i['image'];
                        ?>
                        <tbody>
                          <tr>
                            <!-- <td><center><?php echo $no++ ?></center></td> -->
                            <td><?php echo $kode ?></td>
                            <td><?php echo $label ?></td>
                            <td><?php echo $nama ?></td>
                            <td><?php echo $himpunan ?></td>
                            <td>
                              <img width="100" height="100" src="<?php echo base_url('assets/img/bidang/').$logo?>">
                            </td>
                            <td><center>
                              <a class="btn btn-warning" data-toggle="modal" data-target="#modal_update_bidang<?php echo $kode;?>"><i class="far fa-edit"></i></a>
                              <a class="btn btn-danger" data-toggle="modal" data-target="#modal_delete_bidang<?php echo $kode;?>"><i class="far fa-trash-alt"></i></a>
                            </center>
                          </td>
                        </tr>
                      </tbody>
                    <?php endforeach;?>
                  </table>        
                </div>
                
              </div> 

              <?php elseif($this->session->userdata('role') == 2):?>
                <div><h5>Daftar Bidang</h5></div>
                <div class="card card-body">
                  <div class="table-responsive">
                    <table class="content-table" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <!-- <th><center>No</center></th> -->
                          <th>Kode Bidang</th>
                          <th>Label</th>
                          <th>Nama Bidang</th>
                          <th>Kode UKM/UKK</th>
                          <th>Logo</th>
                          <th><center>Aksi</center></th>
                        </tr>
                      </thead>
                      <!-- sampai sini back -->
                      <?php
                      foreach($bidang_ukmukk->result_array() as $i):
                        $kode_ubidang=$i['kode_ubidang'];
                        $label_ubidang=$i['label_ubidang'];
                        $desc_ubidang=$i['desc_ubidang'];
                        $logo=$i['image'];
                        $parent_ukmukk=$i['parent_ukmukk'];
                        ?>
                        <tbody>
                          <tr>
                            <!-- <td><center><?php echo $no++ ?></center></td> -->
                            <td><?php echo $kode_ubidang ?></td>
                            <td><?php echo $label_ubidang ?></td>
                            <td><?php echo $desc_ubidang ?></td>
                            <td><?php echo $parent_ukmukk ?></td>
                            <td>
                              <img width="100" height="100" src="<?php echo base_url('assets/img/bidang/').$logo?>">
                            </td>
                            <td><center>
                              <a class="btn btn-warning" data-toggle="modal" data-target="#modal_update_bidang_ukmukk<?php echo $kode_ubidang;?>"><i class="far fa-edit"></i></a>
                              <a class="btn btn-danger" data-toggle="modal" data-target="#modal_delete_bidang_ukmukk<?php echo $kode_ubidang;?>"><i class="far fa-trash-alt"></i></a>
                            </center>
                          </td>
                        </tr>
                      </tbody>
                    <?php endforeach;?>
                  </table>        
                </div>
                
              </div>       
              <?php else:?>
                
              <?php endif;?>

              <?php if($this->session->userdata('role') == 0):?>
                <div><h5>Anggota Himpunan</h5></div>
                <div class="card card-body">
                  <div class="table-responsive">
                    <table class="content-table" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <!-- <th><center>No</center></th> -->
                          <th>Nama</th>
                          <th>NIM</th>
                          <th>Himpunan</th>
                          <th>Bidang</th>
                          <th>Jabatan</th>
                          <th><center>Aksi</center></th>
                        </tr>
                      </thead>
                      <!-- sampai sini back -->
                      <?php 
                      foreach($anggota->result_array() as $i):
                        $nim=$i['nim'];
                        $nama=$i['nama'];
                        $himpunan=$i['parent_himpunan'];
                        $bidang=$i['parent_bidang'];
                        $jabatan=$i['jabatan'];
                        ?>
                        <tbody>
                          <tr>
                            <!-- <td><center><?php echo $no++ ?></center></td> -->
                            <td><?php echo $nama ?></td>
                            <td><?php echo $nim ?></td>
                            <td><?php echo $himpunan ?></td>
                            <td><?php echo $bidang ?></td>
                            <td><?php echo $jabatan ?></td>
                            <td><center>
                              <a class="btn btn-warning" data-toggle="modal" data-target="#modal_edit_new<?php echo $nim;?>"><i class="far fa-edit"></i></a>
                              <a class="btn btn-danger" data-toggle="modal" data-target="#modal_delete<?php echo $nim;?>"><i class="far fa-trash-alt"></i></a>
                            </center>
                          </td>
                        </tr>
                      </tbody>
                    <?php endforeach;?>
                  </table>        
                </div>
                
              </div>
              <?php elseif($this->session->userdata('role') == 2):?>
                <div><h5>Anggota UKM/UKK</h5></div>
                <div class="card card-body">
                  <div class="table-responsive">
                    <table class="content-table" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <!-- <th><center>No</center></th> -->
                          <th>Nama</th>
                          <th>NIM</th>
                          <th>UKM/UKK</th>
                          <th>Bidang</th>
                          <th>Jabatan</th>
                          <th><center>Aksi</center></th>
                        </tr>
                      </thead>
                      <!-- sampai sini back -->
                      <?php 
                      foreach($anggota_ukmukk->result_array() as $i):
                        $u_nim=$i['u_nim'];
                        $u_nama=$i['u_nama'];
                        $ukmukk=$i['parent_ukmukk'];
                        $ukmbidang=$i['parent_ubidang'];
                        $ukmjabatan=$i['u_jabatan'];
                        ?>
                        <tbody>
                          <tr>
                            <!-- <td><center><?php echo $no++ ?></center></td> -->
                            <td><?php echo $u_nama ?></td>
                            <td><?php echo $u_nim ?></td>
                            <td><?php echo $ukmukk ?></td>
                            <td><?php echo $ukmbidang ?></td>
                            <td><?php echo $ukmjabatan ?></td>
                            <td><center>
                              <a class="btn btn-warning" data-toggle="modal" data-target="#modal_edit_anggota_ukmukk<?php echo $u_nim;?>"><i class="far fa-edit"></i></a>
                              <a class="btn btn-danger" data-toggle="modal" data-target="#modal_delete_anggota_ukmukk<?php echo $u_nim;?>"><i class="far fa-trash-alt"></i></a>
                            </center>
                          </td>
                        </tr>
                      </tbody>
                    <?php endforeach;?>
                  </table>        
                </div>
                
              </div>       
              <?php else:?>
                
              <?php endif;?>
              
              
            </section>

            <!-- Modal Delete -->
            <?php
            foreach($anggota->result_array() as $i):
              $nim=$i['nim'];
              $nama=$i['nama'];
              $bidangcurrent=$i['parent_bidang'];
              $jabatan=$i['jabatan'];
              ?>
              <div class="modal fade" id="modal_delete<?php echo $nim;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="myModalLabel">Delete Data Anggota</h5>
                    </div>
                    <div class="modal-body">
                      <h6>Nama : <?php echo $nama;?></h>
                        <h6>Bidang : <?php echo $bidangcurrent;?></h4>
                          <h6>Jabatan : <?php echo $jabatan;?></h4>
                            <center>
                             <a class="btn btn-danger" href="<?php echo base_url('c_user/delete_data_anggota/'.$nim); ?>">Lanjutkan</a>
                           </center>
                         </div>
                       </div>
                     </div>
                   </div>
                 <?php endforeach;?>
                 <!-- End Modal Delete -->

                 <!-- Modal Delete Anggota UKM/UKK -->
                 <?php
                 foreach($anggota_ukmukk->result_array() as $i):
                  $u_nim=$i['u_nim'];
                  $u_nama=$i['u_nama'];
                  $bidangcurrent=$i['parent_ubidang'];
                  $u_jabatan=$i['u_jabatan'];
                  ?>
                  <div class="modal fade" id="modal_delete_anggota_ukmukk<?php echo $u_nim;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="myModalLabel">Delete Data Anggota</h5>
                        </div>
                        <div class="modal-body">
                          <h6>Nama : <?php echo $u_nama;?></h6>
                          <h6>Bidang : <?php echo $bidangcurrent;?></h4>
                            <h6>Jabatan : <?php echo $u_jabatan;?></h6>
                            <center>
                             <a class="btn btn-danger" href="<?php echo base_url('c_user/delete_anggota_ukmukk/'.$u_nim); ?>">Lanjutkan</a>
                           </center>
                         </div>
                       </div>
                     </div>
                   </div>
                 <?php endforeach;?>
                 <!-- End Modal Delete -->

                 <!-- Modal Update Jumlah Mahasiswa Aktif -->
                 <?php
                 foreach($datahimpunan->result_array()as $i):
                  $kode_himpunan=$i['kode_himpunan'];
                  $jml_mhsaktif=$i['jml_mhsaktif']; ?>
                  <div class="modal fade" id="modal_update_mhsaktif" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h3 class="modal-title" id="myModalLabel">Input Jumlah Mahasiswa Aktif</h3>
                        </div>
                        <form class="form-horizontal" method="post" action="<?php echo base_url().'c_user/simpan_jml_mhsaktif'?>">
                          <div class="modal-body">
                            <div class="form-group">
                              <label class="control-label col-xs-3" >Jumlah Mahasiswa</label>
                              <div class="col-xs-8">
                                <input value="<?php echo $jml_mhsaktif;?>" name="jml_mhsaktif" class="form-control" type="text" placeholder="Masukan Jumlah Mahasiswa" required>
                              </div>
                            </div>
                          </div>
                          
                          <div class="modal-footer">
                            <button type="button" class="btn " aria-hidden="true" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn ">Save</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                <?php endforeach;?>


                <!-- End Modal Update Jumlah Mahasiswa -->

                <!-- Modal Update Jumlah Mahasiswa Aktif -->
                <?php
                foreach($dataukmukk->result_array()as $i):
                  $kode_ukmukk=$i['kode_ukmukk'];
                  $jml_umhsaktif=$i['jml_umhsaktif']; ?>
                  <div class="modal fade" id="modal_update_umhsaktif" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h3 class="modal-title" id="myModalLabel">Input Jumlah Mahasiswa Aktif</h3>
                        </div>
                        <form class="form-horizontal" method="post" action="<?php echo base_url().'c_user/simpan_jml_umhsaktif'?>">
                          <div class="modal-body">
                            <div class="form-group">
                              <label class="control-label col-xs-3" >Jumlah Mahasiswa</label>
                              <div class="col-xs-8">
                                <input value="<?php echo $jml_umhsaktif;?>" name="jml_umhsaktif" class="form-control" type="text" placeholder="Masukan Jumlah Mahasiswa" required>
                              </div>
                            </div>
                          </div>
                          
                          <div class="modal-footer">
                           <button type="button" class="btn " aria-hidden="true" data-dismiss="modal">Close</button>
                           <button type="submit" class="btn ">Save</button>
                         </div>
                       </form>
                     </div>
                   </div>
                 </div>
               <?php endforeach;?>


               <!-- End Modal Update Jumlah Mahasiswa -->


               <!-- Modal Add Visi Misi -->
               <?php
               foreach($datahimpunan->result_array() as $i):
                $kode_himpunan=$i['kode_himpunan'];
                $nama_himpunan=$i['nama_himpunan'];
                $visi=$i['visi'];
                $misi=$i['misi']; ?>
                <div class="modal fade" id="modal_add_visimisi" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h3 class="modal-title" id="myModalLabel">Tambah Visi Misi</h3>
                      </div>
                      <form class="form-horizontal" method="post" action="<?php echo base_url().'c_user/simpan_visi_misi'?>">
                        <div class="modal-body">
                         
                          <div class="form-group">
                            <label class="control-label col-xs-3" >Visi</label>
                            <div class="col-xs-8">
                              <textarea name="visi" class="form-control" type="text" placeholder="Visi Himpunan" required>
                                <?php echo $i['visi'];?>   
                              </textarea>
                            </div>
                          </div>
                          
                          <div class="form-group">
                            <label class="control-label col-xs-3" >Misi</label>
                            <div class="col-xs-8">
                              <textarea name="misi" class="form-control" type="text" placeholder="Misi Himpunan" required>
                                <?php echo $i['misi'];?>
                              </textarea>                                  
                            </div>
                          </div>

                        </div>
                        
                        <div class="modal-footer">
                         <button type="button" class="btn " aria-hidden="true" data-dismiss="modal">Close</button>
                         <button type="submit" class="btn ">Save</button>
                       </div>
                     </form>
                   </div>
                 </div>
               </div>
             <?php endforeach;?>
             <!-- End Modal Add Visi Misi -->

             <!-- Modal Update Visi Misi UKM UKK -->
             <?php
             foreach($dataukmukk->result_array() as $i):
              $kode_ukmukk=$i['kode_ukmukk'];
              $nama_ukmukk=$i['nama_ukmukk'];
              $visi_ukmukk=$i['visi_ukmukk'];
              $misi_ukmukk=$i['misi_ukmukk']; ?>
              <div class="modal fade" id="modal_add_visimisi_ukmukk" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h3 class="modal-title" id="myModalLabel">Tambah Visi Misi</h3>
                    </div>
                    <form class="form-horizontal" method="post" action="<?php echo base_url().'c_user/simpan_visimisi_ukmukk'?>">
                      <div class="modal-body">
                       
                        <div class="form-group">
                          <label class="control-label col-xs-3" >Visi</label>
                          <div class="col-xs-8">
                            <textarea name="visi_ukmukk" class="form-control" type="text" placeholder="Visi UKM/UKK" required>
                              <?php echo $i['visi_ukmukk'];?>
                            </textarea>    
                          </div>
                        </div>
                        
                        <div class="form-group">
                          <label class="control-label col-xs-3" >Misi</label>
                          <div class="col-xs-8">
                            <textarea name="misi_ukmukk" class="form-control" type="text" placeholder="Misi UKM/UKK" required>
                              <?php echo $i['misi_ukmukk'];?>
                            </textarea>    
                          </div>
                        </div>

                      </div>
                      
                      <div class="modal-footer">
                       <button type="button" class="btn " aria-hidden="true" data-dismiss="modal">Close</button>
                       <button type="submit" class="btn ">Save</button>
                     </div>
                   </form>
                 </div>
               </div>
             </div>
           <?php endforeach;?>

           <!-- End -->

           <!-- Tambah Bidang -->
           <div class="modal fade" id="modal_add_bidang" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h3 class="modal-title" id="myModalLabel">Tambah Bidang</h3>
                </div>
                <form class="form-horizontal" action="<?php echo base_url().'c_user/tambah_bidang';?>" enctype="multipart/form-data" method="post">
                  <div class="modal-body">
                   <div class="form-group">
                    <label class="control-label col-xs-3" >Logo Bidang</label>
                    <div class="col-xs-8">
                      <input class="form-control" type="file" name="image" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-xs-3" >Kode Bidang</label>
                    <div class="col-xs-8">
                      <input onkeypress="return disablespace()" style="text-transform:uppercase;" autocomplete="off" value="" name="kode_bidang" class="form-control" type="text" placeholder="co: bidangmusik " required>
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label class="control-label col-xs-3" >Label Bidang</label>
                    <div class="col-xs-8">
                      <input value="" name="label_bidang" class="form-control" type="text" autocomplete="off" placeholder="co: Bidang Musik HMJ" required>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-xs-3" >Deskripsi</label>
                    <div class="col-xs-8">
                      <input value="" name="nama_bidang" class="form-control" type="text" autocomplete="off" placeholder="co: Bidang ini merupakan bidang musik" required>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-xs-3" >Himpunan</label>
                    <div class="col-xs-8">
                     <select class="form-control" name="parent_himpunan" id="category">
                      <option value="">No Selected</option>
                      <?php
                      foreach($datahimpunan->result_array() as $i):
                        $himpunan=$i['kode_himpunan'];
                        ?>
                        <option value="<?php echo $kode_himpunan;?>"><?php echo $himpunan;?></option>
                      <?php endforeach;?>
                    </select>
                  </div>
                </div>
              </div>
              
              <div class="modal-footer">
               <button type="button" class="btn " aria-hidden="true" data-dismiss="modal">Close</button>
               <button type="submit" class="btn ">Save</button>
             </div>
           </form>
         </div>
       </div>
     </div>
     <!-- End Tambah Bidang Himpunan-->

     <!-- Tambah Bidang UKM UKK-->
     <div class="modal fade" id="modal_add_bidang_ukmukk" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="modal-title" id="myModalLabel">Tambah Bidang</h3>
          </div>
          <form class="form-horizontal" action="<?php echo base_url().'c_user/tambah_bidang_ukmukk';?>" enctype="multipart/form-data" method="post">
            <div class="modal-body">
             <div class="form-group">
              <label class="control-label col-xs-3" >Logo Bidang</label>
              <div class="col-xs-8">
                <input class="form-control" type="file" name="image" required>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-xs-3" >Kode Bidang</label>
              <div class="col-xs-8">
                <input onkeypress="return disablespace()" value="" name="kode_ubidang" class="form-control" type="text" style="text-transform:uppercase;" autocomplete="off" placeholder="co: Bidangmusik" required>
              </div>
            </div>
            
            <div class="form-group">
              <label class="control-label col-xs-3" >Label Bidang</label>
              <div class="col-xs-8">
                <input value="" name="label_ubidang" class="form-control" type="text" autocomplete="off" placeholder="co: Bidang Musik UKM" required>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-xs-3" >Deskripsi</label>
              <div class="col-xs-8">
                <input value="" name="desc_ubidang" class="form-control" autocomplete="off" type="text" placeholder="co: Bidang ini merupakan bidang musik" required>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-xs-3" >UKM/UKK</label>
              <div class="col-xs-8">
               <select class="form-control" name="parent_ukmukk" id="category">
                <option value="">No Selected</option>
                <?php
                foreach($dataukmukk->result_array() as $i):
                  $ukmukk=$i['kode_ukmukk'];
                  ?>
                  <option value="<?php echo $kode_ukmukk;?>"><?php echo $ukmukk;?></option>
                <?php endforeach;?>
              </select>
            </div>
          </div>
        </div>
        
        <div class="modal-footer">
         <button type="button" class="btn " aria-hidden="true" data-dismiss="modal">Close</button>
         <button type="submit" class="btn ">Save</button>
       </div>
     </form>
    </div>
    </div>
    </div>
    <!-- End Tambah Bidang UKMUKK -->


    <!-- Modal Edit Bidang -->
    <?php
    foreach($bidangbidang->result_array() as $i):
      $kode_bidang=$i['kode_bidang'];
      $label_bidang=$i['label_bidang'];
      $nama_bidang=$i['desc_bidang'];
      $image=$i['image'];
      $kode_himpunan=$i['parent_himpunan'];
      ?>
      <div class="modal fade" id="modal_update_bidang<?php echo $kode_bidang;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h3 class="modal-title" id="myModalLabel">Edit Bidang <?php echo $label_bidang;?></h3>
            </div>
            <form class="form-horizontal" action="<?php echo base_url().'c_user/update_data_bidang';?>" enctype="multipart/form-data" method="post">
              <div class="modal-body">
               <input type="hidden" name="imageold"  value="<?php echo $image;?>">
              <div class="form-group">
                <label class="control-label col-xs-3" >Logo Bidang</label>
                <div class="col-xs-8">
                  <input class="form-control" type="file" name="image">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-xs-3" >Kode Bidang</label>
                <div class="col-xs-8">
                  <input value="<?php echo $kode_bidang;?>" name="kode_bidang" class="form-control" type="text" placeholder="Kode Bidang" readonly required>
                </div>
              </div>
              
              <div class="form-group">
                <label class="control-label col-xs-3" >Label Bidang</label>
                <div class="col-xs-8">
                  <input value="<?php echo $label_bidang;?>" name="label_bidang" class="form-control" type="text" placeholder="Label Bidang">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-xs-3" >Nama Bidang</label>
                <div class="col-xs-8">
                  <input value="<?php echo $nama_bidang;?>" name="nama_bidang" class="form-control" type="text" placeholder="Nama Bidang">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-xs-3" >Kode Himpunan</label>
                <div class="col-xs-8">
                  <input value="<?php echo $kode_himpunan;?>" name="parent_himpunan" class="form-control" type="text" placeholder="Kode Himpunan" readonly>
                </div>
              </div>
            </div>
            
            <div class="modal-footer">
             <button type="button" class="btn " aria-hidden="true" data-dismiss="modal">Close</button>
             <button type="submit" class="btn ">Update</button>
           </div>
         </form>
       </div>
     </div>
    </div>
    <?php endforeach;?>
    <!-- End Modal Edit Bidang -->

    <!-- Modal Edit Bidang UKM/UKK-->
    <?php
    foreach($bidang_ukmukk->result_array() as $i):
      $kode_ubidang=$i['kode_ubidang'];
      $label_ubidang=$i['label_ubidang'];
      $nama_ubidang=$i['desc_ubidang'];
      $image=$i['image'];
      $kode_ukmukk=$i['parent_ukmukk'];
      ?>
      <div class="modal fade" id="modal_update_bidang_ukmukk<?php echo $kode_ubidang;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h3 class="modal-title" id="myModalLabel">Edit Bidang <?php echo $label_ubidang;?></h3>
            </div>
            <form class="form-horizontal" action="<?php echo base_url().'c_user/update_bidang_ukmukk';?>" enctype="multipart/form-data" method="post">
              <div class="modal-body">
               <input type="hidden" name="imageold"  value="<?php echo $image;?>">
               <div class="form-group">
                <label class="control-label col-xs-3" >Logo Bidang</label>
                <div class="col-xs-8">
                  <input class="form-control" type="file" name="image">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-xs-3" >Kode Bidang</label>
                <div class="col-xs-8">
                  <input value="<?php echo $kode_ubidang;?>" name="kode_ubidang" class="form-control" type="text" placeholder="Kode Bidang" readonly required>
                </div>
              </div>
              
              <div class="form-group">
                <label class="control-label col-xs-3" >Label Bidang</label>
                <div class="col-xs-8">
                  <input value="<?php echo $label_ubidang;?>" name="label_ubidang" class="form-control" type="text" placeholder="Label Bidang">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-xs-3" >Nama Bidang</label>
                <div class="col-xs-8">
                  <input value="<?php echo $nama_ubidang;?>" name="nama_ubidang" class="form-control" type="text" placeholder="Nama Bidang">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-xs-3" >Kode UKM/UKK</label>
                <div class="col-xs-8">
                  <input value="<?php echo $kode_ukmukk;?>" name="parent_ukmukk" class="form-control" type="text" placeholder="Kode UKM/UKK" readonly>
                </div>
              </div>
            </div>
            
            <div class="modal-footer">
             <button type="button" class="btn " aria-hidden="true" data-dismiss="modal">Close</button>
             <button type="submit" class="btn ">Update</button>
           </div>
         </form>
       </div>
     </div>
    </div>
    <?php endforeach;?>
    <!-- End Modal Edit Bidang UKM/UKK -->

    <!--Modal Delete Bidang-->
    <?php
    foreach($bidangbidang->result_array() as $i):
      $kode_bidang=$i['kode_bidang'];
      $label_bidang=$i['label_bidang'];
      $nama_bidang=$i['desc_bidang'];
      $image=$i['image'];
      $kode_himpunan=$i['parent_himpunan'];
      ?>
      <div class="modal fade" id="modal_delete_bidang<?php echo $kode_bidang;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="myModalLabel">Delete Data Anggota</h5>
            </div>
            <div class="modal-body">
              <center> <img width="80" height="80" style="border-radius: 50px" src="<?php echo base_url('assets/img/bidang/').$image?>"></center>
              <center><h6>Nama Bidang : <?php echo $label_bidang;?> - <?php echo $nama_bidang;?></h6></center>
              <center>
               <a class="btn btn-danger" href="<?php echo base_url('c_user/delete_data_bidang?var1='.$kode_bidang.'&var2='.$image.''); ?>">Lanjutkan</a>
             </center>
           </div>
         </div>
       </div>
     </div>
    <?php endforeach;?>
    <!--Akhir Modal Delete Bidang-->

    <!--Modal Delete Bidang UKM/UKK-->
    <?php
    foreach($bidang_ukmukk->result_array() as $i):
      $kode_ubidang=$i['kode_ubidang'];
      $label_ubidang=$i['label_ubidang'];
      $desc_ubidang=$i['desc_ubidang'];
      $image=$i['image'];
      $kode_ukmukk=$i['parent_ukmukk'];
      ?>
      <div class="modal fade" id="modal_delete_bidang_ukmukk<?php echo $kode_ubidang;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="myModalLabel">Delete Data Anggota</h5>
            </div>
            <div class="modal-body">
              <center> <img width="80" height="80" style="border-radius: 50px" src="<?php echo base_url('assets/img/bidang/').$logo?>"></center>
              <center><h6>Nama Bidang : <?php echo $label_ubidang;?> - <?php echo $desc_ubidang;?></h6></center>
              <center>
               <a class="btn btn-danger" href="<?php echo base_url('c_user/delete_bidang_ukmukk/'.$kode_ubidang); ?>">Lanjutkan</a>
             </center>
           </div>
         </div>
       </div>
     </div>
    <?php endforeach;?>
    <!--Akhir Modal Delete Bidang UKM/UKK-->


    <!-- Modal Tambah Anggota -->
    <div class="modal fade" id="modal_add_new" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="modal-title" id="myModalLabel">Tambah Data Anggota</h3>
          </div>
          <form class="form-horizontal" method="post" action="<?php echo base_url().'c_user/simpan_data_anggota'?>">
            <div class="modal-body">                        
              <div class="form-group">
                <label class="control-label col-xs-3" >NIM</label>
                <div class="col-xs-8">
                  <input name="nim" class="form-control" type="text" autocomplete="off" placeholder="NIM Mahasiswa" required>
                </div>
              </div>
              
              <div class="form-group">
                <label class="control-label col-xs-3" >Nama</label>
                <div class="col-xs-8">
                  <input name="nama" class="form-control" type="text" autocomplete="off" placeholder="Nama Anggota" required>
                </div>
              </div>
              
              <div class="form-group">
                <label class="control-label col-xs-3" >Jenis Kelamin</label>
                <div class="col-xs-8">
                 <select name="jenis_kelamin" class="form-control">
                  <option value="">No Selected</option>
                  <option value="L">Laki - laki</option>
                  <option value="P">Perempuan</option>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-xs-3" >Alamat</label>
              <div class="col-xs-8">
                <input name="alamat" class="form-control" autocomplete="off" type="text" placeholder="Alamat Domisili">
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-xs-3" >Kontak</label>
              <div class="col-xs-8">
                <input name="kontak" class="form-control" autocomplete="off" type="text" placeholder="Kontak Hp / WA">
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-xs-3" >Email</label>
              <div class="col-xs-8">
                <input name="email" class="form-control" autocomplete="off" type="text" placeholder="Email">
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-xs-3" >Jabatan</label>
              <div class="col-xs-8">
               <select name="jabatan" class="form-control" required>
                <option value="">No Selected</option>
                <option value="KETUA">Ketua Umum</option>
                <option value="SEKRETARIS">Sekretaris Umum</option>
                <option value="BENDAHARA">Bendahara Umum</option>
                <option value="KETUA BIDANG">Ketua Bidang</option>
                <option value="ANGGOTA">Anggota</option>
              </select>
            </div>
            </div>

          <div class="form-group">
            <label class="control-label col-xs-3" >Himpunan</label>
            <div class="col-xs-8">
             <select class="form-control" name="parent_himpunan" id="category">
              <option value="">No Selected</option>
              <?php
              foreach($datahimpunan->result_array() as $i):
                $himpunan=$i['kode_himpunan'];
                ?>
                <option value="<?php echo $kode_himpunan;?>"><?php echo $himpunan;?></option>
              <?php endforeach;?>
            </select>
          </div>
          </div>
        
          <div class="form-group">
          <label class="control-label col-xs-3" >Bidang</label>
          <div class="col-xs-8">
           <select class="form-control" name="parent_bidang" id="category" required>
            <option value="">No Selected</option>
            <?php
            foreach($bidangbidang->result_array() as $i):
              $label_bidang=$i['label_bidang'];
              $kode_bidang=$i['kode_bidang'];
              ?>
              <option value="<?php echo $kode_bidang;?>"><?php echo $label_bidang;?></option>
            <?php endforeach;?>
          </select>
        </div>
      </div> 
      </div>

    <div class="modal-footer">
     <button type="button" class="btn " aria-hidden="true" data-dismiss="modal">Close</button>
     <button type="submit" class="btn ">Save changes</button>
    </div>
    </form>
    </div>
    </div>
    </div>
    <!--END MODAL ADD BARANG-->

    <!-- Modal Add Anggota UKM -->
    <div class="modal fade" id="modal_add_anggota_ukmukk" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="modal-title" id="myModalLabel">Tambah Data Anggota</h3>
          </div>
          <form class="form-horizontal" method="post" action="<?php echo base_url().'c_user/simpan_anggota_ukmukk'?>">
            <div class="modal-body">
             
              <div class="form-group">
                <label class="control-label col-xs-3" >NIM</label>
                <div class="col-xs-8">
                  <input name="u_nim" class="form-control" type="text" placeholder="NIM Mahasiswa" required>
                </div>
              </div>
              
              <div class="form-group">
                <label class="control-label col-xs-3" >Nama</label>
                <div class="col-xs-8">
                  <input name="u_nama" class="form-control" type="text" placeholder="Nama Anggota" required>
                </div>
              </div>
              
              <div class="form-group">
                <label class="control-label col-xs-3" >Jenis Kelamin</label>
                <div class="col-xs-8">
                 <select name="u_jeniskelamin" class="form-control">
                  <option value="">No Selected</option>
                  <option value="L">Laki - laki</option>
                  <option value="P">Perempuan</option>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-xs-3" >Alamat</label>
              <div class="col-xs-8">
                <input name="u_alamat" class="form-control" type="text" placeholder="Alamat Domisili">
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-xs-3" >Kontak</label>
              <div class="col-xs-8">
                <input name="u_kontak" class="form-control" type="text" placeholder="Kontak Hp / WA">
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-xs-3" >Email</label>
              <div class="col-xs-8">
                <input name="u_email" class="form-control" type="text" placeholder="Email">
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-xs-3" >Jabatan</label>
              <div class="col-xs-8">
               <select name="u_jabatan" class="form-control" required>
                <option value="">No Selected</option>
                <option value="KETUA">Ketua Umum</option>
                <option value="SEKRETARIS">Sekretaris Umum</option>
                <option value="BENDAHARA">Bendahara Umum</option>
                <option value="KETUA BIDANG">Ketua Bidang</option>
                <option value="ANGGOTA">Anggota</option>
              </select>
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-xs-3" >Himpunan</label>
            <div class="col-xs-8">
             <select class="form-control" name="parent_ukmukk" id="category">
              <option value="">No Selected</option>
              <?php
              foreach($dataukmukk->result_array() as $i):
                $ukmukk=$i['kode_ukmukk'];
                ?>
                <option value="<?php echo $kode_ukmukk;?>"><?php echo $ukmukk;?></option>
              <?php endforeach;?>
            </select>
          </div>
        </div>
        
        <div class="form-group">
          <label class="control-label col-xs-3" >Bidang</label>
          <div class="col-xs-8">
           <select class="form-control" name="parent_ubidang" id="category" required>
            <option value="">No Selected</option>
            <?php
            foreach($bidang_ukmukk->result_array() as $i):
              $label_ubidang=$i['label_ubidang'];
              $kode_ubidang=$i['kode_ubidang'];
              ?>
              <option value="<?php echo $kode_ubidang;?>"><?php echo $label_ubidang;?></option>
            <?php endforeach;?>
          </select>
        </div>
      </div> 
    </div>

    <div class="modal-footer">
     <button type="button" class="btn " aria-hidden="true" data-dismiss="modal">Close</button>
     <button type="submit" class="btn ">Save changes</button>
    </div>
    </form>
    </div>
    </div>
    </div>
    <!--END MODAL ADD Anggota UKM-->


    <!-- Start Modal Edit Anggota-->
    <?php
    foreach($anggota->result_array() as $i):
      $nim=$i['nim'];
      $nama=$i['nama'];
      $himpunan=$i['parent_himpunan'];
      $bidangcurrent=$i['parent_bidang'];
      $jabatan=$i['jabatan'];
      $alamat=$i['alamat'];
      $kontak=$i['kontak'];
      $email=$i['email'];
      $jenis_kelamin=$i['jenis_kelamin'];
      ?>
      <div class="modal fade" id="modal_edit_new<?php echo $nim;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h3 class="modal-title" id="myModalLabel">Edit Data <?php echo $nama;?></h3>
            </div>
            <form class="form-horizontal" method="post" action="<?php echo base_url().'c_user/update_data_anggota'?>">
              <div class="modal-body">
               
                <div class="form-group">
                  <label class="control-label col-xs-3" >NIM</label>
                  <div class="col-xs-8">
                    <input name="nim" value="<?php echo $nim;?>" class="form-control" type="text" placeholder="NIM Mahasiswa" required readonly>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-xs-3" >Nama Anggota</label>
                  <div class="col-xs-8">
                    <input name="nama" value="<?php echo $nama;?>" class="form-control" type="text" placeholder="Nama" required>
                  </div>
                </div>

                <!-- Jenis Kelamin -->
                <div class="form-group">
                  <label class="control-label col-xs-3" >Jenis Kelamin</label>
                  <div class="col-xs-8">
                   <select name="jenis_kelamin" class="form-control">
                    <option value="">-PILIH-</option>
                    <?php if($jenis_kelamin == 'L'):?>
                      <option value="L" selected>Laki - Laki</option>
                      <?php elseif($jenis_kelamin == 'P'):?>
                        <option value="P" selected>Perempuan</option>
                        <?php else:?>
                          <option value="L">Laki - laki</option>
                          <option value="P">Perempuan</option>
                        <?php endif;?>
                      </select>
                    </div>
                  </div> 
                  
                  <div class="form-group">
                    <label class="control-label col-xs-3" >Alamat</label>
                    <div class="col-xs-8">
                      <input name="alamat" value="<?php echo $alamat;?>" class="form-control" type="text" placeholder="Alamat Domisili">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-xs-3" >Kontak</label>
                    <div class="col-xs-8">
                      <input name="kontak" value="<?php echo $kontak;?>" class="form-control" type="text" placeholder="Kontak Nomor Hp / WA">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-xs-3" >Email</label>
                    <div class="col-xs-8">
                      <input name="email" value="<?php echo $email;?>" class="form-control" type="text" placeholder="Email">
                    </div>
                  </div>

                  <!-- Jabatan -->
                  <div class="form-group">
                    <label class="control-label col-xs-3" >Jabatan</label>
                    <div class="col-xs-8">
                     <select name="jabatan" class="form-control" required>
                      <option value="">-PILIH-</option>
                      <?php if($jabatan == 'KETUA'):?>
                        <option value="KETUA" selected>Ketua Umum</option>
                        <option value="SEKRETARIS">Sekretaris Umum</option>
                        <option value="BENDAHARA">Bendahara Umum</option>
                        <option value="KETUA BIDANG">Ketua Bidang</option>
                        <option value="ANGGOTA">Anggota</option>
                        <?php elseif($jabatan == 'SEKRETARIS'):?>
                          <option value="KETUA">Ketua Umum</option>
                          <option value="SEKRETARIS" selected>Sekretaris Umum</option>
                          <option value="BENDAHARA">Bendahara Umum</option>
                          <option value="KETUA BIDANG">Ketua Bidang</option>
                          <option value="ANGGOTA">Anggota</option>
                          <?php elseif($jabatan == 'BENDAHARA'):?>
                            <option value="KETUA">Ketua Umum</option>
                            <option value="SEKRETARIS">Sekretaris Umum</option>
                            <option value="BENDAHARA" selected>Bendahara Umum</option>
                            <option value="KETUA BIDANG">Ketua Bidang</option>
                            <option value="ANGGOTA">Anggota</option>
                            <?php elseif($jabatan == 'KETUA BIDANG'):?>
                              <option value="KETUA">Ketua Umum</option>
                              <option value="SEKRETARIS">Sekretaris Umum</option>
                              <option value="BENDAHARA">Bendahara Umum</option>
                              <option value="KETUA BIDANG" selected>Ketua Bidang</option>
                              <option value="ANGGOTA">Anggota</option>
                              <?php elseif($jabatan == 'ANGGOTA'):?>
                                <option value="KETUA">Ketua Umum</option>
                                <option value="SEKRETARIS">Sekretaris Umum</option>
                                <option value="BENDAHARA">Bendahara Umum</option>
                                <option value="KETUA BIDANG">Ketua Bidang</option>
                                <option value="ANGGOTA" selected>Anggota</option>
                                <?php else:?>
                                  <option value="KETUA">Ketua Umum</option>
                                  <option value="SEKRETARIS">Sekretaris Umum</option>
                                  <option value="BENDAHARA">Bendahara Umum</option>
                                  <option value="KETUA BIDANG">Ketua Bidang</option>
                                  <option value="ANGGOTA">Anggota</option>
                                <?php endif;?>
                              </select>
                            </div>
                          </div> 
                          
                          
                          <div class="form-group">
                            <label class="control-label col-xs-3" >Himpunan</label>
                            <div class="col-xs-8">
                              <input name="parent_himpunan" value="<?php echo $himpunan;?>" class="form-control" type="text" placeholder="Himpunan" required disabled>
                            </div>
                          </div>

                          <!-- Bidang -->
                          <div class="form-group">
                            <label class="control-label col-xs-3" >Bidang</label>
                            <div class="col-xs-8">
                             <select name="parent_bidang" class="form-control" required>
                              <?php
                              foreach($bidangbidang->result_array() as $i):
                                $label_bidang=$i['label_bidang'];
                                $kode_bidang=$i['kode_bidang'];
                                ?>
                                <?php if($bidangcurrent == $kode_bidang):?>
                                  <option value="<?php echo $kode_bidang;?>" selected><?php echo $label_bidang;?></option>
                                  <?php else:?>
                                    <option value="<?php echo $kode_bidang;?>"><?php echo $label_bidang;?></option>
                                  <?php endif;?>
                                <?php endforeach;?>
                              </select>
                            </div>
                          </div> 
                          
                          
                        </div>
                        
                        <div class="modal-footer">
                         <button type="button" class="btn " aria-hidden="true" data-dismiss="modal">Close</button>
                         <button type="submit" class="btn ">Update changes</button>
                       </div>
                     </form>
                   </div>
                 </div>
               </div>
               
             <?php endforeach;?>
             <!-- End Modal Edit -->

             <!-- Start Modal Edit Anggota UKM UKK-->
             <?php
             foreach($anggota_ukmukk->result_array() as $i):
              $u_nim=$i['u_nim'];
              $u_nama=$i['u_nama'];
              $parent_ukmukk=$i['parent_ukmukk'];
              $bidangcurrent=$i['parent_ubidang'];
              $u_jabatan=$i['u_jabatan'];
              $u_alamat=$i['u_alamat'];
              $u_kontak=$i['u_kontak'];
              $u_email=$i['u_email'];
              $u_jeniskelamin=$i['u_jeniskelamin'];
              ?>
              <div class="modal fade" id="modal_edit_anggota_ukmukk<?php echo $u_nim;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h3 class="modal-title" id="myModalLabel">Edit Data <?php echo $u_nama;?></h3>
                    </div>
                    <form class="form-horizontal" method="post" action="<?php echo base_url().'c_user/update_anggota_ukmukk'?>">
                      <div class="modal-body">
                       
                        <div class="form-group">
                          <label class="control-label col-xs-3" >NIM</label>
                          <div class="col-xs-8">
                            <input name="u_nim" value="<?php echo $u_nim;?>" class="form-control" type="text" placeholder="NIM Mahasiswa" required readonly>
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="control-label col-xs-3" >Nama Anggota</label>
                          <div class="col-xs-8">
                            <input name="u_nama" value="<?php echo $u_nama;?>" class="form-control" type="text" placeholder="Nama" required>
                          </div>
                        </div>

                        <!-- Jenis Kelamin -->
                        <div class="form-group">
                          <label class="control-label col-xs-3" >Jenis Kelamin</label>
                          <div class="col-xs-8">
                           <select name="u_jeniskelamin" class="form-control">
                            <option value="">-PILIH-</option>
                            <?php if($u_jeniskelamin == 'L'):?>
                              <option value="L" selected>Laki - Laki</option>
                              <?php elseif($u_jeniskelamin == 'P'):?>
                                <option value="P" selected>Perempuan</option>
                                <?php else:?>
                                  <option value="L">Laki - laki</option>
                                  <option value="P">Perempuan</option>
                                <?php endif;?>
                              </select>
                            </div>
                          </div> 
                          
                          <div class="form-group">
                            <label class="control-label col-xs-3" >Alamat</label>
                            <div class="col-xs-8">
                              <input name="u_alamat" value="<?php echo $u_alamat;?>" class="form-control" type="text" placeholder="Alamat Domisili">
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-xs-3" >Kontak</label>
                            <div class="col-xs-8">
                              <input name="u_kontak" value="<?php echo $u_kontak;?>" class="form-control" type="text" placeholder="Kontak Nomor Hp / WA">
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-xs-3" >Email</label>
                            <div class="col-xs-8">
                              <input name="u_email" value="<?php echo $u_email;?>" class="form-control" type="text" placeholder="Email">
                            </div>
                          </div>

                          <!-- Jabatan -->
                          <div class="form-group">
                            <label class="control-label col-xs-3" >Jabatan</label>
                            <div class="col-xs-8">
                             <select name="u_jabatan" class="form-control" required>
                              <option value="">-PILIH-</option>
                              <?php if($u_jabatan == 'KETUA'):?>
                                <option value="KETUA" selected>Ketua Umum</option>
                                <option value="SEKRETARIS">Sekretaris Umum</option>
                                <option value="BENDAHARA">Bendahara Umum</option>
                                <option value="KETUA BIDANG">Ketua Bidang</option>
                                <option value="ANGGOTA">Anggota</option>
                                <?php elseif($u_jabatan == 'SEKRETARIS'):?>
                                  <option value="KETUA">Ketua Umum</option>
                                  <option value="SEKRETARIS" selected>Sekretaris Umum</option>
                                  <option value="BENDAHARA">Bendahara Umum</option>
                                  <option value="KETUA BIDANG">Ketua Bidang</option>
                                  <option value="ANGGOTA">Anggota</option>
                                  <?php elseif($u_jabatan == 'BENDAHARA'):?>
                                    <option value="KETUA">Ketua Umum</option>
                                    <option value="SEKRETARIS">Sekretaris Umum</option>
                                    <option value="BENDAHARA" selected>Bendahara Umum</option>
                                    <option value="KETUA BIDANG">Ketua Bidang</option>
                                    <option value="ANGGOTA">Anggota</option>
                                    <?php elseif($u_jabatan == 'KETUA BIDANG'):?>
                                      <option value="KETUA">Ketua Umum</option>
                                      <option value="SEKRETARIS">Sekretaris Umum</option>
                                      <option value="BENDAHARA">Bendahara Umum</option>
                                      <option value="KETUA BIDANG" selected>Ketua Bidang</option>
                                      <option value="ANGGOTA">Anggota</option>
                                      <?php elseif($u_jabatan == 'ANGGOTA'):?>
                                        <option value="KETUA">Ketua Umum</option>
                                        <option value="SEKRETARIS">Sekretaris Umum</option>
                                        <option value="BENDAHARA">Bendahara Umum</option>
                                        <option value="KETUA BIDANG">Ketua Bidang</option>
                                        <option value="ANGGOTA" selected>Anggota</option>
                                        <?php else:?>
                                          <option value="KETUA">Ketua Umum</option>
                                          <option value="SEKRETARIS">Sekretaris Umum</option>
                                          <option value="BENDAHARA">Bendahara Umum</option>
                                          <option value="KETUA BIDANG">Ketua Bidang</option>
                                          <option value="ANGGOTA">Anggota</option>
                                        <?php endif;?>
                                      </select>
                                    </div>
                                  </div> 
                                  
                                  
                                  <div class="form-group">
                                    <label class="control-label col-xs-3" >UKM/UKK</label>
                                    <div class="col-xs-8">
                                      <input name="parent_ukmukk" value="<?php echo $ukmukk;?>" class="form-control" type="text" placeholder="UKM/UKK" required disabled>
                                    </div>
                                  </div>

                                  <!-- Bidang -->
                                  <div class="form-group">
                                    <label class="control-label col-xs-3" >Bidang</label>
                                    <div class="col-xs-8">
                                     <select name="parent_ubidang" class="form-control" required>
                                      <?php
                                      foreach($bidang_ukmukk->result_array() as $i):
                                        $label_ubidang=$i['label_ubidang'];
                                        $kode_ubidang=$i['kode_ubidang'];
                                        ?>
                                        <?php if($bidangcurrent == $kode_ubidang):?>
                                          <option value="<?php echo $kode_ubidang;?>" selected><?php echo $label_ubidang;?></option>
                                          <?php else:?>
                                            <option value="<?php echo $kode_ubidang;?>"><?php echo $label_ubidang;?></option>
                                          <?php endif;?>
                                        <?php endforeach;?>
                                      </select>
                                    </div>
                                  </div> 
                                  
                                  
                                </div>
                                
                                <div class="modal-footer">
                                 <button type="button" class="btn " aria-hidden="true" data-dismiss="modal">Close</button>
                                 <button type="submit" class="btn ">Update changes</button>
                               </div>
                             </form>
                           </div>
                         </div>
                       </div>
                       
                     <?php endforeach;?>
                     <!-- End Modal Edit -->

                     <!-- Start Modal Edit Foto UKM -->
                     <?php
                     foreach($dataukmukk->result_array() as $i):
                      $kode_ukmukk=$i['kode_ukmukk'];
                      $image=$i['image']; ?>
                      <div class="modal fade" id="modal_edit_foto_ukm" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h3 class="modal-title" id="myModalLabel">Update Foto</h3>
                            </div>
                            <form method="post" action="<?php echo base_url().'c_user/updatefoto_ukmukk'?>"  enctype="multipart/form-data">
                              <div class="modal-body">                         
                                
                                <div class="form-group">
                                  <label>Kode UKM/UKK</label>
                                  <input type="text" name="kode_ukmukk" class="form-control" value="<?php echo $kode_ukmukk;?>" required readonly>
                                </div>                                           
                                <div class="form-group " >
                                  <label>Logo UKM/UKK</label>
                                  <input type="file" name="image" class="form-control" value="<?php echo $image;?>">
                                </div> 
                                <input type="hidden" name="imageold"  value="<?php echo $image;?>">
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn">Update changes</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    <?php endforeach;?>

                    <!-- End Modal Edit foto -->
                    <!-- Start Modal Edit Foto HMJ -->
                    <?php
                    foreach($datahimpunan->result_array() as $i):
                      $kode_himpunan=$i['kode_himpunan'];
                      $image=$i['image']; ?>
                      <div class="modal fade" id="modal_edit_foto_hmj" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h3 class="modal-title" id="myModalLabel">Update Foto</h3>
                            </div>
                            <form method="post" action="<?php echo base_url().'c_user/updatefoto_hmj'?>"  enctype="multipart/form-data">
                              <div class="modal-body">
                                <input type="hidden" name="imageold" value="<?php echo $image;?>">
                                <div class="form-group">
                                  <label>Kode ORMAWA</label>
                                  <input type="text" name="kode_himpunan" class="form-control" value="<?php echo $kode_himpunan;?>" required readonly>
                                </div> 
                                <div class="form-group " >
                                  <label>Logo </label>
                                  <input type="file" name="image" class="form-control" value="<?php echo $image;?>">
                                </div> 
                                <input type="hidden" name="imageold"  value="<?php echo $image;?>">
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn">Update changes</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    <?php endforeach;?>

                    <!-- End Modal Edit foto -->



                    <script src="<?php echo base_url().'assets/js/jquery-2.2.4.min.js'?>"></script>
                    <script src="<?php echo base_url().'assets/js/bootstrap.js'?>"></script>
                    <script src="<?php echo base_url().'assets/js/jquery.dataTables.min.js'?>"></script>
                    <script>
                      $(document).ready(function(){
                        $('#mydata').DataTable();
                      });
                    </script>
          <!-- 
            <script src="<?php echo base_url('assets/js/bootstrap.min.js')?>"></script> -->
            <script src="<?php echo base_url('assets/js/popper.min.js')?>"></script>

            <script src="<?php echo base_url('assets/js/active.js')?>"></script>
            <script>
              $("textarea").keypress(function(event) {
                if (event.keyCode == 13 && !event.shiftKey) {
             submitForm(); //Submit your form here
             return false;
           }
         });
       </script>
       <script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap-datepicker.js')?>"></script>
       <script>
        $(function () {
          $('#datepicker').datepicker({
            format: "yyyy-mm-dd",
            autoclose: true
          });
        });
      </script>
      <script type="text/javascript" src="<?php echo base_url();?>assets/tinymce/tinymce.min.js"></script>
      <script type="text/javascript">
        tinymce.init({
          selector: "textarea",
          plugins: [
          "advlist autolink autosave link image lists charmap print preview hr anchor pagebreak spellchecker",
          "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
          "table contextmenu directionality emoticons template textcolor paste textcolor filemanager"
          ],
          
          toolbar1: "newdocument | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | styleselect formatselect fontselect fontsizeselect",
          toolbar2: "cut copy paste | searchreplace | bullist numlist | outdent indent blockquote | undo redo | link unlink anchor image media code | inserttime preview | forecolor backcolor",
          toolbar3: "table | hr removeformat | subscript superscript | charmap emoticons | print fullscreen | ltr rtl | spellchecker | visualchars visualblocks nonbreaking template pagebreak restoredraft",
          
          menubar: false,
          toolbar_items_size: 'small',
          image_advtab: true,
          style_formats: [
          {title: 'Bold text', inline: 'b'},
          {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
          {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
          {title: 'Example 1', inline: 'span', classes: 'example1'},
          {title: 'Example 2', inline: 'span', classes: 'example2'},
          {title: 'Table styles'},
          {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
          ],
          
          templates: [
          {title: 'Test template 1', content: 'Test 1'},
          {title: 'Test template 2', content: 'Test 2'}
          ]
        });
      </script>
      <script>
        function disablespace() {
          if (event.keyCode == 32) {
            alert('Tidak boleh menggunakan spasi');
            return false;
          }
        }
      </script>
    </div>
    </div>  