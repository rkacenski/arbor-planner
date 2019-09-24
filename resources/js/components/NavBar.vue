<template>
    <nav class="navbar" role="navigation" aria-label="main navigation">
        <div class="navbar-brand">
            <inertia-link href="/" class="navbar-item">
                <img style="max-height: 80px;" src="/images/logo.gif" alt="Arbor Care Tree Management">
            </inertia-link>
            <a
                role="button"
                class="navbar-burger"
                :class="{ 'is-active' : showNav }"
                data-target="navMenu"
                aria-label="menu"
                aria-expanded="false"
                @click.prevent="toggleNav()"
            >
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
            </a>
        </div>
        <div class="navbar-menu is-uppercase" :class=" {'is-active' : showNav } ">
            <div :class="direction">
                <slot></slot>
            </div>
        </div>
    </nav>
</template>
<script>
export default {
    props: {
        isLeft: {
            default: false,
            type: Boolean
        }
    },
    data() {
        return {
            showNav: false
        }
    },
    methods: {
        toggleNav() {
        this.showNav = !this.showNav
        }
    },
    computed: {
        direction() {
            return (this.isLeft) ? 'navbar-start' : 'navbar-end'
        }
    }
}
// TODO:
//When menu is clicked outside the menu closes.
</script>
