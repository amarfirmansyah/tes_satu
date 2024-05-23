<script setup lang="ts">
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head, useForm} from '@inertiajs/vue3';
import {UserCircleIcon} from "@heroicons/vue/24/solid";
import TextInput from "@/Components/TextInput.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import ListBox from "@/Components/ListBox.vue";
import {List} from "@/Interfaces/Component";
import {onMounted, ref} from "vue";
import ProfessionService from "@/Services/profession.service";
import PrimaryButton from "@/Components/PrimaryButton.vue";

onMounted(() => {
    getData()
})

const props = defineProps(['user'])

const data = ref<List[]>([]);
const form = useForm<{
    image: File | null,
    username: string,
    birth: Date | null | string,
    address: string | null,
    phone: string | null,
    profession: Object | null
}>({
    username: props.user.name ?? '',
    birth: props.user.date_of_birth ?? '',
    address: props.user.address ?? '',
    phone: props.user.phone ?? '',
    profession: props.user.profession ?? {name: '-- select --'},
    image: props.user.image ?? null,
})

const imageUrl = ref<string>('')

const getData = () => {
    ProfessionService.get()
        .then(response => {
            data.value = response.data.data
        })
        .catch(err => {
            console.log('error mendapatkan data profesi: ' + err)
        })
}

const submit = () => {
    form.post(route('user.edit', {id: props.user.id}), {
        onSuccess: (response) => {
            console.log(response)
        },
        onFinish: () => {
            form.reset('image')
            alert('data has been updated!')
        }
    })
}

const onFileChange = (event: Event) => {
    const target = event.target as HTMLInputElement;
    if (target.files && target.files.length > 0) {
        form.image = target.files[0];
        imageUrl.value = URL.createObjectURL(form.image);
    }
};

const getUrlImage = (url: string) => {
    return url.replace('public/', '/storage/');
}
</script>

<template>
    <Head title="Dashboard"/>

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Profile</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <form
                    @submit.prevent="submit"
                    enctype="multipart/form-data"
                    class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-10">
                    <h2 class="text-base font-semibold leading-7 text-gray-900">Profile</h2>
                    <p class="mt-1 text-sm leading-6 text-gray-600">This information will be displayed publicly so be
                        careful what you share.</p>

                    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-4">
                        <div class="col-span-2">
                            <div>
                                <InputLabel for="username" value="Username"/>

                                <TextInput
                                    id="username"
                                    type="text"
                                    v-model="form.username"
                                    required
                                    autofocus
                                    class="mt-1 block flex-1 w-full"
                                />
                            </div>
                        </div>

                        <div class="col-span-2">
                            <div>
                                <InputLabel for="birth" value="Date of birth"/>

                                <TextInput
                                    id="birth"
                                    type="date"
                                    v-model="form.birth"
                                    autofocus
                                    class="mt-1 block flex-1 w-full"
                                />
                            </div>
                        </div>

                        <div class="col-span-2">
                            <div>
                                <InputLabel for="address" value="Address"/>

                                <TextInput
                                    id="address"
                                    type="text"
                                    v-model="form.address"
                                    autofocus
                                    class="mt-1 block flex-1 w-full"
                                />
                            </div>
                        </div>

                        <div class="col-span-2">
                            <div>
                                <InputLabel for="phone" value="Phone"/>

                                <TextInput
                                    id="phone"
                                    type="tel"
                                    v-model="form.phone"
                                    autofocus
                                    class="mt-1 block flex-1 w-full"
                                />
                                <InputError class="mt-2" :message="form.errors.phone"/>
                            </div>
                        </div>

                        <div class="sm:col-span-4">
                            <div class="w-1/2 space-y-1.5">
                                <InputLabel for="profession" value="Profession"/>

                                <ListBox
                                    v-model="form.profession"
                                    :data="data"/>
                            </div>
                        </div>

                        <div class="col-span-2">
                            <div>
                                <InputLabel for="photo" value="Avatar"/>

                                <div class="mt-2 flex items-center gap-x-3">
                                    <div v-if="imageUrl" class="h-12 w-12 rounded-full">
                                        <img v-if="imageUrl" :src="imageUrl" alt="Preview">
                                    </div>
                                    <div v-else-if="user.image" class="h-12 w-12 rounded-full">
                                        <img :src='getUrlImage(user.image)' alt="Preview">
                                    </div>
                                    <UserCircleIcon v-else class="h-12 w-12 text-gray-300" aria-hidden="true"/>
                                    <input
                                        type="file"
                                        @input="onFileChange"/>

                                    <InputError class="mt-2" :message="form.errors.image"/>
                                </div>
                            </div>
                        </div>

                        <div>
                        </div>
                    </div>

                    <div class="flex justify-end w-full">
                        <PrimaryButton class="mt-10">Submit</PrimaryButton>
                    </div>
                </form>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
