<script setup lang="ts">
import { Button } from '@/components/ui/button';
import { Head } from '@inertiajs/vue3';
import { Star } from 'lucide-vue-next';
import { ref } from 'vue';
const numberOfStelas = ref(0);
</script>

<template>
    <Head title="Stella" />
    <div class="row flex gap-2 items-center flex-wrap p-4">
        <Button @click="numberOfStelas++">Add Stella</Button>
        <Star v-for="n in numberOfStelas" :key="n" fill="purple" color="purple" :size="32" class="transition-transform duration-200 hover:scale-125" />
    </div>
</template>
