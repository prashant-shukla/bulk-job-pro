@extends('shopify-app::layouts.default')

@section('content')
    <div class="container">
        <h1>Welcome to BulkJobPro</h1>
        <p><strong>Shop Domain:</strong> {{ $shopDomain }}</p>
        <p><strong>Email:</strong> {{ $shopEmail }}</p>
    </div>
@endsection

<div class="btn-group mt-4">
    <a href="{{ route('admin.select-products') }}" class="btn btn-primary">Select Products</a>
    <a href="{{ route('admin.bulk-discounts') }}" class="btn btn-secondary">Set Bulk Discounts</a>
</div>
