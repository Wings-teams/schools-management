<script setup lang="ts">
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';

defineProps<{
    modelValue?: File | null;
    existingFile?: string;
    error?: string;
}>();

defineEmits<{
    (e: 'update:modelValue', value: File | null): void;
}>();
</script>

<template>
    <div>
        <InputLabel
            v-if="existingFile"
            :value="`Current: ${existingFile}`"
            class="mb-2"
        />
        <input
            type="file"
            class="block w-full cursor-pointer rounded-md border border-gray-300 text-sm text-gray-900 file:mr-4 file:rounded-l-md file:border-0 file:bg-gray-100 file:px-4 file:py-2 file:text-sm file:font-semibold file:text-gray-700 hover:file:bg-gray-200 focus:outline-none dark:border-gray-600 dark:bg-gray-700 dark:text-gray-400 dark:file:bg-gray-600 dark:file:text-gray-200 dark:hover:file:bg-gray-500"
            @input="
               $emit('update:modelValue', ($event.target as HTMLInputElement)?.files?.[0] || null)
            "
        />
        <InputError :message="error" class="mt-2" />
    </div>
</template>
