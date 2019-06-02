$( document ).ready(function() {
    loadToSelect();
    loadToCategories()
;});

function loadToSelect() {
    $.ajax({
        type: 'GET',
        url:"?c=brands&a=Listar",
        success: function(result){
          if(result){  
            var list = JSON.parse(result);
            $.each(list.data, function(i, item) {
                if ($('#val-brand').val() == item.id) {
                    $("#select-marcas").append(
                        `
                        <li class="mdl-menu__item" data-val="${item.id}" data-selected="true">${item.nombre}</li>
                        `
                    );    
                }
                else {
                    $("#select-marcas").append(
                        `
                        <li class="mdl-menu__item" data-val="${item.id}">${item.nombre}</li>
                        `
                    );
                }
            });
          }
        }
    });
}


function loadToCategories() {
    $.ajax({
        type: 'GET',
        url:"?c=categories&a=Listar",
        success: function(result){
          if(result){  
            var list = JSON.parse(result);
            $.each(list.data, function(i, item) {
                if ($('#val-category').val() == item.id) {
                    console.log($('#val-category').val())
                    $("#select-categorias").append(
                        `
                        <li class="mdl-menu__item" data-val="${item.id}" data-selected="true">${item.nombre}</li>
                        `
                    );    
                }
                else {
                    $("#select-categorias").append(
                        `
                        <li class="mdl-menu__item" data-val="${item.id}">${item.nombre}</li>
                        `
                    );
                }
            });
          }
        }
    });
}
