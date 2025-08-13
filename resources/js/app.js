import Swiper from 'swiper';
import 'swiper/css';

window.Swiper = Swiper;

document.addEventListener('DOMContentLoaded', () => {
    if (document.getElementById('slider1')) {
        new Swiper('#slider1', {
            slidesPerView: 2,
            spaceBetween: 16,
            loop: false,
            breakpoints: {
                1024: {slidesPerView: 3},
                768: {slidesPerView: 2},
                480: {slidesPerView: 1},
            },
        });
    }

    if (document.getElementById('recentlyViewedSlider')) {
        new Swiper('#recentlyViewedSlider', {
            slidesPerView: 2,
            spaceBetween: 16,
            loop: false,
            breakpoints: {
                1024: {slidesPerView: 4},
                768: {slidesPerView: 3},
                480: {slidesPerView: 2},
            },
        });
    }

    if (document.getElementById('productImageSlider')) {
        new Swiper('#productImageSlider', {
            slidesPerView: 1,
            spaceBetween: 10,
            loop: false,
            breakpoints: {
                1024: {slidesPerView: 3},
                768: {slidesPerView: 2},
                480: {slidesPerView: 1},
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
        });
    }

    new ImageSlider();

})

class ImageSlider {
    constructor() {
        this.currentSlide = 0;
        this.totalSlides = 4;
        this.isAnimating = false;
        this.autoSlideInterval = null;
        this.touchStartX = 0;
        this.touchEndX = 0;

        this.init();
    }

    init() {
        this.cacheElements();
        this.bindEvents();
        this.startAutoSlide();
        this.showSlider();
    }

    cacheElements() {
        this.slider = document.getElementById('imageSlider');
        this.slideTrack = document.getElementById('slideTrack');
        this.progressBar = document.getElementById('progressBar');
        this.prevBtn = document.getElementById('prevBtn');
        this.nextBtn = document.getElementById('nextBtn');
        this.indicators = document.querySelectorAll('.indicator-dot');
        this.slides = document.querySelectorAll('.image-slide');
    }

    bindEvents() {
        // Navigation buttons
        this.prevBtn?.addEventListener('click', () => this.prevSlide());
        this.nextBtn?.addEventListener('click', () => this.nextSlide());

        // Indicators
        this.indicators.forEach((indicator, index) => {
            indicator.addEventListener('click', () => this.goToSlide(index));
        });

        // Keyboard navigation
        document.addEventListener('keydown', (e) => {
            if (e.key === 'ArrowLeft') this.prevSlide();
            if (e.key === 'ArrowRight') this.nextSlide();
        });

        // Mouse events
        this.slider?.addEventListener('mouseenter', () => this.stopAutoSlide());
        this.slider?.addEventListener('mouseleave', () => this.startAutoSlide());

        // Touch events
        this.slider?.addEventListener('touchstart', (e) => this.handleTouchStart(e), { passive: true });
        this.slider?.addEventListener('touchend', (e) => this.handleTouchEnd(e), { passive: true });

        // Visibility change
        document.addEventListener('visibilitychange', () => {
            if (document.hidden) {
                this.stopAutoSlide();
            } else {
                this.startAutoSlide();
            }
        });
    }

    showSlider() {
        setTimeout(() => {
            this.slider?.classList.remove('loading');
            this.slider?.classList.add('loaded');
        }, 100);
    }

    goToSlide(slideIndex) {
        if (this.isAnimating || slideIndex === this.currentSlide) return;

        this.isAnimating = true;
        this.currentSlide = slideIndex;

        // Update slide track position
        const translateX = -slideIndex * 25;
        this.slideTrack.style.transform = `translateX(${translateX}%)`;

        // Update active states
        this.updateActiveStates();
        this.updateProgressBar();

        // Reset animation flag
        setTimeout(() => {
            this.isAnimating = false;
        }, 600);
    }

    nextSlide() {
        const nextIndex = (this.currentSlide + 1) % this.totalSlides;
        this.goToSlide(nextIndex);
    }

    prevSlide() {
        const prevIndex = (this.currentSlide - 1 + this.totalSlides) % this.totalSlides;
        this.goToSlide(prevIndex);
    }

    updateActiveStates() {
        // Update slides
        this.slides.forEach((slide, index) => {
            slide.classList.toggle('active', index === this.currentSlide);
        });

        // Update indicators
        this.indicators.forEach((indicator, index) => {
            indicator.classList.toggle('active', index === this.currentSlide);
        });
    }

    updateProgressBar() {
        const progress = ((this.currentSlide + 1) / this.totalSlides) * 100;
        this.progressBar.style.width = `${progress}%`;
    }

    startAutoSlide() {
        this.stopAutoSlide();
        this.autoSlideInterval = setInterval(() => {
            if (!this.isAnimating && !document.hidden) {
                this.nextSlide();
            }
        }, 2000);
    }

    stopAutoSlide() {
        if (this.autoSlideInterval) {
            clearInterval(this.autoSlideInterval);
            this.autoSlideInterval = null;
        }
    }

    handleTouchStart(e) {
        this.touchStartX = e.touches[0].clientX;
        this.stopAutoSlide();
    }

    handleTouchEnd(e) {
        this.touchEndX = e.changedTouches[0].clientX;
        this.handleSwipe();
        setTimeout(() => this.startAutoSlide(), 2000);
    }

    handleSwipe() {
        const swipeThreshold = 50;
        const swipeDistance = this.touchStartX - this.touchEndX;

        if (Math.abs(swipeDistance) > swipeThreshold) {
            if (swipeDistance > 0) {
                this.nextSlide();
            } else {
                this.prevSlide();
            }
        }
    }
}

Alpine.data('notificationCenter', () => ({
    position: 'top-end', // 'top-start', 'top-end', 'bottom-start', 'bottom-end'
    autoClose: true,
    autoCloseDelay: 3000,
    notifications: [],
    nextId: 1,

    init() {
        window.addEventListener('show-notification', event => {
            const { message, type, link } = event.detail;
            this.triggerNotification(message, type, link);
        });
    },

    transitionClasses: {
        'x-transition:enter-start'() {
            if (this.position === 'top-start' || this.position === 'bottom-start') {
                return 'opacity-0 -translate-x-12 rtl:translate-x-12';
            } else {
                return 'opacity-0 translate-x-12 rtl:-translate-x-12';
            }
        },
        'x-transition:leave-end'() {
            if (this.position === 'top-start' || this.position === 'bottom-start') {
                return 'opacity-0 -translate-x-12 rtl:translate-x-12';
            } else {
                return 'opacity-0 translate-x-12 rtl:-translate-x-12';
            }
        },
    },

    triggerNotification(message, type, link) {
        this.playSound();

        const id = this.nextId++;
        this.notifications.push({ id, message, type, link, visible: false });

        setTimeout(() => {
            const index = this.notifications.findIndex(n => n.id === id);
            if (index > -1) {
                this.notifications[index].visible = true;
            }
        }, 30);

        if (this.autoClose) {
            setTimeout(() => this.dismissNotification(id), this.autoCloseDelay);
        }
    },

    dismissNotification(id) {
        const index = this.notifications.findIndex(n => n.id === id);
        if (index > -1) {
            this.notifications[index].visible = false;
            setTimeout(() => {
                this.notifications.splice(index, 1);
            }, 300);
        }
    }
}));

