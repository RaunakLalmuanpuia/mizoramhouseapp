<script setup>
import { defineProps, watch } from "vue";
import { useForm } from "@inertiajs/vue3";
import Header from "@/Components/Common/Header.vue";
import Footer from "@/Components/Common/Footer.vue";
import DestinationStep from "@/Components/Common/DestinationStep.vue";

const props = defineProps({
    application: Object,
});

const form = useForm({
    mizoram_house: '',
    arrival_date: '',
    departure_date: '',
    agree: false,
});

// Populate form when application data is available
watch(
    () => props.application,
    (newData) => {
        if (newData) {
            form.mizoram_house = newData.mizoram_house || '';
            form.arrival_date = newData.arrival_date || '';
            form.departure_date = newData.departure_date || '';
        }
    },
    { immediate: true }
);

const submit = () => {
    form.post(`/flam/location/${props.application.id}`, {
        onSuccess: () => router.push(`/flam/verify/${props.application.id}`)
    });
};
</script>

<template>
    <Header/>

    <div class="flex flex-col items-center w-[400px] p-3 mx-auto">
        <DestinationStep class="w-full" />
        <div class="p-6 bg-card rounded-lg shadow-md w-full">
            <h2 class="text-lg font-semibold">Kal Duhna Hmun</h2>
            <p class="text-muted-foreground">Mizoram House Kal duhna</p>
            <select v-model="form.mizoram_house" class="mt-2 w-full border border-border rounded-md p-2">
                <option value="">Select</option>
                <option value="Aizawl">Aizawl</option>
                <option value="Delhi">Delhi</option>
                <option value="Guwahati">Guwahati</option>
            </select>

            <h3 class="mt-6 text-lg font-semibold">Period</h3>
            <label class="block mt-4">Arrival/Thlen ni</label>
            <input v-model="form.arrival_date" type="date" class="mt-1 w-full border border-border rounded-md p-2" />

            <label class="block mt-4">Departure/Chhuah ni</label>
            <input v-model="form.departure_date" type="date" class="mt-1 w-full border border-border rounded-md p-2" />

            <div class="flex items-center mt-4">
                <input v-model="form.agree" type="checkbox" class="mr-2" />
                <span class="text-muted-foreground">
                I understand that all reservations are subject to seat availability, and GAD holds no responsibility if accommodation is denied due to a lack of available rooms.
                </span>
            </div>

            <div class="mt-6 flex justify-between">
                <button @click="$inertia.get(route('flam.step-two', { id: application.id }))" class="border border-border text-primary p-2 rounded-md">Back</button>
<!--                <button @click="$inertia.get(route('verify', { id: application.id }))" class="bg-primary text-primary-foreground p-2 rounded-md">Submit</button>-->
                <button @click="submit" class="bg-primary text-primary-foreground p-2 rounded-md">Submit</button>
            </div>
        </div>
    </div>

    <Footer/>
</template>

<style scoped>
</style>
