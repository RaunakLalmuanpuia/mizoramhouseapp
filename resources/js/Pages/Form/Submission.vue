<script setup>
import {defineProps} from "vue";
import Header from "@/Components/Common/Header.vue";
import Footer from "@/Components/Common/Footer.vue";
const props = defineProps({
    application: Object,
});

</script>

<template>
    <Header/>

    <div class="flex justify-center  bg-background">
        <div class="bg-card rounded-lg shadow-lg p-6 max-w-md text-center">
            <div class="bg-green-500 text-white w-10 h-10 rounded-full flex items-center justify-center mx-auto mb-4">
                <span>✔️</span>
            </div>
            <h2 class="text-lg font-semibold mb-2">You have successfully submitted your application</h2>
            <p class="text-muted-foreground mb-4">All reservations are made subject to availability of seats and GAD has no responsibility if accommodation is denied due to non-availability of seats.</p>
            <p class="font-medium mb-2">Application ID</p>
<!--            <p class="text-lg font-bold">{{ props.application.id }}</p>-->
            <button @click="$inertia.get(route('home'))" class="mt-4 bg-secondary text-secondary-foreground hover:bg-secondary/80 px-4 py-2 rounded-lg">Back to Home</button>
        </div>
    </div>
    <Footer/>
</template>

<style scoped>

</style>
