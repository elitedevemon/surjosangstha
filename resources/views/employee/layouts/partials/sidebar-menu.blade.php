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
      <!-- Groups -->
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
    </ul>
  </div>
</div>
