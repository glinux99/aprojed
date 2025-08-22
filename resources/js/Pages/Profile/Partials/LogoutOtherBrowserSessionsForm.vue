<script setup>
import { onMounted, ref } from 'vue';
import ActionSection from '@/Components/ActionSection.vue';
import ConfirmationModal from '@/Components/ConfirmationModal.vue';
import DangerButton from '@/Components/DangerButton.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { useForm } from '@inertiajs/vue3';
import { nextTick } from 'vue';

const confirmingLogout = ref(false);
const passwordInput = ref(null);
const closeOtherSessions = ref(false);


const form = useForm({
 password: '',
});


const confirmLogout = () => {
 confirmingLogout.value = true;


 nextTick(() => passwordInput.value.focus());
};


const logoutOtherBrowserSessions = () => {
 form.delete(route('other-browser-sessions.destroy'), {
 preserveScroll: true,
 onSuccess: () => closeModal(),
 onError: () => passwordInput.value.focus(),
 onFinish: () => form.reset(),
 });
};


const closeModal = () => {
 confirmingLogout.value = false;
 form.reset();
};
</script>


<template>
 <ActionSection>
 <template #title>
 Secure All Devices
 </template>


 <template #description>
 If necessary, you may log out of all of your other browser sessions across your devices. Some of your recent sessions are listed below; however, this list may not be exhaustive. If you feel your account has been compromised, you should also update your password.
 </template>


 <template #content>
 <div class="max-w-xl text-sm text-gray-600">
 Please enter your password to confirm you would like to log out of your other browser sessions across your devices.
 </div>


 <div class="mt-5">
 <SecondaryButton @click="confirmLogout">
 Secure All Devices
 </SecondaryButton>
 </div>


 <!-- Logout Other Devices Confirmation Modal -->
 <ConfirmationModal :show="confirmingLogout" @close="closeModal">
 <template #title>
 Secure All Devices
 </template>


 <template #content>
 <div class="mt-4">
 <InputLabel for="password" value="Password" class="sr-only" />


 <TextInput
 id="password"
 ref="passwordInput"
 v-model="form.password"
 type="password"
 class="mt-1 block w-3/4"
 placeholder="Password"
 @keyup.enter="logoutOtherBrowserSessions"
 />


 <InputError :message="form.errors.password" class="mt-2" />
 </div>
 </template>


 <template #footer>
 <SecondaryButton @click="closeModal">
 Cancel
 </SecondaryButton>


 <DangerButton
 class="ms-3"
 :class="{ 'opacity-25': form.processing }"
 :disabled="form.processing"
 @click="logoutOtherBrowserSessions"
 >
 Secure All Devices
 </DangerButton>
 </template>
 </ConfirmationModal>
 </template>
 </ActionSection>
</template>
