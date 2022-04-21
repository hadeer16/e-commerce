<!-- PRODUCT-->
@foreach ($data as $products)
<div class="col-lg-4 col-sm-6">
    <div class="product text-center">
      <div class="mb-3 position-relative">
        <div class="badge text-white badge-" style="width:300px; height:300px"></div><a class="d-block" href="{{ route('detail.show',$products->id) }}"><img style="width:200px; height:200px" class="img-fluid w-100" src="{{ asset('product_img/'.$products->image) }}" alt="..."></a>
        <div class="product-overlay">
          <ul class="mb-0 list-inline">
            <li class="list-inline-item m-0 p-0"><a class="btn btn-sm btn-outline-dark" href="#"><i class="far fa-heart"></i></a></li>
            <li class="list-inline-item m-0 p-0"><a class="btn btn-sm btn-dark" href="cart.html">Add to cart</a></li>
            <li class="list-inline-item mr-0"><a class="btn btn-sm btn-outline-dark" href="#productView" data-toggle="modal"><i class="fas fa-expand"></i></a></li>
          </ul>
        </div>
      </div>
      <h6> <a class="reset-anchor" href="{{ route('detail.show',$products->id) }}">{{ $products->name }}</a></h6>
      <p class="small text-muted">{{ $products->price }}$</p>
    </div>
  </div>
@endforeach
  <!-- PRODUCT-->