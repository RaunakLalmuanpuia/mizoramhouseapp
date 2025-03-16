
<template>

    <Header/>
    <div class="flex flex-col items-center w-[400px] mx-auto p-3">
        <InformationStep class="w-full" />
        <div class="p-6 bg-card rounded-lg shadow-md w-full">

            <h1 class="text-xl font-semibold text-primary">ON DUTY</h1>
            <p class="text-muted-foreground">Officials travelling for work</p>
            <h2 class="mt-4 text-lg font-medium">Kal turte Information</h2>

            <label class="block mt-4 text-sm font-medium text-primary">Applicant Name</label>
            <input v-model="form.applicant_name" type="text" placeholder="Diltu Hming" class="mt-1 p-2 border border-border rounded w-full" />
            <p class="text-muted-foreground text-xs">Must be FLAM member</p>

            <label class="block mt-4 text-sm font-medium text-primary">Gender</label>
            <select v-model="form.gender" class="mt-1 p-2 border border-border rounded w-full">
                <option>Select</option>
                <option>Male</option>
                <option>Female</option>
                <option>Other</option>
            </select>

            <label class="block mt-4 text-sm font-medium text-primary">Designation</label>
            <input v-model="form.designation"  type="text" placeholder="Diltu Hnathawh" class="mt-1 p-2 border border-border rounded w-full" />


            <label class="block mt-4 text-sm font-medium text-primary">Department</label>
            <input v-model="form.department"  type="text" placeholder="Diltu Hnathawh" class="mt-1 p-2 border border-border rounded w-full" />

            <label class="block mt-4 text-sm font-medium text-primary">Contact Number</label>
            <input v-model="form.contact" type="text" placeholder="Phone Number" class="mt-1 p-2 border border-border rounded w-full" />

            <label class="block mt-4 text-sm font-medium text-primary">Approval</label>
            <input
                type="file"
                @change="handleFileUpload"
                class="mt-1 p-2 border border-border rounded w-full"
            />


            <div v-for="(on_duty, index) in form.on_duty_details" :key="index">
                <label class="block mt-4 text-sm font-medium text-primary">Applicant Name</label>
                <input v-model="on_duty.name" type="text" placeholder="Diltu Hming" class="mt-1 p-2 border border-border rounded w-full" />
                <p class="text-muted-foreground text-xs">Must be FLAM member</p>

                <label class="block mt-4 text-sm font-medium text-primary">Gender</label>
                <select v-model="on_duty.gender" class="mt-1 p-2 border border-border rounded w-full">
                    <option>Select</option>
                    <option>Male</option>
                    <option>Female</option>
                    <option>Other</option>
                </select>

                <label class="block mt-4 text-sm font-medium text-primary">Designation</label>
                <input v-model="on_duty.designation"  type="text" placeholder="Diltu Hnathawh" class="mt-1 p-2 border border-border rounded w-full" />

                <label class="block mt-4 text-sm font-medium text-primary">Department</label>
                <input v-model="on_duty.department"  type="text" placeholder="Diltu Hnathawh" class="mt-1 p-2 border border-border rounded w-full" />

                <label class="block mt-4 text-sm font-medium text-primary">Contact Number</label>
                <input v-model="on_duty.contact" type="text" placeholder="Phone Number" class="mt-1 p-2 border border-border rounded w-full" />


                <label class="block mt-4 text-sm font-medium text-primary">Approval</label>
                <input
                    type="file"
                    @change="(event) => handleFileUploadMore(event, index)"
                    class="mt-1 p-2 border border-border rounded w-full"
                />
                <button @click.prevent="removeFlam(index)">Remove</button>
            </div>



            <h2 class="mt-4 text-lg font-medium">Family Member</h2>
            <p class="text-muted-foreground text-xs">Must be FLAM member</p>

            <div v-for="(family, index) in form.family_details" :key="index">

                <label class="block mt-4 text-sm font-medium text-primary">Name</label>
                <input v-model="family.name" type="text" placeholder="Name" class="mt-1 p-2 border border-border rounded w-full" />

                <label class="block mt-4 text-sm font-medium text-primary">Relationship</label>
                <select v-model="family.relation" class="mt-1 p-2 border border-border rounded w-full">
                    <option>Select</option>
                    <option>Wife</option>
                    <option>Husband</option>
                    <option>Children</option>
                    <option>Other</option>
                </select>
                <button @click.prevent="removeFamily(index)">Remove</button>
            </div>

            <div class="flex justify-between mt-4">
                <button class="bg-secondary text-secondary-foreground hover:bg-secondary/80 p-2 rounded" @click.prevent="addFlam">+ Add FLAM</button>
                <button class="bg-secondary text-secondary-foreground hover:bg-secondary/80 p-2 rounded" @click.prevent="addFamily">+ Add Family</button>
            </div>




            <div class="flex justify-between mt-6">
                <button @click="$inertia.get(route('step-one'))" class="bg-muted text-muted-foreground hover:bg-muted/80 p-2 rounded border">Back</button>
                <!--                <button @click="$inertia.get(route('flam.location-step', { id: application.id }))" class="bg-primary text-primary-foreground p-2 rounded-md">-->
                <!--                    Save & Next-->
                <!--                </button>-->
                <button @click="submit" class="bg-primary text-primary-foreground p-2 rounded-md">
                    Save & Next
                </button>
            </div>
        </div>
    </div>

    <Footer/>

</template>

<script setup>
import Header from "@/Components/Common/Header.vue";
import Footer from "@/Components/Common/Footer.vue";
import InformationStep from "@/Components/Common/InformationStep.vue";
import {router} from "@inertiajs/vue3";
import { useForm } from '@inertiajs/vue3';
import { defineProps, watch } from 'vue';

const props = defineProps({
    application: Object,
});

const form = useForm({
    applicant_name: props.application?.applicant_name || '',
    gender:'',
    designation:'',
    department: '',
    contact: '',
    department_approval:'',

    on_duty_details: [], // Initially empty
    family_details: [], // Initially empty
});
watch(
    () => props.application,
    (newData) => {
        if (newData) {
            form.applicant_name = newData.applicant_name || '';
            form.gender = newData.gender || '';
            form.designation = newData.designation || '';
            form.contact = newData.contact || '';
            form.department = newData.department || '';
            form.on_duty_details = newData.on_duty_details || [];
            form.family_details = newData.family_members || [];
        }
    },
    { immediate: true }
);

const addFlam = () => form.on_duty_details.push({ name: '',gender: '', designation: '' , contact: '', department: '', department_approval:'' });
const removeFlam = (index) => form.on_duty_details.splice(index, 1);


const addFamily = () => form.family_details.push({  name: '', relation: '' });
const removeFamily = (index) => form.family_details.splice(index, 1);

// const submit = () => {
//     form.post(route('apply.store-stepone'), {
//     });
// };


const handleFileUpload = (event) => {
    form.department_approval = event.target.files[0]; // Store the file in form
};

const handleFileUploadMore = (event, index) => {
    if (form.on_duty_details[index]) {
        form.on_duty_details[index].department_approval = event.target.files[0];
    }
};

const submit = () => {
    form.post(route('apply.store-on-duty-steptwo'), {
        data: { application_id: props.application?.id }
    });
};

</script>


<style scoped>

</style>
