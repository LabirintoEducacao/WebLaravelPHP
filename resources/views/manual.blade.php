@extends('vendor.page')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        
        <h1> Manual do Usuario</h1>
    </div>
    <h4>Etapas para construir seu labirinto</h4>
    <p> A seguir listamos todos os passos para o desenvolvimento de seu jogo. </p>
    <ol>
        <li> Criação da Sala </li>
        <li> Adicionar Perguntas e Respostas</li>
        <li> Salvar seu Conteudo</li>
    </ol>
 <h4>1 - Criação da Sala</h4>
 <p> Para criar a sala no menu clique em <a href="/admin/sala">editar sala </a>, esta parte esta associada a criação e edição de salas, se você já tem alguma sala vinculada ao seu usuario então irá aparecer as opções para editar. Para criar uma sala novo, clique no botao <a href="/admin/adicionar-sala">ADICIONAR SALA"</a> que fica localizado na parte superior do site.</p>
<img src="/img/criar_sala.png" class="img-fluid" style="width: 800px; padding-bottom: 50px; padding-top:50px; ">


<h5> 1.1 - Configuração da Sala </h5>
<p> Ao clicar no botão "ADICIONAR SALA" uma nova pagina se abrirá, ali você terá a que configurar algumas opções.</p>
<ul>
    <li> Criador do Labirinto : Aqui o site puxará o nome do usuario</li>
    <li> Nome de sua sala : Esse nome será para controle do usuario não será mostrado dentro do jogo.</li>
    <li> Tempo de duração de cada sala : Aqui o usuario colocará o tempo maximo que um jogador permanecer dentro do labirinto. O tempo é dado em segundos. Se o usuario não inserir nenhum tempo o programa não define tempo para sala sendo assim não existe tempo limitante no labirinto.</li>
    <li> Tema : o Tema se refere ao cenario do labirinto. </li>
    <li> Sala Publica : O jogo tem a opção de criar uma sala restrita, ou uma sala aberta a todos os jogadores. Se a opção Sala publica for marcada, qualquer jogador terá acesso a sua sala. </li></ul>
    
    <p>Após configurar os parametros clique no botão "ADICIONAR SALA" para criar sala ou no botão "CANCELAR" para descartar o progresso.</p>
    <img src="/img/conf_sala.png" class="img-fluid" style="width: 800px; padding-bottom: 50px; padding-top:50px; ">

     <h4>2 - Adicionar Perguntas e Respostas</h4>
     <p>Se você chegou até aqui pela etapa 1, então após clicar em "CRIAR SALA" você foi redirecionado para a parte 'EDITAR SALA', aqui você tem acesso a todas as salas criadas pelo usuario. Você notará que existe 4 botões abaixo de sua sala</p>
     <h5>Definições dos Botões</h5>
<ul>
      <li class=" fa fa-cogs" style="font-size: 20px; padding-bottom: 10px;">  Engrenagem : Editar os atributos da sala (Nome, tempo de duração, tema, se é pública ou privada)</li> <br>
      <li class="fa fa-pencil-square-o" style="font-size: 20px; padding-bottom: 10px;"> Lapis : Adicionar/editar perguntas, respostas e alunos</li> <br>
      <li class="fa fa-trash" style="font-size: 20px; padding-bottom: 10px;"> Lixo : Deletar sala</li> <br>
</ul>


</div>
@endsection
