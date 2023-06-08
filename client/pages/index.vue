<template>
    <div class="flex flex-col">
      <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
          <div class="overflow-hidden">
            <div v-if="pending">
              Loading ...
            </div>
            <div v-else>
              <table class="min-w-full text-left text-sm font-light">
                <thead class="border-b font-medium dark:border-neutral-500">
                  <tr>
                    <th scope="col" class="px-6 py-4">Name</th>
                    <th scope="col" class="px-6 py-4">Course</th>
                    <th scope="col" class="px-6 py-4">Is Active</th>
                    <th scope="col" class="px-6 py-4">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr class="border-b dark:border-neutral-500" v-for="user in users.data">
                    <td class="whitespace-nowrap px-6 py-4 font-medium">{{ user.name }}</td>
                    <td class="whitespace-nowrap px-6 py-4">{{ user.course }}</td>
                    <td class="whitespace-nowrap px-6 py-4">
                      <span v-if="user.is_active">True</span>
                      <span v-else>False</span>
                    </td>
                    <td class="whitespace-nowrap px-6 py-4">
                      <a class="underline" @click="viewUser(user.id)">View</a>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </template>
  
  <script setup>
  const { pending, data: users } = useFetch('http://127.0.0.1:8000/api/users', {
    lazy: true
  })
  
  function viewUser(userId) {
    navigateTo('/users/' + userId)
  }
  </script>