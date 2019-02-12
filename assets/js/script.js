$(document).ready(function(){
    $('.modal').modal({
        dismissible: true,
        onOpenStart: () => {
            // console.log("Abriu o modal");
        }
    });

    $('.datepicker').datepicker({
        container: 'body',
        i18n: {
            cancel: 'Cancelar',
            done: 'Selecionar',
            months: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro']
        },
        format: 'dd/mm/yyyy'
    });
});