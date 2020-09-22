<header class="main-header">
    <a href="<?php echo site_url('web'); ?> " class="logo">
		<span class="logo-mini"><b>IT</b>A</span>
		<span class="logo-lg"><b>ITAsset</b> (SIMITA)</span>
	</a>
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>
        <?php
            if ($this->session->userdata('role')!='Admin'){
                $gid = $this->session->userdata('gid');
                $group = $this->db->get_where('tb_group',array('gid <>' => $gid))->result_array();
                echo '<div class="navbar-menu">
                        <ul class="nav navbar-nav">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" ><i class="fa fa-users"></i> '.$this->session->userdata('group').'<span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">';
                                    foreach($group as $g){
                                        echo '<li><a href="#" onclick="changeGroup('.$g['gid'].')"><i class="fa fa-users"></i> '.$g['nama_group'].'</a></li>';
                                    }                                 
                               echo' 
                                </ul>
                            </li>
                        </ul>
                    </div>';
            }
        ?>
        
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">               
                <li><a href="#" class="current-time"><span id="the-day"></span> <span id="the-time"></span></a></li>
                
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="<?php echo base_url('assets/img/avatar5.png'); ?>" class="user-image" alt="User Image"/>
                        <span class="hidden-xs"><?php echo $this->session->userdata('username'); ?> </span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="<?php echo base_url('assets/img/avatar5.png'); ?>" class="img-circle" alt="User Image" />
                            <p>
                                <?php echo $this->session->userdata('role'); ?> 
                                <small>Last Login , <?php echo tgl_lengkap($this->session->userdata('last_login')); ?></small>
                            </p>
                        </li>
                        <!-- Menu Body -->                                    
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="#" class="btn btn-default btn-flat">Profile</a>
                            </div>
                            <div class="pull-right">
                                <a href="<?php echo site_url('login/logout'); ?>" class="btn btn-default btn-flat">Sign out</a>
                            </div>
                        </li>                        
                    </ul>
                </li>
                
            </ul>
        </div>
    </nav>
</header>
