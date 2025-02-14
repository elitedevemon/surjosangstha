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
        </ul>
      </li>
      <!-- Commands -->
      <li>
        <ul>
          <li class="{{ Route::is('admin.command*') ? 'active' : '' }}">
            <a href="{{ route('admin.command.index') }}">
              <i class="ti ti-smart-home"></i><span>Commands</span>
            </a>
          </li>
        </ul>
      </li>
      <li>
        <ul>
          <li class="submenu">
            <a href="javascript:void(0);">
              <i class="ti ti-box"></i><span>Groups</span>
              <span class="menu-arrow"></span>
            </a>
            <ul>
              <li><a href="projects-grid.html">Group List</a></li>
              <li><a href="projects-grid.html">Add Group</a></li>
            </ul>
          </li>
        </ul>
      </li>
      <li class="menu-title"><span>HRM</span></li>
      <li>
        <ul>
          <!-- Employees menu -->
          <li class="submenu">
            <a href="javascript:void(0);" class="{{ Route::is('admin.employee*') ? 'subdrop' : '' }}">
              <i class="ti ti-users"></i><span>Employees</span>
              <span class="menu-arrow"></span>
            </a>
            <ul  style="{{ Route::is('admin.employee*') ? 'display:block' : '' }}">
              <li class="{{ Route::is('admin.employee.list') || Route::is('admin.employee.show') ? 'active' : '' }}"><a href="{{ route('admin.employee.list') }}">Employee Lists</a></li>
              <li class="{{ Route::is('admin.employee.create') ? 'active' : '' }}"><a href="{{ route('admin.employee.create') }}">Add Employee</a></li>
              <li><a href="{{ route('admin.salary-info.index') }}">Salary Info</a></li>
              <li><a href="#">PF Info</a></li>
              <li><a href="#">DPS Info</a></li>
            </ul>
          </li>

          <!-- Branches menu -->
          <li class="submenu">
            <a href="javascript:void(0);" class="{{ Route::is('admin.branch*') ? 'subdrop' : '' }}">
              <i class="ti ti-users"></i><span>Branch</span>
              <span class="menu-arrow"></span>
            </a>
            <ul  style="{{ Route::is('admin.branch*') ? 'display:block' : '' }}">
              <li class="{{ Route::is('admin.branch.index') || Route::is('admin.branch.show') ? 'active' : '' }}"><a href="{{ route('admin.branch.index') }}">Branch List</a></li>
              <li class="{{ Route::is('admin.branch.create') ? 'active' : '' }}"><a href="{{ route('admin.branch.create') }}">Add Branch</a></li>
            </ul>
          </li>

          <!-- Designation menu -->
          <li class="submenu">
            <a href="javascript:void(0);" class="{{ Route::is('admin.designation*') ? 'subdrop' : '' }}">
              <i class="ti ti-users"></i><span>Designation</span>
              <span class="menu-arrow"></span>
            </a>
            <ul  style="{{ Route::is('admin.designation*') ? 'display:block' : '' }}">
              <li class="{{ Route::is('admin.designation.index') || Route::is('admin.designation.show') ? 'active' : '' }}"><a href="{{ route('admin.designation.index') }}">Designation List</a></li>
              <li class="{{ Route::is('admin.designation.create') ? 'active' : '' }}"><a href="{{ route('admin.designation.create') }}">Add Designation</a></li>
            </ul>
          </li>

          <!-- DPS menu -->
          <li class="submenu">
            <a href="javascript:void(0);" class="{{ Route::is('admin.dps*') ? 'subdrop' : '' }}">
              <i class="ti ti-users"></i><span>DPS</span>
              <span class="menu-arrow"></span>
            </a>
            <ul  style="{{ Route::is('admin.dps*') ? 'display:block' : '' }}">
              <li class="{{ Route::is('admin.dps.index') ? 'active' : '' }}"><a href="{{ route('admin.dps.index') }}">DPS List</a></li>
              <li class="{{ Route::is('admin.dps.create') ? 'active' : '' }}"><a href="{{ route('admin.dps.create') }}">Add New DPS</a></li>
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
            <a href="javascript:void(0);">
              <i class="ti ti-file-time"></i><span>Attendance</span>
              <span class="menu-arrow"></span>
            </a>
            <ul>
              <li class="submenu submenu-two">
                <a href="javascript:void(0);">Leaves<span class="menu-arrow inside-submenu"></span></a>
                <ul>
                  <li><a href="leaves.html">Leaves (Admin)</a></li>
                  <li><a href="leaves-employee.html">Leave (Employee)</a></li>
                  <li><a href="leave-settings.html">Leave Settings</a></li>
                </ul>
              </li>
              <li><a href="attendance-admin.html">Attendance (Admin)</a></li>
              <li><a href="attendance-employee.html">Attendance (Employee)</a></li>
              <li><a href="timesheets.html">Timesheets</a></li>
              <li><a href="schedule-timing.html">Shift & Schedule</a></li>
              <li><a href="overtime.html">Overtime</a></li>
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
          <li class="submenu">
            <a href="javascript:void(0);">
              <i class="ti ti-edit"></i><span>Training</span>
              <span class="menu-arrow"></span>
            </a>
            <ul>
              <li><a href="training.html">Training List</a></li>
              <li><a href="trainers.html">Trainers</a></li>
              <li><a href="training-type.html">Training Type</a></li>
            </ul>
          </li>
          <li>
            <a href="promotion.html">
              <i class="ti ti-speakerphone"></i><span>Promotion</span>
            </a>
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
      <li class="menu-title"><span>RECRUITMENT</span></li>
      <li>
        <ul>
          <li>
            <a href="job-grid.html">
              <i class="ti ti-timeline"></i><span>Jobs</span>
            </a>
          </li>
          <li>
            <a href="candidates-grid.html">
              <i class="ti ti-user-shield"></i><span>Candidates</span>
            </a>
          </li>
          <li>
            <a href="refferals.html">
              <i class="ti ti-ux-circle"></i><span>Referrals</span>
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
              <i class="ti ti-cash"></i><span>Assets</span>
              <span class="menu-arrow"></span>
            </a>
            <ul>
              <li><a href="assets.html">Assets</a></li>
              <li><a href="asset-categories.html">Asset Categories</a></li>
            </ul>
          </li>
          <li class="submenu">
            <a href="javascript:void(0);">
              <i class="ti ti-headset"></i><span>Help & Supports</span>
              <span class="menu-arrow"></span>
            </a>
            <ul>
              <li><a href="knowledgebase.html">Knowledge Base</a></li>
              <li><a href="activity.html">Activities</a></li>
            </ul>
          </li>
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
              <li class="submenu submenu-two">
                <a href="javascript:void(0);">System Settings<span
                    class="menu-arrow inside-submenu"></span></a>
                <ul>
                  <li><a href="email-settings.html">Email Settings</a></li>
                  <li><a href="email-template.html">Email Templates</a></li>
                  <li><a href="sms-settings.html">SMS Settings</a></li>
                  <li><a href="sms-template.html">SMS Templates</a></li>
                  <li><a href="otp-settings.html">OTP</a></li>
                  <li><a href="gdpr.html">GDPR Cookies</a></li>
                  <li><a href="maintenance-mode.html">Maintenance Mode</a></li>
                </ul>
              </li>
              <li class="submenu submenu-two">
                <a href="javascript:void(0);">Financial Settings<span
                    class="menu-arrow inside-submenu"></span></a>
                <ul>
                  <li><a href="payment-gateways.html">Payment Gateways</a></li>
                  <li><a href="tax-rates.html">Tax Rate</a></li>
                  <li><a href="currencies.html">Currencies</a></li>
                </ul>
              </li>
              <li class="submenu submenu-two">
                <a href="javascript:void(0);">Other Settings<span
                    class="menu-arrow inside-submenu"></span></a>
                <ul>
                  <li><a href="custom-css.html">Custom CSS</a></li>
                  <li><a href="custom-js.html">Custom JS</a></li>
                  <li><a href="cronjob.html">Cronjob</a></li>
                  <li><a href="storage-settings.html">Storage</a></li>
                  <li><a href="ban-ip-address.html">Ban IP Address</a></li>
                  <li><a href="backup.html">Backup</a></li>
                  <li><a href="clear-cache.html">Clear Cache</a></li>
                </ul>
              </li>
            </ul>
          </li>
        </ul>
      </li>
      <li class="menu-title"><span>CONTENT</span></li>
      <li>
        <ul>
          <li>
            <a href="pages.html">
              <i class="ti ti-box-multiple"></i><span>Pages</span>
            </a>
          </li>
          <li class="submenu">
            <a href="javascript:void(0);">
              <i class="ti ti-brand-blogger"></i><span>Blogs</span>
              <span class="menu-arrow"></span>
            </a>
            <ul>
              <li><a href="blogs.html">All Blogs</a></li>
              <li><a href="blog-categories.html">Categories</a></li>
              <li><a href="blog-comments.html">Comments</a></li>
              <li><a href="blog-tags.html">Blog Tags</a></li>
            </ul>
          </li>
          <li class="submenu">
            <a href="javascript:void(0);">
              <i class="ti ti-map-pin-check"></i><span>Locations</span>
              <span class="menu-arrow"></span>
            </a>
            <ul>
              <li><a href="countries.html">Countries</a></li>
              <li><a href="states.html">States</a></li>
              <li><a href="cities.html">Cities</a></li>
            </ul>
          </li>
          <li>
            <a href="testimonials.html">
              <i class="ti ti-message-2"></i><span>Testimonials</span>
            </a>
          </li>
          <li>
            <a href="faq.html">
              <i class="ti ti-question-mark"></i><span>FAQ’S</span>
            </a>
          </li>
        </ul>
      </li>
      <li class="menu-title"><span>PAGES</span></li>
      <li>
        <ul>
          <li>
            <a href="starter.html">
              <i class="ti ti-layout-sidebar"></i><span>Starter</span>
            </a>
          </li>
          <li>
            <a href="profile.html">
              <i class="ti ti-user-circle"></i><span>Profile</span>
            </a>
          </li>
          <li>
            <a href="gallery.html">
              <i class="ti ti-photo"></i><span>Gallery</span>
            </a>
          </li>
          <li>
            <a href="search-result.html">
              <i class="ti ti-list-search"></i><span>Search Results</span>
            </a>
          </li>
          <li>
            <a href="timeline.html">
              <i class="ti ti-timeline"></i><span>Timeline</span>
            </a>
          </li>
          <li>
            <a href="pricing.html">
              <i class="ti ti-file-dollar"></i><span>Pricing</span>
            </a>
          </li>
          <li>
            <a href="coming-soon.html">
              <i class="ti ti-progress-bolt"></i><span>Coming Soon</span>
            </a>
          </li>
          <li>
            <a href="under-maintenance.html">
              <i class="ti ti-alert-octagon"></i><span>Under Maintenance</span>
            </a>
          </li>
          <li>
            <a href="under-construction.html">
              <i class="ti ti-barrier-block"></i><span>Under Construction</span>
            </a>
          </li>
          <li>
            <a href="api-keys.html">
              <i class="ti ti-api"></i><span>API Keys</span>
            </a>
          </li>
          <li>
            <a href="privacy-policy.html">
              <i class="ti ti-file-description"></i><span>Privacy Policy</span>
            </a>
          </li>
          <li>
            <a href="terms-condition.html">
              <i class="ti ti-file-check"></i><span>Terms & Conditions</span>
            </a>
          </li>
        </ul>
      </li>
      <li class="menu-title"><span>AUTHENTICATION</span></li>
      <li>
        <ul>
          <li class="submenu">
            <a href="javascript:void(0);">
              <i class="ti ti-login"></i><span>Login</span><span class="menu-arrow"></span>
            </a>
            <ul>
              <li><a href="login.html">Cover</a></li>
              <li><a href="login-2.html">Illustration</a></li>
              <li><a href="login-3.html">Basic</a></li>
            </ul>
          </li>
          <li class="submenu">
            <a href="javascript:void(0);">
              <i class="ti ti-forms"></i><span>Register</span><span class="menu-arrow"></span>
            </a>
            <ul>
              <li><a href="register.html">Cover</a></li>
              <li><a href="register-2.html">Illustration</a></li>
              <li><a href="register-3.html">Basic</a></li>
            </ul>
          </li>
          <li class="submenu">
            <a href="javascript:void(0);">
              <i class="ti ti-help-triangle"></i><span>Forgot Password</span><span
                class="menu-arrow"></span>
            </a>
            <ul>
              <li><a href="forgot-password.html">Cover</a></li>
              <li><a href="forgot-password-2.html">Illustration</a></li>
              <li><a href="forgot-password-3.html">Basic</a></li>
            </ul>
          </li>
          <li class="submenu">
            <a href="javascript:void(0);">
              <i class="ti ti-restore"></i><span>Reset Password</span><span class="menu-arrow"></span>
            </a>
            <ul>
              <li><a href="reset-password.html">Cover</a></li>
              <li><a href="reset-password-2.html">Illustration</a></li>
              <li><a href="reset-password-3.html">Basic</a></li>
            </ul>
          </li>
          <li class="submenu">
            <a href="javascript:void(0);">
              <i class="ti ti-mail-exclamation"></i><span>Email Verification</span><span
                class="menu-arrow"></span>
            </a>
            <ul>
              <li><a href="email-verification.html">Cover</a></li>
              <li><a href="email-verification-2.html">Illustration</a></li>
              <li><a href="email-verification-3.html">Basic</a></li>
            </ul>
          </li>
          <li class="submenu">
            <a href="javascript:void(0);">
              <i class="ti ti-password"></i><span>2 Step Verification</span><span class="menu-arrow"></span>
            </a>
            <ul>
              <li><a href="two-step-verification.html">Cover</a></li>
              <li><a href="two-step-verification-2.html">Illustration</a></li>
              <li><a href="two-step-verification-3.html">Basic</a></li>
            </ul>
          </li>
          <li><a href="lock-screen.html"><i class="ti ti-lock-square"></i><span>Lock Screen</span></a></li>
          <li><a href="error-404.html"><i class="ti ti-error-404"></i><span>404 Error</span></a></li>
          <li><a href="error-500.html"><i class="ti ti-server"></i><span>500 Error</span></a></li>
        </ul>
      </li>
      <li class="menu-title"><span>UI INTERFACE</span></li>
      <li>
        <ul>
          <li class="submenu">
            <a href="javascript:void(0);">
              <i class="ti ti-hierarchy-2"></i>
              <span>Base UI</span>
              <span class="menu-arrow"></span>
            </a>
            <ul>
              <li>
                <a href="ui-alerts.html">Alerts</a>
              </li>
              <li>
                <a href="ui-accordion.html">Accordion</a>
              </li>
              <li>
                <a href="ui-avatar.html">Avatar</a>
              </li>
              <li>
                <a href="ui-badges.html">Badges</a>
              </li>
              <li>
                <a href="ui-borders.html">Border</a>
              </li>
              <li>
                <a href="ui-buttons.html">Buttons</a>
              </li>
              <li>
                <a href="ui-buttons-group.html">Button Group</a>
              </li>
              <li>
                <a href="ui-breadcrumb.html">Breadcrumb</a>
              </li>
              <li>
                <a href="ui-cards.html">Card</a>
              </li>
              <li>
                <a href="ui-carousel.html">Carousel</a>
              </li>
              <li>
                <a href="ui-colors.html">Colors</a>
              </li>
              <li>
                <a href="ui-dropdowns.html">Dropdowns</a>
              </li>
              <li>
                <a href="ui-grid.html">Grid</a>
              </li>
              <li>
                <a href="ui-images.html">Images</a>
              </li>
              <li>
                <a href="ui-lightbox.html">Lightbox</a>
              </li>
              <li>
                <a href="ui-media.html">Media</a>
              </li>
              <li>
                <a href="ui-modals.html">Modals</a>
              </li>
              <li>
                <a href="ui-offcanvas.html">Offcanvas</a>
              </li>
              <li>
                <a href="ui-pagination.html">Pagination</a>
              </li>
              <li>
                <a href="ui-popovers.html">Popovers</a>
              </li>
              <li>
                <a href="ui-progress.html">Progress</a>
              </li>
              <li>
                <a href="ui-placeholders.html">Placeholders</a>
              </li>
              <li>
                <a href="ui-spinner.html">Spinner</a>
              </li>
              <li>
                <a href="ui-sweetalerts.html">Sweet Alerts</a>
              </li>
              <li>
                <a href="ui-nav-tabs.html">Tabs</a>
              </li>
              <li>
                <a href="ui-toasts.html">Toasts</a>
              </li>
              <li>
                <a href="ui-tooltips.html">Tooltips</a>
              </li>
              <li>
                <a href="ui-typography.html">Typography</a>
              </li>
              <li>
                <a href="ui-video.html">Video</a>
              </li>
              <li>
                <a href="ui-sortable.html">Sortable</a>
              </li>
              <li>
                <a href="ui-swiperjs.html">Swiperjs</a>
              </li>
            </ul>
          </li>
          <li class="submenu">
            <a href="javascript:void(0);">
              <i class="ti ti-hierarchy-3"></i>
              <span>Advanced UI</span>
              <span class="menu-arrow"></span>
            </a>
            <ul>
              <li>
                <a href="ui-ribbon.html">Ribbon</a>
              </li>
              <li>
                <a href="ui-clipboard.html">Clipboard</a>
              </li>
              <li>
                <a href="ui-drag-drop.html">Drag & Drop</a>
              </li>
              <li>
                <a href="ui-rangeslider.html">Range Slider</a>
              </li>
              <li>
                <a href="ui-rating.html">Rating</a>
              </li>
              <li>
                <a href="ui-text-editor.html">Text Editor</a>
              </li>
              <li>
                <a href="ui-counter.html">Counter</a>
              </li>
              <li>
                <a href="ui-scrollbar.html">Scrollbar</a>
              </li>
              <li>
                <a href="ui-stickynote.html">Sticky Note</a>
              </li>
              <li>
                <a href="ui-timeline.html">Timeline</a>
              </li>
            </ul>
          </li>
          <li class="submenu">
            <a href="javascript:void(0);">
              <i class="ti ti-input-search"></i>
              <span>Forms</span>
              <span class="menu-arrow"></span>
            </a>
            <ul>
              <li class="submenu submenu-two">
                <a href="javascript:void(0);">Form Elements <span class="menu-arrow inside-submenu"></span>
                </a>
                <ul>
                  <li>
                    <a href="form-basic-inputs.html">Basic Inputs</a>
                  </li>
                  <li>
                    <a href="form-checkbox-radios.html">Checkbox & Radios</a>
                  </li>
                  <li>
                    <a href="form-input-groups.html">Input Groups</a>
                  </li>
                  <li>
                    <a href="form-grid-gutters.html">Grid & Gutters</a>
                  </li>
                  <li>
                    <a href="form-select.html">Form Select</a>
                  </li>
                  <li>
                    <a href="form-mask.html">Input Masks</a>
                  </li>
                  <li>
                    <a href="form-fileupload.html">File Uploads</a>
                  </li>
                </ul>
              </li>
              <li class="submenu submenu-two">
                <a href="javascript:void(0);">Layouts <span class="menu-arrow inside-submenu"></span>
                </a>
                <ul>
                  <li>
                    <a href="form-horizontal.html">Horizontal Form</a>
                  </li>
                  <li>
                    <a href="form-vertical.html">Vertical Form</a>
                  </li>
                  <li>
                    <a href="form-floating-labels.html">Floating Labels</a>
                  </li>
                </ul>
              </li>
              <li>
                <a href="form-validation.html">Form Validation</a>
              </li>

              <li>
                <a href="form-select2.html">Select2</a>
              </li>
              <li>
                <a href="form-wizard.html">Form Wizard</a>
              </li>
              <li>
                <a href="form-pickers.html">Form Picker</a>
              </li>

            </ul>
          </li>
          <li class="submenu">
            <a href="javascript:void(0);">
              <i class="ti ti-table-plus"></i>
              <span>Tables</span>
              <span class="menu-arrow"></span>
            </a>
            <ul>
              <li>
                <a href="tables-basic.html">Basic Tables </a>
              </li>
              <li>
                <a href="data-tables.html">Data Table </a>
              </li>
            </ul>
          </li>
          <li class="submenu">
            <a href="javascript:void(0);">
              <i class="ti ti-chart-line"></i>
              <span>Charts</span>
              <span class="menu-arrow"></span>
            </a>
            <ul>
              <li>
                <a href="chart-apex.html">Apex Charts</a>
              </li>
              <li>
                <a href="chart-c3.html">Chart C3</a>
              </li>
              <li>
                <a href="chart-js.html">Chart Js</a>
              </li>
              <li>
                <a href="chart-morris.html">Morris Charts</a>
              </li>
              <li>
                <a href="chart-flot.html">Flot Charts</a>
              </li>
              <li>
                <a href="chart-peity.html">Peity Charts</a>
              </li>
            </ul>
          </li>
          <li class="submenu">
            <a href="javascript:void(0);">
              <i class="ti ti-icons"></i>
              <span>Icons</span>
              <span class="menu-arrow"></span>
            </a>
            <ul>
              <li>
                <a href="icon-fontawesome.html">Fontawesome Icons</a>
              </li>
              <li>
                <a href="icon-tabler.html">Tabler Icons</a>
              </li>
              <li>
                <a href="icon-bootstrap.html">Bootstrap Icons</a>
              </li>
              <li>
                <a href="icon-remix.html">Remix Icons</a>
              </li>
              <li>
                <a href="icon-feather.html">Feather Icons</a>
              </li>
              <li>
                <a href="icon-ionic.html">Ionic Icons</a>
              </li>
              <li>
                <a href="icon-material.html">Material Icons</a>
              </li>
              <li>
                <a href="icon-pe7.html">Pe7 Icons</a>
              </li>
              <li>
                <a href="icon-simpleline.html">Simpleline Icons</a>
              </li>
              <li>
                <a href="icon-themify.html">Themify Icons</a>
              </li>
              <li>
                <a href="icon-weather.html">Weather Icons</a>
              </li>
              <li>
                <a href="icon-typicon.html">Typicon Icons</a>
              </li>
              <li>
                <a href="icon-flag.html">Flag Icons</a>
              </li>
            </ul>
          </li>
          <li class="submenu">
            <a href="javascript:void(0);">
              <i class="ti ti-table-plus"></i>
              <span>Maps</span>
              <span class="menu-arrow"></span>
            </a>
            <ul>
              <li>
                <a href="maps-vector.html">Vector</a>
              </li>
              <li>
                <a href="maps-leaflet.html">Leaflet</a>
              </li>
            </ul>
          </li>
        </ul>
      </li>
      <li class="menu-title"><span>Extras</span></li>
      <li>
        <ul>
          <li>
            <a href="javascript:void(0);"><i class="ti ti-file-text"></i><span>Documentation</span></a>
          </li>
          <li>
            <a href="javascript:void(0);"><i class="ti ti-exchange"></i><span>Changelog</span><span
                class="badge bg-pink badge-xs fs-10 ms-s text-white">v4.0.2</span></a>
          </li>
          <li class="submenu">
            <a href="javascript:void(0);"><i class="ti ti-menu-2"></i><span>Multi Level</span><span
                class="menu-arrow"></span></a>
            <ul>
              <li><a href="javascript:void(0);">Multilevel 1</a></li>
              <li class="submenu submenu-two">
                <a href="javascript:void(0);">Multilevel 2<span
                    class="menu-arrow inside-submenu"></span></a>
                <ul>
                  <li><a href="javascript:void(0);">Multilevel 2.1</a></li>
                  <li class="submenu submenu-two submenu-three">
                    <a href="javascript:void(0);">Multilevel 2.2<span
                        class="menu-arrow inside-submenu inside-submenu-two"></span></a>
                    <ul>
                      <li><a href="javascript:void(0);">Multilevel 2.2.1</a></li>
                      <li><a href="javascript:void(0);">Multilevel 2.2.2</a></li>
                    </ul>
                  </li>
                </ul>
              </li>
              <li><a href="javascript:void(0);">Multilevel 3</a></li>
            </ul>
          </li>
        </ul>
      </li>
    </ul>
  </div>
</div>
