<script setup>
import axios from 'axios'
import { ref, onMounted } from 'vue'

const tasks = ref([])
const keywords = ref([])
const newTaskTitle = ref('')
const selectedKeywords = ref([])

const fetchTasks = async () => {
  const response = await axios.get('http://localhost:8000/tasks')
  tasks.value = await response.data.data
}

const fetchKeywords = async () => {
  const response = await axios.get('http://localhost:8000/keywords')
  keywords.value = await response.data.data
}

const createTask = async () => {
  if (!newTaskTitle.value) return

  await axios.post('http://localhost:8000/tasks', {
    title: newTaskTitle.value,
    keyword_ids: selectedKeywords.value,
  })

  newTaskTitle.value = ''
  selectedKeywords.value = []
  await fetchTasks()
}

const toggleTaskStatus = async (taskId) => {
  await axios.patch(`http://localhost:8000/tasks/${taskId}/toggle`)
  await fetchTasks()
}

onMounted(() => {
  fetchTasks()
  fetchKeywords()
})
</script>
<template>
  <div class="container">
    <h1 class="title">Task List</h1>
    <p class="subtitle">Manage your tasks efficiently</p>

    <!-- Create Task Form -->
    <div class="task-form">
      <h5>New Task</h5>

      <input v-model="newTaskTitle" placeholder="Task Title" />

      <select v-model="newTaskKeyword" multiple class="keyword-select">
        <option disabled value="">Select Keyword</option>
        <option v-for="keyword in keywords" :key="keyword.id" :value="keyword.id">
          {{ keyword.name }}
        </option>
      </select>

      <button @click="createTask">Add Task</button>
    </div>

    <!-- Task List -->
    <div class="task-list">
      <ul class="list-group">
        <li
          v-for="task in tasks"
          :key="task.id"
          class="list-group-item d-flex justify-content-between align-items-center"
        >
          <div>
            <strong>{{ task.title }}</strong>
            <span class="badge bg-info ms-2" :class="task.is_done ? 'bg-success' : 'bg-warning'">
              {{ task.is_done ? 'Done' : 'Pending' }}
            </span>
            <div>
              <small v-for="kw in task.keywords" :key="kw.id" class="me-2">
                {{ kw.name }}
              </small>
            </div>
            <span
              v-for="keyword in task.keywords"
              :key="keyword.id"
              class="badge bg-secondary me-1"
            >
              {{ keyword.name }}
            </span>
          </div>
          <button @click="toggleTaskStatus(task)" class="btn btn-primary btn-sm">
            {{ task.is_done ? 'Mark as Pending' : 'Mark as Done' }}
          </button>
          <button @click="deleteTask(task.id)" class="btn btn-danger btn-sm">Delete</button>
        </li>
      </ul>
    </div>
  </div>
</template>

<style>
.container {
  max-width: 800px;
  margin: auto;
  padding: 20px;
}
</style>
