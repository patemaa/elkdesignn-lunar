<!-- Image Slider: With Autoplay -->
<!-- An Alpine.js and Tailwind CSS component by https://pinemix.com -->
<div
    x-data="{
    // Images array
    images: [
            'https://www.tashistudio.com/img/cms/Exclusive%20Arrivals_A%20(4).jpg',
            'https://www.tashistudio.com/img/cms/Exclusive%20Arrivals_A%20_-min.jpg',
            'https://www.tashistudio.com/img/cms/Exclusive%20Arrivals_A%20(1).jpg',
            'https://www.tashistudio.com/img/cms/Exclusive%20Arrivals_A%20(2).jpg',
            'https://images.pexels.com/photos/842711/pexels-photo-842711.jpeg',
            'https://images.pexels.com/photos/1456291/pexels-photo-1456291.jpeg',
            'https://images.pexels.com/photos/1266808/pexels-photo-1266808.jpeg',
    ],

    // Image Slider options
    arrowsNavigation: true,
    dotsNavigation: true,
    transition: 'fade', // '' for no transition, 'fade', 'slide', 'blur-sm'
    loop: true,
    autoplay: true,
    autoplayDuration: 3000,
    autoplayProgressBar: false,

    // Helpers
    currentIndex: 0,
    autoplayInterval: null,
    autoplayTimer: null,
    autoplayProgress: 0,

    // Initialization
    init() {
      // Start all autoplay intervals
      this.startAutoplayInterval('all');
    },

    // Display specific image
    set(index, from) {
      // Check that the index is valid
      if (index > -1 && index < this.images.length) {
        // The image is after current one
        if (index > this.currentIndex) {
          this.currentIndex = index;

          // If we are already in the last image and loop is disabled
          if (!this.loop && this.currentIndex === this.images.length - 1) {
            // Reset all autoplay intervals and stop
            this.resetAutoplayInterval('all');
          } else {
            // If it is triggered by the navigation button
            if (from === 'button') {
              // Reset all autoplay interval and restart them
              this.resetAutoplayInterval('all', true);
            } else {
              // Reset autoplay timer interval and restart it
              this.resetAutoplayInterval('timer', true);
            }
          }
        } else if (index < this.currentIndex) { // Else if the image is before current one
          this.currentIndex = index;

          // If it is triggered by the navigation button
          if (from === 'button') {
            // Reset all autoplay interval and restart them
            this.resetAutoplayInterval('all', true);
          } else {
            // Reset autoplay timer interval and restart it
            this.resetAutoplayInterval('timer', true);
          }
        }
      }
    },

    // Display next image
    next(from) {
      // Stop the carousel loop when reaching the last image if loop is disabled
      if (!this.loop && this.currentIndex === this.images.length - 1) {
        return;
      }

      // Go to next image
      this.set((this.currentIndex + 1) % this.images.length, from);
    },

    // Display previous image
    previous(from) {
      // Stop the carousel loop when reaching the first image if loop is disabled
      if (!this.loop && this.currentIndex === 0) {
        return;
      }

      // Go to previous image
      this.set((this.currentIndex - 1 + this.images.length) % this.images.length, from);
    },

    // Start autoplay interval
    startAutoplayInterval(mode) {
      if (this.autoplay && (mode === 'all' || mode === 'interval')) {
        this.autoplayInterval = setInterval(() => this.next(), this.autoplayDuration);
      }

      if (this.autoplay && this.autoplayProgressBar && (mode === 'all' || mode === 'timer')) {
        this.autoplayProgressBar = false;
        this.autoplayProgress = 0;
        this.autoplayProgressBar = true;

        this.autoplayTimer = setInterval(() => {
          this.autoplayProgress += 100 / (this.autoplayDuration / 100);
        }, 100);
      }
    },

    // Reset autoplay timer
    resetAutoplayInterval(mode, restart) {
      if (this.autoplay && (mode === 'all' || mode === 'interval')) {
        clearInterval(this.autoplayInterval);

        if (restart && mode === 'interval') {
          this.startAutoplayInterval('interval');
        }
      }

      if (this.autoplay && this.autoplayProgressBar && (mode === 'all' || mode === 'timer')) {
        clearInterval(this.autoplayTimer);

        if (restart && mode === 'timer') {
          this.startAutoplayInterval('timer');
        } else if (!restart) {
          this.autoplayProgressBar = false;
          this.autoplayProgress = 0;
          this.autoplayProgressBar = true;
        }
      }

      if (restart && mode === 'all') {
        this.startAutoplayInterval('all');
      }
    },
  }"
    class="relative mx-auto w-full max-h-[709px]"
