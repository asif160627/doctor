<template>
    
    <router-view></router-view>
</template>

<script>
    export default {

      props: ['currentuser'],
        mounted() {
            console.log('gggggg Component mounted.'+ this.$route.params.currentuser)
        }
    }
</script>