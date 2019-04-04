@extends('layouts.admin')

@section('template_title')
    {{ trans('admin.dashboard.title') }}
@endsection

@section('template_description')
@endsection

@section('header_title')
    {{ trans('admin.dashboard.header') }}
@endsection

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header ">
                <h5 class="card-title">
                    {!! trans('admin.dashboard.welcome-card-title', ['username' => Auth::user()->name]) !!}
                </h5>
                <p class="card-category">
                    {!! trans('admin.dashboard.welcome-card-sub-title') !!}
                </p>
            </div>
            <hr>
            <div class="card-body ">
                <p>
                    {{ trans('admin.dashboard.welcome-access') }}
                    <strong>
                        @role('super.admin', true)
                            <span class="badge badge-primary" style="margin-top:4px">
                                {!! trans('admin.access_levels.roles.super-admin') !!}
                            </span>
                        @endrole

                        @role('admin', true)
                            <span class="badge badge-warning" style="margin-top:4px">
                                {!! trans('admin.access_levels.roles.admin') !!}
                            </span>
                        @endrole

                        @role('moderator', true)
                            <span class="badge badge-info" style="margin-top:4px">
                                {!! trans('admin.access_levels.roles.moderator') !!}
                            </span>
                        @endrole

                        @role('writer', true)
                            <span class="badge badge-dark" style="margin-top:4px">
                                {!! trans('admin.access_levels.roles.writer') !!}
                            </span>
                        @endrole

                        @role('user', true)
                            <span class="badge badge-default" style="margin-top:4px">
                                {!! trans('admin.access_levels.roles.user') !!}
                            </span>
                        @endrole
                    </strong>
                </p>

                <p>
                    {!! trans_choice('admin.dashboard.access-level-string', Auth::User()->level()) !!}

                    @level(5)
                        <span class="badge badge-primary margin-half">5</span>
                    @endlevel

                    @level(4)
                        <span class="badge badge-info margin-half">4</span>
                    @endlevel

                    @level(3)
                        <span class="badge badge-success margin-half">3</span>
                    @endlevel

                    @level(2)
                        <span class="badge badge-dark margin-half text-white">2</span>
                    @endlevel

                    @level(1)
                        <span class="badge badge-default margin-half text-white">1</span>
                    @endlevel
                </p>

                <p>
                    {!! trans('admin.dashboard.permissions-string') !!}

                    @permission('view.users')
                        <span class="badge badge-primary margin-half margin-left-0">
                            {!! trans('admin.access_levels.permissions.view-users') !!}
                        </span>
                    @endpermission
                    @permission('create.users')
                        <span class="badge badge-info margin-half margin-left-0">
                            {!! trans('admin.access_levels.permissions.create-users') !!}
                        </span>
                    @endpermission
                    @permission('edit.users')
                        <span class="badge badge-warning text-white margin-half margin-left-0">
                            {!! trans('admin.access_levels.permissions.edit-users') !!}
                        </span>
                    @endpermission
                    @permission('delete.users')
                        <span class="badge badge-danger margin-half margin-left-0">
                            {!! trans('admin.access_levels.permissions.delete-users') !!}
                        </span>
                    @endpermission
                    @permission('perms.super.admin')
                        <span class="badge badge-success margin-half margin-left-0">
                            {!! trans('admin.access_levels.roles.super-admin') !!}
                        </span>
                    @endpermission
                    @permission('perms.admin')
                        <span class="badge badge-dark margin-half margin-left-0">
                            {!! trans('admin.access_levels.roles.admin') !!}
                        </span>
                    @endpermission
                    @permission('perms.moderator')
                        <span class="badge badge-secondary margin-half margin-left-0">
                            {!! trans('admin.access_levels.roles.moderator') !!}
                        </span>
                    @endpermission
                    @permission('perms.writer')
                        <span class="badge badge-danger margin-half margin-left-0">
                            {!! trans('admin.access_levels.roles.writer') !!}
                        </span>
                    @endpermission
                    @permission('perms.user')
                        <span class="badge badge-info margin-half margin-left-0">
                            {!! trans('admin.access_levels.roles.user') !!}
                        </span>
                    @endpermission
                </p>

            </div>
            <hr>
            <div class="card-footer">
                <p class="stats text-muted">
                    {!! trans('admin.dashboard.welcome-card-footer') !!}
                    <iframe src="https://ghbtns.com/github-btn.html?user=KalimeroMK&repo=blog&type=star&count=true" frameborder="0" scrolling="0" width="170px" height="20px" style="margin: 3px 0 -5px .5em;"></iframe>
                </p>
            </div>
        </div>
        <div class="page-body">

            <div class="row">
                <div class="col-lg-12 col-sm-12 col-xs-12">
                    <div class="databox databox-vertical databox-sm radius-bordered databox-shadowed">
                        <div class="databox-top bg-orange shy text-align-left padding-left-30">
                            <span class="databox-header"> <i class="fa fa-bar-chart-o no-margin"></i> Google Analytics {{ date('Y-m-d H:i:s') }}</span>
                        </div>
                        <div class="databox-bottom no-padding bg-yellow">
                            <div class="databox-row row-1 bg-yellow shy padding-10 text-align-left">
                                <span class="databox-number" style="font-size:20px;">Active users: <span id="realtimeusers">loading...</span></span>

                            </div>

                            <div class="databox-row row-1 padding-5 padding-left-5 text-align-left bordered-whitesmoke">
                                <div class="databox-cell cell-8">

                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-sm-12 col-xs-12">
                    <div class="well with-header  with-footer">
                        <div class="header bg-blue">
                            Statistic for week
                        </div>
                        <table class="table table-hover centered">
                            <thead class="bordered-darkorange">
                            <tr>
                                <th>Date</th>
                                <th>Visitors</th>
                                <th>Page Views</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($analytics as $analytic)
                                <tr>
                                    <td>{{ $analytic['date']->format('D') }}</td>
                                    <td>{{ $analytic['visitors'] }} </td>
                                    <td>{{ $analytic['pageViews'] }} </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-sm-12 col-xs-12">
                    <div class="well with-header  with-footer">
                        <div class="header bg-blue">
                            Most readed articles
                        </div>
                        <table class="table table-hover">
                            <thead class="bordered-darkorange">
                            <tr>
                                <th>Url</th>
                                <th>Page Views</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($visitedpages as $visitedpage)
                                <tr>
                                    <td>{{ $visitedpage['url'] }}</td>
                                    <td>{{ $visitedpage['pageViews'] }} </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-sm-12 col-xs-12">
                    <div class="well with-header  with-footer">
                        <div class="header bg-blue">
                            Top Keywords for last week
                        </div>
                        <table class="table table-hover">
                            <thead class="bordered-darkorange">
                            <tr>
                                <th>Keyword</th>
                                <th>Sessions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($topkeywords as $topkeyword)
                                <tr>
                                    <td>{{ $topkeyword['sessions'] }} </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-sm-12 col-xs-12">
                    <div class="well with-header  with-footer">
                        <div class="header bg-blue">
                            Top Referrers for last week
                        </div>
                        <table class="table table-hover">
                            <thead class="bordered-darkorange">
                            <tr>
                                <th>Url</th>
                                <th>Page views</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($topreferrars as $topreferrar)
                                <tr>
                                    <td>{{ $topreferrar['url'] }}</td>
                                    <td>{{ $topreferrar['pageViews'] }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 col-sm-12 col-xs-12">
                    <div class="well with-header  with-footer">
                        <div class="header bg-blue">
                            Top Browsers for last week

                        </div>
                        <table class="table table-hover">
                            <thead class="bordered-darkorange">
                            <tr>
                                <th>Browser</th>
                                <th>Sessions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($topbrowsers as $topbrowser)
                                <tr>
                                    <td>{{ $topbrowser['browser'] }}</td>
                                    <td>{{ $topbrowser['sessions'] }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection
