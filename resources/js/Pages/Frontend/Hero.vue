<template>
    <section
        class="relative bg-cover bg-center"
        style="
            background-image: url('/img/background.jpg');
            height: 560px;
            background-size: contain;
        "
    >
        <div class="absolute inset-0 bg-gray-900 opacity-50"></div>
        <div class="relative z-10 flex items-center justify-center h-full">
            <div
                class="bg-gray-900 bg-opacity-80 rounded-lg shadow-lg max-w-4xl w-full p-8 mb-24"
            >
                <form @submit.prevent="submitForm">
                    <div
                        class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6"
                    >
                        <!-- Asal Pengiriman -->
                        <div class="flex flex-col">
                            <label
                                class="block font-semibold mb-2 text-white"
                                for="origin"
                            >
                                Asal Pengiriman
                            </label>
                            <el-select
                                v-model="form.origin"
                                id="origin"
                                placeholder="Pilih Asal Kota"
                                filterable
                                remote
                                :remote-method="fetchCities"
                                class="block text-gray-700 text-sm font-bold mb-2"
                            >
                                <el-option
                                    v-for="city in filteredCities"
                                    :key="city.city_id"
                                    :label="city.city_name"
                                    :value="city.city_id"
                                />
                            </el-select>
                        </div>

                        <!-- Tujuan Pengiriman -->
                        <div class="flex flex-col">
                            <label
                                class="block font-semibold mb-2 text-white"
                                for="destination"
                            >
                                Tujuan Pengiriman
                            </label>
                            <el-select
                                v-model="form.destination"
                                id="destination"
                                placeholder="Pilih Tujuan Kota"
                                filterable
                                remote
                                :remote-method="fetchCities"
                                class="block text-gray-700 text-sm font-bold mb-2"
                            >
                                <el-option
                                    v-for="city in filteredCities"
                                    :key="city.city_id"
                                    :label="city.city_name"
                                    :value="city.city_id"
                                />
                            </el-select>
                        </div>

                        <!-- Kurir -->
                        <div class="flex flex-col">
                            <label
                                class="block font-semibold mb-2 text-white"
                                for="courier"
                            >
                                Kurir
                            </label>
                            <el-select
                                v-model="form.courier"
                                id="courier"
                                placeholder="Pilih Kurir"
                                class="block text-gray-700 text-sm font-bold mb-2"
                            >
                                <el-option value="jne" label="JNE" />
                                <el-option value="pos" label="POS" />
                                <el-option value="tiki" label="TIKI" />
                            </el-select>
                        </div>

                        <!-- Berat Paket -->
                        <div class="flex flex-col">
                            <label
                                class="block font-semibold mb-2 text-white"
                                for="weight"
                            >
                                Berat Paket (kg)
                            </label>
                            <el-input
                                v-model.number="form.weight"
                                id="weight"
                                type="number"
                                placeholder="Masukkan Berat"
                                class="block text-gray-700 text-sm font-bold mb-2"
                            />
                        </div>
                    </div>

                    <div class="flex justify-center items-center mt-6">
                        <button
                            type="submit"
                            class="bg-purple-900 px-6 py-3 rounded-lg text-white font-semibold hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-400"
                        >
                            Cek Ongkir
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</template>

<script setup>
import { ref } from "vue";
import { ElSelect, ElOption, ElInput } from "element-plus";
import "element-plus/es/components/select/style/css";
import "element-plus/es/components/option/style/css";
import "element-plus/es/components/input/style/css";

const props = defineProps({
    cities: Array,
});

const emit = defineEmits();

const form = ref({
    origin: "",
    destination: "",
    courier: "",
    weight: "",
});

const loading = ref(false);
const filteredCities = ref([]);

const fetchCities = (query) => {
    loading.value = true;
    setTimeout(() => {
        filteredCities.value = props.cities.filter((city) =>
            city.city_name.toLowerCase().includes(query.toLowerCase())
        );
        loading.value = false;
    }, 500);
};

const submitForm = () => {
    emit("submit-form", form.value);
};

const resetForm = () => {
    form.value = {
        origin: "",
        destination: "",
        courier: "",
        weight: "",
    };
};
</script>

<style scoped>
/* Custom styles if needed */
</style>
