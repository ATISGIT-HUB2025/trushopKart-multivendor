@extends('admin.layouts.master')

<style>
  .modal-backdrop.show{
    display: none !important;
  }
  .modal-open .modal{
        background-color: rgba(0, 0, 0, 0.42);
  }
</style>

@section('content')
<section class="section">
  <div class="section-header">
    <h1>Vendor Details</h1>
  </div>

  <div class="section-body">
    <div class="row">

      <!-- Vendor Info Card -->
      <div class="col-md-6 mb-4">
        <div class="card shadow-sm">
          <div class="card-header p-3">
            <h6 class="mb-0">Vendor Info</h6>
          </div>
          <div class="card-body p-3">
            <p><strong>User Name:</strong> {{ $vendor->name }}</p>
            <p><strong>User Email:</strong> {{ $vendor->email }}</p>
            <p><strong>Company Name:</strong> {{ $vendor->vendor->shop_name ?? '-' }}</p>
            <p><strong>Company Email:</strong> {{ $vendor->vendor->email ?? '-' }}</p>
            <p><strong>Company Phone:</strong> {{ $vendor->vendor->phone ?? '-' }}</p>
            <p><strong>Company Address:</strong> {{ $vendor->vendor->address ?? '-' }}</p>
            <p><strong>Description:</strong> {{ $vendor->vendor->description ?? '-' }}</p>
          </div>
        </div>
      </div>

      <!-- Bank Details Card -->
      <div class="col-md-6 mb-4">
        <div class="card shadow-sm">
          <div class="card-header p-3">
            <h6 class="mb-0">Bank Details</h6>
          </div>
          <div class="card-body p-3">
            <p><strong>Bank Name:</strong> {{ $vendor->vendor->bank_name ?? '-' }}</p>
            <p><strong>Account Number:</strong> {{ $vendor->vendor->account_number ?? '-' }}</p>
            <p><strong>IFSC Code:</strong> {{ $vendor->vendor->ifsc_code ?? '-' }}</p>
            <p><strong>Account Holder Name:</strong> {{ $vendor->vendor->account_holder_name ?? '-' }}</p>
          </div>
        </div>
      </div>

    
      <!-- Sales Summary Card -->
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


<div class="col-md-12 mb-4" id="table-container" style="display: none;">
  <div class="card shadow-sm">
    <div class="card-header">
      <h6 class="mb-0">Orders List</h6>
    </div>
    <div class="card-body p-3">
      <table class="table table-bordered" id="orders_table">
        <thead>
          <tr>
            <th>#</th>
            <th>Product</th>
            <th>Amount</th>
            <th>Date</th>
          </tr>
        </thead>
        <tbody>
        </tbody>
      </table>
    </div>
  </div>
</div>


<!-- Vendor Transactions Card -->
<div class="col-md-12 mb-4">
  <div class="card shadow-sm">
    <div class="card-header d-flex justify-content-between align-items-center">
      <h6 class="mb-0">Vendor Payment Transactions</h6>
      <div>
       <button class="btn btn-success" data-toggle="modal" data-target="#transactionModal" id="addPaymentModal">
<i class="fas fa-plus-circle"></i>  Make Payment
</button>

        <form class="d-inline-flex" id="transaction-filter-form">
          <select class="form-control form-control-sm me-2" id="transaction_filter">
            <option value="today">Today</option>
            <option value="month">This Month</option>
            <option value="custom">Custom</option>
          </select>
          <input type="date" id="trans_from" class="form-control form-control-sm me-2 d-none">
          <input type="date" id="trans_to" class="form-control form-control-sm me-2 d-none">
          <button class="btn btn-sm btn-primary">Filter</button>
        </form>
      </div>
    </div>
    <div class="card-body p-3">
      <div class="row mb-3" id="txn-summary">
  <div class="col-md-4">
    <div class="card bg-success text-white">
      <div class="card-body">
        <h5 class="card-title">Completed</h5>
        <p class="card-text" id="txn-completed">0</p>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="card bg-warning text-dark">
      <div class="card-body">
        <h5 class="card-title">Pending</h5>
        <p class="card-text" id="txn-pending">0</p>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="card bg-danger text-white">
      <div class="card-body">
        <h5 class="card-title">Failed</h5>
        <p class="card-text" id="txn-failed">0</p>
      </div>
    </div>
  </div>
</div>
      <table class="table table-bordered table-sm" id="transaction_table">
        <thead>
          <tr>
            <th>#</th>
            <th>Amount</th>
            <th>Payment Method</th>
            <th>Transaction ID</th>
            <th>Status</th>
            <th>Date</th>
            <th>Note</th>
          </tr>
        </thead>
        <tbody>
          {{-- Dynamic Rows via AJAX --}}
        </tbody>
      </table>
    </div>
  </div>
</div>



