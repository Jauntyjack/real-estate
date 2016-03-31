 <header>
      <div class="container">
      <a href="#" data-activates="nav-mobile" class="button-collapse top-nav waves-effect waves-light circle hide-on-large-only"><i class="mdi-navigation-menu"></i></a></div>
      <ul id="nav-mobile" class="side-nav fixed grey lighten-4 " >

        <div class="row">
        <div class="left-align" style="padding-left:30px;padding-top:25px;">
            <img src="<?php echo site_url() ?>assets/images/marketing/<?php echo $this->session->userdata('profilepic');?>" width="50px;" height="50px;" class="circle">
            <br><br>
            <font size="3"><b>Welcome, <?php echo $this->session->userdata('name')?></b></font>
        </div> 
        </div>
        <li class="bold <?php if($pos_name == 'home') echo 'active'; ?>"><a href="<?php echo site_url() ?>home" class="waves-effect waves-light "><i class="tiny material-icons">view_quilt</i> Beranda</a></li>
        <li class="bold <?php if($pos_name == 'listing') echo 'active'; ?>"><a href="<?php echo site_url() ?>listing" class="waves-effect waves-light"><i class="tiny material-icons">description</i> Listing</a></li>
        <li class="bold <?php if($pos_name == 'transaksi') echo 'active'; ?>"><a href="<?php echo site_url() ?>transaksi" class="waves-effect waves-light"><i class="tiny material-icons">shopping_cart</i> Transaksi</a></li>
        <li class="no-padding">
          <ul class="collapsible collapsible-accordion">
            <li class="bold grey lighten-4"><a class="collapsible-header waves-effect waves-light <?php if($pos_name == 'properti' || $pos_name == 'compare' || $pos_name == 'kpr') echo 'active'; ?>">
            <i class="tiny material-icons" style="font-size: 16px; width: 5px;">store</i>Properti</a>
              <div class="collapsible-body">
                <ul>
                  <li class="<?php if($pos_name == 'properti') echo 'active'; ?>"><a href="<?php echo site_url() ?>properti"><i class="tiny material-icons">search</i> Cari</a></li>
                  <li class="<?php if($pos_name == 'compare') echo 'active'; ?>"><a href="<?php echo site_url() ?>properti/compare"><i class="tiny material-icons">view_week</i> Komparasi</a></li>
                  <li class="<?php if($pos_name == 'kpr') echo 'active'; ?>"><a href="<?php echo site_url() ?>properti/kpr"><i class="tiny material-icons">timer</i> Simulasi KPR</a></li>
                </ul>
              </div>
            </li>
          </ul>
        </li>
        <?php if($this->session->userdata('role')=="admin") {  ?>
        <li class="bold <?php if($pos_name == 'laporan') echo 'active';?>"><a href="<?php echo site_url() ?>laporan" class="waves-effect waves-light"><i class="tiny material-icons">receipt</i> Laporan</a></li>
        <?php } ?>
        <li class="bold"><a href="<?php echo site_url() ?>account/dologout" class="waves-effect waves-light"><i class="tiny material-icons">perm_identity</i> Logout</a></li>
      </ul>
    </header>
