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
                        <div class="col-xs-12">

                        <form action="{{route('institution_post')}}" method="post" style="overflow: hidden;">
                        {{csrf_field()}}
                            <div class="form-group" style="overflow: hidden;">
                                <label for="name" class="col-sm-12 control-label">@lang('app.institution_name')</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" require="required" id="institution_name" name="institution_name" placeholder="@lang('app.institution_name')">
                                    <!-- {!! $errors->has('name')? '<p class="help-block">'.$errors->first('name').'</p>':'' !!} -->
                                </div>
                            </div>

                            <div class="form-group" style="overflow: hidden;">
                                <label for="date" class="col-sm-12 control-label">@lang('app.established_date')</label>
                                <div class="col-sm-12">
                                    <input type="date" class="form-control" require="required" id="date" name="established_date" placeholder="@lang('app.email')">
                                    <!-- {!! $errors->has('email')? '<p class="help-block">'.$errors->first('email').'</p>':'' !!} -->
                                </div>
                            </div>

                            <div class="form-group" style="overflow: hidden;">
                                <label for="address" class="col-sm-12 control-label">Institution Address</label>
                                <div class="col-sm-12">
                                <textarea name="address" id="address" require="required" class="form-control" placeholder="@lang('app.institution_address')"></textarea>
                                    <!-- {!! $errors->has('address')? '<p class="help-block">'.$errors->first('address').'</p>':'' !!} -->
                                </div>
                            </div>

                            <div class="form-group" style="overflow: hidden;">
                                <label for="contact_person" class="col-sm-12 control-label">@lang('app.contact_person')</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" require="required" id="contact_person" name="contact_person" placeholder="@lang('app.contact_person')">
                                    <!-- {!! $errors->has('contact_person')? '<p class="help-block">'.$errors->first('contact_person').'</p>':'' !!} -->
                                </div>
                            </div>  

                            <div class="form-group" style="overflow: hidden;">
                                <label for="mail" class="col-sm-12 control-label">@lang('app.institution_mail')</label>
                                <div class="col-sm-12">
                                    <input id="mail" name="email" type="email" require="required" class="form-control" placeholder="@lang('app.institution_mail')">
                                    <!-- {!! $errors->has('address')? '<p class="help-block">'.$errors->first('address').'</p>':'' !!} -->

                                </div>
                            </div>
                            <div class="form-group" style="overflow: hidden;">
                                <label for="url" class="col-sm-12 control-label">@lang('app.url')</label>
                                <div class="col-sm-12">
                                    <input type="text" id="url" name="website_url" class="form-control" placeholder="URL">
                                </div>
                            </div>
                            <div class="form-group" style="overflow: hidden;">
                                <div class="col-sm-12 ">
                                    <button type="submit" class="btn btn-primary form-control">Submit</button>
                                </div>
                            </div>

                        </form>

                        </div>
                    </div>

                </div>   <!-- /#page-wrapper -->

            </div>   <!-- /#wrapper -->


        </div> <!-- /#container -->
    </div> <!-- /#dashboard wrap -->
@endsection

@section('page-js')


@endsection