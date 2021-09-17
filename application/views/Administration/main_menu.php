      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <!-- <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url(); ?>">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li> -->
          <?php
            $cont = 0;
            $menuList = $this->session->userdata('menu');
            foreach ($menuList as $key => $menu):
              $bloqueMenu = explode("#",$key);
          ?>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic-<?php echo $cont;?>" aria-expanded="false" aria-controls="ui-basic-<?php echo $cont;?>">
              <!-- <i class="icon-layout menu-icon"></i> -->
              <i class="<?php echo $bloqueMenu[1];?>"></i> &nbsp;
              <span class="menu-title"><?php echo $bloqueMenu[0];?></span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic-<?php echo $cont;?>">
              <ul class="nav flex-column sub-menu">
                 <?php foreach ($menu as $opcion): ?>
                <li class="nav-item">
                  <a class="nav-link" href="<?php echo base_url().$opcion->URI;?>">
                    <?php echo $opcion->nombre; ?>
                  </a>
                </li>
              <?php $cont++; endforeach; ?>
              </ul>
            </div>
          </li>
        <?php endforeach; ?>
        </ul>
      </nav>