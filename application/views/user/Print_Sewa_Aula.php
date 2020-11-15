<page backtop="7mm" backbottom="7mm" backleft="10mm" backright="10mm"> 
    <page_header> 
        Page Header 
    </page_header> 
    <page_footer> 
        Page Footer 
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
          width:100vh
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
    </style>
      <?php foreach($detail_sewa->result_array() as $i):
        $penyewa=$i['penyewa'];
        $aula=$i['keterangan'];
        $no_surat=$i['no_surat'];
        $nama_acara=$i['Keterangan'];
        $mulai_tanggal=$i['dari'];
        $akhir_tanggal=$i['hingga'];
        $mulai_pukul=$i['mulaipukul'];
        $akhir_pukul=$i['akhirpukul'];
        $nama_pj=$i['nama_pj'];
        $kontak_pj=$i['no_pj'];
      ?>
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
        <table align="center">
        <tr>
        <td><font size="4" style=" text-align:center; font-weight: bold;">Surat Izin Peminjaman Aula SC oleh <?= $penyewa;?></font></td>
        </tr>
        </table>
        <table class="no-surat" align="center">
          <tr>
            <td  width="500" height="40" colspan="2"></td>
          </tr>
          <tr>
            <td colspan="2" style="padding-left:65;">Berdasarkan surat <?= $penyewa;?> dengan nomor <?= $no_surat; ?> </td>
          </tr>
          <tr>
            <td colspan="2">tentang Permohonan Izin Sewa Aula Student Center dengan detail Acara sebagai berikut :</td>
          </tr>
        </table>
        <table align="center">
          <tr> 
            <td style="padding-left:65;">Nama acara</td>
            <td width="470">: <?= $nama_acara;?></td>
          </tr>
          <tr> 
            <td style="padding-left:65;">Aula</td>
            <td width="470">: <?= $aula;?></td>
          </tr>
          <?php $date_akhir=date('Y-m-d', strtotime($akhir_tanggal.'-1 day')); ?>
          
          <?php if($date_akhir!=$mulai_tanggal): ?>
          <tr> 
            <td style="padding-left:65;">Tanggal</td>
            <td width="470">: <?= longdate_indo($mulai_tanggal); ?> - <?= date_indo($date_akhir);?></td>
          </tr>
          <?php elseif($mulai_tanggal==$date_akhir):?>
          <tr> 
            <td style="padding-left:65;">Tanggal</td>
            <td width="470">: <?= longdate_indo($mulai_tanggal); ?></td>
          </tr>
          <?php else: ?>
          <?php endif;?>
          <tr>
            <td style="padding-left:65;">Pukul</td>
            <td width="470">: <?= $mulai_pukul; ?>-<?= $akhir_pukul;?></td>
          </tr>
          <tr>
            <td style="padding-left:65;">Kontak PJ Acara</td>
            <td width="470">: <?= $kontak_pj; ?> (<?= $nama_pj;?>) </td>
          </tr>
        </table>
        <table class="no-surat" align="center" >
          <tr>
            <td width="425"colspan="2" style="padding-left:65;">Dengan ini memberikan izin menggunakan sewa aula sesuai keterangan acara.</td>
          </tr>
          <!-- <tr>
            <td colspan="2">tersebut.</td>
          </tr> -->
          <tr>
            <td colspan="2" height="50"></td>
          </tr>
        </table>
        <table align="center">
          <tr align="right">
            <td width="330" colspan="2"></td>
            <?php $format="%Y-%m-%d"?>
            <td>Bandung, <?= date_indo(@mdate($format));?></td>
          </tr>
          <tr>
            <td colspan="2"></td>
            <td height="70"></td>
          </tr>
          <tr>
            <td colspan="2"></td>
            <td><hr></td>
          </tr>
          <tr>
            <td colspan="2"></td>
            <td align="right">NIP : ..................................</td>
          </tr>
        </table>
    <?php endforeach;?>
</page> 