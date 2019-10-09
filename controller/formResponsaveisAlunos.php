
<div class="col-xs-2">
    <label for="inputParentesco">Grau de Parentesco</label>
    <div class="input-group">
        <span class="input-group-addon"><i class="fas fa-heart"></i></span>
        <select class="form-control select2" style="width: 100%;" name="inputParentesco">
            <option name="inputParentesco" value="Pai">Pai</option>
            <option name="inputParentesco" value="Masculino">Mãe</option>
            <option name="inputParentescoo" value="Masculino">Avós</option>
            <option name="inputParentesco" value="Masculino">Irmãos</option>
            <option name="inputParentesco" value="Masculino">Tio</option>
        </select>
    </div>    
</div>
<div class="col-xs-4">
    <label for="inputMae">Nome Completo</label>
    <input type="text" class="form-control" placeholder="Nome completo" name="inputMae">
</div>
<div class="col-xs-2">
    <label>CPF:</label>
    <div class="input-group">
        <div class="input-group-addon">
            <i class="fa fa-id-card-o"></i>
        </div>
        <input type="text" class="form-control" data-inputmask="'mask': ['999-999-999 [-99]', '999 999 999 -99']" data-mask>
    </div>
</div>
<div class="col-xs-2">
    <label for="exampleInputEmail1">Data de Nascimento</label>
    <div class="input-group">
        <div class="input-group-addon">
            <i class="fa fa-calendar"></i>
        </div>
        <input type="text" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
    </div>
</div>

<div class="col-xs-2">
    <label>Telefone</label>
    <div class="input-group">
        <div class="input-group-addon">
            <i class="fa fa-phone"></i>
        </div>
        <input type="text" class="form-control" data-inputmask='"mask": "(99) 99999-9999"' data-mask>
    </div>
</div>
</div>