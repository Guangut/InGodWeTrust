<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';
import PlaceholderPattern from '../components/PlaceholderPattern.vue';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: '/dashboard',
    },
];

defineProps<{
    name?: string;
}>();
</script>

<template>
    <Head title="Dashboard" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">
            <div class="grid auto-rows-min gap-4 md:grid-cols-3">
                <div class="relative aspect-video overflow-hidden rounded-xl border border-sidebar-border/70 dark:border-sidebar-border">
                    <PlaceholderPattern />
                    <p class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-center text-sm text-gray-500 dark:text-gray-400">
                        This is a placeholder for the main content of the dashboard.</p>
                </div>
                <div class="relative aspect-video overflow-hidden rounded-xl border border-sidebar-border/70 dark:border-sidebar-border">
                    <PlaceholderPattern />
                    <p class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-center text-sm text-gray-500 dark:text-gray-400">
                        This is a placeholder for the main content of the dashboard.</p>
                </div>
                <div class="relative aspect-video overflow-hidden rounded-xl border border-sidebar-border/70 dark:border-sidebar-border">
                    <PlaceholderPattern />
                    <p class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-center text-sm text-gray-500 dark:text-gray-400">
                        This is a placeholder for the main content of the dashboard.</p>
                </div>
            </div>
            <div class="relative min-h-[100vh] flex-1 rounded-xl border border-sidebar-border/70 dark:border-sidebar-border md:min-h-min">
                <PlaceholderPattern />
                <p class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-center text-sm text-gray-500 dark:text-gray-400">
                    This is a placeholder for the main content of the dashboard.</p>
            </div>
            <!-- ✅ Add Supporters Section -->
<div class="p-4 bg-white dark:bg-gray-900 rounded-lg shadow-md border border-sidebar-border/70">
    <h2 class="text-xl font-semibold mb-2 text-gray-800 dark:text-gray-200">Supporters</h2>
    <p class="text-gray-600 dark:text-gray-400">Manage and view all supporters.</p>
    <inertia-link href="/dashboard/supporters" class="btn btn-primary mt-2">
        View Supporters
    </inertia-link>
</div>
        </div>
    </AppLayout>
</template>
