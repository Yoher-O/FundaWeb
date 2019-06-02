<form id="productsForm">
    <div class="back">
        <a href="?c=products"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">arrow_back</i> Volver</a>
    </div>
    <input type="text" class="hidden" id="id" value="<?php echo $_SESSION['id']?>">
    <h2>
        Formulario para productos
    </h2>
    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
        <input class="mdl-textfield__input" type="text" id="code" required value="<?php echo $_SESSION['code']?>">
        <label class="mdl-textfield__label" for="code">Codigo de producto</label>
        <span class="mdl-textfield__error">Este campo es requerido</span>
    </div>

    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
        <input class="mdl-textfield__input" type="text" id="description" required value="<?php echo $_SESSION['description']?>">
        <label class="mdl-textfield__label" for="description">Descripcion del producto</label>
        <span class="mdl-textfield__error">Este campo es requerido</span>
    </div>

    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
        <input class="mdl-textfield__input" type="text" id="price" pattern="-?[0-9]*(\.[0-9]+)?" required value="<?php echo $_SESSION['price']?>">
        <label class="mdl-textfield__label" for="price">Precio del producto</label>
        <span class="mdl-textfield__error">Este campo es requerido</span>
    </div>

    <div class="mdl-textfield mdl-js-textfield getmdl-select">
        <input type="text" value="" class="mdl-textfield__input" id="brand" readonly required>
        <input type="hidden" value="<?php echo $_SESSION['brand']?>" name="brand" id="val-brand" required>
        <span class="mdl-textfield__error">Este campo es requerido</span>
        <i class="mdl-icon-toggle__label material-icons">keyboard_arrow_down</i>
        <label for="brand" class="mdl-textfield__label">Marcas</label>
            <ul for="brand" class="mdl-menu mdl-menu--bottom-left mdl-js-menu" id="select-marcas">
            </ul>
    </div>

    <div class="mdl-textfield mdl-js-textfield getmdl-select">
        <input type="text" value="" class="mdl-textfield__input" id="category" readonly required>
        <input type="hidden" value="<?php echo $_SESSION['category']?>" name="category" id="val-category" required>
        <span class="mdl-textfield__error">Este campo es requerido</span>
        <i class="mdl-icon-toggle__label material-icons">keyboard_arrow_down</i>
        <label for="category" class="mdl-textfield__label">Categoria</label>
            <ul for="category" class="mdl-menu mdl-menu--bottom-left mdl-js-menu" id="select-categorias">
            </ul>
    </div>

    <div class="buttons-row">
        <a href="?c=products" class="mdl-button mdl-js-button mdl-button--raised cancel" type="button">
            Cancelar
        </a>
        <button class="mdl-button mdl-js-button mdl-button--raised save" type="submit">
            Guardar
        </button>
        <button class="mdl-button mdl-js-button mdl-button--raised reset" type="reset">
            Limpiar
        </button>
    </div>
</form>