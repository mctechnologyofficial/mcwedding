<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>MC WEDDING</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('landing/assets/img/logo mc.png') }}" rel="icon">
  <link href="{{ asset('landing/assets/img/logo mc.png') }}" rel="apple-touch-icon">

  @include('landing.components.css')
</head>

<body>

  @include('landing.components.header')

  @include('landing.components.hero')

  <main id="main">

    @include('landing.section.1')

    @include('landing.section.4')

    @include('landing.section.6')

  </main><!-- End #main -->

  @include('landing.components.footer')

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  @include('landing.components.js')

</body>

</html>
