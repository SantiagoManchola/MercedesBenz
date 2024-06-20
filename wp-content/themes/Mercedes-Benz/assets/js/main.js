document.addEventListener("DOMContentLoaded", function() {
    const toggleButton = document.querySelector(".advancedSearch .toggleButton");
    const advancedSearch = document.querySelector(".advancedSearch");
    const filterToggles = document.querySelectorAll(".filterToggle");
    const toggleButtons = document.querySelectorAll('.filterToggle');
    const filters = new Set();
    const filtersContainer = document.querySelector('.filtersContainer');
    const advancedSearchContainer = document.getElementById("advancedSearchContainer");


    toggleButton.addEventListener("click", function() {
        advancedSearch.classList.toggle("expanded");
    });
    

    filterToggles.forEach(button => {
        button.addEventListener("click", function() {
            const target = document.querySelector(this.getAttribute("data-target"));
            target.parentElement.classList.toggle("expanded");
        });
    });

    toggleButtons.forEach(button => {
        button.addEventListener('click', function() {
            const targetSelector = this.getAttribute('data-target');
            const targetMenu = document.querySelector(targetSelector);
            
            // Toggle the 'expanded' class on the button and target menu
            this.classList.toggle('expanded');
            targetMenu.classList.toggle('expanded');
        });
    });

    function updateActiveFilters() {
        filtersContainer.innerHTML = '';
        filters.forEach(filter => {
            const filterItem = document.createElement('li');
            filterItem.className = 'removeFilter';
            const img = `<img src="/Mercedes-Benz/wp-content/themes/Mercedes-Benz/assets/icons/avancedSearch/x.svg" alt="x">`;
            filterItem.innerHTML = `${filter} ${img}`;
            filterItem.addEventListener('click', () => {
                filters.delete(filter);
                updateActiveFilters();
            });
            filtersContainer.appendChild(filterItem);
        });
    }

    function addFilter(filterValue) {
        filters.add(filterValue);
        updateActiveFilters();
    }

    function clearFilters() {
        filters.clear();
        updateActiveFilters();
    }

    document.querySelectorAll('.filterMenu ul li').forEach(item => {
        item.addEventListener('click', function () {
            const filterValue = this.textContent.trim();
            addFilter(filterValue);
        });
    });

    document.querySelector('.clearFilters').addEventListener('click', function () {
        clearFilters();
    });

    document.querySelector('.applyFilterButton').addEventListener('click', function () {
        console.log('Applying filters:', filters);
        // Aquí puedes realizar la búsqueda con los filtros seleccionados.
        // Puedes usar fetch o cualquier otra técnica para hacer la solicitud.
    });

    document.querySelector('.rangeContainer').addEventListener('change', function () {
        const fromInput = this.querySelector('input[placeholder="Desde"]');
        const toInput = this.querySelector('input[placeholder="Hasta"]');
        const fromValue = fromInput.value.trim();
        const toValue = toInput.value.trim();
    
        let rangeFilter = '';
    
        if (fromValue && toValue) {
            rangeFilter = `De ${fromValue} a ${toValue}`;
        } else if (fromValue) {
            rangeFilter = `Desde ${fromValue}`;
        } else if (toValue) {
            rangeFilter = `Hasta ${toValue}`;
        }
    
        // Eliminar filtro de rango de precio existente si lo hay
        filters.forEach(filter => {
            if (filter.includes('De ') || filter.includes('Desde ') || filter.includes('Hasta ')) {
                filters.delete(filter);
            }
        });
    
        if (rangeFilter) {
            addFilter(rangeFilter);
        }
    });

    const swiper = new Swiper('.swiper', {
        loop: true,
        
        scrollbar: {
          el: '.swiper-scrollbar',
        },
        autoplay:{
            delay:5000,
        }
      });

    function moveAdvancedSearch() {
        if (window.innerWidth > 900) {
            if (homeSection.firstChild !== advancedSearch) {
                homeSection.insertBefore(advancedSearch, homeSection.firstChild);
            }
        } else {
            const header = document.querySelector("header");
            if (header.nextSibling !== advancedSearch) {
                header.parentNode.insertBefore(advancedSearch, header.nextSibling);
            }
        }
    }
    moveAdvancedSearch();
    window.addEventListener("resize", moveAdvancedSearch);
});

jQuery(document).ready(function($) {
    $('.js-example-basic-single').select2({
        placeholder: "Selecciona",
        minimumResultsForSearch: Infinity,
        allowClear: false
    });
});

