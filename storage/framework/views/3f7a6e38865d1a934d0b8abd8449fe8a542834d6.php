<?php $__env->startSection('content'); ?>

<?php if(session('status')): ?>
<div class="alert alert-success" role="alert">
    <?php echo e(session('status')); ?>

</div>
<?php endif; ?>
<input type="hidden" value="52" id="num_y">

<div class="modal fade" id="addPerg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog larguramodal" role="document">
        <div class="modal-content">
            <div class="card card-nav-tabs card-plain">
                <div class="card-header card-header-primary">
                    <!-- colors: "header-primary", "header-info", "header-success", "header-warning", "header-danger" -->
                    <div class="container row align-items-center">
                        <div class="col-11">
                            <div class="nav-tabs-navigation">
                                <div class="nav-tabs-wrapper">
                                    <ul class="nav nav-tabs" data-tabs="tabs">
                                        <li class="nav-item">
                                            <a class="nav-link active" href="#perg" data-toggle="tab">Pergunta</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#pergReforco" data-toggle="tab">Reforço</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-1">
                            <button type="submit" class="close btnModalClose" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>

                </div>
            </div>

            <div class="container ">
                <div class="row align-items-center">
                    <div class="col-6 alert alert-success print-success-msg" style="display: none; position: absolute; z-index: 9999999999;">
                        <ul style="list-style-type: none"></ul>
                    </div>
                </div>
                <!-- <div class="col-6 alert alert-danger print-error-msg" style="display: none;">
                    <ul></ul>
                </div> -->
            </div>

            <form name="add_name" id="add_name">
                <div class="modal-body">



                    <?php echo csrf_field(); ?>
                    <?php echo e(csrf_field()); ?>


                    <input type="hidden" value="<?php echo e($id); ?>" name="sala_id">
                    <input type="hidden" value="0" name="perg_reforco" id="perg_reforco">


                    <!-- Pergunta  -->
                    <div class="tab-content">
                        <div class="tab-pane active" id="perg">
                            <div class=" container" style="margin-top: -40px">
                                <div class="card houvercard">
                                    <div class=" container">
                                        <div class="row" style="margin-top: 10px;">
                                            <div class="col">
                                                <input type="hidden" value="0" name="perg_id" id="perg_id">
                                                <label for="pergunta" style=" font-size:  130%; color: black;">Pergunta:</label>
                                            </div>
                                            <div class="col-12 col-md-auto" style="display:inline-block">
                                                <div class="row" style="height:50px;">
                                                    <div class="col-5" style="height:100%;">
                                                        <label for="question_type" style="margin-right: 3.5px; padding-top:10%;">Tipo da pergunta:</label>
                                                    </div>
                                                    <div class="col-7">
                                                        <select class="form-control selectpicker room_type" data-style="btn btn-primary" name="question_type" id="question_type" style="float:left;">
                                                            <option selected value="1" data-content="<i class='fa fa-question-circle' style='margin-left: -20px;' data-toggle='tooltip' title='tesssss fg fgfd gfdgfdfgfggf rfgfd retg ret wert er tewr terer tt '></i>&emsp;Texto"></option>
                                                            <option value="2" data-content="<i class='fa fa-question-circle' style='margin-left: -20px;' data-toggle='tooltip' title='tesssss 2'></i>&emsp;Imagem"></option>
                                                            <option value="3" data-content="<i class='fa fa-question-circle' style='margin-left: -20px;' data-toggle='tooltip' title='tesssss 3'></i>&emsp;Video"></option>
                                                            <option value="4" data-content="<i class='fa fa-question-circle' style='margin-left: -20px;' data-toggle='tooltip' title='tesssss 4'></i>&emsp;Áudio"></option>
                                                        </select>
                                                        <div id="tooltip_container"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col col-lg-4">
                                                <div class="row" style="height:50px;">
                                                    <div class="col-5" style="height:100%;">
                                                        <label for="room_type" style="margin-right: 3.5px; padding-top:10%;">Interação:</label>
                                                    </div>
                                                    <div class="col-7">
                                                        <select class="form-control selectpicker room_type" data-style="btn btn-primary" name="room_type">
                                                            <option value="right_key">Chave</option>
                                                            <option selected value="hope_door">Porta da esperança</option>
                                                            <option value="true_or_false">Verdadeiro ou Falso</option>
                                                            <option value="multiple_forms">Multiplas Formas</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="container" style="padding-top:2%">
                                        <!--                                        <br>-->
                                        <div class="textareaborda2" style="display:block;">
                                            <textarea id="pergunta" type="text" name="pergunta" rows="2" cols="50" class=" form-control <?php if ($errors->has('pergunta')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('pergunta'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?> col" placeholder="Faça sua pergunta" maxlength="500" required></textarea>
                                        </div>

                                        <!--
                                        <div class="form-group form-file-upload form-file-simple" style="display:none;" id="teste">

                                            input type="text" class="form-control inputFileVisible" placeholder="Simple chooser...">
                                            <input type="file" class="inputFileHidden"

                                            <label for="exampleFormControlFile1">Escolha um arquivo...</label>
                                            <input type="file" class="form-control-file" id="exampleFormControlFile1">
                                          </div>
