@extends('layouts.superadminlayout')

@section('content')

<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">{{_lang('All Notifications')}}</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{!! URL::route('super.admin.dashboard') !!}">{{_lang('Home')}}</a></li>
                <li class="breadcrumb-item">{{_lang('All Notifications')}}</li>
            </ol>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div id="notificationMessage"></div>
                        <div class="row">
                            <div class="col-6">
                                <!-- <h4 class="card-title">All Companies</h4> -->
                            </div>
                            <div class="col-6">
                                <a class="btn btn-success pull-right" href="{!! URL::route('super.admin.create.notification') !!}">{{_lang('Create Notification')}}</a>
                            </div>
                        </div>
                        <div class="row m-t-40">
                            <div class="col-6">
                                <p class="total-record">{{_lang('Total')}} <span id="total-record"></span> {{_lang('records found')}}</p>
                            </div>
                            <div class="col-6">
                                <div class="" style="float: right;">
                                    <label class="">{{_lang('Search')}}:
                                        <input placeholder="" class="form-control search-input" name="search" id="search" type="search">
                                    </label>
                                </div>
                            </div>
                        </div>
                        @include('partials._renderheaders')
                        <div class="paq-pager"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right sidebar -->
        <!-- ============================================================== -->
        <!-- .right-sidebar -->
        <!-- ============================================================== -->
        <!-- End Right sidebar -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- footer -->
    <!-- ============================================================== -->
    <footer class="footer">© 2018  Sharepeeps </footer>
    <!-- ============================================================== -->
    <!-- End footer -->
    <!-- ============================================================== -->
</div>

<script type="text/javascript">
    $renderRoute = '{{ URL::route('notification.get') }}';
    $editRoute = '{{ URL::route('super.admin.edit.notification') }}';
    $deleteRoute = '{!! URL::route('notification.delete') !!}';
    $addRecordRoute = '{!! URL::route('notification.resend') !!}';
    $defaultType = 'renderNotifications';
    $token = "{{ csrf_token() }}";
    $page = 1;
    $search = '';
    $asc = 'asc';
    $desc = 'desc';
    $sortType  = 'desc';
    $sortColumn = 'nm.id';

    $(document).ready(function() {
        updateFormData();
        $type = $defaultType;
        renderAdmin();
        $('#search').val('');

        $('body').on('click', '.resend_notifications', function (e) {
            e.preventDefault();
            $formData = {
                '_token': $token,
                id: this.id
            };
            $type = 'addRecord';
            renderAdmin();
        });

    })

    var updateFormData = function () {
        $formData = {
            '_token': $token,
            page:  $page,
            search: $search,
            sortType: $sortType,
            sortColumn: $sortColumn
        };
    }

</script>

{!! HTML::script('assets/js/admin.js') !!}

@stop