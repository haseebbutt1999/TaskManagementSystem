@extends('adminpanel.layout.default')
@section('content')
    <div class="content-wrapper">
        @foreach($discount_codes_api as $discount_code)
            <ul>
                <li>Discount_code_id:{{$discount_code->id}}</li>
                <li>Price_rule_id: {{$discount_code->price_rule_id}}</li>
                <li>Discount_code: {{$discount_code->code}}</li>
                <li>Discount_code_usage :{{$discount_code->usage_count}}</li>
            </ul>
        @endforeach
    </div>
@endsection
