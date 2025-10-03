<script setup>
import { computed } from 'vue'

const props = defineProps({
  keywords: {
    type: Array,
    default: () => [],
  },
  selectedKeywords: {
    type: Array,
    default: () => [],
  },
})

const emit = defineEmits(['update:selectedKeywords'])

const computedValue = computed({
  get() {
    return props.selectedKeywords
  },
  set(value) {
    emit('update:selectedKeywords', value)
  },
})
</script>

<template>
  <div class="mt-2">
    <span class="text-muted">Keywords:</span>
    <select v-model="computedValue" multiple class="form-control mb-2">
      |
      <option v-for="keyword in keywords" :key="keyword.id" :value="keyword.id">
        {{ keyword.name }}
      </option>
    </select>
  </div>
</template>
