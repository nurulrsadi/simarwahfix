        <!-- Sidebar -->
        <div id="sidebar">
        	<div class="inner">

        		<!-- Search -->
        		<section id="search" class="alt">
        			<h2><strong>Selamat datang <?php echo $this->session->userdata("username"); ?> !</strong></h2>
        		</section>
        		<?php
        // $kode_himp_sess = $this->session->userdata('kode_himp_sess');
        // // $cek="SELECT `statususer` FROM user='.$jurusan.' "
        // $sess_data['username'] = $session->username;
        $loginuser = $this->session->userdata('username');
        
        $querysession = "SELECT `statususer` FROM `user` WHERE `username` = '$loginuser'
        ";
        // $statususer=$querysession;
        // return $querysession;
        $user=$this->db->query($querysession)->result_array(); 
        // $statusnya = $array['user'];
        //       var_dump($statusnya);
        //       die;

        ?>
        		<?php foreach($user as $i):
          $statususer=$i['statususer'];
        ?>
        		<?php 
        		// $status = $user;
            $statususerlogin=$statususer; 
            // var_dump($statususerlogin);die;?>
        		<?php endforeach;?>
        		<?php
            $queryMenu=" SELECT `tb_status`.`id_status`
                        FROM `tb_status` JOIN `tb_menuuser`
                        ON  `tb_status`.`id_status` = `tb_menuuser`.`status_id`
                        WHERE `tb_menuuser`.`status_id` = $statususerlogin";
            $menu = $this->db->query($queryMenu)->result_array();
            // var_dump($menu); die;
            ?>

        		<!-- Menu -->
        		<nav id="menu">
        			<header class="major">
        				<h2>Menu</h2>
        			</header>
        			<ul>

        				<li><a href="<?php echo base_url() . 'c_user/index'; ?>"><img
        							src="<?php echo base_url('assets/img/sidebarprofile.png') ?>" class="icons" alt="profileicon"
        							width=7% margin=5px> Edit Profil</a></li>
        				<?php foreach($menu as $m) : ?>

        				<? 
                $menuId=$m['status_id'];
                $queryuser =
                  "SELECT *
                        FROM `tb_detailmenu` JOIN `tb_status`
                        ON `tb_detailmenu`.`status_id` = `tb_status`.`id_status`
                        -- ON
                        WHERE `tb_status`.`id_status` = $queryuser
                        ORDER BY `tb_detailmenu`.`id`
                        ";
                $detailmenu = $this->db->query($queryuser)->result_array(); ?>
        				<?php foreach($detailmenu as $dm) : ?>
        				<li><a href="<?php echo base_url($dm['url']) ?>"><img src="<?php echo base_url($dm['icon']) ?>"
        							<?php endforeach;?> class="icons" alt="profileicon" width=7% margin=5px>
        						<? $dm['title']?>s</a></li>
        				<?php endforeach;?>
        				<!-- <li><img src="<?=base_url($m['icon']) ?>" class="icons" alt="profileicon" width=7% margin=5px> Pengajuan
        					Uang</a></li> -->
        				<!-- <li><a href="<?php echo base_url() . 'c_user/Pinjam_Aula'; ?>"><img
        							src="<?php echo base_url('assets/img/sidebarrentfix.png') ?>" class="icons" alt="profileicon"
        							width=7% margin=5px> Peminjaman Aula SC</a></li> -->
        				<li><a href="<?php echo base_url() . 'c_user/Guide_HMJ'; ?>"><img
        							src="<?php echo base_url('assets/img/sidebarguide.png') ?>" class="icons" alt="profileicon"
        							width=7% margin=5px> Panduan SIMARWAH</a></li>
        				<li><a href="<?php echo base_url() . 'c_home/index'; ?>"><img
        							src="<?php echo base_url('assets/img/sidebarlogout.png') ?>" class="icons" alt="profileicon"
        							width=7% margin=5px> Log Out</a></li>
        			</ul>
        		</nav>

        		\
        		<!-- Footer -->
        		<footer id="footer">
        			<p class="copyright">Jika Anda mengalami kesulitan, silahkan klik <a
        					href="<?php echo base_url() . 'c_user/keluhan'; ?>">disini</a>.
        			</p>
        		</footer>

        	</div>
        </div>

        </div>
