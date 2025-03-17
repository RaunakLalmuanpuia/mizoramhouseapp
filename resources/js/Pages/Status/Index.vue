<script setup>
import Header from "@/Components/Common/Header.vue";
import Footer from "@/Components/Common/Footer.vue";
</script>

<template>
    <Header/>
    <div class="w-full max-w-[412px] bg-[#654829] border border-[#EEE] rounded-[10px] shadow-lg p-6 mt-4 mx-auto overflow-hidden">
        <p class="text-[18px] sm:text-[20px] font-semibold leading-[20px] tracking-[0.25px] text-white font-['Noto_Sans'] text-center">
            Check for Status
        </p>

        <div class="mt-4 py-4">
            <label class="block text-[14px] font-medium leading-[20px] tracking-[0.1px] text-white py-2" for="application-id">
                Application ID
            </label>

            <input type="text" id="application-id" placeholder="Enter Application ID"
                   class="w-full p-2 border border-[#DCDCDC] rounded-[4px]
               bg-[rgba(255,255,255,0.08)] text-[#EEE] font-['Noto_Sans'] text-[14px]
               font-normal leading-[20px] tracking-[0.25px] placeholder:text-[#EEE]"/>
        </div>

        <div class="flex flex-col sm:flex-row justify-between mt-4 gap-4">
            <!-- View Button -->
            <button class="flex justify-center items-center gap-2 w-full sm:w-auto min-w-[104px] px-4 py-2
           border border-[#EFF6FF] rounded-lg bg-secondary text-[#EFF6FF]
           hover:bg-secondary/80 text-center font-['Noto_Sans'] text-[14px]
           font-medium leading-[20px] tracking-[0.1px]">
                View
            </button>

            <!-- Submit Button -->
            <button class="flex justify-center items-center gap-2 px-6 py-2 w-full sm:w-auto min-w-[104px]
           bg-white text-[#2B2B2B] border border-[#EFF6FF] rounded-lg
           hover:bg-gray-100 text-center font-['Noto_Sans'] text-[14px]
           font-medium leading-[20px] tracking-[0.1px]">
                Submit
            </button>
        </div>
    </div>

    <div class="w-full max-w-[412px] h-auto min-h-[472px] bg-white border border-[#EEE] rounded-[10px] shadow-lg p-6 mt-6 mx-auto overflow-hidden">
        <div class="mt-6 text-muted-foreground">
            <p class="text-[#313033] font-['Noto_Sans'] text-[12px] font-normal leading-none">
                Status: <span class="font-medium">Form Submitted; sending for verification</span>
            </p>

            <p class="text-[#313033] font-['Noto_Sans'] text-[12px] font-normal leading-none">
                Applied Date: <span class="text-black font-medium">07-Feb-2025</span>
            </p>

            <p class="text-[#313033] font-['Noto_Sans'] text-[12px] font-normal leading-none">
                Application ID: <span class="text-black font-medium">1635716371</span>
            </p>
<!--            <p> <span class="font-medium"></span></p>-->
        </div>
        <div class="mt-6">
            <h3 class="text-md font-semibold text-foreground">Current Status</h3>
            <div class="relative mt-2">
                <div class="absolute left-0 top-0 h-full border-l-2 border-muted"></div>
                <div class="flex items-center mb-4">
                    <div class="w-4 h-4 rounded-full bg-accent"></div>
                    <div class="ml-2">
                        <p class="font-medium">Reservation Form Submitted</p>
                        <p class="text-sm text-muted-foreground">The Mizoram House reservation form has been submitted. Please wait for confirmation.</p>
                        <p class="text-xs text-muted-foreground">2025-02-07 | 13:05</p>
                    </div>
                </div>
                <div class="flex items-center">
                    <div class="w-4 h-4 rounded-full border-2 border-muted"></div>
                    <div class="ml-2">
                        <p class="font-medium">Confirmed</p>
                        <p class="text-sm text-muted-foreground">Your reservation form has been successfully confirmed.</p>
                    </div>
                </div>
            </div>
            <button class="mt-4 bg-primary text-primary-foreground hover:bg-primary/80 p-2 rounded">View Detail</button>
        </div>
    </div>
    <Footer/>
</template>

<style scoped>

</style>
