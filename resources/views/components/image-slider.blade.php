<?php
$images = [
    'https://www.tashistudio.com/img/cms/Exclusive%20Arrivals_A%20(1).jpg',
    'https://www.tashistudio.com/img/cms/Exclusive%20Arrivals_A%20(4).jpg',
    'https://www.tashistudio.com/img/cms/Exclusive%20Arrivals_A%20_-min.jpg',
    'https://i.pinimg.com/736x/e1/9e/c8/e19ec8cd949cc98c53b02bfcfcb5927c.jpg',
    'https://www.tashistudio.com/img/cms/Exclusive%20Arrivals_A%20(2).jpg',
    'https://www.tashistudio.com/modules/freepatterns/views/img/Luxury%20Bloom%20Preview%20Images%20(5).jpg',
    'https://i.pinimg.com/736x/cc/da/31/ccda312b1afdb980bc15423465e43eca.jpg',
    'https://i.pinimg.com/736x/fe/c0/7f/fec07f2ba6ad86bacc436077900e2275.jpg',
    'https://i.pinimg.com/736x/39/08/9c/39089c454669b65fc67a1cd5e54a22e5.jpg',
    'https://mediajamshidi.com/cdn/shop/files/SpringWaltz-114-09.jpg?crop=center&height=940&v=1743323564&width=940',
];
?>

<div class="text-3xl text-center mb-4 justify-items-center font-nanum font-bold">
    Creator's Pick
</div>

<div class="splide max-w-(--breakpoint-xl) mx-auto" aria-label="Beautiful Images Slider">
    <div class="splide__track">
        <ul class="splide__list">
            @foreach ($images as $image)
                <li class="splide__slide">
                    <div class="aspect-w-1 aspect-h-1">
                        <img src="{{ $image }}" alt="Image" class="w-[400px] h-[400px] object-cover rounded-xl">
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</div>


