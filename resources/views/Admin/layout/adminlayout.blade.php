<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ config('app.name') }} dashboard</title>
    <!-- plugins:css -->
    @include('Admin.components.stylesheet')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<style>

    #pop{
        width: 0;
        -webkit-transition: 1s ease-in-out;
    -moz-transition: 1s ease-in-out;
    -o-transition: 1s ease-in-out;
    transition: 1s ease-in-out;
overflow: scroll;
    }
    #contents{
        display: none;
    }
    .pop{
        color: rgb(146, 146, 179);
        height: 100vh;
        overflow:scroll;
border-radius: 4%;
top:0;

        z-index: 99999;

        background-color:#191c24;
        position: fixed;

        right:0;
    }
    .pop .closebtn {
  position: absolute;
  top: 0;
  left: 25px;
  font-size: 36px;
  margin-left: 50px;
}
.pop a{
    text-decoration: none;
    color: rgb(164, 135, 211);
}
.pop a:hover{
    color: rgb(174, 175, 185);
}

#topconts{
    margin-top:100px;
    display: flex;


}

#topconts div{
    width: 50%;
    text-align: left;
}
.pop table{
    min-width: 50%;
}
.pop table td{
    padding: 5px;
    text-align: left
}
.pop table th{
    padding: 5px;
    text-align: left
}
.pop button {
    margin-right:10px;
}
</style>
  </head>

  <body>
    @include('sweetalert::alert')

    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('Admin.components.sidebar')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
    @include('Admin.components.navbar')
    <div class="main-panel">
        <div class="content-wrapper">
@yield('content')
        </div>
    </div>
</div>
<!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
<!-- plugins:js -->
@include('Admin.components.scripts')
<script>

    function confirmation(ev) {

      ev.preventDefault();

      var urlToRedirect = ev.currentTarget.getAttribute('href');

      console.log(urlToRedirect);

      swal({

          title: "Are you sure to complete this",

          text: "You will not be able to revert this!",

          icon: "warning",

          buttons: true,

          dangerMode: true,

      })

      .then((willCancel) => {

          if (willCancel) {







              window.location.href = urlToRedirect;



          }





      });





  }

</script>
<!-- End custom js for this page -->
</body>
</html>
