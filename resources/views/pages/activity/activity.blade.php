@extends('partials.app')
@section('content')
@section('title', 'Modul User | Activity')

<div class="container-fluid">
                        
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Activity Logs</a></li>
                        <li class="breadcrumb-item active">Activity</li>
                    </ol>
                </div>
                <h4 class="page-title">Activity Logs</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                            <thead class="thead-light">
                                <tr>
                                    <th>Date</th>
                                    <th>Activity</th>
                                    <th>Notes</th>
                                    <th>Users</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($activity as $item)
                                    <tr>
                                        <td>{{ $item->date }}</td>
                                        <td>{{ $item->activity }}</td>
                                        <td>{{ $item->note }}</td>
                                        <td>{{ $item->user->name }}</td>
                                    </tr>
                                @empty
                                    
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@section('activity')
<script src="assets/js/vendor.min.js"></script>
<script src="assets/js/app.min.js"></script>
<!-- third party js -->
<script src="assets/js/vendor/jquery.dataTables.min.js"></script>
<script src="assets/js/vendor/dataTables.bootstrap4.js"></script>
<script src="assets/js/vendor/dataTables.responsive.min.js"></script>
<script src="assets/js/vendor/responsive.bootstrap4.min.js"></script>
<script src="assets/js/vendor/dataTables.buttons.min.js"></script>
<script src="assets/js/vendor/buttons.bootstrap4.min.js"></script>
<script src="assets/js/vendor/buttons.html5.min.js"></script>
<script src="assets/js/vendor/buttons.flash.min.js"></script>
<script src="assets/js/vendor/buttons.print.min.js"></script>
<script src="assets/js/vendor/dataTables.keyTable.min.js"></script>
<script src="assets/js/vendor/dataTables.select.min.js"></script>
<!-- third party js ends -->
<script src="assets/js/vendor/apexcharts.min.js"></script>
<!-- Todo js -->
<script src="assets/js/ui/component.todo.js"></script>
<script src="assets/js/vendor/jquery-jvectormap-1.2.2.min.js"></script>
<script src="assets/js/vendor/jquery-jvectormap-world-mill-en.js"></script>

        <!-- demo app -->
<script src="assets/js/pages/demo.dashboard-crm.js"></script>
<!-- demo app -->
<script src="assets/js/pages/demo.datatable-init.js"></script>
@endsection

@endsection
