import apiClient from './apiService'
import type { Users } from 'src/components/models/model'

export const fetchUsers = async (): Promise<Users[]> => {
  const res = await apiClient.get('/users')
  return res.data
}

export const fetchCourses = async (): Promise<Users[]> => {
  const res = await apiClient.get('/course')
  return res.data
}

export const deleteSelectedUser = async (id: string): Promise<Users> => {
  const res = await apiClient.get(`user-delete/${id}`)
  return res.data
}
