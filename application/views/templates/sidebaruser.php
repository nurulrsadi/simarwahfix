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
        				<li><a href="<?php echo base_url() . 'c_user/index'; ?>"><i class="fas fa-user fa-2x "></i></t> Edit
        						Profil</a></li>
        				<?php foreach($usernya as $m) : ?>

        				<li><a href="<?=base_url($m['url']); ?>"><i class="<?= $m['icon']; ?>"></i>
        						<?= $m['title']; ?></a></li>
        				<?php endforeach;?>
                <?php endforeach;?>
                <li><a href="<?php echo base_url() . 'c_user/Program_Kerja'; ?>"><i class="fas fa-clipboard-list fa-2x "></i> Program Kerja</a></li>
        				<li><a href="<?php echo base_url() . 'c_user/Guide_HMJ'; ?>"><i class="fas fa-book-reader fa-2x "></i>
        						Panduan SIMARWAH</a></li>
        				<li><a href="<?php echo base_url() . 'c_home/index'; ?>"><i class="fas fa-sign-out-alt fa-2x"></i> Log
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
