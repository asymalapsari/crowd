@extends('layouts.app')
@section('title') @if( ! empty($title)) {{ $title }} | @endif @parent @endsection

@section('content')

     <section class="campaign-details-wrap">

        @include('single_project_header')


        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    @include('admin.flash_msg')

                    <div class="campaign-decription">
                        <div class="single-campaign-embeded">
                                <div class="campaign-feature-img">
                                    <img src="https://source.unsplash.com/780x400/?marketing" class="img-responsive" />
                                </div>


                        </div>
                    </div>

                        {!! $projects->project_description !!}


                        @if($enable_discuss)
                            <div class="comments-title"><h2> <i class="fa fa-comment"></i> @lang('app.comments')</h2></div>
                            <div id="disqus_thread"></div>
                            <script>
                                var disqus_config = function () {
                                    this.page.url = '{{route('project_single', [$projects->id])}}';  // Replace PAGE_URL with your page's canonical URL variable
                                    this.page.identifier = '{{route('project_single', [$projects->id])}}'; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                                };
                                (function() { // DON'T EDIT BELOW THIS LINE
                                    var d = document, s = d.createElement('script');
                                    s.src = '//{{get_option('disqus_shortname')}}.disqus.com/embed.js';
                                    s.setAttribute('data-timestamp', +new Date());
                                    (d.head || d.body).appendChild(s);
                                })();
                            </script>
                            <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>

                        @endif



                </div>

                <div class="col-md-4">
                    @include('project_single_sidebar')
                </div>

            </div>
        </div>

        </section>

        @endsection

        @section('page-js')
        @if($enable_discuss)
        <script id="dsq-count-scr" src="//{{get_option('disqus_shortname')}}.disqus.com/count.js" async></script>
        @endif

        <script src="{{asset('assets/plugins/SocialShare/SocialShare.min.js')}}"></script>
        <script>
        $('.share').ShareLink({
            title: '{{$projects->project_name}}', // title for share message
            text: '{{$projects->project_description ? $projects->project_description : $projects->project_description}}', // text for share message
            width: 640, // optional popup initial width
            height: 480 // optional popup initial height
        })
        </script>

        <script>
        $(function(){
            $(document).on('click', '.donate-amount-placeholder ul li', function(e){
                $(this).closest('form').find($('[name="amount"]')).val($(this).data('value'));
            });
        });
        </script>

        @endsection  