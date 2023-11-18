<aside class="main-sidebar sidebar-dark-warning elevation-4">

    <a href="index.php" class="brand-link">
        <img src="dist/img/eventrix.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-5" style="opacity: .8">
        <span class="brand-text font-weight-light">Eventrix</span>
    </a>
   
    <div class="sidebar" id="sidebar">
        
 <div class="user-panel mt-3 pb-3 mb-3 d-flex">
   <div class="image">
                <img src="dist/img/avatar1.png" class="img-circle  elevation-1" style="width:50px" alt="User Image">
            </div>
            <div class="info">
          <a href="#" class="d-block"><?=  $_SESSION['name'] ?></a>
                
            </div>
        </div>



        <!-- Sidebar Menu -->

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
              
      <?php
    if ($_SESSION['level'] == 'admin') 
	{
                ?>
				   <li class="nav-item  ">
                    <a href="adproceed.php" class="nav-link active">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            home
                        </p>
                    </a>

                </li>
         <li class="nav-item menu-open">
         <a href="#" class="nav-link ">
          <i class="nav-icon fas fa-database"></i>
           <p>
          Master Data
           <i class="right fas fa-angle-left"></i>
           </p>
         </a>
           <ul class="nav nav-treeview">
            <li class="nav-item">
             <a href="./crudcate.php" class="nav-link ">
              <i class="far fa-file-alt"></i>
             <p>food services</p>
            </a>
           </li>
		  <li class="nav-item">
             <a href="./pcrud.php" class="nav-link ">
              <i class="far fa-file-alt"></i>
             <p>photography services</p>
            </a>
           </li> 
			<li class="nav-item">
             <a href="./dec.php" class="nav-link ">
              <i class="far fa-file-alt"></i>
             <p>Decoration</p>
            </a>
           </li>
		   
		  
             </ul>
                    </li>
         <?php } ?>
				  <?php
   if ($_SESSION['level'] == 'user') {
                ?>
				 <li class="nav-item  ">
                    <a href="proceed.php" class="nav-link active">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            home
                        </p>
                    </a>

                </li>
         <li class="nav-item menu-open">
         <a href="#" class="nav-link ">
          <i class="nav-icon fas fa-database"></i>
           <p>
    Users
           <i class="right fas fa-angle-left"></i>
           </p>
         </a>
           <ul class="nav nav-treeview">
            <li class="nav-item">
             <a href="./rating.php" class="nav-link ">
              <i class="far fa-file-alt"></i>
             <p>rating form</p>
            </a>
           </li>
		  <li class="nav-item">
             <a href="./pmnt.php" class="nav-link ">
              <i class="far fa-credit-card"></i>
             <p>payment form</p>
            </a>
           </li> 
		
		   
		  
             </ul>
                    </li>
         <?php } ?>
              
 <li class="nav-item  ">
   <a href="./include/logout.php" class="nav-link bg-red">
 <i class="nav-icon fas fa-power-off"></i>
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