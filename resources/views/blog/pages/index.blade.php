@extends('blog.layouts.blogpostlayout')

@section('content')

    <div class="row">
      <div class="col-12 mb-4">
        <article class="card article-card">
          <a href="article.html">
            <div class="card-image">
              <div class="post-info"> <span class="text-uppercase">{{ $posts[0]->created_at }}</span>
                @php
                      $wordCount = str_word_count(strip_tags($posts[0]->content));
    $readingTime = ceil($wordCount / 200);
                @endphp
                <span class="text-uppercase">{{ $readingTime}} minutes read</span>
              </div>
              <img loading="lazy" decoding="async" src="{{ asset('storage/'.$posts[0]->image) }}" alt="Post Thumbnail" class="w-100">
            </div>
          </a>
          <div class="card-body px-0 pb-1">
            <ul class="post-meta mb-2">
              <li> <a href="#!">{{ $posts[0]->category->name }}</a>

              </li>
            </ul>
            <h2 class="h1"><a class="post-title" href="{{route('blog.post.show',$posts[0]->id)}}">{{$posts[0]->title}}</a></h2>
            <p class="card-text">{{ Str::limit(strip_tags($posts[0]->content), 3 * 150) }}</p>
            <div class="content"> <a class="read-more-btn" href="{{route('blog.post.show',$posts[0]->id)}}">Read Full Article</a>
            </div>
          </div>
        </article>
      </div>
      @for ($i=1;$i<count($posts);$i+=1)
      @php
      $wordCount = str_word_count(strip_tags($posts[$i]->content));
$readingTime = ceil($wordCount / 200);
@endphp
      <div class="col-md-6 mb-4">
        <article class="card article-card article-card-sm h-100">
          <a href="article.html">
            <div class="card-image">
              <div class="post-info"> <span class="text-uppercase">{{ $posts[$i]->created_at }}</span>
                <span class="text-uppercase">{{$readingTime}} minutes read</span>
              </div>
              <img loading="lazy" decoding="async" src="{{ asset('storage/'.$posts[$i]->image) }}" alt="Post Thumbnail" class="w-100">
            </div>
          </a>
          <div class="card-body px-0 pb-0">
            <ul class="post-meta mb-2">
              <li> <a href="#!">{{ $posts[$i]->category->name }}</a>
              </li>
            </ul>
            <h2><a class="post-title" href="{{route('blog.post.show',$posts[$i]->id)}}">{{$posts[$i]->title}}</a></h2>
            <p class="card-text">{{ Str::limit(strip_tags($posts[$i]->content), 2 * 150) }}</p>
            <div class="content"> <a class="read-more-btn" href="{{route('blog.post.show',$posts[$i]->id)}}">Read Full Article</a>
            </div>
          </div>
        </article>
      </div>

      @endfor



      <div class="col-12">
        <div class="row">
          <div class="col-12">
            <nav class="mt-4">
              <!-- pagination -->
              <nav class="mb-md-50">
                <ul class="pagination justify-content-center">
                    <div class="container">
                        {!!$posts->withQueryString()->links('pagination::bootstrap-5')!!}

                    </div>
                </ul>
              </nav>
            </nav>
          </div>
        </div>
      </div>
    </div>

@endsection
