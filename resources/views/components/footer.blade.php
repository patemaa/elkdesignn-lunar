<footer class="footer sm:footer-horizontal bg-base-200 text-base-content p-10 font-bold text-lg">
    <aside class="justify-center">
        <img src="{{ asset('storage/15/logo.png') }}" alt="Logo" class="h-20 w-auto" loading="lazy">
        <p class="font-poiret text-4xl">Elkdesign</p>
        <p class="font-poiret">Providing reliable design since 2025</p>
    </aside>

    <nav>
        <h6 class="footer-title ml-8">Services</h6>

        <div class="flex flex-col gap-2">
            <button class="btn btn-ghost text-lg font-poiret" onclick="branding.showModal()">Branding</button>
            <dialog id="branding" class="modal">
                <div class="modal-box">
                    <div class="flex justify-between items-start">
                        <div>
                            <h3 class="text-lg font-bold">Branding</h3>
                            <p class="text-sm text-gray-600">Service overview</p>
                        </div>
                    </div>
                    <p class="py-4 text-base">
                        We build cohesive brand identities that speak your values.
                        <strong>Includes:</strong> logo design, color palette, typography, brand guidelines, and voice.
                        Perfect for new launches or rebranding existing projects.
                    </p>
                </div>
                <form method="dialog" class="modal-backdrop">
                    <button>close</button>
                </form>
            </dialog>

            <button class="btn btn-ghost text-lg font-poiret" onclick="design.showModal()">Design</button>
            <dialog id="design" class="modal">
                <div class="modal-box">
                    <div class="flex justify-between items-start">
                        <div>
                            <h3 class="text-lg font-bold">Design</h3>
                            <p class="text-sm text-gray-600">Creative pattern & asset design</p>
                        </div>
                    </div>
                    <p class="py-4 text-base">
                        Custom floral patterns and visual assets tailored for your project.
                        From seamless repeats to surface design mockups, we ensure high-resolution, editable deliverables.
                        Ideal for packaging, textiles, web, and print.
                    </p>
                </div>
                <form method="dialog" class="modal-backdrop">
                    <button>close</button>
                </form>
            </dialog>

            <button class="btn btn-ghost text-lg font-poiret" onclick="marketing.showModal()">Marketing</button>
            <dialog id="marketing" class="modal">
                <div class="modal-box">
                    <div class="flex justify-between items-start">
                        <div>
                            <h3 class="text-lg font-bold">Marketing</h3>
                            <p class="text-sm text-gray-600">Pattern-driven promotion</p>
                        </div>
                    </div>
                    <p class="py-4 text-base">
                        We help showcase your brand with on-brand visuals and campaign assets.
                        Services include social media templates, email headers, promotional banners, and visual strategy to elevate engagement.
                    </p>
                </div>
                <form method="dialog" class="modal-backdrop">
                    <button>close</button>
                </form>
            </dialog>

            <button class="btn btn-ghost text-lg font-poiret" onclick="advertisement.showModal()">Advertisement</button>
            <dialog id="advertisement" class="modal">
                <div class="modal-box">
                    <div class="flex justify-between items-start">
                        <div>
                            <h3 class="text-lg font-bold">Advertisement</h3>
                            <p class="text-sm text-gray-600">Visual ads that convert</p>
                        </div>
                    </div>
                    <p class="py-4 text-base">
                        Eye-catching ad creatives optimized for platforms like Instagram, Pinterest, and display networks.
                        Includes A/B concepts, size variants, and brand-aligned messaging to drive clicks and conversions.
                    </p>
                </div>
                <form method="dialog" class="modal-backdrop">
                    <button>close</button>
                </form>
            </dialog>
        </div>
    </nav>

    <nav>
        <h6 class="footer-title ml-8">Company</h6>

        <button class="btn btn-ghost text-lg font-poiret" onclick="about_us.showModal()">About Us</button>
        <dialog id="about_us" class="modal">
            <div class="modal-box">
                <div class="flex justify-between items-start">
                    <div>
                        <h3 class="text-lg font-bold font-poiret">About Us</h3>
                        <p class="text-sm text-gray-600">Last updated: July 25, 2025</p>
                    </div>
                </div>
                <p class="py-4 text-base">
                    Elk Design is a creative studio specializing in hand-painted floral patterns. Every piece is crafted with love to bring elegance, uniqueness, and inspiration to designers and creators worldwide.
                    <br><br>
                    Founded in 2023, our goal is to blend timeless artistry with modern usability. We serve independent creators, boutiques, and brands seeking bespoke pattern work that stands out.
                    <br><br>
                    <strong>Vision:</strong> To become the go-to source for emotionally resonant, handcrafted pattern designs.
                    <strong>Mission:</strong> Deliver original floral motifs that elevate creative projects.
                    <strong>Values:</strong> Authenticity, detail, sustainability.
                </p>
            </div>
            <form method="dialog" class="modal-backdrop">
                <button>close</button>
            </form>
        </dialog>

        <button class="btn btn-ghost text-lg font-poiret" onclick="contact_us.showModal()">Contact Us</button>
        <dialog id="contact_us" class="modal">
            <div class="modal-box">
                <div class="flex justify-between items-start">
                    <div>
                        <h3 class="text-lg font-bold">Get in Touch</h3>
                        <p class="text-sm text-gray-600">We usually reply within 1–2 business days.</p>
                    </div>
                </div>
                <div class="py-4 space-y-3 text-base">
                    <p>If you have questions, collaboration ideas, or just want to say hello, drop us a line:</p>
                    <p>📩 <strong>Email:</strong> hello@elkdesign.com</p>
                    <p>📍 <strong>Location:</strong> Istanbul, Turkey</p>
                    <p>📞 <strong>Phone:</strong> +90 555 123 4567</p>

                    <hr />

                    <!-- Fake contact form (non-functional) -->
                    <form class="space-y-2">
                        <div>
                            <label class="block text-xs font-medium">Name</label>
                            <input type="text" placeholder="Your name" class="input input-bordered w-full" />
                        </div>
                        <div>
                            <label class="block text-xs font-medium">Email</label>
                            <input type="email" placeholder="you@example.com" class="input input-bordered w-full" />
                        </div>
                        <div>
                            <label class="block text-xs font-medium">Message</label>
                            <textarea placeholder="Write your message..." class="textarea textarea-bordered w-full"></textarea>
                        </div>
                        <button type="button" class="btn btn-primary w-full">Send Message</button>
                    </form>
                </div>
            </div>
            <form method="dialog" class="modal-backdrop">
                <button>close</button>
            </form>
        </dialog>
    </nav>

    <nav>
        <h6 class="footer-title ml-10">Legal</h6>
        <button class="btn btn-ghost text-lg font-poiret" onclick="terms_of_use.showModal()">Terms Of Use</button>
        <dialog id="terms_of_use" class="modal">
            <div class="modal-box">
                <div class="flex justify-between items-start">
                    <div>
                        <h3 class="text-lg font-bold">Terms Of Use</h3>
                        <p class="text-sm text-gray-600">Last updated: July 25, 2025</p>
                    </div>
                </div>
                <p class="py-4 text-sm space-y-2">
                    Welcome to Elk Design. By accessing or using our website, you agree to these Terms of Use.
                    <br><br>
                    <strong>1. Intellectual Property:</strong> All content—images, patterns, text, logos—belongs to Elk Design or its licensors. No copying or redistribution without permission.
                    <br><br>
                    <strong>2. Use of Designs:</strong> Patterns are for licensed use only. Unauthorized reproduction or commercial use without a valid license is prohibited.
                    <br><br>
                    <strong>3. User Conduct:</strong> Do not engage in illegal activities, infringe IP, or interfere with site functionality.
                    <br><br>
                    <strong>4. Disclaimer:</strong> Content is provided “as is.” Elk Design makes no guarantees of accuracy or fitness.
                    <br><br>
                    <strong>5. Liability:</strong> Elk Design is not liable for damages arising from use or inability to use the site.
                    <br><br>
                    <strong>6. Changes:</strong> Terms can change anytime; updates take effect when posted.
                    <br><br>
                    <strong>7. Governing Law:</strong> Turkish law applies.
                    <br><br>
                    <strong>8. Contact:</strong> hello@elkdesign.com
                </p>
            </div>
            <form method="dialog" class="modal-backdrop">
                <button>close</button>
            </form>
        </dialog>

        <button class="btn btn-ghost text-lg font-poiret" onclick="privacy_policy.showModal()">Privacy policy</button>
        <dialog id="privacy_policy" class="modal">
            <div class="modal-box">
                <div class="flex justify-between items-start">
                    <div>
                        <h3 class="text-lg font-bold">Privacy Policy</h3>
                        <p class="text-sm text-gray-600">Effective date: July 25, 2025</p>
                    </div>
                </div>
                <p class="py-4 text-sm">
                    We collect minimal data to improve your experience. Information such as email (if provided), usage data, and cookies may be used for analytics and personalization. We do not sell your data. You can request deletion by contacting us.
                </p>
            </div>
            <form method="dialog" class="modal-backdrop">
                <button>close</button>
            </form>
        </dialog>

        <button class="btn btn-ghost text-lg font-poiret" onclick="cookie_policy.showModal()">Cookie policy</button>
        <dialog id="cookie_policy" class="modal">
            <div class="modal-box">
                <div class="flex justify-between items-start">
                    <div>
                        <h3 class="text-lg font-bold">Cookie Policy</h3>
                        <p class="text-sm text-gray-600">Last updated: July 25, 2025</p>
                    </div>
                </div>
                <p class="py-4 text-sm">
                    This site uses cookies to enhance functionality and analyze traffic. Essential cookies are required; optional cookies can be disabled in your browser. By using the site you consent to cookie use. See full details in the Privacy Policy.
                </p>
            </div>
            <form method="dialog" class="modal-backdrop">
                <button>close</button>
            </form>
        </dialog>
    </nav>

    <nav>
        <h6 class="footer-title ml-8">Social</h6>
        <div class="grid grid-flow-col gap-4">
            <a href="https://www.instagram.com/" target="_blank" rel="noopener noreferrer">
                <x-hugeicons-instagram />
            </a>
            <a href="https://www.youtube.com/" target="_blank" rel="noopener noreferrer">
                <x-hugeicons-youtube />
            </a>
            <a href="https://www.facebook.com/" target="_blank" rel="noopener noreferrer">
                <x-hugeicons-facebook-01 />
            </a>
            <a href="https://www.x.com/" target="_blank" rel="noopener noreferrer">
                <x-hugeicons-new-twitter-rectangle />
            </a>
            <a href="https://www.pinterest.com/" target="_blank" rel="noopener noreferrer">
                <x-hugeicons-pinterest />
            </a>
            <a href="https://www.tiktok.com/" target="_blank" rel="noopener noreferrer">
                <x-hugeicons-tiktok />
            </a>
            <a href="https://www.reddit.com/" target="_blank" rel="noopener noreferrer">
                <x-hugeicons-reddit />
            </a>
        </div>
    </nav>
</footer>

<footer class="footer sm:footer-horizontal footer-center bg-base-300 text-base-content p-4 font-poiret">
    <aside>
        <p>Copyright ©2025 - All right reserved by <a href="/">Elkdesign</a></p>
    </aside>
</footer>
