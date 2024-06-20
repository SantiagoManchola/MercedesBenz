<div class="contact-form">
    <h2>Dejanos tus datos para ser contactado con un asesor</h2>
    <form id="contact-form" action="submit_form.php" method="post">
        <div class="form-row">
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input class="personalInfo" type="text" id="nombre" name="nombre" placeholder="Ingresá tu nombre">
                <label class="error" for="nombre"></label>
            </div>
            <div class="form-group">
                <label for="apellido">Apellido</label>
                <input class="personalInfo" type="text" id="apellido" name="apellido" placeholder="Ingresá tu apellido">
                <label class="error" for="apellido"></label>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group">
                <label for="email">Email</label>
                <input class="email" type="email" id="email" name="email" placeholder="Ingresá tu e-mail">
                <label class="error" for="email"></label>
            </div>
            <div class="form-group">
                <label for="contacto">Número de contacto</label>
                <input class="phone" type="tel" id="contacto" name="contacto" placeholder="Ingresá tu número de contacto">
                <label class="error" for="contacto"></label>
            </div>
        </div>
        <div class="form-group preferencia">
            <label for="preferencia">Preferencia de Contacto</label>
            <select class="js-example-basic-single" id="preferencia" name="preferencia">
                <option value=""></option>
                <option value="telefono">Teléfono</option>
                <option value="email">Email</option>
            </select>
            <label class="error" for="preferencia"></label>
        </div>
        <div class="form-group checkbox">
            <input type="checkbox" id="politicas" name="politicas">
            <label for="politicas">Acepto las políticas de tratamiento de Datos personales</label>
            <label class="error" for="politicas"></label>
        </div>
        <div class="form-buttons">
            <button type="submit" class="btn enviar">Enviar <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/home/diagonalArrow.svg" alt=""></button>
        </div>
    </form>
</div>