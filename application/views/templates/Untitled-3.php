        <!-- Sidebar -->
        <div id="sidebar">
        	<div class="inner">

        		<!-- Search -->
        		<section id="search" class="alt">
        			<h2><strong>Selamat datang !</strong></h2>
        			<!-- <form method="post" action="#">
										<input type="text" name="query" id="query" placeholder="Search" />
									</form> -->
        		</section>

        		<!-- Menu -->
        		<nav id="menu">
        			<header class="major">
        				<h2>Menu</h2>
        			</header>

        			<ul>
        				<li><a href="<?php echo base_url() . 'c_user/index'; ?>"><img
        							src="<?php echo base_url('assets/img/sidebarprofile.png') ?>" class="icons" alt="profileicon"
        							width=7% margin=5px> Edit Profil</a></li>

        				<?
              $loginuser = $this->session->userdata('username');
              $querysession = "SELECT `statususer` FROM `user` WHERE `username` = '$loginuser'";
              $user=$this->db->query($querysession)->result_array(); ?>
        				<?php foreach($user as $i):
                  $statususer=$i['statususer'];
                ?>
        				<?php 
        		  $statususerlogin=$statususer;?>
        				<?php endforeach;?>
        				<?  
              $queryMenu ="SELECT `tb_status`.`id_status`,`menu`
                            FROM `tb_status` JOIN `tb_menuuser`
                            ON  `tb_status`.`id_status` = `tb_menuuser`.`menu_id`
                            WHERE `tb_menuuser`.`status_id` = $statususerlogin";
              $menu=$this->db->query($queryMenu)->result_array();
              ?>
        				<?php foreach($menu as $m): ?>

        				<? 
              $querySubMenu ="SELECT * FROM `tb_detailmenu` WHERE `tb_detailmenu`.`status_id` = {$m['id_status']}";
              $submenu=$this->db->query($queryMenu)->result_array();
              ?>

        				<?php foreach($submenu as $sm): ?>








        				<li><a href="<?php echo base_url() . 'c_user/Pagu_Anggaran'; ?>"><img
        							src="<?php echo base_url('assets/img/sidebarmoney.png') ?>" class="icons" alt="profileicon"
        							width=7% margin=5px> <?= $sm['title'] ?> </a></li>
        				<?php endforeach;?>
        				<?php endforeach;?>
        				<li><a href="<?php echo base_url() . 'c_user/Pinjam_Aula'; ?>"><img
        							src="<?php echo base_url('assets/img/sidebarrentfix.png') ?>" class="icons" alt="profileicon"
        							width=7% margin=5px> Peminjaman Aula SC</a></li>
        				<li><a href="<?php echo base_url() . 'c_user/Guide_HMJ'; ?>"><img
        							src="<?php echo base_url('assets/img/sidebarguide.png') ?>" class="icons" alt="profileicon"
        							width=7% margin=5px> Panduan SIMARWAH</a></li>
        				<li><a href="<?php echo base_url() . 'c_home/login'; ?>"><img
        							src="<?php echo base_url('assets/img/sidebarlogout.png') ?>" class="icons" alt="profileicon"
        							width=7% margin=5px> Log Out</a></li>
        			</ul>
        		</nav>
        		<!-- Footer -->
        		<footer id="footer">
        			<p class="copyright">Jika Anda mengalami kesulitan, silahkan klik <a
        					href="<?php echo base_url() . 'c_user/keluhan'; ?>">disini</a>.
        			</p>
        		</footer>

        	</div>
        </div>
