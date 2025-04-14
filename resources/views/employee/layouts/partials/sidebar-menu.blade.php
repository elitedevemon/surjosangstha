<div class="sidebar-inner slimscroll">
  <div class="sidebar-menu" id="sidebar-menu">
    <ul>
      <li class="menu-title"><span>MAIN MENU</span></li>
      <li>
        <ul>
          <!-- Dashboard -->
          <li class="{{ Route::is('employee.dashboard') ? 'active' : '' }}">
            <a class="menu-item" id="dashboard" href="{{ route('employee.dashboard') }}">
              <i class="ti ti-smart-home"></i><span>Dashboard</span>
            </a>
          </li>

          <!-- Groups menu -->
          <li class="submenu">
            <a class="{{ Route::is('employee.group*') ? 'subdrop' : '' }}" href="javascript:void(0);">
              <i class="ti ti-box"></i><span>Groups</span>
              <span class="menu-arrow"></span>
            </a>
            <ul style="{{ Route::is('employee.group*') ? 'display:block' : '' }}">
              <li class="{{ Route::is('employee.group.index') ? 'active' : '' }}">
                <a class="menu-item" id="group-list" href="{{ route('employee.group.index') }}">Group List</a>
              </li>
              <li class="{{ Route::is('employee.group.create') ? 'active' : '' }}">
                <a class="menu-item" id="add-group" href="{{ route('employee.group.create') }}">Add Group</a>
              </li>
            </ul>
          </li>
          <!-- Customers menu -->
          <li class="submenu">
            <a class="{{ Route::is('employee.customer*') ? 'subdrop' : '' }}" href="javascript:void(0);">
              <i class="ti ti-box"></i><span>Customers</span>
              <span class="menu-arrow"></span>
            </a>
            <ul style="{{ Route::is('employee.customer*') ? 'display:block' : '' }}">
              <li class="{{ Route::is('employee.customer.index') ? 'active' : '' }}">
                <a class="menu-item" id="customer-list"
                  href="{{ route('employee.customer.index') }}">Customer List</a>
              </li>
              <li class="{{ Route::is('employee.customer.block-od') ? 'active' : '' }}">
                <a class="menu-item" id="block-od-list"
                  href="{{ route('employee.customer.block-od') }}">Block OD List</a>
              </li>
              <li class="{{ Route::is('employee.customer.create') ? 'active' : '' }}">
                <a class="menu-item" id="add-customer" href="{{ route('employee.customer.create') }}">Add
                  Customer</a>
              </li>
            </ul>
          </li>

          <!-- Over Due -->
          @php
            $today = Carbon\Carbon::today();
            $od_realization = \App\Models\OverDue::
                where('paid_status', 'pending')
                ->where('employee_id', Auth::user()->employee_id)
                ->whereDate('due_paid_date', $today)
                ->count();
          @endphp
          <li class="submenu">
            <a class="{{ Route::is('employee.over-due*') ? 'subdrop' : '' }}" href="javascript:void(0);">
              <i class="ti ti-box"></i>
              <span>
                Over Due
                <span class="badge rounded-pill badge-danger m-1 text-white"
                  style="font-size: 12px; padding: 3px;">{{ $od_realization > 0 ? $od_realization : '' }}</span>
              </span>
              <span class="menu-arrow"></span>
            </a>
            <ul style="{{ Route::is('employee.over-due*') ? 'display:block' : '' }}">
              <li class="{{ Route::is('employee.over-due.new-od.index') ? 'active' : '' }}">
                <a class="menu-item" id="group-list" href="{{ route('employee.over-due.new-od.index') }}">New
                  OD</a>
              </li>
              <li class="{{ Route::is('employee.over-due.od-realization.index') ? 'active' : '' }}">
                <a class="menu-item" id="add-group"
                  href="{{ route('employee.over-due.od-realization.index') }}">
                  OD Realization
                  <span class="badge rounded-pill badge-danger m-1 text-white"
                    style="font-size: 12px; padding: 3px;">{{ $od_realization > 0 ? $od_realization : '' }}</span>
                </a>
              </li>
            </ul>
          </li>

          <!-- Vehicles -->
          <li class="{{ Route::is('employee.vehicle.index') ? 'active' : '' }}">
            <a class="menu-item" id="vehicle" href="{{ route('employee.vehicle.index') }}">
              <i class="ti ti-smart-home"></i><span>Vehicle</span>
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
      <li>
        <ul>
          <li class="{{ Route::is('logout') ? 'active' : '' }}">
            <form action="{{ route('logout') }}" method="POST">
              @csrf
              <a href="javascript:void(0);" onclick="confirmLogout(event, this);">
                <i class="ti ti-logout"></i><span>Logout</span>
              </a>
            </form>
          </li>
        </ul>
      </li>
    </ul>
  </div>
</div>
