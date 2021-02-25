        <!-- Sidebar -->
        <div id="sidebar">
        	<div class="inner">

				<!-- Search -->
				<section id="search" class="alt">
					<h2><strong>Selamat datang, <br> Admin dari <?php echo $this->session->userdata("user_login"); ?> !</strong></h2>
        </section>
				<?php
        $loginuser = $this->session->userdata('username');
        $querysession = "SELECT `statususer` FROM `user` WHERE `username` = '$loginuser'";
        $user=$this->db->query($querysession)->result_array(); 
        ?>
        		<?php foreach($user as $i):
          $statususer=$i['statususer'];
        ?>
        		<?php 
        		$statususerlogin=$statususer;
        		$queryuser =
            "SELECT *
							FROM `tb_detailmenu` JOIN `tb_status`
							ON `tb_detailmenu`.`status_id` = `tb_status`.`id_status`
							-- ON
							WHERE `tb_status`.`id_status` = $statususerlogin
							ORDER BY `tb_detailmenu`.`id`
							";?>
        		<?php $usernya=$this->db->query($queryuser)->result_array(); ?>

        		<nav id="menu">
        			<header class="major">
        				<h2>Menu</h2>
        			</header>
        			<ul>
        				<li><a href="<?php echo base_url() . 'c_user/index'; ?>"><i class="fas fa-user fa-2x "></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Edit
        						Profil</a></li>
									<li><a href="<?php echo base_url() . 'c_user/Program_Kerja'; ?>"><i class="fas fa-clipboard-list fa-2x"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Program Kerja</a></li>
									<li><a href="<?php echo base_url() . 'c_user/Data_Anggota'; ?>"><i class="fas fa-clipboard-list fa-2x"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Data Anggota</a></li>
									<li><a href="<?php echo base_url() . 'c_user/Prestasi_organisasi'; ?>"><i class="fas fa-trophy fa-2x "></i>&nbsp;&nbsp;&nbsp;Data Prestasi</a></li>
									<li><a href="<?php echo base_url() . 'c_user/Riwayat_Pengajuan/'.$this->session->userdata("kode_himp_sess"); ?>"><i class="fas fa-tasks fa-2x"></i>&nbsp;&nbsp;&nbsp;&nbsp;Riwayat & Status <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pengajuan Anggaran Dana</a></li>	
								<?php foreach($usernya as $m) : ?>
        				<li><a href="<?=base_url($m['url']); ?>"><i class="<?= $m['icon']; ?>"></i>&nbsp;
        						<?= $m['title']; ?></a></li>
        				<?php endforeach;?>
                <?php endforeach;?>
                <li><a href="<?php echo base_url() . 'c_user/ChangePassword'; ?>"><i class="fas fa-key fa-2x"></i>&nbsp;&nbsp;&nbsp;
        						Edit Password</a></li>
        				<li><a href="<?php echo base_url() . 'c_user/PanduanSimarwah'; ?>"><i class="fas fa-book-reader fa-2x "></i>&nbsp;&nbsp;&nbsp;
        						Panduan SIMARWAH</a></li>
        				<li><a href="<?php echo base_url() . 'data/logout'; ?>"><i class="fas fa-sign-out-alt fa-2x"></i>&nbsp;&nbsp;&nbsp;&nbsp;Log
        						Out</a></li>
        			</ul>
        		</nav>


        		<!-- Footer -->
        		<footer id="footer">
        			<p class="copyright"><i class="fas fa-question-circle"></i><b> Jika Anda mengalami kesulitan, silahkan
        					klik
        					<a href="<?php echo base_url() . 'c_user/keluhan'; ?>">disini</a>. </b>
        			</p>
        		</footer>

        	</div>
        </div>

        </div>
