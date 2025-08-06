// Lunar 🚀

import Splide from '@splidejs/splide';

document.addEventListener('DOMContentLoaded', function () {
    const slider1 = document.getElementById('slider1');
    const slider2 = document.getElementById('slider2');

    if (slider1) new Splide('#slider1', {type: 'loop', perPage: 3}).mount();
    if (slider2) new Splide('#slider2', {type: 'loop', perPage: 1,}).mount();});