>
    <!-- Image Slider Container -->
    <div
        class="relative overflow-hidden focus:outline-hidden focus-visible:ring-4 focus-visible:ring-teal-400/60"
        tabindex="0"
        x-on:keyup.right="next('button')"
        x-on:keyup.left="previous('button')"
    >
        <!-- Images -->
        <div
            class="aspect-16/10"
            role="region"
            aria-roledescription="carousel"
            aria-label="Image Slider"
        >
            <template x-for="(image, index) in images" x-bind:key="index">
                <img
                    x-bind:src="image"
                    x-bind:alt="`Image ${index + 1}`"
                    class="absolute start-0 top-0 max-h-[709px] w-full object-cover"
                    x-bind:class="{
                        'transition duration-300 ease-in-out will-change-auto': transition,
                        'z-1': currentIndex === index,
                        'hidden': !transition && currentIndex !== index,
                        'opacity-100': (transition === 'fade' || transition === 'blur-sm')  && currentIndex === index,
                        'opacity-0 invisible': transition === 'fade' && currentIndex !== index,
                        'blur-xl opacity-0': transition === 'blur-sm' && currentIndex !== index,
                        'translate-x-0': transition === 'slide' && currentIndex === index,
                        '-translate-x-full': transition === 'slide' && currentIndex > index,
                        'translate-x-full': transition === 'slide' && currentIndex < index
                      }"
                    role="group"
                    aria-roledescription="slide"
                    x-bind:aria-label="`Image slide ${index + 1} of ${images.length}`"
                    x-bind:aria-hidden="currentIndex !== index"
                />
            </template>
        </div>
        <!-- END Images -->

        <!-- Previous Button -->
        <button
            x-cloak
            x-show="arrowsNavigation && !(!loop && currentIndex === 0)"
            x-on:click="previous('button')"
            type="button"
            class="group absolute -start-1 top-1/2 z-10 flex -translate-y-1/2 items-center rounded-e-md bg-zinc-900/60 py-5 ps-3 pe-2 text-white backdrop-blur-xs transition duration-150 ease-out hover:start-0 hover:bg-zinc-900/90 active:bg-zinc-900/75"
            aria-label="Previous Image Slide"
        >
            <svg
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 20 20"
                fill="currentColor"
                class="hi-mini hi-chevron-left inline-block size-5 rtl:rotate-180"
            >
                <path
                    fill-rule="evenodd"
                    d="M11.78 5.22a.75.75 0 0 1 0 1.06L8.06 10l3.72 3.72a.75.75 0 1 1-1.06 1.06l-4.25-4.25a.75.75 0 0 1 0-1.06l4.25-4.25a.75.75 0 0 1 1.06 0Z"
                    clip-rule="evenodd"
                />
            </svg>
            <span class="sr-only">Previous</span>
        </button>
        <!-- END Previous Button -->

        <!-- Next Button -->
        <button
            x-cloak
            x-show="arrowsNavigation && !(!loop && currentIndex === images.length - 1)"
            x-on:click="next('button')"
            type="button"
            class="group absolute -end-1 top-1/2 z-10 flex -translate-y-1/2 items-center rounded-s-md bg-zinc-900/60 py-5 ps-2 pe-3 text-white backdrop-blur-xs transition duration-150 ease-out hover:end-0 hover:bg-zinc-900/90 active:bg-zinc-900/75"
            aria-label="Next Image Slide"
        >
            <svg
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 20 20"
                fill="currentColor"
                class="hi-mini hi-chevron-right inline-block size-5 rtl:rotate-180"
            >
                <path
                    fill-rule="evenodd"
                    d="M8.22 5.22a.75.75 0 0 1 1.06 0l4.25 4.25a.75.75 0 0 1 0 1.06l-4.25 4.25a.75.75 0 0 1-1.06-1.06L11.94 10 8.22 6.28a.75.75 0 0 1 0-1.06Z"
                    clip-rule="evenodd"
                />
            </svg>
            <span class="sr-only">Next</span>
        </button>
        <!-- END Next Button -->
    </div>
    <!-- END Image Slider Container -->
    <!-- Content -->
    <div class="absolute inset-0 z-1 flex flex-col justify-center bg-black/50 text-white">
        <div class="absolute left-1/2 top-[60%] -translate-x-1/2 -translate-y-1/2 p-2">
            <h2 class="text-2xl sm:text-4xl font-bold mb-1 font-poiret">- Trending -</h2>
            <h1 class="text-4xl sm:text-8xl font-bold mb-1 font-poiret leading-tight overflow-auto">Lorem Ipsum</h1>
            <button
                class="uppercase tracking-wide font-medium text-sm sm:text-base md:text-lg px-4 py-2 sm:px-6 sm:py-3 bg-white text-black rounded-md w-full sm:w-auto hover:opacity-90 transition"
            >
                Explore Now
            </button>        </div>
    </div>
    <!-- END Content -->
</div>
