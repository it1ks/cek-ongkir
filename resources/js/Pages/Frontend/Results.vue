<template>
    <div
        v-if="isVisible"
        class="fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center z-50 transition-opacity duration-300"
    >
        <div
            class="bg-gray-700 p-6 rounded-lg shadow-lg max-w-lg w-full relative"
        >
            <!-- Close Button -->
            <button
                @click="closeModal"
                class="absolute top-4 right-4 bg-red-600 text-white p-2 rounded-full hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500"
            >
                <svg
                    class="w-3 h-3"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M6 18L18 6M6 6l12 12"
                    ></path>
                </svg>
            </button>

            <!-- Results Header -->
            <h2
                class="text-2xl text-white text-center font-semibold mb-4 border-b pb-2"
            >
                Hasil Ongkir
            </h2>

            <!-- Display Results -->
            <div v-if="results && results.length" class="space-y-4">
                <div
                    v-for="(result, index) in results"
                    :key="index"
                    class="bg-gray-100 p-4 rounded-lg shadow-md"
                >
                    <h3 class="text-lg font-bold mb-2 text-gray-800">
                        {{ result.name }}
                    </h3>
                    <ul class="list-disc list-inside space-y-2">
                        <li
                            v-for="(cost, i) in result.costs"
                            :key="i"
                            class="flex justify-between items-center"
                        >
                            <span class="font-semibold text-gray-700">{{
                                cost.service
                            }}</span>
                            <span class="text-green-600">{{
                                formatCurrency(cost.cost[0].value)
                            }}</span>
                            <span class="text-gray-500 text-sm"
                                >{{ cost.cost[0].etd }} hari</span
                            >
                        </li>
                    </ul>
                </div>
            </div>

            <!-- No Results Message -->
            <div v-else class="text-center text-gray-500">
                <p>Tidak ada hasil untuk ditampilkan.</p>
            </div>
        </div>
    </div>
</template>

<script setup>
import { computed } from "vue";

const props = defineProps({
    results: {
        type: Array,
        default: () => [], // Ensure results is always an array
    },
    showModal: Boolean,
});

const emit = defineEmits();

const isVisible = computed(() => props.showModal);

const formatCurrency = (value) => {
    return new Intl.NumberFormat("id-ID", {
        style: "currency",
        currency: "IDR",
    }).format(value);
};

const closeModal = () => {
    emit("close-modal");
};
</script>
