@extends('vendor.menu')

@section('content')

<form>
     <div class="form-check">
        <label class="form-check-label">

            <input class="form-check-input" type="checkbox" id="qntdeRespPerg" checked>
            Quantidade de respostas por pergunta
            <span class="form-check-sign">
                <span class="check"></span>
            </span>
        </label>
    </div>

</form>



<!--
<div style="display:none" id="qntdeRespPergDiv">
    
    <h4>Quantidade de respostas por pergunta</h4>

    <div style="width: 50%">
        {!! $usersChart->container() !!}
    </div>
    
</div>
-->




<div style="display:block" id="qntdeRespPergDiv">
    
    <h4>Quantidade de respostas por pergunta</h4>

    <div style="width: 50%">
        {!! $usersChart->container() !!}
    </div>
    
</div>
@endsection

@section('myscript')
<!--

<script>
    $('#qntdeRespPerg').change(function(){
        alert('entrou1')
        if($(this).checked){
            $('#qntdeRespPergDiv').css('display','block');
        }
    })
    

</script>
-->

@endsection