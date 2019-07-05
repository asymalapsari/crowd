@extends('layouts.app')

@section('title') @if(! empty($title)) {{$title}} @endif - @parent @endsection

@section('page-css')
    <link rel="stylesheet" href="{{asset('assets/plugins/bootstrap-datepicker/css/bootstrap-datetimepicker.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/summernote/summernote.css')}}">
@endsection

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
                        <div class="col-md-10 col-xs-12">
                        <form action="{{route('update_project',['id' => $projects->id])}}" method="post" class="form-horizontal">
                    {{csrf_field()}}
                            <div class="panel panel-info">
                                <div class="panel-heading">
                                    <i class="fa fa-info-circle"></i> @lang('app.feature_available_info')
                                </div>
                            </div>

                            <legend>@lang('app.project_info')</legend>

                            <div class="form-group {{ $errors->has('title')? 'has-error':'' }}">
                                <label for="project_name" class="col-sm-4 control-label">@lang('app.project_name')<span class="field-required">*</span></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="title" value="{{$projects->project_name}}" name="project_name" placeholder="@lang('app.project_name')" required>
                                    {!! $errors->has('project_name')? '<p class="help-block">'.$errors->first('project_name').'</p>':'' !!}
                                </div>
                            </div>

                            <div class="form-group  {{ $errors->has('category')? 'has-error':'' }}">
                                <label for="category" class="col-sm-4 control-label">@lang('app.category') <span class="field-required">*</span></label>
                                <div class="col-sm-8">
                                    <select class="form-control select2" name="category">
                                        @foreach($category as $categories)
                                            <option value="{{ $categories->id }}">{{ $categories->category_name }}</option>
                                        @endforeach
                                    </select>
                                    {!! $errors->has('categories')? '<p class="help-block">'.$errors->first('categories').'</p>':'' !!}
                                </div>
                            </div>

                            <div class="form-group {{ $errors->has('short_description')? 'has-error':'' }}">
                                <label for="project_description" class="col-sm-4 control-label">@lang('app.project_description')<span class="field-required">*</span></label>
                                <div class="col-sm-8">
                                    <textarea name="project_description" class="form-control" rows="3" required>{{$projects->project_description}}</textarea>
                                    {!! $errors->has('project_description')? '<p class="help-block">'.$errors->first('project_description').'</p>':'' !!}
                                    <p class="text-info"> @lang('app.great_title_info')</p>
                                </div>
                            </div>

                            <div class="form-group {{ $errors->has('project_budget')? 'has-error':'' }}">
                                <label for="project_budget" class="col-sm-4 control-label">@lang('app.project_budget')<span class="field-required">*</span></label>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control" id="project_budget" value="{{$projects->project_budget}}" name="project_budget" placeholder="@lang('app.project_budget')" required>
                                    {!! $errors->has('project_budget')? '<p class="help-block">'.$errors->first('project_budget').'</p>':'' !!}
                                </div>
                            </div>

                            <div class="form-group {{ $errors->has('number_of_required_applier')? 'has-error':'' }}">
                                <label for="number_of_required_applier" class="col-sm-4 control-label">@lang('app.number_of_required_applier')<span class="field-required">*</span></label>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control" id="number_of_required_applier" value="{{$projects->number_of_required_applier}}" name="number_of_required_applier" placeholder="@lang('app.number_of_required_applier')" required>
                                    {!! $errors->has('number_of_required_applier')? '<p class="help-block">'.$errors->first('number_of_required_applier').'</p>':'' !!}
                                </div>
                            </div>

                            <div class="form-group {{ $errors->has('applier_requirements')? 'has-error':'' }}">
                                <label for="applier_requirements" class="col-sm-4 control-label">@lang('app.applier_requirements')<span class="field-required">*</span></label>
                                <div class="col-sm-8">
                                    <textarea name="applier_requirements" class="form-control" rows="3" required>{{$projects->applier_requirements}}</textarea>
                                    {!! $errors->has('applier_requirements')? '<p class="help-block">'.$errors->first('applier_requirements').'</p>':'' !!}
                                    <p class="text-info"> @lang('app.great_title_info')</p>
                                </div>
                            </div>

                            <div class="form-group {{ $errors->has('start_date')? 'has-error':'' }}">
                                <label for="start_date" class="col-sm-4 control-label">@lang('app.start_date')<span class="field-required">*</span></label>
                                <div class="col-sm-8">
                                    <input type="date" class="form-control" id="start_date" value="{{$projects->start_date}}" name="start_date" placeholder="@lang('app.start_date')" required>
                                    {!! $errors->has('start_date')? '<p class="help-block">'.$errors->first('start_date').'</p>':'' !!}
                                </div>
                            </div>

                            <div class="form-group {{ $errors->has('end_date')? 'has-error':'' }}">
                                <label for="end_date" class="col-sm-4 control-label">@lang('app.end_date')<span class="field-required">*</span></label>
                                <div class="col-sm-8">
                                    <input type="date" class="form-control" id="end_date" value="{{$projects->end_date}}" name="end_date" placeholder="@lang('app.end_date')" required>
                                    {!! $errors->has('end_date')? '<p class="help-block">'.$errors->first('end_date').'</p>':'' !!}
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-offset-4 col-sm-8">
                                    <button type="submit" class="btn btn-primary">@lang('app.submit_new_project')</button>
                                </div>
                            </div>
                        </form>
                        </div>
                    </div>



                </div>

            </div>
        </div>
    </div>


@endsection

@section('page-js')
    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>
    <script src="{{asset('assets/plugins/bootstrap-datepicker/js/bootstrap-datetimepicker.min.js')}}"></script>

    <script src="{{asset('assets/plugins/summernote/summernote.js')}}"></script>
    <script>
        $(function () {
            $('#start_date, #end_date').datetimepicker({format: 'YYYY-MM-DD'});
        });

        $(document).ready(function() {
            $('.description').summernote({  height: 300});

            $('#feature_image').change(function(){

                var input = this;
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $('#feature_image_preview').html('<img src="'+e.target.result+'" />');
                    };
                    reader.readAsDataURL(input.files[0]);
                }

            });
        });

    </script>
@endsection