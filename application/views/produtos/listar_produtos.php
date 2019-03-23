<div class="container">
    <h3>Produtos</h3>
    
    <a href="#add_prods" class="btn red white-text modal-trigger">Adicionar</a>
    
    <table>
        <thead>
            <th>Código</th>
            <th>Descrição</th>
            <th>Valor</th>
            <th colspan="2">Ações</th>
        </thead>
        <tbody>
            {produtos}
                <tr>
                    <td>{codigo}</td>
                    <td>{descricao}</td>
                    <td>{valor_display}</td>
                    <td>
                        <a href="<?= base_url("produtos/delete/{id_produto}") ?>" class="red-text">Deletar</a>
                    </td>
                </tr>
            {/produtos}
        </tbody>
    </table>

</div>

<div class="modal" id="add_prods">
    <form action="<?= base_url("produtos/add") ?>" method="post">
        <div class="modal-content">
            <div class="row" style="margin-bottom: 0">
                <div class="col">
                    <h5>Adicionar produto</h5>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s12 m2">
                    <input id="codigo" name="codigo" type="text" class="validate" required>
                    <label for="codigo">Código</label>
                </div>
                <div class="input-field col s12 m6">
                    <input id="descricao" type="text" name="descricao" required>
                    <label for="descricao">Descricao</label>
                </div>
                <div class="input-field col s12 m4">
                    <input id="valor" type="number" step="0.01" name="valor" required>
                    <label for="valor">Valor</label>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <a class="btn-flat modal-close">Cancelar</a>
            <input type="submit" value="Adicionar" class="btn-flat">
        </div>
    </form>
</div>