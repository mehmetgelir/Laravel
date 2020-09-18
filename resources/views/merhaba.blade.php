@foreach($products as $product)
	{{ $product->user[0]->name }} - {{ $product->name}} - {{$product->price,' $'}} <br>
@endforeach
