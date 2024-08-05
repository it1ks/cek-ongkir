<template>
    <section id="testimonials" class="py-16 bg-gray-900">
        <div class="container m-auto px-6 text-gray-600 md:px-12 xl:px-6">
            <h2
                class="mb-12 text-center text-2xl text-white font-bold md:text-4xl"
            >
                Testimonials.
            </h2>
            <div class="grid gap-8 md:grid-rows-2 lg:grid-cols-2">
                <div
                    ref="testimonial1"
                    class="row-span-2 p-6 border border-gray-100 rounded-xl bg-gray-50 text-center sm:p-8 transition-opacity duration-1000 opacity-0 transform translate-y-10"
                >
                    <div class="h-full flex flex-col justify-center space-y-4">
                        <img
                            class="w-20 h-20 mx-auto rounded-full"
                            src="https://tailus.io/sources/blocks/grid-cards/preview/images/avatars/second_user.webp"
                            alt="user avatar"
                            height="220"
                            width="220"
                            loading="lazy"
                        />
                        <p class="text-gray-600 md:text-xl">
                            <span class="font-serif">"</span> Lorem ipsum dolor
                            sit amet consectetur adipisicing elit. Quaerat
                            repellat perspiciatis excepturi est. Non ipsum iusto
                            aliquam consequatur repellat provident, omnis ut,
                            sapiente voluptates veritatis cum deleniti
                            repudiandae ad doloribus.
                            <span class="font-serif">"</span>
                        </p>
                        <div>
                            <h6 class="text-lg font-semibold leading-none">
                                Jane Doe
                            </h6>
                            <span class="text-xs text-gray-500"
                                >Product Designer</span
                            >
                        </div>
                    </div>
                </div>

                <div
                    ref="testimonial2"
                    class="p-6 border border-gray-100 rounded-xl bg-gray-50 sm:flex sm:space-x-8 sm:p-8 transition-opacity duration-1000 opacity-0 transform translate-y-10"
                >
                    <img
                        class="w-20 h-20 mx-auto rounded-full"
                        src="https://tailus.io/sources/blocks/grid-cards/preview/images/avatars/first_user.webp"
                        alt="user avatar"
                        height="220"
                        width="220"
                        loading="lazy"
                    />
                    <div
                        class="space-y-4 mt-4 text-center sm:mt-0 sm:text-left"
                    >
                        <p class="text-gray-600">
                            <span class="font-serif">"</span> Lorem ipsum dolor
                            sit amet consectetur adipisicing elit. Quaerat
                            repellat perspiciatis excepturi est. Non ipsum iusto
                            aliquam consequatur repellat provident, omnis ut,
                            sapiente voluptates veritatis cum deleniti
                            repudiandae ad doloribus.
                            <span class="font-serif">"</span>
                        </p>
                        <div>
                            <h6 class="text-lg font-semibold leading-none">
                                Jane Doe
                            </h6>
                            <span class="text-xs text-gray-500"
                                >Product Designer</span
                            >
                        </div>
                    </div>
                </div>
                <div
                    ref="testimonial3"
                    class="p-6 border border-gray-100 rounded-xl bg-gray-50 sm:flex sm:space-x-8 sm:p-8 transition-opacity duration-1000 opacity-0 transform translate-y-10"
                >
                    <img
                        class="w-20 h-20 mx-auto rounded-full"
                        src="https://tailus.io/sources/blocks/grid-cards/preview/images/avatars/third_user.webp"
                        alt="user avatar"
                        height="220"
                        width="220"
                        loading="lazy"
                    />
                    <div
                        class="space-y-4 mt-4 text-center sm:mt-0 sm:text-left"
                    >
                        <p class="text-gray-600">
                            <span class="font-serif">"</span> Lorem ipsum dolor
                            sit amet consectetur adipisicing elit. Quaerat
                            repellat perspiciatis excepturi est. Non ipsum iusto
                            aliquam consequatur repellat provident, omnis ut,
                            sapiente voluptates veritatis cum deleniti
                            repudiandae ad doloribus.
                            <span class="font-serif">"</span>
                        </p>
                        <div>
                            <h6 class="text-lg font-semibold leading-none">
                                Jane Doe
                            </h6>
                            <span class="text-xs text-gray-500"
                                >Product Designer</span
                            >
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
export default {
    mounted() {
        const options = {
            threshold: 0.1,
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.remove(
                        "opacity-0",
                        "translate-y-10"
                    );
                    entry.target.classList.add("opacity-100", "translate-y-0");
                }
            });
        }, options);

        this.$refs.testimonial1 && observer.observe(this.$refs.testimonial1);
        this.$refs.testimonial2 && observer.observe(this.$refs.testimonial2);
        this.$refs.testimonial3 && observer.observe(this.$refs.testimonial3);
    },
};
</script>
