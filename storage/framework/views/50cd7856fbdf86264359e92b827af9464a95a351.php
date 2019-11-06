<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-header card-header-tabs card-header-primary">
        <div>
            <h3 class="card-title" style="margin-top: 10px;">
                Controle de grupos
                <?php if(Auth::user()->hasAnyRole('professor')): ?>
                <a onclick="mostrarmaisalunos2(0)" data-toggle="modal" data-target="#addGrupoModal" class="btn btn-info" style="float:right; ">
                    Adicionar novo grupo
                </a>
                <!-- <a class="btn btn-success" onclick="teste()" >Salvar</a> -->
                <?php endif; ?>
            </h3>
        </div>
    </div>

    <div class="card-body">
        <div class="tab-content table-responsive">
            <table class="table table-hover">
                <thead class=" text-primary">
                    <th>Nome do grupo</th>
                    <th>Ações</th>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $turmas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $turma): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td id="<?php echo e('linha'.$turma->id); ?>" onclick="linhaTabela(<?php echo e($turma->id); ?>)" width='90%'><?php echo e($turma->turma); ?>

                        </td>
                        <td style="text-align: center">
                            <a class="nav-link" id="<?php echo e($turma->id); ?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i id="teste" class="material-icons">more_vert
                                </i>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="<?php echo e($turma->id); ?>">
                                <a data-toggle="modal" data-target="#confirmalert" data-id="<?php echo e($turma->id); ?>" data-prof="<?php echo e(Auth::user()->id); ?>" data-turma="'<?php echo e($turma->turma); ?>'" class="dropdown-item" id="<?php echo e('grupo'.$turma->turma); ?>">Excluir</a>
                                <a onclick="editTabela(<?php echo e($turma->id); ?>)" class="dropdown-item">Editar</a>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<div class="modal fade bd-example-modal-lg" id="addAlunoModalGrupos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Adicionar grupo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>




<!-- Modal ADD Grupo -->
<div class="modal fade bd-example-modal-lg" id="addGrupoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cadastro de Grupos</h5>
                <button style="color:black" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php echo csrf_field(); ?>

            <div class="modal-body" style="margin-left: 5%;margin-right:1%;margin-top:3%">
                <div class="form-group">
                    <label for="nome" display="inline">Nome do Grupo:</label>
                    <input required type="text" name="nome" id="nome" class="form-control has-feedback <?php echo e($errors->has('nome') ? 'has-error bg-primary' : ''); ?>" required>

                    <?php if($errors->has('nome')): ?>
                    <div class="help-block">
                        <?php echo e($errors->first('nome')); ?>

                    </div>
                    <?php endif; ?>
                </div>
                <div id="divtabela">
                </div>
                <div class="row justify-content-center">
                    <nav aria-label="...">
                        <ul class="pagination justify-content-center">
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="modal-footer">
                <a class="btn btn-secondary" id="teste" data-dismiss="modal">Fechar</a>
                <button onclick="salvarGrupo(<?php echo e(Auth::user()->id); ?>)" class="btn btn-success" style="float:right; ">Salvar</button>
            </div>

        </div>
    </div>
</div>
<!-- Modal ADD Grupo -->

<!-- Modal da confirmação -->
<div class="modal fade bd-example-modal-sm" id="confirmalert" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Você realmente deseja deletar este grupo?</h5>
                <button style="color:black" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row align-self-center">
                    <button type="button" id="fecharGrupo" data-dismiss="modal" class="btn btn-secundary col">Cancelar</button>
                    <a class="btn col btn-primary" id="confirmar">Confirmar</a>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- Modal da confirmação -->


<!-- Modal alunos do grupos -->
<div class="modal fade" tabindex="-1" id="alunosModal" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog larguramodal" style="z_index:999999;">
        <div class="modal-content">
            <div class="modal-header">
                
                    <div class="col">
                        <h5 class="modal-title nomegrupo" id="exampleModalLabel">COLOCAR NOME GRUPO</h5>
                    </div>
                    <div class="col-sm-8">
                        <a onclick="mostrarmaisalunos2(1)" class="btn btn-sm btn-primary" style="color: white; float:right;margin-top:-1px;">Adicionar aluno</a>
                    </div>
                    <div class="col-sm-1" style="float:right;" >
                        <button style="color:black;" type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                
            </div>
            <?php echo csrf_field(); ?>

            <div id="divdatabela"class="modal-body" style="margin-left: 5%;margin-right:1%;margin-top:3%">
                <div class="form-group">
                    <?php if($errors->has('nome')): ?>
                    <div class="help-block">
                        <?php echo e($errors->first('nome')); ?>

                    </div>
                    <?php endif; ?>
                </div>
                <table class="table table-hover">
                    <thead class=" text-primary">
                        <th>Nome do aluno</th>
                        <th>Ações</th>
                    </thead>
                    <tbody id="tabelaalunosgrupos">

                    </tbody>
                </table>
            </div>
            <div id="divtabela2">
            </div>
            <div class="row justify-content-center">
                <nav aria-label="...">
                    <ul class="pagination justify-content-center">
                    </ul>
                </nav>
            </div>
            <div class="modal-footer">
                <button onclick="salvarGrupo(<?php echo e(Auth::user()->id); ?>)" class="btn btn-success" style="float:right; ">Salvar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal alunos do grupos -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('vendor.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/thiago/Desktop/lab/resources/views/grupos.blade.php ENDPATH**/ ?>