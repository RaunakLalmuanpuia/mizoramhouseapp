<script setup>
import Header from "@/Components/Common/Header.vue";
import Footer from "@/Components/Common/Footer.vue";
import DestinationStep from "@/Components/Common/DestinationStep.vue";
</script>

<template>
    <Header/>

    <div class="flex flex-col items-center w-[400px] p-3 mx-auto">
        <DestinationStep class="w-full" />
        <div class="p-6 bg-card rounded-lg shadow-md w-full">
            <h2 class="text-lg font-semibold">Kal Duhna Hmun</h2>
            <p class="text-muted-foreground">Mizoram House Kal duhna</p>
            <select class="mt-2 w-full border border-border rounded-md p-2">
                <option>Select</option>
            </select>

            <h3 class="mt-6 text-lg font-semibold">Period</h3>
            <label class="block mt-4">Arrival/Thlen ni</label>
            <input type="text" placeholder="Ni leh thla thlanna" class="mt-1 w-full border border-border rounded-md p-2" />

            <label class="block mt-4">Departure/Chhuah ni</label>
            <input type="text" placeholder="Ni leh thla thlanna" class="mt-1 w-full border border-border rounded-md p-2" />

            <div class="flex items-center mt-4">
                <input type="checkbox" class="mr-2" />
                <span class="text-muted-foreground">
                I understand that all reservations are subject to seat availability, and GAD holds no responsibility if accommodation is denied due to a lack of available rooms.
            </span>
            </div>

            <div class="mt-6 flex justify-between">
                <button  @click="$inertia.get(route('flam-step-two'))" class="border border-border text-primary p-2 rounded-md">Back</button>
                <button @click="$inertia.get(route('verify'))" class="bg-primary text-primary-foreground p-2 rounded-md">Submit</button>
            </div>
        </div>
    </div>


    <Footer/>
</template>

<style scoped>

</style>
