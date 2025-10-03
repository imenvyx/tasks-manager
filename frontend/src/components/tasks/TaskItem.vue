<script setup>
import { inject } from 'vue'

const props = defineProps({
  task: {
    type: Object,
    required: true,
  },
})

const toggleTaskStatus = inject('toggleTaskStatus')
const tasks = inject('tasks')

const onToggle = async () => {
  const res = await toggleTaskStatus(props.task.id)

  if (res && res.id) {
    const index = tasks.value.findIndex((t) => t.id === res.id)
    if (index !== -1) {
      tasks.value[index] = res
    }
  }
}
</script>

<template>
  <li class="list-group-item">
    <div class="d-flex flex-column w-100 justify-content-start">
      <div class="d-flex justify-content-between align-items-center">
        <h6>{{ props.task.title }}</h6>
        <span class="badge" :class="task.is_done ? 'bg-success' : 'bg-warning'">
          {{ props.task.is_done ? 'Done' : 'Pending' }}
        </span>
      </div>
      <div class="mt-4 justify-content-between align-items-center d-flex">
        <div>
          <span
            v-for="keyword in props.task.keywords"
            :key="keyword.id"
            class="badge bg-secondary me-1"
          >
            {{ keyword.name }}
          </span>
        </div>
        <div class="btn-group">
          <button @click="onToggle" class="btn btn-primary btn-sm">
            {{ props.task.is_done ? 'Mark as Pending' : 'Mark as Done' }}
          </button>
        </div>
      </div>
    </div>
  </li>
</template>
