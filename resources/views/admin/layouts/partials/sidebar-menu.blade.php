<div class="sidebar-inner slimscroll">
  <div class="sidebar-menu" id="sidebar-menu">
    <ul>
      <li class="menu-title"><span>MAIN MENU</span></li>
      <li>
        <ul>
          <li class="{{ Route::is('admin.dashboard') ? 'active' : '' }}">
            <a href="{{ route('admin.dashboard') }}">
              <i class="ti ti-smart-home"></i><span>Dashboard</span>
            </a>
          </li>
          <!-- Commands -->
          <li class="{{ Route::is('admin.command*') ? 'active' : '' }}">
            <a href="{{ route('admin.command.index') }}">
              <i class="ti ti-smart-home"></i><span>Commands</span>
            </a>
          </li>
          <li class="submenu">
            <a class="{{ Route::is('admin.group*') ? 'subdrop' : '' }}" href="javascript:void(0);">
              <i class="ti ti-box"></i><span>Groups</span>
              <span class="menu-arrow"></span>
            </a>
            <ul style="{{ Route::is('admin.group*') ? 'display:block' : '' }}">
              <li class="{{ Route::is('admin.group.index') ? 'active' : '' }}">
                <a href="{{ route('admin.group.index') }}">Group List</a>
              </li>
              <li class="{{ Route::is('admin.group.create') ? 'active' : '' }}">
                <a href="{{ route('admin.group.create') }}">Add Group</a>
              </li>
            </ul>
          </li>
          <li class="submenu">
            <a class="{{ Route::is('admin.customer*') ? 'subdrop' : '' }}" href="javascript:void(0);">
              <i class="ti ti-box"></i><span>Customers</span>
              <span class="menu-arrow"></span>
            </a>
            <ul style="{{ Route::is('admin.customer*') ? 'display:block' : '' }}">
              <li class="{{ Route::is('admin.customer.index') ? 'active' : '' }}">
                <a href="{{ route('admin.customer.index') }}">Customer List</a>
              </li>
              <li class="{{ Route::is('admin.customer.create') ? 'active' : '' }}">
                <a href="{{ route('admin.customer.create') }}">Add Customer</a>
              </li>
            </ul>
          </li>
        </ul>
      </li>
      <li class="menu-title"><span>HRM</span></li>
      <li>
        <ul>
          <!-- Employees menu -->
          <li class="submenu">
            <a class="{{ Route::is('admin.employee*') ? 'subdrop' : '' }}" href="javascript:void(0);">
              <i class="ti ti-users"></i><span>Employees</span>
              <span class="menu-arrow"></span>
            </a>
            <ul style="{{ Route::is('admin.employee*') ? 'display:block' : '' }}">
              <li
                class="{{ Route::is('admin.employee.list') || Route::is('admin.employee.show') ? 'active' : '' }}">
                <a href="{{ route('admin.employee.list') }}">Employee Lists</a>
              </li>
              <li class="{{ Route::is('admin.employee.create') ? 'active' : '' }}"><a
                  href="{{ route('admin.employee.create') }}">Add Employee</a></li>
              <li><a href="{{ route('admin.salary-info.index') }}">Salary Info</a></li>
              <li><a href="#">PF Info</a></li>
              <li><a href="#">DPS Info</a></li>
            </ul>
          </li>

          <!-- Branches menu -->
          <li class="submenu">
            <a class="{{ Route::is('admin.branch*') ? 'subdrop' : '' }}" href="javascript:void(0);">
              <i class="ti ti-users"></i><span>Branch</span>
              <span class="menu-arrow"></span>
            </a>
            <ul style="{{ Route::is('admin.branch*') ? 'display:block' : '' }}">
              <li
                class="{{ Route::is('admin.branch.index') || Route::is('admin.branch.show') ? 'active' : '' }}">
                <a href="{{ route('admin.branch.index') }}">Branch List</a>
              </li>
              <li class="{{ Route::is('admin.branch.create') ? 'active' : '' }}"><a
                  href="{{ route('admin.branch.create') }}">Add Branch</a></li>
            </ul>
          </li>

          <!-- Designation menu -->
          <li class="submenu">
            <a class="{{ Route::is('admin.designation*') ? 'subdrop' : '' }}" href="javascript:void(0);">
              <i class="ti ti-users"></i><span>Designation</span>
              <span class="menu-arrow"></span>
            </a>
            <ul style="{{ Route::is('admin.designation*') ? 'display:block' : '' }}">
              <li
                class="{{ Route::is('admin.designation.index') || Route::is('admin.designation.show') ? 'active' : '' }}">
                <a href="{{ route('admin.designation.index') }}">Designation List</a>
              </li>
              <li class="{{ Route::is('admin.designation.create') ? 'active' : '' }}"><a
                  href="{{ route('admin.designation.create') }}">Add Designation</a></li>
            </ul>
          </li>

          <!-- DPS menu -->
          <li class="submenu">
            <a class="{{ Route::is('admin.dps*') ? 'subdrop' : '' }}" href="javascript:void(0);">
              <i class="ti ti-users"></i><span>DPS</span>
              <span class="menu-arrow"></span>
            </a>
            <ul style="{{ Route::is('admin.dps*') ? 'display:block' : '' }}">
              <li class="{{ Route::is('admin.dps.index') ? 'active' : '' }}"><a
                  href="{{ route('admin.dps.index') }}">DPS List</a></li>
              <li class="{{ Route::is('admin.dps.create') ? 'active' : '' }}"><a
                  href="{{ route('admin.dps.create') }}">Add New DPS</a></li>
            </ul>
          </li>

          <li class="submenu">
            <a href="javascript:void(0);">
              <i class="ti ti-ticket"></i><span>Tickets</span>
              <span class="menu-arrow"></span>
            </a>
            <ul>
              <li><a href="tickets.html">Tickets</a></li>
              <li><a href="ticket-details.html">Ticket Details</a></li>
            </ul>
          </li>
          <li>
            <a href="holidays.html">
              <i class="ti ti-calendar-event"></i><span>Holidays</span>
            </a>
          </li>
          <li class="submenu">
            <a class="{{ Route::is('admin.attendance*') ? 'subdrop' : '' }}" href="javascript:void(0);">
              <i class="ti ti-file-time"></i><span>Attendance</span>
              <span class="menu-arrow"></span>
            </a>
            <ul style="{{ Route::is('admin.attendance*') ? 'display:block' : '' }}">
              <li class="submenu submenu-two">
                <a href="javascript:void(0);">Leaves<span class="menu-arrow inside-submenu"></span></a>
                <ul>
                  <li><a href="leaves-employee.html">Leave (Employee)</a></li>
                  <li><a href="leave-settings.html">Leave Settings</a></li>
                </ul>
              </li>
              <li class="{{ Route::is('admin.attendance.index') ? 'active' : '' }}">
                <a href="{{ route('admin.attendance.index') }}">Attendance</a>
              </li>
              <li><a href="{{ route('admin.attendance.settings') }}">Attendance Sheet</a></li>
              <li class="{{ Route::is('admin.attendance.settings') ? 'active' : '' }}">
                <a href="{{ route('admin.attendance.settings') }}">Attendance Settings</a>
              </li>
              {{-- <li><a href="timesheets.html">Timesheets</a></li>
              <li><a href="schedule-timing.html">Shift & Schedule</a></li>
              <li><a href="overtime.html">Overtime</a></li> --}}
            </ul>
          </li>
          <li class="submenu">
            <a href="javascript:void(0);">
              <i class="ti ti-school"></i><span>Performance</span>
              <span class="menu-arrow"></span>
            </a>
            <ul>
              <li><a href="performance-indicator.html">Performance Indicator</a></li>
              <li><a href="performance-review.html">Performance Review</a></li>
              <li><a href="performance-appraisal.html">Performance Appraisal</a></li>
              <li><a href="goal-tracking.html">Goal List</a></li>
              <li><a href="goal-type.html">Goal Type</a></li>
            </ul>
          </li>
          <li>
            <a href="resignation.html">
              <i class="ti ti-external-link"></i><span>Resignation</span>
            </a>
          </li>
          <li>
            <a href="termination.html">
              <i class="ti ti-circle-x"></i><span>Termination</span>
            </a>
          </li>
        </ul>
      </li>
      <li class="menu-title"><span>FINANCE & ACCOUNTS</span></li>
      <li>
        <ul>
          <li class="submenu">
            <a href="javascript:void(0);">
              <i class="ti ti-shopping-cart-dollar"></i><span>Sales</span>
              <span class="menu-arrow"></span>
            </a>
            <ul>
              <li><a href="estimates.html">Estimates</a></li>
              <li><a href="invoices.html">Invoices</a></li>
              <li><a href="payments.html">Payments</a></li>
              <li><a href="expenses.html">Expenses</a></li>
              <li><a href="provident-fund.html">Provident Fund</a></li>
              <li><a href="taxes.html">Taxes</a></li>
            </ul>
          </li>
          <li class="submenu">
            <a href="javascript:void(0);">
              <i class="ti ti-file-dollar"></i><span>Accounting</span>
              <span class="menu-arrow"></span>
            </a>
            <ul>
              <li><a href="categories.html">Categories</a></li>
              <li><a href="budgets.html">Budgets</a></li>
              <li><a href="budget-expenses.html">Budget Expenses</a></li>
              <li><a href="budget-revenues.html">Budget Revenues</a></li>
            </ul>
          </li>
          <li class="submenu">
            <a href="javascript:void(0);">
              <i class="ti ti-cash"></i><span>Payroll</span>
              <span class="menu-arrow"></span>
            </a>
            <ul>
              <li><a href="employee-salary.html">Employee Salary</a></li>
              <li><a href="payslip.html">Payslip</a></li>
              <li><a href="payroll.html">Payroll Items</a></li>
            </ul>
          </li>
        </ul>
      </li>
      <li class="menu-title"><span>ADMINISTRATION</span></li>
      <li>
        <ul>
          <li class="submenu">
            <a href="javascript:void(0);">
              <i class="ti ti-user-star"></i><span>User Management</span>
              <span class="menu-arrow"></span>
            </a>
            <ul>
              <li><a href="users.html">Users</a></li>
              <li><a href="roles-permissions.html">Roles & Permissions</a></li>
            </ul>
          </li>
          <li class="submenu">
            <a href="javascript:void(0);">
              <i class="ti ti-user-star"></i><span>Reports</span>
              <span class="menu-arrow"></span>
            </a>
            <ul>
              <li><a href="expenses-report.html">Expense Report</a></li>
              <li><a href="invoice-report.html">Invoice Report</a></li>
              <li><a href="payment-report.html">Payment Report</a></li>
              <li><a href="project-report.html">Project Report</a></li>
              <li><a href="task-report.html">Task Report</a></li>
              <li><a href="user-report.html">User Report</a></li>
              <li><a href="employee-report.html">Employee Report</a></li>
              <li><a href="payslip-report.html">Payslip Report</a></li>
              <li><a href="attendance-report.html">Attendance Report</a></li>
              <li><a href="leave-report.html">Leave Report</a></li>
              <li><a href="daily-report.html">Daily Report</a></li>
            </ul>
          </li>
          <li class="submenu">
            <a href="javascript:void(0);">
              <i class="ti ti-settings"></i><span>Settings</span>
              <span class="menu-arrow"></span>
            </a>
            <ul>
              <li class="submenu submenu-two">
                <a href="javascript:void(0);">General Settings<span
                    class="menu-arrow inside-submenu"></span></a>
                <ul>
                  <li><a href="profile-settings.html">Profile</a></li>
                  <li><a href="security-settings.html">Security</a></li>
                  <li><a href="notification-settings.html">Notifications</a></li>
                  <li><a href="connected-apps.html">Connected Apps</a></li>
                </ul>
              </li>
              <li class="submenu submenu-two">
                <a href="javascript:void(0);">Website Settings<span
                    class="menu-arrow inside-submenu"></span></a>
                <ul>
                  <li><a href="bussiness-settings.html">Business Settings</a></li>
                  <li><a href="seo-settings.html">SEO Settings</a></li>
                  <li><a href="localization-settings.html">Localization</a></li>
                  <li><a href="prefixes.html">Prefixes</a></li>
                  <li><a href="preferences.html">Preferences</a></li>
                  <li><a href="performance-appraisal.html">Appearance</a></li>
                  <li><a href="language.html">Language</a></li>
                  <li><a href="authentication-settings.html">Authentication</a></li>
                  <li><a href="ai-settings.html">AI Settings</a></li>
                </ul>
              </li>
              <li class="submenu submenu-two">
                <a href="javascript:void(0);">App Settings<span
                    class="menu-arrow inside-submenu"></span></a>
                <ul>
                  <li><a href="salary-settings.html">Salary Settings</a></li>
                  <li><a href="approval-settings.html">Approval Settings</a></li>
                  <li><a href="invoice-settings.html">Invoice Settings</a></li>
                  <li><a href="leave-type.html">Leave Type</a></li>
                  <li><a href="custom-fields.html">Custom Fields</a></li>
                </ul>
              </li>
            </ul>
          </li>
        </ul>
      </li>
    </ul>
  </div>
</div>
