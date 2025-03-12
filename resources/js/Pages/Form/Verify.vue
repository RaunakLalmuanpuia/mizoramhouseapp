<script setup>
import Header from "@/Components/Common/Header.vue";
import Footer from "@/Components/Common/Footer.vue";
</script>

<template>
    <Header/>


    <div class="flex flex-col items-center  min-h-screen bg-background p-4">
        <div class="w-[412px] h-[273px] border border-border bg-card rounded-lg p-6 shadow-md flex flex-col items-center">
            <h2 class="text-lg font-semibold text-foreground">Enter OTP to verify</h2>
            <p class="text-muted-foreground mb-4">An OTP has been sent to 97666 44441 (Edit)</p>

            <div class="flex space-x-2 mb-4">
                <input type="text" maxlength="1" class="w-12 h-12 text-center border border-border rounded-lg" />
                <input type="text" maxlength="1" class="w-12 h-12 text-center border border-border rounded-lg" />
                <input type="text" maxlength="1" class="w-12 h-12 text-center border border-border rounded-lg" />
                <input type="text" maxlength="1" class="w-12 h-12 text-center border border-border rounded-lg" />
            </div>

            <p class="text-sm text-muted-foreground mb-4">
                Did not get the OTP?
                <a href="#" class="text-primary hover:underline">Resend</a> 2:00
            </p>
        </div>

        <button class="mt-4 bg-black text-white hover:bg-secondary/80 px-4 py-2 rounded-lg">
            Verify
        </button>
    </div>

    <Footer/>

</template>

<style scoped>

</style>