-->
                                    </div>


                                    <!--   Ambinete  -->
                                    <label class="col-12" style=" margin-top: 10px;  font-size: 130%; color: black;">Definições do labirinto:</label>
                                    <div class=" container">
                                        <div class="row" style="line-height: 40px; margin-bottom: 10px;">
                                            <div class="col-12 col-sm-4">
                                                <input type="hidden" name="path_id" id="path_id">
                                                <div class="row" style="height:50px;">
                                                    <div class="col-5" style="height:100%;">
                                                        <label for="answer_boolean" style="margin-right: 3.5px; padding-top:10%;">Caminho do jogo:</label>
                                                    </div>
                                                    <div class="col-7">
                                                        <select name="answer_boolean" id="answer_boolean" class="form-control selectpicker " data-style="btn btn-primary" style="float:left;">
                                                            <option selected value="1">Corredor</option>
                                                            <option value="2">Labirinto</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-4">
                                                <input type="hidden" name="path_id" id="path_id">
                                                <div class="row" style="height:50px;">
                                                    <div class="col-5" style="height:100%;">
                                                        <label for="tamanho" style="margin-right: 3.5px; padding-top:10%;">Tamanho do Labirinto:</label>
                                                    </div>
                                                    <div class="col-7">
                                                        <select name="tamanho" id="tamanho" class="form-control selectpicker" data-style="btn btn-primary" style="float:left;">
                                                            <option selected value="1">Pequeno</option>
                                                            <option value="2">Medio</option>
                                                            <option value="3">Grande</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-4">
                                                <input type="hidden" name="path_id" id="path_id">
                                                <div class="row" style="height:50px;">
                                                    <div class="col-5" style="height:100%;">
                                                        <label for="largura" style="margin-right: 3.5px; padding-top:10%;">Largura do Labirinto:</label>
                                                    </div>
                                                    <div class="col-7">
                                                        <select name="largura" id="largura" class="form-control selectpicker" data-style="btn btn-primary" style="float:left;">
                                                            <option selected value="1">Pequeno</option>
                                                            <option value="2">Medio</option>
                                                            <option value="3">Grande</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class=" container" style=" margin-top: -20px;">
                                <div class="card houvercard">
                                    <!--   Resposta -->
                                    <div class=" container" style=" margin-top: 10px;">
                                        <div class="row  align-items-center">
                                            <div class="col-9">
                                                <label style=" margin-top: 10px;  font-size: 130%; color: black;">Resposta:&emsp;</label>
                                                <button type="button" name="add" id="add" class="btn btn-success btn-sm"><i class="material-icons">add</i></button>
                                            </div>

                                            <div class="col-12 col-sm-3">
                                                <input type="hidden" name="path_id" id="path_id">
                                                <div class="row" style="height:70px;">
                                                    <div class="col-5" style="height:100%;">
                                                        <label for="tipo_opcao" style="margin-right: 3.5px; padding-top:15%;">Tipo da Resposta:</label>
                                                    </div>
                                                    <div class="col-7">
                                                        <select name="tipo_resp" id="tipo_opcao" class="form-control selectpicker " data-style="btn btn-primary" style="float:left;">
                                                            <option selected value="1">Texto</option>
                                                            <option value="2">Imagem</option>
                                                            <option value="3">Vídeo</option>
                                                            <option value="4">Áudio</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="dynamic-added montarteste" id="dynamic_field" border="0">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Aba do reforco -->

                        <div class="tab-pane" id="pergReforco">
                            <div class="hovereffect">
                                <div class="overlay">
                                    <div class="form-check" style="margin-left:5%; margin-bottom:2%">
                                        <label class="form-check-label">

                                            <input class="form-check-input" type="checkbox" id="check-reforco">
                                            Pergunta Reforço
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                                <div class="abcd">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a class="btn btn-secondary btnModalClose" data-dismiss="modal">Fechar</a>
                    <button name="submit" id="submit" class="btn btn-success" value="submit">Salvar</button>
                </div>
            </form>

        </div>
    </div>
