<script setup>
import { Head, Link } from '@inertiajs/vue3';
import Header from "@/Components/Common/Header.vue";
import Footer from "@/Components/Common/Footer.vue";

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
});
</script>

<template>
    <Head title="Welcome" />

    <Header/>

    <div style="background: #1F3652;" class=" p-8 flex flex-col md:flex-row text-white">
        <div class="md:w-1/2">
            <h1 class="text-3xl font-bold">Chibai! Kan lo lawm a che!</h1>
            <p class="text-lg text-muted-foreground">Effortless Reservations, Peaceful Stays<br />Mizoram House for You</p>
        </div>
        <div class="md:w-1/2 mt-6 flex space-x-4 justify-end">
            <div class="bg-blue-800 text-primary-foreground p-4 rounded-lg shadow-md flex flex-col justify-between">
                <h2 class="text-xl font-semibold">Form</h2>
                <p class="text-muted-foreground">Reservation Form</p>
                <button class="mt-2 text-right">
                    <span>&gt;</span>
                </button>
            </div>
            <div class="bg-yellow-200 text-accent-foreground p-4 rounded-lg shadow-md flex flex-col justify-between">
                <h2 class="text-xl font-semibold">Status</h2>
                <p class="text-muted-foreground">Check for Status</p>
                <button class="mt-2 text-right">
                    <span>&gt;</span>
                </button>
            </div>
        </div>
    </div>



    <div class="flex flex-col md:flex-row justify-center items-stretch gap-2 md:gap-4 p-6 bg-card">
        <div class="w-full max-w-md p-4 flex flex-col bg-card rounded-lg shadow-md">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 flex-grow">
                <div class="p-4 border rounded-lg bg-card text-foreground">
                    <h2 class="font-bold text-lg">On Duty & Not On Duty</h2>
                </div>
                <div class="p-4 border rounded-lg bg-card text-foreground">
                    <h2 class="font-bold text-lg">Medical Study Tour Private</h2>
                </div>
                <div class="col-span-1 md:col-span-2 p-4 border rounded-lg bg-card text-foreground">
                    <h2 class="font-bold text-xl">General Requirements (For All Applicants)</h2>
                </div>
                <div class="p-4 border rounded-lg bg-card text-foreground">
                    <h2 class="font-bold text-lg">Special Concessions & Conditions</h2>
                </div>
                <div class="p-4 border rounded-lg bg-card text-foreground">
                    <h2 class="font-bold text-lg">Before Entering Mizoram House</h2>
                </div>
            </div>
        </div>
        <div class="w-full max-w-md p-6 bg-card rounded-lg shadow-md flex flex-col h-full">
            <h2 class="text-lg font-semibold mb-4">General Requirements (For All Applicants)</h2>
            <hr class="border-b border-border mb-4" />
            <ol class="list-decimal list-inside space-y-2 flex-grow">
                <li><span class="font-medium">Valid Identity Card :</span> Required for all guests at check-in and bill payment.</li>
                <li><span class="font-medium">Room Availability :</span> Booking is subject to room availability.</li>
                <li><span class="font-medium">Room Rent :</span> Charges vary based on category (On Duty, Not On Duty, Medical, Private).</li>
                <li><span class="font-medium">Extra Bed Charges :</span> ₹100 per extra bed/mattress per night.</li>
                <li>
                    <span class="font-medium">Transit Stay Charges :</span>
                    <ul class="list-disc list-inside ml-4 space-y-1">
                        <li>Up to 3 hours : 20% of normal room rent.</li>
                        <li>3 to 10 hours : 50% of normal room rent.</li>
                        <li>More than 10 hours : Full-day charge.</li>
                    </ul>
                </li>
            </ol>
        </div>
    </div>


    <div style="background: #F8F8F8;" class="flex flex-col md:flex-row justify-center items-center p-6 space-y-4 md:space-y-0 md:space-x-4">
        <div class="w-full max-w-md bg-background p-4 rounded-lg shadow-md">
            <h2 class="text-lg font-semibold">Application Statistics</h2>
            <div class="grid grid-cols-2 gap-4 mt-4">
                <div class="bg-white p-4 rounded-lg shadow">
                    <p class="text-xl font-bold">10,30,987</p>
                    <p class="text-muted-foreground">Submitted</p>
                </div>
                <div class="bg-white p-4 rounded-lg shadow">
                    <p class="text-xl font-bold">6,12,340</p>
                    <p class="text-muted-foreground">Approved</p>
                </div>
            </div>
            <h2 class="text-lg font-semibold mt-6">Category Statistics</h2>
            <div class="grid grid-cols-2 gap-4 mt-4">
                <div class="bg-orange-100 p-4 rounded-lg shadow">
                    <p class="text-xl font-bold">10,30,987</p>
                    <p class="text-muted-foreground">FLAM</p>
                </div>
                <div class="bg-purple-100 p-4 rounded-lg shadow">
                    <p class="text-xl font-bold">6,12,340</p>
                    <p class="text-muted-foreground">On Duty</p>
                </div>
                <div class="bg-green-100 p-4 rounded-lg shadow">
                    <p class="text-xl font-bold">1,007</p>
                    <p class="text-muted-foreground">Not on Duty</p>
                </div>
                <div class="bg-blue-100 p-4 rounded-lg shadow">
                    <p class="text-xl font-bold">987</p>
                    <p class="text-muted-foreground">Medical</p>
                </div>
                <div class="bg-red-100 p-4 rounded-lg shadow">
                    <p class="text-xl font-bold">1,007</p>
                    <p class="text-muted-foreground">Private</p>
                </div>
                <div class="bg-pink-100 p-4 rounded-lg shadow">
                    <p class="text-xl font-bold">987</p>
                    <p class="text-muted-foreground">Study Tour</p>
                </div>
            </div>
        </div>

        <div  class="w-full max-w-md bg-card p-4 rounded-lg shadow-md">
            <h2 class="text-lg font-semibold">
                Mizoram House Online Reservation chungchang a zawhna leh chhana tlanglawn
            </h2>
            <div class="mt-4 space-y-2">
                <div class="flex justify-between items-center p-2 border-b border-border">
                    <span>Mizoram House Online Reservation hi tu te in nge dil thei?</span>
                    <button class="text-primary">+</button>
                </div>
                <div class="flex justify-between items-center p-2 border-b border-border">
                    <span>Lorem Ipsum zawhna 1?</span>
                    <button class="text-primary">+</button>
                </div>
                <div class="flex justify-between items-center p-2 border-b border-border">
                <span>
                    Lorem Ipsum zawhna lorem Ipsum zawhna lorem Ipsum zawhna 2?
                </span>
                    <button class="text-primary">+</button>
                </div>
                <div class="flex justify-between items-center p-2 border-b border-border">
                    <span>Lorem Ipsum zawhna lorem 3?</span>
                    <button class="text-primary">+</button>
                </div>
                <div class="flex justify-between items-center p-2 border-b border-border">
                    <span>Lorem Ipsum zawhna lorem 4?</span>
                    <button class="text-primary">+</button>
                </div>
                <div class="flex justify-between items-center p-2 border-b border-border">
                    <span>Lorem Ipsum zawhna lorem 5?</span>
                    <button class="text-primary">+</button>
                </div>
                <div class="flex justify-between items-center p-2 border-b border-border">
                <span>
                    Lorem Ipsum zawhna lorem Ipsum zawhna lorem Ipsum zawhna 6?
                </span>
                    <button class="text-primary">+</button>
                </div>
            </div>
        </div>
    </div>


    <Footer/>



</template>

<style>
.bg-dots-darker {
    background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(0,0,0,0.07)'/%3E%3C/svg%3E");
}
@media (prefers-color-scheme: dark) {
    .dark\:bg-dots-lighter {
        background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(255,255,255,0.07)'/%3E%3C/svg%3E");
    }
}
</style>
