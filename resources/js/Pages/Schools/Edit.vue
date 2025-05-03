<script setup lang="ts">
import FileInput from '@/Components/FileInput.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Link, useForm } from '@inertiajs/vue3';

const props = defineProps<{
    school: {
        id: number;
        app_icon: string;
        name: string;
        domain: string;
        school_id: string;
    };
}>();

const form = useForm({
    app_icon: null as File | null,
    name: props.school.name,
    domain: props.school.domain,
    school_id: props.school.school_id,
});

const submit = () => {
    form.post(
        route('schools.update', { school: props.school.id, _method: 'put' }),
        {
            forceFormData: true,
            preserveScroll: true,
        },
    );
};
</script>

<template>
    <AuthenticatedLayout>
        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div
                    class="bg-white p-6 shadow-sm sm:rounded-lg dark:bg-gray-800"
                >
                    <h1
                        class="mb-6 text-2xl font-semibold text-gray-900 dark:text-gray-100"
                    >
                        Edit School
                    </h1>

                    <form @submit.prevent="submit" class="space-y-6">
                        <div>
                            <InputLabel value="App Icon" />
                            <FileInput
                                v-model="form.app_icon"
                                class="mt-1 block w-full"
                                :existing-file="school.app_icon"
                            />
                            <InputError
                                :message="form.errors.app_icon"
                                class="mt-2"
                            />
                        </div>

                        <div>
                            <InputLabel value="Name" />
                            <TextInput
                                v-model="form.name"
                                class="mt-1 block w-full"
                                required
                            />
                            <InputError
                                :message="form.errors.name"
                                class="mt-2"
                            />
                        </div>

                        <div>
                            <InputLabel value="Domain" />
                            <TextInput
                                v-model="form.domain"
                                class="mt-1 block w-full"
                                required
                            />
                            <InputError
                                :message="form.errors.domain"
                                class="mt-2"
                            />
                        </div>

                        <div>
                            <InputLabel value="Identifier" />
                            <TextInput
                                v-model="form.school_id"
                                class="mt-1 block w-full"
                                required
                            />
                            <InputError
                                :message="form.errors.school_id"
                                class="mt-2"
                            />
                        </div>

                        <div class="flex items-center justify-end gap-4">
                            <Link
                                :href="
                                    route('schools.show', { school: school.id })
                                "
                                class="text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-gray-100"
                            >
                                Cancel
                            </Link>
                            <PrimaryButton :disabled="form.processing">
                                Update School
                            </PrimaryButton>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
