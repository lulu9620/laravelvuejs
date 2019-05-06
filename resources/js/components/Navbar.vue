<template>
        <b-navbar toggleable="lg" type="dark" variant="danger">
            <b-navbar-brand href="#">NavBar</b-navbar-brand>
            <b-nav-item active><router-view></router-view></b-nav-item>
            <b-nav-item>Link</b-nav-item>
            <b-nav-item>Another Link</b-nav-item>
            <b-nav-item disabled>Disabled</b-nav-item>
        </b-navbar>

</template>

<script>
    export default {
        name: "Navbar",

    }
</script>

<style scoped>

</style>