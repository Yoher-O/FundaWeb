$( document ).ready(function() {
    listar();
    eliminar();
    update();
    save();
});

function eliminar() {
    $("#products-tbody").on("click",".delete", function(){
        d = $(this).parents("tr").find("td");
        deleteproducts({name: d[1].textContent, id: d[0].textContent}, $(this).parents("tr"));
    }); 
}

function showToast(message) {       
        var snackbarContainer = document.querySelector('#demo-toast-example');
        var data = {message: `${message}`};
        snackbarContainer.MaterialSnackbar.showSnackbar(data);
}

function save() {
    $("#productsForm").submit(function(e) {
        e.preventDefault();
        showLoading();
        $.ajax({
                url: '?c=products&a=Save',
                type: 'POST',
                data: {
                    "id": $("#id").val(), 
                    "code": $("#code").val(), 
                    "description": $("#description").val(), 
                    "price": $("#price").val(), 
                    "brand": $("#val-brand").val(),
                    "category": $("#val-category").val(),
                },
                success: function(result) {
                    if (result) {
                        setTimeout(function () {
                            hideLoading();
                            if ($("#id").val() != '') {
                                showToast('Se actualizo exitosamente');
                            }
                            else {
                                showToast('Se guardo exitosamente');
                            }
                            window.location = '?c=products';
                        }, 3000);
                    }
                }
        });
    });
}

function update() {
    $("#products-tbody").on("click",".update", function(){
        d = $(this).parents("tr").find("td");
        window.location = `?c=products&a=add&id=${d[0].textContent}&code=${d[1].textContent}&description=${d[2].textContent}&brand=${d[3].textContent}&price=${d[5].textContent}&category=${d[6].textContent}`;
    });
}

function showLoading() {
    $('.loading-container').remove();
    $('<div id="orrsLoader" class="loading-container"><div><div class="mdl-spinner mdl-js-spinner is-active"></div></div></div>').appendTo("body");

    componentHandler.upgradeElements($('.mdl-spinner').get());
    setTimeout(function () {
        $('#orrsLoader').css({opacity: 1});
    }, 1);
}

function hideLoading() {
    $('#orrsLoader').css({opacity: 0});
    setTimeout(function () {
        $('#orrsLoader').remove();
    }, 400);
}

function deleteproducts(item, row) {
    showDialog({
        title: 'Eliminar Producto',
        text: `¿Seguro que desea eliminar a ${item.name}?`,
        negative: {
            id: 'cancel-button',
            title: 'Cancelar',
            onClick: function() {}
        },
        positive: {
            id: 'ok-button',
            title: 'Eliminar',
            onClick: function() {
                showLoading();
                $.ajax({
                    type: 'POST',
                    url:"?c=products&a=Eliminar",
                    data: {'id': item.id},
                    success: function(result) {
                        if (result) {
                            row.remove();
                        }
                        setTimeout(function () {
                            hideLoading();
                        }, 3000);
                    }
                })
            }
        },
        cancelable: true,
        contentStyle: {'max-width': '500px'},
        onLoaded: function() {},
        onHidden: function() {}
    });
}

function showDialog(options) {
    options = $.extend({
        id: 'orrsDiag',
        title: null,
        text: null,
        negative: false,
        positive: false,
        cancelable: false,
        contentStyle: null,
        onLoaded: false
    }, options);

    
    $('.dialog-container').remove();
    $(document).unbind("keyup.dialog");

    $('<div id="' + options.id + '" class="dialog-container"><div class="mdl-card mdl-shadow--16dp"></div></div>').appendTo("body");
    var dialog = $('#orrsDiag');
    var content = dialog.find('.mdl-card');
    if (options.contentStyle != null) content.css(options.contentStyle);
    if (options.title != null) {
        $('<div class="center-content"><h5>' + options.title + '</h5></div>').appendTo(content);
    }
    if (options.text != null) {
        $('<div class="center-content"><p>' + options.text + '</p></div>').appendTo(content);
    }
    if (options.negative || options.positive) {
        var buttonBar = $('<div class="mdl-card__actions dialog-button-bar button-row"></div>');
        if (options.negative) {
            options.negative = $.extend({
                id: 'negative',
                title: 'Cancel',
                onClick: function () {
                    return false;
                }
            }, options.negative);
            var negButton = $('<button class="mdl-button mdl-js-button mdl-js-ripple-effect" id="' + options.negative.id + '">' + options.negative.title + '</button>');
            negButton.click(function (e) {
                e.preventDefault();
                if (!options.negative.onClick(e))
                    hideDialog(dialog)
            });
            negButton.appendTo(buttonBar);
        }
        if (options.positive) {
            options.positive = $.extend({
                id: 'positive',
                title: 'OK',
                onClick: function () {
                    return false;
                }
            }, options.positive);
            var posButton = $('<button class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" id="' + options.positive.id + '">' + options.positive.title + '</button>');
            posButton.click(function (e) {
                e.preventDefault();
                if (!options.positive.onClick(e))
                    hideDialog(dialog)
            });
            posButton.appendTo(buttonBar);
        }
        buttonBar.appendTo(content);
    }
    componentHandler.upgradeDom();
    if (options.cancelable) {
        dialog.click(function () {
            hideDialog(dialog);
        });
        $(document).bind("keyup.dialog", function (e) {
            if (e.which == 27)
                hideDialog(dialog);
        });
        content.click(function (e) {
            e.stopPropagation();
        });
    }
    setTimeout(function () {
        dialog.css({opacity: 1});
        if (options.onLoaded)
            options.onLoaded();
    }, 1);
}

function hideDialog(dialog) {
    $(document).unbind("keyup.dialog");
    dialog.css({opacity: 0});
    setTimeout(function () {
        dialog.remove();
    }, 400);
}

function  listar() {
    showLoading();
    $.ajax({
        type: 'GET',
        url:"?c=products&a=Listar",
        success: function(result){
          if(result){
            var list = JSON.parse(result);
            $.each(list.data, function(i, item) {
                $("#products-tbody").append(
                    "<tr>" +
                      `<td class="mdl-data-table__cell--non-numeric hidden">${item.id}</td>` +
                      `<td class="mdl-data-table__cell--non-numeric">${item.codigo}</td>` +
                      `<td class="mdl-data-table__cell--non-numeric">${item.descripcion}</td>` +
                      `<td class="mdl-data-table__cell--non-numeric hidden">${item.marca}</td>` +
                      `<td class="mdl-data-table__cell--non-numeric">${item.nombre}</td>` +
                      `<td class="mdl-data-table__cell--non-numeric">${item.precio}</td>` +
                      `<td class="mdl-data-table__cell--non-numeric hidden">${item.categoria}</td>` +
                      `<td class="mdl-data-table__cell--non-numeric">${item.nombreC}</td>` +
                      `
                       <td>
                         <button id="${item.id}" class="mdl-button mdl-js-button mdl-button--icon">
                           <i class="material-icons">more_vert</i>
                         </button>
              
                         <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect" for="${item.id}">
                           <li class="mdl-menu__item menu-icons delete"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">delete</i>Eliminar</li>
                           <li class="mdl-menu__item menu-icons update"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">edit</i>Editar</li>
                         </ul>
                       </td>
                    ` +
                    "</tr>"
                );
            });
          }
          setTimeout(function () {
            hideLoading();
        }, 1000);
        }
    });
}
