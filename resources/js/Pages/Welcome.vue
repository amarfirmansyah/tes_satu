<script setup lang="ts">
import {Head, Link} from '@inertiajs/vue3';
import {Tab, TabGroup, TabList, TabPanel, TabPanels} from "@headlessui/vue";
import Login from "@/Pages/Auth/Login.vue";
import Register from "@/Pages/Auth/Register.vue";

defineProps<{
    canLogin?: boolean;
    canRegister?: boolean;
    laravelVersion: string;
    phpVersion: string;
}>();

function handleImageError() {
    document.getElementById('screenshot-container')?.classList.add('!hidden');
    document.getElementById('docs-card')?.classList.add('!row-span-1');
    document.getElementById('docs-card-content')?.classList.add('!flex-row');
    document.getElementById('background')?.classList.add('!hidden');
}
</script>

<template>
    <Head title="Welcome"/>
    <!-- component -->
    <div class="bg-black text-white flex min-h-screen flex-col items-center pt-16 sm:justify-center sm:pt-0">
        <a href="#">
            <div class="text-foreground tracking-widest font-semibold text-2xl mx-auto flex items-center gap-2">
                Hello..!
                <br>
                Everything looks good. greats!
            </div>
        </a>
        <div class="w-full max-w-md px-2 py-10 sm:px-0">
            <TabGroup>
                <TabList class="flex space-x-1 rounded-xl bg-blue-900/20 p-1">
                    <Tab v-slot="{ selected }"  as="template">
                        <button
                            :class="[
                              'w-full rounded-lg py-2.5 text-sm font-medium leading-5',
                              'ring-white/60 ring-offset-2 ring-offset-blue-400 focus:outline-none focus:ring-2',
                              selected
                                ? 'bg-white text-blue-700 shadow'
                                : 'text-blue-100 hover:bg-white/[0.12] hover:text-white',
                            ]"
                        >
                            Login
                        </button>
                    </Tab>
                    <Tab v-slot="{ selected }"  as="template">
                        <button
                            :class="[
                              'w-full rounded-lg py-2.5 text-sm font-medium leading-5',
                              'ring-white/60 ring-offset-2 ring-offset-blue-400 focus:outline-none focus:ring-2',
                              selected
                                ? 'bg-white text-blue-700 shadow'
                                : 'text-blue-100 hover:bg-white/[0.12] hover:text-white',
                            ]"
                        >
                            Register
                        </button>
                    </Tab>
                </TabList>
                <TabPanels class="mt-2">
                    <TabPanel>
                        <Login />
                    </TabPanel>
                    <TabPanel>
                        <Register />
                    </TabPanel>
                </TabPanels>
            </TabGroup>
        </div>
    </div>
</template>
