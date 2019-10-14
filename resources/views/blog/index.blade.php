@extends('layouts.app')

@section('title', "Blog | Melu")

@section('meta')
@stop

@section('content')
  <div class="main-container blog-page" id="interior">
    <header class="page-header">
      <div class="background-image-holder parallax-background">
        <img class="background-image" alt="Background Image" src="{{ asset('img/hero-features.jpg') }}">
      </div>
      
      <div class="container">
        <div class="row">
          <div class="col-sm-12 text-center">
            <h1 class="text-white">Blog</h1>
          </div>
        </div><!--end of row-->
      </div><!--end of container-->
    </header>
    
    <section class="blog-list-3 bg-white">
      @if ($posts->have_posts())
        <?php while($posts->have_posts()) : $posts->the_post(); ?>
        <?php 
          if (has_post_thumbnail()) {
            $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full'); 
          }

        ?>
          <div class="blog-snippet-3">
            <div class="container">
              <div class="row">
                <div class="col-md-6 offset-md-3 col-sm-8 offset-sm-2">
                  <a href="{{ the_permalink() }}"><img style="padding-bottom: 20px;" alt="{{ the_title() }}" src="{{ isset($featured_img_url) ? $featured_img_url : asset('img/hero-features.jpg') }}"></a>
                  <h2><a href="{{ the_permalink() }}">{{ the_title() }}</a></h2>
                  <p class="lead">
                    {{ the_excerpt() }}
                  </p>
                  <i class="icon icon_calendar"></i><span class="alt-font">Published <?php the_date(); ?></span><br>
                </div>
              </div><!--end of row-->
            </div><!--end of container--> 
          </div><!--end of blog-snippet-3-->
        <?php endwhile; ?>
        @if ($posts->max_num_pages > 1)
          <nav aria-label="Page navigation example" class="pt-4 pb-2">
            <ul id="blog_pagination_list" class="pagination justify-content-center">
              @for ($i = 1; $i <= $posts->max_num_pages; $i++)
                <li class="page-item {{ $paged == $i ? 'active' : '' }}">
                  <a class="page-link" href="/blog?paged={{$i}}">{{$i}}</a>
                </li>
              @endfor
            </ul>
          </nav>
        @endif
      @endif
    </section>
  </div>
@endsection