@php
    $class = $type == "table" ? "card bg-white shadow-xl mx-6 mb-7" : "card bg-white max-w-3xl shadow-xl mx-auto text-black mb-7";
@endphp

<div class="{{$class}}">
    <div class="card-body overflow-clip ">
        {{$slot}}
    </div>
</div>