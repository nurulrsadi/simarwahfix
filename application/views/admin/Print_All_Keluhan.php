<page backtop="7mm" backbottom="7mm" backleft="10mm" backright="10mm"> 
    <page_header> 
        Print Keluhan dan Saran SIMARWAH 
    </page_header> 
    <page_footer> 
        Print Keluhan dan Saran SIMARWAH 
    </page_footer>
    <style>
      ul 
        {
          list-style-type: none;
          margin: 0;
          padding:-10;
          text-align: center;
        }
      .kop-surat
        {
          width:1vh
        }
      table.kop-surat td.konten
        {
            height:110px;
        }
      table.kop-surat td.kampus
        {
            height:110px;
        }
      td.kampus h4
        {
          padding: 0px;
        }
        td.break {
        word-wrap: break-word;
        width: 300px;
        padding: 3;
    }
    .konten{
        padding: 3;
    }
    </style>
        <!-- kop surat -->
        <table class="kop-surat" align="center">
          <tr class="konten">
            <td style="padding-right:5px;"><img src="<?php echo base_url('assets/img/uinlogo.png')?>" alt="" style="width:80px;height:110px;"></td>
            <td class="kampus" align="center" style="height:110px;">
                <h3 style="padding:none;"><font size="10pt" style=" text-align:center; font-weight: bold;">KEMENTERIAN AGAMA REPUBLIK INDONESIA</font><BR>
                <font size="10pt" style=" text-align:center; font-weight: bold;">UNIVERSITAS ISLAM NEGERI (UIN)</font><BR>
                <font size="10pt" style=" text-align:center; font-weight: bold;">SUNAN GUNUNG DJATI BANDUNG</font></h3>
                <font size="2pt" style=" text-align:center;">Jalan AH. Nasution 105 Bandung 40614 Telp. 022-7800525 Fax. 022-7802844</font><BR>
                <font size="2pt" style=" text-align:center; ">Website : https://uinsgd.ac.id/ email: info@uinsgd.ac.id</font><BR>
            </td>
        </tr>
        <tr>
          <td colspan="2"><hr></td>
        </tr>
        <br>
        </table>
        <!-- konten -->
        
        <table align="center" colspan="2">
        <tr>
        <?php $format="%Y-%m-%d"?>
            <td><font size="7" style=" text-align:center; font-weight: bold;">Data Keluhan dan Saran SIMARWAH Hingga Tanggal <?= date_indo(@mdate($format));?></font></td>
            <!--<td  width="500" height="40" colspan="2"></td>-->
        </tr>
        </table>
        <br>
        <br>
        <table width="100vh" height="100vh" align="center" class="konten" margin="1" border="1">
            <thead>
                <tr align="center">
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Nama Ormawa</th>
                    <th>Isi Keluhan</th>
                </tr>
            </thead>
                <?php $j=1; ?>
                <?php foreach($all_keluhan->result_array() as $i):
                    $id_keluhan=$i['id'];
                    $ormawa=$i['kd_ormawa'];
                    $tanggal=$i['tanggal'];
                    $isikeluhan=$i['isikeluhan'];
                    $status_keluhan=$i['status_keluhan'];
                  ?>
            <tbody>
                <tr align="center">
                 <td margin="0"><?= $j++; ?></td>
                 <td margin="0"> <?= date_indo(@mdate($tanggal));?></td>
                 <td margin="0"><?= $ormawa; ?></td>
                 <td margin="0" class="break"><?= $isikeluhan; ?></td>
            </tr>
            </tbody>
                <?php endforeach;?>
        </table>
        <br>
        <br>
        <!--<table border="1" align="center" class="">-->
        <!--    <tr>-->
        <!--        <td colspan="2"></td>-->
        <!--    </tr>-->
        <!--</table>-->
        <!--<table align="center" border="1">-->
        <!--  <tr align="right">-->
        <!--    <td width="330" colspan="2"></td>-->
        <!--    <?php $format="%Y-%m-%d"?>-->
        <!--    <td>Bandung, <?= date_indo(@mdate($format));?></td>-->
        <!--  </tr>-->
        <!--  <tr>-->
        <!--    <td colspan="2"></td>-->
        <!--    <td height="70"></td>-->
        <!--  </tr>-->
          <!--<tr>-->
          <!--  <td colspan="2"></td>-->
          <!--  <td><hr></td>-->
          <!--</tr>-->
        <!--  <tr>-->
        <!--    <td colspan="2"></td>-->
        <!--    <td align="right">NIP : ..................................</td>-->
        <!--  </tr>-->
        <!--</table>-->
</page> 