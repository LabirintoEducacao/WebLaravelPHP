@extends('vendor.menu')

@section('content')
<h4>Quantidade de respostas por pergunta</h4>

<div style="width: 50%">
    {!! $usersChart->container() !!}
</div>
@endsection
