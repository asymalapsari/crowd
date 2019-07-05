<div class="single-donate-wrap">

    <h3 class="campaign-single-sub-title">{{$projects->project_name}}</h3>

    <div class="single-author-box">
        <img class="img-center" src="https://source.unsplash.com/255x255/?marketing" alt="Projects" width="300" height="255">
        <p><strong>{{$institution->institution_name}}</strong> <br />   {{$institution->email}} </p>
    </div>


    @if(empty($rating))
        <form action="{{route('project_rated',['id' => $projects->id])}}" method="POST">
            {{ csrf_field() }}
            <div class="form-group row">
                <fieldset class="rating">
                    <input type="radio" id="star5" name="rating" value="5" /><label class = "full" for="star5" title="Awesome - 5 stars"></label>
                    <!-- <input type="radio" id="star4half" name="rating" value="4 and a half" /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label> -->
                    <input type="radio" id="star4" name="rating" value="4" /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
                    <!-- <input type="radio" id="star3half" name="rating" value="3 and a half" /><label class="half" for="star3half" title="Meh - 3.5 stars"></label> -->
                    <input type="radio" id="star3" name="rating" value="3" /><label class = "full" for="star3" title="Meh - 3 stars"></label>
                    <!-- <input type="radio" id="star2half" name="rating" value="2 and a half" /><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label> -->
                    <input type="radio" id="star2" name="rating" value="2" /><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
                    <!-- <input type="radio" id="star1half" name="rating" value="1 and a half" /><label class="half" for="star1half" title="Meh - 1.5 stars"></label> -->
                    <input type="radio" id="star1" name="rating" value="1" /><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
                    <!-- <input type="radio" id="starhalf" name="rating" value="half" /><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label> -->
                </fieldset>
            </div> 
            <div class="form-group row">
                <button type="submit" class="btn btn-primary">Rate me</button>
            </div>
        </form>
    @else
        <h4>Thank you for rating!</h4>
    @endif
    <div class="socialShareWrap">
        <ul>
            <li><a href="#" class="share s_facebook"><i class="fa fa-facebook-square"></i> </a> </li>
            <li><a href="#" class="share s_twitter"><i class="fa fa-twitter-square"></i> </a> </li>
            <li><a href="#" class="share s_linkedin"><i class="fa fa-linkedin-square"></i> </a> </li>
            <li><a href="#" class="share s_vk"><i class="fa fa-vk"></i> </a> </li>
            <li><a href="#" class="share s_pinterest"><i class="fa fa-pinterest-square"></i> </a> </li>
        </ul>
    </div>

</div>





