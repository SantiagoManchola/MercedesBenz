document.addEventListener("DOMContentLoaded", function() {
    const toggleButton = document.querySelector(".advancedSearch .toggleButton");
    const advancedSearch = document.querySelector(".advancedSearch");
    const filterToggles = document.querySelectorAll(".filterToggle");
    const toggleButtons = document.querySelectorAll('.filterToggle');
    const filters = new Set();
    const filtersContainer = document.querySelector('.filtersContainer');

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


});