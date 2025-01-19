<script setup lang="ts">
import { ref, onMounted, type Ref, defineAsyncComponent } from 'vue'
import { fetchUsers } from 'src/service/apiiList'
import type { Users } from 'src/components/models/model'

const titlePage: Ref<string> = ref('This is the title page')
const userListData = ref<Users[]>([])
const isLoading = ref(false) // Loading state
const fetchError = ref<string | null>(null) // Error state

const userTableList = defineAsyncComponent(() => import('components/user/UserComponent.vue'))
const fetchUserData = async () => {
  isLoading.value = true // Start loading
  fetchError.value = null // Reset error state
  try {
    userListData.value = await fetchUsers()
  } catch (err) {
    fetchError.value = (err as Error).message || 'An error occurred'
    console.error('Error fetching users:', err)
  } finally {
    isLoading.value = false // End loading
  }
}

const handleUserDelete = (id: string) => {
  console.log('emit deeelte', id  )
  userListData.value = userListData.value.filter((x) => x.id != id)
}

// Call `fetchUserData` when the component is mounted
onMounted(() => {
  fetchUserData()
})
</script>

<template>
  <div>
    {{ titlePage }}

    user lisst data
  </div>
  <div><user-table-list @delete:userList="handleUserDelete" :userListDataProps="userListData" /></div>
</template>
