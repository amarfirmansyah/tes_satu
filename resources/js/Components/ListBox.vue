<template>
    <Listbox v-model="selected">
        <ListboxButton
            class="w-full border border-gray-300 py-2.5 cursor-default rounded-lg bg-white pl-3 pr-3 text-left flex justify-between sm:text-sm">
            {{ selected.name }}
            <ChevronUpDownIcon
                class="h-5 w-5 text-gray-800"
            />
        </ListboxButton>
        <transition
            leave-active-class="transition duration-100 ease-in"
            leave-from-class="opacity-100"
            leave-to-class="opacity-0"
        >
            <ListboxOptions
                class="absolute mt-1 max-h-60 w-fit overflow-auto rounded-md bg-white py-1 text-base shadow-lg ring-1 ring-black/5 focus:outline-none sm:text-sm">
                <ListboxOption
                    v-for="item in data"
                    :key="item.id"
                    :value="item"
                    as="template"
                    v-slot="{ active, selected }">
                    <li
                        :class="[
                              active ? 'bg-gray-800 text-white' : 'text-gray-900',
                              'relative cursor-default select-none py-2 pl-10 pr-4',
                            ]">
                        <div
                            :class="[
                                selected ? 'font-medium' : 'font-normal',
                                'block truncate',
                              ]">
                            {{ item.name }}
                        </div>
                        <div
                            v-if="selected"
                            class="absolute inset-y-0 left-0 flex items-center pl-3 text-amber-600">
                            <CheckIcon class="h-5 w-5" aria-hidden="true"/>
                        </div>
                    </li>

                </ListboxOption>
            </ListboxOptions>
        </transition>
    </Listbox>
</template>

<script setup lang="ts">
import {PropType, ref, watch} from 'vue'
import {List} from "@/Interfaces/Component";
import {ChevronUpDownIcon, CheckIcon} from "@heroicons/vue/24/solid"
import {
    Listbox,
    ListboxButton,
    ListboxOptions,
    ListboxOption,
} from '@headlessui/vue'

const emit = defineEmits(['update:modelValue'])
const props = defineProps({
    data: {
        type: Array as PropType<List[]>,
        required: true
    },
    modelValue: {
        type: Object as PropType<List>,
        required: true,
    }
});

const selected = ref<List>(props.modelValue)

watch(() => selected.value, (newVal) => {
    emit('update:modelValue', newVal)
})

</script>
