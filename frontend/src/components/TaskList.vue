<script setup>
import axios from 'axios'
import { ref, onMounted } from 'vue'

const tasks = ref([])
const keywords = ref([])
const newTaskTitle = ref('')
const selectedKeywords = ref([])

const fetchTasks = async () => {
  const response = await axios.get('http://localhost:8000/api/tasks')
  tasks.value = await response.data.data
}

const fetchKeywords = async () => {
  const response = await axios.get('http://localhost:8000/api/keywords')
  keywords.value = await response.data.data
}

const createTask = async () => {
  if (!newTaskTitle.value) return

  await axios.post('http://localhost:8000/api/tasks', {
    title: newTaskTitle.value,
    keyword_ids: selectedKeywords.value,
  })

  newTaskTitle.value = ''
  selectedKeywords.value = []
  await fetchTasks()
}

const toggleTaskStatus = async (taskId) => {
  await axios.patch(`http://localhost:8000/api/tasks/${taskId}/toggle`)
  await fetchTasks()
}

onMounted(() => {
  fetchTasks()
  fetchKeywords()
})
</script>
<template>
  <div class="container mt-5">
    <h1 class="">Task List</h1>
    <p class="mb-4">Manage your tasks efficiently</p>

    <!-- Create Task Form -->
    <div class="card p-3 mb-4">
      <h5>New Task</h5>

      <input
        v-model="newTaskTitle"
        type="text"
        placeholder="Task Title"
        class="form-control mb-2"
      />

      <select v-model="selectedKeywords" multiple class="form-control mb-2">
        <option disabled value="">Select Keyword</option>
        <option v-for="keyword in keywords" :key="keyword.id" :value="keyword.id">
          {{ keyword.name }}
        </option>
      </select>

      <button @click="createTask" class="btn btn-primary">Add Task</button>
    </div>

    <!-- Task List -->
    <div class="task-list">
      <ul class="list-group">
        <li v-for="task in tasks" :key="task.id" class="list-group-item">
          <div class="d-flex flex-column w-100 justify-content-start">
            <div class="d-flex justify-content-between align-items-center">
              <h6>{{ task.title }}</h6>
              <span class="badge" :class="task.is_done ? 'bg-success' : 'bg-warning'">
                {{ task.is_done ? 'Done' : 'Pending' }}
              </span>
            </div>
            <div class="mt-4 justify-content-between align-items-center d-flex">
              <div>
                <span
                  v-for="keyword in task.keywords"
                  :key="keyword.id"
                  class="badge bg-secondary me-1"
                >
                  {{ keyword.name }}
                </span>
              </div>
              <div class="btn-group">
                <button @click="toggleTaskStatus(task.id)" class="btn btn-primary btn-sm">
                  {{ task.is_done ? 'Mark as Pending' : 'Mark as Done' }}
                </button>
              </div>
            </div>
          </div>
        </li>
      </ul>
    </div>
  </div>
</template>
