import axios from 'axios'
const apiClient = axios.create({
  baseURL: 'http://127.0.0.1:8000/api/',
  timeout: 30000,
})

apiClient.interceptors.request.use((config) => {
  return config
})

export default apiClient
