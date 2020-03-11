
                <div class="col-lg-10">
                    <div class="ibox float-e-margins">
                        <div class="ibox-content">
                            <div class="table-responsive">
                                    <table id="clientes" class="table table-striped">
                                        <thead style="text-align: center;" >
                                            <tr>
                                                <th>Nome</th>
                                                <th>Valor</th>
                                                <th>Colaboradores</th>
                                                <th>Data do Diagnostico</th>
                                                <th>Proposta</th>
                                                <th>Previsao</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($contas as $data): ?>
                                            <tr>
                                                <td>
                                                    <a target="blank" href="https://solides.pipedrive.com/deal/<?php echo $data['id'] ?>"><?php echo $data['title'] ?></a>
                                                </td>
                                                <td>
                                                    <?php echo "R$", number_format($data['value'],2, ',' , '.') ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php echo $data['quant_colaboradores'] ?>
                                                </td>
                                                <td>
                                                    <?php echo date("d/m/Y", strtotime($data['data_diagnostico'])) ?>
                                                </td>
                                                <td>
                                                    <?php echo date("d/m/Y", strtotime($data['stage_8'])) ?>
                                                </td>
                                                <td>
                                                    <?php if (isset($data['previsao'])): ?>
                                                       <select class="form-control m-b" name="<?php echo $data['id'] ?>">
                                                        <option value="<?php echo $data['previsao'] ?>/<?php echo $data['value'] ?>"><?php echo $data['previsao'] ?></option>
                                                        <option value="S1/<?php echo $data['value'] ?>">S1</option>
                                                        <option value="S2/<?php echo $data['value'] ?>">S2</option>
                                                        <option value="S3/<?php echo $data['value'] ?>">S3</option>
                                                        <option value="S4/<?php echo $data['value'] ?>">S4</option>
                                                        <option>Sem retorno</option>
                                                    </select> 
                                                    <?php else: ?>
                                                    <select class="form-control m-b" name="<?php echo $data['id'] ?>">
                                                        <option>Selecione: </option>
                                                        <option value="S1/<?php echo $data['value'] ?>">S1</option>
                                                        <option value="S2/<?php echo $data['value'] ?>">S2</option>
                                                        <option value="S3/<?php echo $data['value'] ?>">S3</option>
                                                        <option value="S4/<?php echo $data['value'] ?>">S4</option>
                                                        <option>Sem retorno</option>
                                                    </select>
                                                    <?php endif ?>
                                                </td>
                                            </tr>
                                            <?php endforeach ?>
                                        </tbody>
                                    </table>
                                <button class="btn btn-primary" value="Entrar" id="salvar">Salvar</button>
                            </div>
                        </div>
                    </div>
                </div> 
                <script src="<?php echo asset() ?>js/plugins/datapicker/bootstrap-datepicker.js"></script>
                <script>
                    $(document).ready(function(){

                        $('#clientes').dataTable();
                        
                        $('#data_5 .input-daterange').datepicker({
                            keyboardNavigation: false,
                            forceParse: false,
                            autoclose: true
                        });
                    });
            </script>

                                        