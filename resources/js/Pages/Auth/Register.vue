<script setup lang="ts">
import InputError from '@/Components/InputError.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import {Head, Link, useForm} from '@inertiajs/vue3';

const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
});

const submit = () => {
    form.post(route('register'), {
        onFinish: () => {
            form.reset('password', 'password_confirmation');
        },
    });
};
</script>

<template>
    <div class="relative mt-12 w-full max-w-lg sm:mt-10">
        <div class="relative -mb-px h-px w-full bg-gradient-to-r from-transparent via-sky-300 to-transparent"
             bis_skin_checked="1"></div>
        <div
            class="border dark:border-b-white/50 dark:border-t-white/50 border-b-white/20 sm:border-t-white/20 shadow-[20px_0_20px_20px] shadow-slate-500/10 dark:shadow-white/20 rounded-lg border-white/20 border-l-white/20 border-r-white/20 sm:shadow-sm lg:rounded-xl lg:shadow-none">
            <div class="flex flex-col p-6">
                <h3 class="text-xl font-semibold leading-6 tracking-tighter">Register</h3>
            </div>
            <div class="p-6 pt-0">
                <form @submit.prevent="submit">
                    <div
                        class="group relative rounded-lg border focus-within:border-sky-200 px-3 pb-1.5 pt-2.5 duration-200 focus-within:ring focus-within:ring-sky-300/30">
                        <div class="flex justify-between">
                            <label
                                class="text-xs font-medium text-muted-foreground group-focus-within:text-white text-gray-400">Name</label>
                        </div>
                        <TextInput
                            id="name"
                            type="text"
                            v-model="form.name"
                            required
                            autofocus
                            autocomplete="name"
                            class="block w-full border-0 bg-transparent p-0 text-sm file:my-1 file:rounded-full file:border-0 file:bg-accent file:px-4 file:py-2 file:font-medium placeholder:text-muted-foreground/90 focus:outline-none focus:ring-0 sm:leading-7 text-foreground"/>
                        <InputError class="mt-2" :message="form.errors.name"/>
                    </div>

                    <div class="mt-4">
                        <div
                            class="group relative rounded-lg border focus-within:border-sky-200 px-3 pb-1.5 pt-2.5 duration-200 focus-within:ring focus-within:ring-sky-300/30">
                            <div class="flex justify-between">
                                <label
                                    class="text-xs font-medium text-muted-foreground group-focus-within:text-white text-gray-400">Email</label>
                            </div>
                            <TextInput
                                id="email"
                                type="email"
                                v-model="form.email"
                                required
                                autofocus
                                autocomplete="email"
                                class="block w-full border-0 bg-transparent p-0 text-sm file:my-1 file:rounded-full file:border-0 file:bg-accent file:px-4 file:py-2 file:font-medium placeholder:text-muted-foreground/90 focus:outline-none focus:ring-0 sm:leading-7 text-foreground"/>
                            <InputError class="mt-2" :message="form.errors.email"/>
                        </div>
                    </div>

                    <div class="mt-4">
                        <div
                            class="group relative rounded-lg border focus-within:border-sky-200 px-3 pb-1.5 pt-2.5 duration-200 focus-within:ring focus-within:ring-sky-300/30">
                            <div class="flex justify-between">
                                <label
                                    class="text-xs font-medium text-muted-foreground group-focus-within:text-white text-gray-400">Password</label>
                            </div>
                            <div class="flex items-center">
                                <TextInput
                                    id="password"
                                    type="password"
                                    v-model="form.password"
                                    required
                                    autocomplete="current-password"
                                    class="block w-full border-0 bg-transparent p-0 text-sm file:my-1 placeholder:text-muted-foreground/90 focus:outline-none focus:ring-0 focus:ring-teal-500 sm:leading-7 text-foreground"/>
                                <InputError class="mt-2" :message="form.errors.password"/>
                            </div>
                        </div>
                    </div>

                    <div class="mt-4">
                        <div
                            class="group relative rounded-lg border focus-within:border-sky-200 px-3 pb-1.5 pt-2.5 duration-200 focus-within:ring focus-within:ring-sky-300/30">
                            <div class="flex justify-between">
                                <label
                                    class="text-xs font-medium text-muted-foreground group-focus-within:text-white text-gray-400">Confirm
                                    Password</label>
                            </div>
                            <div class="flex items-center">
                                <TextInput
                                    id="password_confirmation"
                                    type="password"
                                    v-model="form.password_confirmation"
                                    required
                                    autocomplete="current-password"
                                    class="block w-full border-0 bg-transparent p-0 text-sm file:my-1 placeholder:text-muted-foreground/90 focus:outline-none focus:ring-0 focus:ring-teal-500 sm:leading-7 text-foreground"/>
                                <InputError class="mt-2" :message="form.errors.password_confirmation"/>
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <PrimaryButton
                            class="ms-4" :class="{ 'opacity-25': form.processing }"
                            :disabled="form.processing">
                            Register
                        </PrimaryButton>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>
