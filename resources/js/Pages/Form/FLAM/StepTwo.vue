<script setup>
import Header from "@/Components/Common/Header.vue";
import Footer from "@/Components/Common/Footer.vue";
import InformationStep from "@/Components/Common/InformationStep.vue";
</script>

<template>

   <Header/>
    <div class="flex flex-col items-center w-[400px] mx-auto p-3">
        <InformationStep class="w-full" />
        <div class="p-6 bg-card rounded-lg shadow-md w-full">

            <h1 class="text-xl font-semibold text-primary">FLAM</h1>
            <p class="text-muted-foreground">Former Legislators Association of Mizoram</p>
            <h2 class="mt-4 text-lg font-medium">Kal turte Information</h2>

            <label class="block mt-4 text-sm font-medium text-primary">Applicant Name</label>
            <input type="text" placeholder="Diltu Hming" class="mt-1 p-2 border border-border rounded w-full" />
            <p class="text-muted-foreground text-xs">Must be FLAM member</p>

            <label class="block mt-4 text-sm font-medium text-primary">Gender</label>
            <select class="mt-1 p-2 border border-border rounded w-full">
                <option>Select</option>
                <option>Male</option>
                <option>Female</option>
                <option>Other</option>
            </select>

            <label class="block mt-4 text-sm font-medium text-primary">Designation</label>
            <input type="text" placeholder="Diltu Hnathawh" class="mt-1 p-2 border border-border rounded w-full" />

            <label class="block mt-4 text-sm font-medium text-primary">Contact Number</label>
            <input type="text" placeholder="Phone Number" class="mt-1 p-2 border border-border rounded w-full" />


            <h2 class="mt-4 text-lg font-medium">Family Member</h2>
            <p class="text-muted-foreground text-xs">Must be FLAM member</p>


            <label class="block mt-4 text-sm font-medium text-primary">Name</label>
            <input type="text" placeholder="Name" class="mt-1 p-2 border border-border rounded w-full" />

            <label class="block mt-4 text-sm font-medium text-primary">Relationship</label>
            <select class="mt-1 p-2 border border-border rounded w-full">
                <option>Select</option>
                <option>Wife</option>
                <option>Husband</option>
                <option>Children</option>
                <option>Other</option>
            </select>

            <div class="flex justify-between mt-4">
                <button class="bg-secondary text-secondary-foreground hover:bg-secondary/80 p-2 rounded">+ Add FLAM</button>
                <button class="bg-secondary text-secondary-foreground hover:bg-secondary/80 p-2 rounded">+ Add Family</button>
            </div>


            <div class="flex justify-between mt-6">
                <button @click="$inertia.get(route('step-one'))" class="bg-muted text-muted-foreground hover:bg-muted/80 p-2 rounded border">Back</button>
                <button @click="$inertia.get(route('step-three'))" class="bg-primary text-primary-foreground hover:bg-primary/80 p-2 rounded">Save & Next</button>
            </div>
        </div>
    </div>

   <Footer/>

</template>

<style scoped>

</style>
