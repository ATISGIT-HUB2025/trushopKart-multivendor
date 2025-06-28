<div class="col-md-12 mb-4">
  <div class="card shadow-sm">
    <div class="card-header d-flex justify-content-between align-items-center">
      <h6 class="mb-0">Sales Summary</h6>
      <form class="form-inline" id="sales-filter-form">
        <select class="form-control form-control-sm mr-2" name="filter" id="sales_range">
          <option value="today">Today</option>
          <option value="month">This Month</option>
          <option value="custom">Custom</option>
        </select>
        <input type="date" name="from" class="form-control form-control-sm mr-2 d-none" id="from_date">
        <input type="date" name="to" class="form-control form-control-sm mr-2 d-none" id="to_date">
        <button type="submit" class="btn btn-sm btn-primary">Apply</button>
      </form>
    </div>
    <div class="card-body p-3">
      <p><strong>Total Sales:</strong> ₹<span id="total_sales">{{ $totalAmount ?? 0 }}</span></p>
      <p><strong>Total Orders:</strong> <span id="total_orders">{{ $totalOrders ?? 0 }}</span></p>
    </div>
  </div>
</div>