jQuery(document).ready(function($) {
    // Inicializa el SweetAlert2 para el checkbox de políticas
    $('#politicas').on('change', function() {
        if ($(this).is(':checked')) {
            Swal.fire({
                html: `
                    <div class="alert">

                        <b>Finalidades de la autorización para el uso y tratamiento de datos e información personal</b><br/>
                        <p>Con la autorización del tratamiento de mis datos personales se me podrá contactar mediante: SMS, WhatsApp, correo electrónico, dirección de residencia, llamada telefónica y/o cualquier otro medio de comunicación instantáneo o formal por motivos de: Envío de información relacionada con todo el concepto de experiencia de cualquiera de las marcas que hacen parte de Autolider Uruguay S.A., ya sea para fines de actualización de datos, invitación a eventos, envío de publicidad, fines estadísticos, envío de información de productos y servicios, ofertas, descuentos, información corporativa, auditorias, seguimientos, promociones, encuestas, llamadas de seguimiento, envío de productos a la dirección de residencia, así como envío de información de campañas técnicas de servicio, seguridad o “recall”, de productos financieros y de seguros para la adquisición de bienes y servicios de cualquiera de las marcas que hacen parte de Autolider Uruguay S.A.; de igual forma, esta autorización comprende el mandato expreso para que mi información haga parte de la Base de Datos de Autolider Uruguay S.A., así como también pueda ser transferida y/o transmitida a otras compañías externas del grupo con residencia en Uruguay o en otros países, incluyendo mas no limitándose a las marcas de los productos que importa, comercializa y distribuye Autolider Uruguay S.A.</p>
                        <b>Copyright</b><br/>
                        <p>Copyright 2018 Daimler AG. Todos los derechos reservados. El texto, imágenes, gráficos, ficheros de sonido, ficheros de animación, ficheros de vídeo y su diseño son sujeto de copyright y de protección de la propiedad intelectual. Todos estos objetos no podrán ser válida y legítimamente copiados o distribuidos para uso comercial, ni podrán ser modificados o insertados en otras páginas Web. Algunas páginas Web de Daimler AG pueden contener igualmente material cuyo copyright pertenezca a terceras personas.</p>

                        <b>Productos y precios</b><br/>
                        <p>Tras el cierre de redacción de las distintas páginas Web pueden haberse producido cambios en relación a los datos que contienen. El fabricante se reserva el derecho de efectuar modificaciones en el diseño, la forma, el color o el equipamiento durante el plazo que media entre el pedido y la entrega, siempre y cuando dichas modificaciones o divergencias sean razonablemente aceptables para el cliente y no exista detrimento de los intereses de Daimler AG. Las ilustraciones muestran, también, equipos opcionales, accesorios y otros elementos no pertenecientes al equipamiento de serie. Posibles diferencias entre la pintura original y el color reproducido se deben a la técnica de reproducción. Algunas páginas Web pueden contener modelos y servicios no disponibles en determinados países. Las informaciones referentes a prescripciones legales y fiscales y sus efectos son válidas únicamente en la República Federal de Alemania. Salvo que en las condiciones de compra y entrega se establezca lo contrario, tendrán validez los precios vigentes el día de la entrega. Todos los precios especificados son precios máximos recomendados al concesionario. Se recomienda que para obtener datos más actualizados se dirija a su Concesionario Oficial Mercedes-Benz.</p>
                        <b>Marcas comerciales</b><br/>
                        <p>Salvo indicación contraria, todas las marcas exhibidas en las páginas Web de Daimler AG están amparadas por los derechos de la marca Daimler, incluyendo todas las placas identificativas de modelo, logotipos y emblemas corporativos de la empresa.</p>

                        <b>Licencias</b><br/>
                        <p>Daimler AG se ha esforzado por crear una oferta de Internet innovadora e informativa. Esperamos que el resultado le guste tanto como a nosotros. No obstante, debe comprender que Daimler AG necesita proteger su propiedad intelectual, incluyendo sus patentes, marcas y copyrights, por lo que estas páginas de Internet en ningún caso le otorgarán licencia alguna sobre la propiedad intelectual relativa a Daimler AG.</p>

                        <b>Afirmaciones prospectivas. Declaraciones a futuro</b><br/>
                        <p>Las páginas de Internet, relaciones de inversores, memorias anuales, informes provisionales, perspectivas, presentaciones, transmisiones de eventos (sonoras o audiovisuales, en directo o en diferido) y demás documentos ofrecidos en este sitio Web contienen afirmaciones basadas en supuestos y pronósticos de la dirección de la empresa. El empleo de verbos tales como "anticipar", "suponer", "creer", "estimar", "esperar", "pretender", "poder", "planificar" o "proyectar", así como de términos similares, tiene por objeto identificar afirmaciones prospectivas, sujetas a riesgos e incertidumbres. Cabe citar como ejemplos de estos riesgos una coyuntura económica desfavorable en Europa o EE.UU., fluctuaciones de los tipos de cambio, variaciones de los tipos de interés o del precio de las materias primas, además del lanzamiento de productos rivales, mayores incentivos de venta, el éxito del nuevo modelo de negocio de smart, una reducción del precio de venta de vehículos usados. Los futuros resultados de la empresa pueden diferir considerablemente de los anunciados de forma explícita o implícita en las declaraciones prospectivas debido a estos u otros factores, algunos de los cuales aparecen recogidos en la actual memoria anual de Daimler AG bajo el título "Informe de riesgo" y en el informe anual del Formulario 20-F, entregado por Daimler AG a la Comisión de Valores e Intercambio Bursátil estadounidense, bajo el epígrafe "Risk Factors". Daimler AG no se compromete a ir actualizando dichas afirmaciones prospectivas, basadas exclusivamente en las circunstancias presentes en el día de su publicación.</p>

                        <b>Garantías de contenido</b><br/>
                        <p>Toda la información contenida en estas páginas se ofrece a título orientativo. Es lo más precisa y actual posible, pero sin ningún tipo de garantía, ya sea implícita o explícita. En especial no constituye un compromiso o garantía tácita acerca de la composición o comerciabilidad de productos, la idoneidad para determinados usos o el cumplimiento de leyes y la observancia de patentes. Nuestras páginas de Internet incluyen asimismo enlaces a sitios Web externos, cuyos contenidos y diseño son ajenos al control de Daimler AG. En ningún caso nos hacemos responsables de que éstos sean actuales o exactos, ni de que se ofrezcan íntegramente o presenten un determinado nivel de calidad. Nos distanciamos expresamente de todos los contenidos de las páginas enlazadas. Esta declaración comprende la totalidad de enlaces a sitios Web externos ofrecidos en nuestras páginas de Internet, así como sus contenidos.</p>
                    </div>
                `,
                    showCloseButton: true,
                    showConfirmButton: true,
                    focus: false,
                    customClass: {
                        container: 'modal_terms',
                        htmlContainer: 'container'
                    }
                }).then((result) => {
                    if (!result.isConfirmed) {
                        $('#politicas').prop('checked', false);
                    }
            });
        }
    });
});

