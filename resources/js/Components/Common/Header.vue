<script setup>

</script>

<template>
    <!--    Header-->
    <div class="bg-white shadow">
        <div class="max-w-7xl mx-auto flex items-center justify-between p-4">
            <div class="flex items-center">
                <img  @click="$inertia.get(route('home'))"  src="/images/icons/app_logo.svg" alt="Mizoram House Emblem" width="240px" height="43px" />

            </div>
            <nav class="flex space-x-4">
                <button @click="$inertia.get(route('home'))" class="text-black font-[500] text-[16px] leading-[24px] tracking-[0.15px] font-sans hover:text-blue-500">Home</button>
                <button @click="$inertia.get(route('step-one'))"  class="text-black font-[500] text-[16px] leading-[24px] tracking-[0.15px] font-sans hover:text-blue-500">Reservation Form</button>
                <button @click="$inertia.get(route('status.index'))" class="text-black font-[500] text-[16px] leading-[24px] tracking-[0.15px] font-sans hover:text-blue-500">Status</button>
                <a href="#" class="text-black font-[500] text-[16px] leading-[24px] tracking-[0.15px] font-sans hover:text-blue-500">FAQs</a>
                <a href="#" class="text-black font-[500] text-[16px] leading-[24px] tracking-[0.15px] font-sans hover:text-blue-500">Download</a>
            </nav>
        </div>
        <div class="border-b border-zinc-300"></div>
    </div>
</template>

<style scoped>

</style>
