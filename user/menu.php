<div class="sidebar-menu">

  <div class="sidebar-menu-inner">

    <header class="logo-env">

      <!-- logo -->
      <div class="logo">
        <a href="index.php">
          <img src="../assets/images/logo@2x.png" width="120" alt="" />
        </a>
      </div>

      <!-- logo collapse icon -->
      <div class="sidebar-collapse">
        <a href="#" class="sidebar-collapse-icon"><!-- add class "with-animation" if you want sidebar to have animation during expanding/collapsing transition -->
          <i class="entypo-menu"></i>
        </a>
      </div>


      <!-- open/close menu icon (do not remove if you want to enable menu on mobile devices) -->
      <div class="sidebar-mobile-menu visible-xs">
        <a href="#" class="with-animation"><!-- add class "with-animation" to support animation -->
          <i class="entypo-menu"></i>
        </a>
      </div>

    </header>


    <ul id="main-menu" class="main-menu">
      <!-- add class "multiple-expanded" to allow multiple submenus to open -->
      <!-- class "auto-inherit-active-class" will automatically add "active" class for parent elements who are marked already with class "active" -->
      <li class="active opened active">
        <a href="index.php">
          <i class="entypo-gauge"></i>
          <span class="title">Anasayfa</span>
        </a></li>

        <?php if($uyetip != "1")
          {

  echo'  <li>
            <a href="#">
              <i class="entypo-table"></i>
            <span class="title">Rehber Yönetimi (Sadece VIP)</span>
            </a>
          </li>';
          
            
          }
          else {
            echo '<li>
            <a href="rehber-yonetimi.php">
              <i class="entypo-star"></i>
            <span class="title">Rehber Yönetimi</span>
            </a>
          </li>';
            } ?>
        <li class="has-sub">
          <a href="#">
            <i class="entypo-user"></i>
            <span class="title">Ticket İşlemleri</span>
          </a>
          <ul>
            <li>
              <a href="mesaj-yolla.php">
                <span class="title">Ticket Oluştur</span>
              </a>
            </li>
              <li>
                  <a href="gelen-ticketlar.php">
                      <span class="title">Gelen Ticketler</span>
                  </a>
              </li>
            <li>
              <a href="mesajlar.php">
                <span class="title">Giden Ticketler</span>
              </a>
            </li>

          </ul>
        </li>
      
      <li>
        <a href="teklif-iste.php">
          <i class="entypo-vcard"></i>
          <span class="title">Teklif İste</span>
        </a>
      </li>

         <li>
            <a href="satis.php">
                <i class="entypo-basket"></i>
                <span class="title">Satış</span>
            </a>
        </li>
        <li>
            <a href="sepet.php">
                <i class="entypo-basket"></i>
                <span class="title">Sepet</span>
            </a>
        </li>

        <li>
            <a href="ziyaretci-defteri.php">
                <i class="entypo-book"></i>
                <span class="title">Ziyaretçi Defteri</span>
            </a>
        </li>
    </ul>

  </div>

</div>
