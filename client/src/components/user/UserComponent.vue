<script setup lang="ts">
import { computed, Ref, ref, watch } from 'vue'
import type { Users } from '../models/model'
import { deleteSelectedUser } from 'src/service/apiiList'
import { useQuasar } from 'quasar'

const $q = useQuasar()
const props = defineProps<{
  userListDataProps: Users[]
}>()

const emits = defineEmits<{
  (e: 'delete:userList', value: string): void
}>()

const userList = ref(props.userListDataProps)
// const userList : WritableComputedRef<Users[]> = computed({
//   get:()=>{
//      return props.userListDataProps
//   },
//   set : (value: Users[])  =>{
//     emits('delete:userList', value)
//   }
// })

watch(
  () => props.userListDataProps,
  (value: Users[]) => {
    userList.value = value
  },
)

const success: Ref<boolean> = ref(false)

// Columns definition for the table
const columns = [
  { name: 'index', label: '#', field: 'index' },
  { name: 'name', label: 'Name', field: 'name', sortable: true },
  { name: 'email', label: 'Email', field: 'email', sortable: true },
  { name: 'created_at', label: 'Created At', field: 'created_at', sortable: true },
  {
    name: 'action_btn',
    label: 'Action',
  },
]

const deleteUser = async (id: string) => {
  try {
    await deleteSelectedUser(id)
    success.value = true
    emits('delete:userList', id)
  } catch (error) {
    console.error('Failed to delete user:', error)
    $q.notify({
      type: 'negative',
      message: 'Failed to delete the user. Please try again.',
      position: 'top-right',
    })
  } finally {
    // success.value = true
    $q.notify({
      type: 'postive',
      message: 'Thee data has been deleted succesfully!',
      position: 'top-right',
    })
  }
}

const rowsWithIndex = computed(() =>
  userList.value.map((row, index) => ({
    ...row,
    index: index + 1, // Add a custom index starting from 1
  })),
)
</script>

<template>
  <div>
    {{ userList }}
    <q-table
      style="height: 400px"
      flat
      bordered
      title="Users"
      :rows="rowsWithIndex"
      :columns="columns"
      row-key="index"
      virtual-scroll
      :rows-per-page-options="[0]"
    >
      <template v-slot:body-cell-index="props">
        {{ props.row.index }}
      </template>

      <template v-slot:body-cell-action_btn="props">
        <div>
          <q-btn icon="delete" color="red" size="sm" @click="deleteUser(props.row.id)" />
          <q-btn icon="edit" color="primary" size="sm" />
        </div>
      </template>
    </q-table>

    <q-btn label="add" />
  </div>

  <q-dialog v-model="success">
    <q-card>
      <q-card-section>
        <div class="text-h6">NOtificatiion</div>
      </q-card-section>

      <q-card-section class="q-pt-none"> Thee data has been deleted succesfully </q-card-section>

      <q-card-actions align="right">
        <q-btn flat label="OK" color="primary" v-close-popup />
      </q-card-actions>
    </q-card>
  </q-dialog>



</template>
