<nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
    <li class="nav-item">
      <a href="./adminshell.php?page=gallery" 
        class="nav-link 
        <?php
        if(isset($_GET['page']) && $_GET['page'] == 'gallery')
        {
          echo "active";
        }
        ?>
        " style="color: white">
        <i class="nav-icon far fa-image"></i>
        <p>
          Gallery
        </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="./adminshell.php?page=events" 
      class="nav-link
      <?php
      if(isset($_GET['page']) && $_GET['page'] == 'events')
      {
        echo "active";
      }
      ?>
      " style="color: white">
        <i class="nav-icon far fa-calendar"></i>
        <p>
          Events
        </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="./adminshell.php?page=announce_list" 
      class="nav-link
      <?php
      if(isset($_GET['page']) && $_GET['page'] == 'announce_list')
      {
        echo "active";
      }
      ?>
      " style="color: white">
        <i class="nav-icon fas fa-bullhorn"></i>
        <p>
          Announcements
        </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="./adminshell.php?page=users" 
      class="nav-link
      <?php
      if(isset($_GET['page']) && $_GET['page'] == 'users')
      {
        echo "active";
      }
      ?>
      " style="color: white">
        <i class="nav-icon far fa-user"></i>
        <p>
          Users
        </p>
      </a>
    </li>
  </ul>
</nav>