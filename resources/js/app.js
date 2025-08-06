// Lunar 🚀

import Splide from '@splidejs/splide';

document.addEventListener('DOMContentLoaded', function () {
    var splide = new Splide( '.splide', {
        type   : 'loop',
        drag   : 'free',
        snap   : true,
        perPage: 3,
    } );

    splide.mount();
});
