<template>
    <Head title="Cek Ongkir Ekspedisi JNE, TIKI, POS" />
    <FrontendLayout>
        <Hero
            :cities="cities"
            @submit-form="fetchResults"
            ref="heroComponent"
        />
        <Results
            :results="results"
            :showModal="showModal"
            @close-modal="resetForm"
        />
        <Partner />
        <Testimoni />
    </FrontendLayout>
</template>

<script setup>
import { ref } from "vue";
import { Head, usePage } from "@inertiajs/vue3";
import Hero from "@/Pages/Frontend/Hero.vue";
import Results from "@/Pages/Frontend/Results.vue";
import FrontendLayout from "@/Layouts/FrontendLayout.vue";
import Partner from "@/Pages/Frontend/Partner.vue";
import Testimoni from "@/Pages/Frontend/Testimoni.vue";

const { props } = usePage();
const cities = ref(props.cities);
const results = ref(props.results);
const showModal = ref(false);

const fetchResults = async (form) => {
    try {
        const response = await fetch("/", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": document
                    .querySelector('meta[name="csrf-token"]')
                    .getAttribute("content"),
            },
            body: JSON.stringify(form),
        });

        if (!response.ok) {
            throw new Error("Network response was not ok.");
        }

        const data = await response.json();
        results.value = data.results;
        showModal.value = true;
    } catch (error) {
        console.error("Error fetching results:", error);
        results.value = [];
        showModal.value = false;
    }
};

const resetForm = () => {
    showModal.value = false;
    const heroComponent = $refs.heroComponent;
    if (heroComponent) {
        heroComponent.resetForm();
    }
};
</script>
