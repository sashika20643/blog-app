<!DOCTYPE html>

<!--
 // WEBSITE: https://themefisher.com
 // TWITTER: https://twitter.com/themefisher
 // FACEBOOK: https://www.facebook.com/themefisher
 // GITHUB: https://github.com/themefisher/
-->

<html lang="en-us">

@include('blog.components.head')
<body>

@include('blog.components.header')

<main>
  <section class="section">
    <div class="container">
      <div class="row no-gutters-lg">
      @include('blog.components.mainpanel')
@yield('content')
        <div class="col-lg-4">
  <div class="widget-blocks">
    <div class="row">
     @include('blog.components.about')
    @include('blog.components.recomended')
@include('blog.components.cat')
      </div>
    </div>
  </section>
</main>

@include('blog.components.foter')

<!-- # JS Plugins -->
@include('blog.components.scripts')

</body>
</html>
