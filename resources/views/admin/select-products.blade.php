@extends('shopify-app::layouts.default')

@section('content')
<div class="container">
    <h2>Select Products</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('admin.save-products') }}" method="POST">
        @csrf
        <div class="form-group">
            @foreach ($products as $product)
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="selected_products[]" value="{{ $product['id'] }}" id="product-{{ $product['id'] }}">
                    <label class="form-check-label" for="product-{{ $product['id'] }}">
                        {{ $product['title'] }}
                    </label>
                </div>
            @endforeach
        </div>
        <button type="submit" class="btn btn-primary">Save Selection</button>
    </form>
</div>
@endsection
