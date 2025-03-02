<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo">
            <a href="index.php" class="logo-area">
                                <img src= "{{ asset('assets/img/logo/groviio1.png') }}" alt="logo">
                            </a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
              <i class="bx bx-chevron-left bx-sm d-flex align-items-center justify-content-center"></i>
            </a>
          </div>

          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1">
            <!-- Dashboards -->
			<li class="menu-item active">
              <a
                href="dashboard.php"
                
                class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-smile"></i>
                <div class="text-truncate" data-i18n="Dashboard">Dashboard</div>

              </a>
            </li>
			
			<li class="menu-item  {{ Route::is('admin.all-students') ? 'active' : '' }}">
              <a
                href="{{ route('admin.all-students') }}"
                
                class="menu-link">
                <i class="menu-icon tf-icons bx bxs-user-detail"></i>
                <div class="text-truncate" data-i18n="Students">Students</div>

              </a>
            </li>
			
			
			
            

            <!-- Layouts -->
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-user"></i>
                <div class="text-truncate" data-i18n="Instructors">Instructors</div>
              </a>

              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="Instructors.php" class="menu-link">
                    <div class="text-truncate" data-i18n="List Instructors">List Instructors</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="create-instructor.php" class="menu-link">
                    <div class="text-truncate" data-i18n="Create Instructor">Create Instructor</div>
                  </a>
                </li>
                
              </ul>
            </li>
			
			<li class="menu-item">
              <a
                href="payments.php"
                
                class="menu-link">
                <i class="menu-icon tf-icons bx bx-rupee"></i>
                <div class="text-truncate" data-i18n="Payments">Payments</div>

              </a>
            </li>
			
			<li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-book"></i>
                <div class="text-truncate" data-i18n="Course Management">Course Management</div>
              </a>

              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="Courses.php" class="menu-link">
                    <div class="text-truncate" data-i18n="List Courses">List Courses</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="course-categories.php" class="menu-link">
                    <div class="text-truncate" data-i18n="Course Categories">Course Categories</div>
                  </a>
                </li>
                
              </ul>
            </li>
			
			
			<li class="menu-item">
              <a
                href="job-assistance.php"
                
                class="menu-link">
                <i class="menu-icon tf-icons bx bx-crown"></i>
                <div class="text-truncate" data-i18n="Job Assistance">Job Assistance</div>

              </a>
            </li>
			
			<li class="menu-item">
              <a
                href="atandance-management.php"
                
                class="menu-link">
                <i class="menu-icon tf-icons bx bx-grid"></i>
                <div class="text-truncate" data-i18n="Atandance Management">Atandance Management</div>

              </a>
            </li>
			
			<li class="menu-item">
              <a
                href="hr-services.php"
                
                class="menu-link">
                <i class="menu-icon tf-icons bx bx-cube-alt"></i>
                <div class="text-truncate" data-i18n="HR Services">HR Services</div>

              </a>
            </li>
			
			<li class="menu-item">
              <a
                href="careers.php"
                
                class="menu-link">
                <i class="menu-icon tf-icons bx bx-detail"></i>
                <div class="text-truncate" data-i18n="Careers">Careers</div>

              </a>
            </li>
			
			<li class="menu-item">
              <a
                href="consultant-services.php"
                
                class="menu-link">
                <i class="menu-icon tf-icons bx bx-store"></i>
                <div class="text-truncate" data-i18n="Consultant Services">Consultant Services</div>

              </a>
            </li>
			
			
			<li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-book"></i>
                <div class="text-truncate" data-i18n="Reports">Reports</div>
              </a>

              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="#" class="menu-link">
                    <div class="text-truncate" data-i18n="User Reports">User Reports</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="#" class="menu-link">
                    <div class="text-truncate" data-i18n="Payment Reports">Payment Reports</div>
                  </a>
                </li>
                
              </ul>
            </li>
			
			
			
            <li class="menu-item">
              <a
                href="#"
                
                class="menu-link">
                <i class="menu-icon tf-icons bx bx-support"></i>
                <div class="text-truncate" data-i18n="Support">Support</div>
              </a>
            </li>
            
          </ul>
        </aside>