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
  const response = await api.post('tasks', payload)
  return await response.data.data
}

export const toggleTaskStatus = async (taskId) => {
  const response = await api.patch(`tasks/${taskId}/toggle`)
  return await response.data.data
}
