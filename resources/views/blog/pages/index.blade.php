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
            <div class="content"> <a class="read-more-btn" href=""{{route('blog.post.show',$posts[$i]->id)}}"">Read Full Article</a>
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
                  <li class="page-item">
                    <a class="page-link" href="#!" aria-label="Pagination Arrow">
                      <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"/>
                      </svg>
                    </a>
                  </li>
                  <li class="page-item active "> <a href="index.html" class="page-link">
                      1
                    </a>
                  </li>
                  <li class="page-item"> <a href="#!" class="page-link">
                      2
                    </a>
                  </li>
                  <li class="page-item">
                    <a class="page-link" href="#!" aria-label="Pagination Arrow">
                      <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z" />
                      </svg>
                    </a>
                  </li>
                </ul>
              </nav>
            </nav>
          </div>
        </div>
      </div>
    </div>

@endsection
