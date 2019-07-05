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

                        @if($insId->isEmpty())
                            @include('admin.no_institution')
                        @else
                            @if($project->count() > 0)
                                <table class="table table-striped table-bordered">
                                    @foreach($project as $proj)
                                    <tr>
                                        <td width="70"><img class="img-responsive" src="https://source.unsplash.com/100x100/?marketing" alt="Projects"></td>
                                        <td>{{$proj->project_name}}</td>

                                        <td width="200" style="text-align: center">
                                            <a href="{{route('edit_project', [$proj->id])}}" class="btn btn-info btn-sm"><i class="fa fa-pencil"></i> </a>

                                            <a href="{{route('project_single', [$proj->id])}}" class="btn btn-success btn-sm"><i class="fa fa-eye"></i> </a>
                                        </td>
                                    </tr>
                                    
                                    @endforeach
                                </table>
                                    <!-- <a href="#">
                                        <div class="col-sm-3 list-event" style="float: none; margin: 0 auto;">
                                            <p class="text-center"><strong>{{$proj->project_name}}</strong></p><br>
                                            <img class="img-center" src="https://source.unsplash.com/255x255/?marketing" alt="Projects" width="300" height="255">
                                            <div id="demo" class="">
                                                <p>{!!substr($proj->project_description,0,25)!!}..</p>
                                                
                                            </div>
                                        </div>
                                    </a> -->
                                    
                            @else
                                <div class="alert alert-info"><i class="fa fa-info-circle"></i> @lang('app.no_projects_to_display') </div>
                            @endif
                                    <a href="#" class="btn btn-primary form-control">Build Your Project</a>
                                </div>
                        @endif

                </div>

            </div>
        </div>
    </div>


@endsection