<script setup lang="ts">
import { Inertia } from '@inertiajs/inertia';
import { Link } from '@inertiajs/vue3';
import AppLayout from '@/layouts/AppLayout.vue';
import { Button } from '@/components/ui/button';
import { Printer, Download, Plus, Edit, Trash } from 'lucide-vue-next';

const props = defineProps<{ supporters: any[] }>();

const deleteSupporter = (id: number) => {
  if (confirm('Are you sure you want to delete this supporter?')) {
    Inertia.delete(route('supporters.destroy', id));
  }
};

const handlePrint = () => {
  window.open(route('supporters.print'), '_blank');
};

const handleExport = () => {
  window.location.href = route('supporters.export');
};

const breadcrumbs = [
  { title: 'Dashboard', href: '/dashboard' },
  { title: 'Supporters', href: '/dashboard/supporters' },
];
</script>

<template>
  <AppLayout :breadcrumbs="breadcrumbs">
    <div class="p-6">
      <h1 class="text-3xl font-bold mb-6">Supporters</h1>
      
      <!-- Action Buttons -->
      <div class="flex flex-wrap gap-4 mb-6">
        <Button variant="secondary" class="flex items-center gap-2" @click="handlePrint">
          <Printer class="w-5 h-5" />
          <span>Print</span>
        </Button>
        <Button variant="primary" class="flex items-center gap-2" @click="handleExport">
          <Download class="w-5 h-5" />
          <span>Export</span>
        </Button>
        <Link :href="route('supporters.create')" class="inline-flex">
          <Button variant="success" class="flex items-center gap-2">
            <Plus class="w-5 h-5" />
            <span>Add New Supporter</span>
          </Button>
        </Link>
      </div>
  
      <!-- Supporters Table -->
      <div class="overflow-x-auto">
        <table class="min-w-full table-auto border-collapse">
          <thead>
            <tr class="bg-gray-100 dark:bg-gray-800">
              <th class="px-4 py-2 border">Name</th>
              <th class="px-4 py-2 border">Email</th>
              <th class="px-4 py-2 border">Support Type</th>
              <th class="px-4 py-2 border">Contribution</th>
              <th class="px-4 py-2 border">Actions</th>
            </tr>
          </thead>
          <tbody>
            <tr
              v-for="supporter in supporters"
              :key="supporter.id"
              class="hover:bg-gray-50 dark:hover:bg-gray-700"
            >
              <td class="px-4 py-2 border">{{ supporter.name }}</td>
              <td class="px-4 py-2 border">{{ supporter.email }}</td>
              <td class="px-4 py-2 border">{{ supporter.support_type }}</td>
              <td class="px-4 py-2 border">{{ supporter.contribution_amount }}</td>
              <td class="px-4 py-2 border">
                <div class="flex items-center gap-2">
                  <Link :href="route('supporters.edit', supporter.id)" class="inline-flex">
                    <Button variant="warning" class="flex items-center gap-1">
                      <Edit class="w-4 h-4" />
                      <span>Edit</span>
                    </Button>
                  </Link>
                  <Button variant="danger" class="flex items-center gap-1" @click="deleteSupporter(supporter.id)">
                    <Trash class="w-4 h-4" />
                    <span>Delete</span>
                  </Button>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </AppLayout>
</template>
