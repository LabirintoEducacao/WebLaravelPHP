<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-tabs card-header-primary">
                    <div class="nav-tabs-navigation">
                        <div class="nav-tabs-wrapper">
                            <h4 class="nav-tabs-title">
                                Controle de Salas
                                <button type="button" class="btn btn-info btn-just-icon" data-toggle="modal" data-target="#addSalaModal">
                                    <i class="material-icons">add</i>
                                </button>
                            </h4>
                            <ul class="nav nav-tabs" data-tabs="tabs" style="float:right;">
                                <li class="nav-item">
                                    <a class="nav-link active" href="#todos" data-toggle="tab">
                                        <!--                            <i class="material-icons">bug_report</i>-->
                                        Todas
                                        <div class="ripple-container"></div>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#ativas" data-toggle="tab">
                                        <!--                            <i class="material-icons">code</i>-->
                                        Ativadas
                                        <div class="ripple-container"></div>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#desativadas" data-toggle="tab">
                                        <!--                            <i class="material-icons">cloud</i>-->
                                        Desativadas
                                        <div class="ripple-container"></div>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#publicas" data-toggle="tab">
                                        <!--                            <i class="material-icons">code</i>-->
                                        Públicas
                                        <div class="ripple-container"></div>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#privadas" data-toggle="tab">
                                        <!--                            <i class="material-icons">code</i>-->
                                        Privadas
                                        <div class="ripple-container"></div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>



                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane active table-responsive" id="todos">
                            <table class="table table-hover">
                                <thead class=" text-primary">
                                    <th>
                                        Nome
                                    </th>
                                    <th>
                                        Tema
                                    </th>
                                    <th>
                                        Tempo
                                    </th>
                                    <th>
                                        Tipo
                                    </th>
                                    <th>
                                        Ativa
                                    </th>
                                    <th>
                                        Ações
                                    </th>
                                </thead>
                                <tbody>


                                    <?php $__currentLoopData = $salas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sala): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($sala->enable == 0): ?>
                                    <tr id="sala"style="cursor: pointer; background-color:rgba(229, 229, 229, 0.4);">
                                    <?php else: ?>
                                    <tr id="sala"style="cursor: pointer;">
                                    <?php endif; ?>
                                        <td onclick="window.location.href = '<?php echo e(url('admin/visualizar/'.$sala->id)); ?>'; "><?php echo e($sala->name); ?></td>
                                        <td onclick="window.location.href = '<?php echo e(url('admin/visualizar/'.$sala->id)); ?>'; ">
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
                                        <?php
                                            $x = gmdate("H:i:s", $sala->duracao);
                                            
                                        ?>
                                        <td onclick="window.location.href = '<?php echo e(url('admin/visualizar/'.$sala->id)); ?>'; "><?php echo e($x); ?></td>
                                        <td onclick="window.location.href = '<?php echo e(url('admin/visualizar/'.$sala->id)); ?>'; ">
                                            <?php if($sala->public==0): ?>
                                            Privada
                                            <?php else: ?>
                                            Pública
                                            <?php endif; ?>
                                        </td>
                                        <td onclick="window.location.href = '<?php echo e(url('admin/visualizar/'.$sala->id)); ?>'; ">
                                            <?php if($sala->enable==1): ?>
                                            Sim
                                            <?php else: ?>
                                            Não
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <a class="nav-link" id="sala<?php echo e($sala->id); ?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                                                <i id="teste" class="material-icons">more_vert</i>
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="sala<?php echo e($sala->id); ?>">
                                                <a class="dropdown-item" href="<?php echo e(url('admin/visualizar/'.$sala->id)); ?> ">Visualizar</a>

                                                <a class="dropdown-item" data-toggle="modal" data-target="#editarSalaModal1" data-whateverid="<?php echo e($sala->id); ?>" data-whatevernome="<?php echo e($sala->name); ?>" data-whatevertempo="<?php echo e($x); ?>" data-whatevertema="<?php echo e($sala->tematica); ?>" data-whateverpublic="<?php echo e($sala->public); ?>" data-tempoo="<?php echo e($sala->duracao); ?>" data-whateverenable="<?php echo e($sala->enable); ?>">Editar</a>

                                                <?php if($sala->enable==1): ?>
                                                <a class="dropdown-item" href="<?php echo e(url('admin/desativar/'.$sala->id)); ?>">Desativar</a>
                                                <?php else: ?>
                                                <a class="dropdown-item" href="<?php echo e(url('admin/ativar/'.$sala->id)); ?>">Ativar</a>
                                                <?php endif; ?>
                                                <?php if($sala->public==0): ?>
                                                <a class="dropdown-item" href="<?php echo e(url('admin/alunos/'.$sala->id)); ?>">Adicionar Alunos</a>
                                                <?php endif; ?>
                                             </div>
                                        </td>
                                        
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane table-responsive" id="publicas">
                            <table class="table">
                                <thead class=" text-primary">
                                    <th>
                                        Nome
                                    </th>
                                    <th>
                                        Tema
                                    </th>
                                    <th>
                                        Tempo
                                    </th>
                                    <th>
                                        Tipo
                                    </th>
                                    <th>
                                        Ativa
                                    </th>
                                    <th>
                                        Ações
                                    </th>
                                </thead>
                                <tbody>

                                    <?php $__currentLoopData = $salas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sala): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($sala->public==1): ?>
                                    <?php
                                            $x = gmdate("H:i:s", $sala->duracao);
                                            
                                        ?>
                                    <?php if($sala->enable == 0): ?>
                                    <tr id="sala"style="cursor: pointer; background-color:rgba(229, 229, 229, 0.4);">
                                    <?php else: ?>
                                    <tr id="sala"style="cursor: pointer;">
                                    <?php endif; ?>
                                        <td onclick="window.location.href = '<?php echo e(url('admin/visualizar/'.$sala->id)); ?>'; "><?php echo e($sala->name); ?></td>
                                        <td onclick="window.location.href = '<?php echo e(url('admin/visualizar/'.$sala->id)); ?>'; ">
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
                                        <td onclick="window.location.href = '<?php echo e(url('admin/visualizar/'.$sala->id)); ?>'; "><?php echo e($x); ?></td>
                                        <td onclick="window.location.href = '<?php echo e(url('admin/visualizar/'.$sala->id)); ?>'; ">
                                            <?php if($sala->public==0): ?>
                                            Privada
                                            <?php else: ?>
                                            Pública
                                            <?php endif; ?>
                                        </td>
                                        <td onclick="window.location.href = '<?php echo e(url('admin/visualizar/'.$sala->id)); ?>'; ">
                                            <?php if($sala->enable==1): ?>
                                            Sim
                                            <?php else: ?>
                                            Não
                                            <?php endif; ?>
                                        </td>
                                        <td>

                                            <a class="nav-link" id="sala<?php echo e($sala->id); ?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                                                <i class="material-icons" >more_vert</i>

                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="sala<?php echo e($sala->id); ?>" >
                                                <a class="dropdown-item" href="<?php echo e(url('admin/visualizar/'.$sala->id)); ?>">Visualizar</a>
                                                <button class="dropdown-item" data-toggle="modal" data-target="#editarSalaModal1" data-whateverid="<?php echo e($sala->id); ?>" data-whatevernome="<?php echo e($sala->name); ?>" data-tempoo="<?php echo e($sala->duracao); ?>" data-whatevertempo="<?php echo e($sala->duracao); ?>" data-whatevertema="<?php echo e($sala->tematica); ?>" data-whateverpublic="<?php echo e($sala->public); ?>" data-whateverenable="<?php echo e($sala->enable); ?>" style="width:93%;cursor: pointer;" style="cursor: pointer;">Editar</button>
                                                <?php if($sala->enable==1): ?>
                                                <a class="dropdown-item" href="<?php echo e(url('admin/desativar/'.$sala->id)); ?>">Desativar</a>
                                                <?php else: ?>
                                                <a class="dropdown-item" href="<?php echo e(url('admin/ativar/'.$sala->id)); ?>">Ativar</a>
                                                <?php endif; ?>
