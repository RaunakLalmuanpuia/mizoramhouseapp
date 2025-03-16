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
            <p class="text-white font-sans text-[25px] font-[600] leading-normal">
                Chibai! Kan lo lawm a che!
            </p>

            <p class="text-white font-sans text-[14px] font-normal leading-[20px] tracking-[0.25px]">
                Effortless Reservations, Peaceful Stays<br />Mizoram House for You
            </p>

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
                    <p class="text-[#1F3652] font-sans text-[18px] font-bold leading-[23px] tracking-[0.15px]">
                        On Duty & Not On Duty
                    </p>
                </div>
                <div class="p-4 border rounded-lg bg-card text-foreground">
                    <p class="text-[#1F3652] font-sans text-[18px] font-bold leading-[23px] tracking-[0.15px]">
                        Medical Study Tour Private
                    </p>

                </div>
                <div class="col-span-1 md:col-span-2 p-4 border rounded-lg bg-card text-foreground">
                    <p class="text-[#1F3652] font-sans text-[18px] font-bold leading-[23px] tracking-[0.15px]">
                        General Requirements (For All Applicants)
                    </p>
                </div>
                <div class="p-4 border rounded-lg bg-card text-foreground">
                    <p class="text-[#1F3652] font-sans text-[18px] font-bold leading-[23px] tracking-[0.15px]">
                        Special Concessions & Conditions
                    </p>

                </div>
                <div class="p-4 border rounded-lg bg-card text-foreground">
                    <p class="text-[#1F3652] font-sans text-[18px] font-bold leading-[23px] tracking-[0.15px]">
                        Before Entering Mizoram House
                    </p>

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
            <p class="text-black font-sans text-[20px] font-bold leading-[24px] tracking-[0.15px]">
                Application Statistics
            </p>

            <div class="grid grid-cols-2 gap-4 mt-4">
                <div class="w-[196px] h-[88px] flex-shrink-0 rounded-[14px] border border-[#EEE] bg-white p-4 shadow">

                <p class="text-[rgba(2,2,2,0.87)] font-sans text-[20px] font-bold leading-[23px] tracking-[0.15px]">
                        10,30,987
                    </p>

                    <p class="text-[#262526] font-sans text-[12px] font-normal leading-[18px]">
                        Submitted
                    </p>

                </div>
                <div class="w-[196px] h-[88px] flex-shrink-0 rounded-[14px] border border-[#EEE] bg-white p-4 shadow">
                    <p class="text-[rgba(2,2,2,0.87)] font-sans text-[20px] font-bold leading-[23px] tracking-[0.15px]">
                        6,12,340
                    </p>

                    <p class="text-[#262526] font-sans text-[12px] font-normal leading-[18px]">
                        Approved
                    </p>

                </div>
            </div>
            <p class="text-[20px] font-bold leading-[24px] text-black font-sans mt-6">
                Category Statistics
            </p>

            <div class="grid grid-cols-2 gap-4 mt-4">
                <div class="bg-orange-100 p-4 rounded-lg shadow">
                    <p class="text-[20px] font-bold leading-[23px] text-[#733E15] font-sans">
                        10,30,987
                    </p>

                    <p class="text-[12px] font-normal leading-[18px] text-[#733E15] font-sans">
                        FLAM
                    </p>

                </div>
                <div class="bg-purple-100 p-4 rounded-lg shadow">
                    <p class="text-[20px] font-bold leading-[23px] text-[#409B16] font-sans">
                        6,12,340
                    </p>

                    <p class="text-[12px] font-normal leading-[18px] text-[#150D72] font-sans">
                        On Duty
                    </p>

                </div>
                <div class="bg-green-100 p-4 rounded-lg shadow">
                    <p class="text-[20px] font-bold leading-[23px] text-[#409B16] font-sans">
                        1,007
                    </p>

                    <p class="text-[12px] font-normal leading-[18px] text-[#409B16] font-sans">
                        Not on Duty
                    </p>

                </div>
                <div class="bg-blue-100 p-4 rounded-lg shadow">
                    <p class="text-[20px] font-bold leading-[23px] text-[#0073FF] font-sans">
                        987
                    </p>

                    <p class="text-[12px] font-normal leading-[18px] text-[#0073FF] font-sans">
                        Medical
                    </p>

                </div>
                <div class="bg-red-100 p-4 rounded-lg shadow">
                    <p class="text-[20px] font-bold leading-[23px] text-[#FF8C00] font-sans">
                        1,007
                    </p>

                    <p class="text-[12px] font-normal leading-[18px] text-[#FF8C00] font-sans">
                        Private
                    </p>

                </div>
                <div class="bg-pink-100 p-4 rounded-lg shadow">
                    <p class="text-[20px] font-bold leading-[23px] text-[#DD4939] font-sans">
                        987
                    </p>

                    <p class="text-[12px] font-normal leading-[18px] text-[#DD4939] font-sans">
                        Study Tour
                    </p>

                </div>
            </div>
        </div>

        <div  class="w-full max-w-md bg-card p-4 rounded-lg shadow-md">
            <p class=" text-black font-sans text-[20px] font-bold leading-[24px] tracking-[0.15px]">
                Mizoram House Online Reservation chungchang a zawhna leh chhana tlanglawn
            </p>

            <div class="mt-4 space-y-2">
                <div class="flex justify-between items-center p-2 border-b border-border">
                    <p class="text-[#262526] font-sans text-[12px] font-normal leading-[18px]">
                        Mizoram House Online Reservation hi tu te in nge dil thei?
                    </p>
                    <button class="text-primary">+</button>
                </div>
                <div class="flex justify-between items-center p-2 border-b border-border">
                    <p class="text-[#262526] font-sans text-[12px] font-normal leading-[18px]">
                        Lorem Ipsum zawhna 1?
                    </p>

                    <button class="text-primary">+</button>
                </div>
                <div class="flex justify-between items-center p-2 border-b border-border">
                    <p class="text-[#262526] font-sans text-[12px] font-normal leading-[18px]">
                        Lorem Ipsum zawhna 2?
                    </p>
                    <button class="text-primary">+</button>
                </div>
                <div class="flex justify-between items-center p-2 border-b border-border">
                    <p class="text-[#262526] font-sans text-[12px] font-normal leading-[18px]">
                        Lorem Ipsum zawhna 3?
                    </p>
                    <button class="text-primary">+</button>
                </div>
                <div class="flex justify-between items-center p-2 border-b border-border">
                    <p class="text-[#262526] font-sans text-[12px] font-normal leading-[18px]">
                        Lorem Ipsum zawhna 4?
                    </p>
                    <button class="text-primary">+</button>
                </div>
                <div class="flex justify-between items-center p-2 border-b border-border">
                    <p class="text-[#262526] font-sans text-[12px] font-normal leading-[18px]">
                        Lorem Ipsum zawhna 5?
                    </p>
                    <button class="text-primary">+</button>
                </div>
                <div class="flex justify-between items-center p-2 border-b border-border">
                    <p class="text-[#262526] font-sans text-[12px] font-normal leading-[18px]">
                        Lorem Ipsum zawhna 6?
                    </p>
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
