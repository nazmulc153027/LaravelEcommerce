
<nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
               View User
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{URL::to('userform')}}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>User management</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('usertable')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>User table</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('brand-category')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Brand management</p>
                </a>
              </li> 
               <li class="nav-item">
                <a href="{{URL::to('order-management')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Product</p>
                </a>
              </li> 
            </ul>
          </li>


          <li class="nav-item menu-open">
            <a href="#" class="nav-link active bg-warning">
              <i class="nav-icon fab fa-product-hunt"></i>
              <p>
              Product Information
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{URL::to('addproduct')}}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add product</p>
                </a>
              </li>
               <li class="nav-item">
                <a href="{{url('producttable')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View product table</p>
                </a>
              </li>
              
             
            </ul>
          </li>
          
      </nav>

