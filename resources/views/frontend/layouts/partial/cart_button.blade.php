<form action="{{route('cart.store')}}"method="POST">
    @csrf
    <input type="hidden"name="product_id"value="{{$product->id}}">
    <button type="submit" class="btn btn-warning"><i class="material-icons"></i>Add to cart</button>


</form>