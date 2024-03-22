import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

let pagination = document.querySelector('nav[aria-label="Pagination Navigation"]');

if (typeof(pagination) != 'undefined' && pagination != null){
    pagination.className = 'px-4 pt-2 mx-auto mt-2 border-t-4 border-gray-700 max-w-7xl sm:px-6 lg:px-8';
}