</div>


<div class="container">
    <div class="col-md-12">
        <div class="card">
            <div id="teste2" class="card-header card-header-primary">
                <?php if($sala->enable==1): ?>
                <h3 class="card-title" style="text-align:center"><?php echo e($sala->name); ?>

                </h3>
                <?php else: ?>
                <h3 class="card-title" style="text-align:center;"><i><?php echo e($sala->name); ?><span style="float:right;font-size:20px">Desativada</span></i>
                </h3>
                <?php endif; ?>
                <p class="card-category"></p>
            </div>
            <div class="card-body">
                <div>
                    <div class="row" style="margin-bottom: -35px;">
                        <?php
                        $x = gmdate("H:i:s", $sala->duracao);

                        ?>

                        <div class="col-12 col-md-auto">
                            <button type="button" align="right" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#alteraModal" style="width:100%;">Estatistica</button>
                        </div>

                        <?php if($sala->public==0): ?>
                        <div class="col-12 col-md-auto">
                            <a class="btn btn-success btn-sm" href="<?php echo e(url('admin/alunos/'.$sala->id)); ?>" style="width:100%;"><i class="material-icons">add
                                </i>&emsp;Aluno</a>
                        </div>
                        <?php endif; ?>

                        <div class="col-12 col-md-auto">
                            <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editarSalaModal2" data-whateverid="<?php echo e($sala->id); ?>" data-whatevernome="<?php echo e($sala->name); ?>" data-whatevertempo="<?php echo e($x); ?>" data-tempoo="<?php echo e($sala->duracao); ?>" data-whatevertema="<?php echo e($sala->tematica); ?>" data-whateverpublic="<?php echo e($sala->public); ?>" data-whateverenable="<?php echo e($sala->enable); ?>" style="float:right; width:100%;"><i class="material-icons">create</i>&emsp;Editar</button>
                        </div>

                    </div>

                    <hr style="border: 0.5px solid: grey;">

                    <table class="table">
                        <thead class=" text-primary">
                            <th>
                                Tempo de duração (em minutos)
                            </th>
                            <th>
                                Tema
                            </th>
                            <th>
                                Tipo
                            </th>
                            <th>
                                Ativa
                            </th>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <?php echo e($x); ?>

                                </td>
                                <td>
                                    <?php if($sala->tematica=="urban"): ?>
                                    Urbano
                                    <?php elseif($sala->tematica=="mansion"): ?>
                                    Casa/Mansão
                                    <?php elseif($sala->tematica=="icy_maze"): ?>
                                    Gelo
                                    <?php else: ?>
                                    Selva
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if($sala->public==0): ?>
                                    Privada
                                    <?php else: ?>
                                    Pública
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if($sala->enable==0): ?>
                                    Não
                                    <?php else: ?>
                                    Sim
                                    <?php endif; ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                </div>
                <br>
                <br>
                <div class="row" style="margin-bottom: -35px;">
                    <div class="col-12 col-md-auto">
                        <button type="button" align="right" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#alteraModal" style="width:100%;">Sequência</button>
                    </div>
                    <div class="col-12 col-md-auto">
                        <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#addPerg" style="width:100%;"><i class="material-icons">add
                            </i>&emsp;Pergunta</button>
                    </div>

                    <div class="col-12 col-md-auto">

                        <button type="button" class="col-12 btn btn-warning btn-sm  fa fa-qrcode qrcode" id="<?php echo e($sala->id); ?>" value="<?php echo e($sala->id); ?>" onclick="qrcodebtn(<?php echo e($sala->id); ?>);">&emsp;Qr Code</button>

                    </div>
                </div>

                <hr style="border: 0.5px solid: grey;">

                <?php $x = 1;
                $y = 0;
                $letras = array("a)", "b)", "c)", "d)"); ?>

                <table class="table">
                    <thead class=" text-primary">
                        <th>
                            Perguntas
                        </th>
                        <th>

                        </th>
                        <th>
                            <div style="float:right;"> Ações </div>
                            <div style="float:right; margin-right: 10%;"> Resposta </div>

                        </th>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
                <!------- Estrutura de repetição (CARD)------------------->

                <div id="pai">
                    <?php
                    $cont = 0;
                    $cont2 = 0;
                    ?>

                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


                    <?php $errado = 0; ?>
                    <?php $__currentLoopData = $path_perg; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($pp->perg_id==$item->id): ?>

                    <?php $__currentLoopData = $paths; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $path): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($path->id==$pp->path_id): ?>

                    <?php if($path->disp == 1): ?>
                    <!-- 
                                                 <button type="button" class="btn btn-outline-info fa fa-pencil tamanhobutton" data-toggle="modal" data-target="#addPerg" data-whatever="<?php echo e($item->id); ?>"title="Editar pergunta"></button>&emsp;&emsp;
                                                  <a href="<?php echo e(url('admin/deletar-pergunta/'.$item->id)); ?>" class="btn btn-outline-danger fa fa-trash tamanhobutton"></a>
                     -->

                    <div id="flip">
                        <div class="row align-items-center" style="cursor: pointer;">
                            <div class="col-sm-10 container" onclick="abrir('panel'+<?php echo e($item->id); ?>);" style="padding-left: 25px;">
                                <?php
                                $str2 = $item->pergunta;
                                $total1 = strlen($str2);
                                ?>
                                <?php if($total1 > 108): ?>
                                <div id="div2" data-toggle="tooltip" data-placement="top" title="<?php echo e($item->pergunta); ?>"><?php echo e($item->pergunta); ?></div>
                                <?php else: ?>
                                <div><?php echo e($item->pergunta); ?></div>
                                <?php endif; ?>
                            </div>

                            <div class="col-2 col-sm-1  textototal<?php echo e($cont); ?>" style="padding-left: 8px;">

                            </div>
                            <div class="col-2 col-sm-1">
                                <a class="nav-link" id="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="float: right;">
                                    <i id="teste" class="material-icons">more_vert</i>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="">
                                    <a class="dropdown-item" data-toggle="modal" data-target="#addPerg" data-whatever="<?php echo e($item->id); ?>">Editar</a>
                                    <a class="dropdown-item" onclick="(confirm('Você realmente deseja deletar a pergunta: \'<?php echo e($item->pergunta); ?>\'? ')) ? window.location.href =  '<?php echo e(url('admin/visualizar/deletar-pergunta/'.$item->id)); ?>' : window.location.reload(forcedReload);">Excluir</a>
                                </div>
                            </div>
                            <div class="container col-1 " onclick="abrir('panel'+<?php echo e($item->id); ?>);" style="margin-top: -10px;">
                                <a><img src="<?php echo e(asset('img/expand-button.png')); ?>" width="8px"></a>
                            </div>
                        </div>
                    </div>

                    <?php $cont++; ?>
                    <?php endif; ?>
                    <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                    <?php $y = 0; ?>

                    <div class="panel" id="panel<?php echo e($item->id); ?>">
                        <?php $__currentLoopData = $respostas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $resposta): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php $__currentLoopData = $perg_resp; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pergresp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($pergresp->perg_id==$item->id): ?>
                        <?php if($pergresp->resp_id==$resposta->id): ?>

                        <div class="row">
                            <h5><?php echo $letras[$y]; ?></h5>
                            <div class="col totalresposta" style=" margin-top: -5px;">
                                <p style="font-size: 120%; line-height: 30px;"><?php echo e($resposta->resposta); ?></p>
                            </div>
                        </div>
                        <?php $y++; ?>

                        <?php endif; ?>
                        <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>

                    <?php $y = 0; ?>

                    <?php $__currentLoopData = $perg_refs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $perg_ref): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($perg_ref->perg_id==$item->id): ?>
                    <?php $__currentLoopData = $refs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ref): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($ref->id==$perg_ref->ref_id): ?>

                    <?php $__currentLoopData = $path_perg; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($pp->perg_id==$ref->id): ?>
                    <!--                    <input value="<?php echo e($pp->perg_id); ?>"><br><br>-->
                    <?php $__currentLoopData = $paths; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $path): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($path->id==$pp->path_id): ?>
                    <!--                    <input value="<?php echo e($path->id); ?>"><br><br>-->

                    <div id="flip2">
                        <!-- <div id="texto" style="color: black">Reforço da pergunta <?php echo e($item->pergunta); ?></div> -->
                        <div class="row align-items-center" style="cursor: pointer;">

                            <i class="material-icons" data-toggle="tooltip" data-placement="left" title="Reforço da pergunta <?php echo e($item->pergunta); ?>" style="margin-left: 10px;">help</i>

                            <div class="col-sm-9 container" onclick="abrir('panel'+<?php echo e($ref->id); ?>);" style="margin-left: -3px;">
                                <?php
                                $str = $ref->pergunta;
                                $total = strlen($str);
                                ?>
                                <?php if($total > 108): ?>
                                <div id="div2" data-toggle="tooltip" data-placement="top" title="<?php echo e($ref->pergunta); ?>"><?php echo e($ref->pergunta); ?></div>
                                <?php else: ?>
                                <div><?php echo e($ref->pergunta); ?></div>
                                <?php endif; ?>
                            </div>

                            <div class="col-2 col-sm-1 textototalref<?php echo e($cont2); ?>">

                            </div>

                            <div class="col-2 col-sm-1">
                                <a class="nav-link " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="float: right;">
                                    <i id="teste" class="material-icons">more_vert</i>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="">

                                    <a class="dropdown-item" onclick="(confirm('Você realmente deseja deletar a pergunta reforço: \'<?php echo e($ref->pergunta); ?>\'? ')) ? window.location.href =  '<?php echo e(url('admin/visualizar/deletar-pergunta/'.$ref->id)); ?>' : window.location.reload(forcedReload)">Excluir</a>
                                </div>
                            </div>
                            <div class="container col-1 " style="margin-top: -10px;" onclick="abrir('panel'+<?php echo e($ref->id); ?>);">
                                <a><img src="<?php echo e(asset('img/expand-button.png')); ?>" width="8px"></a>
                            </div>
                        </div>
                    </div>
                    <?php $cont2++; ?>
                    <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <div class="panel2" id="panel<?php echo e($ref->id); ?>">
                        <?php $__currentLoopData = $respostas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $resposta): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php $__currentLoopData = $perg_resp; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pergresp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($pergresp->perg_id==$ref->id): ?>
                        <?php if($pergresp->resp_id==$resposta->id): ?>
                        <div class="row">
                            <h5><?php echo $letras[$y]; ?></h5>
                            <div class="col" style=" margin-top: -5px;">
                                <p style="font-size: 120%; line-height: 30px;"><?php echo e($resposta->resposta); ?></p>
                            </div>
                        </div>
                        <?php $y++; ?>
                        <?php endif; ?>
                        <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <hr style="border: 0.8px solid #afafaf;">

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <div class="container">
                    <?php echo e($data->links()); ?>

                </div>
            </div>
        </div>
    </div>
