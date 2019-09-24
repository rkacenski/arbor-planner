<template>
<div>
    <nav-bar>
        <a href="/" class="navbar-item has-text-success">Home</a>
        <a href="/about" class="navbar-item has-text-success">About</a>
        <a href="/contact" class="navbar-item has-text-success">Contact</a>
    </nav-bar>
    <!-- Welcome Hero -->
    <section class="hero is-faded-green is-medium">
        <div class="hero-body">
        <div class="container">
            <div class="columns hero-columns">
            <div class="column" style="align-self: center;">
                <h1 class="title is-1 has-text-primary">
                Hi, We're Arbor Care
                </h1>
                <h2 class="subtitle is-3 has-text-primary has-text-weight-light">
                We provide tree services in the <br> Wilmington North Carolina area.
                </h2>

                <a class="button is-large is-info"
                    @click="showContact = true">
                GET AN ESTIMATE
                </a>
            </div>
            <div class="column">
                <div style="display: flex; justify-content: center;">

                <div class="hero-img-wrapper">
                <div class="hero-img-inner bg-1"></div>
                </div>

                <div class="hero-img-wrapper">
                <div class="hero-img-inner bg-2"></div>
                </div>

                <div class="hero-img-wrapper">
                <div class="hero-img-inner bg-3"></div>
                </div>

                </div>
            </div>
            </div>
        </div>
        </div>
    </section>

    <!-- Services -->
    <section class="section">
        <div class="container">
        <h2 class="is-primary title is-2">
            Services
        </h2>

        <div class="columns">
            <div class="column">
            <div class="box has-background-emergency-response">
                <h3 class="title is-4 has-text-weight-bold has-text-white">
                EMERGENCY RESPONSE
                </h3>
                <p class="has-text-white">
                Arbor Care is on the cutting edge of technology to safely, and efficiently handle any tree. we are a fully insured and licensed tree care provider. We take pride in ensuring that your yard will be left in better condition than before the tree was removed. While we are not removing pillows from the sky, we go about every job with your landscapes best interests in mind. Give us a call for 24/7 emergency response or just a normal tree care project!
                </p>
                <br>
                <a href="tel:910-465-7305" class="button is-large is-dark is-inverted is-outlined">910-465-7305</a>
            </div>        
            </div>
        </div>

        <div class="columns">
            <div class="column flex">
            <div class="box">
                <div class="title is-3 has-text-primary">TREE TRIMING AND PRUNING</div>
                <p class="has-text-primary">
                Pruning is the deliberate removal of tree branches and limbs to achieve a specific objective in the alteration of a tree’s health and form. The three types of pruning are thinning, canopy elevation, and coercive pruning. Get in contact with us today to talk about what would work best for your trees!
                </p>
                <span class="separator"></span>
            </div>
            </div>
            <div class="column">
            <figure class="image">
                <img src="/images/services-1.jpg" alt="Tree">
            </figure>
            </div>
        </div>

        <div class="columns">
            <div class="column">
            <figure class="image">
                <img src="/images/services-2.jpg" alt="Tree">
            </figure>
            </div>
            <div class="column flex">
            <div class="box">
                <div class="title is-3 has-text-primary">TREE TRIMING AND PRUNING</div>
                <p class="has-text-primary">
                Pruning is the deliberate removal of tree branches and limbs to achieve a specific objective in the alteration of a tree’s health and form. The three types of pruning are thinning, canopy elevation, and coercive pruning. Get in contact with us today to talk about what would work best for your trees!
                </p>
                <span class="separator"></span>
            </div>
            </div>
        </div>
        </div>
    </section>

    <!-- Secondary Content -->
    <section class="hero is-faded-green is-medium">
        <div class="hero-body">
        <div class="container">
            <div class="columns">
            <div class="column">
                <h3 class="title is-1 has-text-primary">
                Tree Services
                </h3>
                <p class="has-text-primary line-height-md">
                Arbor Care is on the cutting edge of technology to safely, and efficiently handle any tree. we are a fully insured and licensed tree care provider. We take pride in ensuring that your yard will be left in better condition than before the tree was removed. While we are not removing pillows from the sky, we go about every job with your landscapes best interests in mind. Give us a call for 24/7 emergency response or just a normal tree care project!
                </p>
            </div>
            <div class="column">
                <div class="img-collage">
                    <div class="span-height img-1"></div>
                    <div class="img-2"></div>
                    <div class="img-3"></div>
                </div>
            </div>
            </div>
            
        </div>
        </div>
    </section>

    <contact-modal v-model="showContact">
    </contact-modal>

</div>
</template>

<script>
import ContactModal from '../components/ContactModal'
import NavBar from '../components/NavBar'
export default {
    components: { ContactModal, NavBar },
    data() {
        return {
            showContact: false,
        }
    }
}
</script>
