@extends('layouts.app')

@section('title') @if(! empty($title)) {{$title}} @endif - @parent @endsection

@section('content')

    <div class="dashboard-wrap">
        <div class="container">
            <div id="wrapper">

                @include('admin.menu')

                <div id="page-wrapper">
                    @if( ! empty($title))
                        <div class="row">
                            <div class="col-lg-12">
                                <h1 class="page-header"> {{ $title }}  </h1>
                            </div> <!-- /.col-lg-12 -->
                        </div> <!-- /.row -->
                    @endif

                    @include('admin.flash_msg')
                        <div class="row">
                        @if ($ins->isEmpty())
                            @include('admin.no_institution')
                        @else
                            <div class="col-xs-12">

                                <table class="table table-bordered table-striped">

                                    <tr>
                                        <th>@lang('app.institution_name')</th>
                                        <td>{{ $ins[0]->institution_name }}</td>
                                    </tr>

                                    <tr>
                                        <th>@lang('app.institution_mail')</th>
                                        <td>{{ $ins[0]->email }}</td>
                                    </tr>
                                    <tr>
                                        <th>@lang('app.established_date')</th>
                                        <td>{{ $ins[0]->established_date }}</td>
                                    </tr>
                                    <tr>
                                        <th>@lang('app.contact_person')</th>
                                        <td>{{ $ins[0]->contact_person }}</td>
                                    </tr>
                                    <tr>
                                        <th>@lang('app.address')</th>
                                        <td>{{ $ins[0]->address }}</td>
                                    </tr>
                                    <tr>
                                        <th>@lang('app.url')</th>
                                        <td>
                                            {{$ins[0]->website_url}}
                                        </td>
                                    </tr>
                                </table>

                                <a href="#"><i class="fa fa-pencil-square-o"></i> @lang('app.edit') </a>

                            </div>
                            @endif
                        </div>
                </div>   <!-- /#page-wrapper -->




            </div>   <!-- /#wrapper -->


        </div> <!-- /#container -->
    </div> <!-- /#dashboard wrap -->
@endsection

@section('page-js')

@endsection