<div class="modal fade" id="transactionModal" tabindex="-1" role="dialog" aria-labelledby="transactionModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
    
      <div class="modal-header">
        <h5 class="modal-title" id="transactionModalLabel">Vendor Payment</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
   <form id="payment-form" method="POST">
  @csrf
  <div class="modal-body">

    <input type="hidden" name="vendor_id" value="{{ $mvendor->id }}">

    <div class="form-group">
      <label for="amount">Amount (₹)</label>
      <input type="number" name="amount" class="form-control" required>
    </div>

    <div class="form-group">
      <label for="payment_method">Payment Method</label>
      <select name="payment_method" class="form-control" required>
        <option value="cash">Cash</option>
        <option value="bank">Bank Transfer</option>
        <option value="upi">UPI</option>
        <option value="cheque">Cheque</option>
      </select>
    </div>

    <div class="form-group">
      <label for="transaction_id">Transaction ID (optional)</label>
      <input type="text" name="transaction_id" class="form-control">
    </div>

    <div class="form-group">
      <label for="status">Payment Status</label>
      <select name="status" class="form-control" required>
        <option value="completed">Completed</option>
        <option value="pending">Pending</option>
        <option value="failed">Failed</option>
      </select>
    </div>

    <div class="form-group">
      <label for="paid_at">Payment Date</label>
      <input type="date" name="paid_at" class="form-control" value="{{ date('Y-m-d') }}" required>
    </div>

    <div class="form-group">
      <label for="note">Note (optional)</label>
      <textarea name="note" class="form-control" rows="3"></textarea>
    </div>

  </div>

  <div class="modal-footer">
    <button type="submit" class="btn btn-primary">Submit Payment</button>
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
  </div>
</form>

      
    </div>
  </div>
</div>






    </div>
  </div>
</section>
@endsection


@push('scripts')

<script>
$(document).ready(function () {
  function fetchSalesData(filter = 'today', from = '', to = '') {
    const vendorId = "{{ $mvendor->id }}";

    $.ajax({
      url: `/admin/vendor/${vendorId}/sales-overview`,
      method: 'POST',
      data: {
        _token: '{{ csrf_token() }}',
        filter: filter,
        from: from,
        to: to
      },
      success: function (response) {
        $('#total_sales').text(response.totalAmount);
        $('#total_orders').text(response.totalOrders);

        // Clear existing rows
        let rows = '';
        if (response.orders && response.orders.length > 0) {
          response.orders.forEach((order, index) => {
            rows += `<tr>
              <td>${index + 1}</td>
              <td>${order.product?.name ?? '-'}</td>
              <td>₹${order.amount}</td>
              <td>${new Date(order.created_at).toLocaleDateString()}</td>
            </tr>`;
          });
          $('#table-container').show();
        } else {
          $('#table-container').hide(); // Hide if no data
        }

        $('#orders_table tbody').html(rows);
      },
      error: function () {
        alert("Something went wrong!");
      }
    });
  }

  // Show/hide custom date fields
  $('#sales_range').on('change', function () {
    if ($(this).val() === 'custom') {
      $('#from_date, #to_date').removeClass('d-none');
    } else {
      $('#from_date, #to_date').addClass('d-none');
    }
  });

  // Handle form submit
  $('#sales-filter-form').on('submit', function (e) {
    e.preventDefault();
    const filter = $('#sales_range').val();
    const from = $('#from_date').val();
    const to = $('#to_date').val();
    fetchSalesData(filter, from, to);
  });

  // Load today’s data on first load
  fetchSalesData('today');
});
</script>


<script>
$(document).ready(function () {
  const vendorId = "{{ $mvendor->id }}";

  function fetchTransactions(filter = 'today', from = '', to = '') {
    $.ajax({
      url: `/admin/vendor/transactions/${vendorId}/list`,
      method: 'POST',
      data: {
        _token: '{{ csrf_token() }}',
        filter: filter,
        from: from,
        to: to
      },
      success: function (res) {
        let rows = '';
        res.transactions.forEach((txn, i) => {
          rows += `<tr>
            <td>${i + 1}</td>
            <td>₹${txn.amount}</td>
            <td>${txn.payment_method}</td>
            <td>${txn.transaction_id ?? '-'}</td>
            <td>${txn.status}</td>
            <td>${new Date(txn.paid_at).toLocaleDateString()}</td>
            <td>${txn.note ?? '-'}</td>
          </tr>`;
        });
        $('#transaction_table tbody').html(rows);
        $('#txn-completed').text(res.counts.completed);
  $('#txn-pending').text(res.counts.pending);
  $('#txn-failed').text(res.counts.failed);
      },
      error: () => {
        toastr.error("Transaction data load failed!");
      }
    });
  }

  // Filter dropdown logic
  $('#transaction_filter').change(function () {
    const val = $(this).val();
    if (val === 'custom') {
      $('#trans_from, #trans_to').removeClass('d-none');
    } else {
      $('#trans_from, #trans_to').addClass('d-none');
    }
  });

  $('#transaction-filter-form').submit(function (e) {
    e.preventDefault();
    const filter = $('#transaction_filter').val();
    const from = $('#trans_from').val();
    const to = $('#trans_to').val();
    fetchTransactions(filter, from, to);
  });

  // Handle payment form
  $('#payment-form').submit(function (e) {
    e.preventDefault();
    const form = $(this);
    $.ajax({
      url: `/admin/vendor/transactions/${vendorId}/add`,
      method: 'POST',
      data: form.serialize(),
      success: function () {
        $('#transactionModal').modal('hide');
        form[0].reset();
        fetchTransactions();
        toastr.success("Payment added successfully!");
      },
      error: function (xhr) {
        const err = xhr.responseJSON?.message ?? "Payment failed!";
        toastr.error(err);
      }
    });
  });

  // Initial load
  fetchTransactions('today');
});
</script>


@endpush

