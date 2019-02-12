<div class="container">
    <h3>Pessoas</h3>
    
    <a href="#add_person" class="btn red white-text modal-trigger">Adicionar</a>
    
    <table>
        <thead>
            <th>Nome</th>
            <th>Data de aniversário</th>
            <th colspan="2">Ações</th>
        </thead>
        <tbody>
            {pessoas}
                <tr>
                    <td>{nome_pessoa}</td>
                    <td>{data_aniversario_display}</td>
                    <td>
                        <a href="#modal-{id_pessoa}" class="blue-text modal-trigger">Editar</a>
                    </td>
                    <td>
                        <a href="<?= base_url("pessoas/delete/{id_pessoa}") ?>" class="red-text">Deletar</a>
                    </td>
                </tr>

                <div class="modal" id="modal-{id_pessoa}">
                    <form action="<?= base_url("pessoas/edit/{id_pessoa}") ?>" method="post">
                        <div class="modal-content">
                            <div class="row" style="margin-bottom: 0">
                                <div class="col">
                                    <h5>{nome_pessoa}</h5>
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col s12 m6">
                                    <input id="nome_pessoa_{id_pessoa}" name="nome_pessoa" type="text" class="validate" value="{nome_pessoa}" required>
                                    <label for="nome_pessoa_{id_pessoa}">Nome</label>
                                </div>
                                <div class="input-field col s12 m6">
                                    <input id="data_aniversario_{id_pessoa}" type="text" class="datepicker" name="data_aniversario" value="{data_aniversario_display}" required>
                                    <label for="data_aniversario_{id_pessoa}">Data de aniversário</label>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <a class="btn-flat modal-close">Cancelar</a>
                            <input type="submit" value="Editar" class="btn-flat">
                        </div>
                    </form>
                </div>
            {/pessoas}
        </tbody>
    </table>

</div>

<div class="modal" id="add_person">
    <form action="<?= base_url("pessoas/add") ?>" method="post">
        <div class="modal-content">
            <div class="row" style="margin-bottom: 0">
                <div class="col">
                    <h5>Adicionar pessoa</h5>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s12 m6">
                    <input id="nome_pessoa" name="nome_pessoa" type="text" class="validate" required>
                    <label for="nome_pessoa">Nome</label>
                </div>
                <div class="input-field col s12 m6">
                    <input id="data_aniversario" type="text" class="datepicker" name="data_aniversario" required>
                    <label for="data_aniversario">Data de aniversário</label>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <a class="btn-flat modal-close">Cancelar</a>
            <input type="submit" value="Adicionar" class="btn-flat">
            <!-- <a href="#" id="adicionar" class="btn-flat">Adicionar</a> -->
        </div>
    </form>
</div>

<script>
    // $('#adicionar').click((event) => {
    //     $.ajax({
    //         url: "<?= base_url('ajax/pessoas/add')?>",
    //         method: "POST",
    //         data: {
    //             'nome_pessoa': $('#nome_pessoa').val(),
    //             'data_aniversario': $('#data_aniversario').val()
    //         },
    //         context: document.body
    //     }).done((data) => {   
    //         data = JSON.parse(data);

    //         M.toast({html: data.data});            
    //     });
    // });
</script>