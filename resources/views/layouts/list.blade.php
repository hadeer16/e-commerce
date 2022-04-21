<div class="col-lg-3 order-2 order-lg-1">
    <h5 class="text-uppercase mb-4">Categories</h5>
    @foreach ($cat as $cats)
    <a href="{{ route('shop.show',$cats->id) }}" style="text-decoration: none"><div class="py-2 px-4 bg-dark text-white mb-3"><strong class="small text-uppercase font-weight-bold">{{ $cats->name }}</strong></div></a>
    @endforeach
  </div>