document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('contact-form');
    const nombre = document.getElementById('nombre');
    const apellido = document.getElementById('apellido');
    const email = document.getElementById('email');
    const contacto = document.getElementById('contacto');
    const politicas = document.getElementById('politicas');
    const preferencia = document.getElementById('preferencia'); 

    function clearErrorOnInput(element) {
        element.addEventListener('input', function() {
            clearError(element);
        });
    }

    clearErrorOnInput(nombre);
    clearErrorOnInput(apellido);
    clearErrorOnInput(email);
    clearErrorOnInput(contacto);
    preferencia.addEventListener('change', function() {
        clearError(preferencia);
    });

    form.addEventListener('submit', function(event) {
        let valid = true;

        // Validación del nombre
        if (nombre.value.trim() === '') {
            setError(nombre, 'Por favor, ingresa tu nombre.');
            valid = false;
        } else {
            clearError(nombre);
        }

        // Validación del apellido
        if (apellido.value.trim() === '') {
            setError(apellido, 'Por favor, ingresa tu apellido.');
            valid = false;
        } else {
            clearError(apellido);
        }

        // Validación del email
        if (email.value.trim() === '') {
            setError(email, 'Por favor, ingresa tu email.');
            valid = false;
        } else if (!validateEmail(email.value)) {
            setError(email, 'Por favor, ingresa un email válido.');
            valid = false;
        } else {
            clearError(email);
        }

        // Validación del número de contacto
        if (contacto.value.trim() === '') {
            setError(contacto, 'Por favor, ingresa tu número de contacto.');
            valid = false;
        } else if (!/^\d{10}$/.test(contacto.value)) {
            setError(contacto, 'El número de contacto debe tener exactamente 10 dígitos.');
            valid = false;
        } else {
            clearError(contacto);
        }

        if (preferencia.value === '') {
            setError(preferencia, 'Por favor, selecciona tu preferencia de contacto.');
            valid = false;
        } else {
            clearError(preferencia);
        }

        // Validación del checkbox de políticas
        if (!politicas.checked) {
            event.preventDefault();
            Swal.fire({
                customClass: {
                    container: 'modal_terms',
                },
                title: '<strong>Oops...</strong>',
                icon: 'error',
                html: 'Lo sentimos, no podemos enviar el formulario sin aceptar terminos',
                focusConfirm: false,
                confirmButtonText: 'Ok, entiendo!',
            });
            valid = false;
        }

        if (!valid) {
            event.preventDefault();
        }
    });

    function setError(element, message) {
        const errorLabel = element.nextElementSibling;
        errorLabel.textContent = message;
        errorLabel.style.display = 'block';
    }

    function clearError(element) {
        const errorLabel = element.nextElementSibling;
        errorLabel.textContent = '';
        errorLabel.style.display = 'none';
    }

    function validateEmail(email) {
        const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return re.test(email);
    }

    contacto.addEventListener('input', function() {
        this.value = this.value.replace(/\D/g, '').slice(0, 10);
        preferencia.addEventListener('change', function() {
            clearError(preferencia);
        });
    });
});