<template>
    <div>
        <router-link></router-link>
        <ul>
            <li v-for="(user, index) in users" v-text="user.name" :key="index"></li>
        </ul>
    </div>
</template>
<script>
export default {
    props: ['users'],
}
</script>
