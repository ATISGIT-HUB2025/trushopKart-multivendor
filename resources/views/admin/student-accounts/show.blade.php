@extends('admin.layouts.master')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Bank Account Details</h1>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tr>
                                    <th width="200">Student Name</th>
                                    <td>{{ $bankAccount->user->name }}</td>
                                </tr>
                                <tr>
                                    <th>Student Email</th>
                                    <td>{{ $bankAccount->user->email }}</td>
                                </tr>
                                <tr>
                                    <th>Account Holder Name</th>
                                    <td>{{ $bankAccount->account_holder_name }}</td>
                                </tr>
                                <tr>
                                    <th>Bank Name</th>
                                    <td>{{ $bankAccount->bank_name }}</td>
                                </tr>
                                <tr>
                                    <th>Account Number</th>
                                    <td>{{ $bankAccount->account_number }}</td>
                                </tr>
                                <tr>
                                    <th>IFSC Code</th>
                                    <td>{{ $bankAccount->ifsc_code }}</td>
                                </tr>
                                <tr>
                                    <th>Branch Name</th>
                                    <td>{{ $bankAccount->branch_name }}</td>
                                </tr>
                                <tr>
                                    <th>PAN Number</th>
                                    <td>{{ $bankAccount->pan_number }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
