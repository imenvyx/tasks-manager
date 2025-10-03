import api from './api'

export const fetchTasks = async () => {
  const response = await api.get('tasks')
  return await response.data.data
}

export const fetchKeywords = async () => {
  const response = await api.get('keywords')
  return await response.data.data
}

export const createTask = async (payload) => {
  await api.post('tasks', {
    payload,
  })
}

export const toggleTaskStatus = async (taskId) => {
  await api.patch(`tasks/${taskId}/toggle`)
}
