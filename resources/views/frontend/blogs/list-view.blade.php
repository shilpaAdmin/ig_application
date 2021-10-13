
@foreach ($blogs as $blog)
    @php
        $images=json_decode($blog->media_file_json, true);
        if(count($images) && isset($images[0][0])){
            $imageUrl= URL::to('/images/blogs').'/'.$images[0][0] ;
        } else {
            $imageUrl= URL::asset('assets/frontend/images/img/j1.jpg');
        }
        $slug = isset($blog->slug) ? $blog->slug : Str::slug($blog->name, '-');
    @endphp
    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">

        <div class="blog_one_single wow fadeInDown animated" data-wow-delay="600ms"
            style="visibility: visible; animation-delay: 600ms; animation-name: fadeInDown;">
            <div class="blog_image">
                <img src="{{ $imageUrl }}" alt="Blog One Image">
            </div>
            <div class="blog-one__content">
                <ul class="list-unstyled blog-one__meta">
                    <li><a href=""><i class="far fa-user-circle"></i>by {{ isset($blog->user) && isset($blog->user->name) ? ucwords($blog->user->name) : '-' }}</a></li>
                    <li><a href=""><i class="far fa-comments"></i>{{ isset($blog->blogComments) ?$blog->blogComments->count():0 }} Comments</a>
                    </li>
                </ul>
                <div class="blog_one_title">
                    <h3><a href="{{ route('blog.detail',['slug'=>$slug]) }}">{{ isset($blog->name) ? ucwords($blog->name) :'-'}}</a>
                    </h3>
                </div>
                <div class="blog_one_text">
                    <p> {{ isset($blog->description) ? ucwords($blog->description) : '-' }} </p>
                </div>
                <div class="blog_one_date">
                    <p>{{ $blog->created_at->format('d') }}<br>{{ $blog->created_at->format('M') }}</p>
                </div>
            </div>
        </div>
    </div>
@endforeach