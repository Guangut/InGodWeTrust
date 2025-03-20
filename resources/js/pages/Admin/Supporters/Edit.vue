<script setup lang="ts">
import { useForm } from '@inertiajs/inertia-vue3';
import AppLayout from '@/layouts/AppLayout.vue';
import { Button } from '@/components/ui/button';
import { Edit, Download } from 'lucide-vue-next';

interface Supporter {
  id: number;
  name: string;
  age: number;
  gender: string;
  address: string;
  phone_number: string;
  email: string;
  support_type: string;
  contribution_amount: number;
  commit_duration: number;
  start_date: string;
  bank_details: string;
  testimonial_content?: string;
  photo_url?: string;
}

const props = defineProps<{ supporter: Supporter }>();

const form = useForm({
  name: props.supporter.name || '',
  age: props.supporter.age || '',
  gender: props.supporter.gender || '',
  address: props.supporter.address || '',
  phone_number: props.supporter.phone_number || '',
  email: props.supporter.email || '',
  support_type: props.supporter.support_type || '',
  contribution_amount: props.supporter.contribution_amount || '',
  commit_duration: props.supporter.commit_duration || '',
  start_date: props.supporter.start_date || '',
  bank_details: props.supporter.bank_details || '',
  testimonial_content: props.supporter.testimonial_content || '',
  photo_url: props.supporter.photo_url || '',
  photo: null,
});

const handleFileUpload = (e: Event) => {
  const target = e.target as HTMLInputElement;
  if (target.files) {
    form.photo = target.files[0];
  }
};

const submit = () => {
  form.post(route('supporters.update', props.supporter.id), {
    _method: 'put',
    forceFormData: true,
  });
};

const breadcrumbs = [
  { title: 'Dashboard', href: '/dashboard' },
  { title: 'Supporters', href: '/dashboard/supporters' },
  { title: 'Edit Supporter', href: `/dashboard/supporters/${props.supporter.id}/edit` },
];
</script>

<template>
  <AppLayout :breadcrumbs="breadcrumbs">
    <div class="p-6 space-y-6">
      <h1 class="text-3xl font-bold">Edit Supporter</h1>
      <form @submit.prevent="submit" enctype="multipart/form-data" class="space-y-4">
        <!-- Name -->
        <div>
          <label class="block mb-1">Name</label>
          <input v-model="form.name" type="text" class="input input-bordered w-full" placeholder="Enter name" />
          <span v-if="form.errors.name" class="text-red-500">{{ form.errors.name }}</span>
        </div>
        <!-- Age -->
        <div>
          <label class="block mb-1">Age</label>
          <input v-model="form.age" type="number" class="input input-bordered w-full" placeholder="Enter age" />
          <span v-if="form.errors.age" class="text-red-500">{{ form.errors.age }}</span>
        </div>
        <!-- Gender -->
        <div>
          <label class="block mb-1">Gender</label>
          <select v-model="form.gender" class="select select-bordered w-full">
            <option value="">Select Gender</option>
            <option value="male">Male</option>
            <option value="female">Female</option>
            <option value="other">Other</option>
          </select>
          <span v-if="form.errors.gender" class="text-red-500">{{ form.errors.gender }}</span>
        </div>
        <!-- Address -->
        <div>
          <label class="block mb-1">Address</label>
          <textarea v-model="form.address" class="textarea textarea-bordered w-full" placeholder="Enter address"></textarea>
          <span v-if="form.errors.address" class="text-red-500">{{ form.errors.address }}</span>
        </div>
        <!-- Phone Number -->
        <div>
          <label class="block mb-1">Phone Number</label>
          <input v-model="form.phone_number" type="text" class="input input-bordered w-full" placeholder="Enter phone number" />
          <span v-if="form.errors.phone_number" class="text-red-500">{{ form.errors.phone_number }}</span>
        </div>
        <!-- Email -->
        <div>
          <label class="block mb-1">Email</label>
          <input v-model="form.email" type="email" class="input input-bordered w-full" placeholder="Enter email" />
          <span v-if="form.errors.email" class="text-red-500">{{ form.errors.email }}</span>
        </div>
        <!-- Support Type -->
        <div>
          <label class="block mb-1">Support Type</label>
          <input v-model="form.support_type" type="text" class="input input-bordered w-full" placeholder="Enter support type" />
          <span v-if="form.errors.support_type" class="text-red-500">{{ form.errors.support_type }}</span>
        </div>
        <!-- Contribution Amount -->
        <div>
          <label class="block mb-1">Contribution Amount</label>
          <input v-model="form.contribution_amount" type="number" step="0.01" class="input input-bordered w-full" placeholder="Enter amount" />
          <span v-if="form.errors.contribution_amount" class="text-red-500">{{ form.errors.contribution_amount }}</span>
        </div>
        <!-- Commit Duration -->
        <div>
          <label class="block mb-1">Commit Duration (months)</label>
          <input v-model="form.commit_duration" type="number" class="input input-bordered w-full" placeholder="Enter duration" />
          <span v-if="form.errors.commit_duration" class="text-red-500">{{ form.errors.commit_duration }}</span>
        </div>
        <!-- Start Date -->
        <div>
          <label class="block mb-1">Start Date</label>
          <input v-model="form.start_date" type="date" class="input input-bordered w-full" />
          <span v-if="form.errors.start_date" class="text-red-500">{{ form.errors.start_date }}</span>
        </div>
        <!-- Bank Details -->
        <div>
          <label class="block mb-1">Bank Details</label>
          <textarea v-model="form.bank_details" class="textarea textarea-bordered w-full" placeholder="Enter bank details"></textarea>
          <span v-if="form.errors.bank_details" class="text-red-500">{{ form.errors.bank_details }}</span>
        </div>
        <!-- Testimonial Content -->
        <div>
          <label class="block mb-1">Testimonial Content</label>
          <textarea v-model="form.testimonial_content" class="textarea textarea-bordered w-full" placeholder="Enter testimonial"></textarea>
          <span v-if="form.errors.testimonial_content" class="text-red-500">{{ form.errors.testimonial_content }}</span>
        </div>
        <!-- Photo Upload -->
        <div>
          <label class="block mb-1">Photo</label>
          <div v-if="form.photo_url" class="mb-2">
            <img :src="form.photo_url" alt="Current Photo" class="w-32 h-32 object-cover mb-2" />
            <a :href="form.photo_url" download class="inline-flex">
              <Button variant="outline" class="flex items-center gap-1">
                <Download class="w-4 h-4" />
                <span>Download</span>
              </Button>
            </a>
          </div>
          <input type="file" @change="handleFileUpload" class="file-input file-input-bordered w-full" />
          <span v-if="form.errors.photo" class="text-red-500">{{ form.errors.photo }}</span>
        </div>
        <!-- Submit Button -->
        <div class="flex justify-end">
          <Button variant="primary" type="submit" class="flex items-center gap-2">
            <Edit class="w-5 h-5" />
            <span>Update Supporter</span>
          </Button>
        </div>
      </form>
    </div>
  </AppLayout>
</template>
