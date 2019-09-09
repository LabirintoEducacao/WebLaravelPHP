@extends('vendor.page')

@section('content')
<div class="container">
    
    @if(Auth::user()->hasAnyRole('professor'))
    <div class="bd-example" style="width: 100%; margin-top:2%;">
        <div class="row">
            <div class="col-3">
                <div id="list-example" class="list-group">
                    <a class="list-group-item list-group-item-action" href="manual#list-item-1">Sala
                        <div id="list-example" class="list-group">
                            <a class="list-group-item list-group-item-action" href="manual#list-item-1-1">&emsp;Criar</a>
                            <a class="list-group-item list-group-item-action" href="manual#list-item-1-2">&emsp;Editar</a>
                            <a class="list-group-item list-group-item-action" href="manual#list-item-1-3">&emsp;Deletar</a>
                        </div>
                    </a>
                    <a class="list-group-item list-group-item-action"></a>
                    <a class="list-group-item list-group-item-action" href="manual#list-item-2">Perguntas e Respostas
                        <div id="list-example" class="list-group">
                            <a class="list-group-item list-group-item-action" href="manual#list-item-2-1">&emsp;Criar</a>
                            <a class="list-group-item list-group-item-action" href="manual#list-item-2-2">&emsp;Editar</a>
                            <a class="list-group-item list-group-item-action" href="manual#list-item-2-3">&emsp;Alterar Sequência</a>
                            <a class="list-group-item list-group-item-action" href="manual#list-item-2-4">&emsp;Deletar</a>
                            <a class="list-group-item list-group-item-action" href="manual#list-item-2-5">&emsp;Salvar todas as alterações</a>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-9">
                <div data-spy="scroll" data-target="#list-example" data-offset="0" class="scrollspy-example" style="overflow-y: scroll;height: 400px;">
                    <div>
                        <h4 id="list-item-1">
                            Salas
                        </h4>
                        <p>
                            Para acessar a área de configuração de salas, vá ao menu e clique em Editar Salas. Caso já possua salas cadastradas, elas apareceram.
                            <img src="/img/salas.png" class="img-fluid" style="width: 800px; padding-bottom: 50px; padding-top:50px; ">
                        </p>
                        <div style="padding-left: 5%">
                            <!--                            CRIAR SALA                 -->
                            <h5 id="list-item-1-1">
                                Criar Sala
                            </h5>
                            <p>
                                Para criar uma nova sala, clique em “ADICIONAR SALA" que fica localizado na parte superior direita do site.
                                <br>
                                <img src="/img/criar_sala.png" class="img-fluid" style="width: 800px; padding-bottom: 50px; padding-top:50px; ">
                                <br>
                                Após clicar no botão, você será guiado para outra página com os seguintes campos:
                            </p>
                            
                                <ul style="list-style-type:square;padding-left:18%">
                                    <li>
                                        Criador do Labirinto: preenchido com o seu nome de usuário;
                                    </li>
                                    <li>
                                        Nome da Sala: é o que irá aparecer para os alunos;
                                    </li>
                                    <li>
                                        Tempo de duração de cada sala: é o tempo (em segundos) em que o usuário pode permanecer dentro do labirinto. Caso não haja tempo pré-definido, o usuário permanecerá no labirinto até o jogo acabar;
                                    </li>
                                    <li>
                                        Tema: cenário do labirinto;
                                    </li>
                                    <li>
                                        Sala Pública: este campo deverá marcado se a sala tiver que ser aberta a todos os jogadores, caso contrário apenas usuários escolhidos pelo criador do labirinto poderão acessar o jogo.
                                    </li>
                                </ul>

                                <img src="/img/nova_sala.png" class="img-fluid" style="width: 800px; padding-bottom: 50px; padding-top:50px; ">
                            <p>
                                Após preencher todos os campos necessários, basta clicar em “CRIAR SALA”.
                            </p>
                            
                            
                            
                            <!--                            EDITAR SALA                           -->
                            <h5 id="list-item-1-2">
                                Editar Sala
                            </h5>
                            <p>
                                Após criar a sala, se algum dos campos tiver sido preenchido de forma errada, é só clicar no botão <i class="fa fa-cogs"></i> e ele abrirá um editor de texto com os mesmos campos da página de criar sala e, ao finalizar, clique em “SALVAR ALTERAÇÕES”.
                                <br>
                                <img src="/img/editar_sala.png" class="img-fluid" style="width: 800px; padding-bottom: 50px; padding-top:50px; ">
                               
                            </p>
                            
                            <!--                            DELETAR SALA                           -->
                            <h5 id="list-item-1-3">
                                Deletar Sala
                            </h5>
                            <p>
                                Para deletar uma sala, basta clicar no botão <i class="fa fa-trash"></i>.
                                <br>
                                <img src="/img/deletar_sala.png" class="img-fluid" style="width: 800px; padding-bottom: 50px; padding-top:50px; ">
                            </p>
                            
                        </div>
                    </div>
                    <div>
                        <h4 id="list-item-2">
                            Perguntas e Respostas
                        </h4>
                        <p>
                            Para acessar a área de perguntas e repostas, clique em <i class="fa fa-pencil-square-o"></i>
                            <img src="/img/editar_sala_perg.png" class="img-fluid" style="width: 800px; padding-bottom: 50px; padding-top:50px; ">
                        </p>
                        <div style="padding-left: 5%">
                            <!--                            CRIAR SALA                 -->
                            <h5 id="list-item-2-1">
                                Cadastrar Pergunta e Resposta
                            </h5>
                            <p>
                                Para criar uma nova sala, clique em “ADICIONAR PERGUNTA E RESPOSTA" que fica localizado na parte superior direita do site.
                                <br>
                                <img src="/img/nova_perg.png" class="img-fluid" style="width: 800px; padding-bottom: 50px; padding-top:50px; ">
                                <br>
                                Após clicar no botão, aparecerá uma caixa:
                            </p>
                            
                                <ul style="list-style-type:square;padding-left:18%">
                                    <li>
                                        Pergunta:
                                        <ul style="list-style-type:circle;padding-left:6%">
                                            <li>
                                                Tipo da pergunta: se é texto, imagem, vídeo ou áudio;
                                            </li>
                                            <li>
                                                Interação: como irá interagir com o usuário;
                                            </li>
                                            <li>
                                                Pergunta: este campo irá variar de acordo com o que foi selecionado no campo tipo de pergunta: se for texto, aparecerá um campo para digitar, se for imagem ou áudio, aparecerá um campo para realizar o upload do arquivo e, caso seja vídeo, aparecrá um campo para digitar a url do mesmo.
                                            </li>
                                        </ul>
                                        <img src="/img/add_perg.png" class="img-fluid" style="width: 400px; padding-bottom: 50px; padding-top:50px; ">
                                    </li>
                                    <li>
                                        Resposta:
                                        <ul style="list-style-type:circle;padding-left:6%">
                                            <li>
                                                Tipo da resposta: se é texto, imagem, vídeo ou áudio;
                                            </li>
                                            <li>
                                                Definição da resposta: se esta certa ou errada;
                                            </li>
                                            <li>
                                                Resposta: este campo irá variar de acordo com o que foi selecionado no campo tipo de resposta: se for texto, aparecerá um campo para digitar, se for imagem ou áudio, aparecerá um campo para realizar o upload do arquivo e, caso seja vídeo, aparecrá um campo para digitar a url do mesmo;
                                            </li>
                                            <li>
                                                Se for a primeira resposta, aparecerá um botão para adicionar mais uma resposta, caso contrário, aparecerá um botão para deletar a resposta.
                                            </li>
                                        </ul>
                                        <img src="/img/add_resp.png" class="img-fluid" style="width: 400px; padding-bottom: 50px; padding-top:50px; ">
                                    </li>
                                    <li>
                                        Ambiente:
                                        <ul style="list-style-type:circle;padding-left:6%">
                                            <li>
                                                Tipo do ambiente: se será um corredor ou um labirinto;
                                            </li>
                                            <li>
                                                Tamanho: pequeno, médio ou grande;
                                            </li>
                                            <li>
                                                Largura: pequeno, médio ou grande;
                                            </li>
                                        </ul>
                                        <img src="/img/add_ambiente.png" class="img-fluid" style="width: 400px; padding-bottom: 50px; padding-top:50px; ">
                                    </li>
                                    <li>
                                        Reforço: inicialmente só há um campo que, ao ser clicado, mostra os campos para preencher uma pergunta de reforço, esses campos serão exatamente iguais aos anteriores, a única diferença é que há duas configurações de ambientes diferentes: a primeira é o caminho que usuário irá percorrer para achar o reforço e o outro será o caminho pelo qual ele passará quando acertar a pergunta.
                                        <img src="/img/ref.png" class="img-fluid" style="width: 400px; padding-bottom: 50px; padding-top:50px; ">
                                        <img src="/img/add_ref.png" class="img-fluid" style="width: 400px; padding-bottom: 50px; padding-top:50px; ">
                                    </li>
                                    
                                </ul>

                                <!--                            imagem                 -->
                            <p>
                                Após preencher todos os campos necessários, basta clicar em “SALVAR”.
                            </p>
                            
                            
                            
                            <!--                            EDITAR SALA                           -->
                            <h5 id="list-item-2-2">
                                Editar Pergunta/Resposta
                            </h5>
                            <p>
                                Após criar as perguntas, se algum dos campos tiver sido preenchido de forma errada, é só clicar no botão <i class="fa fa-pencil-square-o"></i> e ele abrirá um editor de texto com os mesmos campos da caixa de criar pergunta e, ao finalizar, clique em “SALVAR ALTERAÇÕES”.
                                <br>
                                <img src="/img/editar_perg.png" class="img-fluid" style="width: 400px; padding-bottom: 50px; padding-top:50px; ">
                            </p>
                            <!--                            ALTERAR ORDEM                          -->
                            <h5 id="list-item-2-3">
                                Alterar Sequência
                            </h5>
                            <p>
                                É o botão no canto inferior direito, serve para alterar a ordem em que o jogador verá as perguntas. Para alterar a ordem, basta arrastar a perqunta para a posição desejada.
                                <br>
                                <img src="/img/ordem_perg.png" class="img-fluid" style="width: 400px; padding-bottom: 50px; padding-top:50px; ">
                                <img src="/img/ordem.png" class="img-fluid" style="width: 400px; padding-bottom: 50px; padding-top:50px; ">
                            </p>
                            
                            <!--                            DELETAR SALA                           -->
                            <h5 id="list-item-2-4">
                                Deletar Pergunta
                            </h5>
                            <p>
                                Para deletar uma pergunta, basta clicar no botão <i class="fa fa-trash"></i>.
                                <br>
                                <span style="color:#aa0000">Obs.: ao clicar em <i class="fa fa-trash"></i>, a(s) resposta(s) e, se houver, o reforço serão deletados juntos a pergunta.</span>
                                <br>
                                <img src="/img/deletar_perg.png" class="img-fluid" style="width: 400px; padding-bottom: 50px; padding-top:50px; ">
                            </p>
                            <h5 id="list-item-2-5">
                                Salvar todas as alterações
                            </h5>
                            <p>
                                No canto inferior da página, há um botão que garante que todas as perguntas e respostas sejam salvas, para que o QrCode seja gerado.
                                <br>
                                <img src="/img/salvar.png" class="img-fluid" style="width: 400px; padding-bottom: 50px; padding-top:50px; ">
                            </p>
                            
                        </div>
                    </div>
<!--
                    <h4 id="list-item-2">Item 2</h4>
                    <p>...</p>
                    <h4 id="list-item-3">Item 3</h4>
                    <p>...</p>
                    <h4 id="list-item-4">Item 4</h4>
                    <p>...</p>
-->
                </div>
            </div>
        </div>
    </div>
    @elseif(Auth::user()->hasAnyRole('user'))
    
    
    
    


    @endif
</div>
@endsection
