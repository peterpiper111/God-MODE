<template>
    <div>
        <button @click="back()">Back</button>
        <div v-if="user">
            <h3>User</h3>
            <p>Name: {{ user.name }}</p>
            <p>Course: {{ user.course }}</p>
            <p>
                Is Active: 
                <span v-if="user.is_active">True</span>
                <span v-else>False</span>
            </p>
        </div>
    </div>
</template>
  
<script setup>
const route = useRoute();
const userId = route.params.id
console.log(userId)
const { pending, data: user } = useFetch(`http://127.0.0.1:8000/api/users/${userId}`, {
  lazy: true
})

function back() {
    navigateTo('/')
}
</script>