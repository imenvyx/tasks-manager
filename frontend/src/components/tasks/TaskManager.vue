<script setup>
import { onMounted, provide, ref } from 'vue'
import TaskForm from './TaskForm.vue'
import TaskList from './TaskList.vue'
import { fetchTasks, fetchKeywords, createTask, toggleTaskStatus } from '@/services/taskService'

const tasks = ref([])
const keywords = ref([])
const loading = ref(false)
const error = ref(null)

const loadAll = async () => {
  loading.value = true
  error.value = null
  try {
    const [t, k] = await Promise.all([fetchTasks(), fetchKeywords()])
    tasks.value = t || []
    keywords.value = k || []
  } catch (err) {
    error.value = err.message || 'Failed to load data'
  } finally {
    loading.value = false
  }
}

provide('keywords', keywords)
provide('tasks', tasks)
provide('createTask', createTask)
provide('toggleTaskStatus', toggleTaskStatus)

onMounted(() => {
  loadAll()
})
</script>
<template>
  <div class="container mt-5">
    <h1 class="">Task Manager</h1>
    <p class="mb-4">Manage your tasks efficiently</p>

    <!-- Create Task Form -->
    <TaskForm />

    <div v-if="loading" class="text-muted">Loading tasks...</div>
    <div v-else-if="error" class="text-danger">{{ error }}</div>
    <!-- Task List -->
    <TaskList v-else />
  </div>
</template>
