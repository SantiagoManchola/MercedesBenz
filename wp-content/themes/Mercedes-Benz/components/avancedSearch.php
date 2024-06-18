<div class="advancedSearch">
    <button class="toggleButton"><img src="<?php echo get_template_directory_uri(); ?>/assets/icons/avancedSearch/filter.svg" alt="">Búsqueda avanzada</button>
    <div class="searchFilters">
        <label class="recent">
            Recientemente publicado
            <input type="checkbox" id="recentlyPublished">
            <div class="toggle-switch">
                <div class="switch"></div>
            </div>
        </label>
        <div class="filtersSection">
            <div class="filterSection">
                <button class="filterToggle" data-target="#lineaMenu">Línea <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/avancedSearch/arrow.svg" alt=""></button>
                <div class="filterMenu" id="lineaMenu">
                    <ul>
                        <li>AMG</li>
                        <li>CLA</li>
                        <li>Clase A</li>
                        <li>Clase GLC</li>
                    </ul>
                </div>
            </div>
            <div class="filterSection">
                <button class="filterToggle" data-target="#carroceriaMenu">Carrocería <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/avancedSearch/arrow.svg" alt=""></button>
                <div class="filterMenu" id="carroceriaMenu">
                    <ul>
                        <li>Coupe</li>
                        <li>Hatchback</li>
                        <li>Sedan</li>
                        <li>SUV</li>
                    </ul>
                </div>
            </div>
            <div class="filterSection">
                <button class="filterToggle" data-target="#kilometrajeMenu">Kilometraje <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/avancedSearch/arrow.svg" alt=""></button>
                <div class="filterMenu" id="kilometrajeMenu">
                    <ul>
                        <li>0 km(2.666)</li>
                        <li>0 a 30.000 km(9.939)</li>
                        <li>30.000 a 60.000 km(9.550)</li>
                        <li>60.000 a 100.000 km(11.277)</li>
                    </ul>
                </div>
            </div>
            <div class="filterSection">
                <button class="filterToggle" data-target="#modeloMenu">Modelo <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/avancedSearch/arrow.svg" alt=""></button>
                <div class="filterMenu" id="modeloMenu">
                    <ul>
                        <li>void</li>
                    </ul>
                </div>
            </div>
            <div class="filterSection expanded">
                <button class="filterToggle" data-target="#precioMenu">Precio</button>
                <div class="filterMenu" id="precioMenu">
                    <ul>
                        <li>Hasta $45.000.000</li>
                        <li>$45.000.000 a $85.000.000</li>
                        <li>Más de $85.000.000</li>
                    </ul>
                    <div class="rangeContainer">
                        <input type="text" placeholder="Desde">
                        -
                        <input type="text" placeholder="Hasta">
                    </div>
                </div>
            </div>
            <button class="applyFilterButton">Aplicar filtro</button>
        </div>

        <div class="activeFilters">
            <span class="title">Filtros de la búsqueda</span>
            <ul class="filtersContainer">
            </ul>
            <button class="clearFilters">Borrar filtros <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/avancedSearch/eraser.svg" alt=""></button>
        </div>
    </div>
</div>