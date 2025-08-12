import Swiper from 'swiper';
import 'swiper/css';

window.Swiper = Swiper;

document.addEventListener('DOMContentLoaded', () => {
    if (document.getElementById('slider1')) {
        new Swiper('#slider1', {
            slidesPerView: 2,
            spaceBetween: 16,
            loop: true,
            breakpoints: {
                1024: { slidesPerView: 3 },
                768: { slidesPerView: 2 },
                480: { slidesPerView: 1 },
            },
        });
    }

    if (document.getElementById('recentlyViewedSlider')) {
        new Swiper('#recentlyViewedSlider', {
            slidesPerView: 2,
            spaceBetween: 16,
            loop: false,
            breakpoints: {
                1024: { slidesPerView: 4 },
                768: { slidesPerView: 3 },
                480: { slidesPerView: 2 },
            },
        });
    }

    if (document.getElementById('productImageSlider')) {
        new Swiper('#productImageSlider', {
            slidesPerView: 1,
            spaceBetween: 10,
            loop: true,
            breakpoints: {
                1024: { slidesPerView: 3 },
                768: { slidesPerView: 2 },
                480: { slidesPerView: 1 },
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
        });
    }

    // Custom slider logic
    const slides = document.querySelectorAll('.slide');
    const nextBtn = document.getElementById('nextBtn');
    const prevBtn = document.getElementById('prevBtn');
    const indicators = document.querySelectorAll('.indicator');
    const progressFill = document.querySelector('.progress-fill');
    const container = document.querySelector('.slider-container');
    let currentSlide = 0;
    let isAnimating = false;
    let autoSlideInterval;
    let isTouch = false;

    // Exit early if the custom slider elements are not present
    if (slides.length === 0 || !container || !progressFill) {
        return;
    }

    // Touch detection
    window.addEventListener('touchstart', () => {
        isTouch = true;
    }, { once: true });

    // Progressive loading
    setTimeout(() => {
        container.classList.remove('loading');
        container.classList.add('loaded');
    }, 100);

    // Optimized progress update
    function updateProgress() {
        const progress = ((currentSlide + 1) / slides.length) * 100;
        if (progressFill) {
            progressFill.style.width = `${progress}%`;
        }
    }

    // Indicator update
    function updateIndicators() {
        indicators.forEach((indicator, index) => {
            indicator.classList.toggle('active', index === currentSlide);
            indicator.setAttribute('aria-selected', index === currentSlide);
        });
    }

    // Smooth element animation without GSAP
    function animateElement(element, properties, duration = 300, delay = 0) {
        return new Promise((resolve) => {
            if (!element) {
                return resolve();
            }
            setTimeout(() => {
                element.style.transition = `all ${duration}ms ease`;
                Object.keys(properties).forEach(prop => {
                    if (prop === 'opacity') {
                        element.style.opacity = properties[prop];
                    } else if (prop === 'y') {
                        element.style.transform = `translateY(${properties[prop]}px)`;
                    } else if (prop === 'scale') {
                        element.style.transform = `scale(${properties[prop]})`;
                    }
                });
                setTimeout(resolve, duration);
            }, delay);
        });
    }

    // Initial slide animation
    async function animateInitialSlide() {
        const activeSlide = slides[currentSlide];
        if (!activeSlide) return;

        const elements = {
            number: activeSlide.querySelector('.slide-number'),
            title: activeSlide.querySelector('.slide-title'),
            desc: activeSlide.querySelector('.slide-description'),
            link: activeSlide.querySelector('.slide-link'),
            image: activeSlide.querySelector('img')
        };

        // Animate elements sequentially with reduced delays
        await animateElement(elements.number, { opacity: 1, y: 0 }, 400, 0);
        await animateElement(elements.title, { opacity: 1, y: 0 }, 500, 0);
        await animateElement(elements.desc, { opacity: 1, y: 0 }, 400, 0);
        await animateElement(elements.link, { opacity: 1, y: 0 }, 400, 0);
        animateElement(elements.image, { scale: 1 }, 600, 0);

        updateProgress();
        updateIndicators();
    }

    // Optimized slide transition
    async function goToSlide(slideIndex) {
        if (slideIndex === currentSlide || isAnimating || slideIndex < 0 || slideIndex >= slides.length) {
            return;
        }

        isAnimating = true;

        const outgoingSlide = slides[currentSlide];
        const incomingSlide = slides[slideIndex];

        if (!outgoingSlide || !incomingSlide) {
            isAnimating = false;
            return;
        }

        const outElements = {
            number: outgoingSlide.querySelector('.slide-number'),
            title: outgoingSlide.querySelector('.slide-title'),
            desc: outgoingSlide.querySelector('.slide-description'),
            link: outgoingSlide.querySelector('.slide-link'),
            image: outgoingSlide.querySelector('img')
        };

        const inElements = {
            number: incomingSlide.querySelector('.slide-number'),
            title: incomingSlide.querySelector('.slide-title'),
            desc: incomingSlide.querySelector('.slide-description'),
            link: incomingSlide.querySelector('.slide-link'),
            image: incomingSlide.querySelector('img')
        };

        // Activate incoming slide
        incomingSlide.classList.add('active');

        // Reset incoming elements
        Object.values(inElements).forEach(el => {
            if (!el) return;
            if (el === inElements.image) {
                el.style.opacity = '0';
                el.style.transform = 'scale(1.02)';
            } else {
                el.style.opacity = '0';
                el.style.transform = 'translateY(15px)';
            }
        });

        // Animate out
        const outPromises = Object.values(outElements).map((el, i) => {
            if (!el) return Promise.resolve();
            if (el === outElements.image) {
                return animateElement(el, { opacity: 0, scale: 1.05 }, 150, i * 10);
            } else {
                return animateElement(el, { opacity: 0, y: -15 }, 150, i * 10);
            }
        });

        await Promise.all(outPromises);

        // Animate in
        const inPromises = Object.values(inElements).map((el, i) => {
            if (!el) return Promise.resolve();
            if (el === inElements.image) {
                return animateElement(el, { opacity: 1, scale: 1 }, 200, i * 10);
            } else {
                return animateElement(el, { opacity: 1, y: 0 }, 200, i * 10);
            }
        });

        await Promise.all(inPromises);

        // Cleanup
        if (outgoingSlide) {
            outgoingSlide.classList.remove('active');
        }
        currentSlide = slideIndex;
        isAnimating = false;
        updateProgress();
        updateIndicators();
    }

    // Event listeners with debouncing
    let clickTimeout;

    function handleNavClick(direction) {
        if (clickTimeout) return;
        clickTimeout = setTimeout(() => {
            clickTimeout = null;
            const slideIndex = direction === 'next'
                ? (currentSlide + 1) % slides.length
                : (currentSlide - 1 + slides.length) % slides.length;
            goToSlide(slideIndex);
        }, 50);
    }

    if (nextBtn) nextBtn.addEventListener('click', () => handleNavClick('next'));
    if (prevBtn) prevBtn.addEventListener('click', () => handleNavClick('prev'));

    if (container) {
        container.addEventListener('mouseenter', stopAutoSlide);
        container.addEventListener('mouseleave', () => {
            if (!isTouch) startAutoSlide();
        });
    }

    // Indicator clicks
    indicators.forEach((indicator, index) => {
        indicator.addEventListener('click', () => goToSlide(index));
    });

    // Keyboard navigation
    document.addEventListener('keydown', (e) => {
        if (e.key === 'ArrowRight') handleNavClick('next');
        if (e.key === 'ArrowLeft') handleNavClick('prev');
    });

    // Auto slide with reduced frequency
    function startAutoSlide() {
        if (autoSlideInterval) clearInterval(autoSlideInterval);
        autoSlideInterval = setInterval(() => {
            if (!isAnimating && !document.hidden) {
                handleNavClick('next');
            }
        }, 4000);
    }

    function stopAutoSlide() {
        if (autoSlideInterval) {
            clearInterval(autoSlideInterval);
            autoSlideInterval = null;
        }
    }

    // Auto slide control
    if (container) {
        container.addEventListener('mouseenter', stopAutoSlide);
        container.addEventListener('mouseleave', () => {
            if (!isTouch) startAutoSlide();
        });
    }

    // Touch/swipe handling
    let touchStart = { x: 0, y: 0, time: 0 };
    let touchEnd = { x: 0, y: 0 };

    if (container) {
        container.addEventListener('touchstart', (e) => {
            touchStart.x = e.touches[0].clientX;
            touchStart.y = e.touches[0].clientY;
            touchStart.time = Date.now();
            stopAutoSlide();
        }, { passive: true });
    }
    if (container) {
        container.addEventListener('touchmove', (e) => {
            touchEnd.x = e.touches[0].clientX;
            touchEnd.y = e.touches[0].clientY;
        }, { passive: true });
    }
    if (container) {
        container.addEventListener('touchend', () => {
            const deltaX = touchEnd.x - touchStart.x;
            const deltaY = Math.abs(touchEnd.y - touchStart.y);
            const deltaTime = Date.now() - touchStart.time;

            // Swipe detection
            if (Math.abs(deltaX) > 50 && deltaY < 100 && deltaTime < 500) {
                if (deltaX > 0) {
                    handleNavClick('prev');
                } else {
                    handleNavClick('next');
                }
            }

            if (isTouch) {
                setTimeout(startAutoSlide, 3000);
            }
        }, { passive: true });
    }

    // Visibility change handling
    document.addEventListener('visibilitychange', () => {
        if (document.hidden) {
            stopAutoSlide();
        } else if (!isTouch) {
            startAutoSlide();
        }
    });

    // Initialize
    animateInitialSlide();
    if (!isTouch) {
        setTimeout(startAutoSlide, 2000);
    }

    // Preload next image for smoother transitions
    function preloadNextImage() {
        const nextIndex = (currentSlide + 1) % slides.length;
        const nextImg = slides[nextIndex]?.querySelector('img');
        if (nextImg && !nextImg.complete) {
            const img = new Image();
            img.src = nextImg.src;
        }
    }

    // Preload on slide change
    setInterval(preloadNextImage, 1000);
});
