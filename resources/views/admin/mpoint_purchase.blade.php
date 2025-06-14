@extends('admin.layouts.master')

@section('content')
      <!-- Main Content -->


<style>
    .wsus__dash_pro_area{
            overflow: hidden;
    }
    #mrewardpoint-table_wrapper{
            overflow: auto;
}
</style>


        <section class="section">
          <div class="section-header">
            <h1>Mpoints Purchasing List</h1>
          </div>

          <div class="section-body">

            <div class="row">
              <div class="col-12">
                <div class="card">
                  {{-- <div class="card-header">
                    <h4>Create Coupon</h4>

                  </div> --}}
                    <div class="card-body">
                      <div class="wsus__dash_pro_area mt-4">
                          {{ $dataTable->table() }}
                      </div>
                    </div>
                </div>
              </div>
            </div>

          </div>
        </section>




        <!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Transaction Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="transaction-details">
          <p><strong>Transaction ID:</strong> <span id="transactionId"></span>
          <button type="button" onclick="copyTransactionId()" class="btn btn-sm btn-outline-secondary ml-2">Copy</button>
        </p>
          <p><strong>MVoucher Point:</strong> <span id="transactionAmount"></span></p>
          <img src="" id="screenshot" alt="" class="w-100 img-fluid">
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>



<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form id="editForm" action="/admin/updatempoint-detail" method="post">
          @csrf
        <div class="modal-header">
          <h5 class="modal-title" id="editModalLabel">Edit User</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
         
          <div class="form-group">
            <label for="edit-name">Mpoint</label>
            <input type="number" class="form-control" required id="edit-points" name="points">
          </div>
          <div class="form-group">
            <label for="edit-email">Mpoint Value</label>
            <input type="number" class="form-control" required id="edit-pointrate" name="point_rate">
          </div>
        
         <div class="form-group">
            <label for="edit-email">MVoucher Point</label>
            <input type="number" class="form-control" required id="edit-rupees" name="rupees">
            <input type="number" hidden class="form-control" id="mainid" name="id">
          </div>
          
          </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Update</button>
        </div>
      </form>
    </div>
  </div>
</div>


@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}




    <script>

$(document).on('click', '.edit-btn', function () {
    $('#mainid').val($(this).data('id'));
    $('#edit-points').val($(this).data('points'));
    $('#edit-pointrate').val($(this).data('point_rate'));
    $('#edit-rupees').val($(this).data('rupees'));
});


function showTransactionDetails(id) {
    $.ajax({
        url: `/admin/mreward/transaction/${id}`,
        method: 'GET',
        beforeSend: function () {
            $('#transactionId').text('Loading...');
            $('#transactionAmount').text('');
            $('#screenshot').attr('src', '');
        },
        success: function (data) {
            $('#transactionId').text(data.transaction_id);
            $('#transactionAmount').text(data.amount);
            if (data.screenshot) {
                $('#screenshot').attr('src', data.screenshot).show();
            } else {
                $('#screenshot').hide();
            }
            $('#exampleModalCenter').modal('show');
        },
        error: function () {
            alert('Unable to fetch transaction details.');
        }
    });
}
</script>

<script>
  function copyTransactionId() {
    const text = document.getElementById("transactionId").innerText;
    navigator.clipboard.writeText(text).then(() => {
      toastr.success("Transaction ID copied to clipboard!");
    }).catch(err => {
      toastr.error("Failed to copy Transaction ID.");
    });
  }
</script>


    @endpush
@endsection
