<script setup>
import { inject } from 'vue'
import TaskItem from './TaskItem.vue'

const tasks = inject('tasks')
</script>
<template>
  <ul class="list-group">
    <TaskItem v-for="task in tasks" :key="task.id" :task="task" />
  </ul>
</template>
