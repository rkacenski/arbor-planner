<template>
<div>
    <nav-bar is-left>
        <inertia-link href="/manage" class="navbar-item has-text-success">Estimates</inertia-link>
        <inertia-link href="/manage/work" class="navbar-item has-text-success">Work Orders</inertia-link>
    </nav-bar>
    <slot></slot>
</div>
</template>

<script>
import NavBar from '../../components/NavBar'
export default {
    components: { NavBar }
}
</script>