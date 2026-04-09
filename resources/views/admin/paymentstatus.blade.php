@extends('admin.layouts.app')

@section('title', 'Payment Status')

@section('content')

<div class="page-content">

    <!-- Header -->
    <div class="content-header mb-4">
        <h2 class="fw-bold">Payment Status</h2>
        <p class="text-muted">Track and manage all your transactions</p>
    </div>

    <!-- SUMMARY CARDS -->
    <div class="row g-3 mb-4">

        <div class="col-md-3">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h6 class="text-muted">Total Payments</h6>
                    <h4 class="fw-bold">₹1,25,000</h4>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h6 class="text-muted">Successful</h6>
                    <h4 class="fw-bold text-success">₹95,000</h4>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h6 class="text-muted">Pending</h6>
                    <h4 class="fw-bold text-warning">₹20,000</h4>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h6 class="text-muted">Failed</h6>
                    <h4 class="fw-bold text-danger">₹10,000</h4>
                </div>
            </div>
        </div>

    </div>

    <!-- FILTER + TABLE -->
    <div class="card shadow-sm border-0">
        <div class="card-body">

            <!-- FILTER BAR -->
            <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">

                <h5 class="mb-0">Transaction History</h5>

                <div class="d-flex gap-2">
                    <select class="form-select form-select-sm">
                        <option>All Status</option>
                        <option>Success</option>
                        <option>Pending</option>
                        <option>Failed</option>
                    </select>

                    <input type="date" class="form-control form-control-sm">
                </div>

            </div>

            <!-- TABLE -->
            <div class="table-responsive">
                <table class="table align-middle">

                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Transaction ID</th>
                            <th>User</th>
                            <th>Amount</th>
                            <th>Method</th>
                            <th>Date</th>
                            <th>Status</th>
                        </tr>
                    </thead>

                    <tbody>

                        <tr>
                            <td>1</td>
                            <td>#TXN12345</td>
                            <td>Rahul Sharma</td>
                            <td>₹5,000</td>
                            <td>UPI</td>
                            <td>25 Mar 2026</td>
                            <td><span class="badge bg-success">Success</span></td>
                        </tr>

                        <tr>
                            <td>2</td>
                            <td>#TXN12346</td>
                            <td>Anjali Verma</td>
                            <td>₹3,000</td>
                            <td>Card</td>
                            <td>24 Mar 2026</td>
                            <td><span class="badge bg-warning text-dark">Pending</span></td>
                        </tr>

                        <tr>
                            <td>3</td>
                            <td>#TXN12347</td>
                            <td>Vikas Singh</td>
                            <td>₹7,000</td>
                            <td>Net Banking</td>
                            <td>23 Mar 2026</td>
                            <td><span class="badge bg-danger">Failed</span></td>
                        </tr>

                    </tbody>

                </table>
            </div>

        </div>
    </div>

</div>

@endsection