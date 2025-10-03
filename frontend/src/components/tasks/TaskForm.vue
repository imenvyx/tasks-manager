<script setup>
import { ref, inject } from 'vue'
import KeywordSelect from '../select/KeywordSelect.vue'

const keywords = inject('keywords')
const createTaskApi = inject('createTask')
const tasks = inject('tasks')

const newTaskTitle = ref('')
const selectedKeywords = ref([])
const loading = ref(false)
const error = ref(null)

const handleSubmit = async () => {
  if (!newTaskTitle.value.trim()) return

  loading.value = true
  error.value = null

  try {
    const resp = await createTaskApi({
      title: newTaskTitle.value,
      keyword_ids: selectedKeywords.value,
    })
    if (resp && resp.id) {
      tasks.value.unshift(resp)
    }
    newTaskTitle.value = ''
    selectedKeywords.value = []
  } catch (err) {
    error.value = err.message || 'Failed to create task'
  } finally {
    loading.value = false
  }
}
</script>
<template>
  <div class="card p-3 mb-4">
    <h5>New Task</h5>

    <input v-model="newTaskTitle" type="text" placeholder="Task Title" class="form-control mb-2" />

    <KeywordSelect :keywords="keywords" v-model="selectedKeywords" />
    <div class="mt-2">
      <button @click="handleSubmit" class="btn btn-primary" :disabled="loading || !newTaskTitle.trim()">
        {{ loading ? 'Saving..' : 'Add Task' }}
      </button>
      <div v-if="error" class="text-danger mt-2">
        {{ error }}
      </div>
    </div>
  </div>
</template>
