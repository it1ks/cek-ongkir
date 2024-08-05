<template>
    <div class="bg-gray-900 w-full py-20 pt-16 pb-20" id="partners">
        <h2 class="text-4xl text-white font-bold text-center mb-16">
            Partner Kami.
        </h2>

        <div
            class="mx-auto w-full max-w-4xl grid grid-cols-1 sm:grid-cols-3 gap-6"
        >
            <div
                ref="partner1"
                class="flex items-center justify-center opacity-0 transform translate-y-10 transition-opacity duration-1000 ease-out transition-transform hover:scale-105 hover:shadow-xl hover:translate-y-0 p-4 bg-white rounded-lg border border-gray-200"
            >
                <img alt="JNE" class="h-20 object-contain" src="/img/jne.png" />
            </div>
            <div
                ref="partner2"
                class="flex items-center justify-center opacity-0 transform translate-y-10 transition-opacity duration-1000 ease-out transition-transform hover:scale-105 hover:shadow-xl hover:translate-y-0 p-4 bg-white rounded-lg border border-gray-200"
            >
                <img
                    alt="Pos Indonesia"
                    class="h-20 object-contain"
                    src="/img/pos.png"
                />
            </div>
            <div
                ref="partner3"
                class="flex items-center justify-center opacity-0 transform translate-y-10 transition-opacity duration-1000 ease-out transition-transform hover:scale-105 hover:shadow-xl hover:translate-y-0 p-4 bg-white rounded-lg border border-gray-200"
            >
                <img
                    alt="Tiki"
                    class="h-20 object-contain"
                    src="/img/tiki.png"
                />
            </div>
        </div>
    </div>
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

        this.$refs.partner1 && observer.observe(this.$refs.partner1);
        this.$refs.partner2 && observer.observe(this.$refs.partner2);
        this.$refs.partner3 && observer.observe(this.$refs.partner3);
    },
};
</script>

<style scoped>
img {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}
</style>
