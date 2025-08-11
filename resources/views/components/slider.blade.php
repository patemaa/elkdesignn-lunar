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
    class="relative mx-auto w-full max-h-[803px]"
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
            class="aspect-11/5"
            role="region"
            aria-roledescription="carousel"
            aria-label="Image Slider"
        >
            <template x-for="(image, index) in images" x-bind:key="index">
                <img
                    x-bind:src="image"
                    x-bind:alt="`Image ${index + 1}`"
                    class="absolute start-0 top-0 max-h-[803px] w-full object-cover"
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
            class="group absolute sm:start-12 start-6 top-1/2 z-10 flex -translate-y-1/2 items-center justify-center rounded-full bg-white/50 sm:size-15 size-8 text-zinc-900 backdrop-blur-xs transition duration-150 ease-out hover:bg-white hover:scale-110 cursor-pointer"
            aria-label="Previous Image Slide"
        >
            <svg
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 20 20"
                fill="currentColor"
                class="hi-mini hi-chevron-left inline-block sm:size-7 size-4"
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
            class="group absolute sm:end-12 end-6 top-1/2 z-10 flex -translate-y-1/2 items-center justify-center rounded-full bg-white/50 sm:size-15 size-8 text-zinc-900 backdrop-blur-xs transition duration-150 ease-out hover:bg-white hover:scale-110 cursor-pointer"
            aria-label="Next Image Slide"
        >
            <svg
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 20 20"
                fill="currentColor"
                class="hi-mini hi-chevron-right inline-block sm:size-7 size-4"
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

    <!-- Dots Navigation -->
    <div
        x-cloak
        x-show="dotsNavigation"
        class="absolute bottom-0 inset-x-0 z-20 flex flex-wrap justify-center gap-3 py-4 cursor-pointer"
    >
        <template x-for="(image, index) in images" x-bind:key="index">
            <button
                x-on:click="set(index, 'button')"
                type="button"
                class="size-2.5 rounded-full"
                x-bind:class="{
                'bg-zinc-700': currentIndex === index,
                'bg-zinc-200 hover:bg-zinc-300 hover:ring-4 ring-zinc-100': currentIndex !== index
            }"
            ></button>
        </template>
    </div>

    <div class="absolute inset-0 z-1 flex items-center justify-center bg-black/50 text-white px-4">
        <div class="max-w-4xl">
            <h2 class="text-lg sm:text-2xl lg:text-3xl mb-2">
                Painted with love by <span class="font-semibold">Elk Design</span>
            </h2>
            <h1 class="text-xl sm:text-5xl lg:text-7xl font-bold leading-tight mb-4">
                Exquisite Floral Patterns<br>
                for Designers<br>
                and Creators
            </h1>
            <a href="/" class="hidden sm:inline-flex items-center gap-3 mt-4 group">
                <span class=" text-3xl font-bold">Explore Now</span>
                <svg xmlns="http://www.w3.org/2000/svg"
                     fill="none"
                     viewBox="0 0 24 24"
                     stroke-width="2"
                     stroke="currentColor"
                     class="w-6 h-7 text-white transition group-hover:translate-x-1">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                </svg>
            </a>
        </div>
    </div>
    <!-- END Dots Navigation -->
</div>
<!-- END Image Slider -->
