@extends('layouts.app')

@section('title')
{{ get_post_meta(get_the_ID(), '_yoast_wpseo_title', true) }} | Blog | Melu @endsection

@section('meta')
<meta name="description" content="{{ get_post_meta(get_the_ID(), '_yoast_wpseo_metadesc', true) }}" />
<meta property="og:locale" content="en_GB" />
<meta property="og:type" content="website" />
<meta property="og:title" content="{{ get_post_meta(get_the_ID(), '_yoast_wpseo_opengraph-title', true) }}" />
<meta property="og:description" content="{{ get_post_meta(get_the_ID(), '_yoast_wpseo_opengraph-description', true) }}" />
<meta property="og:url" content="{{ Request::url() }}" />
<meta property="og:site_name" content="Melu" />
<meta property="og:image" content="{{ get_post_meta(get_the_ID(), '_yoast_wpseo_opengraph-image', true) }}" />
<meta property="og:image:secure_url" content="{{ get_post_meta(get_the_ID(), '_yoast_wpseo_opengraph-image', true) }}" />
<meta property="og:image:width" content="1200"/>
<meta property="og:image:height" content="630"/>

<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:description" content="{{ get_post_meta(get_the_ID(), '_yoast_wpseo_opengraph-title', true) }}" />
<meta name="twitter:title" content="{{ get_post_meta(get_the_ID(), '_yoast_wpseo_twitter-description', true) }}" />
<meta name="twitter:site" content="@melulivechat" />
<meta name="twitter:image" content="{{ get_post_meta(get_the_ID(), '_yoast_wpseo_twitter-image', true) }}" />
<meta name="twitter:image:alt" content="Melu Live Chat" />
<meta name="twitter:creator" content="@melulivechat" />
@endsection

@section('content')

  <!-- JOSEPH: <?php echo get_post_meta(get_the_ID(), '_yoast_wpseo_metadesc', true); ?> -->

  <div class="main-container blog-page" id="interior" data-postid="{{ get_the_ID() }}">
    <?php while($posts->have_posts()) : $posts->the_post(); ?>

    <?php 
      if (has_post_thumbnail()) {
        $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full'); 
      }

    ?>
      <header class="page-header">
        <div class="background-image-holder parallax-background">
          <img class="background-image" alt="Background Image" src="{{ isset($featured_img_url) ? $featured_img_url : asset('img/hero-features.jpg') }}">
        </div>
        
        <div class="container">
          <div class="row">
            <div class="col-sm-12 text-center">
              <h1 class="text-white">{{ the_title() }}</h1>
            </div>
          </div><!--end of row-->
        </div><!--end of container-->
      </header>

      <section class="article-single">
        <div class="container">
          <div class="row">
            <div class="col-md-8 offset-md-2 col-sm-10 offset-sm-1">
              <div class="article-body">
                {{ the_content() }}
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-8 offset-md-2 col-sm-10 offset-sm-1">
              <a href="{{ route('blog') }}" class="btn btn-grey mt-3">
                <i class="fa fa-arrow-left"></i> Back
              </a>
            </div>
          </div>
        </div>
      </section>
    <?php endwhile; ?>

    
  </div>
@endsection