</div>





<div class="modal fade bd-example-modal-lg" id="editarSalaModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edição de Sala</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo e(url('admin/sala')); ?>" method="POST" style="margin-left: 5%;margin-right:1%;margin-top:3%">
                <?php echo csrf_field(); ?>
                <div class="modal-body">
                    <input type="hidden" name="id_prof" value="<?php echo e(Auth::user()->id); ?>">
                    <input type="hidden" name="sala_id" id="sala_id" value="0">
                    <input type="hidden" value="1" id="page" name="page">
                    <div class="form-group">
                        <label for="nome" display="inline">Nome da Sala:</label>
                        <input type="text" name="nome" id="nome" class="form-control has-feedback <?php echo e($errors->has('nome') ? 'has-error bg-primary' : ''); ?>">

                        <?php if($errors->has('nome')): ?>
                        <div class="help-block">
                            <?php echo e($errors->first('nome')); ?>

                        </div>
                        <?php endif; ?>

                    </div>
                    <div class="form-group" style="margin-top:3.5%">
                        <label for="time" display="inline">Tempo de Duração de cada sala (em minutos):</label>
                        <input type="time" name="time3" id="time3" step='1' class="form-control" min="00:00:00" max="01:00:00" onblur="transforma(this.value,1);">
                        <input type="hidden" name="time4" id="time4" class="form-control">

                    </div>

                    <div class="form-row">
                        <div class="form-group col">
                            <label for="theme">Tema:&emsp;</label>
                            <!--                                <select class="form-control selectpicker" data-style="btn btn-link" name="theme" id="theme">-->
                            <select id="theme" name="theme" class="form-control" data-style="btn btn-link">
                                <option value="icy_maze">Gelo</option>
                                <option value="urban">Urbano</option>
                                <option value="forest">Selva</option>
                                <option value="mansion">Casa/Mansão</option>
                            </select>

                        </div>
                        <div class="form-group col">
                            <div class="form-check" style="margin-left:10%;margin-top:17%">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" name="public1" id="public1">Sala Pública
                                    <span class="form-check-sign">
                                        <span class="check"></span>
                                    </span>
                                </label>
                            </div>
                        </div>
                        <div class="form-group col">
                            <div class="form-check" style="margin-top:17%">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" name="enable1" id="enable1">Ativo
                                    <span class="form-check-sign">
                                        <span class="check"></span>
                                    </span>
                                </label>
                            </div>
                        </div>

                    </div>


                </div>
                <div class="modal-footer">
                    <a class="btn btn-secondary btnModalClose" data-dismiss="modal">Fechar</a>
                    <button type="submit" class="btn btn-success">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="alteraModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel"></h4>
            </div>
            <form>
                <?php echo e(csrf_field()); ?>

                <input type="hidden" value="<?php echo e($id); ?>" name="sala_id" id="sala_id">
                <div class="modal-body">
                    <ul id="sortable" class="sortable" style="list-style-type: none;">
                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="ui-state-default" value="<?php echo e($item->id); ?>"><?php echo e($item->pergunta); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
                <div class="modal-footer">
                    <a class="btn btn-secondary btnModalClose" data-dismiss="modal">Fechar</a>
                    <button type="button" class="btn btn-success altera" id="altera" name="altera">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="modal fade" id="qrmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content ">
            <div class="modal-header" style="background-color:#4D226D;">
                <h5 class="modal-title"></h5>
                <h5 style="  font-size: 20px; color:#ffffff;">Qr Code </h5>
            </div>

            <div class="modal-body">
                <h5 id="nomeqrsala">Nome: </h5>
                <input id="hiddenid" type="hidden" value="">

                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner" id="corouselimg">
                    </div>

                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Anterior</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Próximo</span>
                    </a>
                </div>



            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>


<!----------------- Fim Modal ------------------->


<div class="modal fade" id="noinfomodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content ">
            <div class="modal-header" style="background-color:#4D226D;">
                <h5 class="modal-title"></h5>
                <h5 style="  font-size: 20px;color:#ffffff;" id="exampleModalScrollableTitle">Qr Code </h5>
            </div>
            <div class="modal-body">
                <h4 style="color: purple;"> Não existe QrCode para este labirinto, verifique se existem perguntas ou se as alterações do labirinto foram salvas.</h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Fechar </button>
            </div>
        </div>
    </div>
</div>

<div id="mensagem" class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div id="mensagemcontent" class="modal-content">
            ...
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('vendor.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/thiago/Desktop/lab/resources/views/edit_sala.blade.php ENDPATH**/ ?>