<!--                                                <a class="dropdown-item" href="<?php echo e(url('admin/alunos/'.$sala->id)); ?>">Adicionar Alunos</a>-->
                                            </div>
                                        </td>
                                    </tr>
                                    <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane table-responsive" id="privadas">
                            <table class="table">
                                <thead class=" text-primary">
                                    <th>
                                        Nome
                                    </th>
                                    <th>
                                        Tema
                                    </th>
                                    <th>
                                        Tempo
                                    </th>
                                    <th>
                                        Tipo
                                    </th>
                                    <th>
                                        Ativa
                                    </th>
                                    <th>
                                        Ações
                                    </th>
                                </thead>
                                <tbody>

                                    <?php $__currentLoopData = $salas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sala): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($sala->public==0): ?>
                                    <?php
                                            $x = gmdate("H:i:s", $sala->duracao);
                                            
                                        ?>
                                    <?php if($sala->enable == 0): ?>
                                    <tr id="sala"style="cursor: pointer; background-color:rgba(229, 229, 229, 0.4);">
                                    <?php else: ?>
                                    <tr id="sala"style="cursor: pointer;">
                                    <?php endif; ?>
                                        <td onclick="window.location.href = '<?php echo e(url('admin/visualizar/'.$sala->id)); ?>'; "><?php echo e($sala->name); ?></td>
                                        <td onclick="window.location.href = '<?php echo e(url('admin/visualizar/'.$sala->id)); ?>'; ">
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
                                        <td onclick="window.location.href = '<?php echo e(url('admin/visualizar/'.$sala->id)); ?>'; "><?php echo e($x); ?></td>
                                        <td onclick="window.location.href = '<?php echo e(url('admin/visualizar/'.$sala->id)); ?>'; ">
                                            <?php if($sala->public==0): ?>
                                            Privada
                                            <?php else: ?>
                                            Pública
                                            <?php endif; ?>
                                        </td>
                                        <td onclick="window.location.href = '<?php echo e(url('admin/visualizar/'.$sala->id)); ?>'; ">
                                            <?php if($sala->enable==1): ?>
                                            Sim
                                            <?php else: ?>
                                            Não
                                            <?php endif; ?>
                                        </td>
                                        <td>

                                            <a class="nav-link" id="sala<?php echo e($sala->id); ?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                                                <i class="material-icons" >more_vert</i>

                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="sala<?php echo e($sala->id); ?>" >
                                                <a class="dropdown-item" href="<?php echo e(url('admin/visualizar/'.$sala->id)); ?>" >Visualizar</a>
                                               <button class="dropdown-item" data-toggle="modal" data-target="#editarSalaModal1" data-whateverid="<?php echo e($sala->id); ?>" data-whatevernome="<?php echo e($sala->name); ?>" data-tempoo="<?php echo e($sala->duracao); ?>" data-whatevertempo="<?php echo e($sala->duracao); ?>" data-whatevertema="<?php echo e($sala->tematica); ?>" data-whateverpublic="<?php echo e($sala->public); ?>" data-whateverenable="<?php echo e($sala->enable); ?>" style="width:93%; cursor: pointer;">Editar</button>
                                                <?php if($sala->enable==1): ?>
                                                <a class="dropdown-item" href="<?php echo e(url('admin/desativar/'.$sala->id)); ?>">Desativar</a>
                                                <?php else: ?>
                                                <a class="dropdown-item" href="<?php echo e(url('admin/ativar/'.$sala->id)); ?>">Ativar</a>
                                                <?php endif; ?>
                                                <a class="dropdown-item" href="<?php echo e(url('admin/alunos/'.$sala->id)); ?>">Adicionar Alunos</a>
                                            
                                            </div>
                                        </td>
                                    </tr>
                                    <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane table-responsive" id="ativas">
                            <table class="table">
                                <thead class=" text-primary">
                                    <th>
                                        Nome
                                    </th>
                                    <th>
                                        Tema
                                    </th>
                                    <th>
                                        Tempo
                                    </th>
                                    <th>
                                        Tipo
                                    </th>
                                    <th>
                                        Ativa
                                    </th>
                                    <th>
                                        Ações
                                    </th>
                                </thead>
                                <tbody>

                                    <?php $__currentLoopData = $salas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sala): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($sala->enable==1): ?>
                                    <?php
                                            $x = gmdate("H:i:s", $sala->duracao);
                                            
                                        ?>
                                    <tr style="cursor: pointer;">
                                        <td onclick="window.location.href = '<?php echo e(url('admin/visualizar/'.$sala->id)); ?>'; "><?php echo e($sala->name); ?></td>
                                        <td onclick="window.location.href = '<?php echo e(url('admin/visualizar/'.$sala->id)); ?>'; ">
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
                                        <td onclick="window.location.href = '<?php echo e(url('admin/visualizar/'.$sala->id)); ?>'; "><?php echo e($x); ?></td>
                                        <td onclick="window.location.href = '<?php echo e(url('admin/visualizar/'.$sala->id)); ?>'; ">
                                            <?php if($sala->public==0): ?>
                                            Privada
                                            <?php else: ?>
                                            Pública
                                            <?php endif; ?>
                                        </td>
                                        <td onclick="window.location.href = '<?php echo e(url('admin/visualizar/'.$sala->id)); ?>'; ">
                                            <?php if($sala->enable==1): ?>
                                            Sim
                                            <?php else: ?>
                                            Não
                                            <?php endif; ?>
                                        </td>
                                        <td>

                                            <a class="nav-link" id="sala<?php echo e($sala->id); ?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                                                <i class="material-icons">more_vert</i>

                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="sala<?php echo e($sala->id); ?>">
                                                <a class="dropdown-item" href="<?php echo e(url('admin/visualizar/'.$sala->id)); ?>">Visualizar</a>
                                                <button class="dropdown-item" data-toggle="modal" data-target="#editarSalaModal1" data-whateverid="<?php echo e($sala->id); ?>" data-whatevernome="<?php echo e($sala->name); ?>" data-tempoo="<?php echo e($sala->duracao); ?>" data-whatevertempo="<?php echo e($sala->duracao); ?>" data-whatevertema="<?php echo e($sala->tematica); ?>" data-whateverpublic="<?php echo e($sala->public); ?>" data-whateverenable="<?php echo e($sala->enable); ?>" style="width:93%; cursor: pointer;" >Editar</button>
                                    
                                                <a class="dropdown-item" href="<?php echo e(url('admin/desativar/'.$sala->id)); ?>">Desativar</a>
                                               
                                       
                                                <?php if($sala->public==0): ?>
                                                <a class="dropdown-item" href="<?php echo e(url('admin/alunos/'.$sala->id)); ?>">Adicionar Alunos</a>
                                                <?php endif; ?>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane table-responsive" id="desativadas">
                            <table class="table">
                                <thead class=" text-primary">
                                    <th>
                                        Nome
                                    </th>
                                    <th>
                                        Tema
                                    </th>
                                    <th>
                                        Tempo
                                    </th>
                                    <th>
                                        Tipo
                                    </th>
                                    <th>
                                        Ativa
                                    </th>
                                    <th>
                                        Ações
                                    </th>
                                </thead>
                                <tbody>

                                    <?php $__currentLoopData = $salas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sala): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($sala->enable==0): ?>
                                    <?php
                                            $x = gmdate("H:i:s", $sala->duracao);
                                            
                                        ?>

                                    <tr id="sala"style="cursor: pointer; background-color:rgba(229, 229, 229, 0.4);">
                                        <td onclick="window.location.href = '<?php echo e(url('admin/visualizar/'.$sala->id)); ?>'; "><?php echo e($sala->name); ?></td>
                                        <td onclick="window.location.href = '<?php echo e(url('admin/visualizar/'.$sala->id)); ?>'; ">
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
                                        <td onclick="window.location.href = '<?php echo e(url('admin/visualizar/'.$sala->id)); ?>'; "><?php echo e($x); ?></td>
                                        <td onclick="window.location.href = '<?php echo e(url('admin/visualizar/'.$sala->id)); ?>'; ">
                                            <?php if($sala->public==0): ?>
                                            Privada
                                            <?php else: ?>
                                            Pública
                                            <?php endif; ?>
                                        </td>
                                        <td onclick="window.location.href = '<?php echo e(url('admin/visualizar/'.$sala->id)); ?>'; ">
                                            <?php if($sala->enable==1): ?>
                                            Sim
                                            <?php else: ?>
                                            Não
                                            <?php endif; ?>
                                        </td>
                                        <td>

                                            <a class="nav-link" id="sala<?php echo e($sala->id); ?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                                                <i class="material-icons">more_vert</i>

                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="sala<?php echo e($sala->id); ?>">
                                                <a class="dropdown-item" href="<?php echo e(url('admin/visualizar/'.$sala->id)); ?>">Visualizar</a>
                                                <button class="dropdown-item" data-toggle="modal" data-target="#editarSalaModal1" data-whateverid="<?php echo e($sala->id); ?>" data-whatevernome="<?php echo e($sala->name); ?>" data-tempoo="<?php echo e($sala->duracao); ?>" data-whatevertempo="<?php echo e($sala->duracao); ?>" data-tempoo="<?php echo e($sala->duracao); ?>" data-whatevertema="<?php echo e($sala->tematica); ?>" data-whateverpublic="<?php echo e($sala->public); ?>" data-whateverenable="<?php echo e($sala->enable); ?>" style="width:93%; cursor: pointer" >Editar</button>
                                                
                                                <a class="dropdown-item" href="<?php echo e(url('admin/ativar/'.$sala->id)); ?>">Ativar</a>
                                          
                                                <?php if($sala->public==0): ?>
                                                <a class="dropdown-item" href="<?php echo e(url('admin/alunos/'.$sala->id)); ?>">Adicionar Alunos</a>
                                                <?php endif; ?>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--    MODAL ADICIONAR SALA-->

    <div class="modal fade bd-example-modal-lg" id="addSalaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cadastro de Sala</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?php echo e(url('admin/sala')); ?>" method="POST" style="margin-left: 5%;margin-right:1%;margin-top:3%">
                    <?php echo csrf_field(); ?>
                    <div class="modal-body">
                        <input type="hidden" name="id_prof" value="<?php echo e(Auth::user()->id); ?>">
                        <input type="hidden" name="sala_id" id="sala_id" value="0">
                        <div class="form-group">
                            <label for="nome" display="inline">Nome da Sala:</label>
                            <input type="text" name="nome" id="nome" class="form-control has-feedback <?php echo e($errors->has('nome') ? 'has-error bg-primary' : ''); ?>" required>

                            <?php if($errors->has('nome')): ?>
                            <div class="help-block">
                                <?php echo e($errors->first('nome')); ?>

                            </div>
                            <?php endif; ?>

                        </div>
                        <div class="form-group" style="margin-top:3.5%">
                            <label for="time" display="inline">Tempo de Duração de cada sala (em minutos):</label>
                            <input type="time" name="time2" id="time2" step='1' class="form-control" min="00:00:00" max="01:00:00" onblur="transforma(this.value,0);" value="00:00:00">
                            <input type="hidden" name="time5" id="time5" class="form-control" value="0">
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
                                    <input class="form-check-input" type="checkbox" value="0" name="public" id="public">Sala Pública
                                    <span class="form-check-sign">
                                        <span class="check"></span>
                                    </span>
                                </label>
                            </div>
                            </div>
                            <div class="form-group col">
                            <div class="form-check" style="margin-top:17%">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" value="0" name="enable" id="enable" checked>Ativo
                                    <span class="form-check-sign">
                                        <span class="check"></span>
                                    </span>
                                </label>
                            </div>
                            </div>

                        </div>


                    </div>
                    <div class="modal-footer">
                        <a class="btn btn-secondary" data-dismiss="modal">Fechar</a>
                        <button type="submit" class="btn btn-success">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    

</div>



<div class="modal fade bd-example-modal-lg" id="editarSalaModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <input type="hidden" value="0" id="page" name="page">
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
                                    <input class="form-check-input" type="checkbox" value="0" name="public1" id="public1">Sala Pública
                                    <span class="form-check-sign">
                                        <span class="check"></span>
                                    </span>
                                </label>
                            </div>
                            </div>
                            <div class="form-group col">
                            <div class="form-check" style="margin-top:17%">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" value="0" name="enable1" id="enable1">Ativo
                                    <span class="form-check-sign">
                                        <span class="check"></span>
                                    </span>
                                </label>
                            </div>
                            </div>

                        </div>


                    </div>
                    <div class="modal-footer">
                        <a class="btn btn-secondary" data-dismiss="modal">Fechar</a>
                        <button type="submit" class="btn btn-success">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


<?php $__env->startSection('js'); ?>
    <script>
        $(document).ready(function(){
            $('.teste').on('cilck', function (event) {
               var button = $(event.relatedTarget); // Button that triggered the modal
                console.log(button);

           });
        }
                          
        
                          


    </script>
<?php $__env->stopSection(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('vendor.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/thiago/Desktop/lab/resources/views/sala.blade.php ENDPATH**/ ?>