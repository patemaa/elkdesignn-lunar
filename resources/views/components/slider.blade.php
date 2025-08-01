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
    arrowsNavigation: false,
    dotsNavigation: false,
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
    </div>
    <!-- END Image Slider Container -->
    <!-- Content -->
    <div
        class="absolute inset-0 z-1 flex flex-col justify-center bg-black/50 text-white"
    >
        <div class="relative h-screen">
            <div class="absolute left-1/2 top-[60%] -translate-x-1/2 -translate-y-1/2 p-2">
                <h2 class="text-4xl font-bold mb-2 font-poiret">- Trending -</h2>
                <h1 class="text-8xl font-bold mb-4 font-poiret">Lorem Ipsum</h1>
                <button class="btn btn-wide uppercase">Explore Now</button>
            </div>
        </div>
    </div>
    <!-- END Content -->
</div>
<!-- END Image Slider: In The Background, Behind Content -->
