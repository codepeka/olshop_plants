<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

	<link rel="icon" href="{{ asset('assets/images/icon.svg') }}">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Font Nye -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <title>Hello, world!</title>
  </head>
  <body>
  	<!-- Navbar -->
    <nav class="navbar navbar-light">
	  <div class="container">
	    <a class="mx-auto" href="#">
	      <img src="{{ asset('assets/images/Logo.svg') }}" height="50">
	      <!-- <span class="navbar-brand mb-0 h1 ml-1">Learning By Video</span> -->
	    </a>
	  </div>
	</nav>
	<!-- End Navbar -->
    
    <!-- Banners -->
    <div class="container mt-5 pt-5">
      <div class="banner">
      	<img src="{{ asset('assets/images/Banner.png') }}" width="100%" m>
      </div>
    </div>
    <!-- End Banners -->

    <!-- Section -->
    <div class="container mt-5">
      <div class="secHead">
      	<h4 style="font-weight: 600">Tanduran Anyar</h4>
      </div>

      <!-- Cards -->
      <div class="secContent row mt-4" id="demo">
      	@if (!$products)
      	<div class="alert alert-light text-center" role="alert">
		  <img src="{{ asset('assets/images/coming soon.svg') }}" width="350px">
		  <br/><br/>
		  <h1>Coming Soon!</h1>
		</div>
		@endif
      	@foreach($products as $product)
	    <div class="card mb-3 mx-auto">
		  <div class="mx-auto" width="100%">
		    <!-- <img src="{{ asset('assets/images/Tanduran 1.png') }}" class="mx-2"> -->
		    <img src="{{ asset('storage') }}/{{$product->images}}" class="mx-2 mt-3 rounded-top" width="218px" height="199px">
		  </div>
		  <div class="card-body">
		    <h5 class="card-title">{{ $product->name_product }}</h5>
		    <div class="d-flex bd-highlight">
		      <div class="bd-highlight">
		      	<p class="mb-0" style="font-size: 14px;">Harga</p>
		      	<p class="mb-0" style="font-size: 16px; font-weight: 700">Rp. {{ number_format($product->price, 0) }}</p> 
		      </div>
		      <div class="ms-auto bd-highlight d-flex align-items-center">
		        <a href="https://api.whatsapp.com/send?phone={{ $product->phone }}&text=Kode Produk : {{ $product->id }} | Nama Produk : {{ $product->name_product }} | Harga : {{ $product->price }}" target="blank" class="btn btn-success btn-sm rounded-pill px-3"> Beli </a>	
		      </div>
		    </div>
		  </div>
		</div>
      	@endforeach
      </div>
      <!-- End Cards -->
    </div>
    <!-- End Section -->
    
    <!-- Footer -->
	<div class="footer mt-5">
	  <div class="container">
	  	<div class="row ml-2">
		<div class="footer-logo col-md-4 my-3">
		  <img src="{{ asset('assets/images/logo.svg') }}" height="35">
		</div>
		<div class="footer-menu ms-auto">
		  <a class="fm-list">Copyright &copy; 2021</a>
		</div>
	  	</div>
	  </div>
	</div>
	<!-- End Footer -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- <script type="text/javascript">
      let str = "";

	  for (let i = 0; i < 12; i++) {
	  	str += `<div class="card mb-3 mx-auto">
	  			  <div class="mx-auto" width="100%">
	  			    <img src="{{ asset('assets/images/Tanduran 1.png') }}" class="mx-2">
	  			  </div>
	  			  <div class="card-body">
	  			    <h5 class="card-title">Kembang Nopo</h5>
	  			    <div class="d-flex bd-highlight">
	  			      <div class="bd-highlight">
	  			      	<p class="mb-0" style="font-size: 14px;">Harga</p>
	  			      	<p class="mb-0" style="font-size: 16px; font-weight: 700">Rp. 150.000,-</p> 
	  			      </div>
	  			      <div class="ms-auto bd-highlight d-flex align-items-center">
	  			        <a href="#" class="btn btn-success btn-sm rounded-pill px-3"> Beli </a>	
	  			      </div>
	  			    </div>
	  			  </div>
	  			</div>`;
	  } document.getElementById('demo').innerHTML = str;
    </script> -->

  </body>
</html>