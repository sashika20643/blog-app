<!DOCTYPE html>

<!--
 // WEBSITE: https://themefisher.com
 // TWITTER: https://twitter.com/themefisher
 // FACEBOOK: https://www.facebook.com/themefisher
 // GITHUB: https://github.com/themefisher/
-->

<html lang="en-us">

<head>
 @include('blog.components.head')
</head>

<body>

    <header class="navigation">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light px-0">
                <a class="navbar-brand order-1 py-0" href="/">
                    <img loading="prelaod" decoding="async" class="img-fluid" src="{{asset('images/logo.png')}}" alt="Reporter Hugo">
                </a>
                <div class="navbar-actions order-3 ml-0 ml-md-4">
                    <button aria-label="navbar toggler" class="navbar-toggler border-0" type="button"
                        data-toggle="collapse" data-target="#navigation"> <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
                <form action="{{ route('posts.search') }}" method="post" class="search order-lg-3 order-md-2 order-3 ml-auto">
                   @csrf
                    <input id="search-query" name="query" type="search" placeholder="Search..." autocomplete="off">
                </form>
                <div class="collapse navbar-collapse text-center order-lg-2 order-4" id="navigation">
                    <ul class="navbar-nav mx-auto mt-3 mt-lg-0">
                        <li class="nav-item"> <a class="nav-link" href="{{route('blog.aboutme')}}">About Me</a>
                        </li>
                        <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Articles
                            </a>
                            <div class="dropdown-menu">
                                @foreach ($categories as $cat)
                                <a class="dropdown-item" href="{{route('blog.cat.show',$cat->id)}}">{{$cat->name}}</a>

                                @endforeach

                            </div>
                        </li>
                        <li class="nav-item"> <a class="nav-link" href="{{route('blog.contact')}}">Contact</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>

    <main>
        <section class="section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mb-5 mb-lg-0">
                     @yield('content')
                        <div class="mt-5">
                            <div id="disqus_thread"></div>
                            <script type="application/javascript">
							var disqus_config = function () {



							    };
							    (function() {
							        if (["localhost", "127.0.0.1"].indexOf(window.location.hostname) != -1) {
							            document.getElementById('disqus_thread').innerHTML = 'Disqus comments not available by default when the website is previewed locally.';
							            return;
							        }
							        var d = document, s = d.createElement('script'); s.async = true;
							        s.src = '//' + "themefisher-template" + '.disqus.com/embed.js';
							        s.setAttribute('data-timestamp', +new Date());
							        (d.head || d.body).appendChild(s);
							    })();
						</script>
                            <noscript>Please enable JavaScript to view the <a
                                    href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a>
                            </noscript>
                            <a href="https://disqus.com" class="dsq-brlink">comments powered by <span
                                    class="logo-disqus">Disqus</span></a>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="widget-blocks">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="widget">
                                        <div class="widget-body">
                                            <img loading="lazy" decoding="async" src="{{asset('images/author.jpg')}}"
                                                alt="About Me" class="w-100 author-thumb-sm d-block">
                                            <h2 class="widget-title my-3">Akila Santhush</h2>
                                            <p class="mb-3 pb-2">Hello, I’m GAS Perera. A Content writter,
                                                Developer and Story teller. Working as a Content writter at CoolTech
                                                Agency. Quam nihil …</p> <a href="{{route('blog.aboutme')}}"
                                                class="btn btn-sm btn-outline-primary">Know
                                                More</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-6">
                                    <div class="widget">
                                        <h2 class="section-title mb-3">Recommended</h2>
                                        <div class="widget-body">
                                            <div class="widget-list">
                                                <article class="card mb-4">
                                                    <div class="card-image">
                                                        <div class="post-info"> <span class="text-uppercase">1 minutes
                                                                read</span>
                                                        </div>
                                                        <img loading="lazy" decoding="async"
                                            src="{{ asset('storage/'.$sideposts[0]->image) }}" alt="Post Thumbnail"
                                                            class="w-100">
                                                    </div>
                                                    <div class="card-body px-0 pb-1">
                                                        <h3><a class="post-title post-title-sm"
                                                                href="{{route('blog.post.show',$sideposts[0]->id)}}">{{$sideposts[0]->title}}</a></h3>
                                                        <p class="card-text"> {{ Str::limit(strip_tags($sideposts[0]->content), 2 * 150) }}</p>
                                                        <div class="content"> <a class="read-more-btn"
                                                                href="{{route('blog.post.show',$sideposts[0]->id)}}">Read Full Article</a>
                                                        </div>
                                                    </div>
                                                </article>
                                                @for ($i=1;$i<5;$i++)
                                                <a class="media align-items-center" href="{{route('blog.post.show',$sideposts[$i]->id)}}">
                                                    <img loading="lazy" decoding="async" src="{{ asset('storage/'.$sideposts[$i]->image) }}"
                                                        alt="Post Thumbnail" class="w-100">
                                                    <div class="media-body ml-3">
                                                        <h3 style="margin-top:-5px">{{$sideposts[$i]->title}}
                                                        </h3>
                                                        {{-- <p class="mb-0 small">{{ Str::limit(strip_tags($sideposts[$i]->content), 1 * 150) }}</p> --}}
                                                    </div>
                                                </a>

                                                @endfor

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-6">
                                    <div class="widget">
                                        <h2 class="section-title mb-3">Categories</h2>
                                        <div class="widget-body">
                                            <ul class="widget-list">
@foreach ($categories as $category )

<li><a href="{{route('blog.cat.show',$category->id)}}">{{$category->name}}<span class="ml-auto"></span></a>
</li>
@endforeach

                                                {{-- <li><a href="#!">computer<span class="ml-auto">(3)</span></a>
                                                </li>
                                                <li><a href="#!">cruises<span class="ml-auto">(2)</span></a>
                                                </li>
                                                <li><a href="#!">destination<span class="ml-auto">(1)</span></a>
                                                </li>
                                                <li><a href="#!">internet<span class="ml-auto">(4)</span></a>
                                                </li>
                                                <li><a href="#!">lifestyle<span class="ml-auto">(2)</span></a>
                                                </li>
                                                <li><a href="#!">news<span class="ml-auto">(5)</span></a>
                                                </li>
                                                <li><a href="#!">telephone<span class="ml-auto">(1)</span></a>
                                                </li>
                                                <li><a href="#!">tips<span class="ml-auto">(1)</span></a>
                                                </li>
                                                <li><a href="#!">travel<span class="ml-auto">(3)</span></a>
                                                </li>
                                                <li><a href="#!">website<span class="ml-auto">(4)</span></a>
                                                </li>
                                                <li><a href="#!">hugo<span class="ml-auto">(2)</span></a>
                                                </li> --}}
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@include('blog.components.foter')


    <!-- # JS Plugins -->
 @include('blog.components.scripts')

</body>

</html>
