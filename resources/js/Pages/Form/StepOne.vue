<script setup>
import Header from "@/Components/Common/Header.vue";
import Footer from "@/Components/Common/Footer.vue";
import ApplicationStep from "@/Components/Common/ApplicationStep.vue";

const submit = () => {
    form.post(route('apply.store-stepone'), {
    });
};

</script>

<template>
    <Header/>

    <div class="flex flex-col items-center w-[400px] p-3 mx-auto">
        <ApplicationStep class="w-full" />
        <div class="p-6 bg-background rounded-lg shadow-md w-full">
            <h1 class="text-[16px] font-semibold leading-6 tracking-[0.15px] text-black">Kal Chhan</h1>

            <p class="text-[#B0B0B0] text-[12px] font-medium leading-[18px] tracking-[0.5px] mt-2">
                All reservations are made subject to availability of seats and GAD has no responsibility if accommodation is denied due to non-availability of seats.
            </p>

            <div class="grid grid-cols-2 gap-4 mt-6">
                <div @click="$inertia.post(route('apply.store-stepone'))" class="bg-orange-100 p-4  cursor-pointer hover:bg-orange-200 transition rounded-[14px]">
                    <h2 class="mt-6 text-[18px] font-bold leading-[24px] tracking-[0.15px] text-[#733E15]">
                        FLAM
                    </h2>

                    <p class="text-[12px] font-medium leading-normal text-[#733E15]">
                        Former Legislators Association of Mizoram
                    </p>

                </div>
                <div @click="$inertia.post(route('apply.store-on-duty-stepone'))" class="bg-purple-100 p-4 cursor-pointer hover:bg-purple-200 transition rounded-[14px]">
                    <h2 class="mt-6 text-[18px] font-bold leading-[24px] tracking-[0.15px] text-[#150D72]">
                        ON DUTY
                    </h2>

                    <p class="text-[12px] font-medium text-[#150D72]">
                        Officials traveling for work
                    </p>

                </div>
                <div class="bg-green-100 p-4 cursor-pointer hover:bg-green-200 transition rounded-[14px]">
                    <h2 class="font-semibold">NOT ON DUTY</h2>
                    <p class="text-muted-foreground">Officials traveling for personal reasons</p>
                </div>
                <div class="bg-blue-100 p-4 cursor-pointer hover:bg-blue-200 transition rounded-[14px]">
                    <h2 class="font-semibold text-blue-600">MEDICAL</h2>
                    <p class="text-muted-foreground">Patients referred for treatment</p>
                </div>
                <div class="bg-yellow-100 p-4 cursor-pointer hover:bg-yellow-200 transition rounded-[14px]">
                    <h2 class="font-semibold text-orange-600">PRIVATE</h2>
                    <p class="text-muted-foreground">Non-official personal stay</p>
                </div>
                <div class="bg-red-100 p-4 cursor-pointer hover:bg-red-200 transition rounded-[14px]">
                    <h2 class="font-semibold text-red-800">STUDY TOUR</h2>
                    <p class="text-muted-foreground">Educational group travel</p>
                </div>
            </div>
        </div>
    </div>


  <Footer/>
</template>

<style scoped>

</style>
