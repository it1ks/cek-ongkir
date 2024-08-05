<script setup>
import Navbar from "@/Pages/Frontend/Navbar.vue";
import Footer from "@/Pages/Frontend/Footer.vue";
</script>

<template>
    <Navbar />
    <div class="bg-gray-900 min-h-screen">
        <slot />
    </div>
    <Footer />
</template>
