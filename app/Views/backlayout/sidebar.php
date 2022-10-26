  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="<?php echo base_url('/') ?>" class="brand-link">
          <img src="<?php echo base_url('AdminLTE/dist') ?>/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
          <span class="brand-text font-weight-light">AdminLTE 3</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
              <div class="image">
                  <img src="<?php echo base_url('AdminLTE/dist') ?>/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
              </div>
              <div class="info">
                  <a href="#" class="d-block"><?= session()->get('name'); ?></a>
              </div>
          </div>

          <!-- SidebarSearch Form 
          <div class="form-inline">
              <div class="input-group" data-widget="sidebar-search">
                  <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                  <div class="input-group-append">
                      <button class="btn btn-sidebar">
                          <i class="fas fa-search fa-fw"></i>
                      </button>
                  </div>
              </div>
          </div>-->

          <!-- Sidebar Menu -->
          <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                  <!-- Add icons to the links using the .nav-icon class
                  with font-awesome or any other icon font library -->
                  <li class="nav-item menu-open">
                      <a href="<?php echo base_url('GrafikAnalisaProfil'); ?>" class="nav-link active">
                          <i class="nav-icon fas fa-tachometer-alt"></i>
                          <p>
                              Dashboard
                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="#" class="nav-link">
                          <i class="nav-icon fas fa-copy"></i>
                          <p>
                              Data Master
                              <i class="fas fa-angle-left right"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="<?php echo base_url('angkatan'); ?>" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Angkatan</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="<?php echo base_url('matakuliah'); ?>" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Matakuliah</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="<?php echo base_url('prodi'); ?>" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Prodi</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="<?php echo base_url('profil'); ?>" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Profil Lulusan</p>
                              </a>
                          </li>
                      </ul>
                  </li>
                  <li class="nav-item">
                      <a href="#" class="nav-link">
                          <i class="nav-icon fas fa-chart-pie"></i>
                          <p>
                              Data Mahasiswa
                              <i class="right fas fa-angle-left"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="<?php echo base_url('mahasiswa'); ?>" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Mahasiswa</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="<?php echo base_url('nilai'); ?>" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Nilai Mahasiswa</p>
                              </a>
                          </li>
                      </ul>
                  </li>
                  <!--<li class="nav-item">
                      <a href="#" class="nav-link">
                          <i class="nav-icon fas fa-tree"></i>
                          <p>
                              Data Evaluasi Prodi
                              <i class="fas fa-angle-left right"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Standar Pendidikan</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Aspek Pendidikan</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Evaluasi</p>
                              </a>
                          </li>
                      </ul>
                  </li>-->
                  <li class="nav-item">
                      <a href="#" class="nav-link">
                          <i class="nav-icon fas fa-edit"></i>
                          <p>
                              Analisa Data
                              <i class="fas fa-angle-left right"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="<?php echo base_url('analisaprofil'); ?>" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Analisa Profil Lulusan</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="<?php echo base_url('hasil'); ?>" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Cetak Hasil Klasifikasi</p>
                              </a>
                          </li>
                          <!--<li class="nav-item">
                              <a href="?php echo base_url('GrafikAnalisaProfil'); ?>" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Grafik Profil Lulusan</p>
                              </a>
                          </li>-->
                      </ul>
                  </li>
                  <li class="nav-item">
                      <a href="<?= base_url(); ?>/logout" class="nav-link">
                          <i class="nav-icon fas fa-sign-out-alt    "></i>
                          <p>
                              Logout
                          </p>
                      </a>
                  </li>
              </ul>
          </nav>
          <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
  </aside>